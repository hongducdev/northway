<?php

/**
 * @package Case-Themes
 */
?>
<div <?php post_class('col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12'); ?>>
    <div class="pxl-post--inner">
        <div class="pxl-post--featured">
            <?php the_post_thumbnail('northway-portfolio'); ?>
        </div>
        <div class="pxl-post--holder">
            <div class="pxl-post--meta">
                <div class="pxl-post--category">
                    <i class="flaticon-tag"></i>
                    <span>
                        <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                    </span>
                </div>
                <div class="pxl-post--client">
                    <i class="flaticon-user"></i>
                    <span><?php echo esc_html__('Client', 'northway'); ?>: <?php echo esc_html(get_post_meta($post->ID, 'portfolio_client', true)); ?></span>
                </div>
                <i class="flaticon-star pxl-post--meta-star"></i>
            </div>
            <h5 class="pxl-post--title">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
            </h5>
            <div class="pxl-post--body">
                <div class="pxl-post--content">
                    <?php
                    echo wp_trim_words($post->post_excerpt, 20, null);
                    ?>
                </div>
                <div class="pxl-post--readmore">
                    <div class="pxl-post--readmore-divider"></div>
                    <a class="btn pxl-button-style-2-default btn-default inline pxl-icon--right pxl-post--readmore-button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                        <div class="pxl-button--icon pxl-button--icon-left">
                            <i class="flaticon-arrow"></i>
                        </div>
                        <span class="pxl--btn-text"><?php echo esc_html__('Read More', 'northway'); ?></span>
                        <div class="pxl-button--icon pxl-button--icon-right">
                            <i class="flaticon-arrow"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>