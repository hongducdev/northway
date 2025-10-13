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
        <?php if ($settings['popular'] == 'is-popular'): ?>
            <div class="pxl-item--tag">
                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="70" viewBox="0 0 61 70" fill="none">
                    <path d="M8.85447 0H47.8129C54.6588 0 60.2087 5.54974 60.2087 12.3959V68.2709C60.2086 68.9874 59.7766 69.6334 59.1144 69.9071C58.9 69.9965 58.7323 70.0003 58.5 70C58.03 70.0008 57.8649 69.9071 57.1841 69.5246L37.1879 57.5C28 63.5 19 68.2707 17.4182 69.2341C16.6062 69.7287 16 70 14.9632 69.7287C14.6685 69.5328 14.4394 69.2532 14.3051 68.926C14.191 68.7276 14.1427 68.4983 14.167 68.2707V6.93399C14.167 4 11.7885 3.54161 8.85447 3.54161C7.87647 3.54161 7.08358 2.74872 7.08358 1.77072C7.08358 0.792725 4.10449 0 8.85447 0Z" fill="#E5B720"/>
                    <path d="M46.221 29.0732L42.1853 32.884L43.1384 38.2663C43.1798 38.5017 43.0801 38.7395 42.8805 38.8801C42.7678 38.9598 42.6337 39 42.4996 39C42.3965 39 42.2929 38.9762 42.1983 38.9278L37.2083 36.3867L32.219 38.9272C32.0013 39.0389 31.7363 39.0207 31.5368 38.8795C31.3373 38.7389 31.2375 38.5011 31.2789 38.2657L32.232 32.8834L28.1957 29.0732C28.0195 28.9063 27.9553 28.6565 28.0318 28.4299C28.1082 28.2034 28.311 28.0371 28.5553 28.0025L34.1329 27.218L36.6272 22.3215C36.8455 21.8928 37.5711 21.8928 37.7895 22.3215L40.2838 27.218L45.8614 28.0025C46.1057 28.0371 46.3084 28.2027 46.3849 28.4299C46.4613 28.6571 46.3972 28.9057 46.221 29.0732Z" fill="white"/>
                    <path d="M7.08398 0C10.9957 0.000188119 14.1668 2.67131 14.167 6.58301L14.167 7H0C0 7 9.06618e-05 6.93769 4.67747e-05 6.72949L0 6.58301C0.000205899 2.67119 3.17212 0 7.08398 0Z" fill="#BC9720"/>
                </svg>
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
        <?php if (isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <?php if (!empty($settings['feature_title'])) : ?>
                <h5 class="pxl-item--feature-title el-empty"><?php echo pxl_print_html($settings['feature_title']); ?></h5>
            <?php endif; ?>
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
    </div>
</div>