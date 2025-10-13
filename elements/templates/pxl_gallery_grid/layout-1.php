<?php

$col_xl = $widget->get_setting('col_xl', '');
$col_lg = 12 / floatval($widget->get_setting('col_lg', 4));
$col_md = 12 / floatval($widget->get_setting('col_md', 3));
$col_sm = 12 / floatval($widget->get_setting('col_sm', 2));
$col_xs = 12 / floatval($widget->get_setting('col_xs', 1));
$pxl_g_id = uniqid();

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$grid_custom_columns = $widget->get_setting('grid_masonry', []);
$msclass = is_admin() ? 'pxl-grid-masonry-adm' : 'pxl-grid-masonry';

if (isset($grid_custom_columns) && !empty($grid_custom_columns) && (count($grid_custom_columns) > 1)) {
    $layout_mode = 'fitRows';
}
if (!empty($grid_custom_columns)) {
    $col_xl_s = 12 / floatval($grid_custom_columns[0]['col_xl_m']);
    $col_lg_s = 12 / floatval($grid_custom_columns[0]['col_lg_m']);
    $col_md_s = 12 / floatval($grid_custom_columns[0]['col_md_m']);
    $col_sm_s = 12 / floatval($grid_custom_columns[0]['col_sm_m']);
    $col_xs_s = 12 / floatval($grid_custom_columns[0]['col_xs_m']);
    $grid_sizer = "col-xl-{$col_xl_s} col-lg-{$col_lg_s} col-md-{$col_md_s} col-sm-{$col_sm_s} col-{$col_xs_s}";
}
?>

<div class="pxl-grid pxl-gallery-grid pxl-gallery-grid1 pxl-gallery-layout1 <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
    <?php if ($settings['show_fillter'] == 'true'): ?>
        <div class="pxl-grid-filter normal style-1">
            <div class="pxl--filter-inner">
                <span class="filter-item active" data-filter="*">All</span>
                <?php foreach ($settings['list_name'] as $key2 => $value2):
                    $title_fillter = isset($value2['title_fillter']) ? $value2['title_fillter'] : '';
                ?>
                    <span class="filter-item" data-filter="<?php echo esc_attr('.' . $title_fillter); ?>">
                        <?php echo esc_html($title_fillter); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (isset($settings['gallery']) && !empty($settings['gallery']) && count($settings['gallery'])): ?>
        <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-grid-inner <?php echo esc_attr($msclass); ?> row" data-gutter="15" data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['gallery'] as $key => $value):
                $item_class = $item_class;
                if (!empty($grid_custom_columns[$key])) {
                    $col_xl = 12 / floatval($grid_custom_columns[$key]['col_xl_m']);
                    $col_lg = 12 / floatval($grid_custom_columns[$key]['col_lg_m']);
                    $col_md = 12 / floatval($grid_custom_columns[$key]['col_md_m']);
                    $col_sm = 12 / floatval($grid_custom_columns[$key]['col_sm_m']);
                    $col_xs = 12 / floatval($grid_custom_columns[$key]['col_xs_m']);
                    $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

                    if (!empty($grid_custom_columns[$key]['img_size'])) {
                        $image_size = $grid_custom_columns[$key]['img_size'];
                    } else {
                        $image_size = 'full';
                    }
                }

                $image = isset($value['image']) ? $value['image'] : '';
                $cat = isset($value['cat']) ? $value['cat'] : '';
                $cat = str_replace(',', ' ', $cat);
                $link_key = $widget->get_repeater_setting_key('link', 'value', $key);
                if (!empty($value['link']['url'])) {
                    $widget->add_render_attribute($link_key, 'href', $value['link']['url']);

                    if ($value['link']['is_external']) {
                        $widget->add_render_attribute($link_key, 'target', '_blank');
                    }

                    if ($value['link']['nofollow']) {
                        $widget->add_render_attribute($link_key, 'rel', 'nofollow');
                    }
                }
                $link_attributes = $widget->get_render_attribute_string($link_key);
            ?>
                <div class="<?php echo esc_attr($item_class); ?> <?php echo esc_attr($cat); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <?php if (!empty($image['id'])) {
                            $img = pxl_get_image_by_size(array(
                                'attach_id' => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            $thumbnail_url = $img['url'];
                        ?>
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <a href="<?php echo esc_url($thumbnail_url); ?>" data-elementor-lightbox-slideshow="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>">
                                    <div class="pxl-item--button">
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</div>
<?php endif; ?>