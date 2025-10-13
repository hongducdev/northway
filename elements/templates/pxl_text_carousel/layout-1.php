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
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
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
if(isset($settings['text2']) && !empty($settings['text2']) && count($settings['text2'])): ?>
    <div class="pxl-swiper-slider pxl-text-carousel pxl-text-carousel1 <?php echo esc_attr($settings['style']); ?>" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['text2'] as $key => $value):
                        $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                        $widget->add_render_attribute( $icon_key, [
                            'class' => $value['pxl_icon'],
                            'aria-hidden' => 'true',
                        ] );
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        $title2 = isset($value['title2']) ? $value['title2'] : '';
                        $desc2 = isset($value['desc2']) ? $value['desc2'] : '';
                        $number = isset($value['number']) ? $value['number'] : '';
                        if ( ! empty( $value['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                            if ( $value['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $value['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--front">
                                    <?php if(!empty($number)): ?>
                                        <div class="pxl-item--front-number"><?php echo pxl_print_html($number); ?></div>
                                    <?php endif; ?>
                                    <div class="pxl-item--front-icon">
                                        <?php if(!empty($value['pxl_icon'])){
                                        \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ], 'i' );
                                    } ?>
                                    </div>
                                    <h5 class="pxl-item--title el-empty"><?php echo pxl_print_html($title2); ?></h5>
                                </div>
                                <div class="pxl-item--back">
                                    <h5 class="pxl-item--back-title el-empty"><?php echo pxl_print_html($title2); ?></h5>
                                    <div class="pxl-item--back-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="25" viewBox="0 0 39 25" fill="none">
                                            <path d="M17.9812 16.6664C17.9812 16.6664 16.9685 11.5913 20.6839 6.10804C24.3993 0.624791 34.468 -0.368097 38.9604 0.103749C38.9604 0.103749 39.6532 10.1232 35.245 14.6728C30.8368 19.2224 23.9693 18.4968 21.9673 18.4532C20.9966 19.2856 20.1381 20.2102 19.4083 21.2093C18.6895 22.1906 18.0383 23.2076 17.458 24.2551C17.2301 24.6263 16.8623 24.6811 16.4945 24.5715C16.1268 24.4619 16.1915 23.9375 16.4194 23.3908C16.6474 22.844 18.5225 18.8591 22.7792 13.5513C27.0359 8.24364 31.4273 6.0253 33.1833 4.88817C33.1833 4.88258 25.5829 5.90343 17.9812 16.6664Z" fill="currentColor"/>
                                            <path d="M16.8999 17.7309C16.8999 17.7309 16.545 13.2025 12.3907 10.6219C8.23626 8.04127 1.69776 9.11242 0 9.72739C0 9.72739 0.786072 15.3057 4.71384 18.4342C8.6416 21.5627 15.0092 19.6373 16.2394 18.9809C16.2394 18.9809 10.9597 13.8376 4.5416 12.0318C4.53642 12.0285 10.2112 11.7959 16.8999 17.7309Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <p class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc2); ?></p>
                                    <div class="pxl-item--back-blur">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="271" height="319" viewBox="0 0 271 319" fill="none">
                                            <g filter="url(#filter0_f_387_47)">
                                                <path d="M-48.5415 331.637C-34.1057 362.357 48.7315 468.613 130.358 386.044C173.572 342.332 90.9904 296.991 54.5656 283.044C-16.5587 255.811 46.0827 104.038 -63.0698 163.939C-150.762 235.941 -62.9773 300.917 -48.5415 331.637Z" fill="#97B545" fill-opacity="0.4"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_f_387_47" x="-251.507" y="0.0629883" width="544.074" height="566.769" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                <feGaussianBlur stdDeviation="75" result="effect1_foregroundBlur_387_47"/>
                                                </filter>
                                            </defs>
                                            </svg>
                                    </div>
                                </div>
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
                    <div class="pxl-wrap-arrow pxl-flex-middle">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" style="transform: translateY(-50%) scalex(-1);"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none"><path d="M1.49882 9.64679C1.58656 9.64729 1.67353 9.63048 1.75476 9.5973C1.83598 9.56413 1.90986 9.51524 1.97215 9.45345L5.97215 5.45345C6.09632 5.32855 6.16602 5.15958 6.16602 4.98345C6.16602 4.80733 6.09632 4.63836 5.97215 4.51345L1.97215 0.513454C1.84462 0.404237 1.68057 0.347166 1.51278 0.353647C1.345 0.360127 1.18584 0.429682 1.06711 0.548412C0.948382 0.667141 0.878827 0.826301 0.872346 0.994085C0.865865 1.16187 0.922936 1.32592 1.03215 1.45345L4.55882 4.98012L1.03215 8.50679C0.93854 8.59964 0.874559 8.71816 0.848302 8.84737C0.822045 8.97657 0.834692 9.11067 0.884642 9.23269C0.934593 9.35471 1.0196 9.45918 1.12893 9.53289C1.23825 9.6066 1.36697 9.64624 1.49882 9.64679Z" fill="white"/>
                        </svg></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                          <path d="M1.49882 9.64679C1.58656 9.64729 1.67353 9.63048 1.75476 9.5973C1.83598 9.56413 1.90986 9.51524 1.97215 9.45345L5.97215 5.45345C6.09632 5.32855 6.16602 5.15958 6.16602 4.98345C6.16602 4.80733 6.09632 4.63836 5.97215 4.51345L1.97215 0.513454C1.84462 0.404237 1.68057 0.347166 1.51278 0.353647C1.345 0.360127 1.18584 0.429682 1.06711 0.548412C0.948382 0.667141 0.878827 0.826301 0.872346 0.994085C0.865865 1.16187 0.922936 1.32592 1.03215 1.45345L4.55882 4.98012L1.03215 8.50679C0.93854 8.59964 0.874559 8.71816 0.848302 8.84737C0.822045 8.97657 0.834692 9.11067 0.884642 9.23269C0.934593 9.35471 1.0196 9.45918 1.12893 9.53289C1.23825 9.6066 1.36697 9.64624 1.49882 9.64679Z" fill="white"/>
                      </svg></div>
                  </div>
              <?php endif; ?>
          </div>
      <?php endif; ?>
  </div>
<?php endif; ?>
