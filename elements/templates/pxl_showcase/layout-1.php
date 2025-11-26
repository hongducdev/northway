<?php 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
if ( ! empty( $settings['btn_link2']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['btn_link2']['url'] );

    if ( $settings['btn_link2']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['btn_link2']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-showcase pxl-showcase1  <?php if($settings['coming_soon'] == 'yes') { echo 'pxl-wg-coming-soon'; } ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['image']['id'])) : ?>
            <?php 
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => 'full',
            ));
            $thumbnail = $img['thumbnail']; 
            ?>
            <div class="pxl-item--image">
                <div class="pxl-item--image-inner">
                    <?php echo pxl_print_html($thumbnail); ?>
                    <div class="pxl-item--buttons">
                        <?php if(!empty($settings['btn_text'])) : ?>
                            <a class="pxl-item--button pxl-item--button-1" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                                <span><?php echo esc_html($settings['btn_text']); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if(!empty($settings['btn_text2'])) : ?>
                            <a class="pxl-item--button pxl-item--button-2" <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>>
                                <span><?php echo esc_html($settings['btn_text2']); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="pxl-item--overlay"></div>
                    <?php if($settings['coming_soon'] == 'yes') : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/coming-soon.png" alt="coming soon" class="pxl-item--coming-soon">
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['title'])) : ?>
            <div class="pxl-item--title">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <?php echo esc_html($settings['title']); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>