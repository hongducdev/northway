<?php
$slides_to_show = range(1, 10);
$slides_to_show = array_combine($slides_to_show, $slides_to_show);

pxl_add_custom_widget(
    array(
        'name' => 'pxl_process_carousel',
        'title' => esc_html__('Case Process Carousel', 'northway'),
        'icon' => 'eicon-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_text_carousel/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('General', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('List Process', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'northway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'year',
                                    'label' => esc_html__('Year', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                            ),
                            'title_field' => '{{{ year }}}',
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
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
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'northway'),
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
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
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
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
