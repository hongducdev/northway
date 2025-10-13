 <?php
 $col_xs = $widget->get_setting('col_xs', '');
 $col_sm = $widget->get_setting('col_sm', '');
 $col_md = $widget->get_setting('col_md', '');
 $col_lg = $widget->get_setting('col_lg', '');
 $col_xl = $widget->get_setting('col_xl', '');
 $col_xxl = $widget->get_setting('col_xxl', '');
 if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$effect = $widget->get_setting('effect', 'slide');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => $effect, 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$pxl_g_id = uniqid();
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
if(isset($settings['slider_2']) && !empty($settings['slider_2']) && count($settings['slider_2'])): ?>
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-slider pxl-slider2 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>"<?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider_2'] as $key => $value):
                        $image = isset($value['image_2']) ? $value['image_2'] : '';
                        $sub_title = isset($value['sub_title_2']) ? $value['sub_title_2'] : '';
                        $title = isset($value['title_2']) ? $value['title_2'] : '';
                        $desc = isset($value['desc_2']) ? $value['desc_2'] : '';
                        $btn_text = isset($value['btn_text_2_1']) ? $value['btn_text_2_1'] : '';
                        $btn_link = isset($value['btn_link_2_1']) ? $value['btn_link_2_1'] : '';
                        $btn_text_2 = isset($value['btn_text_2_2']) ? $value['btn_text_2_2'] : '';
                        $btn_link_2 = isset($value['btn_link_2_2']) ? $value['btn_link_2_2'] : '';
                        $img_size = isset($value['img_size']) ? $value['img_size'] : '';

                        if ( ! empty( $btn_link['url'] ) ) {
                            $widget->add_render_attribute( 'button', 'href', $btn_link['url'] );

                            if ( $btn_link['is_external'] ) {
                                $widget->add_render_attribute( 'button', 'target', '_blank' );
                            }

                            if ( $btn_link['nofollow'] ) {
                                $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
                            }
                        }

                        if ( ! empty( $btn_link_2['url'] ) ) {
                            $widget->add_render_attribute( 'button2', 'href', $btn_link_2['url'] );

                            if ( $btn_link_2['is_external'] ) {
                                $widget->add_render_attribute( 'button2', 'target', '_blank' );
                            }

                            if ( $btn_link_2['nofollow'] ) {
                                $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
                            }
                        }
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item">
                                <?php if(!empty($image['id'])) { 
                                    $img_classes = 'no-lazyload';
                                    if ($effect === 'gl') {
                                        $img_classes .= ' swiper-gl-image';
                                    }

                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class'      => $img_classes,
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    $thumbnail_url = $img['url'];
                                    ?>
                                    <div class="pxl-item--wrapper">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <div class="pxl-item--inner ">
                                            <div class="pxl-item--body">
                                                <div class="pxl-item--subtitle">
                                                    <?php if(!empty($sub_title)) : ?>
                                                        <div class="pxl-item--subtitle-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="22" viewBox="0 0 29 22" fill="none">
                                                                <path d="M29 1.34694V7.21699C29 13.8833 23.7425 19.3061 17.2795 19.3061H15.6054C15.6054 17.8936 15.6363 17.1426 15.4469 15.9658L22.3489 8.8028C22.8573 8.27455 22.8546 7.42149 22.3435 6.8971C21.8317 6.3727 21.0047 6.37551 20.4963 6.90341L14.5937 13.0302C13.7857 11.1561 12.5312 9.53275 10.9713 8.30332C12.5138 3.48591 16.9218 0 22.1024 0H27.6941C28.4151 0 29 0.603316 29 1.34694Z" fill="currentColor"/>
                                                                <path d="M3.90126 8.53062H1.30586C0.584577 8.53062 0 9.13358 0 9.87755V12.5714C0 17.7705 4.07878 22 9.09241 22H10.3823V21.2087L5.57066 16.2148C5.06226 15.6873 5.06498 14.8342 5.57644 14.3098C6.0879 13.7858 6.91495 13.7882 7.42301 14.3158L12.6142 19.7035C12.8573 19.9561 12.994 20.2974 12.994 20.6531V17.9592C12.994 12.7601 8.91523 8.53062 3.90126 8.53062Z" fill="currentColor"/>
                                                            </svg>
                                                        </div>
                                                        <?php echo esc_html($sub_title); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(!empty($title)) : ?>
                                                    <h1 class="pxl-item--title">
                                                        <?php echo esc_html($title); ?>
                                                    </h1>
                                                <?php endif; ?>
                                                <?php if(!empty($desc)) : ?>
                                                    <p class="pxl-item--desc">
                                                        <?php echo esc_html($desc); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <div class="pxl-item--meta">
                                                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="btn btn-text-nina">
                                                        <span class="pxl--btn-text" data-text="<?php echo pxl_print_html($btn_text); ?>">
                                                            <?php
                                                            $chars = str_split($btn_text);
                                                            foreach ($chars as $value) {
                                                                if ($value == ' ') {
                                                                    echo '<span class="spacer">&nbsp;</span>';
                                                                } else {
                                                                    echo '<span>' . $value . '</span>';
                                                                }
                                                            } ?>
                                                        </span>
                                                    </a>

                                                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?> class="btn btn-default">
                                                        <?php echo esc_html($btn_text_2); ?>
                                                        <i class="bi-arrow-right-short"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-swiper-arrow-wrap style-1">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" style="transform: scalex(-1);">
                            <i class="bi-play-fill"></i>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                            <i class="bi-play-fill"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
