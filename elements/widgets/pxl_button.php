<?php
$templates_df = ['0' => esc_html__('None', 'northway')];
$templates = $templates_df + northway_get_templates_option('popup');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Case Button', 'northway'),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'northway'),
                                'btn-no-icon' => esc_html__('No Icon', 'northway'),
                                'btn-outline' => esc_html__('Outline', 'northway'),
                                'btn-gradient' => esc_html__('Gradient', 'northway'),
                                'btn-shadow' => esc_html__('Shadow', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'btn_style_for_default',
                            'label' => esc_html__('Button Style for Default', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'btn_style' => ['btn-default'],
                            ],
                            'default' => 'style-1-default',
                            'options' => [
                                'style-1-default' => esc_html__('Style 1', 'northway'),
                                'style-2-default' => esc_html__('Style 2', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'btn_style_for_gradient',
                            'label' => esc_html__('Button Style for Gradient', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'btn_style' => ['btn-gradient'],
                            ],
                            'default' => 'style-1-gradient',
                            'options' => [
                                'style-1-gradient' => esc_html__('Style 1', 'northway'),
                                'style-2-gradient' => esc_html__('Style 2', 'northway'),
                            ],
                        ),
                        array(
                            'name'         => 'title_gradient',
                            'label' => esc_html__('Background Type', 'northway'),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => ['gradient'],
                            'condition' => [
                                'btn_style' => ['btn-outline'],
                            ],
                            'selector'     => '{{WRAPPER}} .btn:not(.btn-stroke).btn-outline .pxl--btn-text',
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'northway'),
                        ),
                        array(
                            'name' => 'btn_action',
                            'label' => esc_html__('Action', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-atc-link',
                            'options' => [
                                'pxl-atc-link' => esc_html__('Link', 'northway'),
                                'pxl-atc-popup' => esc_html__('Popup', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'btn_action' => ['pxl-atc-link'],
                            ],
                        ),

                        array(
                            'name' => 'popup_template',
                            'label' => esc_html__('Select Popup Template', 'northway'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url(admin_url('edit.php?post_type=pxl-template')) . '" target="_blank">Click Here</a>"',
                            'condition' => [
                                'btn_action' => ['pxl-atc-popup'],
                            ],
                        ),

                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'northway'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'northway'),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'northway'),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'northway'),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'northway'),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'btn_style!' => ['btn-no-icon',],
                                'btn_style_for_gradient!' => ['style-2-gradient'],
                            ],
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'northway'),
                                'right' => esc_html__('After', 'northway'),
                            ],
                            'condition' => [
                                'btn_style!' => ['btn-no-icon'],
                                'btn_style_for_gradient!' => ['style-2-gradient'],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'btn_w',
                                'label' => esc_html__('Width', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'inline',
                                'options' => [
                                    'inline' => esc_html__('Inline', 'northway'),
                                    'full' => esc_html__('Full Width', 'northway'),
                                    'full justify-sb' => esc_html__('Full Width Space Between', 'northway'),
                                ],
                            ),
                            array(
                                'name' => 'btn_width_height',
                                'label' => esc_html__('Button Width/Height', 'northway'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .btn.btn-circle' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                                'condition' => [
                                    'btn_style' => ['btn-circle'],
                                ],
                            ),
                            array(
                                'name' => 'color',
                                'label' => esc_html__('Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color',
                                'label' => esc_html__('Background Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn .pxl-button--icon, {{WRAPPER}} .pxl-button .btn span' => 'background-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-default'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_no_icon',
                                'label' => esc_html__('Background Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn span' => 'background-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-no-icon'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_gradient_1',
                                'label' => esc_html__('Background Color Gradient 1', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.btn-gradient' => '--gradient-1: {{VALUE}};',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_gradient_2',
                                'label' => esc_html__('Background Color Gradient 2', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.btn-gradient' => '--gradient-2: {{VALUE}};',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_gradient_3',
                                'label' => esc_html__('Background Color Gradient 3', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.btn-gradient' => '--gradient-3: {{VALUE}};',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'btn_bg_color_gradient_4',
                                'label' => esc_html__('Background Color Gradient 4', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.btn-gradient' => '--gradient-4: {{VALUE}};',
                                ],
                                'condition' => [
                                    'btn_style' => ['btn-gradient'],
                                    'btn_style_for_gradient' => ['style-2-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'btn_typography',
                                'label' => esc_html__('Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-button .btn span',
                            ),
                            array(
                                'name'         => 'btn_box_shadow',
                                'label' => esc_html__('Box Shadow', 'northway'),
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'selector'     => '{{WRAPPER}} .pxl-button .btn',
                            ),
                            array(
                                'name' => 'border_type',
                                'label' => esc_html__('Border Type', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => esc_html__('None', 'northway'),
                                    'solid' => esc_html__('Solid', 'northway'),
                                    'double' => esc_html__('Double', 'northway'),
                                    'dotted' => esc_html__('Dotted', 'northway'),
                                    'dashed' => esc_html__('Dashed', 'northway'),
                                    'groove' => esc_html__('Groove', 'northway'),
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'border_width',
                                'label' => esc_html__('Border Width', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                                'responsive' => true,
                            ),
                            array(
                                'name' => 'border_color',
                                'label' => esc_html__('Border Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                                ],
                                'condition' => [
                                    'border_type!' => '',
                                ],
                            ),
                        ),
                        array(
                            array(
                                'name' => 'btn_border_radius',
                                'label' => esc_html__('Border Radius', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-button .btn .pxl-button--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'btn_padding',
                                'label' => esc_html__('Padding', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px', 'vw'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'btn_margin',
                                'label' => esc_html__('Margin', 'northway'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.pxl-button-style-2-default.pxl-icon--right span' => 'margin-right: {{SIZE}}px;',
                                    '{{WRAPPER}} .pxl-button .btn.pxl-button-style-2-default.pxl-icon--left span' => 'margin-left: {{SIZE}}px !important;',
                                ],
                                'condition' => [
                                    'btn_style_for_default' => ['style-2-default'],
                                ],
                            ),
                            array(
                                'name' => 'btn_margin_hover',
                                'label' => esc_html__('Margin Hover', 'northway'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-button .btn.pxl-button-style-2-default.pxl-icon--right:hover span' => 'margin-left: {{SIZE}}px !important;',
                                    '{{WRAPPER}} .pxl-button .btn.pxl-button-style-2-default.pxl-icon--left:hover span' => 'margin-right: {{SIZE}}px !important;',
                                ],
                                'condition' => [
                                    'btn_style_for_default' => ['style-2-default'],
                                ],
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_text_effect',
                            'label' => esc_html__('Text Effect', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('Default', 'northway'),
                                'no-ef' => esc_html__('No Effect', 'northway'),
                                'btn-text-nina' => esc_html__('Nina', 'northway'),
                                'btn-text-nanuk' => esc_html__('Nanuk', 'northway'),
                                'btn-text-smoke' => esc_html__('Smoke', 'northway'),
                                'btn-text-reverse' => esc_html__('Reverse', 'northway'),
                                'btn-text-parallax' => esc_html__('Text Parallax', 'northway'),
                                'btn-hide-icon' => esc_html__('Hide Icon', 'northway'),
                                'btn-glossy' => esc_html__('Glossy', 'northway'),
                                'btn-underline' => esc_html__('Underline', 'northway'),
                                'btn-text-applied' => esc_html__('Applied', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'transition_duration',
                            'label' => esc_html__('Transition Duration', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .btn.btn-text-reverse .pxl-text--inner span' => 'transition-duration: {{SIZE}}ms;',
                            ],
                            'condition' => [
                                'btn_text_effect' => ['btn-text-reverse'],
                            ],
                            'description' => 'Enter number, unit is ms.',
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-hide-icon .pxl--btn-text:before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bd_color_hover',
                            'label' => esc_html__('Border Color Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => ' border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover span' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style!' => [''],
                            ],
                        ),

                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__('Box Shadow', 'northway'),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_hv_color',
                            'label' => esc_html__('Color Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover .pxl-button--icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn:hover .pxl-button--icon svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'northway'),
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
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                                '{{WRAPPER}} .pxl-button .btn-svg:hover svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size_2',
                            'label' => esc_html__('Font Size Icon 2', 'northway'),
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
                                '{{WRAPPER}} .pxl-button .btn-2-icons .pxl--btn-text > i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-2-icons .pxl--btn-text > svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],

                            'condition' => [
                                'btn_style' => ['btn-2-icons'],
                            ],
                        ),

                        array(
                            'name' => 'width_box_icon',
                            'label' => esc_html__('Box Width', 'northway'),
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
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height_box_icon',
                            'label' => esc_html__('Box Height', 'northway'),
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
                                '{{WRAPPER}} .pxl-button .btn .pxl-button--icon' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color_hv',
                            'label' => esc_html__('Box Color Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover i' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 10,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--left:hover  svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 10,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--right:hover svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
