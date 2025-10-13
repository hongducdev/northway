<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider_carousel',
        'title' => esc_html__('Case Slider Carousel', 'northway'),
        'icon' => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
            'pxl-effect-gl',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'northway' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_slider_carousel/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                       array(
                        'name' => 'style',
                        'label' => esc_html__('Style', 'northway' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'df',
                        'options' => [
                            'df' => esc_html__('Default', 'northway' ),
                            'style-2' => esc_html__('Style 2', 'northway' ),
                        ],
                        'condition' => [
                            'layout' => '1',
                        ],
                    ),
                       array(
                        'name' => 'slider1',
                        'label' => esc_html__('Slider', 'northway'),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'controls' => array(
                            array(
                                'name' => 'image1',
                                'label' => esc_html__( 'Image ', 'northway' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                            ),
                            array(
                                'name' => 'title1',
                                'label' => esc_html__('Title', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'rows' => 10,
                                'show_label' => false,
                            ),
                            array(
                                'name' => 'desc1',
                                'label' => esc_html__('Description', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'rows' => 10,
                                'show_label' => false,
                            ),
                            array(
                                'name' => 'btn_text1',
                                'label' => esc_html__('Button Text', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'placeholder' => esc_html__('VIEW DETAILS', 'northway'),
                            ),
                            array(
                                'name' => 'btn_text2',
                                'label' => esc_html__('Button Text 2', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'placeholder' => esc_html__('VIEW DETAILS 2', 'northway'),
                            ),
                            array(
                                'name' => 'position1',
                                'label' => esc_html__( 'Image Position', 'northway' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                            ),
                            array(
                                'name' => 'position_text1',
                                'label' => esc_html__('Position Text', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'placeholder' => esc_html__('Over 3k happy customers', 'northway'),
                            ),
                            array(
                                'name' => 'btn_link1',
                                'label' => esc_html__('Button Link', 'northway' ),
                                'type' => \Elementor\Controls_Manager::URL,
                                'default' => [
                                    'url' => '#',
                                ],
                            ),
                            array(
                                'name' => 'btn_link2',
                                'label' => esc_html__('Button Link 2', 'northway' ),
                                'type' => \Elementor\Controls_Manager::URL,
                                'default' => [
                                    'url' => '#',
                                ],
                            ),
                        ),
                        'title_field' => '{{{ title1 }}}',
                    ),
                   ),
),

array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'northway' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'contentmw',
            'label' => esc_html__( 'Content Max Width', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner ' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'content_margin',
            'label' => esc_html__('Content Padding', 'northway' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner  ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
        array(
            'name' => 'cl_gap',
            'label' => esc_html__('Content Column Gap', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner ' => 'column-gap: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_image',
    'label' => esc_html__('Image', 'northway' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'height_img',
            'label' => esc_html__( 'Image Height', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .mask--content' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'width_img',
            'label' => esc_html__( 'Image Width', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .mask--content' => 'min-width: {{SIZE}}{{UNIT}} !important;width: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'northway' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--title' => 'color: {{VALUE}};',
            ],
            'separator' => 'before',
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'northway' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--title',
        ),
        array(
            'name' => 'title_max_width',
            'label' => esc_html__( 'Title Max Width', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--title' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'title_margin',
            'label' => esc_html__('Title Margin', 'northway' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'northway' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Description Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--desc' => 'color: {{VALUE}};',
            ],
            'separator' => 'before',
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'northway' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--desc',
        ),
        array(
            'name' => 'desc_max_width',
            'label' => esc_html__( 'Description Max Width', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--desc' => 'max-width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'desc_margin',
            'label' => esc_html__('Description Margin', 'northway' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%' ],
            'default' => [
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button', 'northway' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'button_color_1',
            'label' => esc_html__('Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'hover_button_color_1',
            'label' => esc_html__('Hover Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bgbutton_color_1',
            'label' => esc_html__('Background Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bghover_button_color_1',
            'label' => esc_html__('Background Hover Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a:hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'button_typography_1',
            'label' => esc_html__('Typography', 'northway' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a',
        ),
        array(
            'name' => 'button_margin_1',
            'label' => esc_html__('Button Text Margin', 'northway' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-slider-carousel1 .pxl-item--inner .content--wrapper .pxl-item--link a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'after',
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
            'label' => esc_html__('Effect', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'slide' => esc_html__('Slide', 'northway' ),
                'fade' => esc_html__('Fade', 'northway' ),
                'gl' => esc_html__('Gl', 'northway' ),
            ],
            'condition' => [
                'layout' => '2',
            ],
            'default' => 'gl',
        ),
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
            ],
        ),
        array(
            'name' => 'col_sm',
            'label' => esc_html__('Columns SM Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
            ],
        ),
        array(
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
            ],
        ),
        array(
            'name' => 'col_lg',
            'label' => esc_html__('Columns LG Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xxl',
            'label' => esc_html__('Columns XXL Devices', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'inherit',
            'options' => [
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '6' => '6',
                'inherit' => 'Inherit',
            ],
        ),
        array(
            'name' => 'slides_to_scroll',
            'label' => esc_html__('Slides to scroll', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '1' => '1',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'arrows',
            'label' => esc_html__('Show Arrows', 'northway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'arrow_offset_right',
            'label' => esc_html__('Right', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-arrow-wrap' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'arrows' => 'true',
                'par' => 'right',
            ],
        ),
        array(
            'name' => 'arrow_offset_left',
            'label' => esc_html__('Left', 'northway' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-arrow-wrap' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'arrows' => 'true',
                'par' => 'left',
            ],
        ),
        array(
            'name' => 'pagination',
            'label' => esc_html__('Show Pagination', 'northway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'pagination_type',
            'label' => esc_html__('Pagination Type', 'northway' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'bullets',
            'options' => [
                'bullets' => 'Bullets',
                'fraction' => 'Fraction',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'pagination_margin',
            'label' => esc_html__('Pagination Margin', 'northway' ),
            'type' => 'dimensions',
            'control_type' => 'responsive',
            'size_units' => [ 'px', '%', 'vw', 'vh' ],
            'default' => [
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'bullets_color',
            'label' => esc_html__('Bullets Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots .pxl-swiper-pagination-bullet:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'bullets',
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'active_bullets_color',
            'label' => esc_html__('Bullets Color Active', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots .swiper-pagination-bullet-active:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'bullets',
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'fraction_color',
            'label' => esc_html__('Fraction Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-fraction' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'fraction',
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'northway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'separator' => 'before',
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'northway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
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
        ),
        array(
            'name' => 'center',
            'label' => esc_html__('Center', 'northway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'northway'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 1600,
        ),
    ),
),
northway_widget_animation_settings()
),
),
),
northway_get_class_widget_path()
);