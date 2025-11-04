<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$img_size = $widget->get_setting('img_size');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text'); 

if ( ! empty( $settings['wg_btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['wg_btn_link']['url'] );

    if ( $settings['wg_btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['wg_btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-post-slip pxl-post-slip1">
        <div class="pxl-post-slip-wrap">
            <div class="pxl-post--track">
                <?php $image_size = !empty($img_size) ? $img_size : '880x664';
                    foreach ($posts as $key => $post):
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    $sub_title = get_post_meta($post->ID, 'portfolio_sub_title', true);
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-post--block pxl-post-block_<?php echo esc_attr($key+1); ?>">
                            <div class="pxl-post--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                            <div class="pxl-post-block--min pxl-post-min_<?php echo esc_attr($key+1); ?>">
                                <div class="pxl-post-min--inner">
                                    <div class="pxl-post--header">
                                        <h5 class="pxl-post--title">
                                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h5>
                                        <?php if($settings['show_button'] == 'true') : ?>
                                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-post--button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                                                    <circle cx="35" cy="35" r="34.5" transform="matrix(-1 0 0 1 70 0)" stroke="#666F78" stroke-opacity="0.7"/>
                                                    <path d="M35.0081 27C35.273 27 35.5273 27.1056 35.7146 27.2931L42.7072 34.2933C42.8944 34.4809 43 34.7354 43 35.0006C42.9999 35.2657 42.8945 35.5203 42.7072 35.7078L35.7146 42.708C35.5273 42.8954 35.2729 43 35.0081 43C34.7433 42.9999 34.4889 42.8954 34.3017 42.708C34.1145 42.5206 34.0101 42.2658 34.01 42.0008C34.01 41.7357 34.1145 41.4811 34.3017 41.2936L39.5885 36.0009L28.0167 35.9998C27.8841 36.0021 27.7518 35.978 27.6286 35.9288C27.5056 35.8796 27.3931 35.8066 27.2986 35.7136C27.2041 35.6206 27.1291 35.5091 27.0779 35.3868C27.0267 35.2645 27 35.1332 27 35.0006C27 34.8678 27.0266 34.7357 27.0779 34.6132C27.1291 34.4911 27.2043 34.3804 27.2986 34.2875C27.3932 34.1945 27.5055 34.1204 27.6286 34.0712C27.7518 34.022 27.8841 33.9979 28.0167 34.0002L39.5885 34.0002L34.3017 28.7076C34.1144 28.5201 34.0101 28.2655 34.01 28.0004C34.01 27.7352 34.1144 27.4806 34.3017 27.2931C34.4889 27.1056 34.7433 27 35.0081 27Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="690" height="23" viewBox="0 0 690 23" fill="none" class="pxl-post--divider">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M54.8378 2.44434C54.8378 3.94468 54.6627 5.42583 53.9228 6.63867C52.327 9.25371 49.7444 10.3931 46.0234 10.8672C44.628 11.0449 43.0862 11.1261 41.3925 11.1602C41.3891 11.1601 41.3852 11.1602 41.3818 11.1602C41.3022 11.1587 41.2217 11.1596 41.1415 11.1582C39.4424 11.129 37.601 11.1437 35.6201 11.1611C34.3281 11.1498 32.9709 11.1387 31.5478 11.1387H0V11.8613H31.5478C32.9709 11.8613 34.3281 11.8502 35.6201 11.8389C37.6988 11.8572 39.6243 11.8734 41.3925 11.8379C41.8156 11.8464 42.2295 11.8577 42.6337 11.873C43.8475 11.9193 44.9766 11.9995 46.0234 12.1328C49.7444 12.6069 52.327 13.7463 53.9228 16.3613C54.6627 17.5742 54.8378 19.0553 54.8378 20.5557V23C55.1752 23 55.5136 23 55.5136 23V20.5557C55.5137 19.0553 55.6887 17.5742 56.4286 16.3613C58.0244 13.7463 60.6071 12.6069 64.3281 12.1328C64.5025 12.1106 64.6793 12.0907 64.8583 12.0713C66.1116 11.9357 67.4775 11.8677 68.9599 11.8379C70.7278 11.8733 72.653 11.8572 74.7314 11.8389C76.0234 11.8502 77.3805 11.8613 78.8036 11.8613L689.5 12V11.1387H78.8036C77.3805 11.1387 76.0234 11.1498 74.7314 11.1611C72.7505 11.1437 70.9089 11.129 69.2099 11.1582C69.13 11.1596 69.0499 11.1587 68.9706 11.1602C68.9671 11.1602 68.9634 11.1601 68.9599 11.1602C67.4775 11.1304 66.1116 11.0641 64.8583 10.9287C64.6793 10.9094 64.5025 10.8894 64.3281 10.8672C60.6071 10.3931 58.0244 9.25371 56.4286 6.63867C55.6887 5.42581 55.5137 3.94471 55.5136 2.44434V2.33835e-06C55.5136 2.33835e-06 55.1752 -2.92294e-06 54.8378 2.33835e-06V2.44434ZM55.1757 5.39746C55.3289 5.9518 55.5459 6.48971 55.8525 6.99219C56.7458 8.45611 57.9208 9.48255 59.3632 10.2022C59.8146 10.4273 60.2922 10.6241 60.7958 10.793C61.756 11.1149 62.811 11.3411 63.957 11.5C62.6646 11.6792 61.4882 11.945 60.4326 12.3359C60.1899 12.4258 59.9535 12.5233 59.7236 12.627C58.1152 13.3519 56.8192 14.4238 55.8525 16.0078C55.546 16.5101 55.3289 17.0475 55.1757 17.6016C55.0226 17.0474 54.8045 16.5102 54.498 16.0078C54.1781 15.4836 53.8229 15.0148 53.4316 14.5967C53.3011 14.4573 53.1665 14.3238 53.0283 14.1953C52.821 14.0027 52.6046 13.8216 52.3798 13.6523C52.2299 13.5395 52.0756 13.4322 51.9179 13.3291C51.6814 13.1745 51.4364 13.0303 51.1826 12.8965C51.0022 12.8014 50.817 12.7122 50.6279 12.627C50.3981 12.5234 50.1614 12.4258 49.9189 12.3359C48.8632 11.9449 47.687 11.6793 46.3945 11.5C47.5405 11.341 48.5955 11.1149 49.5556 10.793C50.4201 10.5031 51.2081 10.135 51.9179 9.6709C52.0756 9.56783 52.2299 9.46053 52.3798 9.34766C52.6046 9.17836 52.821 8.99726 53.0283 8.80469C53.1665 8.67624 53.3011 8.54267 53.4316 8.40332C53.8229 7.98518 54.1781 7.51638 54.498 6.99219C54.8046 6.48964 55.0226 5.95189 55.1757 5.39746Z" fill="url(#paint0_linear_1465_1988)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_1465_1988" x1="232.5" y1="11.5" x2="654.5" y2="11.5" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#666F78"/>
                                            <stop offset="1" stop-color="#666F78" stop-opacity="0"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <div class="pxl-post--content">
                                        <?php echo wp_trim_words($post->post_excerpt, 20, null); ?>
                                    </div>
                                    <div class="pxl-post--meta">
                                        <div class="pxl-post--meta-item">
                                            <i class="flaticon-user"></i>
                                            <span><?php echo esc_html__('Client: ', 'northway'); ?><?php echo esc_html(get_post_meta($post->ID, 'portfolio_client', true)); ?></span>
                                        </div>
                                        <div class="pxl-post--meta-item">
                                            <i class="flaticon-tag"></i>
                                            <?php the_terms($post->ID, 'portfolio-category', '', ' '); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>