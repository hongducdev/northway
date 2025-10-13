<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_cart',
        'title' => esc_html__('Case Shop Cart', 'northway' ),
        'icon' => 'eicon-cart-medium',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-box' => 'Box',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'icon_image_type',
                            'label' => esc_html__('Icon Image Type', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'ic' => 'Icon',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'northway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_image_type' => ['ic'],
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Icon Image', 'northway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-cart-sidebar-button svg path' => 'fill: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'bd_icon_color',
                            'label' => esc_html__('Border Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button ' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button:hover i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-cart-sidebar-button:hover svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'size',
                            'label' => esc_html__('Icon Size', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-cart-sidebar-button svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color_hv',
                            'label' => esc_html__('Box Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button::before' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                        array(
                            'name' => 'counter_width',
                            'label' => esc_html__('Counter Width', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_height',
                            'label' => esc_html__('Counter Height', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_border_radius',
                            'label' => esc_html__('Counter Border Radius', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_typography',
                            'label' => esc_html__('Counter Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter',
                        ),
                        array(
                            'name' => 'counter_color',
                            'label' => esc_html__('Counter Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'counter_border_color',
                            'label' => esc_html__('Counter Border Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl_cart_counter' => 'border-color: {{VALUE}};',
                            ],
                        )
                    ),
                ),
            ),
        ),
    ),
    northway_get_class_widget_path()
);