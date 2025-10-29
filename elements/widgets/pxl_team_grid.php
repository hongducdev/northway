<?php
$templates_df = ['0' => esc_html__('None', 'northway')];
$templates = $templates_df + northway_get_templates_option('popup');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_team_grid',
        'title' => esc_html__('Case Team Grid', 'northway'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid'
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_team_grid/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'team',
                            'label' => esc_html__('Team', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__('Social', 'northway'),
                                    'type' => 'pxl_icons',
                                ),
                                array(
                                    'name' => 'popup_template',
                                    'label' => esc_html__('Select Popup Template', 'northway'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url(admin_url('edit.php?post_type=pxl-template')) . '" target="_blank">Click Here</a>"',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Grid', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'masonry',
                            'options' => [
                                'masonry' => esc_html__('Masonry', 'northway'),
                                'fitRows' => esc_html__('Fit Rows', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Pxl Animate', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => northway_widget_animate(),
                            'default' => '',
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
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
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
                                '6' => '6',
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
                            ],
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name'         => 'gap_extra',
                            'label'        => esc_html__('Item Gap Bottom', 'northway'),
                            'description'  => esc_html__('Add extra space at bottom of each items', 'northway'),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'default'      => 0,
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'margin-bottom: {{VALUE}}px;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        northway_widget_color_type([
                            'prefix' => 'icon',
                            'selectors_class' => '.pxl-team-grid1.style-overlay .pxl-item--inner .pxl-item--image:before, .pxl-team-carousel1.style-overlay .pxl-item--inner .pxl-item--image:before',
                        ]),
                        array(
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Hover Image Effect', 'northway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style-circle' => 'Circle',
                                    'style-overlay' => 'Overlay',
                                    'none' => 'None',
                                ],
                                'default' => 'style-circle',
                            ),
                            array(
                                'name' => 'img_margin',
                                'label' => esc_html__('Image Margin', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'img_min_height',
                                'label' => esc_html__('Image Min Height (px)', 'northway'),
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
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--image img' => 'min-height: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'hover_link_color',
                                'label' => esc_html__('Hover Link Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--title a:hover' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-item--title',
                            ),
                            array(
                                'name' => 'title_margin',
                                'label' => esc_html__('Title Margin', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'pos_color',
                                'label' => esc_html__('Position Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--position' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'pos_typography',
                                'label' => esc_html__('Position Typography', 'northway'),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-team-grid .pxl-item--position',
                            ),
                            array(
                                'name'  => 'line_width',
                                'label' => esc_html__('Line Width', 'northway'),
                                'type'  => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--position:after' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'  => 'line_height',
                                'label' => esc_html__('Line Height', 'northway'),
                                'type'  => 'slider',
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--position:after' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'line_color',
                                'label' => esc_html__('Line Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--position:after' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name'  => 'icon_size',
                                'label' => esc_html__('Icon Size', 'northway'),
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'type'  => 'slider',
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a' => 'font-size: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_width',
                                'label' => esc_html__('Icon Width', 'northway'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_color',
                                'label' => esc_html__('Icon Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a i' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_color_hover',
                                'label' => esc_html__('Icon Color Hover', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a:hover i' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_background_color',
                                'label' => esc_html__('Icon Background Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'icon_background_color_hover',
                                'label' => esc_html__('Icon Background Color Hover', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--social a span:before' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'box_content_color',
                                'label' => esc_html__('Box Content Background Color', 'northway'),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-item--meta' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'box_content_padding',
                                'label' => esc_html__('Box Content Padding', 'northway'),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'box_content_min_width',
                                'label' => esc_html__('Box Content Min Width', 'northway'),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => ['px', '%', 'vw', 'vh'],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-team-grid .pxl-item--meta' => 'min-width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
