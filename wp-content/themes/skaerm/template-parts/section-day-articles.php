<?php

/**
 * Template part for displaying section "Articles of the day"
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
?>
<section class="section section-day-articles">
    <div class="container">
        <h2 class="section-title">
            <?php the_field('day_article_title', 'option'); ?>
        </h2>

        <div class="day-articles">
            <?php if ($articles = get_field('day_articles', 'option')) : ?>
            <div class="row">
                <?php foreach ($articles as $post) :
                    setup_postdata($post);

                    $img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                    <div class="col-12 col-xl-4">
                        <div class="day-articles__item">
                            <a href="<?php the_permalink(); ?>"
                               class="day-articles__img"
                               style="background-image: url(<?php echo $img; ?>)"></a>

                            <a href="<?php the_permalink(); ?>" class="day-articles__title">
                              <?php the_title(); ?>
                            </a>

                            <div class="day-articles__category">
                                <?php
                                $category = get_the_category();
                                if (is_array($category) && isset($category[0])) {
                                    echo '<a href="'. get_category_link($category[0]->term_id) .'">';
                                    echo $category[0]->cat_name;
                                    echo '</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php wp_reset_postdata();
                endforeach; ?>
            </div>
            <?php else : ?>
                <p class="no-articles text-center p-3"><?php _e('No articles yet.', THEME_OPT); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
