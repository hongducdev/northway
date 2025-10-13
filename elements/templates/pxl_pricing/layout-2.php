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
        <?php if ($settings['popular'] == 'is-popular'): ?>
            <div class="pxl-item--tag">
                <svg xmlns="http://www.w3.org/2000/svg" width="167" height="52" viewBox="0 0 167 52" fill="none">
                    <path d="M157 52L167 41H157V52Z" fill="#BC9720"/>
                    <path d="M157 0C162.523 0 167 4.47715 167 10V41H4.54626C2.90117 41 1.9596 39.1245 2.94236 37.8052L15.0952 21.491C15.6303 20.7726 15.6226 19.786 15.0761 19.0762L2.87028 3.21997C1.85791 1.90483 2.79544 0 4.4551 0H157Z" fill="#DDB01D"/>
                </svg>
                <div class="pxl-item--tag-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                        <path d="M13.8512 5.40894L10.7834 8.32308L11.5079 12.439C11.5394 12.6189 11.4636 12.8008 11.3119 12.9083C11.2262 12.9693 11.1242 13 11.0223 13C10.944 13 10.8652 12.9818 10.7933 12.9448L7 11.0016L3.20722 12.9443C3.04174 13.0298 2.8403 13.0158 2.68861 12.9079C2.53692 12.8003 2.46107 12.6185 2.49259 12.4385L3.21707 8.3226L0.14876 5.40894C0.0147986 5.28128 -0.0339595 5.09026 0.0241562 4.91701C0.0822718 4.74375 0.236426 4.61657 0.4221 4.59018L4.66208 3.99026L6.55822 0.245844C6.7242 -0.0819482 7.2758 -0.0819482 7.44178 0.245844L9.33792 3.99026L13.5779 4.59018C13.7636 4.61657 13.9177 4.74327 13.9758 4.91701C14.034 5.09074 13.9852 5.2808 13.8512 5.40894Z" fill="currentColor"/>
                    </svg>
                    <?php echo esc_html__('Recommended', 'northway'); ?>
                </div>
            </div>
        <?php endif ?>
        <div class="pxl-item--meta">
            <?php if (!empty($settings['pxl_icon']['value'])) : ?>
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($settings['title_box'])) : ?>
                <h4 class="pxl-item--title">
                    <?php echo pxl_print_html($settings['title_box']); ?>
                </h4>
            <?php endif; ?>
        </div>
        <?php if (isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <div class="pxl-item--feature ">
                <?php foreach ($settings['feature'] as $key => $value): ?>
                    <div class="<?php echo esc_attr($value['active']); ?> d-flex">
                        <div class="pxl-item--feature-content <?php if($value['active'] == 'is-active'): ?>active<?php endif; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <g clip-path="url(#clip0_445_6997)">
                                    <path d="M10 0C4.48578 0 0 4.48578 0 10C0 15.5142 4.48578 20 10 20C15.5142 20 20 15.5142 20 10C20 4.48578 15.5142 0 10 0Z" fill="#DDB01D" />
                                    <path d="M15.0673 7.88074L9.65054 13.2973C9.48804 13.4598 9.27472 13.5416 9.0614 13.5416C8.84808 13.5416 8.63477 13.4598 8.47226 13.2973L5.76398 10.589C5.43805 10.2632 5.43805 9.73651 5.76398 9.41074C6.08975 9.08481 6.61633 9.08481 6.94226 9.41074L9.0614 11.5299L13.889 6.70245C14.2148 6.37653 14.7413 6.37653 15.0673 6.70245C15.393 7.02823 15.393 7.55481 15.0673 7.88074Z" fill="#ffffff" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_445_6997">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <?php echo pxl_print_html($value['feature_text']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['button_text'])) : ?>
            <div class="pxl-item--button">
                <a class="btn-see btn btn-text-nina" <?php pxl_print_html($widget->get_render_attribute_string('button')); ?>>
                    <span class="pxl--btn-text" data-text="<?php echo pxl_print_html($settings['button_text']); ?>">
                        <?php
                        $chars = str_split($settings['button_text']);
                        foreach ($chars as $value) {
                            if ($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>' . $value . '</span>';
                            }
                        } ?>
                    </span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>