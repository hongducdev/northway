<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_divider',
        'title' => esc_html__('Case Divider', 'northway' ),
        'icon' => 'eicon-e-divider',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'divider_style',
                            'label' => esc_html__('Type', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'northway' ),
                                'gradient' => esc_html__('Gradient', 'northway' ),
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Background Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => ['divider_style!' => 'gradient'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_color_gradient',
                            'label' => esc_html__('Background Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => ['divider_style' => 'gradient'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => 'background: linear-gradient(90deg, #fff 0%, {{VALUE}} 50%, #fff 100%);',
                            ],
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show dots', 'northway'),
                            'default'=>'false',
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'dot_color',
                            'label' => esc_html__('column Hover Background Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '.elementor-column:hover .pxl-el-divider' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        
                        array(
                            'name' => 'divider_width',
                            'label' => esc_html__('Width', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider_height',
                            'label' => esc_html__('Height', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-el-divider' => 'height: {{SIZE}}{{UNIT}};',
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