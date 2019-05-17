<?php

/**
 * ACF Themes options
 */

if (function_exists('acf_add_options_page')) {
    // add parent
    $parent = acf_add_options_page(array(
        'page_title' => __('Theme Options', THEME_OPT),
        'menu_title' => __('Theme Options', THEME_OPT),
        'redirect' 	 => false
    ));

    // add Header sub page
    acf_add_options_sub_page(array(
        'page_title'  => __('Header', THEME_OPT),
        'menu_title'  => __('Header', THEME_OPT),
        'parent_slug' => $parent['menu_slug'],
    ));

    // add Footer sub page
    acf_add_options_sub_page(array(
        'page_title'  => __('Footer', THEME_OPT),
        'menu_title'  => __('Footer', THEME_OPT),
        'parent_slug' => $parent['menu_slug'],
    ));
}
