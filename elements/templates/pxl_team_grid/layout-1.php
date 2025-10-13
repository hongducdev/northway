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
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
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
                                    <div class="pxl-item--image">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <a href="javascript:void(0)" data-target=".pxl-page-popup-template-<?php echo esc_attr($popup_template); ?>">
                                            <div class="pxl-item--overlay">
                                                <div class="pxl-item--overlay-button">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </a>
                                        <?php if (!empty($social)): ?>
                                            <div class="pxl-item--social">
                                                <div class="pxl-item--social-inner">
                                                    <div class="pxl-item--social-list">
                                                        <?php $team_social = json_decode($social, true); ?>
                                                        <?php foreach ($team_social as $value): ?>
                                                            <a class="pxl-flex-center" href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="pxl-item--social-share">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                                            <path d="M14.2226 12.7107C13.2078 12.7107 12.3134 13.2307 11.7517 14.0216L6.89513 11.4311C6.97576 11.1448 7.03243 10.8481 7.03243 10.5351C7.03243 10.1104 6.94885 9.70671 6.80446 9.3354L11.8871 6.14945C12.4527 6.84093 13.2841 7.28947 14.2226 7.28947C15.9219 7.28947 17.3042 5.8496 17.3042 4.07955C17.3042 2.30949 15.9219 0.869629 14.2226 0.869629C12.5234 0.869629 11.1411 2.30949 11.1411 4.07955C11.1411 4.48746 11.2218 4.87439 11.3555 5.23362L6.25777 8.42892C5.69262 7.75797 4.87321 7.32513 3.95091 7.32513C2.25165 7.32513 0.869385 8.76499 0.869385 10.5351C0.869385 12.3051 2.25165 13.745 3.95091 13.745C4.98253 13.745 5.89196 13.2097 6.45156 12.3966L11.2922 14.9786C11.203 15.2784 11.1411 15.5907 11.1411 15.9206C11.1411 17.6906 12.5234 19.1305 14.2226 19.1305C15.9219 19.1305 17.3042 17.6906 17.3042 15.9206C17.3042 14.1505 15.9219 12.7107 14.2226 12.7107Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="pxl-item--holder ">
                                <div class="pxl-item--meta pxl-flex-grow ">
                                    <h3 class="pxl-item--title">
                                        <?php echo pxl_print_html($title); ?>
                                    </h3>
                                    <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                </div>
                                <?php if (!empty($icon_image['id'])): ?>
                                    <div class="pxl-item--icon">
                                        <?php echo wp_get_attachment_image($icon_image['id'], 'full'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>