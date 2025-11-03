<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_chart',
        'title' => esc_html__('Case Chart', 'northway'),
        'icon' => 'eicon-chart-line',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'northway-charts',
            'northway-chartjs-widget',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'chart_type',
                            'label' => esc_html__('Chart Type', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'line' => 'Line',
                                'bar' => 'Bar',
                                'pie' => 'Pie',
                                'doughnut' => 'Doughnut',
                                'radar' => 'Radar',
                                'polarArea' => 'Polar Area',
                            ],
                            'default' => 'line',
                        ),
                        array(
                            'name' => 'labels',
                            'label' => esc_html__('Labels (comma separated)', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Jan, Feb, Mar, Apr',
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'datasets',
                            'label' => esc_html__('Datasets', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'ds_label',
                                    'label' => esc_html__('Label', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => 'Series 1',
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'ds_values',
                                    'label' => esc_html__('Values (comma separated)', 'northway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => '12, 19, 3, 5, 2, 3',
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'fill',
                                    'label' => esc_html__('Fill (for line/radar)', 'northway'),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'return_value' => 'yes',
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'tension',
                                    'label' => esc_html__('Line Tension (0-1)', 'northway'),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'default' => 0.3,
                                ),
                            ),
                            'title_field' => '{{{ ds_label }}}',
                        ),
                        array(
                            'name' => 'show_legend',
                            'label' => esc_html__('Show Legend', 'northway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'return_value' => 'yes',
                            'default' => 'yes',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_dataset',
                    'label' => esc_html__('Dataset Style', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'ds_line_color',
                            'label' => esc_html__('Line Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'ds_line_width',
                            'label' => esc_html__('Line Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2,
                        ),
                        array(
                            'name' => 'ds_fill_color',
                            'label' => esc_html__('Fill Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'ds_point_bg_color',
                            'label' => esc_html__('Point Background', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ffffff',
                        ),
                        array(
                            'name' => 'ds_point_border_color',
                            'label' => esc_html__('Point Border', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'ds_point_border_width',
                            'label' => esc_html__('Point Border Width', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2,
                        ),
                        array(
                            'name' => 'ds_point_radius',
                            'label' => esc_html__('Point Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 4,
                        ),
                        array(
                            'name' => 'ds_point_hover_radius',
                            'label' => esc_html__('Point Hover Radius', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 6,
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_labels',
                    'label' => esc_html__('Labels & Legend', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'legend_label_color',
                            'label' => esc_html__('Legend Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'legend_font_size',
                            'label' => esc_html__('Legend Font Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 12,
                        ),
                        array(
                            'name' => 'legend_font_weight',
                            'label' => esc_html__('Legend Font Weight', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [ 'normal' => 'Normal', 'bold' => 'Bold', '600' => '600', '700' => '700' ],
                            'default' => 'normal',
                        ),
                        array(
                            'name' => 'legend_font_family',
                            'label' => esc_html__('Legend Font Family', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'inherit / Inter / Roboto',
                        ),
                        array(
                            'name' => 'ticks_color',
                            'label' => esc_html__('Axis Ticks Color', 'northway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'ticks_font_size',
                            'label' => esc_html__('Axis Ticks Font Size', 'northway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 12,
                        ),
                        array(
                            'name' => 'ticks_font_weight',
                            'label' => esc_html__('Axis Ticks Font Weight', 'northway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [ 'normal' => 'Normal', 'bold' => 'Bold', '600' => '600', '700' => '700' ],
                            'default' => 'normal',
                        ),
                        array(
                            'name' => 'ticks_font_family',
                            'label' => esc_html__('Axis Ticks Font Family', 'northway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'inherit / Inter / Roboto',
                        ),
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);


