<?php
$html_id = pxl_get_element_id($settings);
$tax = ['portfolio-category'];
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
extract(pxl_get_posts_of_grid(
    'portfolio', 
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    $tax
));

$num_words = $widget->get_setting('num_words', 25);
$show_category = $widget->get_setting('show_category', 'true');
$show_excerpt = $widget->get_setting('show_excerpt', 'true');
$show_button = $widget->get_setting('show_button', 'true');
$button_text = $widget->get_setting('button_text', esc_html__('Read More', 'northway'));
$show_client = $widget->get_setting('show_client', 'true');
$pxl_icon = $widget->get_setting('pxl_icon');
$img_size = !empty($widget->get_setting('img_size')) ? $widget->get_setting('img_size') : '570x400';
$pxl_animate = $widget->get_setting('pxl_animate', '');
$tab_effect = $widget->get_setting('tab_effect', 'tab-effect-fade');
$tab_duration = $widget->get_setting('tab_duration', 400);

if( count($posts) <= 0){
    echo '<div class="pxl-no-post-grid">'.esc_html__( 'No Post Found', 'northway' ). '</div>';
    return;
}
?>

<div class="pxl-tabs pxl-portfolio-list pxl-portfolio-list-layout1 <?php echo esc_attr($tab_effect.' '.$pxl_animate); ?>" id="<?php echo esc_attr($html_id); ?>" data-duration="<?php echo esc_attr($tab_duration); ?>">
    <div class="pxl-tabs--inner">
        <svg xmlns="http://www.w3.org/2000/svg" width="83" height="83" viewBox="0 0 83 83" fill="none" class="pxl-tabs--fold">
            <path d="M1 62V1L82 82H21C9.95431 82 1 73.0457 1 62Z" fill="#F8F8F2"/>
            <path d="M0.808594 0.538086C0.995431 0.460695 1.21052 0.503485 1.35352 0.646484L82.3535 81.6465C82.4965 81.7895 82.5393 82.0046 82.4619 82.1914C82.3845 82.3782 82.2022 82.5 82 82.5H21C9.67816 82.5 0.5 73.3218 0.5 62V1C0.5 0.797792 0.621793 0.615492 0.808594 0.538086Z" stroke="#666F78" stroke-opacity="0.5" stroke-linejoin="round"/>
        </svg>
        <div class="pxl-tabs--title">
            <?php foreach ($posts as $key => $post) : ?>
                <div class="pxl-item--title <?php if($key == 0) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$post->ID); ?>">
                    <h5>
                        <?php echo esc_html(get_the_title($post->ID)); ?>
                    </h5>
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-item--title-link">
                        <i class="flaticon-arrow"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($posts as $key => $post) : 
                $img_id = get_post_thumbnail_id($post->ID);
                $client = get_post_meta($post->ID, 'portfolio_client', true);
                $address = get_post_meta($post->ID, 'portfolio_address', true);
                
                if ($img_id) {
                    $img = pxl_get_image_by_size(array(
                        'attach_id' => $img_id,
                        'thumb_size' => $img_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $img_size);
                }
            ?>
                <div id="<?php echo esc_attr($html_id.'-'.$post->ID); ?>" class="pxl-item--content <?php if($key == 0) { echo 'active'; } ?>" <?php if($key == 0) { ?>style="display: block;"<?php } ?>>
                    <h3 class="pxl-portfolio--title">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                    <?php if ($show_excerpt == 'true' && !empty($post->post_excerpt)): ?>
                        <div class="pxl-portfolio--excerpt">
                            <?php echo wp_trim_words($post->post_excerpt, $num_words, '...'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (has_post_thumbnail($post->ID)): ?>
                        <div class="pxl-portfolio--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($show_category == 'true' || $show_client == 'true'): ?>
                                <div class="pxl-portfolio--meta">
                                    <?php if ($show_client == 'true' && !empty($client)): ?>
                                        <div class="pxl-portfolio--client pxl-portfolio--meta-item">
                                            <i class="flaticon-user"></i>
                                            <span class="meta-value"><?php echo esc_html__('Client: ', 'northway'); ?><?php echo esc_html($client); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_category == 'true'): ?>
                                        <div class="pxl-portfolio--category pxl-portfolio--meta-item">
                                            <i class="flaticon-tag"></i>
                                            <span class="meta-value"><?php the_terms($post->ID, 'portfolio-category', '', ', '); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>