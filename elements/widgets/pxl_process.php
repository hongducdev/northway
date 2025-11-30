<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_process',
        'title' => esc_html__('Case Process', 'northway' ),
        'icon' => 'eicon-ellipsis-h',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-process-timeline',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'northway' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_process/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_process/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_process/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'process',
                            'label' => esc_html__('List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'condition' => [
                                'layout' => '1',
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'step',
                                    'label' => esc_html__('Step', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'icon',
                                    'label' => esc_html__('Icon', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),

                        array(
                            'name' => 'process_2',
                            'label' => esc_html__('List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2', '3'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'step_2',
                                    'label' => esc_html__('Step', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'image_2',
                                    'label' => esc_html__('Image', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title_2',
                                    'label' => esc_html__('Title', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc_2',
                                    'label' => esc_html__('Description', 'northway' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                            ),
                            'title_field' => '{{{ title_2 }}}',
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_ge',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bd_color',
                            'label' => esc_html__('Border Bottom Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process .pxl-item--inner' => 'border-color: {{VALUE}} ;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'pd_box',
                            'label' => esc_html__('Padding Box', 'northway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-process .pxl-item--title',
                        ),
                        array(
                            'name' => 'title_top_spacer',
                            'label' => esc_html__('Top Spacer', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process .pxl-item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_bottom_spacer',
                            'label' => esc_html__('Bottom Spacer', 'northway' ),
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
                                '{{WRAPPER}} .pxl-process .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                    ),
                ),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'northway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-process .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'northway' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-process .pxl-item--description',
        ),
    ),
),
array(
    'name' => 'section_style_list',
    'label' => esc_html__('List', 'northway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'list_color',
            'label' => esc_html__('Color', 'northway' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-process .pxl--item' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'list_typography',
            'label' => esc_html__('Typography', 'northway' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-process .pxl--item',
        ),
    ),
),
northway_widget_animation_settings(),
),
),
),northway_get_class_widget_path()
);