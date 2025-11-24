<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switch',
        'title' => esc_html__('Case Language Switch', 'northway'),
        'icon' => 'eicon-kit-parts',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'language',
                            'label' => esc_html__('Language', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'flag',
                                    'label' => esc_html__('Flag', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'northway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'background_current',
                            'label' => esc_html__('Current Background', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-current' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_current',
                            'label' => esc_html__('Current Border', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-current' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_current',
                            'label' => esc_html__('Current Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-current-meta h6' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography_current',
                            'label' => esc_html__('Current Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switch-current-meta h6',
                        ),
                        array(
                            'name' => 'color_toggle',
                            'label' => esc_html__('Toggle Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-toggle i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'font_size_toggle',
                            'label' => esc_html__('Font Size Toggle', 'northway'),
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
                                '{{WRAPPER}} .pxl-language-switch-toggle i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'background_list',
                            'label' => esc_html__('List Background', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-list' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_item',
                            'label' => esc_html__('Item Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch-item a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography_item',
                            'label' => esc_html__('Item Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switch-item a',
                        )
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
