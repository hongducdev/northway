<?php if(!function_exists('northway_configs')){
    function northway_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'northway'), 
                    'value' => northway()->get_opt('primary_color', '#9588F8')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'northway'), 
                    'value' => northway()->get_opt('secondary_color', '#041427')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'northway'), 
                    'value' => northway()->get_opt('third_color', '#DFB0C4')
                ],
                'four'   => [
                    'title' => esc_html__('Four', 'northway'), 
                    'value' => northway()->get_opt('four_color', '#1D5823')
                ],
                'body_bg'   => [
                    'title' => esc_html__('Body Background Color', 'northway'), 
                    'value' => northway()->get_opt('body_bg_color', '#F8F8F2')
                ]
            ],

            'link' => [
                'color' => northway()->get_opt('link_color', ['regular' => '#000000'])['regular'],
                'color-hover'   => northway()->get_opt('link_color', ['hover' => '#97B545'])['hover'],
                'color-active'  => northway()->get_opt('link_color', ['active' => '#97B545'])['active'],
            ],
            'gradient' => [
                'color-from' => northway()->get_opt('gradient_color', ['from' => '#fff48d'])['from'],
                'color-to' => northway()->get_opt('gradient_color', ['to' => '#f4be29'])['to'],
            ],
            'gradient_two' => [
                'color-from_two' => northway()->get_opt('gradient_color_two', ['from' => '#fff48d'])['from'],
                'color-to_two' => northway()->get_opt('gradient_color_two', ['to' => '#f4be29'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('northway_inline_styles')) {
    function northway_inline_styles() {  

        $theme_colors      = northway_configs('theme_colors');
        $link_color        = northway_configs('link');
        $gradient_color        = northway_configs('gradient');
        $gradient_color_two        = northway_configs('gradient_two');
        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  northway_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color_two as $color => $value) {
            printf('--gradient-two-%1$s: %2$s;', $color, $value);
        } 
        echo '}';

        return ob_get_clean();

    }
}
