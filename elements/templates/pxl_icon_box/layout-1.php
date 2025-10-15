<div class="pxl-icon-box pxl-icon-box1 <?php echo esc_attr($settings['style'].' '.$settings['animate_hover'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--header">
            <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                <div class="pxl-item--icon pxl-flex-center">
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
                <div class="pxl-item--icon pxl-flex-center pxl-mr-25">
                    <?php $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['title'])): ?>
                <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
            <?php endif; ?>
        </div>
        <div class="pxl-item--meta">
            <?php if (empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            <?php elseif (!empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                    <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
                </a>
            <?php endif; ?>
            <?php if (!empty($settings['link_list']) && is_array($settings['link_list'])): ?>
                <div class="pxl-item--link-list">
                    <?php foreach ($settings['link_list'] as $item): ?>
                        <a href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($item['link']['is_external'] ? '_blank' : '_self'); ?>" rel="<?php echo esc_attr($item['link']['nofollow'] ? 'nofollow' : ''); ?>"><?php echo pxl_print_html($item['text']); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($settings['follow_social'] && !empty($settings['follow_social_list']) && is_array($settings['follow_social_list'])): ?>
                <span class="pxl-item--follow-social">Follow us for updates:</span>
                <div class="pxl-item--follow-social-list">
                    <?php foreach ($settings['follow_social_list'] as $item): ?>
                        <a href="<?php echo esc_url($item['follow_social_link']['url']); ?>" target="<?php echo esc_attr($item['follow_social_link']['is_external'] ? '_blank' : '_self'); ?>" rel="<?php echo esc_attr($item['follow_social_link']['nofollow'] ? 'nofollow' : ''); ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $item['follow_social_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>