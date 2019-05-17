<?php
/**
 * Skaerm: Menus
 *
 * @package WordPress
 * @subpackage Skaerm
 * @since 1.0
 */

include_once 'classes/SkaermTopNavMenu.php';
/**
 * Top Menu
 *
 * @param $menu_slug
 */
function skaerm_top_menu($location, $menu_class) {
    // main navigation menu
    $args = array(
        'theme_location' => $location,
        'container'      => false,
        'menu_class'     => $menu_class,
        'walker'         => new SkaermTopNavMenu,
    );
    if ($location === 'menu-1') {
        $args['items_wrap'] = skaerm_nav_wrap();
    }

    // print menu
    wp_nav_menu( $args );
}

