<?php
$templates_df = ['0' => esc_html__('None', 'northway')];
$templates = $templates_df + northway_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_close_popup',
        'title' => esc_html__('Case Close Popup', 'northway' ),
        'icon' => 'eicon-editor-close',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'fs',
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
                                '{{WRAPPER}} .pxl-close-popup' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_coloraa',
                            'label' => esc_html__('Icon Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color ', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgicon_color',
                            'label' => esc_html__('Background Color Hover', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup:hover' => 'background-color: {{VALUE}};',
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