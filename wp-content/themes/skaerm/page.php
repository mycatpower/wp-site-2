<?php
/**
 * The template for displaying
 *
 * @package WordPress
 * @subpackage Skaerm
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="section section-hero-category">
    <div class="container-fluid">
        <h1 class="section-title mb-0">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<section class="section section-privacy">
    <div class="container container-small">
        <div class="article section-posts__container">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();

                    the_content();
                }
            }
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
