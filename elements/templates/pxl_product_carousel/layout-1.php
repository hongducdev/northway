<?php
if (class_exists('Woocommerce')) {
    $html_id = pxl_get_element_id($settings);
    $editor_title = $widget->get_settings_for_display('title_product_carousel');
    $editor_title = $widget->parse_text_editor($editor_title);

    $query_type = $widget->get_setting('query_type', 'recent_product');
    $post_per_page = $widget->get_setting('post_per_page', 8);

    $product_ids = $widget->get_setting('product_ids', '');
    $categories = $widget->get_setting('taxonomies', '');
    $param_args = [];

    $source = $widget->get_setting('source', '');
    $limit = $widget->get_setting('limit', 4);
    $post_ids = $widget->get_setting('post_ids', '');

    $grid_data = pxl_get_posts_of_grid('product', [
        'source' => $source,
        'limit' => $limit,
        'post_ids' => $post_ids,
    ]);
    
    // Extract variables from the returned array
    $posts = $grid_data['posts'];
    $categories = $grid_data['categories'];
    $query = $grid_data['query'];
    $paged = $grid_data['paged'];
    $max = $grid_data['max'];
    $next_link = $grid_data['next_link'];
    $total = $grid_data['total'];

    $pxl_animate = $widget->get_setting('pxl_animate', '');
    $pxl_animate_delay = $widget->get_setting('pxl_animate_delay', 0);
    $col_xs = $widget->get_setting('col_xs', 1);
    $col_sm = $widget->get_setting('col_sm', 2);
    $col_md = $widget->get_setting('col_md', 3);
    $col_lg = $widget->get_setting('col_lg', 4);
    $col_xl = $widget->get_setting('col_xl', 4);
    $col_xxl = $widget->get_setting('col_xxl', 4);
    if ($col_xxl == 'inherit') {
        $col_xxl = $col_xl;
    }
    $slides_to_scroll = $widget->get_setting('slides_to_scroll', 1);

    $arrows = $widget->get_setting('arrows', 'false');
    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
    $infinite = $widget->get_setting('infinite', false);
    $speed = $widget->get_setting('speed', '500');
    $pagination = $widget->get_setting('pagination', 'false');

    $img_size = $widget->get_setting('img_size', '282x282');

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
        'pagination_type'               => 'bullets',
        'autoplay'                      => (bool)$autoplay,
        'pause_on_hover'                => (bool)$pause_on_hover,
        'pause_on_interaction'          => true,
        'delay'                         => (int)$autoplay_speed,
        'loop'                          => (bool)$infinite,
        'speed'                         => (int)$speed,
        'allow_touch_move'              => true,
        'slides_gutter'                 => 30,
        'center_slide'                  => false,
        'parallax'                      => false,
        'spaceBetween'                  => 30,
        'grabCursor'                    => true,
        'keyboard'                      => true,
        'mousewheel'                    => false,
        'observer'                      => true,
        'observeParents'                => true
    ];
    
    $widget->add_render_attribute('carousel', [
        'class'         => 'pxl-swiper-container',
        'dir'           => is_rtl() ? 'rtl' : 'ltr',
        'data-settings' => wp_json_encode($opts),
        'data-loop'     => $infinite ? 'true' : 'false'
    ]); ?>
    
    <?php if (!empty($posts) && count($posts) > 0):
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
        <div class="pxl-swiper-slider pxl-product-carousel" style="opacity: 1;">
            <div class="pxl-carousel-inner">
                <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                    <?php if (!empty($settings['title_product_carousel'])): ?>
                        <div class="pxl-title"><?php echo pxl_print_html($settings['title_product_carousel']); ?></div>
                    <?php endif; ?>
                    
                    <div class="pxl-swiper-wrapper">
                        <?php
                        $d = 0;
                        foreach ($posts as $post) {
                            setup_postdata($post);
                            global $product;
                            $product = wc_get_product($post->ID);
                            if (!$product) continue;
                            $d++;
                            $term_list = [];
                            $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                            $categories = $product->get_category_ids();
                        ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner<?php echo esc_attr($pxl_animate); ?>" data-wow-delay="<?php echo esc_attr($pxl_animate_delay); ?>ms" data-wow-duration="">
                                    <?php
                                    $image_size = !empty($img_size) ? $img_size : '282x282';
                                    $img_id = get_post_thumbnail_id($product->get_ID());
                                    if (has_post_thumbnail($product->get_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($product->get_ID()), false)):
                                        $img = pxl_get_image_by_size([
                                            'attach_id' => $img_id,
                                            'thumb_size' => $image_size
                                        ]);
                                        $thumbnail = $img['thumbnail'];
                                    ?>
                                        <div class="pxl-item--header">
                                            <a class="pxl-item--details" href="<?php echo esc_url(get_permalink($product->get_ID())); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                            <div class="pxl-item--meta">
                                                <div class="pxl-item--price">
                                                    <span class="price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                                </div>
                                                <div class="pxl-item--actions">
                                                    <div class="woocommerce-btn-item woocommerce-add-to--cart">
                                                        <?php if (!$product->managing_stock() && !$product->is_in_stock()) { ?>
                                                            <span class="out-of-stock"><?php esc_html_e('Out of Stock', 'northway'); ?></span>
                                                        <?php } else { ?>
                                                            <?php woocommerce_template_loop_add_to_cart(); ?>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="woos woocommerce--heart">
                                                        <?php echo do_shortcode('[woosw id="' . esc_attr($product->get_id()) . '"]'); ?>
                                                    </div>
                                                    <?php if (!empty($product_label)) : ?>
                                                        <div class="woocommerce-product-label pxl-l-10"><?php echo esc_html($product_label); ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="pxl-item--content">
                                        <h5 class="pxl-item--title">
                                            <a href="<?php echo esc_url(get_permalink($product->get_ID())); ?>"><?php echo esc_html(get_the_title($product->get_id())); ?></a>
                                        </h5>
                                        <div class="pxl-item--rating">
                                            <?php if ($product->get_rating_count() > 0) {
                                                $average = ((int)$product->get_average_rating());
                                                for ($i = 0; $i < $average; $i++) { ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15" fill="none">
                                                        <path d="M15.5615 5.8672L12.2139 9.02824L13.0045 13.4928C13.0389 13.6881 12.9561 13.8854 12.7906 14.002C12.6971 14.0681 12.5858 14.1014 12.4746 14.1014C12.3891 14.1014 12.3031 14.0816 12.2247 14.0415L8.08553 11.9337L3.94692 14.041C3.76635 14.1337 3.54655 14.1186 3.38102 14.0015C3.2155 13.8848 3.13274 13.6875 3.16713 13.4923L3.95767 9.02772L0.60959 5.8672C0.463414 5.72873 0.41021 5.52153 0.473624 5.3336C0.537039 5.14566 0.705249 5.00771 0.907853 4.97907L5.53443 4.32833L7.60347 0.266673C7.78458 -0.0888911 8.38648 -0.0888911 8.56759 0.266673L10.6366 4.32833L15.2632 4.97907C15.4658 5.00771 15.634 5.14514 15.6974 5.3336C15.7608 5.52205 15.7076 5.72821 15.5615 5.8672Z" fill="#DDB01D"/>
                                                    </svg>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>

            <?php if ($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>

            <?php if ($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 9.73205C-0.333332 8.96225 -0.333334 7.03775 0.999999 6.26795L10 1.0718C11.3333 0.301996 13 1.26425 13 2.80385L13 13.1962C13 14.7358 11.3333 15.698 10 14.9282L1 9.73205Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9.73205C13.3333 8.96225 13.3333 7.03775 12 6.26795L3 1.0718C1.66667 0.301996 7.31543e-07 1.26425 6.64245e-07 2.80385L2.09983e-07 13.1962C1.42685e-07 14.7358 1.66667 15.698 3 14.9282L12 9.73205Z" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="pxl-no-products">
            <p><?php esc_html_e('No products found.', 'northway'); ?></p>
        </div>
    <?php endif; ?>
<?php } ?>
