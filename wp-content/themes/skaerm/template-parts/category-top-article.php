<?php

/**
 * Template part for displaying Top category article
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
$categoryName = get_query_var('category_name');

$article = new WP_Query([
    'posts_per_page' => 1,
    'post_type'      => 'post',
    'post_status'    => 'published',
    'category_name'  => $categoryName,
    'meta_query'     => get_news_meta_query(),
]);

if ($article->have_posts()) :
    while ($article->have_posts()) : $article->the_post(); ?>

    <section class="section section-category-latest">
        <div class="container-fluid">
            <div class="preview">
                <?php
                $img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                ?>
                <a href="<?php the_permalink(); ?>"
                   class="preview__img"
                   style="background-image: url(<?php echo $img; ?>)"
                ></a>

                <div class="preview__info">
                    <?php if (get_field('announce')) : ?>
                    <div class="preview__announce">
                        <?php _e('Annonce', THEME_OPT); ?>
                    </div>
                    <?php endif; ?>

                    <h2 class="preview__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_title(); ?>
                        </a>
                    </h2>

                    <div class="preview__date">
                        <?php the_article_date(); ?>
                    </div>

                    <div class="preview__category">
                        <a href="<?php echo get_category_link(get_query_var('term_id')); ?>">
                            <?php echo $categoryName; ?>
                        </a>
                    </div>

                    <div class="preview__text">
                        <?php the_field('short_description'); ?>
                    </div>

                    <div class="preview__video">
                        <?php if (get_field('video')) : ?>
                        <i class="fas fa-play"></i>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    endwhile;
    wp_reset_postdata();
endif;
