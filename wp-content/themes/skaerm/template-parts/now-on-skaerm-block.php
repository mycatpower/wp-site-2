<?php

/**
 * Template part for displaying Related posts
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
?>

<section class="section section-related">
    <div class="container">
        <div class="posts-group">
            <div class="posts-group__title">
                <?php echo ($title = get_sub_field('title')) ? $title : get_field('now_on_title', 'option'); ?>
            </div>

            <?php

            $articles = new WP_Query([
                'posts_per_page' => (is_front_page()) ? 6 : 9,
                'post_type'      => 'post',
                'post_satus'     => 'publish',
                'meta_query'     => [
                    [
                        'key'   => 'now_on_skaerm',
                        'value' => true,
                    ]
                ],
            ]);

            if ($articles->have_posts()) : ?>
                <div class="row">
                <?php while ($articles->have_posts()) :
                    $articles->the_post(); ?>

                        <?php if ($articles->current_post === 3) : ?>
                            <div class="col-12 d-flex">
                                <div class="mx-auto">
                                    <img src="/wp-content/themes/skaerm/assets/images/930_180_banner.png" alt="">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12 col-md-4">
                            <?php
                            $img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                            echo get_post_preview($img, true, null, true, $layout = 'preview--related'); ?>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>

                <div class="posts-group__link">
                    <a href="<?php echo home_url('/blog/now-on-skaerm/'); ?>">
                        <?php _e('Load more news', THEME_OPT); ?>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            <?php else : ?>
                <p class="no-articles text-center p-3"><?php _e('No articles yet.', THEME_OPT); ?></p
            <?php endif; ?>
        </div>
    </div>
</section>
