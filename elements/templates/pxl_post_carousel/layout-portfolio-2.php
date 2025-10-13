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
  <div class="pxl-swiper-slider pxl-portfolio-carousel pxl-check-scroll pxl-portfolio-carousel2 blinds_staggered <?php echo esc_attr($style_l11); ?> ">
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
                  $image_size = !empty($img_size) ? $img_size : 'full';
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
                      <div class="pxl-post--featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                        <?php if ($show_button == 'true'): ?>
                          <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                            <span class="button-arrow-hover">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                              </svg>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                              </svg>
                            </span>
                          </a>
                        <?php endif; ?>
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
                      </div>
                      <div class="pxl-post--holder">
                        <h5 class="pxl-post--title">
                          <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                        </h5>
                        <div class="pxl-post--body">
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
                                    <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z" fill="currentColor" />
                                  </svg>
                                  <span><?php echo esc_html($client); ?></span>
                                </div>
                              <?php endif; ?>
                              <?php if ($show_address == 'true'): ?>
                                <div class="pxl-post--address">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z" fill="currentColor" />
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