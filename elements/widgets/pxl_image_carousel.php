<?php
$slides_to_show = range(1, 10);
$slides_to_show = array_combine($slides_to_show, $slides_to_show);

pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_carousel',
        'title' => esc_html__('Case Image Carousel', 'northway'),
        'icon' => 'eicon-media-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
            'pxl-effect-gl',
            'pxl-image-comparison',
            'gsap',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,

                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image_2',
                                    'label' => esc_html__('Image 2', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_content_2',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2', '3']
                    ],
                    'controls' => array(
                        array(
                            'name' => 'images_2',
                            'label' => esc_html__('List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_2',
                                    'label' => esc_html__('Image', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'url_video',
                                    'label' => esc_html__('Url Video', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_4',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['4'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'images_4',
                            'label' => esc_html__('List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image_4_before',
                                    'label' => esc_html__('Image Before', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image_4_after',
                                    'label' => esc_html__('Image After', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            )
                        ),
                    )
                ),

                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_img',
                            'label' => esc_html__('Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'image',
                            'options' => [
                                'image' => esc_html__('Image', 'northway'),
                                'bgr' => esc_html__('Background', 'northway'),
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'style_scroll',
                            'label' => esc_html__('Scroll', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'northway'),
                                'scroll-ltr' => esc_html__(' Left To Right', 'northway'),
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image,{{WRAPPER}} .pxl-image-carousel canvas' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'height_img',
                            'label' => esc_html__('Height', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => [
                                'style_img' => ['bgr'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image ' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'max_height_img',
                            'label' => esc_html__('Max Height', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 500,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image ' => 'max-height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-swiper-slide' => 'padding: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} 0 {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'northway'),
                                'style-2' => esc_html__('Style 2', 'northway'),
                                'style-3' => esc_html__('Style 3', 'northway'),
                            ],
                        ),

                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--title',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--description' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--description',
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Button Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-button' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Button Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-button',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'effect',
                            'label' => esc_html__('Effect', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'slide' => esc_html__('Slide', 'northway'),
                                'gl' => esc_html__('Gl', 'northway'),
                            ],
                            'default' => 'slide',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
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
                                'auto' => 'Auto',
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
                                'auto' => 'Auto',
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
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
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
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'sizeb',
                            'label' => esc_html__('Size Button', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-arrow' => 'width: {{SIZE}}{{UNIT}} !important;height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'arrows' => ['true'],
                            ],
                        ),
                        array(
                            'name' => 'sizei',
                            'label' => esc_html__('Size Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-arrow i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'arrows' => ['true'],
                            ],
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),

                        array(
                            'name' => 'dot_progressbar_color',
                            'label' => esc_html__('Progressbar Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'progressbar'
                            ]
                        ),

                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'northway'),
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
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
