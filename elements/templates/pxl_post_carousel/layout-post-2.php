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
                    $image_size = !empty($img_size) ? $img_size : '767x709';
                    foreach ($posts as $post):
                        $img_id       = get_post_thumbnail_id($post->ID);
                        $author_id = $post->post_author;
                        $author = get_user_by('id', $author_id); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
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
                                            <div class="post-date">
                                                <span class="day"><?php echo get_the_date('d', $post->ID) ?></span>
                                                <span class="month"><?php echo get_the_date('M', $post->ID) ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl-post--meta">
                                            <?php if ($show_date == 'true' || $show_author == 'true'): ?>
                                                <?php if ($show_author == 'true'): ?>
                                                    <div class="pxl-item--meta">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                                            <path d="M2.16811 2.92717C2.16811 2.37856 2.3308 1.84226 2.63559 1.3861C2.94039 0.929946 3.3736 0.574414 3.88046 0.364468C4.38731 0.154522 4.94504 0.0995907 5.48311 0.20662C6.02119 0.31365 6.51544 0.577833 6.90337 0.965763C7.2913 1.35369 7.55549 1.84795 7.66252 2.38602C7.76954 2.92409 7.71461 3.48182 7.50467 3.98868C7.29472 4.49553 6.93919 4.92875 6.48303 5.23354C6.02687 5.53834 5.49058 5.70102 4.94196 5.70102C4.20655 5.70018 3.5015 5.40767 2.98148 4.88765C2.46147 4.36764 2.16895 3.66258 2.16811 2.92717ZM9.57826 9.8083C9.5217 9.56843 9.44345 9.33419 9.34446 9.1085C8.63792 7.4957 6.95142 6.49355 4.94196 6.49355C2.66067 6.49355 0.801794 7.81073 0.315974 9.77066C0.27259 9.94612 0.269677 10.1291 0.307455 10.3059C0.345233 10.4826 0.422712 10.6485 0.534032 10.7909C0.645352 10.9333 0.787596 11.0485 0.950006 11.1278C1.11242 11.2071 1.29074 11.2485 1.47148 11.2487H8.41403C8.59558 11.2491 8.77484 11.2082 8.93819 11.1289C9.10154 11.0497 9.24468 10.9343 9.35674 10.7914C9.46581 10.6551 9.54243 10.4957 9.5808 10.3254C9.61918 10.1551 9.61831 9.97824 9.57826 9.8083Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="pxl-author--title">
                                                            <?php echo esc_html__('By: ', 'northway'); ?><?php echo esc_html($author->display_name); ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if ($show_comment == 'true'): ?>
                                                <div class="pxl-item--meta">
                                                    <?php if ($show_comment == 'true'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                                            <path d="M5.827 0.153321C4.78994 0.15307 3.77161 0.39691 2.87717 0.859657C1.98273 1.3224 1.24462 1.98728 0.739069 2.78562C0.233516 3.58396 -0.0211496 4.48681 0.00137448 5.40094C0.0238986 6.31506 0.322796 7.20731 0.867195 7.98554L0.405965 10.2138C0.392409 10.2808 0.397392 10.3497 0.42049 10.4147C0.443588 10.4797 0.48412 10.5388 0.538648 10.587C0.582919 10.625 0.635311 10.655 0.692791 10.6751C0.75027 10.6951 0.811696 10.705 0.873513 10.704H0.968287L4.02631 10.1469C4.60378 10.3343 5.21192 10.4377 5.827 10.4533C7.37618 10.4533 8.86192 9.91071 9.95735 8.9449C11.0528 7.97909 11.6682 6.66917 11.6682 5.30331C11.6682 3.93745 11.0528 2.62753 9.95735 1.66172C8.86192 0.695907 7.37618 0.153321 5.827 0.153321ZM2.82585 5.43979C2.82585 5.30207 2.87216 5.16744 2.95895 5.05293C3.04573 4.93843 3.16908 4.84918 3.31339 4.79647C3.4577 4.74377 3.6165 4.72998 3.7697 4.75685C3.9229 4.78372 4.06363 4.85003 4.17408 4.94742C4.28453 5.0448 4.35975 5.16887 4.39023 5.30394C4.4207 5.43902 4.40506 5.57902 4.34528 5.70626C4.28551 5.8335 4.18428 5.94225 4.0544 6.01876C3.92452 6.09527 3.77183 6.13611 3.61562 6.13611C3.40616 6.13611 3.20528 6.06275 3.05717 5.93216C2.90905 5.80158 2.82585 5.62447 2.82585 5.43979ZM5.03722 5.43979C5.03722 5.30207 5.08354 5.16744 5.17033 5.05293C5.25711 4.93843 5.38045 4.84918 5.52477 4.79647C5.66908 4.74377 5.82788 4.72998 5.98108 4.75685C6.13428 4.78372 6.27501 4.85003 6.38546 4.94742C6.49591 5.0448 6.57113 5.16887 6.60161 5.30394C6.63208 5.43902 6.61644 5.57902 6.55666 5.70626C6.49689 5.8335 6.39566 5.94225 6.26578 6.01876C6.1359 6.09527 5.98321 6.13611 5.827 6.13611C5.61754 6.13611 5.41666 6.06275 5.26854 5.93216C5.12043 5.80158 5.03722 5.62447 5.03722 5.43979ZM8.03838 6.13611C7.88218 6.13611 7.72948 6.09527 7.5996 6.01876C7.46973 5.94225 7.3685 5.8335 7.30872 5.70626C7.24895 5.57902 7.2333 5.43902 7.26378 5.30394C7.29425 5.16887 7.36947 5.0448 7.47992 4.94742C7.59038 4.85003 7.7311 4.78372 7.8843 4.75685C8.03751 4.72998 8.1963 4.74377 8.34062 4.79647C8.48493 4.84918 8.60828 4.93843 8.69506 5.05293C8.78184 5.16744 8.82816 5.30207 8.82816 5.43979C8.82816 5.62447 8.74495 5.80158 8.59684 5.93216C8.44873 6.06275 8.24784 6.13611 8.03838 6.13611Z" fill="currentColor"/>
                                                        </svg>
                                                        <a href="<?php echo get_comments_link($post->ID); ?>">
                                                            <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="pxl-post--holder">
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
                                        <?php if ($show_button == 'true') : ?>
                                            <div class="pxl-post--readmore">
                                                <div class="pxl-post--readmore-divider"></div>
                                                <a href="<?php if (!empty($service_external_link)) {
                                                            echo esc_url($service_external_link);
                                                        } else {
                                                            echo esc_url(get_permalink($post->ID));
                                                        } ?>" class="btn-readmore">
                                                    <span class="pxl-post--readmore-text">
                                                        <?php if (!empty($button_text)) : ?>
                                                            <?php echo pxl_print_html($button_text); ?>
                                                        <?php else : ?>
                                                            <?php echo esc_html__('Read more', 'northway'); ?>
                                                        <?php endif; ?>
                                                    </span>
                                                    <div class="pxl-post--readmore-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                                            <path d="M10.2 0.199951L9.01 1.38995L13.77 6.14995H0V7.84995H13.77L9.01 12.61L10.2 13.8L17 6.99995L10.2 0.199951Z" fill="currentColor"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
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
                    <i class="fas fa-angle-right"></i>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                    <i class="fas fa-angle-left"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>