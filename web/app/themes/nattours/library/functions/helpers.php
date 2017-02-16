<?php

use Nord\Utils;

/**
 * Helper-functions
 *
 * @package Nattours
 *
 */

/**
 * @param $filename
 *
 * @return string
 */
function asset_uri( $filename ) {
    return trailingslashit( get_template_directory_uri() ) . "dist/{$filename}";
}

/**
 * Include all files from folder
 *
 * @param        $dir
 * @param string $suffix
 */
function require_files( $dir, $suffix = 'php' ) {
    $dir = trailingslashit( $dir );

    if ( ! is_dir( $dir ) ) {
        return;
    }

    $files = new DirectoryIterator( $dir );

    foreach ( $files as $file ) {
        if ( ! $file->isDot() && $file->getExtension() === $suffix ) {
            $filename = $dir . $file->getFilename();
            require_once( $filename );
        }
    }
}

/**
 * Utils-class as function-wrapper
 */
if ( ! function_exists( 'UTILS' ) ):
    function UTILS() {
        return new Utils;
    }
endif;
