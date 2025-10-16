<?php

add_action('pxl_post_metabox_register', 'northway_page_options_register');
function northway_page_options_register($metabox)
{

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__('Post Settings', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__('Post Settings', 'northway'),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
						array(
							array(
								'id'          => 'featured-video-url',
								'type'        => 'text',
								'title'       => esc_html__('Video URL', 'northway'),
								'description' => esc_html__('Video will show when set post format is video', 'northway'),
								'validate'    => 'url',
								'msg'         => 'Url error!',
							),
							array(
								'id'          => 'featured-audio-url',
								'type'        => 'text',
								'title'       => esc_html__('Audio URL', 'northway'),
								'description' => esc_html__('Audio that will show when set post format is audio', 'northway'),
								'validate'    => 'url',
								'msg'         => 'Url error!',
							),
							array(
								'id' => 'featured-quote-text',
								'type' => 'textarea',
								'title' => esc_html__('Quote Text', 'northway'),
								'default' => '',
							),
							array(
								'id'          => 'featured-quote-cite',
								'type'        => 'text',
								'title'       => esc_html__('Quote Cite', 'northway'),
								'description' => esc_html__('Quote will show when set post format is quote', 'northway'),
							),
							array(
								'id'       => 'featured-link-url',
								'type'     => 'text',
								'title'    => esc_html__('Format Link URL', 'northway'),
								'description' => esc_html__('Link will show when set post format is link', 'northway'),
							),
							array(
								'id'          => 'featured-link-text',
								'type'        => 'text',
								'title'       => esc_html__('Format Link Text', 'northway'),
							),
						)
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__('Page Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__('Header', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						northway_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						northway_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__('Menu', 'northway'),
								'options'  => northway_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'northway'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'northway'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'northway'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'northway'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__('Page Title', 'northway'),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_sub_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Sub Title', 'northway'),
								'default'      => 'Sub Title',
								'required'     => array('pt_mode', '!=', 'none')
							),
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__('Content', 'northway'),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array('#pxl-wapper #pxl-main'),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array('px'),
								'units_extended' => 'false',
								'title'          => esc_html__('Spacing Top/Bottom', 'northway'),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__('Footer', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						northway_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'northway'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'northway'),
									'on' => esc_html__('On', 'northway'),
									'off' => esc_html__('Off', 'northway'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'          => 'body_bg_color_ct',
								'type'        => 'background',
								'title'       => esc_html__('Body Background Color Custom', 'northway'),
								'transparent' => false,
								'output' => [
									'.pxl-footer-fixed #pxl-main',
								],
								'required' => array(0 => 'p_footer_fixed', 1 => 'equals', 2 => 'on'),
								'url'      => false
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'northway'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'northway'),
									'style-round' => esc_html__('Round', 'northway'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
				'colors' => [
					'title'  => esc_html__('Colors', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'body_bg_color',
								'type'     => 'color',
								'title'    => esc_html__('Body Background Color', 'northway'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'northway'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'third_color',
								'type'        => 'color',
								'title'       => esc_html__('Third Color', 'northway'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'four_color',
								'type'        => 'color',
								'title'       => esc_html__('Four Color', 'northway'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'gradient_color',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color One', 'northway'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '',
								),
							),
							array(
								'id'          => 'gradient_color_two',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color Two', 'northway'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '',
								),
							)
						)
					)
				],
				'extra' => [
					'title'  => esc_html__('Extra', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'northway'),
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__('Product Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'general' => [
					'title'  => esc_html__('General', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'portfolio_client',
								'type'     => 'text',
								'title'    => esc_html__('Portfolio Client', 'northway'),
								'default'  => '',
							),
							array(
								'id'       => 'portfolio_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'northway'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'northway'),
									'image'  => esc_html__('Image', 'northway'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'portfolio_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'northway'),
								'required' => array(0 => 'portfolio_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id'       => 'portfolio_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'northway'),
								'default' => '',
								'required' => array(0 => 'portfolio_icon_type', 1 => 'equals', 2 => 'image'),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__('Header', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						northway_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						northway_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__('Menu', 'northway'),
								'options'  => northway_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'northway'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'northway'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'northway'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'northway'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__('Page Title', 'northway'),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__('Content', 'northway'),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array('#pxl-wapper #pxl-main'),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array('px'),
								'units_extended' => 'false',
								'title'          => esc_html__('Spacing Top/Bottom', 'northway'),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id' => 'multi_text_country',
								'type' => 'multi_text',
								'title' => ('Multi Text Option'),
								'title'    => esc_html('Mutil Text', 'northway'),
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__('Footer', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						northway_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'northway'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'northway'),
									'on' => esc_html__('On', 'northway'),
									'off' => esc_html__('Off', 'northway'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'northway'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'northway'),
									'style-round' => esc_html__('Round', 'northway'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__('Portfolio Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header1' => [
					'title'  => esc_html__('Header', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						northway_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						northway_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__('Menu', 'northway'),
								'options'  => northway_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'northway'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'northway'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'northway'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'northway'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__('Page Title', 'northway'),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__('Content', 'northway'),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array('#pxl-wapper #pxl-main'),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array('px'),
								'units_extended' => 'false',
								'title'          => esc_html__('Spacing Top/Bottom', 'northway'),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__('Footer', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						northway_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__('Service Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__('General', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'northway'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'northway'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'northway'),
									'image'  => esc_html__('Image', 'northway'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'northway'),
								'required' => array(0 => 'service_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'northway'),
								'default' => '',
								'required' => array(0 => 'service_icon_type', 1 => 'equals', 2 => 'image'),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__('Header', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						northway_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						northway_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__('Menu', 'northway'),
								'options'  => northway_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'northway'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'northway'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'northway'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'northway'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__('Page Title', 'northway'),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__('Content', 'northway'),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array('#pxl-wapper #pxl-main'),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array('px'),
								'units_extended' => 'false',
								'title'          => esc_html__('Spacing Top/Bottom', 'northway'),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id' => 'multi_text_country_ser',
								'type' => 'multi_text',
								'title' => ('Multi Text Option'),
								'title'    => esc_html('Mutil Text', 'northway'),
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__('Footer', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						northway_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'northway'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'northway'),
									'on' => esc_html__('On', 'northway'),
									'off' => esc_html__('Off', 'northway'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'northway'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'northway'),
									'style-round' => esc_html__('Round', 'northway'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'industries' => [
			'opt_name'            => 'pxl_industries_options',
			'display_name'        => esc_html__('Industries Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__('General', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'industries_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'northway'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'industries_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'northway'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'northway'),
									'image'  => esc_html__('Image', 'northway'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'industries_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'northway'),
								'required' => array(0 => 'industries_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id'       => 'industries_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'northway'),
								'default' => '',
								'required' => array(0 => 'industries_icon_type', 1 => 'equals', 2 => 'image'),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__('Header', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						northway_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						northway_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__('Menu', 'northway'),
								'options'  => northway_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'northway'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'northway'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'northway'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'northway'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__('Page Title', 'northway'),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						northway_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__('Custom Main Title', 'northway'),
								'subtitle'     => esc_html__('Custom heading text title', 'northway'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'northway'),
								'default' => 'Description Details',
								'required' => array('pt_mode', '!=', 'none')
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__('Content', 'northway'),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						northway_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array('#pxl-wapper #pxl-main'),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array('px'),
								'units_extended' => 'false',
								'title'          => esc_html__('Spacing Top/Bottom', 'northway'),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__('Footer', 'northway'),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						northway_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'northway'),
								'options'  => array(
									'show' => esc_html__('Show', 'northway'),
									'hide'  => esc_html__('Hide', 'northway'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'northway'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'northway'),
									'on' => esc_html__('On', 'northway'),
									'off' => esc_html__('Off', 'northway'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'northway'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'northway'),
									'style-round' => esc_html__('Round', 'northway'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],

		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__('Template Options', 'northway'),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__('General', 'northway'),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'northway'),
							'options' => [
								'df'       	   => esc_html__('Select Type', 'northway'),
								'header'       => esc_html__('Header Desktop', 'northway'),
								'header-mobile'       => esc_html__('Header Mobile', 'northway'),
								'footer'       => esc_html__('Footer', 'northway'),
								'mega-menu'    => esc_html__('Mega Menu', 'northway'),
								'page-title'   => esc_html__('Page Title', 'northway'),
								'tab' => esc_html__('Tab', 'northway'),
								'hidden-panel' => esc_html__('Hidden Panel', 'northway'),
								'popup' => esc_html__('Popup', 'northway'),
								'widget' => esc_html__('Widget Sidebar', 'northway'),
								'page' => esc_html__('Page', 'northway'),
								'slider' => esc_html__('Slider', 'northway'),
							],
							'default' => 'df',
						),
						array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'northway'),
							'options' => [
								'px-header--default'       	   => esc_html__('Default', 'northway'),
								'px-header--transparent'       => esc_html__('Transparent', 'northway'),
								'px-header--left_sidebar'       => esc_html__('Left Sidebar', 'northway'),
							],
							'default' => 'px-header--default',
							'indent' => true,
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'header'),
						),

						array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'northway'),
							'options' => [
								'px-header--default'       	   => esc_html__('Default', 'northway'),
								'px-header--transparent'       => esc_html__('Transparent', 'northway'),
							],
							'default' => 'px-header--default',
							'indent' => true,
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'header-mobile'),
						),

						array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'northway'),
							'options' => [
								'top'       	   => esc_html__('Top', 'northway'),
								'right'       	   => esc_html__('Right', 'northway'),
							],
							'default' => 'right',
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel'),
						),
						array(
							'id'          => 'hidden_panel_height',
							'type'        => 'text',
							'title'       => esc_html__('Hidden Panel Height', 'northway'),
							'subtitle'       => esc_html__('Enter number.', 'northway'),
							'transparent' => false,
							'default'     => '',
							'force_output' => true,
							'required' => array(0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top'),
						),
						array(
							'id'          => 'hidden_panel_boxcolor',
							'type'        => 'color',
							'title'       => esc_html__('Box Color', 'northway'),
							'transparent' => false,
							'default'     => '',
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel'),
						),

						array(
							'id'          => 'header_sidebar_width',
							'type'        => 'slider',
							'title'       => esc_html__('Header Sidebar Width', 'northway'),
							"default"   => 300,
							"min"       => 50,
							"step"      => 1,
							"max"       => 900,
							'force_output' => true,
							'required' => array(0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar'),
						),

						array(
							'id'          => 'header_sidebar_border',
							'type'        => 'border',
							'title'       => esc_html__('Header Sidebar Border', 'northway'),
							'force_output' => true,
							'required' => array(0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar'),
							'default' => '',
						),
					),

				],
			]
		],
	];

	$metabox->add_meta_data($panels);
}
