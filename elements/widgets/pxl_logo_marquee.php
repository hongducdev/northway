<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_logo_marquee',
        'title' => esc_html__('Case Logo Marquee', 'northway'),
        'icon' => 'eicon-person',
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
                            'name' => 'marquee',
                            'label' => esc_html__('Logo Marquee', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'logo',
                                    'label' => esc_html__('Logo', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'icon',
                                    'label' => esc_html__('Icon', 'northway'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'northway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'slip_type',
                            'label' => esc_html__('Slip Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => 'Right To Left',
                                'right' => 'Left To Right',
                            ],
                        ),
                        array(
                            'name' => 'slip_duration',
                            'label' => esc_html__('Slip Duration', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '20',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
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
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--text',
                        ),
                        array(
                            'name' => 'logo_margin',
                            'label' => esc_html__('Logo Margin', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'logo_width',
                            'label' => esc_html__('Logo Box Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'northway'),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_border_radius',
                            'label' => esc_html__('Logo Border Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--marquee .pxl-item--logo img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'logo_width_f',
                            'label' => esc_html__('Logo Image Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'auto' => [
                                    'title' => esc_html__('Auto', 'northway'),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '100%' => [
                                    'title' => esc_html__('Full', 'northway'),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo img' => 'width: {{VALUE}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'logo_color',
                            'label' => esc_html__('Logo Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'logo_color_hover',
                            'label' => esc_html__('Logo Color Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-logo-marquee1 .pxl-item--logo:hover' => 'color: {{VALUE}};',
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
