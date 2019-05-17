<?php

/**
 * Template part for displaying Interview block
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 */
?>

<section class="section section-interview">
    <div class="container">

        <div class="interview">
            <div class="interview__info">
                <div class="interview__label">
                    <?php the_sub_field('label'); ?>
                </div>

                <div class="interview__text">
                    <?php the_sub_field('text'); ?>
                </div>
            </div>

            <div class="interview__photo">
                <?php if ($img = get_sub_field('photo')) : ?>
                    <img src="<?php echo $img['sizes']['large']; ?>">
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/interview.png">
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
