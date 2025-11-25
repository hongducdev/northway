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
    <div class="pxl-swiper-slider pxl-post-carousel pxl-post-carousel1 <?php echo pxl_print_html($settings['style_l11']) ?>" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
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
                                        <?php if ($show_button == 'true') : ?>
                                            <div class="pxl-post--button">
                                                <svg width="10" height="10" viewBox="0 0 101 101" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="pxl-post--button-rounded-top">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z"></path>
                                                    <path d="M1 101C1 45.7715 45.7715 1 101 1" fill="none"></path>
                                                </svg>
                                                <svg width="10" height="10" viewBox="0 0 101 101" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="pxl-post--button-rounded-bottom">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z"></path>
                                                    <path d="M1 101C1 45.7715 45.7715 1 101 1" fill="none"></path>
                                                </svg>
                                                <a class="pxl-post--button-readmore" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                    <span class="pxl-post--button-readmore-hover">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M14.6568 0C15.013 0 15.3547 0.141511 15.6066 0.39341C15.8585 0.64531 16 0.986961 16 1.3432V14.6409C16 14.9972 15.8585 15.3388 15.6066 15.5907C15.3547 15.8426 15.013 15.9841 14.6568 15.9841C14.3006 15.9841 13.9589 15.8426 13.707 15.5907C13.4551 15.3388 13.3136 14.9972 13.3136 14.6409V4.58636L2.30933 15.5899C2.18542 15.7182 2.03723 15.8205 1.87335 15.8909C1.70948 15.9613 1.53322 15.9984 1.35488 16C1.17653 16.0015 0.999632 15.9675 0.834556 15.9C0.66949 15.8324 0.519529 15.7327 0.393416 15.6066C0.267298 15.4805 0.167521 15.3305 0.099983 15.1654C0.032447 15.0003 -0.00149903 14.8234 5.07695e-05 14.6451C0.00160341 14.4667 0.0386282 14.2905 0.109022 14.1266C0.179418 13.9627 0.281775 13.8145 0.410063 13.6906L11.4129 2.6864H1.35903C1.00279 2.6864 0.661134 2.54489 0.409233 2.29299C0.157335 2.0411 0.0158246 1.69944 0.0158223 1.3432C0.0158223 0.986962 0.157334 0.64531 0.409233 0.39341C0.661134 0.14151 1.00279 0 1.35903 0H14.6568Z" fill="currentColor"/>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M14.6568 0C15.013 0 15.3547 0.141511 15.6066 0.39341C15.8585 0.64531 16 0.986961 16 1.3432V14.6409C16 14.9972 15.8585 15.3388 15.6066 15.5907C15.3547 15.8426 15.013 15.9841 14.6568 15.9841C14.3006 15.9841 13.9589 15.8426 13.707 15.5907C13.4551 15.3388 13.3136 14.9972 13.3136 14.6409V4.58636L2.30933 15.5899C2.18542 15.7182 2.03723 15.8205 1.87335 15.8909C1.70948 15.9613 1.53322 15.9984 1.35488 16C1.17653 16.0015 0.999632 15.9675 0.834556 15.9C0.66949 15.8324 0.519529 15.7327 0.393416 15.6066C0.267298 15.4805 0.167521 15.3305 0.099983 15.1654C0.032447 15.0003 -0.00149903 14.8234 5.07695e-05 14.6451C0.00160341 14.4667 0.0386282 14.2905 0.109022 14.1266C0.179418 13.9627 0.281775 13.8145 0.410063 13.6906L11.4129 2.6864H1.35903C1.00279 2.6864 0.661134 2.54489 0.409233 2.29299C0.157335 2.0411 0.0158246 1.69944 0.0158223 1.3432C0.0158223 0.986962 0.157334 0.64531 0.409233 0.39341C0.661134 0.14151 1.00279 0 1.35903 0H14.6568Z" fill="currentColor"/>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_date == 'true'): ?>
                                            <div class="pxl-post--date">
                                                <span class="pxl-post--date-day"><?php echo get_the_date('d', $post->ID) ?></span>
                                                <h6 class="pxl-post--date-month"><?php echo get_the_date('M', $post->ID) ?></h6>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="pxl-post--holder">
                                        <div class="pxl-post--meta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none" class="pxl-post--meta-star">
                                                <path d="M6.1289 0.222672C6.2556 -0.074224 6.74448 -0.074224 6.87119 0.222672C6.95138 0.410547 7.04052 0.594799 7.13943 0.774832C7.4414 1.32435 7.77711 1.81559 8.14649 2.25392C8.26959 2.4 8.39638 2.54026 8.52689 2.67491C8.72247 2.87669 8.92641 3.06591 9.13852 3.24331C9.28006 3.36169 9.42556 3.47501 9.57441 3.5831C10.2443 4.06954 10.9878 4.45482 11.8036 4.75863C12.1093 4.87247 12.4258 4.97499 12.7517 5.06719C13.0827 5.1611 13.0828 5.84037 12.7517 5.93415C12.3025 6.06137 11.8722 6.20739 11.4614 6.37638C11.2325 6.4705 11.0099 6.5727 10.7931 6.6812C10.6144 6.7706 10.4386 6.86374 10.2681 6.96352C10.0287 7.10374 9.79756 7.25496 9.57441 7.41699C9.42556 7.52509 9.28006 7.63841 9.13852 7.75678C8.9264 7.93419 8.72248 8.1234 8.52689 8.32518C8.39641 8.4598 8.26957 8.60013 8.14649 8.74617C7.77712 9.18449 7.44139 9.67577 7.13943 10.2253C7.04052 10.4053 6.9514 10.5896 6.87119 10.7774C6.74444 11.0742 6.25573 11.0742 6.1289 10.7774C6.0487 10.5896 5.95955 10.4053 5.86066 10.2253C4.9482 8.56482 3.72518 7.44107 2.20702 6.6812C1.98992 6.57254 1.76672 6.47063 1.53758 6.37638C1.12705 6.20755 0.697169 6.06134 0.248398 5.93415C-0.0827832 5.84031 -0.0828154 5.1609 0.248398 5.06719C0.574114 4.97502 0.88976 4.87241 1.19534 4.75863C1.67052 4.58169 2.12101 4.37619 2.54695 4.14026C3.90841 3.38599 5.01742 2.30931 5.86066 0.774832C5.95956 0.594807 6.04872 0.410538 6.1289 0.222672Z" fill="currentColor"/>
                                            </svg>
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
    </div>
<?php endif; ?>