<div class="pxl-icon-box pxl-icon-box4 <?php echo esc_attr($settings['style'] . ' ' . $settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
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
        <?php if (!empty($settings['title'])): ?>
            <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
        <?php endif; ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="330" height="14" viewBox="0 0 330 14" fill="none" class="pxl-item--divider">
            <path d="M0 0.849578H8.90332C10.4753 0.849578 11.9743 0.836419 13.4014 0.823061C15.6973 0.844668 17.8234 0.863913 19.7764 0.822042C20.2438 0.83209 20.7009 0.845683 21.1475 0.863857C22.4882 0.918413 23.7354 1.01341 24.8916 1.17084C29.0014 1.73052 31.8537 3.07492 33.6162 6.16217C34.4334 7.59415 34.6269 9.34334 34.627 11.1147V14C34.9977 14 35.3692 14 35.373 14V11.1147C35.3731 9.34335 35.5666 7.59414 36.3838 6.16217C38.1463 3.07493 40.9987 1.73052 45.1084 1.17084C45.3011 1.1446 45.4965 1.12028 45.6943 1.09741C47.0786 0.937368 48.5873 0.857217 50.2246 0.822042C52.1773 0.863886 54.3031 0.844664 56.5986 0.823061C58.0257 0.836419 59.5247 0.849578 61.0967 0.849578H330V0.00511207L58.793 0.00511204C58.0435 0.0100714 57.312 0.0167929 56.5986 0.0234703C54.4106 0.00287872 52.3767 -0.0150783 50.5 0.0193908C50.4118 0.0210136 50.3239 0.0206964 50.2363 0.0224504C46.9399 0.0912086 43.9378 0.170984 40.8066 1.41052C40.5385 1.51664 40.2774 1.63084 40.0234 1.7532C38.2469 2.60905 36.8158 3.87489 35.748 5.74503C35.4096 6.33801 35.1691 6.97257 35 7.62673C34.8309 6.97256 34.5904 6.33802 34.252 5.74503C33.8987 5.12621 33.5054 4.57319 33.0732 4.07956C32.9292 3.91506 32.7806 3.75694 32.6279 3.60531C32.399 3.37804 32.1603 3.16464 31.9121 2.96482C31.7466 2.83154 31.5764 2.70407 31.4023 2.58237C31.1411 2.39976 30.8702 2.22941 30.5898 2.0714C30.3905 1.95905 30.1855 1.85387 29.9766 1.7532C29.7228 1.63097 29.4621 1.51655 29.1943 1.41052C26.0436 0.162984 22.8253 0.0805939 19.5 0.0193908C17.6233 -0.0150784 15.5894 0.00287862 13.4014 0.0234703C12.688 0.0167928 11.9565 0.0100714 11.207 0.00511204H0V0.849578Z" fill="currentColor"/>
        </svg>
        <?php if (empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        <?php elseif (!empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
            <a <?php pxl_print_html($widget->get_render_attribute_string('item_link')); ?>>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            </a>
        <?php endif; ?>
    </div>
</div>