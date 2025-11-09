<?php

/**
 * @package Case-Themes
 */
$subtitle_404 = northway()->get_theme_opt('subtitle_404');
$title_404 = northway()->get_theme_opt('title_404');
$button_404 = northway()->get_theme_opt('button_404');
get_header(); ?>
<div class="wrap-content-404">
    <div class="pxl-error-wrapper">
        <div class="pxl-error-divider pxl-error-divider-1"></div>
        <div class="pxl-error-divider pxl-error-divider-2"></div>
        <div class="pxl-error-divider pxl-error-divider-short-1"></div>
        <div class="pxl-error-divider pxl-error-divider-short-2"></div>
        <div class="pxl-error-divider pxl-error-divider-short-3"></div>
        <div class="pxl-error-divider pxl-error-divider-short-4"></div>
        <div class="pxl-error-content container">
            <!-- Stars -->
            <i class="flaticon-star pxl-error-star-1"></i>
            <i class="flaticon-star pxl-error-star-2"></i>
            <i class="flaticon-star pxl-error-star-3"></i>
            <i class="flaticon-star pxl-error-star-4"></i>

            <!-- Texts -->
            <span class="pxl-error-text pxl-error-text-1 wow fadeInUp" data-wow-delay="0.1s">
                <?php echo esc_html__('Invalid url', 'northway'); ?>
            </span>
            <span class="pxl-error-text pxl-error-text-2 wow fadeInUp" data-wow-delay="0.2s">
                <?php echo esc_html__('Error', 'northway'); ?>
            </span>
            <span class="pxl-error-text pxl-error-text-3 wow fadeInUp" data-wow-delay="0.3s">
                <?php echo esc_html__('Broken link', 'northway'); ?>
            </span>
            <span class="pxl-error-text pxl-error-text-4 wow fadeInUp" data-wow-delay="0.4s">
                <?php echo esc_html__('Missing page', 'northway'); ?>
            </span>
            <span class="pxl-error-text pxl-error-text-5 wow fadeInUp" data-wow-delay="0.5s">
                <?php echo esc_html__('Error', 'northway'); ?>
            </span>

            
            <div class="pxl-error-subtitle wow fadeInUp">
                <?php if (!empty($subtitle_404)) {
                    echo pxl_print_html($subtitle_404);
                } else {
                    echo esc_html__('Oops!', 'northway');
                } ?>
            </div>
            <h3 class="pxl-error-title wow fadeInUp" data-wow-delay="0.2s">
                <?php if (!empty($title_404)) {
                    echo pxl_print_html($title_404);
                } else {
                    echo esc_html__('We couldn’t find the page you’re looking for.', 'northway');
                } ?>
            </h3>
            <div class="pxl-error-number">
                <span class="wow fadeInUp" data-wow-delay="0.3s">4</span>
                <div class="wow fadeInUp" data-wow-delay="0.4s"><svg xmlns="http://www.w3.org/2000/svg" width="185" height="247" viewBox="0 0 185 247" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M54.3433 62.8327C88.3753 21.3669 131.304 1.56251 157.777 17.9174C188.942 37.1716 185.499 99.2491 150.085 156.571C144.081 166.289 137.542 175.246 130.673 183.328C96.6373 224.812 53.6973 244.627 27.219 228.269C-3.94645 209.015 -0.502881 146.938 34.9103 89.6166C40.9207 79.888 47.4659 70.9212 54.3433 62.8327ZM154.937 21.5399C139.813 12.1962 118.958 14.9074 97.2759 27.3047C82.9573 35.4915 68.3817 47.8538 55.049 63.548C49.0706 70.8397 43.3655 78.8071 38.0746 87.3712C20.4384 115.918 10.7914 145.608 9.41049 170.503C8.02724 195.441 14.9343 215.304 30.0583 224.648C45.1824 233.991 66.0369 231.279 87.7196 218.882C102.029 210.7 116.596 198.348 129.922 182.667C135.909 175.368 141.623 167.392 146.921 158.816C164.557 130.269 174.204 100.579 175.585 75.6847C176.968 50.7465 170.061 30.8837 154.937 21.5399Z" fill="#F8F8F2"/>
                    <path d="M92.2305 74.8943C92.5065 74.8943 92.7303 75.1184 92.7305 75.3943V75.4265C92.7306 75.4485 92.7309 75.4823 92.7314 75.5262C92.7325 75.6148 92.7349 75.7475 92.7393 75.9207C92.7479 76.2678 92.7649 76.7795 92.7998 77.4305C92.8696 78.7328 93.0096 80.5958 93.2891 82.8318C93.8485 87.3075 94.9665 93.267 97.1982 99.2185C99.4309 105.172 102.769 111.092 107.75 115.52C112.721 119.939 119.353 122.894 128.23 122.894C128.506 122.894 128.73 123.118 128.73 123.394C128.73 123.67 128.507 123.894 128.23 123.894C119.354 123.894 112.721 126.849 107.75 131.268C102.769 135.696 99.4309 141.616 97.1982 147.57C94.9665 153.522 93.8485 159.481 93.2891 163.957C93.0096 166.193 92.8696 168.056 92.7998 169.358C92.7649 170.009 92.7479 170.521 92.7393 170.868C92.7349 171.041 92.7325 171.174 92.7314 171.262C92.7309 171.306 92.7306 171.34 92.7305 171.362V171.394L92.7207 171.495C92.6742 171.723 92.4722 171.894 92.2305 171.894C91.9888 171.894 91.7868 171.723 91.7402 171.495L91.7305 171.394V171.362C91.7303 171.34 91.73 171.306 91.7295 171.262C91.7284 171.174 91.726 171.041 91.7217 170.868C91.713 170.521 91.696 170.009 91.6611 169.358C91.5913 168.056 91.4514 166.193 91.1719 163.957C90.6124 159.481 89.4945 153.522 87.2627 147.57C85.03 141.616 81.6924 135.696 76.7109 131.268C71.7396 126.849 65.1074 123.894 56.2305 123.894C55.9543 123.894 55.7305 123.67 55.7305 123.394C55.7307 123.118 55.9545 122.894 56.2305 122.894C65.1075 122.894 71.7396 119.939 76.7109 115.52C81.6923 111.092 85.0301 105.172 87.2627 99.2185C89.4944 93.267 90.6124 87.3075 91.1719 82.8318C91.4514 80.5958 91.5914 78.7328 91.6611 77.4305C91.696 76.7795 91.713 76.2678 91.7217 75.9207C91.726 75.7475 91.7284 75.6148 91.7295 75.5262C91.73 75.4823 91.7303 75.4485 91.7305 75.4265V75.3943C91.7307 75.1184 91.9545 74.8943 92.2305 74.8943Z" fill="#F8F8F2"/>
                </svg></div>
                <span class="wow fadeInUp" data-wow-delay="0.5s">4</span>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.6s">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="60" viewBox="0 0 13 60" fill="none">
                    <path d="M13 53.4624C13 53.6791 12.9142 53.8871 12.7618 54.0403L7.07415 59.7605C6.92179 59.9137 6.71496 60 6.49953 60C6.28412 59.9999 6.07722 59.9137 5.9249 59.7605L0.237223 54.0403C0.0850168 53.8871 5.14639e-07 53.679 5.24106e-07 53.4624C4.63099e-05 53.2458 0.084951 53.0377 0.237223 52.8845C0.389509 52.7314 0.596497 52.646 0.81185 52.6459C1.02721 52.6459 1.23414 52.7314 1.38648 52.8845L5.68673 57.2093L5.76317 0.831692C5.7613 0.723211 5.78084 0.614995 5.82082 0.514223C5.8608 0.413598 5.92014 0.321568 5.99567 0.24428C6.07126 0.166963 6.16181 0.105614 6.26124 0.0636836C6.3606 0.0218143 6.46729 3.07096e-05 6.57502 -2.80844e-07C6.6829 -4.3362e-07 6.79025 0.0217279 6.88974 0.0636836C6.98899 0.105569 7.07888 0.167127 7.15437 0.24428C7.22994 0.321611 7.29018 0.413533 7.33016 0.514223C7.37014 0.614994 7.38969 0.723212 7.38781 0.831692L7.31232 57.2093L11.6126 52.8845C11.7649 52.7313 11.9718 52.646 12.1872 52.6459C12.4026 52.6459 12.6095 52.7314 12.7618 52.8845C12.9142 53.0377 13 53.2458 13 53.4624Z" fill="url(#paint0_linear_1856_1101)"/>
                    <defs>
                        <linearGradient id="paint0_linear_1856_1101" x1="6.5" y1="40" x2="6.49999" y2="2.49958e-06" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F8F8F2"/>
                        <stop offset="1" stop-color="#F8F8F2" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <a class="pxl-error-btn wow fadeInUp" data-wow-delay="0.7s" href="<?php echo esc_url(home_url('/')); ?>">
                <span>
                    <?php if (!empty($button_404)) {
                        echo pxl_print_html($button_404);
                    } else {
                        echo esc_html__('Back to Home', 'northway');
                    } ?>
                </span>
            </a>
        </div>
    </div>
</div>
<?php get_footer();
