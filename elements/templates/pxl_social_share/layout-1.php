<div class="pxl-social-share pxl-social-share1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-social-share--inner">
        <div class="pxl-social-share--icon">
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_share'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
        </div>
        <div class="pxl-social-share--list">
            <?php foreach ($settings['social_share_list'] as $item) : ?>
                <div class="pxl-social-share--item">
                    <a href="<?php echo esc_url($item['social_share_link']['url']); ?>" target="<?php echo esc_attr($item['social_share_link']['is_external'] ? '_blank' : '_self'); ?>" rel="<?php echo esc_attr($item['social_share_link']['nofollow'] ? 'nofollow' : ''); ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $item['social_share_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>