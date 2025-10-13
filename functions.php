<?php

/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Case-Themes
 * @since Northway 1.0
 */

if (!defined('DEV_MODE')) {
    define('DEV_MODE', true);
}

if (!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()) {
    define('THEME_DEV_MODE_ELEMENTS', true);
}

require_once get_template_directory() . '/inc/classes/class-main.php';

if (is_admin()) {
    require_once get_template_directory() . '/inc/admin/admin-init.php';
}

/**
 * Fallback function for pxl_print_html if it doesn't exist
 */
if (!function_exists('pxl_print_html')) {
    function pxl_print_html($content)
    {
        if (is_array($content) || is_object($content)) {
            return esc_html(print_r($content, true));
        }
        return wp_kses_post($content);
    }
}

/**
 * Theme Require
 */
northway()->require_folder('inc');
northway()->require_folder('inc/classes');
northway()->require_folder('inc/theme-options');
northway()->require_folder('template-parts/widgets');
if (class_exists('Woocommerce')) {
    northway()->require_folder('woocommerce');
}

// Elementor Preview CSS / JS
add_action('elementor/preview/enqueue_styles', function () {

    wp_enqueue_script(
        'theme-editor',
        get_template_directory_uri() . '/assets/js/custom-elementor-button.js',
        ['elementor-frontend'],
        null,
        true
    );

    wp_enqueue_script('tsparticles');
});
