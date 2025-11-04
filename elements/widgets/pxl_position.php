<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_position',
        'title' => esc_html__('Case Position', 'northway'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'position',
                            'label' => esc_html__('Position', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'address',
                            'label' => esc_html__('Address', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'employment_type',
                            'label' => esc_html__('Employment Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'full_time' => esc_html__('Full Time', 'northway'),
                                'part_time' => esc_html__('Part Time', 'northway'),
                                'contract' => esc_html__('Contract', 'northway'),
                                'temporary' => esc_html__('Temporary', 'northway'),
                            ),
                            'default' => 'full_time',
                        ),
                        array(
                            'name' => 'requirements',
                            'label' => esc_html__('Requirements', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'requirement',
                                    'label' => esc_html__('Requirement', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                            ),
                            'title_field' => '{{{ requirement }}}',
                        ),
                        array(
                            'name' => 'salary_currency',
                            'label' => esc_html__('Salary Currency', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '$',
                        ),
                        array(
                            'name' => 'salary',
                            'label' => esc_html__('Salary', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'salary_period',
                            'label' => esc_html__('Salary Period', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'monthly',
                        ),
                        array(
                            'name' => 'salary_desc',
                            'label' => esc_html__('Salary Description', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'apply_link',
                            'label' => esc_html__('Apply Link', 'northway'),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
