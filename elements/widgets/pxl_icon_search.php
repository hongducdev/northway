<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_search',
        'title' => esc_html__('Case Search', 'northway' ),
        'icon' => 'eicon-search',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'search_type',
                            'label' => esc_html__('Search Type', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'popup' => 'Popup',
                                'form' => 'Form',
                            ],
                            'default' => 'popup',
                        ),
                        array(
                            'name' => 'email_placefolder',
                            'label' => esc_html__('Email Placefolder', 'northway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'search_type' => ['form'],
                            ],
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
                                'search_type' => ['popup'],
                                'icon_image_type' => ['ic'],
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Icon Image', 'northway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'search_type' => ['popup'],
                                'icon_image_type' => ['img'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button i' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-search-popup-button svg path' => 'stroke: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-search-popup-button svg ' => 'fill: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button:hover i' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-search-popup-button:hover svg path' => 'stroke: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-search-popup-button:hover svg ' => 'fill: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'bd_icon_color',
                            'label' => esc_html__('Border Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button, {{WRAPPER}} .pxl-search-popup-button.style-box:before' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'northway' ),
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
                                '{{WRAPPER}} .pxl-search-popup-button' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-search-popup-button svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-box' => 'Box',
                            ],
                            'default' => 'style-default',
                            'condition' => [
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'style_box',
                            'label' => esc_html__('Style Box', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'box_color_hv',
                            'label' => esc_html__('Box Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'northway' ),
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
                                '{{WRAPPER}} .pxl-search-popup-button.style-box, {{WRAPPER}} .pxl-search-popup-button.style-box:before' => 'height: {{SIZE}}{{UNIT}};',
                                
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                                'search_type' => ['popup'],
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
                                '{{WRAPPER}} .pxl-search-popup-button.style-box, {{WRAPPER}} .pxl-search-popup-button.style-box:before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                                'search_type' => ['popup'],
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box:before, {{WRAPPER}} .pxl-search-popup-button.style-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                                'search_type' => ['popup'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    northway_get_class_widget_path()
);