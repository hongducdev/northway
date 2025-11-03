<?php
    pxl_add_custom_widget(
        array(
            'name' => 'pxl_post_navigation',
            'title' => esc_html__('Case  Post Navigation', 'northway' ),
            'icon' => 'eicon-navigation-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'section_content',
                        'label' => esc_html__('Content', 'northway' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array (
                                'name' => 'type',
                                'label' => esc_html__('Type', 'northway'),
                                'type' => Elementor\Controls_Manager::SELECT,
                                'default' => 'navigation',
                                'options' => [
                                    'navigation' => esc_html__('Navigation', 'northway'),
                                ]
                            ),
                            array(
                                'name' => 'text_prev',
                                'label' => esc_html__('Text Prev', 'northway'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => esc_html__('Previous Case', 'northway'),
                            ),
                            array(
                                'name' => 'text_next',
                                'label' => esc_html__('Text Next', 'northway'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => esc_html__('Next Case', 'northway'),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        northway_get_class_widget_path()
    )
?>