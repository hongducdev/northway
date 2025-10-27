<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_box',
        'title' => esc_html__('Case Text Box', 'northway' ),
        'icon' => 'eicon-site-title',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_text_box/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_text_box/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_text_box/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'northway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'northway' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['1', '2']
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Padding', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'box_background_gradient_color_from',
                            'label' => esc_html__('Background Gradient Color From', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box' => '--gradient-color-from: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_background_gradient_color_to',
                            'label' => esc_html__('Background Gradient Color To', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box' => '--gradient-color-to: {{VALUE}};',
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
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-box .pxl-text-box--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-box .pxl-text-box--title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-box .pxl-text-box--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'max_width_title',
                            'label' => esc_html__('Max Width', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-box .pxl-text-box--title' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_description',
                    'label' => esc_html__('Description', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box .pxl-info-box-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-info-box .pxl-info-box-description',
                        ),
                        array(
                            'name' => 'desc_margin',
                            'label' => esc_html__('Margin', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-info-box .pxl-info-box-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
