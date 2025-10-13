<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_social_share',
        'title' => esc_html__('Case Social Share', 'northway'),
        'icon' => 'eicon-share',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'social_share_section',
                    'label' => esc_html__('Content', 'northway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_share',
                            'label' => esc_html__('Icon Share', 'northway'),
                            'type' => \Elementor\Controls_Manager::ICONS,
                        ),
                        array(
                            'name' => 'social_share_list',
                            'label' => esc_html__('Social Share List', 'northway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'social_share_icon',
                                    'label' => esc_html__('Social Share Icon', 'northway'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                ),
                                array(
                                    'name' => 'social_share_link',
                                    'label' => esc_html__('Social Share Link', 'northway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                        )
                    ),
                ),
                northway_widget_animation_settings(),
            ),
        ),
    ),
    northway_get_class_widget_path()
);
