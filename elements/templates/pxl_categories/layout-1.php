<?php
/**
 * Template for Categories Widget - Layout 1
 */

$post_types = !empty($settings['post_types']) ? (array) $settings['post_types'] : ['blog'];
$show_count = isset($settings['show_count']) && $settings['show_count'] === 'yes';
$hide_empty = isset($settings['hide_empty']) && $settings['hide_empty'] === 'yes';
$orderby = !empty($settings['orderby']) ? $settings['orderby'] : 'name';
$order = !empty($settings['order']) ? $settings['order'] : 'ASC';

$categories = array();

if (in_array('blog', $post_types)) {
    $blog_categories = get_categories(array(
        'taxonomy' => 'category',
        'hide_empty' => $hide_empty,
        'orderby' => $orderby,
        'order' => $order,
    ));
    foreach ($blog_categories as $cat) {
        $categories[] = array(
            'name' => $cat->name,
            'slug' => $cat->slug,
            'count' => $cat->count,
            'link' => get_category_link($cat->term_id),
            'type' => 'blog'
        );
    }
}

if (in_array('service', $post_types)) {
    $service_categories = get_terms(array(
        'taxonomy' => 'service-category',
        'hide_empty' => $hide_empty,
        'orderby' => $orderby,
        'order' => $order,
    ));
    if (!is_wp_error($service_categories)) {
        foreach ($service_categories as $cat) {
            $categories[] = array(
                'name' => $cat->name,
                'slug' => $cat->slug,
                'count' => $cat->count,
                'link' => get_term_link($cat->term_id, 'service-category'),
                'type' => 'service'
            );
        }
    }
}

if (in_array('portfolio', $post_types)) {
    $portfolio_categories = get_terms(array(
        'taxonomy' => 'portfolio-category',
        'hide_empty' => $hide_empty,
        'orderby' => $orderby,
        'order' => $order,
    ));
    if (!is_wp_error($portfolio_categories)) {
        foreach ($portfolio_categories as $cat) {
            $categories[] = array(
                'name' => $cat->name,
                'slug' => $cat->slug,
                'count' => $cat->count,
                'link' => get_term_link($cat->term_id, 'portfolio-category'),
                'type' => 'portfolio'
            );
        }
    }
}

if ($orderby === 'name') {
    usort($categories, function($a, $b) use ($order) {
        $result = strcmp($a['name'], $b['name']);
        return $order === 'DESC' ? -$result : $result;
    });
} elseif ($orderby === 'count') {
    usort($categories, function($a, $b) use ($order) {
        $result = $a['count'] - $b['count'];
        return $order === 'DESC' ? -$result : $result;
    });
}

$total_count = 0;
$all_categories_link = '#';

if (in_array('blog', $post_types)) {
    $blog_total = wp_count_posts('post')->publish;
    $total_count += $blog_total;
    if ($all_categories_link === '#') {
        $all_categories_link = get_permalink(get_option('page_for_posts')) ?: home_url();
    }
}

if (in_array('service', $post_types)) {
    $service_total = wp_count_posts('service')->publish;
    $total_count += $service_total;
    if ($all_categories_link === '#') {
        $archive_link = get_post_type_archive_link('service');
        if ($archive_link) {
            $all_categories_link = $archive_link;
        }
    }
}

if (in_array('portfolio', $post_types)) {
    $portfolio_total = wp_count_posts('portfolio')->publish;
    $total_count += $portfolio_total;
    if ($all_categories_link === '#') {
        $archive_link = get_post_type_archive_link('portfolio');
        if ($archive_link) {
            $all_categories_link = $archive_link;
        }
    }
}

if (count($post_types) > 1) {
    $all_categories_link = home_url();
}

?>
<div class="pxl-categories pxl-categories1">    
    <?php if (!empty($categories)): ?>
        <ul class="pxl-categories-list">
            <?php 
            $all_count_display = '';
            if ($show_count) {
                $all_count_display = ' <span class="count">(' . esc_html($total_count) . ')</span>';
            }
            ?>
            <li class="pxl-category-item pxl-category-all">
                <a href="<?php echo esc_url($all_categories_link); ?>">
                    <?php echo esc_html($settings['all_categories_text']); ?><?php echo wp_kses_post($all_count_display); ?>
                </a>
            </li>
            <?php foreach ($categories as $category): 
                $count_display = '';
                if ($show_count) {
                    $count_display = ' <span class="count">(' . esc_html($category['count']) . ')</span>';
                }
            ?>
                <li class="pxl-category-item pxl-category-<?php echo esc_attr($category['type']); ?>">
                    <a href="<?php echo esc_url($category['link']); ?>">
                        <?php echo esc_html($category['name']); ?><?php echo wp_kses_post($count_display); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="pxl-no-categories"><?php echo esc_html__('No categories found.', 'northway'); ?></p>
    <?php endif; ?>
</div>

