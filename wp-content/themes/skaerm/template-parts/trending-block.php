<?php

/**
 * Template part for displaying Home page trending block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
$categoryName = get_query_var('category_name');

$args = [
    'posts_per_page' => 7,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'meta_key'       => 'sk_post_views_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
];
if ($categoryName) {
    $args['category_name'] = $categoryName;
}

$articles = new WP_Query($args);
?>
<div class="posts-group">
    <div class="posts-group__title">
        <?php echo ($title = get_sub_field('trending_news_title')) ? $title : get_field('trending_news_title', 'option'); ?>
    </div>

    <?php if ($articles->have_posts()) : ?>
        <?php while($articles->have_posts()) :
            $articles->the_post();
            $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

            echo get_post_preview($img, true, null, null, $layout = 'preview--small');
        endwhile; ?>

        <div class="posts-group__link">
            <?php
                if ($categoryName) {
                    $trendngLink = home_url('/blog/trending/' . $categoryName . '/');
                } else {
                    $trendngLink = home_url('/blog/trending/');
                }
            ?>
            <a href="<?php echo $trendngLink; ?>">
                <?php _e('All Trending', THEME_OPT); ?>
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>
    <?php else : ?>
        <p class="no-articles text-center p-3"><?php _e('No articles yet', THEME_OPT); ?></p>
    <?php endif; ?>
</div>
