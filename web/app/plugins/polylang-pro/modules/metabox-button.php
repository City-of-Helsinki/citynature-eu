<?php

/**
 * Abstract class for features needing a button in the language metabox
 *
 * @since 2.1
 */
abstract class PLL_Metabox_Button {
	public $id, $args;

	/**
	 * Constructor
	 *
	 * @since 2.1
	 *
	 * Parameters must be provided by the child class.
	 *
	 * List of parameters accepted in $args:
	 *
	 * activate   => string displayed to activate the button
	 * deactivate => string displayed to deactivate the button
	 * class      => classes to display the icon
	 *
	 * @param string $id id used for css class
	 * @param array  $args
	 */
	public function __construct( $id, $args ) {
		$this->id = $id;
		$this->args = $args;

		add_action( 'pll_' . $args['position'], array( $this, 'add_icon' ) );
		add_action( 'wp_ajax_toggle_' . $id, array( $this, 'toggle' ) );
	}

	/**
	 * Tells whether the button is active or not
	 *
	 * @since 2.1
	 *
	 * @return bool
	 */
	abstract public function is_active();

	/**
	 * Saves the button state
	 *
	 * @since 2.1
	 *
	 * @param string $post_type current post type
	 * @param bool   $active    new requested button state
	 * @return bool whether the new button state is accepted or not
	 */
	protected function toggle_option( $post_type, $active ) {
		return true;
	}

	/**
	 * Displays the button
	 *
	 * @since 2.1
	 *
	 * @param string $post_type
	 */
	public function add_icon( $post_type ) {
		if ( 'attachment' !== $post_type ) {
			echo $this->get_html( $this->is_active() );
		}
	}

	/**
	 * Ajax response to a clic on the button
	 *
	 * @since 2.1
	 */
	public function toggle() {
		check_ajax_referer( 'pll_language', '_pll_nonce' );

		$is_active = 'false' === $_POST['value'];
		if ( post_type_exists( $post_type = $_POST['post_type'] ) && $this->toggle_option( $post_type, $is_active ) ) {
			$x = new WP_Ajax_Response( array( 'what' => 'icon', 'data' => $this->get_text( $is_active ) ) );
			$x->send();
		}
		wp_die( -1 );
	}

	/**
	 * Get the text for the button title depending on its state
	 *
	 * @since 2.1
	 *
	 * @param bool $is_active
	 * @return string
	 */
	protected function get_text( $is_active ) {
		return $is_active ? $this->args['deactivate'] : $this->args['activate'];
	}

	/**
	 * Returns the html to display the button
	 *
	 * @since 2.1
	 *
	 * @param bool $is_active whether the button is already active or not
	 * @return string
	 */
	protected function get_html( $is_active ) {
		$text = $this->get_text( $is_active );
		return sprintf(
			'%6$s<button type="button" id="%1$s" class="pll-button %2$s" title="%3$s"><span class="screen-reader-text">%4$s</span></button><input name="%1$s" type="hidden" value="%5$s" />%7$s',
			$this->id,
			$is_active ? "{$this->args['class']} wp-ui-text-highlight" : $this->args['class'],
			esc_attr( $text ),
			esc_html( $text ),
			$is_active ? 'true' : 'false',
			empty( $this->args['before'] ) ? '' : $this->args['before'],
			empty( $this->args['after'] ) ? '' : $this->args['after']
		);
	}
}
