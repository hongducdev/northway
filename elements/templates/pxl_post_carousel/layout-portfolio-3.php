<?php
extract($settings);
$html_id = pxl_get_element_id($settings);
$tax = ['portfolio-category'];
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
$style_l11 = $widget->get_setting('style_l11', 'pxl-post-style1');
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
$show_address = $widget->get_setting('show_address');

$opts = [
  'slide_direction'               => 'horizontal',
  'slide_percolumn'               => 1,
  'slide_percolumnfill'           => 1,
  'center_slide'                  => false,
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
  'loop'                          => $infinite,
  'speed'                         => (int)$speed,
  'center'                        => (bool)$center,
];

$class = 'pxl-swiper-container';
if ($settings['filter_type'] == 'style-2') {
  $class .= ' overflow-visible';
}

$widget->add_render_attribute('carousel', [
  'class'         => $class,
  'dir'           => is_rtl() ? 'rtl' : 'ltr',
  'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
  <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-check-scroll pxl-portfolio-carousel3 blinds_staggered <?php echo esc_attr($style_l11); ?> ">
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
          <?php if($settings['show_button'] == 'true'): ?>
            <div class="pxl-portfolio-carousel-button">
              <a href="<?php echo esc_url($button_url['url']); ?>" class="btn">
                <?php if(!empty($button_text)): ?>
                  <?php echo esc_html($button_text); ?>
                <?php else: ?>
                  <?php esc_html__('View All Projects', 'northway'); ?>
                <?php endif; ?>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php  } ?>
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
                        <span class="filter-item" data-filter-target="<?php echo esc_attr($term->slug); ?>">
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
        <?php  } ?>
        <?php if ($settings['filter'] == 'true' && $settings['filter_type'] == 'style-2') { ?>
          <div class="col-md-10 col-xs-12 carousel-nav-appended">
          <?php  } else { ?>
            <div class="col-md-12 col-xs-12 carousel-no-appended">
            <?php  } ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
              <div class="pxl-swiper-wrapper">
                <?php
                foreach ($posts as $post):
                  $image_size = !empty($img_size) ? $img_size : '410x540';
                  $client = get_post_meta($post->ID, 'portfolio_client', true);
                  $address = get_post_meta($post->ID, 'portfolio_address', true);
                  if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
                    $img_id       = get_post_thumbnail_id($post->ID);
                    $img          = pxl_get_image_by_size(array(
                      'attach_id'  => $img_id,
                      'thumb_size' => $image_size
                    ));
                    $thumbnail    = $img['thumbnail'];
                    $thumbnail_url    = $img['url'];
                  }
                  $filter_class = '';
                  if ($select_post_by === 'term_selected')
                    $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                ?>
                  <div class="pxl-swiper-slide visible" data-filter="<?php echo esc_attr($filter_class); ?>" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('Drag.', 'northway'); ?>" <?php endif; ?>>
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
                      <div class="pxl-post--featured " style="background-image:url(<?php echo esc_url($thumbnail_url); ?>);">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                          <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                      </div>
                      <div class="pxl-post--holder">
                        <?php if ($show_button == 'true'): ?>
                          <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <span class="button-arrow-hover">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor"/>
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor"/>
                              </svg>
                            </span>
                          </a>
                        <?php endif; ?>
                        <div class="pxl-post--body">
                          <svg xmlns="http://www.w3.org/2000/svg" width="410" height="19" viewBox="0 0 410 19" fill="none" class="pxl-post--grass">
                            <path d="M-6.19325 18.9H-7.33325C-7.33325 18.9 -9.84325 10.55 -5.12325 3.95001C-4.68325 6.95001 -3.35325 11.87 -3.35325 11.87C-3.35325 11.87 -1.14325 8.42001 -1.58325 5.17001C-1.58325 5.17001 1.95675 9.83999 2.41675 13.9C1.97675 10.25 3.30675 6.38999 4.63675 2.89999C5.14539 7.31315 6.65732 11.5514 9.05675 15.29C7.28675 11.63 9.05675 7.97002 10.3868 5.74002C10.3868 5.74002 10.8267 10.82 12.5968 12.44C12.1567 8.99 13.0368 6.35002 16.1368 3.30002C15.599 6.91062 15.9036 10.5967 17.0268 14.07C17.0268 13.98 17.4668 10.33 21.0268 5.54001C20.4568 8.54001 21.7267 11.16 23.2367 13.98C23.1035 10.3696 24.1961 6.82041 26.3368 3.91C26.7767 6.91 28.1068 11.83 28.1068 11.83C28.1068 11.83 30.3167 8.38 29.8768 5.13C29.8768 5.13 33.4168 9.80002 33.8768 13.86C33.4368 10.21 34.7668 6.35002 36.0868 2.86002C36.5368 6.92002 38.2967 12.2 40.5168 15.25C38.7467 11.59 40.5168 7.93001 41.8368 5.70001C41.8368 5.70001 42.2868 10.78 44.0568 12.4C43.6068 8.94999 44.4968 3.46999 47.5968 0.399994C47.0412 4.95191 47.3396 9.56754 48.4767 14.01C49.6604 12.7111 50.4215 11.0832 50.659 9.34198C50.8965 7.60077 50.5993 5.82848 49.8068 4.26001C52.0048 6.03038 53.7239 8.32362 54.8068 10.93C55.1949 8.36905 56.1967 5.94 57.7267 3.85001C58.1767 6.85001 59.4967 11.77 59.4967 11.77C59.4967 11.77 61.7167 8.32001 61.2667 5.07001C61.2667 5.07001 64.8067 9.74002 65.2667 13.8C64.8167 10.15 66.1467 6.29002 67.4767 2.80002C67.9854 7.21318 69.4973 11.4514 71.8968 15.19C70.1268 11.53 71.8967 7.87001 73.2267 5.64001C73.2267 5.64001 73.6667 10.72 75.4367 12.34C74.9967 8.89 77.6468 5.44001 80.7467 2.39001C80.3067 5.23001 78.5367 9.7 79.8667 13.97C79.8667 13.88 80.3067 10.23 83.8667 5.44C83.2967 8.44 84.5667 11.06 86.0768 13.88C85.9435 10.2696 87.0361 6.7204 89.1768 3.81C89.6168 6.81 90.9467 11.73 90.9467 11.73C90.9467 11.73 93.1568 8.28 92.7168 5.03C92.7168 5.03 96.2568 9.70001 96.7168 13.76C96.2767 10.11 97.6067 6.25001 98.9267 2.76001C99.4436 7.17278 100.959 11.4099 103.357 15.15C101.587 11.49 103.357 7.83001 104.687 5.60001C104.687 5.60001 105.127 10.68 106.897 12.3C106.628 10.3553 106.807 8.37483 107.42 6.50995C108.034 4.64507 109.066 2.94513 110.437 1.54001C109.895 5.68719 110.194 9.90104 111.317 13.93C112.503 12.6325 113.266 11.0044 113.503 9.26254C113.741 7.52069 113.442 5.74778 112.647 4.17999C114.56 5.54293 116.323 7.10501 117.907 8.84C118.433 7.01909 119.273 5.30358 120.387 3.77002C120.837 6.77002 122.157 11.69 122.157 11.69C122.157 11.69 124.377 8.24002 123.927 4.99002C123.927 4.99002 127.467 9.66 127.927 13.72C127.477 10.07 128.807 6.21 130.137 2.72C130.645 7.13316 132.157 11.3714 134.557 15.11C132.787 11.45 134.557 7.79 135.887 5.56C135.887 5.56 136.327 10.64 138.097 12.26C137.657 8.81001 138.547 6.17 141.637 3.12C141.099 6.73059 141.404 10.4167 142.527 13.89C142.527 13.8 142.967 10.15 146.527 5.36002C146.067 7.73002 146.797 9.91002 147.877 12.14C148.082 9.10224 149.146 6.18541 150.947 3.73001C151.397 6.73001 152.717 11.65 152.717 11.65C152.717 11.65 154.937 8.20001 154.487 4.95001C154.487 4.95001 158.027 9.61999 158.487 13.68C158.037 10.03 159.367 6.16999 160.697 2.67999C161.205 7.09315 162.717 11.3314 165.117 15.07C163.347 11.41 165.117 7.75002 166.447 5.52002C166.447 5.52002 166.887 10.6 168.657 12.22C168.217 8.77 169.107 6.13002 172.197 3.08002C171.659 6.69062 171.964 10.3767 173.087 13.85C173.087 13.76 173.527 10.11 177.087 5.32001C176.577 7.98001 177.547 10.4 178.847 12.91C178.901 9.58833 179.988 6.36594 181.957 3.69C182.397 6.69 183.727 11.61 183.727 11.61C183.727 11.61 185.937 8.16 185.497 4.91C185.497 4.91 189.037 9.58002 189.497 13.64C189.057 9.99002 190.377 6.13001 191.707 2.64001C192.215 7.05489 193.73 11.294 196.137 15.03C194.367 11.37 196.137 7.71001 197.457 5.48001C197.457 5.48001 197.907 10.56 199.677 12.18C199.227 8.72999 200.117 6.09001 203.217 3.04001C202.67 6.64964 202.971 10.337 204.097 13.81C205.28 12.5111 206.041 10.8832 206.279 9.14197C206.517 7.40075 206.219 5.62847 205.427 4.06C207.449 5.65932 209.063 7.71562 210.137 10.06C210.593 7.74964 211.553 5.56806 212.947 3.67001C213.387 6.67001 214.717 11.59 214.717 11.59C214.717 11.59 216.927 8.14001 216.487 4.89001C216.487 4.89001 220.027 9.56 220.487 13.62C220.047 9.97 221.377 6.10999 222.707 2.62C223.215 7.03315 224.727 11.2714 227.127 15.01C225.357 11.35 227.127 7.68999 228.457 5.45999C228.457 5.45999 228.897 10.54 230.667 12.16C230.398 10.2153 230.577 8.23485 231.19 6.36996C231.804 4.50508 232.836 2.80511 234.207 1.39999C233.665 5.54717 233.964 9.76106 235.087 13.79C235.087 13.7 235.537 10.05 239.087 5.26001C238.567 7.92001 239.547 10.34 240.847 12.85C240.898 9.52943 241.982 6.30714 243.947 3.63C244.397 6.63 245.717 11.55 245.717 11.55C245.717 11.55 247.937 8.10001 247.487 4.85001C247.487 4.85001 251.027 9.52002 251.487 13.58C251.037 9.93002 252.367 6.07002 253.697 2.58002C254.205 6.99317 255.717 11.2314 258.117 14.97C256.347 11.31 258.117 7.65001 259.447 5.42001C259.447 5.42001 259.887 10.5 261.657 12.12C261.397 10.2988 261.584 8.4418 262.2 6.70862C262.817 4.97543 263.845 3.41794 265.197 2.17001C264.656 6.04907 264.96 9.99909 266.087 13.75C266.087 13.66 266.527 10.01 270.087 5.22C269.577 7.88 270.547 10.3 271.847 12.81C271.897 9.48764 272.984 6.26407 274.957 3.59C275.397 6.59 276.727 11.51 276.727 11.51C276.727 11.51 278.937 8.06 278.497 4.81C278.497 4.81 282.037 9.48001 282.497 13.54C282.057 9.89001 283.377 6.03001 284.707 2.54001C285.215 6.95488 286.73 11.194 289.137 14.93C287.367 11.27 289.137 7.61 290.457 5.38C290.457 5.38 290.907 10.46 292.677 12.08C292.227 8.63002 293.117 3.15002 296.217 0.0800171C295.661 4.63193 295.96 9.24754 297.097 13.69C298.28 12.3911 299.041 10.7632 299.279 9.02197C299.517 7.28076 299.219 5.50847 298.427 3.94C300.449 5.53933 302.063 7.59563 303.137 9.94C303.593 7.62964 304.553 5.44807 305.947 3.55002C306.387 6.55002 307.717 11.47 307.717 11.47C307.717 11.47 309.927 8.02002 309.487 4.77002C309.487 4.77002 313.027 9.44 313.487 13.5C313.047 9.85 314.377 5.99 315.697 2.5C316.214 6.91277 317.729 11.1499 320.127 14.89C318.357 11.23 320.127 7.57 321.457 5.34C321.457 5.34 321.897 10.42 323.667 12.04C323.227 8.59001 324.107 5.94999 327.207 2.89999C326.67 6.50997 326.971 10.195 328.087 13.67C328.087 13.58 328.537 9.93001 332.087 5.14001C331.517 8.14001 332.787 10.76 334.287 13.58C334.163 9.96929 335.258 6.42198 337.397 3.51001C337.837 6.51001 339.167 11.43 339.167 11.43C339.167 11.43 341.377 7.98001 340.937 4.73001C340.937 4.73001 344.477 9.39999 344.937 13.46C344.497 9.80999 345.817 5.94999 347.147 2.45999C347.655 6.87487 349.17 11.114 351.577 14.85C349.807 11.19 351.577 7.53002 352.897 5.30002C352.897 5.30002 353.347 10.38 355.107 12C354.667 8.55 355.557 3.07 358.647 0C358.1 4.5527 358.402 9.16726 359.537 13.61C360.72 12.3111 361.481 10.6832 361.719 8.94199C361.957 7.20077 361.659 5.42849 360.867 3.86002C363.065 5.63038 364.784 7.92362 365.867 10.53C366.25 7.96777 367.253 5.53765 368.787 3.45001C369.227 6.45001 370.557 11.37 370.557 11.37C370.557 11.37 372.767 7.92001 372.327 4.67001C372.327 4.67001 375.867 9.33999 376.327 13.4C375.887 9.74999 377.217 5.88999 378.547 2.39999C379.055 6.81315 380.567 11.0514 382.967 14.79C381.197 11.13 382.967 7.47002 384.297 5.24002C384.297 5.24002 384.737 10.32 386.507 11.94C386.067 8.49 388.717 5.04002 391.817 1.99002C391.377 4.83002 389.607 9.30001 390.937 13.57C390.937 13.48 391.377 9.83001 394.937 5.04001C394.367 8.04001 395.637 10.66 397.147 13.48C397.014 9.86962 398.106 6.32041 400.247 3.41C400.687 6.41 402.017 11.33 402.017 11.33C402.017 11.33 404.227 7.88 403.787 4.63C403.787 4.63 407.327 9.30002 407.787 13.36C407.347 9.71002 408.667 5.85002 409.997 2.36002C410.505 6.77489 412.02 11.014 414.427 14.75C412.657 11.09 414.427 7.43001 415.747 5.20001C415.747 5.20001 416.197 10.28 417.967 11.9C417.695 9.95522 417.874 7.97414 418.487 6.10889C419.101 4.24363 420.134 2.54384 421.507 1.14001C420.955 5.28689 421.254 9.50276 422.387 13.53C423.57 12.2311 424.331 10.6032 424.569 8.86197C424.807 7.12076 424.509 5.34847 423.717 3.78C427.717 6.62 430.357 13.32 426.577 18.32L-6.19325 18.9Z" fill="currentColor"/>
                          </svg>
                          <?php if ($show_category == 'true'): ?>
                            <div class="pxl-post--category">
                              <?php 
                              $terms = get_the_terms($post->ID, 'portfolio-category');
                              if ($terms && !is_wp_error($terms)) {
                                $term_links = array();
                                foreach ($terms as $term) {
                                  $term_links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                }
                                $separator = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                  <path d="M1.98476 9.5164L0.103296 11.3978C-0.034432 11.5356 -0.034432 11.7589 0.103296 11.8967C0.172195 11.9656 0.262446 12 0.352721 12C0.442972 12 0.53327 11.9656 0.602122 11.8967L2.4806 10.0182C2.39938 9.94732 2.32007 9.87357 2.2431 9.79661C2.15276 9.70624 2.06676 9.61265 1.98476 9.5164Z" fill="currentColor"/>
                                  <path d="M11.2709 0C10.5568 0 9.14401 0.0577531 7.53638 0.433501V3.96486L11.4991 0.00218691C11.4364 0.000940605 11.3602 0 11.2709 0Z" fill="currentColor"/>
                                  <path d="M12.0359 0.46306L8.03523 4.46366H11.6152C11.6693 4.22933 11.7189 3.9912 11.7632 3.74911C12.0567 2.14439 12.0475 0.855692 12.0359 0.46306Z" fill="currentColor"/>
                                  <path d="M5.20862 7.29025H10.6296C10.7043 7.1386 10.7763 6.98406 10.8454 6.82613C11.0726 6.30614 11.2695 5.75208 11.4346 5.16912H7.32975L5.20862 7.29025Z" fill="currentColor"/>
                                  <path d="M6.8309 0.616566C6.06631 0.835092 5.3585 1.10606 4.70981 1.42826L4.70974 6.79145L6.8309 4.67031V0.616566Z" fill="currentColor"/>
                                  <path d="M2.4806 10.0182C3.33298 10.762 4.41254 11.1683 5.55466 11.1683C6.8056 11.1683 7.98166 10.6812 8.8662 9.79661C9.38629 9.2765 9.84855 8.67334 10.2487 7.9957H4.50314L2.4806 10.0182Z" fill="currentColor"/>
                                  <path d="M4.00436 1.81222C3.34446 2.20602 2.75634 2.66034 2.24315 3.17355C1.3586 4.05807 0.871441 5.23414 0.871441 6.48507C0.871441 7.60817 1.26433 8.6708 1.98476 9.5164L4.00429 7.4969L4.00436 1.81222Z" fill="currentColor"/>
                                </svg>';
                                echo implode($separator, $term_links);
                              }
                          ?>
                          </div>
                        <?php endif; ?>
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
                          <?php if ($show_client == 'true' || $show_address == 'true'): ?>
                            <div class="pxl-post--meta">
                              <?php if ($show_client == 'true'): ?>
                                <div class="pxl-post--client">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                    <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z" fill="currentColor"/>
                                  </svg>
                                  <span><?php echo esc_html($client); ?></span>
                                </div>
                              <?php endif; ?>
                              <?php if ($show_address == 'true'): ?>
                                <div class="pxl-post--address">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z" fill="currentColor"/>
                                  </svg>
                                  <span><?php echo esc_html($address); ?></span>
                                </div>
                              <?php endif; ?>
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
              <div class="pxl-swiper-arrow-wrap style-1">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                    <path d="M0.292788 8.71929L7.29286 15.7193C7.48146 15.9014 7.73407 16.0022 7.99626 16C8.25846 15.9977 8.50928 15.8925 8.69469 15.7071C8.8801 15.5217 8.98527 15.2709 8.98755 15.0087C8.98983 14.7465 8.88903 14.4939 8.70687 14.3053L3.41382 9.01229L21 9.01229C21.2652 9.01229 21.5196 8.90693 21.7071 8.7194C21.8946 8.53186 22 8.27751 22 8.01229C22 7.74707 21.8946 7.49272 21.7071 7.30518C21.5196 7.11765 21.2652 7.01229 21 7.01229L3.41382 7.01229L8.70687 1.71929C8.80238 1.62704 8.87857 1.5167 8.93098 1.39469C8.98338 1.27269 9.01097 1.14147 9.01213 1.00869C9.01328 0.875911 8.98798 0.744232 8.93769 0.621336C8.88741 0.49844 8.81316 0.386787 8.71927 0.292894C8.62537 0.199001 8.51372 0.124747 8.39082 0.0744665C8.26792 0.0241859 8.13624 -0.0011151 8.00346 3.7877e-05C7.87068 0.00119181 7.73946 0.0287787 7.61746 0.0811879C7.49545 0.133597 7.38511 0.209778 7.29286 0.305288L0.292788 7.30529C0.105315 7.49282 -1.18586e-06 7.74712 -1.20904e-06 8.01229C-1.23222e-06 8.27745 0.105315 8.53176 0.292788 8.71929Z" fill="white" />
                  </svg></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                    <path d="M21.7072 8.71929L14.7071 15.7193C14.5185 15.9014 14.2659 16.0022 14.0037 16C13.7415 15.9977 13.4907 15.8925 13.3053 15.7071C13.1199 15.5217 13.0147 15.2709 13.0125 15.0087C13.0102 14.7465 13.111 14.4939 13.2931 14.3053L18.5862 9.01229L1.00001 9.01229C0.73479 9.01229 0.480434 8.90693 0.292895 8.7194C0.105357 8.53186 -6.75122e-07 8.27751 -6.98308e-07 8.01229C-7.21494e-07 7.74707 0.105357 7.49272 0.292895 7.30518C0.480433 7.11765 0.73479 7.01229 1.00001 7.01229L18.5862 7.01229L13.2931 1.71929C13.1976 1.62704 13.1214 1.5167 13.069 1.39469C13.0166 1.27269 12.989 1.14147 12.9879 1.00869C12.9867 0.875911 13.012 0.744232 13.0623 0.621336C13.1126 0.49844 13.1868 0.386787 13.2807 0.292894C13.3746 0.199001 13.4863 0.124747 13.6092 0.0744665C13.7321 0.0241859 13.8638 -0.0011151 13.9965 3.7877e-05C14.1293 0.00119181 14.2605 0.0287787 14.3825 0.0811879C14.5045 0.133597 14.6149 0.209778 14.7071 0.305288L21.7072 7.30529C21.8947 7.49282 22 7.74712 22 8.01229C22 8.27745 21.8947 8.53176 21.7072 8.71929Z" fill="white" />
                  </svg></div>
              </div>
            <?php endif; ?>
          </div>
      </div>
    </div>
  <?php endif; ?>