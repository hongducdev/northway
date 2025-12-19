<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'northway_register_required_plugins' );
function northway_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.casethemes.net/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'northway'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'northway' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'northway'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'northway' ),
        ),

        array(
            'name'               => esc_html__('Case Addons', 'northway'),
            'slug'               => 'case-addons',
            'source'             => 'case-addons.zip',
            'required'           => true,
            'logo'        => $images . '/case-addons.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for northway WordPress Theme.', 'northway' ),
        ),
  
        array(
            'name'               => esc_html__('Contact Form 7', 'northway'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'northway' ),
        ),

        array(
            'name'               => esc_html__('Mailchimp', 'northway'),
            'slug'               => "mailchimp-for-wp",
            'required'           => true,
            'logo'        => $images . '/mailchimp.png',
            'description' => esc_html__( 'Allowing your visitors to subscribe to your newsletter should be easy. With this plugin, it finally is.', 'northway' ),
        ),
        
        array(
            'name'               => esc_html__('WooCommerce', 'northway'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'northway' ),
        ),

        array(
            'name'               => esc_html__('WPC Smart Wishlist for WooCommerce', 'northway'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'WPC Smart Wishlist helps customers save favorite items and manage their to-buy list with ease.', 'northway' ),
        ),

    );
 

    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}