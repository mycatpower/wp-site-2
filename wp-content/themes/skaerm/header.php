<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="fullPage">
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    WordPress
 * @subpackage Skaerm
 * @since      1.0
 * @version    1.0
 */

?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="page-wrapper">

    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <?php if ($img = get_field('logo', 'option')) : ?>
                        <img src="<?php echo $img['sizes']['medium_large']; ?>"
                             alt="">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>">
                    <?php endif; ?>
                </a>

                <button class="header__toggle" type="button">
                    <span></span>
                </button>

                <div class="header__collapse">
                    <div class="header__collapse--overflow">
                        <a class="header__collapse--brand"
                           href="<?php echo home_url(); ?>">
                            <?php if ($img = get_field('logo', 'option')) : ?>
                                <img src="<?php echo $img['sizes']['medium_large']; ?>"
                                     alt="">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>">
                            <?php endif; ?>
                        </a>

                        <?php
                        if (has_nav_menu('menu-1')) {
                            skaerm_top_menu('menu-1', 'header__menu navbar-nav');
                        }
                        if (has_nav_menu('desktop-menu-1')) {
                            skaerm_top_menu('desktop-menu-1', 'header__menu navbar-nav hidden-desktop');
                        }
                        if (has_nav_menu('desktop-menu-2')) {
                            skaerm_top_menu('desktop-menu-2', 'header__menu navbar-nav hidden-desktop');
                        }
                        if (has_nav_menu('desktop-menu-3')) {
                            skaerm_top_menu('desktop-menu-3', 'header__menu navbar-nav hidden-desktop');
                        }
                        ?>
                        <?php echo get_social_icons_list('header__social'); ?>

                        <button class="close-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg">
                        </button>
                    </div>
                </div>

                <button class="search-btn">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg">
                </button>
            </nav>
        </div>

        <div class="header__search">
            <div class="container">
                <?php get_search_form(); ?>
            </div>

            <button class="close-btn">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/close-white.svg">
            </button>
        </div>
        <div class="menu-desktop">
            <div class="container">
                <nav class="navbar">
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <?php if ($img = get_field('menu_logo', 'option')) : ?>
                            <img src="<?php echo $img['sizes']['medium_large']; ?>"
                                 alt="">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>">
                        <?php endif; ?>
                    </a>

                    <button class="header__toggle" type="button">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/close-white.svg'; ?>">
                    </button>

                    <button class="search-btn">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/search-white.svg'; ?>"
                             alt="">
                    </button>
                </nav>

                <div class="menu-desktop__body">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <div class="menu-desktop__title"><?php the_field('menu_title', 'option'); ?></div>

                            <?php echo get_social_icons_list('header__social menu-desktop__follow', true); ?>
                        </div>

                        <div class="col-auto">
                            <?php if (has_nav_menu('desktop-menu-1')) {
                                skaerm_top_menu('desktop-menu-1', 'menu-primary');
                            } ?>
                        </div>

                        <div class="col-auto">
                            <?php if (has_nav_menu('desktop-menu-2')) {
                                skaerm_top_menu('desktop-menu-2', 'menu-white');
                            } ?>
                        </div>

                        <div class="col-auto">
                            <?php if (has_nav_menu('desktop-menu-3')) {
                                skaerm_top_menu('desktop-menu-3', 'menu-white');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
