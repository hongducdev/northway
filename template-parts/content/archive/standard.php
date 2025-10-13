<?php

/**
 * @package Northway
 */

$archive_readmore_text = northway()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'northway'));
$featured_video = get_post_meta(get_the_ID(), 'featured-video-url', true);
$audio_url = get_post_meta(get_the_ID(), 'featured-audio-url', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-archive-post'); ?>>
    <div class="content-inner-post">
        <?php if (has_post_thumbnail()) {
            $archive_date = northway()->get_theme_opt('archive_date', true);
        ?>
            <div class="post-featured">
                <?php
                if (has_post_format('quote')) {
                    $quote_text = get_post_meta(get_the_ID(), 'featured-quote-text', true);
                    $quote_cite = get_post_meta(get_the_ID(), 'featured-quote-cite', true);
                ?>
                    <div class="format-wrap">
                        <div class="quote-inner">
                            <div class="content-top">
                                <div class="link-icon">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="24" viewBox="0 0 36 24" fill="none">
                                            <path d="M27.7199 23.6737C32.0693 23.6737 35.5938 20.3042 35.5938 16.1461C35.5938 12.2031 32.4442 9.04862 28.4698 8.69017C29.2947 7.25633 30.7195 5.75081 33.2691 4.31698C33.944 3.95852 34.3939 3.24161 34.3939 2.453C34.3939 0.947479 32.7442 -0.127897 31.3194 0.517328C27.045 2.38131 19.921 6.82619 19.921 16.1461C19.921 20.3759 23.3705 23.6737 27.7199 23.6737Z" fill="currentColor" />
                                            <path d="M8.37269 23.6737C12.7221 23.6737 16.2465 20.3042 16.2465 16.1461C16.2465 12.2031 13.097 9.04862 9.12258 8.69017C9.94746 7.25633 11.3723 5.75081 13.9219 4.31698C14.5968 3.95852 15.0467 3.24161 15.0467 2.453C15.0467 0.947479 13.397 -0.127897 11.9722 0.517328C7.69779 2.38131 0.573822 6.82619 0.573822 16.1461C0.498829 20.3759 4.02332 23.6737 8.37269 23.6737Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="content-right">
                                    <div class="quote-text">
                                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html($quote_text); ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if (!empty($quote_cite)) {
                            ?>
                                <p class="quote-cite">
                                    <?php echo esc_html($quote_cite); ?>
                                </p>
                            <?php
                            }
                            ?>
                            <div class="quote-meta">
                                <?php northway()->blog->get_archive_meta_2(); ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="pxl-post-read-more"><?php echo esc_html__('Read More', 'northway'); ?><div class="pxl-post-read-more-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92518 1.03312C5.10231 0.795496 5.41061 0.770799 5.61377 0.977955L8.59944 4.02225C8.7057 4.13062 8.76674 4.28756 8.76674 4.45248C8.76674 4.61748 8.7057 4.77434 8.59944 4.88271L5.61377 7.92699C5.41061 8.13415 5.10231 8.10949 4.92518 7.87189C4.74806 7.63421 4.7692 7.27369 4.97236 7.06652L6.97623 5.02328H1.12085C0.851316 5.02328 0.632812 4.76771 0.632812 4.45248C0.632812 4.13724 0.851316 3.88168 1.12085 3.88168H6.97623L4.97236 1.83847C4.7692 1.63131 4.74806 1.27074 4.92518 1.03312Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif (has_post_format('link')) {
                    $link_url = get_post_meta(get_the_ID(), 'featured-link-url', true);
                    $link_text = get_post_meta(get_the_ID(), 'featured-link-text', true);
                ?>
                    <div class="format-wrap">
                        <div class="link-inner">
                            <div class="content-top">
                                <div class="link-icon">
                                    <a href="<?php echo esc_url($link_url); ?>" title="<?php the_title_attribute(); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                                            <path d="M16.2769 10.1437C16.5028 10.0798 16.7404 10.0684 16.9715 10.1098C17.2027 10.1512 17.4216 10.2446 17.6111 10.3831C18.0079 10.6723 18.3811 10.9926 18.7269 11.341C19.6768 12.2843 20.4137 13.4193 20.8882 14.6698C21.3628 15.9203 21.5641 17.2574 21.4786 18.5918C21.3041 20.9514 20.2721 23.1666 18.5766 24.821L16.3241 27.0739C14.6053 28.8306 12.2854 29.8757 9.82797 30.0008C8.52154 30.0554 7.2181 29.8375 6.00082 29.3612C4.78354 28.8848 3.67909 28.1604 2.75828 27.2343C-0.948302 23.5152 -0.755258 17.4307 2.96205 13.7276L5.38636 11.3248C5.48061 11.2465 5.5954 11.1966 5.7169 11.18C5.8383 11.1635 5.9619 11.1811 6.07364 11.2312C6.18545 11.2814 6.28101 11.3621 6.34917 11.4638C6.41734 11.5655 6.4554 11.6843 6.45918 11.8066C6.4449 12.9879 6.61127 14.1647 6.95263 15.2959C6.98748 15.4097 6.99134 15.5308 6.96311 15.6465C6.93479 15.7623 6.87544 15.8686 6.79182 15.9538L5.92277 16.8208C4.96126 17.7593 4.39568 19.0292 4.34183 20.3702C4.28801 21.711 4.74999 23.0217 5.63309 24.034C6.15565 24.6129 6.80381 25.0656 7.5278 25.3577C8.25174 25.6497 9.03272 25.7737 9.81173 25.7198C11.1128 25.6156 12.3324 25.0454 13.245 24.1145L15.5781 21.7707C16.4812 20.8977 17.0504 19.7375 17.1873 18.4904C17.2509 17.8051 17.1754 17.1136 16.9652 16.4581C16.7551 15.8027 16.4149 15.1963 15.9647 14.675C15.3722 13.9085 15.0514 12.9673 15.0527 11.9994C15.0634 11.6713 15.136 11.3479 15.267 11.0467C15.3554 10.8296 15.4922 10.6351 15.6672 10.4787C15.8421 10.3223 16.0509 10.2077 16.2769 10.1437Z" fill="currentColor" />
                                            <path d="M20.6473 -0.00902194C22.5156 -0.00663806 24.3413 0.547894 25.894 1.58433C27.4468 2.62079 28.6573 4.09274 29.3723 5.81464C30.0873 7.5366 30.2751 9.43169 29.9118 11.26C29.5485 13.0882 28.6502 14.768 27.3309 16.0876L24.751 18.6723C24.3694 19.0487 23.9563 19.3924 23.5169 19.6997C23.5651 19.3733 23.6242 19.0469 23.6242 18.7151C23.7167 17.2276 23.5221 15.736 23.0506 14.3218L24.3005 13.0749C25.27 12.1077 25.8144 10.7956 25.8144 9.42778C25.8143 8.06009 25.2699 6.74835 24.3005 5.7812C23.331 4.81399 22.0158 4.27042 20.6447 4.27041C19.2735 4.27041 17.9583 4.81399 16.9888 5.7812L14.4089 8.35492C13.9285 8.83298 13.5475 9.40127 13.2879 10.0267C13.0283 10.652 12.8951 11.3226 12.8961 11.9994C12.8974 13.4907 13.4169 14.9354 14.366 16.0876C14.6161 16.4002 14.801 16.7597 14.9097 17.1448C15.0184 17.5299 15.0486 17.933 14.9988 18.33C14.8342 19.1471 14.4227 19.8943 13.8191 20.4705C12.6704 19.9058 11.6493 19.1125 10.8191 18.1398C9.9889 17.1671 9.36707 16.0353 8.9914 14.814V14.7069C8.71879 13.7849 8.58819 12.8268 8.60481 11.8656V11.8066C8.65591 9.36976 9.6544 7.04823 11.389 5.33178L13.9689 2.75753C14.8436 1.87906 15.8844 1.18231 17.0307 0.70744C18.1769 0.232608 19.4062 -0.0109416 20.6473 -0.00902194Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="content-right">
                                    <div class="link-text">
                                        <a href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_text); ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if (!empty($quote_cite)) {
                            ?>
                                <p class="quote-cite">
                                    <?php echo esc_html($quote_cite); ?>
                                </p>
                            <?php
                            }
                            ?>
                            <div class="link-meta">
                                <?php northway()->blog->get_archive_meta_2(); ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="pxl-post-read-more"><?php echo esc_html__('Read More', 'northway'); ?><div class="pxl-post-read-more-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92518 1.03312C5.10231 0.795496 5.41061 0.770799 5.61377 0.977955L8.59944 4.02225C8.7057 4.13062 8.76674 4.28756 8.76674 4.45248C8.76674 4.61748 8.7057 4.77434 8.59944 4.88271L5.61377 7.92699C5.41061 8.13415 5.10231 8.10949 4.92518 7.87189C4.74806 7.63421 4.7692 7.27369 4.97236 7.06652L6.97623 5.02328H1.12085C0.851316 5.02328 0.632812 4.76771 0.632812 4.45248C0.632812 4.13724 0.851316 3.88168 1.12085 3.88168H6.97623L4.97236 1.83847C4.7692 1.63131 4.74806 1.27074 4.92518 1.03312Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif (has_post_format('video')) {
                    if (has_post_thumbnail()) {
                    ?>
                        <div class="format-wrap">
                            <div class="pxl-item--image">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full'); ?></a>
                                <?php
                                if (!empty($featured_video)) {
                                ?>
                                    <div class="pxl-video-popup">
                                        <div class="content-inner">
                                            <a class="video-play-button pxl-action-popup" href="<?php echo esc_url($featured_video); ?>">
                                                <i class="bi-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                                <?php northway()->blog->get_archive_meta(); ?>
                                <?php northway()->blog->get_date(); ?>
                            </div>
                        </div>
                    <?php
                    }
                } elseif (!empty($audio_url) && has_post_format('audio')) {
                    global $wp_embed;
                    pxl_print_html($wp_embed->run_shortcode('[embed]' . $audio_url . '[/embed]'));
                } else {
                    ?>
                    <div class="pxl-item--image">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full'); ?></a>
                        <?php northway()->blog->get_archive_meta(); ?>
                        <?php northway()->blog->get_date(); ?>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php } ?>
        <?php
        if (!has_post_format('link') && !has_post_format('quote')) {
        ?>
            <div class="post-content">
                <h4 class="post-title">
                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                        <?php if (is_sticky()) { ?>
                            <i class="bi-check"></i>
                        <?php } ?>
                        <?php the_title(); ?>
                    </a>
                </h4>
                <div class="post-excerpt">
                    <?php
                    northway()->blog->get_excerpt(50);
                    wp_link_pages(array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ));
                    ?>
                </div>
                <?php
                if (!empty($archive_readmore_text)) {
                ?>
                    <?php
                    if (!empty($archive_readmore_text)) {
                    ?>
                        <div class="pxl-post-read-more-wrap">
                            <div class="pxl-post-read-more-divider"></div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="pxl-post-read-more"><?php echo esc_html__('Read More', 'northway'); ?><div class="pxl-post-read-more-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92518 1.03312C5.10231 0.795496 5.41061 0.770799 5.61377 0.977955L8.59944 4.02225C8.7057 4.13062 8.76674 4.28756 8.76674 4.45248C8.76674 4.61748 8.7057 4.77434 8.59944 4.88271L5.61377 7.92699C5.41061 8.13415 5.10231 8.10949 4.92518 7.87189C4.74806 7.63421 4.7692 7.27369 4.97236 7.06652L6.97623 5.02328H1.12085C0.851316 5.02328 0.632812 4.76771 0.632812 4.45248C0.632812 4.13724 0.851316 3.88168 1.12085 3.88168H6.97623L4.97236 1.83847C4.7692 1.63131 4.74806 1.27074 4.92518 1.03312Z" fill="currentColor" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</article>