<?php 
if ( ! empty( $settings['image_link']['url'] ) ) {
    $widget->add_render_attribute( 'image_link', 'href', $settings['image_link']['url'] );

    if ( $settings['image_link']['is_external'] ) {
        $widget->add_render_attribute( 'image_link', 'target', '_blank' );
    }

    if ( $settings['image_link']['nofollow'] ) {
        $widget->add_render_attribute( 'image_link', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings); 
if($settings['img_effect'] == 'pxl-image-parallax') { wp_enqueue_script( 'pxl-parallax-move-mouse'); }
?>
<div id="<?php echo esc_attr($html_id) ?>" class="pxl-image-single <?php if($settings['hide_parallax_sm'] !== 'false') { echo 'pxl-disable-parallax-sm'; } ?> <?php if($settings['img_display'] !== 'false') { echo 'pxl-hide-sr-lg'; } ?> <?php if(!empty($settings['img_effect'])) { echo esc_attr($settings['img_effect']); } ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" <?php if($settings['img_effect'] == 'pxl-image-tilt') : ?>data-maxtilt="<?php echo esc_attr($settings['max_tilt']); ?>" data-speedtilt="<?php echo esc_attr($settings['speed_tilt']); ?>" data-perspectivetilt="<?php echo esc_attr($settings['perspective_tilt']); ?>"<?php endif; ?> <?php if($settings['img_effect'] == 'pxl-parallax-scroll') : ?>data-parallax='{"<?php echo esc_attr($settings['parallax_scroll_type']); ?>":<?php echo esc_attr($settings['parallax_scroll_value_x']); ?>}'<?php endif; ?>>
    <div class="pxl-item--inner" data-wow-delay="120ms">
        <?php if(!empty($settings['img_label'])) : ?>
            <div class="pxl-item--label">
                <?php echo esc_attr($settings['img_label']); ?>
            </div>
        <?php endif; ?>
        <?php 
            $current_post_id = null;
            if (function_exists('is_shop') && is_shop()) {
                $current_post_id = wc_get_page_id('shop');
            } elseif (function_exists('is_product') && is_product()) {
                $current_post_id = get_the_ID();
            } elseif (is_singular()) {
                $current_post_id = get_the_ID();
            } elseif (in_the_loop() && get_the_ID()) {
                $current_post_id = get_the_ID();
            }
            
            $has_image = false;
            if($settings['source_type'] == 's_img' && !empty($settings['image']['id'])) {
                $has_image = true;
            } elseif($settings['source_type'] == 'f_img') {
                if($current_post_id && has_post_thumbnail($current_post_id)) {
                    $has_image = true;
                } elseif(function_exists('is_product') && is_product()) {
                    $post_future_image = northway()->get_theme_opt('post_future_image', '');
                    if (!empty($post_future_image) && is_array($post_future_image) && !empty($post_future_image['background-image'])) {
                        $has_image = true;
                    }
                }
            }
        ?>
        <?php if($has_image) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img_id = null;
            
            if($settings['source_type'] == 's_img' && !empty($settings['image']['id'])) {
                $img_id = $settings['image']['id'];
            } elseif($settings['source_type'] == 'f_img') {
                if (function_exists('is_product') && is_product() && $current_post_id) {
                    $post_future_image = northway()->get_theme_opt('post_future_image', '');
                    if (!empty($post_future_image) && is_array($post_future_image)) {
                        if (!empty($post_future_image['background-image'])) {
                            $bg_image_url = $post_future_image['background-image'];
                            $bg_image_id = attachment_url_to_postid($bg_image_url);
                            if ($bg_image_id) {
                                $img_id = $bg_image_id;
                            }
                        }
                    }
                }
                
                if (empty($img_id) && $current_post_id && has_post_thumbnail($current_post_id)) {
                    $img_id = get_post_thumbnail_id($current_post_id);
                }
            }
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $image_size,
                'class' => 'no-lazyload'
            ) );
            $thumbnail    = $img['thumbnail'];
            $thumbnail_url    = $img['url']; ?>

            <?php switch ($settings['image_type']) {
                case 'bg': ?>
                    <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
                        <?php if(!empty($settings['overlay_color'])) : ?>
                            <div class="pxl-overlay-color"></div>
                        <?php endif; ?>
                    </div>
                    <?php break;

                default: ?>
                    <div class="pxl-item--image" data-parallax-value="<?php echo esc_attr($settings['parallax_value']); ?>">
                        <?php if ( ! empty( $settings['image_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'image_link' )); ?>><?php } ?>
                            <?php if ( ! empty( $img_id ) ) { echo wp_kses_post($thumbnail); } ?>
                        <?php if ( ! empty( $settings['image_link']['url'] ) ) { ?></a><?php } ?>
                        <?php if(!empty($settings['overlay_color'])) : ?>
                            <div class="pxl-overlay-color"></div>
                        <?php endif; ?>
                    </div>
                    <?php break;
            } ?>
        <?php endif; ?>
    </div>
</div>