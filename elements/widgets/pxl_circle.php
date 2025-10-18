<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_circle',
        'title' => esc_html__('Case Circle', 'northway' ),
        'icon' => 'eicon-circle',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_circle',
                            'label' => esc_html__('Style Circle', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => esc_html__('Style 1', 'northway' ),
                                'style-2' => esc_html__('Style 2', 'northway' ),
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'color_circle',
                            'label' => esc_html__('Color Circle', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-circle' => '--color: {{VALUE}};',
                            ],
                        )
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
