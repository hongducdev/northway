<div class="pxl-icon-box pxl-icon-box9 <?php echo esc_attr($settings['item_style_9'].' '.$settings['animate_hover'].' '.$settings['pxl_animate'].' '.$settings['item_position']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--left">
            <?php if (!empty($settings['image_bg']['id']) ) : ?>
                <?php $img_bg  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image_bg']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_bg    = $img_bg['thumbnail'];
                echo pxl_print_html($thumbnail_bg); ?>
            <?php endif; ?>
        </div>
        <div class="pxl-item--right">
            <div class="pxl-item--header">
                <div class="pxl-item--step"><?php echo pxl_print_html($settings['step']); ?>.</div>
                <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                    <div class="pxl-item--icon">
                        <?php if ( ! empty( $settings['item_link']['url'] ) ) {
                            $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

                            if ( $settings['item_link']['is_external'] ) {
                                $widget->add_render_attribute( 'item_link', 'target', '_blank' );
                            }

                            if ( $settings['item_link']['nofollow'] ) {
                                $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
                            } ?>
                            <a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                            <?php } ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                            <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php endif; ?>
                <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                    <div class="pxl-item--icon">
                        <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                        echo pxl_print_html($thumbnail_icon); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></div>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        </div>
    </div>
</div>