<?php

/**
 * Template part for displaying slider images
 *
 * @package Skaerm
 * @since 1.0
 */

if (have_rows('images')) : ?>
    <div class="slider">
    <?php while (have_rows('images')) :
        the_row(); ?>
        <div>
            <?php
            $img = get_sub_field('image');
            ?>
            <img src="<?php echo $img['sizes']['large']; ?>" alt="">
            <?php if ($text = get_sub_field('text')) : ?>
                <p><?php echo $text; ?></p>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif;
