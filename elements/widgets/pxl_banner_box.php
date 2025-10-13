<?php
//Register Banner Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner_box',
        'title' => esc_html__('Case Banner Box', 'northway'),
        'icon' => 'eicon-image-rollover',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'northway-counter',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner_box/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner_box/layout2.jpg'
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
                        'layout' => '1',
                    ],
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
                        array(
                            'name' => 'counter_number',
                            'label' => esc_html__('Counter Number', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'counter_suffix',
                            'label' => esc_html__('Counter Suffix', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '+',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'counter_title',
                            'label' => esc_html__('Counter Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_2',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '2',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_2_1',
                            'label' => esc_html__('Image', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_2_2',
                            'label' => esc_html__('Image 2', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_2_3',
                            'label' => esc_html__('Image 3', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_2_4',
                            'label' => esc_html__('Image 4', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'counter_number_2',
                            'label' => esc_html__('Counter Number', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'counter_suffix_2',
                            'label' => esc_html__('Counter Suffix', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '+',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'counter_title_2',
                            'label' => esc_html__('Counter Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_counter',
                    'label' => esc_html__('Counter', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'counter_color',
                            'label' => esc_html__('Counter Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter--number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_typography',
                            'label' => esc_html__('Counter Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter--number',
                        ),
                        array(
                            'name' => 'counter_suffix_color',
                            'label' => esc_html__('Counter Suffix Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter--suffix' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_suffix_typography',
                            'label' => esc_html__('Counter Suffix Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter--suffix',
                        ),
                        array(
                            'name' => 'counter_title_color',
                            'label' => esc_html__('Counter Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_title_typography',
                            'label' => esc_html__('Counter Title Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-counter--title',
                        ),
                        array(
                            'name' => 'counter_box_color',
                            'label' => esc_html__('Counter Box Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-banner-box-border1, {{WRAPPER}} .pxl-banner-box-border2' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'border_counter_color',
                            'label' => esc_html__('Border Counter Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'border_counter_width',
                            'label' => esc_html__('Border Counter Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-counter' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => '2',
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