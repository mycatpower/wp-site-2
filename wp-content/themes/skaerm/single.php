<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package WordPress
 * @subpackage Skaerm
 * @since 1.0
 * @version 1.0
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <section class="article-header">
            <div class="container container-small">
                <div class="article-header__title">
                    <div class="article-annonce">Annonce</div>
                    <h1 class="article-title"><?php the_title(); ?></h1>
                    <div class="article-date"><?php the_article_date(); ?></div>
                </div>
            </div>

            <div class="container">
                <div class="article-header__img">
                  <?php
                      the_post_thumbnail('full', [
                          'class' => 'img-article',
                      ]);
                  ?>
                </div>
            </div>

            <div class="container container-small">
                <div class="article-header__img-desc">
                    <p><?php the_field('short_description'); ?></p>
                    <p class="text-color-light"><?php the_field('image_signature'); ?></p>
                </div>

                <div class="article-header__footer">
                  <?php if ($author = get_field('author')[0]) : ?>
                      <div class="author">
                          <img src="<?php echo $author['photo']['sizes']['medium']; ?>" alt="author" class="author__avatar">
                          <div class="author__info">
                              <div class="author__name">
                                <?php _e('By', THEME_OPT);?>
                                <?php echo $author['name']?>
                              </div>
                            <?php if ($author['email']) : ?>
                                <div class="author__mail">
                                    <a href="mailto:<?php echo $author['email']; ?>"><i class="far fa-envelope"></i></a>
                                </div>
                            <?php endif; ?>
                          </div>
                      </div>

                    <?php if ($author_socials = $author['socials']) : ?>
                          <ul class="social">
                            <?php foreach ($author_socials as $item) : ?>
                              <?php $social = get_social_name($item['social']); ?>
                                <li class="social__item">
                                    <a href="<?php echo $item['url']; ?>" target="_blank" class="social__link <?php echo $social; ?>">
                                        <i class="fab fa-<?php echo $item['social']; ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <?php if ($author['email']) : ?>
                                <li class="social__item">
                                    <a href="mailto:<?php echo $author['email']; ?>" class="social__link mail">
                                        <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                          </ul>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
            </div>
        </section>

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
                <div class="article section-posts__container">
                    <?php the_content(); ?>

                    <?php
                    if (have_rows('sliders')) {
                        while (have_rows('sliders')) {
                            the_row();

                            $layout = get_row_layout();
                            switch ($layout) {
                                case 'images':
                                    get_template_part('/template-parts/slider', 'images');
                                    break;

                                case 'text_block' :
                                    get_template_part('/template-parts/slider', 'text');
                                    break;

                                default;
                                    break;
                            }
                        }
                    }
                    ?>

                    <div class="social-box">
                        <h4><?php the_field('sharing_article_title', 'option'); ?></h4>

                        <?php do_action('skaerm/social_sharing'); ?>
                    </div>
                </div>
            </div>

            <div class="banner banner--side banner--right">
                <img src="/wp-content/themes/skaerm/assets/images/160_600_banner.png" alt="">
            </div>

            <div class="container container-small">
                <div class="banner banner--center">
                    <img src="/wp-content/themes/skaerm/assets/images/930_180_banner.png" alt="">
                </div>
            </div>
        </section>

    <?php
    endwhile;
endif;
?>
<?php get_footer(); ?>
