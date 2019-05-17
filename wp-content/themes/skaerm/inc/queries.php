<?php

/**
 * Query Helpers
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 *
 */

/**
 * @param array $args
 * @param string $rank
 * @param string $category
 *
 * @return array
 */
function collectPageBlogQuery($args, $rank, $category)
{
    if ($rank) {
        switch ($rank) {
            case 'latest' :
                $args['order']      = 'DESC';
                $args['orderby']    = 'date';
                $args['meta_query'] = get_news_meta_query();
                break;

            case 'trending' :
                $args['meta_key']   = 'sk_post_views_count';
                $args['orderby']    = 'meta_value_num';
                $args['order']      = 'DESC';
                break;

            case 'trailers' :
                $args['meta_query'] = get_trailers_meta_query();
                break;

            case 'movies' :
                $args['meta_query'] = get_movies_meta_query();
                break;

            case 'now-on-skaerm' :
                $args['meta_query'] = [
                    [
                        'key'   => 'now_on_skaerm',
                        'value' => true,
                    ],
                ];
                break;

            default :
                break;
        }

        if ($category === 'trending') {
            $args['meta_key']   = 'sk_post_views_count';
            $args['orderby']    = 'meta_value_num';
            $args['order']      = 'DESC';
        } elseif ($category) {
            $args['category_name'] = $category;
        }
    }

    return $args;
}

/**
 * @return array
 */
function get_news_meta_query()
{
    return [
        'relation' => 'OR',
        [
            'key'     => 'category',
            'value'   => 'news',
        ],
        [
            'key'     => 'category',
            'compare' => 'NOT EXISTS',
        ],
    ];
}

/**
 * @return array
 */
function get_trailers_meta_query()
{
    return [
        [
            'key'   => 'category',
            'value' => 'trailer',
        ],
    ];
}

/**
 * @return array
 */
function get_movies_meta_query()
{
    return [
        [
            'key'   => 'category',
            'value' => 'video',
        ],
    ];
}
