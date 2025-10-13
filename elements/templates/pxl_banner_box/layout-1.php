<div class="pxl-banner-box pxl-banner-box-layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-banner-box-inner">
        <div class="pxl-banner-box-image">
            <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
        </div>
        <div class="pxl-banner-box-image-2">
            <?php echo wp_get_attachment_image($settings['image_2']['id'], 'full'); ?>
        </div>
        <svg class="w-6 h-6 pxl-banner-box-border1" width="25" height="25" viewBox="0 0 101 101" stroke="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z"></path>
            <path d="M1 101C1 45.7715 45.7715 1 101 1" fill="none"></path>
        </svg>
        <svg class="w-6 h-6 pxl-banner-box-border2" width="25" height="25" viewBox="0 0 101 101" stroke="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z"></path>
            <path d="M1 101C1 45.7715 45.7715 1 101 1" fill="none"></path>
        </svg>
        <div class="pxl-counter">
            <div class="pxl-counter--holder">
                <div class="pxl-counter--number">
                    <span class="pxl-counter--value effect-default" data-duration="2000" data-startnumber="1" data-endnumber="<?php echo esc_attr($settings['counter_number']); ?>" data-to-value="<?php echo esc_attr($settings['counter_number']); ?>">1</span>
                    <?php if(!empty($settings['counter_suffix'])) : ?>
                        <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['counter_suffix']); ?></span>
                    <?php endif; ?>
                </div>
                <div class="pxl-counter--btitle"><?php echo esc_html($settings['counter_title']); ?></div>
            </div>
        </div>
    </div>
</div>