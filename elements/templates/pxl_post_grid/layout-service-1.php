<?php
$html_id = pxl_get_element_id($settings);
$tax = ['service-category'];
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 4);
extract(pxl_get_posts_of_grid(
    'service', 
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    $tax
));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');

$grid_class = '';
$grid_class = 'pxl-grid-inner';

$filter = $widget->get_setting('filter', 'false');
$filter_type = $widget->get_setting('filter_type', 'normal');
$filter_style = $widget->get_setting('filter_style', 'style-1');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');

$post_type = $widget->get_setting('post_type', 'service');
$layout = $widget->get_setting('layout_'.$post_type, 'service-1');


$show_excerpt = $widget->get_setting('show_excerpt');
$show_number = $widget->get_setting('show_number');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');

$load_more = array(
    'tax'             => $tax,
    'post_type'       => $post_type,   
    'layout'          => $layout,
    'startPage'       => $paged,
    'maxPages'        => $max,
    'total'           => $total,
    'filter'          => $filter,
    'filter_type'     => $filter_type,
    'perpage'         => $limit,
    'nextLink'        => $next_link,
    'source'          => $source,
    'orderby'         => $orderby,
    'order'           => $order,
    'limit'           => $limit,
    'post_ids'        => $post_ids,
    'pagination_type' => $pagination_type,
    'show_excerpt'    => $show_excerpt,
    'show_number'     => $show_number,
    'num_words'       => $num_words,
    'show_button'     => $show_button,
    'button_text'     => $button_text,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'     => $pxl_animate,
    'html_id'         => $html_id,
);

$wrap_attrs = [
    'id'               => $html_id,
    'class'            => trim('pxl-grid pxl-service-grid pxl-service-grid-layout1 pxl-service-style1 '),
    'data-start-page'  => $paged,
    'data-max-pages'   => $max,
    'data-total'       => $total,
    'data-perpage'     => $limit,
    'data-next-link'   => $next_link
];

if ($pagination_type != 'false'){
    $wrap_attrs['data-loadmore'] = json_encode($load_more);
}

$widget->add_render_attribute( 'wrapper', $wrap_attrs );
 
if( count($posts) <= 0){
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'northway' ). '</div>';
    return;
} ?>

<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )) ?> data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
    <div class="<?php echo esc_attr($grid_class); ?>">
        <?php northway_get_post_grid($posts, $load_more); ?>
    </div>
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination">
            <?php northway()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more">
            <span class="btn-grid-loadmore btn-submit">
                <span class="pxl-loadmore-text"><?php echo esc_html__('Load More', 'northway') ?></span>
                <span class="pxl-load-icon"></span>
            </span>
        </div>
    <?php } ?>
</div>