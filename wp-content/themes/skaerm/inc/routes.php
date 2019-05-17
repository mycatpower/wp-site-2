<?php

/**
 * Rewrite routes
 *
 * @package Skaerm
 * @version 1.0
 */

add_action('init', 'sk_rewrite');

function sk_rewrite()
{
    global $wp_rewrite;

    add_rewrite_rule(
        '^(blog)/([^/]*)/([^/]*)/?',
        'index.php?pagename=$matches[1]&rank=$matches[2]&variety=$matches[3]',
        'top'
    );
    add_rewrite_rule(
        '^(blog)/([^/]*)/?',
        'index.php?pagename=$matches[1]&rank=$matches[2]',
        'top'
    );

    add_filter( 'query_vars', function( $vars ){
        $vars[] = 'rank';
        $vars[] = 'variety';

        return $vars;
    } );

    $wp_rewrite->flush_rules(false);
}
