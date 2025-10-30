<div class="pxl-icon-box pxl-icon-box5 <?php echo esc_attr($settings['style_2'] . ' ' . $settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--header">
            <div class="pxl-item--meta">
                <?php if (!empty($settings['title'])): ?>
                    <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
                <?php endif; ?>
                <?php if (!empty($settings['desc'])): ?>
                    <div class="pxl-item--description"><?php echo pxl_print_html($settings['desc']); ?></div>
                <?php endif; ?>
            </div>
            <?php if ($settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value'])) : ?>
                <div class="pxl-item--icon pxl-flex-center">
                    <?php if (! empty($settings['item_link']['url'])) {
                        $widget->add_render_attribute('item_link', 'href', $settings['item_link']['url']);

                        if ($settings['item_link']['is_external']) {
                            $widget->add_render_attribute('item_link', 'target', '_blank');
                        }

                        if ($settings['item_link']['nofollow']) {
                            $widget->add_render_attribute('item_link', 'rel', 'nofollow');
                        } ?>
                        <a <?php pxl_print_html($widget->get_render_attribute_string('item_link')); ?>>
                        <?php } ?>
                        <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                        <?php if (! empty($settings['item_link']['url'])) { ?>
                        </a>
                    <?php } ?>
                </div>
            <?php endif; ?>
            <?php if ($settings['icon_type'] == 'image' && !empty($settings['icon_image']['id'])) : ?>
                <div class="pxl-item--icon pxl-flex-center pxl-mr-25">
                    <?php $img_icon  = pxl_get_image_by_size(array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ));
                    $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                </div>
            <?php endif; ?>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="545" height="16" viewBox="0 0 545 16" fill="none" class="pxl-item--divider">
            <path d="M0 0.970947H10.1714C11.9672 0.970947 13.6797 0.955907 15.3101 0.940642C17.933 0.965335 20.3619 0.987329 22.593 0.939476C23.1271 0.95096 23.6492 0.966494 24.1594 0.987265C25.6911 1.04962 27.1159 1.15818 28.4368 1.33811C33.1319 1.97773 36.3905 3.51419 38.404 7.04248C39.3376 8.67903 39.5586 10.6781 39.5587 12.7026V16C39.9822 16 40.4066 16 40.411 16V12.7026C40.4111 10.6781 40.6321 8.67902 41.5657 7.04248C43.5793 3.5142 46.8379 1.97773 51.5329 1.33811C51.7531 1.30811 51.9763 1.28032 52.2023 1.25418C53.7838 1.07128 55.5073 0.979676 57.3778 0.939476C59.6086 0.987298 62.0372 0.965331 64.6597 0.940642C66.29 0.955907 68.0025 0.970947 69.7983 0.970947H545V0.00584236L67.1665 0.00584234C66.3103 0.0115101 65.4747 0.0191919 64.6597 0.0268232C62.16 0.00328997 59.8364 -0.0172323 57.6924 0.0221609C57.5917 0.0240156 57.4912 0.023653 57.3912 0.0256576C53.6253 0.104238 50.1956 0.19541 46.6185 1.61202C46.3122 1.73331 46.0139 1.86382 45.7238 2.00365C43.6942 2.98178 42.0593 4.42844 40.8394 6.56575C40.4528 7.24344 40.1781 7.96865 39.9849 8.71626C39.7917 7.96864 39.5169 7.24345 39.1303 6.56575C38.7267 5.85853 38.2774 5.22651 37.7837 4.66235C37.6192 4.47436 37.4494 4.29365 37.2749 4.12036C37.0135 3.86061 36.7408 3.61673 36.4572 3.38837C36.268 3.23605 36.0737 3.09037 35.8748 2.95128C35.5764 2.74259 35.2669 2.5479 34.9466 2.36732C34.7188 2.23891 34.4847 2.11871 34.246 2.00365C33.9561 1.86397 33.6582 1.7332 33.3523 1.61202C29.7528 0.186267 26.0762 0.0921073 22.2773 0.0221609C20.1333 -0.0172325 17.8098 0.00328985 15.3101 0.0268232C14.4951 0.0191918 13.6595 0.0115102 12.8032 0.00584234H0V0.970947Z" fill="url(#paint0_linear_1534_1570)" fill-opacity="0.5"/>
            <defs>
                <linearGradient id="paint0_linear_1534_1570" x1="107.5" y1="8" x2="518" y2="8" gradientUnits="userSpaceOnUse">
                <stop stop-color="#666F78"/>
                <stop offset="1" stop-color="#F8F8F2"/>
                </linearGradient>
            </defs>
        </svg>
        <div class="pxl-item--feature">
            <?php foreach ($settings['feature_list'] as $feature) : ?>
                <div class="pxl-item--feature-item">
                    <i class="flaticon-polygon"></i>
                    <?php echo pxl_print_html($feature['feature_text']); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>