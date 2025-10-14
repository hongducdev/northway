<?php
// 'pxl-splitting',
// 'pxl-typography-animation',
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Case Heading', 'northway'),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"] and Highlight text with shortcode: [highlight text="Text"]',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'northway'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'northway'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'northway'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'northway'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'northway'),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__('Max Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),

                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-outline .pxl-text-line-backdrop svg' => 'stroke:{{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__('Title Shadow', 'northway'),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-outline' => 'Outline',
                                'style-divider' => 'Divider',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case  Animate', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => northway_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title_style',
                                'label' => esc_html__('Style', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'pxl-sub-title-default' => 'Default',
                                    'pxl-sub-title-2' => 'Sub Title 2',
                                ],
                                'default' => 'pxl-sub-title-default',
                            ),
                            array(
                                'name' => 'sub_title_padding',
                                'label' => esc_html__('Padding', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'sub_title_background_color',
                                'label' => esc_html__('Background Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'background-color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'sub_title_style' => ['pxl-sub-title-default'],
                                ],
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext' => 'color: {{VALUE}};-webkit-text-fill-color: unset;',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                            ),
                            array(
                                'name' => 'sub_title_spacer',
                                'label' => esc_html__('Spacer', 'northway'),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'gap: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_icon_color',
                                'label' => esc_html__('Icon Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle svg' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_border_color',
                                'label' => esc_html__('Border Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_top',
                                'label' => esc_html__('Top Spacer', 'northway'),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_bottom',
                                'label' => esc_html__('Bottom Spacer', 'northway'),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pxl_animate_sub',
                                'label' => esc_html__('Case Animate', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => northway_widget_animate_v2(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'pxl_animate_delay_sub',
                                'label' => esc_html__('Animate Delay', 'northway'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_highlight',
                    'label' => esc_html__('Highlight', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'highlight_style',
                                'label' => esc_html__('Style', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'highlight-default' => 'Default',
                                    'highlight-text-gradient' => 'Text Gradient',
                                ],
                                'default' => 'highlight-default',
                            ),
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-default'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_from',
                                'label' => esc_html__('Color From', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-from: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_to',
                                'label' => esc_html__('Color To', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-to: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
                            ),
                            array(
                                'name' => 'highlight_text_image',
                                'label' => esc_html__('Text Image', 'northway'),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-image: url( {{URL}} );',
                                ],
                            ),
                            array(
                                'name' => 'highlight_image_position',
                                'label' => esc_html__('Text Image Position', 'northway'),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'options'      => array(
                                    ''              => esc_html__('Default', 'northway'),
                                    'center center' => esc_html__('Center Center', 'northway'),
                                    'center left'   => esc_html__('Center Left', 'northway'),
                                    'center right'  => esc_html__('Center Right', 'northway'),
                                    'top center'    => esc_html__('Top Center', 'northway'),
                                    'top left'      => esc_html__('Top Left', 'northway'),
                                    'top right'     => esc_html__('Top Right', 'northway'),
                                    'bottom center' => esc_html__('Bottom Center', 'northway'),
                                    'bottom left'   => esc_html__('Bottom Left', 'northway'),
                                    'bottom right'  => esc_html__('Bottom Right', 'northway'),
                                    'initial'       =>  esc_html__('Custom', 'northway'),
                                ),
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-position: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]
                            ),
                            array(
                                'name' => 'highlight_image_size',
                                'label' => esc_html__('Text Image Size', 'northway'),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'hide_in_inner' => true,
                                'options'      => array(
                                    ''              => esc_html__('Default', 'northway'),
                                    'auto' => esc_html__('Auto', 'northway'),
                                    'cover'   => esc_html__('Cover', 'northway'),
                                    'contain'  => esc_html__('Contain', 'northway'),
                                    'initial'    => esc_html__('Custom', 'northway'),
                                ),
                                'default'      => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-size: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]
                            ),
                            array(
                                'name' => 'highlight_animate',
                                'label' => esc_html__('Case Animate', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => northway_widget_animate_v2(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'highlight_animate_delay',
                                'label' => esc_html__('Animate Delay', 'northway'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_typewriter',
                    'label' => esc_html__('Typewriter', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'typewriter_color',
                                'label' => esc_html__('Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--typewriter' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'typewriter_typography',
                                'label' => esc_html__('Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--typewriter',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
