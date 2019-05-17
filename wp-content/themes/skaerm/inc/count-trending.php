<?php

/**
 * Count trending posts
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 *
 */

/**
 * Add meta field to each post while creating.
 *
 * @param $post_ID
 * @param $post
 * @param $update
 */
function sk_add_post_view_meta( $post_ID, $post, $update )
{
    if ($post->post_type === 'post') {
        $count_key = 'sk_post_views_count';
        update_post_meta($post_ID, $count_key, 0);
    }
}
add_action( 'wp_insert_post', 'sk_add_post_view_meta', 10, 3 );

function sk_track_post_views($post_id)
{
    if (!is_single()) return;

    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    sk_set_post_views($post_id);
}
add_action( 'wp_head', 'sk_track_post_views');

/**
 * @param $postID
 */
function sk_set_post_views($postID)
{
    $count_key = 'sk_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 1);
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
