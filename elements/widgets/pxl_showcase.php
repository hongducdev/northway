<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Case Showcase', 'northway'),
        'icon' => 'eicon-parallax',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};width:auto !important;height:auto !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'northway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title a',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Button Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--readmore a',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'coming_soon' => '',
                            ]
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'coming_soon' => '',
                            ]
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'coming_soon' => '',
                            ]
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Button Link 2', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'coming_soon' => '',
                            ]
                        ),
                        array(
                            'name' => 'coming_soon',
                            'label' => esc_html__('Coming Soon', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--label',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'border_type',
                                'label' => esc_html__( 'Border Type', 'northway' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__( 'None', 'northway' ),
                                    'solid' => esc_html__( 'Solid', 'northway' ),
                                    'double' => esc_html__( 'Double', 'northway' ),
                                    'dotted' => esc_html__( 'Dotted', 'northway' ),
                                    'dashed' => esc_html__( 'Dashed', 'northway' ),
                                    'groove' => esc_html__( 'Groove', 'northway' ),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__( 'Border Width', 'northway' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__( 'Border Color', 'northway' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);