<?php
/**
 * Template Name: Blog
 * The Template for displaying specific single posts like latest, trending etc.
 *
 * @package Skaerm
 * @since   1.0
 */

$rank = get_query_var('rank');
$category = get_query_var('variety');
$paged = ($pagedVar = get_query_var('paged')) ? $pagedVar : 1;
$posts_per_page = 15;

get_header(); ?>
<section class="section section-posts">
    <div class="container container-small">
        <div class="banner banner--center">
            <img src="/wp-content/themes/skaerm/assets/images/930_180_banner.png" alt="">
        </div>
    </div>

    <div class="banner banner--side banner--left">
        <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png" alt="">
    </div>

    <div class="container container-small">
        <?php
        $args = [
            'posts_per_page' => $posts_per_page,
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'paged'          => $paged,
        ];

        $args = collectPageBlogQuery($args, $rank, $category);

        $articles = new WP_Query($args);
        if ($articles->have_posts()) : ?>
            <div class="section-posts__container">
                <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                    <?php $img = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>

                    <?php echo get_post_preview($img, true, true, true, $layout = 'preview--search'); ?>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
            <?php if ($articles->max_num_pages > 1) : ?>
                <div class="posts-group__link mb-0">
                    <a class="load-more-articles"
                       data-found="<?php echo $articles->found_posts ?>"
                       href="#">
                        <span><?php _e('Load More Results', THEME_OPT); ?></span>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="banner banner--side banner--right">
        <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png" alt="">
    </div>

</section>
<?php get_footer(); ?>
