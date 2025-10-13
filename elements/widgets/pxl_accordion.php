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
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'northway' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout4.jpg'
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
                                'style3' => 'Style 3 (From Service Posts)',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'service_limit',
                            'label' => esc_html__('Number of Services', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 4,
                            'condition' => [
                                'layout' => '2'
                            ],
                        ),
                        array(
                            'name' => 'service_orderby',
                            'label' => esc_html__('Order By', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'date' => esc_html__('Date', 'northway'),
                                'title' => esc_html__('Title', 'northway'),
                                'menu_order' => esc_html__('Menu Order', 'northway'),
                                'rand' => esc_html__('Random', 'northway'),
                            ],
                            'default' => 'menu_order',
                            'condition' => [
                                'layout' => '2'
                            ],
                        ),
                        array(
                            'name' => 'service_order',
                            'label' => esc_html__('Order', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ASC' => esc_html__('Ascending', 'northway'),
                                'DESC' => esc_html__('Descending', 'northway'),
                            ],
                            'default' => 'ASC',
                            'condition' => [
                                'layout' => '2'
                            ],
                        ),
                        array(
                            'name' => 'readmore_text',
                            'label' => esc_html__('Read More Text', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'Read More',
                            'condition' => [
                                'layout' => '2'
                            ],
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1', '3']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'number',
                                    'label' => esc_html__('Number', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
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
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'accordion_4',
                            'label' => esc_html__('Accordion', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => '4'
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'title_4',
                                    'label' => esc_html__('Title', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'button_text_4',
                                    'label' => esc_html__('Button Text', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__('Apply Job Now', 'northway'),
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'button_link_4',
                                    'label' => esc_html__('Button Link', 'northway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'icon_4',
                                    'label' => esc_html__('Icon', 'northway'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'job_desc_4',
                                    'label' => esc_html__('Job Description', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'request_4',
                                    'label' => esc_html__('Request', 'northway'),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'northway' ),
                                ),
                                array(
                                    'name' => 'salary_receive_4',
                                    'label' => esc_html__('Salary Receive', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title_4 }}}',
                            'separator' => 'after',
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
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
                            'label' => esc_html__('Item Space Bottom', 'northway'),
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
                                '{{WRAPPER}} .pxl-accordion1 .pxl--item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_space_top',
                            'label' => esc_html__('Item Space Top', 'northway'),
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
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item ' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_color_active',
                            'label' => esc_html__('Background Color/Actvie', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item.active' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_i',
                            'label' => esc_html__('Color Icon', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}}  .pxl-icon--plus path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_i_a',
                            'label' => esc_html__('Color Icon/Actvie', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item.active .pxl-icon--plus path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_bd',
                            'label' => esc_html__('Color Border', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_bd_a',
                            'label' => esc_html__('Color Border/Actvie', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--item.active' => 'border-color: {{VALUE}};',
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
                    'name' => 'section_style_number',
                    'label' => esc_html__('Number', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion.pxl-accordion1 .pxl--item .pxl-accordion--title .pxl-title--number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion.pxl-accordion1 .pxl--item .pxl-accordion--title .pxl-title--number',
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
                            'name' => 'ct_space_top',
                            'label' => esc_html__('Space Top', 'northway'),
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
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'ct_space_bottom',
                            'label' => esc_html__('Space Bottom', 'northway'),
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
                                '{{WRAPPER}} .pxl-accordion .pxl-accordion--content' => 'padding-bottom: {{SIZE}}{{UNIT}};',
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
