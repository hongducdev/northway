<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('Case Countdown', 'northway'),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-countdown .countdown-amount span',
                            'selector' => '{{WRAPPER}} .pxl-countdown .countdown-period',
                        ),
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'northway'),
                        ),
                        array(
                            'name' => 'pxl_day',
                            'label' => esc_html__('Day', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-day' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-day',
                        ),
                        array(
                            'name' => 'pxl_hour',
                            'label' => esc_html__('Hour', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-hour' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-hour',
                        ),
                        array(
                            'name' => 'pxl_minute',
                            'label' => esc_html__('Minute', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-minute' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-minute',
                        ),
                        array(
                            'name' => 'pxl_second',
                            'label' => esc_html__('Second', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'show-second' => 'True',
                                'hide' => 'False',
                            ],
                            'default' => 'show-second',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'northway'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__('Left', 'northway'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'northway'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__('Right', 'northway'),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-layout1' => 'justify-content: {{VALUE}};',
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
