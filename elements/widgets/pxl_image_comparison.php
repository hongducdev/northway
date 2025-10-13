<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_comparison',
        'title' => esc_html__('Case Image Comparison', 'northway'),
        'icon' => 'eicon-image-before-after',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-image-comparison',
            'gsap',
        ),
        'params' => array(
            'sections' => array(        
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image_before',
                            'label' => esc_html__('Image Before', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_after',
                            'label' => esc_html__('Image After', 'northway'),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'label_before',
                            'label' => esc_html__('Before Label', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'Before',
                            'condition' => array(
                                'image_before[url]!' => '',
                            ),
                        ),
                        array(
                            'name' => 'label_after',
                            'label' => esc_html__('After Label', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'After',
                            'condition' => array(
                                'image_after[url]!' => '',
                            ),
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);