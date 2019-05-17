<?php

/**
 * Gutenberg customize
 *
 * @package Skaerm
 * @version 1.0
 */

function gutenberg_sk_slider_block() {
    wp_register_script(
        'gutenberg-sk-slider',
        get_stylesheet_directory_uri() . '/assets/js/sliderBlock.js',
        array('wp-blocks', 'wp-element')
    );

    register_block_type(
        'gutenberg-sk/slider',
        [
            'editor_script' => 'gutenberg-sk-slider',
        ]
    );
}
add_action( 'init', 'gutenberg_sk_slider_block' );
