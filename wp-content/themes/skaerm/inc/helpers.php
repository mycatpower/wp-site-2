<?php

/**
 * Get post preview component.
 *
 * @param string $img
 * @param boolean $title
 * @param boolean $date
 * @param boolean $category
 * @param string $layout
 * @param boolean $announce
 *
 * @return string
 */
function get_post_preview($img = '', $title = true, $date = true, $category = true, $layout = null, $announce = true)
{
    ob_start(); ?>

    <div class="preview <?php echo $layout ?>">
        <a href="<?php the_permalink(); ?>"
           class="preview__img"
           style="background-image: url(<?php echo $img; ?>)"
        ></a>

        <div class="preview__info">
            <?php if ($announce && get_field('announce')) : ?>
                <div class="preview__announce">
                    <?php _e('Annonce', THEME_OPT); ?>
                </div>
            <?php endif; ?>

            <?php if ($title) : ?>
                <a href="<?php the_permalink(); ?>" class="preview__title">
                    <?php the_title(); ?>
                </a>
            <?php endif; ?>

            <?php if ($date) : ?>
                <div class="preview__date">
                    <?php the_article_date(); ?>
                </div>
            <?php endif; ?>

            <?php if ($category) : ?>
                <div class="preview__category">
                    <?php
                    $category = get_the_category();
                    if (is_array($category) && isset($category[0])) {
                        echo '<a href="'. get_category_link($category[0]->term_id) .'">';
                        echo $category[0]->cat_name;
                        echo '</a>';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if (get_field('category') === 'video' ) : ?>
                <div class="preview__video">
                    <i class="fas fa-play"></i>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}
/**
 * Helpers
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 *
 */


function the_article_date()
{
    global $post;

    $post_date = get_the_date("Y.m.d\\TH:i");

    $today = new DateTime(); // This object represents current date/time
    $today->setTime(0, 0, 0); // reset time part, to prevent partial comparison

    $match_date = DateTime::createFromFormat("Y.m.d\\TH:i", $post_date);
    $match_date->setTime(0, 0, 0); // reset time part, to prevent partial comparison

    $diff = $today->diff($match_date);
    $diffDays = (integer)$diff->format("%R%a"); // Extract days count in interval

    switch ($diffDays) {
        case 0:
            echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
            break;
        case -1:
            echo __('Yesterday ', THEME_OPT) . date('h:i A', get_the_time('U'));
            break;
        default:
            echo get_the_date();
    }
}

// default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
function skaerm_nav_wrap()
{

    $wrap = '<ul id="%1$s" class="%2$s">';
    $wrap .= '%3$s';

    $wrap .= '<li class="nav-item"><a href="#" class="nav-link">';
    $wrap .= '<img src="/wp-content/themes/skaerm/assets/images/partner_logo.svg" alt="">';
    $wrap .= '</a></li>';

    $wrap .= '</ul>';

    return $wrap;
}

// Get list of available social icons
function get_social_icons_list($class, $under = false)
{
    $output = '';

    if ($socials = get_field('include_header_social', 'option')) {
        // Get social media data from Theme options
        if ($socials_data = get_field('social_media', 'option')) {
            $output .= '<ul class="'. $class .'">';
            if ($under) {
                $output .= '<li>' . get_field('follow_text', 'option') . '</li>';
            }

            foreach ($socials as $social) {
                foreach ($socials_data as $item) {
                    if ($item['class'] === $social) {
                        break;
                    }
                }
                $output .= '<li>';
                $output .= '<a href="' . $item['link']['url'] . '"
                   target="' . $item['link']['target'] . '">';
                $output .= '<i class="fab fa-' . $social . '-f"></i>';
                $output .= '</a>';
                $output .= '</li>';
            }
            $output .= '</ul>';
        }
    }

    return $output;
}

/**
 *	A title for the search.php template that displays the total number of search results and search terms
 */
function search_results_title()
{
    if (is_search()) {
        global $wp_query;

        $result_title = '<div class="text-center header__search--result">';
        if ($wp_query->post_count === 0) {
            $result_title .= __('<span>Found nothing</span>', THEME_OPT);
        } else if ($wp_query->post_count === 1) {
            $result_title .= __('1 <span>article found</span>', THEME_OPT);
        } else {
            $result_title .= $wp_query->found_posts . ' <span>articles found</span>';
        }

        $result_title .= " for “" . esc_html($wp_query->query_vars['s'], 1) . "”";
        $result_title .= '</div>';

        echo $result_title;
    }
}

/**
 * Get pure social name from class name.
 *
 * @param string $social
 *
 * @return string
 */
function get_social_name($social)
{
    return (strstr($social, '-', true)) ?
        strstr($social, '-', true) : $social;
}

function get_social_share_url($social)
{
    global $post;


    $crunchifyURL = urlencode(get_permalink());
    $crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(
        get_the_title(),
        ENT_COMPAT,
        'UTF-8'
    )), ENT_COMPAT, 'UTF-8');
    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
    $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

    $socialUrlName = $social . 'URL';

    return $$socialUrlName;
}

/**
 * @param $category
 *
 * @return integer
 */
function get_top_movies_list($category)
{
    $args = [
        'posts_per_page' => 10,
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'meta_key'       => 'imdb',
        'category_name'  => $category,
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'meta_query'     => get_movies_meta_query(),
    ];

    $movies = new WP_Query($args);

    ob_start();

    if ($movies->have_posts()) :
        $i = 1;
        while ($movies->have_posts()) :
            $movies->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="top-movies__item">
                <div class="top-movies__item--position">
                    <?php echo $i; ?>
                </div>
                <div class="top-movies__item--info">
                    <div class="top-movies__item--title">
                        <?php the_title(); ?>
                    </div>
                    <div class="top-movies__item--rating">
                        <?php _e('IMDb', THEME_OPT); ?>
                        <?php echo get_field('imdb'); ?>
                    </div>
                </div>
            </a>
        <?php $i++;
        endwhile;
        wp_reset_postdata();
    else : ?>
        <p class="no-articles text-center p-3"><?php _e('No videos yet.', THEME_OPT); ?></p>
    <?php endif;
    $out = ob_get_contents();
    ob_end_clean();

    return $out;
}
