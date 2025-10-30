<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Case Pricing', 'northway'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'popular',
                            'label' => esc_html__('Popular', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'non-popular' => 'No',
                                'is-popular' => 'Yes',
                            ],
                            'default' => 'non-popular',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'title_box',
                            'label' => esc_html__('Box Title ', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'currency',
                            'label' => esc_html__('Currency', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '$',
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'time',
                            'label' => esc_html__('Time', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Button Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description ', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('List Feature', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'northway'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'non-active' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'non-active',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',

                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('Box', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Content Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--inner' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_gradient_color_from',
                            'label' => esc_html__('Box Gradient Color From', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--inner' => 'background: linear-gradient(180deg, {{VALUE}} 0%, rgba(255, 255, 255, 0.51) 86.54%, rgba(255, 255, 255, 0) 100%) !important;',
                            ],
                        ),
                        array(
                            'name' => 'box_gradient_color_to',
                            'label' => esc_html__('Box Gradient Color To', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--inner' => 'background: linear-gradient(180deg, rgba(255, 255, 255, 0.51) 0%, {{VALUE}} 86.54%, rgba(255, 255, 255, 0) 100%) !important;',
                            ],
                        ),
                        array(
                            'name' => 'box_color_popular',
                            'label' => esc_html__('Box Color Popular', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.is-popular .pxl-item--inner' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__('Box Shadow', 'northway'),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-pricing.is-popular .pxl-item--inner',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_price',
                    'label' => esc_html__('Price', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'pr_currency_typography',
                            'label' => esc_html__('Currency Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price .pxl-item--price-currency',
                        ),
                        array(
                            'name' => 'pr_value_typography',
                            'label' => esc_html__('Value Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price .pxl-item--price-value',
                        ),
                        array(
                            'name' => 'pr_time_typography',
                            'label' => esc_html__('Time Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price .pxl-item--price-time',
                        ),
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Price Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_feature',
                    'label' => esc_html__('Feature', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'ft_title_typography',
                            'label' => esc_html__('Title Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-title',
                        ),
                        array(
                            'name' => 'ft_title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-title' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ft_title_color_border',
                            'label' => esc_html__('Title Color Border', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-title' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ft_typography',
                            'label' => esc_html__('Content Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-content',
                        ),
                        array(
                            'name' => 'feature_color',
                            'label' => esc_html__('Feature Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-content' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'feature_color_icon',
                            'label' => esc_html__('Feature Color Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .pxl-item--feature-content svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__(' Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'buttonbg_color',
                            'label' => esc_html__('Background Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing a' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'button_color_popular',
                            'label' => esc_html__('Button Color Popular', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.is-popular .pxl-item--button a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color_popular',
                            'label' => esc_html__('Button Background Color Popular', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.is-popular .pxl-item--button a' => 'background-color: {{VALUE}} !important;',
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
