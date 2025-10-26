<?php
$templates_df = ['0' => esc_html__('None', 'northway')];
$templates = $templates_df + northway_get_templates_option('tab');
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('Case Accordion', 'northway'),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'northway-accordion'
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout3.jpg'
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
                            'name' => 'style',
                            'label' => esc_html__('Style', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'northway'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'show_info',
                                    'label' => esc_html__('Show Info', 'northway'),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                ),
                                array(
                                    'name' => 'avatar',
                                    'label' => esc_html__('Avatar', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'show_info' => 'true',
                                    ],
                                ),
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'accordion_2',
                            'label' => esc_html__('Accordion', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2', '3'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'title_2',
                                    'label' => esc_html__('Title', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc_2',
                                    'label' => esc_html__('Content', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ title_2 }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding ', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_padding_at',
                            'label' => esc_html__('Item Padding Active', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space', 'northway'),
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
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item + .pxl--item' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_color',
                            'label' => esc_html__('Background Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item ' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_title_2',
                            'label' => esc_html__('Background Color Title', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion2 .pxl-accordion--title' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_i',
                            'label' => esc_html__('Color Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion1 .pxl-title--icon span:before, {{WRAPPER}} .pxl-accordion2 .pxl-title--icon span:after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_bd_desc',
                            'label' => esc_html__('Color Border Desc', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion2 .pxl-accordion--content' => 'border-color: {{VALUE}};',
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
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_a',
                            'label' => esc_html__('Color/Active', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-accordion--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion--title',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'northway'),
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
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_color_a',
                            'label' => esc_html__('Color/Active', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item.active .pxl-accordion--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-accordion--content',
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Padding', 'northway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => ['px'],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
