<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Skaerm
 * @since   1.0
 */
global $wp_query;

get_header(); ?>
<section class="section section-posts">
    <div class="container container-small">
        <div class="banner banner--center">
            <img src="/wp-content/themes/skaerm/assets/images/930_180_banner.png"
                 alt="">
        </div>
    </div>

    <div class="banner banner--side banner--left">
        <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png"
             alt="">
    </div>

    <div class="container container-small">

        <?php if (have_posts()) : ?>
            <div class="section-posts__container">
            <?php while (have_posts()) : the_post(); ?>
                <?php $img = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>

                <?php echo get_post_preview($img, true, true, true, $layout = 'preview--search'); ?>
            <?php endwhile; ?>
            </div>
            <?php if ($wp_query->max_num_pages > 1) : ?>
                <div class="posts-group__link mb-0">
                    <a href="#"
                       class="load_more_founds"
                       data-found="<?php echo $wp_query->found_posts ?>">
                        <span><?php _e('Load More Results', THEME_OPT); ?></span>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="banner banner--side banner--right">
        <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png"
             alt="">
    </div>

</section>
<?php get_footer(); ?>
