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
    <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-check-scroll pxl-portfolio-carousel1 blinds_staggered <?php echo esc_attr($portfolio_style_1); ?> ">
        <?php if ($settings['filter'] == 'true' && $settings['filter_type'] == 'df') { ?>
            <div class="swiper-filter <?php echo esc_attr($settings['filter_type']); ?>">
                <div class="pxl-filter-container">
                    <div class="pxl-grid-filter normal style-1">
                        <div class="pxl--filter-inner">
                            <?php if (!empty($filter_default_title)): ?>
                                <span class="filter-item active" data-filter-target="all">
                                    <span class="cat-name"><?php echo esc_html($filter_default_title); ?></span>
                                </span>
                            <?php endif; ?>
                            <?php foreach ($categories as $category):
                                $category_arr = explode('|', $category);
                                $term = get_term_by('slug', $category_arr[0], $category_arr[1]);
                                $tax_count = 0;
                                foreach ($posts as $key => $post) {
                                    $this_terms = get_the_terms($post->ID, 'portfolio-category');
                                    $term_list = [];
                                    foreach ($this_terms as $t) {
                                        $term_list[] = $t->slug;
                                    }
                                    if (in_array($term->slug, $term_list))
                                        $tax_count++;
                                }
                                if ($tax_count > 0): ?>
                                    <span class="filter-item" data-filter-target="<?php echo esc_attr($term->slug); ?>">
                                        <span class="cat-name"><?php echo esc_html($term->name); ?></span>
                                    </span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if ($settings['show_button'] == 'true'): ?>
                        <div class="pxl-portfolio-carousel-button">
                            <a href="<?php echo esc_url($button_url['url']); ?>" class="btn">
                                <?php if (!empty($button_text)): ?>
                                    <?php echo esc_html($button_text); ?>
                                <?php else: ?>
                                    <?php esc_html__('View All Projects', 'northway'); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
        <div class="pxl-carousel-inner <?php if ($settings['filter_type'] == 'style-2') {
                                            echo 'overflow-visible relative';
                                        } ?>">
            <div class="row">
                <?php if ($settings['filter'] == 'true' && $settings['filter_type'] == 'style-2') { ?>
                    <div class="col-md-2 col-xs-12 perspective">
                        <div class="swiper-filter <?php echo esc_attr($settings['filter_type']); ?>">
                            <div class="container">
                                <div class="pxl-grid-filter normal style-1">
                                    <div class="pxl--filter-inner">
                                        <?php if (!empty($filter_default_title)): ?>
                                            <span class="filter-item active" data-filter-target="all">
                                                <span class="cat-name"><?php echo esc_html($filter_default_title); ?>
                                                    <span class="filter-item-count">
                                                        <?php
                                                        echo count($posts);
                                                        ?>
                                                    </span>
                                                </span>
                                            </span>
                                        <?php endif; ?>
                                        <?php foreach ($categories as $category):
                                            $category_arr = explode('|', $category);
                                            $term = get_term_by('slug', $category_arr[0], $category_arr[1]);
                                            $tax_count = 0;
                                            foreach ($posts as $key => $post) {
                                                $this_terms = get_the_terms($post->ID, 'portfolio-category');
                                                $term_list = [];
                                                foreach ($this_terms as $t) {
                                                    $term_list[] = $t->slug;
                                                }
                                                if (in_array($term->slug, $term_list))
                                                    $tax_count++;
                                            }
                                            if ($tax_count > 0): ?>
                                                <span class="filter-item"
                                                    data-filter-target="<?php echo esc_attr($term->slug); ?>">
                                                    <span class="cat-name"><?php echo esc_html($term->name); ?>
                                                        <span class="filter-item-count">
                                                            <?php
                                                            echo esc_html($tax_count);
                                                            ?>
                                                        </span>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($settings['filter'] == 'true' && $settings['filter_type'] == 'style-2') { ?>
                    <div class="col-md-10 col-xs-12 carousel-nav-appended">
                    <?php } else { ?>
                        <div class="col-md-12 col-xs-12 carousel-no-appended">
                        <?php } ?>
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
                                                <div class="pxl-post--featured">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                                <div class="pxl-post--holder">
                                                    <div class="pxl-post--meta">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none" class="pxl-post--meta-star">
                                                            <path d="M6.1289 0.222672C6.2556 -0.074224 6.74448 -0.074224 6.87119 0.222672C6.95138 0.410547 7.04052 0.594799 7.13943 0.774832C7.4414 1.32435 7.77711 1.81559 8.14649 2.25392C8.26959 2.4 8.39638 2.54026 8.52689 2.67491C8.72247 2.87669 8.92641 3.06591 9.13852 3.24331C9.28006 3.36169 9.42556 3.47501 9.57441 3.5831C10.2443 4.06954 10.9878 4.45482 11.8036 4.75863C12.1093 4.87247 12.4258 4.97499 12.7517 5.06719C13.0827 5.1611 13.0828 5.84037 12.7517 5.93415C12.3025 6.06137 11.8722 6.20739 11.4614 6.37638C11.2325 6.4705 11.0099 6.5727 10.7931 6.6812C10.6144 6.7706 10.4386 6.86374 10.2681 6.96352C10.0287 7.10374 9.79756 7.25496 9.57441 7.41699C9.42556 7.52509 9.28006 7.63841 9.13852 7.75678C8.9264 7.93419 8.72248 8.1234 8.52689 8.32518C8.39641 8.4598 8.26957 8.60013 8.14649 8.74617C7.77712 9.18449 7.44139 9.67577 7.13943 10.2253C7.04052 10.4053 6.9514 10.5896 6.87119 10.7774C6.74444 11.0742 6.25573 11.0742 6.1289 10.7774C6.0487 10.5896 5.95955 10.4053 5.86066 10.2253C4.9482 8.56482 3.72518 7.44107 2.20702 6.6812C1.98992 6.57254 1.76672 6.47063 1.53758 6.37638C1.12705 6.20755 0.697169 6.06134 0.248398 5.93415C-0.0827832 5.84031 -0.0828154 5.1609 0.248398 5.06719C0.574114 4.97502 0.88976 4.87241 1.19534 4.75863C1.67052 4.58169 2.12101 4.37619 2.54695 4.14026C3.90841 3.38599 5.01742 2.30931 5.86066 0.774832C5.95956 0.594807 6.04872 0.410538 6.1289 0.222672Z" fill="currentColor" />
                                                        </svg>
                                                        <?php if ($show_category == 'true'): ?>
                                                            <div class="pxl-post--category pxl-post--meta-item">
                                                                <i class="flaticon-box"></i>
                                                                <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($show_client == 'true'): ?>
                                                            <div class="pxl-post--client pxl-post--meta-item">
                                                                <i class="flaticon-user"></i>
                                                                <?php
                                                                $client = get_post_meta($post->ID, 'portfolio_client', true);
                                                                if (!empty($client)) {
                                                                    echo esc_html($client);
                                                                }
                                                                ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="pxl-post--body">
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
                                                        <?php if ($show_button == 'true'): ?>
                                                            <div class="pxl-post--button">
                                                                <div class="pxl-post--divider"></div>
                                                                <a class="btn pxl-button-style-2-default btn-default inline pxl-icon--right" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                                    <div class="pxl-button--icon pxl-button--icon-left">
                                                                        <i class="flaticon-arrow"></i>
                                                                    </div>
                                                                    <span class="pxl--btn-text"><?php echo esc_html($button_text); ?></span>
                                                                    <div class="pxl-button--icon pxl-button--icon-right">
                                                                        <i class="flaticon-arrow"></i>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
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
                            <div class="pxl-swiper-arrow-wrap style-1">
                                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" style="transform: scalex(-1);">
                                    <i class="bi-play-fill"></i>
                                </div>
                                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                                    <i class="bi-play-fill"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($portfolio_style_1 == 'style-2'): ?>
                            <?php if ($settings['show_button'] == 'true'): ?>
                                <div class="pxl-portfolio-carousel-button-2">
                                    <a href="<?php echo esc_url($button_url['url']); ?>" class="btn btn-default">
                                        <?php if (!empty($button_text)): ?>
                                            <?php echo esc_html($button_text); ?>
                                        <?php else: ?>
                                            <?php esc_html__('View All Projects', 'northway'); ?>
                                        <?php endif; ?>
                                        <i class="bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    <?php endif; ?>