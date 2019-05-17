<?php
/**
 * The template for displaying the footer
 *
 * Contains footer block, the closing of the .page-wrapper div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Skaerm
 * @since 1.0
 * @version 1.0
 */

?>

<footer class="footer bg-black">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-auto mr-auto">
                <div class="footer__logo">
                    <?php if ($img = get_field('menu_logo', 'option')) : ?>
                        <img src="<?php echo $img['sizes']['medium_large']; ?>"
                             alt="">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-gray.svg'; ?>">
                    <?php endif; ?>
                </div>

                <div class="footer__copyright">
                    <i class="far fa-copyright"></i>
                    <?php echo date('Y'); ?>
                    <?php the_field('copyright', 'option'); ?>
                </div>
            </div>
            <div class="col-12 col-lg-auto ">
                <?php
                if (has_nav_menu('footer')) {
                    skaerm_top_menu('footer', 'footer__menu');
                }
                ?>
            </div>

            <div class="col-12 col-lg-auto">
                <?php echo get_social_icons_list('footer__social menu-desktop__follow', true); ?>
            </div>
        </div>
    </div>
</footer>

</div><!-- .page-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
