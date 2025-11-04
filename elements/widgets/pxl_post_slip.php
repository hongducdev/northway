<?php
$pt_supports = ['portfolio'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_slip',
        'title' => esc_html__('Case Post Slip', 'northway' ),
        'icon' => 'eicon-post-list',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'northway' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'northway' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => northway_get_post_type_options($pt_supports),
                                'default'  => 'portfolio'
                            ) 
                        ),
                        northway_get_post_slip_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'northway' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'northway' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'northway' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        northway_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        northway_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'northway' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'northway' ),
                                    'ID' => esc_html__('ID', 'northway' ),
                                    'author' => esc_html__('Author', 'northway' ),
                                    'title' => esc_html__('Title', 'northway' ),
                                    'rand' => esc_html__('Random', 'northway' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'northway' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'northway' ),
                                    'asc' => esc_html__('Ascending', 'northway' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'northway' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                            array(
                                'name' => 'wg_heading',
                                'label' => esc_html__('Widget Heading', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'pxl_animate_h',
                                'label' => esc_html__('Heading Animate', 'northway' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => northway_widget_animate_v2(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'h_color',
                                'label' => esc_html__('Heading Color', 'northway' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'h_typography',
                                'label' => esc_html__('Heading Typography', 'northway' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--title',
                            ),
                            array(
                                'name' => 'wg_desc',
                                'label' => esc_html__('Widget Description', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'd_color',
                                'label' => esc_html__('Description Color', 'northway' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--desc' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'd_typography',
                                'label' => esc_html__('Description Typography', 'northway' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-post-slip1 .pxl-post-content .pxl-widget--desc',
                            ),
                            array(
                                'name' => 'wg_btn_text',
                                'label' => esc_html__('Widget Button Text', 'northway' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                            ),
                            array(
                                'name' => 'wg_btn_link',
                                'label' => esc_html__('Widget Button Link', 'northway'),
                                'type' => \Elementor\Controls_Manager::URL,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'btn_style',
                                'label' => esc_html__('Widget Button Style', 'northway' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style-1' => 'Style 1',
                                    'style-2' => 'Style 2',
                                ],
                                'default' => 'style-1',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_display',
                    'label' => esc_html__('Display', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'northway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'northway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ]
                                ],
                            ]
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-post-slip1 .pxl-post-image-slip .pxl-post-block--min .pxl-post--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_box_color',
                            'label' => esc_html__('Title Box Color From', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'title_box_color_to',
                            'label' => esc_html__('Title Box Color To', 'northway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                    ),
                ),

            ),
        ),
    ),
    northway_get_class_widget_path()
);