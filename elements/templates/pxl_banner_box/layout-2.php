<div class="pxl-banner-box pxl-banner-box-layout2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-banner-box-inner">
        <div class="pxl-banner-box-col-1">
            <div class="pxl-banner-box-image">
                <?php echo wp_get_attachment_image($settings['image_2_1']['id'], 'full'); ?>
            </div>
            <div class="pxl-banner-box-image-3">
                <?php echo wp_get_attachment_image($settings['image_2_3']['id'], 'full'); ?>
            </div>
        </div>
        <div class="pxl-banner-box-col-2">
            <div class="pxl-banner-box-image-2">
                <?php echo wp_get_attachment_image($settings['image_2_2']['id'], 'full'); ?>
            </div>
            <div class="pxl-banner-box-image-4">
                <?php echo wp_get_attachment_image($settings['image_2_4']['id'], 'full'); ?>
            </div>
        </div>
        <div class="pxl-counter">
            <div class="pxl-counter--holder">
                <div class="pxl-counter--number">
                    <span class="pxl-counter--value effect-default" data-duration="2000" data-startnumber="1" data-endnumber="<?php echo esc_attr($settings['counter_number_2']); ?>" data-to-value="<?php echo esc_attr($settings['counter_number_2']); ?>">1</span>
                    <?php if(!empty($settings['counter_suffix_2'])) : ?>
                        <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['counter_suffix_2']); ?></span>
                    <?php endif; ?>
                </div>
                <div class="pxl-counter--title"><?php echo esc_html($settings['counter_title_2']); ?></div>
            </div>
        </div>
    </div>
</div>