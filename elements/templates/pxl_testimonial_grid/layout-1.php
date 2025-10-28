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
?>
<?php if (isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-grid pxl-testimonial-grid pxl-testimonial-grid1 <?php echo esc_attr($settings['style']); ?>" data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['testimonial'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $desc = isset($value['description']) ? $value['description'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $star = isset($value['star']) ? $value['star'] : '';
            ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <p class="pxl-item--description"><?php echo pxl_print_html($desc); ?></p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="640" height="14" viewBox="0 0 640 14" fill="none" class="pxl-item--divider">
                            <path d="M0 0.813489H8.90332C10.4753 0.813489 11.9743 0.800888 13.4014 0.788098C15.6973 0.808787 17.8234 0.827214 19.7764 0.787122C20.2438 0.796743 20.7009 0.809758 21.1475 0.827161C22.4882 0.8794 23.7354 0.970363 24.8916 1.12111C29.0013 1.657 31.8537 2.9443 33.6162 5.9004C34.4334 7.27155 34.6269 8.94644 34.627 10.6426V13.4053C34.9977 13.4053 35.3692 13.4053 35.373 13.4053V10.6426C35.3731 8.94645 35.5666 7.27155 36.3838 5.9004C38.1463 2.9443 40.9987 1.65701 45.1084 1.12111C45.3011 1.09598 45.4965 1.07269 45.6943 1.05079C47.0786 0.897549 48.5873 0.820803 50.2246 0.787122C52.1773 0.827188 54.3031 0.808783 56.5986 0.788098C58.0257 0.800888 59.5248 0.813489 61.0967 0.813489H640V0.00489492H58.793C58.0435 0.00964357 57.3121 0.0160795 56.5986 0.0224733C54.4106 0.00275644 52.3767 -0.0144378 50.5 0.018567C50.4118 0.020121 50.3239 0.0198172 50.2363 0.0214967C46.9399 0.0873341 43.9378 0.16372 40.8066 1.3506C40.5386 1.45222 40.2774 1.56157 40.0234 1.67872C38.2469 2.49822 36.8158 3.71029 35.748 5.50099C35.4096 6.06878 35.1691 6.67638 35 7.30275C34.8309 6.67637 34.5904 6.06879 34.252 5.50099C33.8986 4.90845 33.5054 4.37893 33.0732 3.90626C32.9292 3.74875 32.7806 3.59735 32.6279 3.45216C32.399 3.23454 32.1603 3.03021 31.9121 2.83888C31.7465 2.71126 31.5765 2.58921 31.4023 2.47267C31.1411 2.29782 30.8702 2.13471 30.5898 1.98341C30.3905 1.87583 30.1855 1.77512 29.9766 1.67872C29.7228 1.56169 29.4622 1.45213 29.1943 1.3506C26.0436 0.15606 22.8253 0.0771703 19.5 0.018567C17.6233 -0.0144379 15.5894 0.00275634 13.4014 0.0224733C12.6879 0.0160795 11.9565 0.00964359 11.207 0.00489492H0V0.813489Z" fill="currentColor"/>
                        </svg>
                        <div class="pxl-item--footer">
                            <div class="pxl-item--info">
                                <?php if (!empty($image['id'])) {
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '140x140',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail']; ?>
                                    <div class="pxl-item--avatar ">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--meta">
                                    <h3 class="pxl-item--title">
                                        <?php echo pxl_print_html($title); ?>
                                    </h3>
                                    <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                </div>
                            </div>
                            <div class="pxl-item--star">
                                <?php for ($i = 1; $i <= $star; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M15.5613 6.81642L12.2138 9.97746L13.0043 14.4421C13.0387 14.6373 12.956 14.8346 12.7904 14.9512C12.6969 15.0173 12.5857 15.0506 12.4745 15.0506C12.389 15.0506 12.303 15.0308 12.2246 14.9908L8.08541 12.8829L3.9468 14.9902C3.76623 15.0829 3.54642 15.0678 3.3809 14.9507C3.21538 14.8341 3.13262 14.6368 3.16701 14.4415L3.95754 9.97694L0.609468 6.81642C0.463291 6.67795 0.410088 6.47075 0.473502 6.28282C0.536917 6.09488 0.705127 5.95692 0.907731 5.92829L5.53431 5.27755L7.60335 1.21589C7.78446 0.860328 8.38636 0.860328 8.56747 1.21589L10.6365 5.27755L15.2631 5.92829C15.4657 5.95692 15.6339 6.09436 15.6973 6.28282C15.7607 6.47127 15.7075 6.67742 15.5613 6.81642Z" fill="currentColor" />
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>