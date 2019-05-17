<?php

/**
 * Template part for displaying Home page latest news block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */

$category = get_query_var('category_name');

$args = [
    'posts_per_page' => 5,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'meta_query'     => get_news_meta_query(),
];

if ($category) {
    $args['category_name'] = $category;
    $args['offset']        = 1;
}

$articles = new WP_Query($args);
?>


<div class="posts-group">
    <div class="posts-group__title">
        <?php echo ($title = get_sub_field('latest_news_title')) ? $title : get_field('latest_news_title', 'option'); ?>
    </div>
    <?php if ($articles->have_posts()) : ?>
        <div class="row">
            <?php while ($articles->have_posts()) :
                $articles->the_post();

                if (($articles->current_post + 1) === $articles->post_count) : // last post
                    $img = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                    <div class="col-12 mb-0">
                        <?php echo get_post_preview($img, true, true, true, $layout = 'preview--horizontal'); ?>
                    </div>
                <?php else :
                    $img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                    <div class="col-12 col-sm-6">
                        <?php echo get_post_preview($img, true, true, true); ?>
                    </div>
                <?php endif; ?>

            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
        <div class="posts-group__link">
            <?php
            if ($category) {
                $latestLink = home_url('/blog/latest/' . $category . '/');
            } else {
                $latestLink = home_url('/blog/latest/');
            }
            ?>
            <a href="<?php echo $latestLink; ?>">
                <?php _e('All Latest News', THEME_OPT); ?>
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    <?php else : ?>
        <p class="no-articles text-center p-3"><?php _e('No articles yet.', THEME_OPT); ?></p>
    <?php endif; ?>
</div>
