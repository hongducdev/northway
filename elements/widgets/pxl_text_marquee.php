<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_marquee',
        'title' => esc_html__('Case Text Marquee', 'northway'),
        'icon' => 'eicon-text',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text_items',
                            'label' => esc_html__('Text Items', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__('Text Item', 'northway'),
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'northway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                            'default' => array(
                                array(
                                    'text' => esc_html__('Fashion & Apparel', 'northway'),
                                ),
                                array(
                                    'text' => esc_html__('Beauty & Personal Care', 'northway'),
                                ),
                                array(
                                    'text' => esc_html__('Entertainment & Media', 'northway'),
                                ),
                                array(
                                    'text' => esc_html__('Sports & Fitness', 'northway'),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Settings', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'direction',
                            'label' => esc_html__('Direction', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Left to Right', 'northway'),
                                'right' => esc_html__('Right to Left', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 50,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 10,
                                    'max' => 200,
                                    'step' => 5,
                                ],
                            ],
                            'description' => esc_html__('Speed in pixels per second. Higher value = faster.', 'northway'),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-text-item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-marquee .pxl-text-item',
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-text-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_margin',
                            'label' => esc_html__('Item Margin', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', 'em'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-text-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_background',
                            'label' => esc_html__('Item Background', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-text-item' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_border_radius',
                            'label' => esc_html__('Border Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-text-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

