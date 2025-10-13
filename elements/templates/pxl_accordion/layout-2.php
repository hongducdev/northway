<?php
$active = intval($settings['active']);
$wg_id = pxl_get_element_id($settings);
$source = $post_ids = [];

$service_limit = isset($settings['service_limit']) ? $settings['service_limit'] : 4;
$service_orderby = isset($settings['service_orderby']) ? $settings['service_orderby'] : 'menu_order';
$service_order = isset($settings['service_order']) ? $settings['service_order'] : 'ASC';

$service_query = pxl_get_posts_of_grid('service', ['source' => $source, 'orderby' => $service_orderby, 'order' => $service_order, 'limit' => $service_limit]);
$accordion_items = [];

extract($service_query);
$service_posts = $posts;

if (!empty($service_posts)) {
    $counter = 1;
    foreach ($service_posts as $post) {
        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
        $service_feature = get_post_meta($post->ID, 'service_feature', true);
        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
        
        $icon_data = [];
        if ($service_icon_type === 'icon' && !empty($service_icon_font)) {
            $icon_data = [
                'library' => 'fa-solid',
                'value' => $service_icon_font
            ];
        } elseif ($service_icon_type === 'image' && !empty($service_icon_img)) {
            $image_url = false;
            if (is_numeric($service_icon_img)) {
                $image_url = wp_get_attachment_image_url($service_icon_img, 'full');
            } 
            elseif (is_array($service_icon_img) && isset($service_icon_img['url'])) {
                $image_url = $service_icon_img['url'];
            }
            elseif (is_array($service_icon_img) && isset($service_icon_img['ID'])) {
                $image_url = wp_get_attachment_image_url($service_icon_img['ID'], 'full');
            }
            elseif (is_string($service_icon_img) && filter_var($service_icon_img, FILTER_VALIDATE_URL)) {
                $image_url = $service_icon_img;
            }
            
            if ($image_url) {
                $icon_data = [
                    'library' => 'svg',
                    'value' => ['url' => $image_url]
                ];
            }
        }
        
        $accordion_items[] = [
            '_id' => 'service_' . $post->ID,
            'number' => sprintf('%02d', $counter),
            'title' => $post->post_title,
            'desc' => $post->post_excerpt ? $post->post_excerpt : wp_trim_words($post->post_content, 20),
            'pxl_icon' => $icon_data,
            'service_features' => $service_feature ? $service_feature : []
        ];
        
        $counter++;
    }
}

$accordion = !empty($accordion_items) ? $accordion_items : $widget->get_settings('accordion');

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $number = isset($value['number']) ? $value['number'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
            $widget->add_render_attribute($icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ]); ?>

            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                <?php if (!empty($value['pxl_icon']['value'])) : ?>
                    <span class="pxl-title--icon">
                        <?php 
                        if (isset($value['pxl_icon']['value']['url'])) {
                            $icon_url = $value['pxl_icon']['value']['url'];
                            
                            if (strpos($icon_url, '.svg') !== false) {
                                $svg_path = str_replace(site_url(), ABSPATH, $icon_url);
                                if (file_exists($svg_path)) {
                                    $svg_content = file_get_contents($svg_path);
                                    $svg_content = preg_replace('/fill="[^"]*"/', 'fill="currentColor"', $svg_content);
                                    echo wp_kses($svg_content, [
                                        'svg' => [
                                            'xmlns' => [],
                                            'width' => [],
                                            'height' => [],
                                            'viewBox' => [],
                                            'fill' => [],
                                            'stroke' => [],
                                            'stroke-width' => []
                                        ],
                                        'path' => [
                                            'd' => [],
                                            'fill' => [],
                                            'stroke' => [],
                                            'stroke-width' => []
                                        ],
                                        'circle' => [
                                            'cx' => [],
                                            'cy' => [],
                                            'r' => [],
                                            'fill' => [],
                                            'stroke' => [],
                                            'stroke-width' => []
                                        ],
                                        'rect' => [
                                            'x' => [],
                                            'y' => [],
                                            'width' => [],
                                            'height' => [],
                                            'fill' => [],
                                            'stroke' => [],
                                            'stroke-width' => []
                                        ],
                                        'g' => [
                                            'fill' => [],
                                            'stroke' => [],
                                            'stroke-width' => []
                                        ]
                                    ]);
                                } else {
                                    echo '<img src="' . esc_url($icon_url) . '">';
                                }
                            } else {
                                echo '<img src="' . esc_url($icon_url) . '">';
                            }
                        } else {
                            \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']);
                        }
                        ?>
                    </span>
                <?php endif; ?>
                    <div class="pxl-title--wrapper">
                        <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                        <div class="pxl-accordion--toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="23" viewBox="0 0 17 23" fill="none">
                                <path d="M8.5 0.141602C9.83771 0.846872 16.5091 4.76583 16.8623 12.8535C17.0304 16.7013 15.5056 19.1019 13.7119 20.5938C12.0047 22.0136 10.0471 22.6127 9.05566 22.8418V18.4258L13.1934 14.8496L13.1924 14.8486C13.3961 14.6727 13.4427 14.3814 13.3174 14.1543L13.2529 14.0615C13.0535 13.8264 12.7014 13.8005 12.4688 14.001L9.05566 16.9512V12.5947L11.6914 10.3164C11.8954 10.1405 11.9418 9.84828 11.8164 9.62109L11.752 9.52832C11.5525 9.29312 11.2005 9.26724 10.9678 9.46777L9.05566 11.1201V6.55762C9.05566 6.24985 8.80833 5.99805 8.5 5.99805C8.19167 5.99805 7.94434 6.24985 7.94434 6.55762V11.1201L6.03223 9.46777C5.82872 9.29159 5.53423 9.29065 5.33008 9.4502L5.24805 9.52832C5.04805 9.76267 5.07561 10.1155 5.30859 10.3164L7.94434 12.5947V16.9512L4.53125 14.001C4.32758 13.8246 4.03234 13.8234 3.82812 13.9834L3.74707 14.0615C3.54712 14.2957 3.57401 14.6487 3.80664 14.8496L7.94434 18.4258V22.8418C6.95295 22.6127 4.99532 22.0136 3.28809 20.5938C1.49439 19.1019 -0.0303669 16.7013 0.137695 12.8535C0.490505 4.76577 7.16196 0.846821 8.5 0.141602Z" fill="currentColor" stroke="transparent" stroke-width="0.25"/>
                            </svg>
                        </div>
                    </div>
                </<?php pxl_print_html($settings['title_tag']); ?>>

                <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>

                    <div class="pxl-accordion--readmore">
                        <div class="pxl-accordion--readmore-divider"></div>
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>" class="pxl-accordion--readmore-button">
                            <span><?php echo esc_html($settings['readmore_text']); ?></span>
                            <div class="pxl-accordion--readmore-icon">
                                <i class="bi-arrow-right-short"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>