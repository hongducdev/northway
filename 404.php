<?php

/**
 * @package Case-Themes
 */
$subtitle_404 = northway()->get_theme_opt('subtitle_404');
$title_404 = northway()->get_theme_opt('title_404');
$des_404 = northway()->get_theme_opt('des_404');
$button_404 = northway()->get_theme_opt('button_404');
$img_404 = northway()->get_opt('img_404', ['url' => get_template_directory_uri() . '/assets/img/404-image.webp', 'id' => '']);
$img_404_0 = northway()->get_opt('img_404_0', ['url' => get_template_directory_uri() . '/assets/img/404-image.webp', 'id' => '']);
get_header(); ?>
<div class="wrap-content-404">
    <div class="pxl-error-bough">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/bough.webp" alt="404_bough">
    </div>
    <div class="pxl-error-leaf pxl-error-leaf-1">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf1.webp" alt="404_leaf_1">
    </div>
    <div class="pxl-error-leaf pxl-error-leaf-2">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf2.webp" alt="404_leaf_2">
    </div>
    <div class="pxl-error-leaf pxl-error-leaf-3">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf3.webp" alt="404_leaf_3">
    </div>
    <div class="pxl-error-wrapper">
        <div class="pxl-error-image">
            <img src="<?php echo esc_url($img_404['url']); ?>" alt="404">
        </div>
        <div class="pxl-error-content pxl-col-offset-right">
            <div class="pxl-error-number">
                <span>4</span>
                <img src="<?php echo esc_url($img_404_0['url']); ?>" alt="404_0_image">
                <span>4</span>
            </div>
            <h3 class="pxl-error-title wow fadeInUp">
                <?php if (!empty($title_404)) {
                    echo pxl_print_html($title_404);
                } else {
                    echo esc_html__('Oops! Something\'s Missing in the Flowerbed', 'northway');
                } ?>
    
            </h3>
            <div class="pxl-error-divider-wrapper">
                <div class="pxl-error-divider"></div>
            </div>
            <p class="pxl-error-description wow fadeInUp">
                <?php if (!empty($des_404)) {
                    echo pxl_print_html($des_404);
                } else {
                    echo esc_html__('We\'re sorry, but the page you\'re looking for doesn\'t exist. It might have been moved or mistyped. Please check the URL or return to our homepage. If you need assistance, our support team is here to help.', 'northway');
                } ?>
            </p>
            <a class="btn btn-default pxl-error-btn wow fadeInUp" href="<?php echo esc_url(home_url('/')); ?>">
                <span>
                    <?php if (!empty($button_404)) {
                        echo pxl_print_html($button_404);
                    } else {
                        echo esc_html__('Back to Home', 'northway');
                    } ?>
                </span>
                <i aria-hidden="true" class="bootstrap-icons bi-arrow-right-short"></i>
            </a>
        </div>
    </div>
</div>
<?php get_footer();
