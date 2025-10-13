 <?php
    $col_xs = $widget->get_setting('col_xs', '');
    $col_sm = $widget->get_setting('col_sm', '');
    $col_md = $widget->get_setting('col_md', '');
    $col_lg = $widget->get_setting('col_lg', '');
    $col_xl = $widget->get_setting('col_xl', '');
    $col_xxl = $widget->get_setting('col_xxl', '');
    if ($col_xxl == 'inherit') {
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
    $widget->add_render_attribute('carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts)
    ]);
    $pxl_g_id = uniqid();
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    if (isset($settings['slider']) && !empty($settings['slider']) && count($settings['slider'])): ?>
     <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-slider pxl-slider3 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
         <div class="pxl-carousel-inner">
             <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                 <div class="pxl-swiper-wrapper">
                     <?php foreach ($settings['slider'] as $key => $value):
                            $image = isset($value['image']) ? $value['image'] : '';
                            $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                            $title = isset($value['title']) ? $value['title'] : '';
                            $desc = isset($value['desc']) ? $value['desc'] : '';
                            $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                            $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
                            $phone_text = isset($value['phone_text']) ? $value['phone_text'] : '';
                            $phone_link = isset($value['phone_link']) ? $value['phone_link'] : '';
                            $img_size = isset($value['img_size']) ? $value['img_size'] : '';
                            $item_id = isset($value['_id']) ? $value['_id'] : '';

                            if (! empty($btn_link['url'])) {
                                $widget->add_render_attribute('button', 'href', $btn_link['url']);

                                if ($btn_link['is_external']) {
                                    $widget->add_render_attribute('button', 'target', '_blank');
                                }

                                if ($btn_link['nofollow']) {
                                    $widget->add_render_attribute('button', 'rel', 'nofollow');
                                }
                            }

                            if (! empty($phone_link['url'])) {
                                $widget->add_render_attribute('phone', 'href', $phone_link['url']);

                                if ($phone_link['is_external']) {
                                    $widget->add_render_attribute('phone', 'target', '_blank');
                                }

                                if ($phone_link['nofollow']) {
                                    $widget->add_render_attribute('phone', 'rel', 'nofollow');
                                }
                            }
                        ?>
                         <div class="pxl-swiper-slide">
                             <div class="pxl-item">
                                 <?php if (!empty($image['id'])) {
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
                                     <div class="pxl-item">
                                         <?php if (!empty($image['id'])) { ?>
                                             <div class="pxl-item--image">
                                                 <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                                             </div>
                                         <?php } ?>
                                         <div class="pxl-item--inner ">
                                             <div class="pxl-item--subtitle">
                                                 <?php if (!empty($sub_title)) : ?>
                                                     <div class="pxl-item--subtitle-icon">
                                                         <svg xmlns="http://www.w3.org/2000/svg" width="41" height="30" viewBox="0 0 41 30" fill="none">
                                                             <path d="M18.9035 20.307C18.9035 20.307 17.8388 14.1233 21.7447 7.44227C25.6506 0.76127 36.2357 -0.448503 40.9585 0.126412C40.9585 0.126412 41.6868 12.3345 37.0525 17.8779C32.4183 23.4214 25.1987 22.5372 23.0939 22.4841C22.0734 23.4983 21.171 24.6249 20.4037 25.8423C19.648 27.0379 18.9634 28.2771 18.3534 29.5533C18.1138 30.0056 17.7272 30.0724 17.3405 29.9389C16.9539 29.8054 17.022 29.1664 17.2616 28.5002C17.5012 27.834 19.4725 22.9786 23.9475 16.5115C28.4225 10.0444 33.0391 7.34146 34.8852 5.95594C34.8852 5.94913 26.895 7.19296 18.9035 20.307Z" fill="currentColor" />
                                                             <path d="M17.7667 21.604C17.7667 21.604 17.3936 16.0864 13.0262 12.9421C8.65876 9.79779 1.78494 11.1029 0.00012207 11.8522C0.00012207 11.8522 0.826506 18.649 4.9557 22.4609C9.08488 26.2728 15.779 23.9268 17.0723 23.1271C17.0723 23.1271 11.5218 16.8602 4.77462 14.66C4.76918 14.656 10.7349 14.3726 17.7667 21.604Z" fill="currentColor" />
                                                         </svg>
                                                     </div>
                                                     <?php echo esc_html($sub_title); ?>
                                                 <?php endif; ?>
                                             </div>
                                             <?php if (!empty($title)) : ?>
                                                 <h1 class="pxl-item--title elementor-repeater-item-<?php echo esc_attr($item_id); ?>">
                                                     <?php echo esc_html($title); ?>
                                                 </h1>
                                             <?php endif; ?>
                                             <?php if (!empty($desc)) : ?>
                                                 <p class="pxl-item--desc elementor-repeater-item-<?php echo esc_attr($item_id); ?>">
                                                     <?php echo esc_html($desc); ?>
                                                 </p>
                                             <?php endif; ?>
                                             <div class="pxl-item--meta">
                                                 <a <?php pxl_print_html($widget->get_render_attribute_string('button')); ?> class="btn btn-default">
                                                     <?php echo esc_html($btn_text); ?>
                                                 </a>

                                                 <a <?php pxl_print_html($widget->get_render_attribute_string('phone')); ?> class="pxl-item--phone">
                                                     <div class="pxl-item--phone-icon">
                                                         <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                             <path d="M4.91864 2.59088C4.67367 2.07835 4.05916 1.86184 3.54714 2.10791L2.08923 2.80931C1.93137 2.88523 1.7811 2.9718 1.63861 3.06696C1.62927 3.0732 1.61978 3.07921 1.61051 3.08552C1.58018 3.10618 1.55051 3.12766 1.52091 3.14914C1.51416 3.15404 1.50749 3.15904 1.50077 3.16398C1.47146 3.18557 1.44239 3.20735 1.41382 3.22972C1.40302 3.23818 1.39219 3.2466 1.38149 3.25517C1.355 3.2764 1.32884 3.29795 1.30302 3.31985C1.29394 3.32755 1.28499 3.33539 1.27599 3.34318C1.25276 3.36327 1.22973 3.38352 1.20707 3.40414C1.15627 3.45033 1.10708 3.498 1.05915 3.54676C0.964367 3.64322 0.875102 3.74435 0.79196 3.85001C0.743821 3.91116 0.697676 3.97374 0.653591 4.03768C0.642239 4.05415 0.63127 4.07087 0.620192 4.08752C0.602992 4.11336 0.585832 4.1392 0.569297 4.16545C0.563467 4.17471 0.55808 4.18424 0.552333 4.19355C0.534044 4.22316 0.516227 4.25304 0.498788 4.28315C0.488988 4.30007 0.479158 4.31697 0.469629 4.33404C0.461764 4.34813 0.453983 4.36226 0.446303 4.37645C0.430541 4.40559 0.415154 4.43491 0.40018 4.46446C0.39289 4.47884 0.386076 4.49345 0.378974 4.50793C0.365677 4.53505 0.352375 4.56214 0.339743 4.58958C0.332297 4.60575 0.32522 4.62207 0.318007 4.63835C0.307912 4.66114 0.297424 4.68375 0.287788 4.70674C0.197026 4.92329 0.127236 5.14895 0.0789099 5.38057C0.0758174 5.3954 0.0728095 5.41023 0.0698974 5.42511C0.0637873 5.45631 0.0577129 5.48754 0.0524025 5.51894C0.0492164 5.53779 0.0468163 5.55676 0.0439201 5.57567C0.0394102 5.60512 0.0349983 5.6346 0.0311965 5.66421C0.0291118 5.68044 0.0272353 5.6967 0.0253649 5.71298C0.0221242 5.74119 0.0194757 5.76947 0.0168825 5.79781C0.0147341 5.82128 0.0127519 5.84477 0.0110509 5.86832C0.00943246 5.89073 0.00802013 5.91317 0.00680968 5.93565C0.00553532 5.95931 0.00391852 5.98296 0.00309864 6.00669C0.00203888 6.03739 0.00180141 6.06813 0.00150819 6.09894C0.00137147 6.11324 0.000948437 6.12755 0.000978042 6.14188C0.00104867 6.17541 0.00158092 6.20898 0.00256849 6.24261C0.00305515 6.25921 0.00344744 6.27582 0.00415893 6.29245C0.00542287 6.32194 0.00748417 6.35143 0.00946042 6.38098C0.0108053 6.40111 0.0120242 6.42127 0.0137016 6.44142C0.0217065 6.53753 0.0330091 6.63393 0.0486914 6.73036C0.426582 9.05046 1.42334 12.3637 4.03011 14.9706C6.63696 17.5775 9.95062 18.5747 12.2707 18.9526C12.3677 18.9684 12.4647 18.9796 12.5613 18.9876C12.5802 18.9892 12.5991 18.99 12.618 18.9913C12.6475 18.9933 12.677 18.9953 12.7065 18.9966C12.7338 18.9978 12.761 18.9987 12.7882 18.9993C12.8057 18.9996 12.8232 18.9997 12.8406 18.9998C12.8658 19 12.8909 19.0001 12.9159 18.9998C12.9421 18.9995 12.9683 18.9991 12.9944 18.9982C13.0181 18.9974 13.0418 18.9958 13.0654 18.9945C13.0879 18.9933 13.1103 18.9919 13.1328 18.9903C13.1584 18.9884 13.184 18.9863 13.2096 18.9839C13.2273 18.9822 13.245 18.9805 13.2626 18.9786C13.2933 18.9753 13.3239 18.9721 13.3544 18.968C13.3751 18.9652 13.3957 18.9621 13.4164 18.959C13.4374 18.9558 13.4585 18.953 13.4795 18.9494C13.5155 18.9434 13.5513 18.9364 13.5871 18.9293C13.5972 18.9273 13.6072 18.925 13.6173 18.9229C13.6897 18.9079 13.7614 18.8908 13.8326 18.8715C13.9199 18.8478 14.0061 18.8209 14.0913 18.7909C14.1565 18.768 14.2211 18.7437 14.2848 18.7172C14.3093 18.707 14.3336 18.6962 14.3579 18.6854C14.3784 18.6764 14.3991 18.6678 14.4194 18.6584C14.4395 18.6491 14.4594 18.6394 14.4793 18.6298C14.5017 18.6189 14.524 18.6077 14.5461 18.5964C14.5662 18.5861 14.5862 18.5757 14.606 18.5651C14.6259 18.5545 14.6457 18.5437 14.6654 18.5327C14.6878 18.5202 14.7101 18.5075 14.7322 18.4946C14.7493 18.4846 14.7662 18.4741 14.7831 18.4638C14.8058 18.45 14.8285 18.4362 14.851 18.4219C14.8707 18.4094 14.8903 18.3967 14.9098 18.3838C14.9261 18.373 14.9425 18.3625 14.9586 18.3514C14.9826 18.3349 15.006 18.3176 15.0296 18.3005C15.1792 18.1925 15.3207 18.0729 15.4532 17.9427C15.4678 17.9283 15.4828 17.9143 15.4972 17.8997C15.515 17.8817 15.5323 17.8631 15.5497 17.8446C15.5655 17.8279 15.5814 17.8113 15.5969 17.7942C15.6115 17.7781 15.626 17.7618 15.6404 17.7454C15.6571 17.7263 15.6738 17.7071 15.6902 17.6877C15.7105 17.6636 15.7304 17.6392 15.7501 17.6145C15.7584 17.6041 15.7668 17.5937 15.775 17.5832C15.7911 17.5627 15.8066 17.5416 15.8222 17.5207C15.8396 17.4973 15.8572 17.474 15.8742 17.4501C15.8819 17.4393 15.8893 17.4282 15.897 17.4173C15.9142 17.3924 15.9312 17.3673 15.9479 17.342C15.9622 17.3201 15.9763 17.298 15.9903 17.2757C15.9932 17.2711 15.9964 17.2666 15.9993 17.2619C16.069 17.1497 16.1335 17.0333 16.1917 16.912L16.8926 15.4536C17.1389 14.9419 16.9226 14.3276 16.4101 14.0826L12.4012 12.1677C11.7928 11.8769 11.0632 12.1157 10.7439 12.7095L10.4332 13.2879L10.3898 13.361C10.1622 13.7177 9.75422 13.9243 9.32841 13.8848C8.70442 13.8268 7.76545 13.5035 6.63155 12.3696C5.49759 11.2357 5.17413 10.2965 5.11638 9.67273C5.07697 9.24694 5.2833 8.83868 5.64017 8.61136L5.71333 8.56841L6.29172 8.25721C6.8855 7.93798 7.12417 7.20822 6.83353 6.59994L4.91864 2.59088Z" fill="white" />
                                                             <path d="M10.5462 5.38481C10.1554 5.38481 9.83851 5.7018 9.83842 6.09258C9.83838 6.48339 10.1554 6.80034 10.5462 6.80034C10.9881 6.80034 11.4037 6.97243 11.7162 7.2849C12.0286 7.59737 12.2008 8.01311 12.2008 8.45496C12.2008 8.65036 12.28 8.8274 12.408 8.95543C12.5361 9.08334 12.7128 9.16268 12.908 9.16272C13.2988 9.16272 13.6157 8.84571 13.6157 8.45496C13.6157 7.63499 13.2964 6.86375 12.7166 6.28396C12.1368 5.70426 11.366 5.38482 10.5462 5.38481Z" fill="currentColor" />
                                                             <path d="M10.8796 2.69267C10.4888 2.69276 10.1719 3.00963 10.1719 3.40043C10.1719 3.59566 10.2513 3.77237 10.3792 3.90037C10.5072 4.02838 10.6843 4.10813 10.8796 4.10819C13.0926 4.10823 14.8929 5.90856 14.8929 8.12149C14.8929 8.51216 15.2099 8.82864 15.6006 8.82872C15.9914 8.82872 16.3082 8.51223 16.3084 8.12149C16.3083 5.12811 13.873 2.69267 10.8796 2.69267Z" fill="currentColor" />
                                                             <path d="M11.2136 0C10.8228 0 10.5058 0.316907 10.5059 0.707761C10.5059 0.903152 10.5851 1.08018 10.7132 1.20823C10.8412 1.33621 11.0183 1.41548 11.2136 1.41552C12.9126 1.41559 14.5117 2.07932 15.7167 3.28433C16.9217 4.48936 17.5854 6.08847 17.5855 7.78749C17.5854 8.17829 17.9024 8.49522 18.2932 8.49525C18.6841 8.49525 19.001 8.17834 19.001 7.78749C19.0009 5.7104 18.19 3.75578 16.7176 2.28339C15.2453 0.81106 13.2907 5.52418e-05 11.2136 0Z" fill="currentColor" />
                                                         </svg>
                                                     </div>
                                                     <?php echo esc_html($phone_text); ?>
                                                 </a>
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
         <?php if ($pagination !== false || $arrows !== false): ?>
             <div class="pxl-swiper-bottom pxl-flex-middle">
                 <?php if ($pagination !== false): ?>
                     <div class="pxl-swiper-dots style-1"></div>
                 <?php endif; ?>
                 <?php if ($arrows !== false): ?>
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