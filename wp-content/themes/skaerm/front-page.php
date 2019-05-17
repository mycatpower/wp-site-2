<?php

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Skaerm
 * @since      1.0
 * @version    1.0
 */

get_header();

if (have_rows('home_content')) {
    while (have_rows('home_content')) {
        the_row();

        $layout = get_row_layout();

        switch ($layout) {
            case 'three_top_news':
                get_template_part('/template-parts/home-top-block');
                break;

            case 'latest_news':
                get_template_part('/template-parts/latest-block');

            case 'articles_of_the_day':
                get_template_part('/template-parts/section-day-articles');
                break;

            case 'watch':
                get_template_part('/template-parts/home-watch-block');
                break;

            case 'interview':
                get_template_part('/template-parts/home-interview-block');
                break;

            case 'related':
                get_template_part('/template-parts/now-on-skaerm-block');
                break;

            default:
                break;
        }
    }
}

get_footer();
