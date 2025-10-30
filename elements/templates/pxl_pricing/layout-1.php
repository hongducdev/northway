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
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate'] . ' ' . $settings['popular']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--meta">
            <?php if (!empty($settings['pxl_icon']['value'])) : ?>
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['title_box'])) : ?>
                <h4 class="pxl-item--title">
                    <?php echo pxl_print_html($settings['title_box']); ?>
                    <?php if ($settings['popular'] == 'is-popular'): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M6.94723 0.335791C7.17334 -0.11193 7.82666 -0.111931 8.05277 0.335791L9.89285 3.9793C9.98265 4.15709 10.1562 4.28032 10.357 4.30883L14.4715 4.89309C14.9771 4.96489 15.179 5.57208 14.8132 5.92058L11.8359 8.75665C11.6906 8.89504 11.6243 9.09443 11.6586 9.28984L12.3614 13.2944C12.4478 13.7865 11.9192 14.1618 11.467 13.9295L7.78685 12.0388C7.60727 11.9465 7.39273 11.9465 7.21315 12.0388L3.53298 13.9295C3.08076 14.1618 2.55221 13.7865 2.63858 13.2944L3.34143 9.28984C3.37573 9.09443 3.30943 8.89504 3.16415 8.75665L0.186827 5.92058C-0.179032 5.57208 0.022853 4.96489 0.528458 4.89309L4.64301 4.30883C4.84379 4.28032 5.01735 4.15709 5.10714 3.9793L6.94723 0.335791Z" fill="#E9BF4A"/>
                        </svg>
                    <?php endif; ?>
                </h4>
            <?php endif; ?>
        </div>
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
        <svg xmlns="http://www.w3.org/2000/svg" width="350" height="26" viewBox="0 0 350 26" fill="none" class="pxl-item--divider">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.873 2.7627C15.8731 4.45899 16.0664 6.13367 16.8838 7.50489C18.6463 10.461 21.4986 11.7483 25.6084 12.2842C27.1497 12.4851 28.8527 12.5787 30.7236 12.6172C32.6766 12.5771 34.8027 12.5965 37.0986 12.6172C38.5257 12.6044 40.0247 12.5918 41.5967 12.5918H350V13.4082H41.5967C40.0247 13.4082 38.5257 13.3956 37.0986 13.3828C34.8027 13.4035 32.6766 13.4219 30.7236 13.3818C28.8527 13.4203 27.1497 13.5149 25.6084 13.7158C21.4986 14.2517 18.6463 15.539 16.8838 18.4951C16.0664 19.8663 15.8731 21.541 15.873 23.2373V26C15.873 26 15.4996 26 15.127 26V23.2373C15.1269 21.541 14.9336 19.8663 14.1162 18.4951C12.3537 15.539 9.5014 14.2517 5.3916 13.7158C3.85001 13.5148 2.1467 13.4203 0.275391 13.3818C0.183999 13.3837 0.0921491 13.3831 0 13.3848V12.6133C0.0921563 12.6149 0.183992 12.6153 0.275391 12.6172C2.14669 12.5787 3.85001 12.4852 5.3916 12.2842C9.5014 11.7483 12.3537 10.461 14.1162 7.50489C14.9336 6.13367 15.1269 4.45899 15.127 2.7627V2.64338e-06C15.4996 -3.30422e-06 15.873 2.64338e-06 15.873 2.64338e-06V2.7627ZM15.5 6.10157C15.3308 6.72831 15.0906 7.33619 14.752 7.9043C12.8675 11.0647 9.85258 12.4249 5.80078 13C9.85258 13.5751 12.8675 14.9353 14.752 18.0957C15.0905 18.6636 15.3309 19.271 15.5 19.8975C15.6691 19.271 15.9095 18.6636 16.248 18.0957C18.1324 14.9355 21.1468 13.5751 25.1982 13C21.1468 12.4249 18.1324 11.0645 16.248 7.9043C15.9094 7.33619 15.6692 6.72831 15.5 6.10157Z" fill="currentColor"/>
        </svg>
        <?php if (!empty($settings['description'])) : ?>
            <div class="pxl-item--description">
                <?php echo pxl_print_html($settings['description']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['button_text'])) : ?>
            <a class="pxl-item--button" <?php pxl_print_html($widget->get_render_attribute_string('button')); ?>>
                <span class="pxl-item--button-text" data-text="<?php echo pxl_print_html($settings['button_text']); ?>">
                    <?php echo pxl_print_html($settings['button_text']); ?>
                </span>
            </a>
        <?php endif; ?>
        <?php if (isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <div class="pxl-item--feature ">
                <?php foreach ($settings['feature'] as $key => $value): ?>
                    <div class="<?php echo esc_attr($value['active']); ?> d-flex">
                        <div class="pxl-item--feature-content <?php if($value['active'] == 'is-active'): ?>active<?php endif; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                                <path d="M4.14652 0.1464C3.95126 -0.0488624 3.63468 -0.048862 3.43942 0.1464L0.146522 3.43929C-0.0487404 3.63456 -0.0487399 3.95114 0.146522 4.1464L3.43942 7.43929C3.63468 7.63456 3.95126 7.63456 4.14652 7.43929L7.43942 4.1464C7.63468 3.95114 7.63468 3.63456 7.43942 3.43929L4.14652 0.1464Z" fill="currentColor"/>
                            </svg>
                            <?php echo pxl_print_html($value['feature_text']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>