<?php
/**
 * Search form template
 *
 * @package Skaerm
 * @version 1.0
 */
global $wp_query; ?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="header__search--label screen-reader-text" for="s">
        <?php _e('You are looking for', THEME_OPT); ?>
    </label>
    <input type="search"
           value="<?php echo get_search_query(); ?>"
           name="s"
           id="s"
           placeholder="<?php _e('Search for anything', THEME_OPT); ?>"
    >
    <button id="searchsubmit" type="submit">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/search-red.svg" alt="">
    </button>
    <?php search_results_title(); ?>
</form>
