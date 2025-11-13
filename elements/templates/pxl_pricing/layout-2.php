<?php

if (! empty($settings['button_link']['url'])) {
    $widget->add_render_attribute('button', 'href', $settings['button_link']['url']);

    if ($settings['button_link']['is_external']) {
        $widget->add_render_attribute('button', 'target', '_blank');
    }

    if ($settings['button_link']['nofollow']) {
        $widget->add_render_attribute('button', 'rel', 'nofollow');
    }
}

if (! empty($settings['link_download']['url'])) {
    $widget->add_render_attribute('button2', 'href', $settings['link_download']['url']);

    if ($settings['link_download']['is_external']) {
        $widget->add_render_attribute('button2', 'target', '_blank');
    }

    if ($settings['link_download']['nofollow']) {
        $widget->add_render_attribute('button2', 'rel', 'nofollow');
    }
}

?>
<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr($settings['pxl_animate'] . ' ' . $settings['popular']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--header">
            <?php if (!empty($settings['price'])) : ?>
                <div class="pxl-item--price">
                    <?php if (!empty($settings['currency'])) : ?>
                        <span class="pxl-item--price-currency"><?php echo pxl_print_html($settings['currency']); ?></span>
                    <?php endif; ?>
                    <div class="pxl-item--price-inner">
                        <h3 class="pxl-item--price-value">
                            <?php echo pxl_print_html($settings['price']); ?>
                        </h3>
                        <?php if (!empty($settings['time'])) : ?>
                            <span class="pxl-item--price-time"><?php echo pxl_print_html($settings['time']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="pxl-item--header-right">
                <?php if (!empty($settings['pxl_icon']['value'])) : ?>
                    <div class="pxl-item--icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['button_text'])) : ?>
                    <a <?php pxl_print_html($widget->get_render_attribute_string('button')); ?> class="btn pxl-button-style-2-default btn-default inline pxl-icon--right pxl-item--button">
                        <div class="pxl-button--icon pxl-button--icon-left">
                            <i class="flaticon-arrow"></i>
                        </div>
                        <span class="pxl--btn-text">
                            <?php if ($settings['popular'] == 'is-popular'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M6.94723 0.335791C7.17334 -0.11193 7.82666 -0.111931 8.05277 0.335791L9.89285 3.9793C9.98265 4.15709 10.1562 4.28032 10.357 4.30883L14.4715 4.89309C14.9771 4.96489 15.179 5.57208 14.8132 5.92058L11.8359 8.75665C11.6906 8.89504 11.6243 9.09443 11.6586 9.28984L12.3614 13.2944C12.4478 13.7865 11.9192 14.1618 11.467 13.9295L7.78685 12.0388C7.60727 11.9465 7.39273 11.9465 7.21315 12.0388L3.53298 13.9295C3.08076 14.1618 2.55221 13.7865 2.63858 13.2944L3.34143 9.28984C3.37573 9.09443 3.30943 8.89504 3.16415 8.75665L0.186827 5.92058C-0.179032 5.57208 0.022853 4.96489 0.528458 4.89309L4.64301 4.30883C4.84379 4.28032 5.01735 4.15709 5.10714 3.9793L6.94723 0.335791Z" fill="#E9BF4A"/>
                                </svg>
                            <?php endif; ?>
                            <?php echo pxl_print_html($settings['button_text']); ?>
                        </span>
                        <div class="pxl-button--icon pxl-button--icon-right">
                            <i class="flaticon-arrow"></i>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="pxl-item--body">
            <div class="pxl-item--description">
                <?php if (!empty($settings['description'])) : ?>
                    <p class="pxl-item--description-text"><?php echo pxl_print_html($settings['description']); ?></p>
                <?php endif; ?>
                <i class="flaticon-star"></i>
            </div>
            <?php if (isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
                <div class="pxl-item--feature ">
                    <?php foreach ($settings['feature'] as $key => $value): ?>
                        <div class="pxl-item--feature-content <?php if($value['active'] == 'is-active'): ?>active<?php endif; ?>">
                            <i class="flaticon-polygon"></i>
                            <?php echo pxl_print_html($value['feature_text']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>