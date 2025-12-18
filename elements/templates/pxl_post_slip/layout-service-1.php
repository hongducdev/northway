<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_' . $settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
$settings['layout']    = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$img_size = $widget->get_setting('img_size');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');

if (! empty($settings['wg_btn_link']['url'])) {
    $widget->add_render_attribute('button', 'href', $settings['wg_btn_link']['url']);

    if ($settings['wg_btn_link']['is_external']) {
        $widget->add_render_attribute('button', 'target', '_blank');
    }

    if ($settings['wg_btn_link']['nofollow']) {
        $widget->add_render_attribute('button', 'rel', 'nofollow');
    }
} ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-post-slip pxl-post-slip1 pxl-service-slip1">
        <div class="pxl-post-slip-wrap">
            <div class="pxl-post--track">
                <?php $image_size = !empty($img_size) ? $img_size : '880x664';
                foreach ($posts as $key => $post):
                    $img_id       = get_post_thumbnail_id($post->ID);
                    $sub_title = get_post_meta($post->ID, 'portfolio_sub_title', true);
                    $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                    $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                ?>
                        <div class="pxl-post--block pxl-post-block_<?php echo esc_attr($key + 1); ?>">
                            <div class="pxl-post--body">
                                <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                    <div class="pxl-post--icon pxl-flex-center">
                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                    $icon_img = pxl_get_image_by_size(array(
                                        'attach_id' => $service_icon_img['id'],
                                        'thumb_size' => 'full',
                                    ));
                                    $icon_thumbnail = $icon_img['thumbnail'];
                                ?>
                                    <div class="pxl-post--icon pxl-flex-center">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-post--content">
                                    <h4 class="pxl-post--title">
                                        <a href="<?php if (!empty($service_external_link)) {
                                                        echo esc_url($service_external_link);
                                                    } else {
                                                        echo esc_url(get_permalink($post->ID));
                                                    } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                    </h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="26" viewBox="0 0 80 26" fill="none" class="pxl-post--divider">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.873 2.7627C15.8731 4.45899 16.0664 6.13367 16.8838 7.50489C18.6463 10.461 21.4986 11.7483 25.6084 12.2842C27.1497 12.4851 28.8527 12.5787 30.7236 12.6172C32.6766 12.5771 34.8027 12.5965 37.0986 12.6172C38.5257 12.6044 40.0247 12.5918 41.5967 12.5918H80V13.4082H41.5967C40.0247 13.4082 38.5257 13.3956 37.0986 13.3828C34.8027 13.4035 32.6766 13.4219 30.7236 13.3818C28.8527 13.4203 27.1497 13.5149 25.6084 13.7158C21.4986 14.2517 18.6463 15.539 16.8838 18.4951C16.0664 19.8663 15.8731 21.541 15.873 23.2373V26C15.873 26 15.4996 26 15.127 26V23.2373C15.1269 21.541 14.9336 19.8663 14.1162 18.4951C12.3537 15.539 9.5014 14.2517 5.3916 13.7158C3.85001 13.5148 2.1467 13.4203 0.275391 13.3818C0.183999 13.3837 0.0921491 13.3831 0 13.3848V12.6133C0.0921563 12.6149 0.183992 12.6153 0.275391 12.6172C2.14669 12.5787 3.85001 12.4852 5.3916 12.2842C9.5014 11.7483 12.3537 10.461 14.1162 7.50489C14.9336 6.13367 15.1269 4.45899 15.127 2.7627V2.64338e-06C15.4996 -3.30422e-06 15.873 2.64338e-06 15.873 2.64338e-06V2.7627ZM15.5 6.10157C15.3308 6.72831 15.0906 7.33619 14.752 7.9043C12.8675 11.0647 9.85258 12.4249 5.80078 13C9.85258 13.5751 12.8675 14.9353 14.752 18.0957C15.0905 18.6636 15.3309 19.271 15.5 19.8975C15.6691 19.271 15.9095 18.6636 16.248 18.0957C18.1324 14.9355 21.1468 13.5751 25.1982 13C21.1468 12.4249 18.1324 11.0645 16.248 7.9043C15.9094 7.33619 15.6692 6.72831 15.5 6.10157Z" fill="currentColor" />
                                    </svg>
                                    <?php if ($show_excerpt == 'true'): ?>
                                        <div class="pxl-post--excerpt">
                                            <?php if ($show_excerpt == 'true'): ?>
                                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_button == 'true') : ?>
                                        <a href="<?php if (!empty($service_external_link)) {
                                                        echo esc_url($service_external_link);
                                                    } else {
                                                        echo esc_url(get_permalink($post->ID));
                                                    } ?>" class="btn pxl-button-style-2-default btn-default inline pxl-icon--right pxl-post--readmore">
                                            <div class="pxl-button--icon pxl-button--icon-left">
                                                <i class="flaticon-arrow"></i>
                                            </div>
                                            <span class="pxl--btn-text">
                                                <?php if (!empty($button_text)) {
                                                    echo esc_html($button_text);
                                                } else {
                                                    echo esc_html__('Explore Now', 'northway');
                                                } ?>
                                            </span>
                                            <div class="pxl-button--icon pxl-button--icon-right">
                                                <i class="flaticon-arrow"></i>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="pxl-post--image">
                                <a href="<?php if (!empty($service_external_link)) {
                                                echo esc_url($service_external_link);
                                            } else {
                                                echo esc_url(get_permalink($post->ID));
                                            } ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                            </div>
                        </div>
                <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>