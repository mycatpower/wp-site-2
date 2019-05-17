<?php

/**
 * Template part for displaying Home latest news block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
?>
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
        <div class="section-posts__container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <?php get_template_part('/template-parts/latest-news-block'); ?>
                </div>
                <div class="col-12 col-md-4">
                    <?php get_template_part('/template-parts/trending-block'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="banner banner--side banner--right">
        <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png" alt="">
    </div>

</section>
