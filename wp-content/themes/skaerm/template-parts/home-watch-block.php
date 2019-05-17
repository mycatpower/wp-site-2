<?php

/**
 * Template part for displaying Watch block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */

// todo: delete these variables
$img = '/wp-content/themes/skaerm/assets/images/preview-1.png';
?>

<section class="section section-watch bg-black">
    <div class="container">
        <h2 class="section-title">
            <?php the_sub_field('main_title'); ?>
        </h2>

        <div class="row">
            <div class="col-12 col-md">
                <div class="posts-group">
                    <div class="posts-group__title">
                        <?php the_sub_field('latest_movie_title'); ?>
                    </div>

                    <?php
                    $args = [
                        'posts_per_page' => 3,
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'meta_query'     => get_trailers_meta_query(),
                    ];

                    $articles = new WP_Query($args);

                    if ($articles->have_posts()) : ?>
                    <div class="row">
                        <?php while ($articles->have_posts()) :
                            $articles->the_post();
                            $img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                            <div class="col-12 col-xl-4">
                                <div class="preview preview--trailer">
                                    <a href="<?php the_permalink(); ?>" class="preview__img" style="background-image: url(<?php echo $img; ?>)"></a>

                                    <div class="preview__info">
                                        <div class="preview__title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>

                                        <a href="<?php the_permalink(); ?>" class="preview__video">
                                            <i class="fas fa-play"></i>
                                            <?php _e('Watch Now', THEME_OPT); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="posts-group__link">
                        <a href="<?php echo home_url('/blog/trailers/'); ?>">
                            <?php _e('All Latest Trailers', THEME_OPT); ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <?php else : ?>
                        <p class="no-articles text-center p-3"><?php _e('No trailers yet.', THEME_OPT); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-md-auto">
                <div class="posts-group">
                    <div class="posts-group__title">
                        <?php the_sub_field('top_movie_title'); ?>
                    </div>
                    <div class="top-movies">

                        <ul class="nav nav-tabs" id="topMovies" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#topMovies-1" role="tab" aria-controls="home" aria-selected="true">
                                    <?php _e('NETFLIX', THEME_OPT); ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#topMovies-2" role="tab" aria-controls="profile" aria-selected="false">
                                    <?php _e('HBO', THEME_OPT); ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#topMovies-3" role="tab" aria-controls="contact" aria-selected="false">
                                    <?php _e('Biograf', THEME_OPT); ?>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="topMoviesContent">
                            <div class="tab-pane fade show active" id="topMovies-1" role="tabpanel" aria-labelledby="topMovies-1">
                                <?php echo get_top_movies_list('netflix'); ?>
                            </div>
                            <div class="tab-pane fade" id="topMovies-2" role="tabpanel" aria-labelledby="topMovies-2">
                                <?php echo get_top_movies_list('hbo'); ?>
                            </div>
                            <div class="tab-pane fade" id="topMovies-3" role="tabpanel" aria-labelledby="topMovies-3">
                                <?php echo get_top_movies_list('biograf'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="posts-group">
                    <div class="posts-group__title">
                        <?php the_sub_field('trending_movie_title'); ?>
                    </div>

                    <?php
                    $args = [
                        'posts_per_page' => 4,
                        'post_type'      => 'post',
                        'post_status'    => 'publish',
                        'meta_key'       => 'sk_post_views_count',
                        'orderby'        => 'meta_value_num',
                        'order'          => 'DESC',
                        'meta_query'     => get_movies_meta_query(),
                    ];

                    $movies = new WP_Query($args);

                    if ($movies->have_posts()) : ?>
                    <div class="row">
                        <?php while ($movies->have_posts()) :
                            $movies->the_post();

                            $img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <?php echo get_post_preview($img, true, null, true, $layout = 'preview--video'); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="posts-group__link">
                        <a href="<?php echo home_url('/blog/movies/trending/'); ?>">
                            <?php _e('All Trending Videos', THEME_OPT); ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <?php else : ?>
                        <p class="no-articles text-center p-3"><?php _e('No videos yet.', THEME_OPT); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
