<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_bolide',
        'title' => esc_html__('Case Bolide', 'northway'),
        'icon' => 'eicon-ai',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'quantity',
                            'label' => esc_html__('Quantity', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 4,
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        )
                    )
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_divider',
                            'label' => esc_html__('Color Divider', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-bolide-item' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_bolide',
                            'label' => esc_html__('Color Bolide', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-bolide-item' => '--color-bolide: {{VALUE}};',
                            ],
                        )
                    )
                ),
            )
        )
    ),
    northway_get_class_widget_path()
);
