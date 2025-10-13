<?php
$post_term_options = pxl_get_grid_term_options('product');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_product_carousel',
        'title' => esc_html__('Case Product Carousel', 'northway'),
        'icon' => 'eicon-product-categories',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'swiper',
            'pxl-swiper',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_layout',
                    'label' => esc_html__('Layout', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'northway'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_product_carousel/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'title_product_carousel',
                            'label' => esc_html__('Heading', 'northway'),
                            'type'  => \Elementor\Controls_Manager::TEXTAREA,
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"]',
                        ),
                        array(
                            'name'    => 'query_type',
                            'label'   => esc_html__('Select Query Type', 'northway'),
                            'type'    => 'select',
                            'default' => 'recent_product',
                            'options' => [
                                'recent_product'   => esc_html__('Recent Products', 'northway'),
                                'best_selling'     => esc_html__('Best Selling', 'northway'),
                                'featured_product' => esc_html__('Featured Products', 'northway'),
                                'top_rate'         => esc_html__('High Rate', 'northway'),
                                'on_sale'          => esc_html__('On Sale', 'northway'),
                                'recent_review'    => esc_html__('Recent Review', 'northway'),
                                'deals'            => esc_html__('Product Deals', 'northway'),
                                'separate'         => esc_html__('Product separate', 'northway'),
                            ]
                        ),
                        array(
                            'name'     => 'post_per_page',
                            'label'    => esc_html__('Post per page', 'northway'),
                            'type'     => 'text',
                            'default'  => '12'
                        ),
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => pxl_get_product_grid_term_options(),
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '4',
                        ),
                        array(
                            'name'  => 'max_height',
                            'label' => esc_html__('Max Height', 'northway'),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', 'custom'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .swiper-vertical' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name'  => 'section_display',
                    'label' => esc_html__('Display', 'northway'),
                    'tab'   => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls'  => array(
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'show_rating',
                            'label' => esc_html__('Show Rating', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
                            ],
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_general',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__('Heading Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography',
                            'label' => esc_html__('Heading Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product-carousel .pxl-title',
                        ),
                        array(
                            'name'  => 'heading_arrow',
                            'label' => esc_html__('Arrows', 'northway'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                            'condition' => [
                                'arrows' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'color_arrows',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .pxl-swiper-arrow-wrap .pxl-swiper-arrow' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'arrows' => 'true',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_product',
                    'label' => esc_html__('Product', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'  => 'bg_color_image',
                            'label' => esc_html__('Background Color Image', 'northway'),
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .pxl-carousel-inner .pxl-product-header' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'  => 'heading_title',
                            'label' => esc_html__('Title', 'northway'),
                            'type'  => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .pxl-carousel-inner .woocommerce-product-content a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product-carousel .pxl-carousel-inner .woocommerce-product-content a',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_price',
                    'label' => esc_html__('Price', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Price Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product--price ins .amount' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'price_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-product-carousel .woocommerce-product--price ',
                        ),


                        array(
                            'name' => 'sale_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-product-carousel .woocommerce-product--price del .amount' => 'color: {{VALUE}};',
                            ],
                        ),

                    ),
                ),
                northway_widget_animation_settings()
            ),
        ),
    ),
    northway_get_class_widget_path()
);
