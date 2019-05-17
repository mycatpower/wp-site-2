<?php
/**
 * Restrict mime types
 *
 */

if ( ! function_exists( 'skaerm_restrict_mime_types' ) ) {

    add_filter( 'upload_mimes', 'skaerm_restrict_mime_types' );
    /**
     * Retrun allowed mime types
     *
     * @see     function get_allowed_mime_types in wp-includes/functions.php
     * @param   array Array of mime types
     * @return  array Array of mime types keyed by the file extension regex corresponding to those types.
     */
    function skaerm_restrict_mime_types( $mime_types )
    {

        $mime_types['svg'] = 'image/svg+xml';
        $mime_types['svgz'] = 'image/svg+xml';

        return $mime_types;
    }
}
