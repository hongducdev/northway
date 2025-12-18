<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_categories',
        'title' => esc_html__('Case Categories', 'northway'),
        'icon' => 'eicon-post-list',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_categories/layout1.jpg'
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
                            'name' => 'post_types',
                            'label' => esc_html__('Post Types', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'blog' => esc_html__('Blog', 'northway'),
                                'service' => esc_html__('Service', 'northway'),
                                'portfolio' => esc_html__('Portfolio', 'northway'),
                            ],
                            'default' => ['blog'],
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'all_categories_text',
                            'label' => esc_html__('All Categories Text', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All Categories', 'northway'),
                        ),
                        array(
                            'name' => 'all_categories_link',
                            'label' => esc_html__('All Categories Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'show_count',
                            'label' => esc_html__('Show Count', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'northway'),
                            'label_off' => esc_html__('No', 'northway'),
                            'return_value' => 'yes',
                            'default' => 'yes',
                        ),
                        array(
                            'name' => 'hide_empty',
                            'label' => esc_html__('Hide Empty Categories', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => esc_html__('Yes', 'northway'),
                            'label_off' => esc_html__('No', 'northway'),
                            'return_value' => 'yes',
                            'default' => 'yes',
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'name',
                            'options' => [
                                'name' => esc_html__('Name', 'northway'),
                                'count' => esc_html__('Count', 'northway'),
                                'slug' => esc_html__('Slug', 'northway'),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Order', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'ASC',
                            'options' => [
                                'ASC' => esc_html__('Ascending', 'northway'),
                                'DESC' => esc_html__('Descending', 'northway'),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'list_padding',
                            'label' => esc_html__('List Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'list_margin',
                            'label' => esc_html__('List Margin', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px', '%'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories .pxl-categories-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-categories .pxl-categories-title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories .pxl-categories-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_item',
                    'label' => esc_html__('Category Item', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_margin',
                            'label' => esc_html__('Margin', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_color',
                            'label' => esc_html__('Text Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_hover_color',
                            'label' => esc_html__('Text Hover Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-categories-list .pxl-category-item a',
                        ),
                        array(
                            'name' => 'item_background',
                            'label' => esc_html__('Background Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_border_radius',
                            'label' => esc_html__('Border Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_count',
                    'label' => esc_html__('Count', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_count' => 'yes',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'count_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-categories-list .pxl-category-item .count' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'count_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-categories-list .pxl-category-item .count',
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);

