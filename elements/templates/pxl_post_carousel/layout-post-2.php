<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
} else {
    $source  = $widget->get_setting('source_' . $settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
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
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$show_category = $widget->get_setting('show_category');
$show_date = $widget->get_setting('show_date');
$show_author = $widget->get_setting('show_author');
$show_comment = $widget->get_setting('show_comment');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1,
    'slide_percolumnfill'           => 1,
    'slide_mode'                    => 'slide',
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl,
    'slides_to_show_lg'             => (int)$col_lg,
    'slides_to_show_md'             => (int)$col_md,
    'slides_to_show_sm'             => (int)$col_sm,
    'slides_to_show_xs'             => (int)$col_xs,
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'slides_gutter'                 => 30,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];

$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-post-carousel2 <?php echo pxl_print_html($settings['style_l11']) ?>" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '792x422';
                    foreach ($posts as $post):
                        $img_id       = get_post_thumbnail_id($post->ID);
                        $author_id = $post->post_author;
                        $author = get_user_by('id', $author_id); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
                                <h5 class="pxl-post--title ">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <?php echo pxl_print_html(get_the_title($post->ID)); ?>
                                    </a>
                                </h5>
                                <?php if ($show_excerpt == 'true'): ?>
                                    <p class="pxl-post--content">
                                        <?php
                                        echo wp_trim_words($post->post_excerpt, $num_words, null);
                                        ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img          = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ));
                                    $thumbnail    = $img['thumbnail'];
                                ?>
                                    <div class="pxl-post--featured hover-imge-effect2">
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </a>
                                        <?php if ($show_date == 'true'): ?>
                                            <div class="pxl-post--date">
                                                <span class="pxl-post--date-day"><?php echo get_the_date('d', $post->ID) ?></span>
                                                <h6 class="pxl-post--date-month"><?php echo get_the_date('M', $post->ID) ?></h6>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="pxl-post--holder">
                                        <div class="pxl-post--meta">
                                            <?php if ($show_comment == 'true' || $show_author == 'true'): ?>
                                                <?php if ($show_author == 'true'): ?>
                                                    <div class="pxl-post--meta-item pxl-post--meta-item-author">
                                                        <i class="flaticon-user"></i>
                                                        <span>
                                                            <?php echo esc_html__('By ', 'northway'); ?><?php echo esc_html($author->display_name); ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if ($show_comment == 'true'): ?>
                                                <div class="pxl-post--meta-item pxl-post--meta-item-comment">
                                                    <?php if ($show_comment == 'true'): ?>
                                                        <i class="flaticon-comment"></i>
                                                        <a href="<?php echo get_comments_link($post->ID); ?>">
                                                            <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($show_button == 'true') : ?>
                                            <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                <i class="bi-arrow-right-short"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if ($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>

        <?php if ($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-1">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                    <i class="bi-arrow-left-short"></i>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                    <i class="bi-arrow-right-short"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>