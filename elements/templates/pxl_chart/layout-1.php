<?php
$uniq_id = uniqid('pxl-chartjs-');
$labels = array();
if (!empty($settings['labels'])) {
    $labels = array_map('trim', explode(',', $settings['labels']));
}
$datasets = array();
if (!empty($settings['datasets'])) {
    foreach ($settings['datasets'] as $ds) {
        $values = array();
        if (!empty($ds['ds_values'])) {
            $values = array_map(function($v){ return is_numeric($v) ? (float)$v : 0; }, array_map('trim', explode(',', $ds['ds_values'])));
        }
        $datasets[] = array(
            'label' => $ds['ds_label'],
            'data' => $values,
            'borderColor' => !empty($settings['ds_line_color']) ? $settings['ds_line_color'] : null,
            'backgroundColor' => !empty($settings['ds_fill_color']) ? $settings['ds_fill_color'] : null,
            'borderWidth' => isset($settings['ds_line_width']) ? (int)$settings['ds_line_width'] : null,
            'pointBackgroundColor' => !empty($settings['ds_point_bg_color']) ? $settings['ds_point_bg_color'] : null,
            'pointBorderColor' => !empty($settings['ds_point_border_color']) ? $settings['ds_point_border_color'] : null,
            'pointBorderWidth' => isset($settings['ds_point_border_width']) ? (int)$settings['ds_point_border_width'] : null,
            'pointRadius' => isset($settings['ds_point_radius']) ? (int)$settings['ds_point_radius'] : null,
            'pointHoverRadius' => isset($settings['ds_point_hover_radius']) ? (int)$settings['ds_point_hover_radius'] : null,
            'fill' => !empty($ds['fill']) && $ds['fill'] === 'yes',
            'tension' => isset($ds['tension']) ? (float)$ds['tension'] : 0,
        );
    }
}
$config = array(
    'type' => !empty($settings['chart_type']) ? $settings['chart_type'] : 'line',
    'data' => array(
        'labels' => $labels,
        'datasets' => $datasets,
    ),
    'options' => array(
        'responsive' => true,
        'plugins' => array(
            'legend' => array(
                'display' => (!empty($settings['show_legend']) && $settings['show_legend'] === 'yes'),
                'labels' => array(
                    'color' => !empty($settings['legend_label_color']) ? $settings['legend_label_color'] : null,
                    'font' => array(
                        'size' => !empty($settings['legend_font_size']) ? (int)$settings['legend_font_size'] : null,
                        'weight' => !empty($settings['legend_font_weight']) ? $settings['legend_font_weight'] : null,
                        'family' => !empty($settings['legend_font_family']) ? $settings['legend_font_family'] : null,
                    )
                )
            ),
        ),
        'maintainAspectRatio' => false,
        'scales' => array(
            'x' => array(
                'ticks' => array(
                    'color' => !empty($settings['ticks_color']) ? $settings['ticks_color'] : null,
                    'font' => array(
                        'size' => !empty($settings['ticks_font_size']) ? (int)$settings['ticks_font_size'] : null,
                        'weight' => !empty($settings['ticks_font_weight']) ? $settings['ticks_font_weight'] : null,
                        'family' => !empty($settings['ticks_font_family']) ? $settings['ticks_font_family'] : null,
                    )
                )
            ),
            'y' => array(
                'ticks' => array(
                    'color' => !empty($settings['ticks_color']) ? $settings['ticks_color'] : null,
                    'font' => array(
                        'size' => !empty($settings['ticks_font_size']) ? (int)$settings['ticks_font_size'] : null,
                        'weight' => !empty($settings['ticks_font_weight']) ? $settings['ticks_font_weight'] : null,
                        'family' => !empty($settings['ticks_font_family']) ? $settings['ticks_font_family'] : null,
                    )
                )
            )
        )
    ),
);
?>
<div class="pxl-chartjs <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-chartjs__inner" style="position:relative;width:100%;height:400px">
        <canvas id="<?php echo esc_attr($uniq_id); ?>"
            data-chart-config='<?php echo wp_kses_post(wp_json_encode($config)); ?>'></canvas>
    </div>
</div>


