<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';

?>
<?php if (isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid1 pxl-team-layout1 " data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['team'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $social = isset($value['social']) ? $value['social'] : '';
                $popup_template = isset($value['popup_template']) ? $value['popup_template'] : '';
                if ($popup_template > 0) {
                    if (!has_action('pxl_anchor_target_page_popup_' . $popup_template)) {
                        add_action('pxl_anchor_target_page_popup_' . $popup_template, 'northway_hook_anchor_page_popup');
                    }
                }
                if (!empty($image['id'])) { ?>
                    <div class="<?php echo esc_attr($item_class); ?>">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                            <?php if (!empty($image['id'])) {
                                $img = pxl_get_image_by_size(array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                            ?>
                                <div class="pxl-item--featured">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                    <div class="pxl-item--overlay" data-target=".pxl-page-popup-template-<?php echo esc_attr($popup_template); ?>">
                                        <div class="pxl-item--overlay-button">
                                            <span></span>
                                        </div>
                                    </div>
                                    <!-- <a href="javascript:void(0)">
                                    </a> -->
                                </div>
                            <?php } ?>
                            <div class="pxl-item--holder ">
                                <div class="pxl-item--title">
                                    <h3>
                                        <?php echo pxl_print_html($title); ?>
                                    </h3>
                                </div>
                                <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                <div class="pxl-item--social">
                                    <?php $team_social = json_decode($social, true); ?>
                                    <?php foreach ($team_social as $value): ?>
                                        <a class="pxl-flex-center" href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>