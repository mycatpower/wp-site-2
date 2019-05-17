<?php

/**
 * Ajax handlers
 *
 * @package Skaerm
 * @version 1.0
 */

/**
 * Post Blog Page
 */
add_action('wp_ajax_loadmore', 'loadmore_post_blog');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_post_blog');

function loadmore_post_blog()
{
    $offset = (isset($_POST['offset'])) ? $_POST['offset'] : 15;
    $uri    = (isset($_POST['uri'])) ? $_POST['uri'] : '';

    $args = [
        'posts_per_page' => 15,
        'post_status'    => 'publish',
        'post_type'      => 'post',
        'offset'         => $offset,
    ];

    if ($uri) {
        $uriArgs = explode('/', $uri);
        list($page, $rank, $category) = $uriArgs;

        $args = collectPageBlogQuery($args, $rank, $category);
    }

    $articles = new WP_Query($args);

    if ($articles->have_posts()) {
        while ($articles->have_posts()) {
            $articles->the_post();
            $img = get_the_post_thumbnail_url(get_the_ID(), 'large');

            echo get_post_preview($img, true, true, true, $layout = 'preview--search');
        }
    }

    wp_die();
}

/**
 * Search Page
 */
add_action('wp_ajax_loadmorefounds', 'loadmore_founds');
add_action('wp_ajax_nopriv_loadmorefounds', 'loadmore_founds');

function loadmore_founds()
{
    $offset = (isset($_POST['offset'])) ? $_POST['offset'] : $_POST['offset'];
    $searchParam = (isset($_POST['search_param'])) ? $_POST['search_param'] : '';
    if ($searchParam) {
        $searchParam = substr(strstr($searchParam, '=', false), 1);
    }

    $args = [
        'posts_per_page' => get_option('posts_per_page'),
        'post_status'    => 'publish',
        'post_type'      => 'post',
        's'              => $searchParam,
        'offset'         => $offset,
    ];

    $articles = new WP_Query($args);

    if ($articles->have_posts()) {
        while ($articles->have_posts()) {
            $articles->the_post();
            $img = get_the_post_thumbnail_url(get_the_ID(), 'large');

            echo get_post_preview($img, true, true, true, $layout = 'preview--search');
        }
    }

    wp_die();
}
