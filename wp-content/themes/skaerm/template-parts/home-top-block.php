<?php

/**
 * Template part for displaying Home page top block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */

if ($posts = get_sub_field('top_level_articles')) : ?>
    <section class="section section-hero">
        <div class="container-fluid">
            <div class="row">
                <?php $i = 0; ?>
                <?php foreach ($posts as $post) :
                    setup_postdata($post);

                    if ($i === 0) :
                        $img = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

                        <div class="col-12 col-xl-5 col-xxl-6">
                            <?php echo get_post_preview($img, true, true, true, $layout = 'preview--big'); ?>
                        </div>
                    <?php else :
                        $img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                        <div class="col-12 col-md-6 col-xl">
                            <?php echo get_post_preview($img, true, true, true, $layout = 'preview--medium'); ?>
                        </div>
                    <?php endif; ?>

                <?php $i++;
                endforeach;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif;
