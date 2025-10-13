<?php

if (!class_exists('Northway_Page')) {

    class Northway_Page
    {
        public function get_site_loader()
        {

            $site_loader = northway()->get_theme_opt('site_loader', false);
            if ($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader">
                    <div class="pxl-loader-container">
                        <div class="flower">
                            <div class="flower__center"></div>
                            <div class="flower__leaves"></div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_link_pages()
        {
            wp_link_pages(array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));
        }

        public function get_page_title()
        {
            $titles = $this->get_title();
            $pt_mode = northway()->get_opt('pt_mode');
            $ptitle_scroll_opacity = northway()->get_opt('ptitle_scroll_opacity');
            $custom_main_title = northway()->get_opt('custom_main_title');
            $custom_ptitle_desc = northway()->get_opt('custom_ptitle_desc');
            $custom_sub_title = northway()->get_opt('custom_sub_title');
            $sg_product_ptitle_text = northway()->get_opt('sg_product_ptitle_text');
            $sg_product_ptitle_sub = northway()->get_opt('sg_product_ptitle_sub');
            $sg_product_ptitle_desc = northway()->get_opt('sg_product_ptitle_desc');

            $page_type_class = '';
            if (function_exists('is_product') && is_product()) {
                $page_type_class = 'pxl-page-type-product';
            } elseif (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
                $page_type_class = 'pxl-page-type-woocommerce';
            } elseif (is_single()) {
                $page_type_class = 'pxl-page-type-blog';
            } else {
                $page_type_class = 'pxl-page-type-general';
            }

            if ($pt_mode == 'none') return;
            $ptitle_layout = (int)northway()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable('Elementor\Plugin::instance')) {
            ?>
                <div id="pxl-page-title-elementor" class="<?php if ($ptitle_scroll_opacity == true) {
                                                                echo 'pxl-scroll-opacity';
                                                            } ?>">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($ptitle_layout); ?>
                </div>
            <?php
            } else {
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="<?php echo esc_attr($page_type_class); ?>">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf1.webp" alt="leaf_1" class="pxl-page-leaf-1">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf1.webp" alt="leaf_2" class="pxl-page-leaf-2">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/404/leaf3.webp" alt="leaf_3" class="pxl-page-leaf-3">
                    <div class="pxl-page-overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="pxl-page-icon col-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20" fill="none">
                                    <path d="M12.8971 13.538C12.8971 13.538 12.1708 9.41552 14.8356 4.96151C17.5005 0.507513 24.7223 -0.299002 27.9445 0.0842744C27.9445 0.0842744 28.4415 8.223 25.2796 11.9186C22.1178 15.6142 17.1921 15.0248 15.7561 14.9894C15.0599 15.6655 14.4442 16.4166 13.9207 17.2282C13.4051 18.0253 12.938 18.8514 12.5219 19.7022C12.3584 20.0038 12.0946 20.0483 11.8308 19.9593C11.567 19.8702 11.6134 19.4443 11.7769 19.0002C11.9404 18.556 13.2854 15.3191 16.3385 11.0077C19.3917 6.69625 22.5414 4.8943 23.8009 3.97063C23.8009 3.96608 18.3495 4.79531 12.8971 13.538Z" fill="currentColor" />
                                    <path d="M12.1215 14.4027C12.1215 14.4027 11.867 10.7243 8.88726 8.62807C5.9075 6.53186 1.21773 7.40195 0 7.90148C0 7.90148 0.563815 12.4327 3.38102 14.9739C6.19823 17.5152 10.7654 15.9512 11.6478 15.4181C11.6478 15.4181 7.86088 11.2402 3.25749 9.77336C3.25377 9.77063 7.324 9.58172 12.1215 14.4027Z" fill="currentColor" />
                                </svg>
                            </div>
                            <?php
                            if (function_exists('is_product') && is_product()) {
                                if (!empty($sg_product_ptitle_sub)) { ?>
                                    <div class="pxl-page-sub-title col-12">
                                        <?php echo pxl_print_html($sg_product_ptitle_sub); ?>
                                    </div>
                                <?php }
                            } else {
                                if (!empty($custom_sub_title)) { ?>
                                    <div class="pxl-page-sub-title col-12">
                                        <?php echo pxl_print_html($custom_sub_title); ?>
                                    </div>
                            <?php }
                            } ?>

                            <div class="col-12">
                                <?php
                                $main_title = '';
                                if (function_exists('is_product') && is_product()) {
                                    $main_title = !empty($sg_product_ptitle_text) ? $sg_product_ptitle_text : northway_html($titles['title']);
                                } else {
                                    $main_title = !empty($custom_main_title) ? $custom_main_title : northway_html($titles['title']);
                                }

                                $title_class = is_single() && !(function_exists('is_product') && is_product()) ? 'pxl-page-title-single' : '';
                                ?>
                                <h2 class="pxl-page-title <?php echo esc_attr($title_class); ?>">
                                    <?php echo pxl_print_html($main_title); ?>
                                </h2>

                                <?php
                                if (function_exists('is_product') && is_product()) {
                                    if (!empty($sg_product_ptitle_desc)) { ?>
                                        <p class="pxl-page-desc"><?php echo pxl_print_html($sg_product_ptitle_desc); ?></p>
                                    <?php }
                                } else {
                                    $desc_content = is_single() ? get_the_excerpt() : $custom_ptitle_desc;
                                    if (!empty($desc_content)) { ?>
                                        <p class="pxl-page-desc"><?php echo pxl_print_html($desc_content); ?></p>
                                <?php }
                                } ?>

                                <?php if (function_exists('is_product') && is_product()) { ?>
                                    <div class="pxl-product-meta">
                                    </div>
                                <?php } elseif (is_single()) { ?>
                                    <?php northway()->blog->get_archive_meta_3(); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }

        public function get_title()
        {
            $title = '';
            // Default titles
            if (! is_archive()) {
                // Posts page view
                if (is_home()) {
                    // Only available if posts page is set.
                    if (! is_front_page() && $page_for_posts = get_option('page_for_posts')) {
                        $title = get_post_meta($page_for_posts, 'custom_title', true);
                        if (empty($title)) {
                            $title = get_the_title($page_for_posts);
                        }
                    }
                    if (is_front_page()) {
                        $title = esc_html__('Blog', 'northway');
                    }
                } // Single page view
                elseif (is_page()) {
                    $title = get_post_meta(get_the_ID(), 'custom_title', true);
                    if (! $title) {
                        $title = get_the_title();
                    }
                } elseif (is_404()) {
                    $title = esc_html__('404 Error', 'northway');
                } elseif (is_search()) {
                    $title = esc_html__('Search results', 'northway');
                } elseif (is_singular('lp_course')) {
                    $title = esc_html__('Course', 'northway');
                } else {
                    $title = get_post_meta(get_the_ID(), 'custom_title', true);
                    if (! $title) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if ((class_exists('WooCommerce') && is_shop())) {
                    $title = get_post_meta(wc_get_page_id('shop'), 'custom_title', true);
                    if (!$title) {
                        $title = get_the_title(get_option('woocommerce_shop_page_id'));
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb()
        {

            if (! class_exists('CASE_Breadcrumb')) {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if (empty($entries)) {
                return;
            }

            ob_start();

            foreach ($entries as $entry) {
                $entry = wp_parse_args($entry, array(
                    'label' => '',
                    'url'   => ''
                ));

                $entry_label = $entry['label'];

                if (empty($entry_label)) {
                    continue;
                }

                echo '<li>';

                if (! empty($entry['url'])) {
                    printf(
                        '<a class="breadcrumb-hidden" href="%1$s">%2$s</a>',
                        esc_url($entry['url']),
                        esc_attr($entry_label)
                    );
                }
                echo '</li>';
            }

            $output = ob_get_clean();

            if ($output) {
                printf('<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination($query = null, $ajax = false)
        {

            if ($ajax) {
                add_filter('paginate_links', 'northway_ajax_paginate_links');
            }

            $classes = array();

            if (empty($query)) {
                $query = $GLOBALS['wp_query'];
            }

            if (empty($query->max_num_pages) || ! is_numeric($query->max_num_pages) || $query->max_num_pages < 2) {
                return;
            }

            $paged = $query->get('paged', '');

            if (! $paged && is_front_page() && ! is_home()) {
                $paged = $query->get('page', '');
            }

            $paged = $paged ? intval($paged) : 1;

            $pagenum_link = html_entity_decode(get_pagenum_link());
            $query_args   = array();
            $url_parts    = explode('?', $pagenum_link);

            if (isset($url_parts[1])) {
                wp_parse_str($url_parts[1], $query_args);
            }

            $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
            $pagenum_link = trailingslashit($pagenum_link) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map('urlencode', $query_args),
                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none"><g transform="translate(13,0) scale(-1,1)"><path d="M6.50358 4.42541L1.65571 0.153365C1.54358 0.0544776 1.3939 0 1.23431 0C1.07471 0 0.925031 0.0544776 0.812906 0.153365L0.455894 0.467899C0.223584 0.672853 0.223584 1.00596 0.455894 1.21061L4.52677 4.79801L0.451377 8.3894C0.339252 8.48828 0.277344 8.62011 0.277344 8.76067C0.277344 8.90139 0.339252 9.03322 0.451377 9.13218L0.808389 9.44664C0.920603 9.54552 1.07019 9.6 1.22979 9.6C1.38939 9.6 1.53906 9.54552 1.65119 9.44664L6.50358 5.17069C6.61597 5.07149 6.6777 4.93904 6.67734 4.79824C6.6777 4.6569 6.61597 4.52453 6.50358 4.42541Z" fill="currentColor"/><path d="M12.7047 4.42541L7.85688 0.153365C7.74475 0.0544776 7.59507 0 7.43548 0C7.27588 0 7.1262 0.0544776 7.01408 0.153365L6.65707 0.467899C6.42476 0.672853 6.42476 1.00596 6.65707 1.21061L10.7279 4.79801L6.65255 8.3894C6.54042 8.48828 6.47852 8.62011 6.47852 8.76067C6.47852 8.90139 6.54042 9.03322 6.65255 9.13218L7.00956 9.44664C7.12178 9.54552 7.27136 9.6 7.43096 9.6C7.59056 9.6 7.74024 9.54552 7.85236 9.44664L12.7047 5.17069C12.8171 5.07149 12.8789 4.93904 12.8785 4.79824C12.8789 4.6569 12.8171 4.52453 12.7047 4.42541Z" fill="currentColor"/></g></svg>',
                'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none"><path d="M6.50358 4.42541L1.65571 0.153365C1.54358 0.0544776 1.3939 0 1.23431 0C1.07471 0 0.925031 0.0544776 0.812906 0.153365L0.455894 0.467899C0.223584 0.672853 0.223584 1.00596 0.455894 1.21061L4.52677 4.79801L0.451377 8.3894C0.339252 8.48828 0.277344 8.62011 0.277344 8.76067C0.277344 8.90139 0.339252 9.03322 0.451377 9.13218L0.808389 9.44664C0.920603 9.54552 1.07019 9.6 1.22979 9.6C1.38939 9.6 1.53906 9.54552 1.65119 9.44664L6.50358 5.17069C6.61597 5.07149 6.6777 4.93904 6.67734 4.79824C6.6777 4.6569 6.61597 4.52453 6.50358 4.42541Z" fill="currentColor"/><path d="M12.7047 4.42541L7.85688 0.153365C7.74475 0.0544776 7.59507 0 7.43548 0C7.27588 0 7.1262 0.0544776 7.01408 0.153365L6.65707 0.467899C6.42476 0.672853 6.42476 1.00596 6.65707 1.21061L10.7279 4.79801L6.65255 8.3894C6.54042 8.48828 6.47852 8.62011 6.47852 8.76067C6.47852 8.90139 6.54042 9.03322 6.65255 9.13218L7.00956 9.44664C7.12178 9.54552 7.27136 9.6 7.43096 9.6C7.59056 9.6 7.74024 9.54552 7.85236 9.44664L12.7047 5.17069C12.8171 5.07149 12.8789 4.93904 12.8785 4.79824C12.8789 4.6569 12.8171 4.52453 12.7047 4.42541Z" fill="currentColor"/></svg>',
            );
            if ($ajax) {
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links($paginate_links_args);
            if ($links) {
                preg_match('/<a[^>]*class="[^"]*\bprev\b[^"]*"[^>]*>.*?<\/a>/is', $links, $prev_matches);
                $prev = !empty($prev_matches[0]) ? $prev_matches[0] : '';

                preg_match('/<a[^>]*class="[^"]*\bnext\b[^"]*"[^>]*>.*?<\/a>/is', $links, $next_matches);
                $next = !empty($next_matches[0]) ? $next_matches[0] : '';

                $numbers = preg_replace(
                    [
                        '/<a[^>]*class="[^"]*\bprev\b[^"]*"[^>]*>.*?<\/a>/is',
                        '/<a[^>]*class="[^"]*\bnext\b[^"]*"[^>]*>.*?<\/a>/is',
                    ],
                    '',
                    $links
                );

                $numbers = trim($numbers);

            ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax ? 'ajax' : ''); ?>">
                    <?php if ($prev) echo wp_kses($prev, function_exists('northway_allowed_svg_html') ? northway_allowed_svg_html() : array()); ?>
                    <span class="pxl-page-number-wrap"><?php echo wp_kses($numbers, function_exists('northway_allowed_svg_html') ? northway_allowed_svg_html() : array()); ?></span>
                    <?php if ($next) echo wp_kses($next, function_exists('northway_allowed_svg_html') ? northway_allowed_svg_html() : array()); ?>
                </nav>
<?php
            }
        }
    }
}
