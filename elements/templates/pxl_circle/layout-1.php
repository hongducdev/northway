<div class="pxl-circle <?php echo esc_attr($settings['style_circle']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay'] ?? ''); ?>ms">
    <div class="pxl-circle--1">
    </div>
    <div class="pxl-circle--2">
        <div class="pxl-circle--2-inner">
        </div>
    </div>
    <div class="pxl-circle--3">
        <div class="pxl-circle--3-inner">
        </div>
    </div>
    <?php if ( $settings['style_circle'] == 'style-3' ) : ?>
        <div class="pxl-circle--4">
            <div class="pxl-circle--4-inner">
            </div>
        </div>
    <?php endif; ?>
</div>