<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$tax = ['portfolio-category'];
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
} else {
    $source = $widget->get_setting('source_' . $settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout'] = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
    'tax' => $tax,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if ($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$portfolio_style_1 = $widget->get_setting('portfolio_style_1', 'pxl-post-style1');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$center = $widget->get_setting('center', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$show_category = $widget->get_setting('show_category');
$num_words = $widget->get_setting('num_words');
$show_title = $widget->get_setting('show_title');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$button_url = $widget->get_setting('button_url');
$show_client = $widget->get_setting('show_client');

$opts = [
    'slide_direction' => 'horizontal',
    'slide_percolumn' => 1,
    'slide_percolumnfill' => 1,
    'center_slide' => false,
    'slides_to_show' => (int)$col_xl,
    'slides_to_show_xxl' => (int)$col_xxl,
    'slides_to_show_lg' => (int)$col_lg,
    'slides_to_show_md' => (int)$col_md,
    'slides_to_show_sm' => (int)$col_sm,
    'slides_to_show_xs' => (int)$col_xs,
    'slides_to_scroll' => (int)$slides_to_scroll,
    'slides_gutter' => 30,
    'arrow' => (bool)$arrows,
    'pagination' => (bool)$pagination,
    'pagination_type' => $pagination_type,
    'autoplay' => (bool)$autoplay,
    'pause_on_hover' => (bool)$pause_on_hover,
    'pause_on_interaction' => true,
    'delay' => (int)$autoplay_speed,
    'loop' => $infinite,
    'speed' => (int)$speed,
    'center' => (bool)$center,
];

$class = 'pxl-swiper-container';
if ($settings['filter_type'] == 'style-2') {
    $class .= ' overflow-visible';
}

$widget->add_render_attribute('carousel', [
    'class' => $class,
    'dir' => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-check-scroll pxl-portfolio-carousel2 blinds_staggered <?php echo esc_attr($portfolio_style_1); ?> ">
        <div class="pxl-carousel-inner <?php if ($settings['filter_type'] == 'style-2') {
            echo 'overflow-visible relative';
        } ?>">
            <div class="row">
                <div class="col-md-12 col-xs-12 carousel-no-appended">
                    <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                            <div class="pxl-swiper-wrapper">
                                <?php
                                foreach ($posts as $post):
                                    $image_size = !empty($img_size) ? $img_size : 'full';
                                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
                                        $img_id = get_post_thumbnail_id($post->ID);
                                        $img = pxl_get_image_by_size(array(
                                            'attach_id' => $img_id,
                                            'thumb_size' => $image_size
                                        ));
                                        $thumbnail = $img['thumbnail'];
                                        $thumbnail_url = $img['url'];
                                    }
                                    $filter_class = '';
                                    if ($select_post_by === 'term_selected')
                                        $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                                ?>
                                    <div class="pxl-swiper-slide visible"
                                        data-filter="<?php echo esc_attr($filter_class); ?>"
                                        <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('Drag.', 'northway'); ?>" <?php endif; ?>>
                                        <div class="pxl-post--wrapper">
                                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow"
                                            data-wow-duration="1.2s">
                                                <h5 class="pxl-post--title">
                                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                                </h5>
                                                <?php if ($show_excerpt == 'true'): ?>
                                                    <div class="pxl-post--content">
                                                        <?php if ($show_excerpt == 'true'): ?>
                                                            <?php
                                                            echo wp_trim_words($post->post_excerpt, $num_words, null);
                                                            ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($show_client == 'true'): ?>
                                                    <div class="pxl-post--client pxl-post--meta-item">
                                                        <i class="flaticon-user"></i>
                                                        <span>
                                                            <?php echo esc_html__('Client: ', 'northway'); ?><?php echo esc_html(get_post_meta($post->ID, 'portfolio_client', true)); ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($show_category == 'true'): ?>
                                                    <div class="pxl-post--category pxl-post--meta-item">
                                                        <i class="flaticon-tag"></i>
                                                        <span>
                                                            <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="pxl-post--featured">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                    <?php if ($show_button == 'true'): ?>
                                                        <div class="pxl-post--button-wrap">
                                                            <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                                <span class="pxl--btn-text">
                                                                    <?php if (!empty($button_text)): ?>
                                                                        <?php echo esc_html($button_text); ?>
                                                                    <?php else: ?>
                                                                        <?php esc_html__('Explore Details', 'northway'); ?>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <i class="bi-arrow-right-short"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                </div>
            </div>
                    <div class="container wrap-arrow <?php echo esc_attr($settings['style-pa']) ?>">
                        <?php if ($pagination !== false): ?>
                            <div class="pxl-swiper-dots style-1"></div>
                        <?php endif; ?>
                        <?php if ($arrows !== false): ?>
                            <div class="pxl-swiper-arrow-wrap style-4">
                                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                                    <i class="bi-arrow-left-short"></i>
                                </div>
                                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                                    <i class="bi-arrow-right-short"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    <?php endif; ?>