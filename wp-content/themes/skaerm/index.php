<?php
/**
 * The main template file
 *
 *
 * @package WordPress
 * @subpackage Skaerm
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

    <?php the_title(); ?>

    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();

            the_content();
        }
    }
    ?>

<?php get_footer(); ?>
