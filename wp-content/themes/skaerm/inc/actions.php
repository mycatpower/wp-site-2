<?php

/**
 * Actions
 *
 * @package Wordpress
 * @subpackage Skaerm
 * @since 1.0
 *
 */

/*
 * Social sharing
 */
add_action('skaerm/social_sharing', 'sk_social_sharing');

function sk_social_sharing()
{
    $html = '';

    $socials = get_field('sharing', 'option');

    if ($socials && is_array($socials)) {
        $html .= '<ul class="social">';
        foreach ($socials as $social) {
            $socialName = get_social_name($social);
            $socialUrl  = get_social_share_url($socialName);

            $html .= '<li class="social__item">';
            $html .= '<a href="'. $socialUrl .'" class="social__link '. $social .'">';
            $html .= '<i class="fab fa-'. $social .'"></i>';
            $html .= '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
    }

    echo $html;
}


