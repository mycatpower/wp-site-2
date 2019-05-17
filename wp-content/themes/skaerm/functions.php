<?php
/**
 * Skaerm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage skaerm
 * @since 1.0
 */

define('THEME_OPT', 'skaerm');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skaerm_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change THEME_OPT to the name of your theme in all the template files.
     */
    load_theme_textdomain(THEME_OPT, get_stylesheet_directory().'/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // Add Solitek image sizes
    // add_image_size( 'user-icon', 170, 170, array( 'center', 'top') );

    // Set the default content width.
    $GLOBALS['content_width'] = 730;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus([
        'menu-1'         => __('Primary Menu', THEME_OPT),
        'desktop-menu-1' => __('Desktop Menu 1', THEME_OPT),
        'desktop-menu-2' => __('Desktop Menu 2', THEME_OPT),
        'desktop-menu-3' => __('Desktop Menu 3', THEME_OPT),
        'footer'         => __('Footer Menu', THEME_OPT),
    ]);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'search-form',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', [
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ]);

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'skaerm_setup' );

/**
 * Enqueue styles.
 */
function skaerm_styles() {
    // Theme stylesheet.
    wp_enqueue_style( 'skaerm-default-style', get_stylesheet_uri() );

    wp_register_style('skaerm-theme-style', get_template_directory_uri() . '/assets/css/styles.css');
    wp_enqueue_style('skaerm-theme-style');
}
add_action( 'wp_enqueue_scripts', 'skaerm_styles' );

/**
 * Enqueue scripts.
 */
function skaerm_scripts() {
    wp_register_script('skaerm-libs-scripts', get_template_directory_uri() . '/assets/js/libs-scripts.js');
    wp_enqueue_script('skaerm-libs-scripts');

    wp_register_script('skaerm-scripts', get_template_directory_uri() . '/assets/js/index.js');
    wp_localize_script('skaerm-scripts', 'params', array(
        'ajaxurl'      => site_url() . '/wp-admin/admin-ajax.php',
    ));
    wp_enqueue_script('skaerm-scripts');
}

add_action( 'wp_enqueue_scripts', 'skaerm_scripts' );

/**
 * Menu items filter
 */
function add_active_class_to_nav_menu($classes) {
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
        $classes[] = 'active';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');

//Exclude pages from WordPress Search
if (!is_admin()) {
    function sk_search_filter($query)
    {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }

    add_filter('pre_get_posts','sk_search_filter');
}

/**
 * Helpers
 */
require get_parent_theme_file_path('inc/helpers.php');

/**
 * Menus
 */
require get_parent_theme_file_path('inc/menus.php');

/**
 * Theme options
 */
require get_parent_theme_file_path('inc/theme-options.php');

/**
 * Restrict mime types
 */
require get_parent_theme_file_path( 'inc/restrict-mime-types.php' );

/**
 * Actions
 */
require get_parent_theme_file_path( 'inc/actions.php' );

/**
 * Count trending posts.
 */
require get_parent_theme_file_path( 'inc/count-trending.php' );

/**
 * Rewrite routes
 */
require get_parent_theme_file_path( 'inc/routes.php' );

/**
 * Query helpers
 */
require get_parent_theme_file_path( 'inc/queries.php' );

/**
 * Ajax handlers
 */
require get_parent_theme_file_path('inc/ajax-handlers.php');

/**
 * Gutenberg customize
 */
require get_parent_theme_file_path('inc/gutenberg.php');
