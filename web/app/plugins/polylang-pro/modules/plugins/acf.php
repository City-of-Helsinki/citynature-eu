<?php

/**
 * Manages compatibility with Advanced Custom Fields Pro
 * Version tested 5.6.0
 *
 * @since 2.0
 */
class PLL_ACF {
	/**
	 * Initializes filters for ACF
	 *
	 * @since 2.0
	 */
	public function init() {
		// The function acf_get_value() is not defined in ACF 4
		if ( ! class_exists( 'acf' ) || ! function_exists( 'acf_get_value' ) ) {
			return;
		}

		add_action( 'add_meta_boxes_acf-field-group', array( $this, 'remove_sync' ) );

		add_filter( 'acf/location/rule_match/page_type', array( $this, 'rule_match_page_type' ), 20, 3 ); // After ACF

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 10, 2 ); // After Polylang
		add_action( 'pll_save_post', array( $this, 'save_post' ), 20, 3 ); // After Polylang

		add_filter( 'pll_get_post_types', array( $this, 'get_post_types' ), 10, 2 );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		add_action( 'wp_ajax_acf_post_lang_choice', array( $this, 'acf_post_lang_choice' ) );

		add_filter( 'acf/load_value', array( $this, 'load_value' ), 10, 3 );
		add_filter( 'acf/load_value/type=repeater', array( $this, 'load_value' ), 20, 3 );
		add_filter( 'acf/load_value/type=flexible_content', array( $this, 'load_value' ), 20, 3 );
		add_action( 'pll_save_term', array( $this, 'save_term' ), 20, 3 ); // After Polylang
	}

	/**
	 * Deactivate synchronization for ACF field groups
	 *
	 * @since 2.1
	 */
	public function remove_sync() {
		foreach ( pll_languages_list() as $lang ) {
			remove_action( "pll_before_post_translation_{$lang}", array( PLL()->sync_post->buttons[ $lang ], 'add_icon' ) );
		}
	}

	/**
	 * Allow page on front and page for posts translations to match the corresponding page type
	 *
	 * @since 2.0
	 *
	 * @param bool  $match
	 * @param array $rule
	 * @param array $options
	 * @return bool
	 */
	function rule_match_page_type( $match, $rule, $options ) {
		if ( ! empty( $options['post_id'] ) ) {
			$post = get_post( $options['post_id'] );

			if ( 'front_page' === $rule['value'] && $front_page = (int) get_option( 'page_on_front' ) ) {
				$translations = pll_get_post_translations( $front_page );

				if ( '==' === $rule['operator'] ) {
					$match = in_array( $post->ID, $translations );
				} elseif ( '!=' === $rule['operator'] ) {
					$match = ! in_array( $post->ID, $translations );
				}
			} elseif ( 'posts_page' === $rule['value'] && $posts_page = (int) get_option( 'page_for_posts' ) ) {
				$translations = pll_get_post_translations( $posts_page );

				if ( '==' === $rule['operator'] ) {
					$match = in_array( $post->ID, $translations );
				} elseif ( '!=' === $rule['operator'] ) {
					$match = ! in_array( $post->ID, $translations );
				}
			}
		}

		return $match;
	}

	/**
	 * Copy metas when using "Add new" ( translation )
	 *
	 * @since 2.0
	 *
	 * @param string $post_type
	 * @param object $post      Current post object
	 */
	public function add_meta_boxes( $post_type, $post ) {
		if ( 'post-new.php' === $GLOBALS['pagenow'] && isset( $_GET['from_post'], $_GET['new_lang'] ) && PLL()->model->is_translated_post_type( $post_type ) ) {
			// Capability check already done in post-new.php
			$lang = PLL()->model->get_language( $_GET['new_lang'] ); // Make sure we have a valid language

			if ( 'acf-field-group' === $post_type ) {
				$duplicate_options = get_user_meta( get_current_user_id(), 'pll_duplicate_content', true );
				$active = ! empty( $duplicate_options ) && ! empty( $duplicate_options[ $post_type ] );

				if ( $active ) {
					acf_duplicate_field_group( (int) $_GET['from_post'], $post->ID );
					if ( version_compare( acf()->get_setting( 'version' ), '5.4.0', '>=' ) ) {
						acf_delete_cache( 'get_fields/ID=' . $post->ID ); // Since ACF 5.4.0
					}
				}
			} else {
				$this->copy_post_metas( (int) $_GET['from_post'], $post->ID, $lang->slug );
			}
		}
	}

	/**
	 * Synchronizes metas in translations
	 *
	 * @since 2.0
	 *
	 * @param int    $post_id      post id
	 * @param object $post         post object
	 * @param array  $translations post translations
	 */
	public function save_post( $post_id, $post, $translations ) {
		// Synchronize terms and metas in translations
		foreach ( $translations as $lang => $tr_id ) {
			if ( $tr_id && $tr_id !== $post_id ) {
				$this->copy_post_metas( $post_id, $tr_id, $lang, true );
			}
		}
	}

	/**
	 * Copy or synchronize metas
	 *
	 * @since 2.0
	 *
	 * @param int    $from Id of the post from which we copy informations
	 * @param int    $to   Id of the post to which we paste informations
	 * @param string $lang Language slug
	 * @param bool   $sync True if it is synchronization, false if it is a copy, defaults to false
	 */
	public function copy_post_metas( $from, $to, $lang, $sync = false ) {
		if ( ( ! $sync || in_array( 'post_meta', PLL()->options['sync'] ) || PLL()->sync_post->are_synchronized( $from, $to ) ) && $fields = get_field_objects( $from ) ) {
			if ( pll_is_translated_post_type( 'acf-field-group' ) ) {
				$references = $this->translate_fields_references( $from, $lang );
			}

			foreach ( $fields as $field ) {
				$translated_fields = array();
				$value = acf_get_value( $from, $field );
				$this->translate_fields( $translated_fields, $value, $field['name'], $field, $lang );
				foreach ( $translated_fields as $key => $value ) {
					if ( pll_is_translated_post_type( 'acf-field-group' ) && 0 === strpos( $key, '_' ) ) {
						if ( isset( $references[ $value ] ) ) {
							$value = $references[ $value ];
						}
					}
					update_post_meta( $to, $key, $value );
				}
			}
		}
	}

	/**
	 * Translate custom fields if needed
	 * Recursive for repeaters and flexible content
	 *
	 * @since 2.0
	 *
	 * @param array  $r     Reference to a flat list of translated custom fields
	 * @param mixed  $value Custom field value
	 * @param string $name  Custom field name
	 * @param array  $field ACF field or subfield
	 * @param string $lang  Language slug
	 * @param string $ret   Whether to return 'all' values or only 'translated' values
	 * @return array Hierarchical list of custom fields values
	 */
	protected function translate_fields( &$r, $value, $name, $field, $lang, $ret = 'translated' ) {
		if ( empty( $value ) ) {
			return;
		}

		$r[ '_' . $name ] = $field['key'];
		$return = array();

		switch ( $field['type'] ) {
			case 'image':
			case 'file':
				if ( PLL()->options['media_support'] ) {
					if ( $tr_id = pll_get_post( $value, $lang ) ) {
						$return = $r[ $name ] = $tr_id;
					}
				} else {
					$return = $value;
				}
				break;

			case 'gallery':
				if ( PLL()->options['media_support'] ) {
					foreach ( $value as $img ) {
						if ( $tr_id = pll_get_post( $img, $lang ) ) {
							$return[] = (string) $tr_id; // ACF stores strings instead of int
						}
					}
					$r[ $name ] = $return;
				} else {
					$return = $value;
				}
				break;

			case 'post_object':
			case 'relationship':
				if ( is_numeric( $value ) && $tr_id = pll_get_post( $value, $lang ) ) {
					$return = $tr_id;
				} elseif ( is_array( $value ) ) {
					foreach ( $value as $p ) {
						if ( $tr_id = pll_get_post( $p, $lang ) ) {
							$return[] = (string) $tr_id; // ACF stores strings instead of int
						}
					}
				}
				$r[ $name ] = $return;
				break;

			case 'page_link':
				// FIXME need to translate the archive links
				if ( is_numeric( $value ) && $tr_id = pll_get_post( $value, $lang ) ) {
					// Unique translated post
					$return = $tr_id;
				} elseif ( is_array( $value ) ) {
					// Multiple choice
					foreach ( $value as $p ) {
						if ( is_numeric( $p ) && $tr_id = pll_get_post( $p, $lang ) ) {
							$return[] = (string) $tr_id; // ACF stores strings instead of int
						} else {
							$return[] = $p; // Archive
						}
					}
				}
				$r[ $name ] = $return;
				break;

			case 'taxonomy':
				if ( pll_is_translated_taxonomy( $field['taxonomy'] ) ) {
					if ( is_numeric( $value ) && $tr_id = pll_get_term( $value, $lang ) ) {
						$return = $tr_id;
					} elseif ( is_array( $value ) ) {
						foreach ( $value as $t ) {
							if ( $tr_id = pll_get_term( $t, $lang ) ) {
								$return[] = (string) $tr_id; // ACF stores strings instead of int
							}
						}
					}
				} else {
					$return = $value;
				}
				$r[ $name ] = $return;
				break;

			case 'group':
				foreach ( $value as $id => $sub_value ) {
					if ( $field = acf_get_field( $id ) ) {
						$sub[ $id ] = $this->translate_fields( $r, $sub_value, $name . '_' . $field['name'], $field, $lang, $ret );
					} else {
						$sub[ $id ] = $sub_value;
					}
				}
				$return[] = $sub;

				if ( 'all' === $ret ) {
					$r[ $name ] = '';
				}

				break;

			case 'repeater':
				$return = $this->translate_sub_fields( $r, $value, $name, $field, $lang, $ret );
				if ( 'all' === $ret ) {
					$r[ $name ] = count( $value );
				}
				break;

			case 'flexible_content':
				$return = $this->translate_sub_fields( $r, $value, $name, $field, $lang, $ret );
				if ( 'all' === $ret ) {
					$r[ $name ] = array_fill( 0, count( $value ), '' );
				}
				break;

			default:
				if ( 'all' === $ret ) {
					$return = $r[ $name ] = $value;
				}
				break;
		}

		return empty( $return ) ? $value : $return;
	}

	/**
	 * Translate repeater and flexible content sub fields
	 *
	 * @since 2.2
	 *
	 * @param array  $r     Reference to a flat list of translated custom fields
	 * @param mixed  $value Custom field value
	 * @param string $name  Custom field name
	 * @param array  $field ACF field or subfield
	 * @param string $lang  Language slug
	 * @param string $ret   Whether to return 'all' values or only 'translated' values
	 * @return array Hierarchical list of custom fields values
	 */
	protected function translate_sub_fields( &$r, $value, $name, $field, $lang, $ret ) {
		$return = array();

		foreach ( $value as $row => $sub_fields ) {
			$sub = array();
			foreach ( $sub_fields as $id => $sub_value ) {
				if ( $field = acf_get_field( $id ) ) {
					$sub[ $id ] = $this->translate_fields( $r, $sub_value, $name . '_' . $row . '_' . $field['name'], $field, $lang, $ret );
				} else {
					$sub[ $id ] = $sub_value;
				}
			}
			$return[] = $sub;
		}

		return $return;
	}

	/**
	 * Add the Field Groups post type to the list of translatable post types
	 *
	 * @since 2.0
	 *
	 * @param array $post_types  List of post types
	 * @param bool  $is_settings True when displaying the list of custom post types in Polylang settings
	 * @return array
	 */
	public function get_post_types( $post_types, $is_settings ) {
		if ( $is_settings ) {
			$post_types['acf-field-group'] = 'acf-field-group';
		}
		return $post_types;
	}

	/**
	 * Enqueues javascript to react to a language change in the post metabox
	 *
	 * @since 2.0
	 */
	public function admin_enqueue_scripts() {
		global $pagenow, $typenow;

		if ( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) && ! in_array( $typenow, array( 'acf-field-group', 'attachment' ) ) && PLL()->model->is_translated_post_type( $typenow ) ) {
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_script( 'pll_acf', plugins_url( '/js/acf' . $suffix . '.js', POLYLANG_FILE ), array( 'acf-input' ), POLYLANG_VERSION );
		}
	}

	/**
	 * Ajax response for changing the language in the post metabox
	 *
	 * @since 2.0
	 */
	public function acf_post_lang_choice() {
		check_ajax_referer( 'pll_language', '_pll_nonce' );

		$x = new WP_Ajax_Response();
		foreach ( $_POST['fields'] as $field ) {
			ob_start();
			acf_render_field_wrap( acf_get_field( $field ), 'div', 'label' );
			$x->Add( array( 'what' => str_replace( '_', '-', $field ), 'data' => ob_get_contents() ) );
			ob_end_clean();
		}

		$x->send();
	}

	/**
	 * Copy and possibly translate custom fields when creating a new term translation
	 *
	 * @since 2.2
	 *
	 * @param mixed  $value   Custom field value of the source term
	 * @param string $post_id Expects term_{$term_id} for a term
	 * @param array  $field   Custom field
	 * @return mixed
	 */
	public function load_value( $value, $post_id, $field ) {
		if ( 'term_0' === $post_id && isset( $_GET['taxonomy'], $_GET['from_tag'], $_GET['new_lang'] ) && taxonomy_exists( $_GET['taxonomy'] ) && $lang = PLL()->model->get_language( $_GET['new_lang'] ) ) {

			$tr_id = acf_get_term_post_id( $_GET['taxonomy'], (int) $_GET['from_tag'] );
			$fields = get_field_objects( $tr_id );
			$keys = array_keys( $fields );

			/** This filter is documented in modules/sync/admin-sync.php */
			$keys = array_unique( apply_filters( 'pll_copy_term_metas', $keys, false, (int) $_GET['from_tag'], 0, $lang->slug ) );

			// Second test to load the values of subfields of accepted fields
			if ( in_array( $field['name'], $keys ) || preg_match( '#^(' . implode( '|', $keys ) . ')_(.+)#', $field['name'] ) ) {
				$value = acf_get_value( $tr_id, $field );
				$empty = null; // Parameter 1 is useless in this context
				$value = $this->translate_fields( $empty, $value, $field['name'], $field, $lang );

				if ( pll_is_translated_post_type( 'acf-field-group' ) ) {
					$references = $this->translate_fields_references( $tr_id, $lang->slug );
					$this->translate_references_in_value( $value, $references );
				}
			}
		}
		return $value;
	}

	/**
	 * Recursively translates the references in value for repeaters and flexible content
	 *
	 * @since 2.2
	 *
	 * @param array $value      Reference to a custom field value
	 * @param array $references List of custom fields references with source as key and translation as value
	 */
	protected function translate_references_in_value( &$value, $references ) {
		if ( is_array( $value ) ) {
			foreach ( $value as $row => $sub_fields ) {
				if ( is_array( $sub_fields ) ) {
					foreach ( $sub_fields as $id => $sub_value ) {
						if ( is_array( $sub_value ) ) {
							$this->translate_references_in_value( $sub_value, $references );
						}
						if ( isset( $references[ $id ] ) ) {
							$value[ $row ][ $references[ $id ] ] = $sub_value;
							unset( $value[ $row ][ $id ] );
						}
					}
				}
			}
		}
	}

	/**
	 * Synchronizes term metas in translations
	 *
	 * @since 2.2
	 *
	 * @param int    $term_id      Term id
	 * @param string $taxonomy     Taxonomy name of the term
	 * @param array  $translations Translations of the term
	 */
	public function save_term( $term_id, $taxonomy, $translations ) {
		// Synchronize metas in translations
		foreach ( $translations as $lang => $tr_id ) {
			if ( $tr_id && $tr_id !== $term_id ) {
				$this->copy_term_metas( $term_id, $tr_id, $lang, $taxonomy );
			}
		}
	}

	/**
	 * Synchronize term metas
	 *
	 * @since 2.2
	 *
	 * @param int    $from     Id of the term from which we copy informations
	 * @param int    $to       Id of the term to which we paste informations
	 * @param string $lang     Language slug
	 * @param bool   $taxonomy taxonomy name
	 */
	public function copy_term_metas( $from, $to, $lang, $taxonomy ) {
		$from = acf_get_term_post_id( $taxonomy, (int) $from );

		if ( in_array( 'post_meta', PLL()->options['sync'] ) && $fields = get_field_objects( $from ) ) {
			if ( pll_is_translated_post_type( 'acf-field-group' ) ) {
				$references = $this->translate_fields_references( $from, $lang );
			}

			foreach ( $fields as $field ) {
				$translated_fields = array();
				$value = acf_get_value( $from, $field );
				$this->translate_fields( $translated_fields, $value, $field['name'], $field, $lang, 'all' );
				foreach ( $translated_fields as $key => $value ) {
					if ( pll_is_translated_post_type( 'acf-field-group' ) && 0 === strpos( $key, '_' ) ) {
						if ( isset( $references[ $value ] ) ) {
							$value = $references[ $value ];
						}
					}
					update_term_meta( $to, $key, $value );
				}
			}
		}
	}

	/**
	 * Searches for fields having the same name in translated posts
	 *
	 * @since 2.2
	 *
	 * @param int|string $from Source post id
	 * @param string     $lang Target language code
	 * @return array
	 */
	protected function translate_fields_references( $from, $lang ) {
		$fields = get_field_objects( $from );

		foreach ( $fields as $field ) {
			$tr_group = pll_get_post( $field['parent'], $lang );
			$tr_fields = acf_get_fields( $tr_group );
			$this->translate_field_references( $keys, $field, $tr_fields );
		}

		return $keys;
	}

	/**
	 * Loops through sub fields in the recursive search for fields
	 * having the same name in translated among translated fields groups
	 *
	 * @since 2.2
	 *
	 * @param array $keys
	 * @param array $fields
	 * @param array $tr_fields
	 */
	protected function translate_sub_fields_references( &$keys, $fields, $tr_fields ) {
		foreach ( $fields as $field ) {
			$this->translate_field_references( $keys, $field, $tr_fields );
		}
	}

	/**
	 * Recursively searches for fields having the same name in translated among translated fields groups
	 *
	 * @since 2.2
	 *
	 * @param array $keys
	 * @param array $field
	 * @param array $tr_fields
	 */
	protected function translate_field_references( &$keys, $field, $tr_fields ) {
		$k = array_search( $field['name'], wp_list_pluck( $tr_fields, 'name' ) );
		if ( false !== $k ) {
			$keys[ $field['key'] ] = $tr_fields[ $k ]['key'];
			if ( ! empty( $field['sub_fields'] ) ) {
				$this->translate_sub_fields_references( $keys, $field['sub_fields'], $tr_fields[ $k ]['sub_fields'] );
			}

			if ( ! empty( $field['layouts'] ) ) {
				foreach ( $field['layouts'] as $row => $layout ) {
					if ( ! empty( $layout['sub_fields'] ) ) {
						$this->translate_sub_fields_references( $keys, $layout['sub_fields'], $tr_fields[ $k ]['layouts'][ $row ]['sub_fields'] );
					}
				}
			}
		}
	}
}
