<?php

/**
 * Template part for displaying slider text
 *
 * @package Skaerm
 * @since 1.0
 */

if (have_rows('text_blocks')) : ?>
    <div class="slider">
        <?php $i = 1; ?>
        <?php while (have_rows('text_blocks')) :
            the_row(); ?>
            <div>
                <?php if ($title = get_sub_field('title')) : ?>
                    <h2 class="underline">
                        <span><?php echo $i; ?>.</span>
                        <?php echo $title; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($text = get_sub_field('text')) : ?>
                    <p><?php echo $text; ?></p>
                <?php endif; ?>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    </div>
<?php endif;
