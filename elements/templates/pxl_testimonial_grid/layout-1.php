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
                        <?php if (!empty($image['id'])) {
                            $img = pxl_get_image_by_size(array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => '70x70',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail']; ?>
                            <div class="pxl-item--avatar ">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php } ?>
                        <p class="pxl-item--description"><?php echo pxl_print_html($desc); ?></p>
                        <div class="quote">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" viewBox="0 0 35 25" fill="none">
                                <path d="M27.1309 25C31.4776 25 35 21.392 35 16.9396C35 12.7174 31.8524 9.33971 27.8803 8.95588C28.7047 7.42056 30.1286 5.80847 32.6767 4.27315C33.3512 3.88932 33.8009 3.12166 33.8009 2.27723C33.8009 0.665144 32.1521 -0.486349 30.7282 0.204546C26.4564 2.20046 19.3367 6.95996 19.3367 16.9396C19.3367 21.4688 22.7841 25 27.1309 25Z" fill="white"/>
                                <path d="M7.79534 25C12.1421 25 15.6645 21.392 15.6645 16.9396C15.6645 12.7174 12.5168 9.33971 8.54478 8.95588C9.36916 7.42056 10.7931 5.80847 13.3412 4.27315C14.0157 3.88932 14.4654 3.12166 14.4654 2.27723C14.4654 0.665144 12.8166 -0.486349 11.3927 0.204546C7.12085 2.20046 0.00117493 6.95996 0.00117493 16.9396C-0.0737724 21.4688 3.4486 25 7.79534 25Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="pxl-item--meta">
                            <h3 class="pxl-item--title">
                                <?php echo pxl_print_html($title); ?>
                            </h3>
                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
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