<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_grass',
        'title' => esc_html__('Case Grass', 'northway'),
        'icon' => 'eicon-divider-shape',
        'categories' => array('pxltheme-core'),
        'script' => array(
            'pxl-grass'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'grass_section',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'grass_color',
                            'label' => esc_html__('Grass Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#000000',
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-grass svg path' => 'fill: {{VALUE}}',
                            ),
                        ),
                        array(
                            'name' => 'grass_style',
                            'label' => esc_html__('Grass Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'style-1' => esc_html__('Style 1', 'northway'),
                                'style-2' => esc_html__('Style 2', 'northway'),
                                'style-3' => esc_html__('Style 3', 'northway'),
                                'paper' => esc_html__('Paper', 'northway'),
                            ),
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'grass_scroll_effect',
                            'label' => esc_html__('Scroll Effect', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none' => esc_html__('None', 'northway'),
                                'parallax' => esc_html__('Parallax', 'northway'),
                            ),
                            'default' => 'none',
                        ),
                        array(
                            'name' => 'parallax_scroll_type',
                            'label' => esc_html__('Parallax Scroll Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'y' => esc_html__('Effect Y', 'northway'),
                                'x' => esc_html__('Effect X', 'northway'),
                                'z' => esc_html__('EffectZ', 'northway'),
                            ),
                            'default' => 'x',
                            'condition' => array(
                                'grass_scroll_effect' => 'parallax',
                            ),
                        ),
                        array(
                            'name' => 'parallax_scroll_value',
                            'label' => esc_html__('Parallax Scroll Value', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '80',
                            'condition' => array(
                                'grass_scroll_effect' => 'parallax',
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
