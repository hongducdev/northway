<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_slip',
        'title' => esc_html__('Case Testimonial Slip', 'northway'),
        'icon' => 'eicon-blockquote',
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
                    'label'    => esc_html__('Layout', 'northway'),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'   => 'layout',
                            'label'  => esc_html__('Templates', 'northway'),
                            'type'   => 'layoutcontrol',
                            'default'=> '1',
                            'options'=> [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'northway'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_grid/layout1.jpg',
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
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'northway'),
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
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 5,
                                ),
                                array(
                                    'name' => 'star',
                                    'label' => esc_html__('Star', 'northway'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '5',
                                    'options' => [
                                        '1' => esc_html__('1', 'northway'),
                                        '2' => esc_html__('2', 'northway'),
                                        '3' => esc_html__('3', 'northway'),
                                        '4' => esc_html__('4', 'northway'),
                                        '5' => esc_html__('5', 'northway'),
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Settings', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Example: 370x370 or "full". Default: 880x664.', 'northway'),
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Animate', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => northway_widget_animate(),
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--title',
                        ),
                        array(
                            'name' => 'pos_color',
                            'label' => esc_html__('Position Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'pos_typography',
                            'label' => esc_html__('Position Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--position',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'northway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-slip .pxl-item--description',
                        ),
                    ),
                ),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
