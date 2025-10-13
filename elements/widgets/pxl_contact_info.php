<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_info',
        'title' => esc_html__('Case Contact Info', 'northway'),
        'icon' => 'eicon-info-circle',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'contact_info_section',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'contact_info_style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'style-1' => esc_html__('Style 1', 'northway'),
                                'style-2' => esc_html__('Style 2', 'northway'),
                            ),
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'icon',
                            'label' => esc_html__('Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'contact_info_style_section',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-item--icon i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .pxl-item--icon svg path' => 'fill: {{VALUE}}',
                            ),
                        ),
                        array(
                            'name' => 'icon_bg_color',
                            'label' => esc_html__('Icon Background Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-item--icon' => 'background-color: {{VALUE}}',
                            ),
                        ),
                        array(
                            'name' => 'spacing_icon_meta',
                            'label' => esc_html__('Spacing Icon Meta', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                'px' => ['min' => 0, 'max' => 100, 'step' => 1],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'gap: {{SIZE}}{{UNIT}}',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-item--title' => 'color: {{VALUE}}',
                            ),
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--title',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Description Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => array(
                                '{{WRAPPER}} .pxl-item--description' => 'color: {{VALUE}}',
                            ),
                        ),
                        array(
                            'name' => 'description_typography',
                            'label' => esc_html__('Description Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--description',
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
