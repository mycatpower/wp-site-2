<?php
get_header(); ?>

<section class="section section-hero-category">
    <div class="container-fluid">
        <p class="section-sub-title">
            <?php _e('What’s in the', THEME_OPT); ?>
        </p>
        <h1 class="section-title mb-0">
            <?php single_cat_title(); ?>
        </h1>
    </div>
</section>

<?php
get_template_part('/template-parts/category-top-article');
get_template_part('/template-parts/latest-block');
get_template_part('/template-parts/section-day-articles');
get_template_part('/template-parts/now-on-skaerm-block');

get_footer(); ?>
