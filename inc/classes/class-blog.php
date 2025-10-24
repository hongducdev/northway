<?php
if (!class_exists('Northway_Blog')) {
    class Northway_Blog
    {

        public function get_archive_meta()
        {
            $archive_author = northway()->get_theme_opt('archive_author', true);
            $archive_category = northway()->get_theme_opt('archive_category', true);
            $archive_comment = northway()->get_theme_opt('archive_comment', true);
            if ($archive_author || $archive_category || $archive_comment) : ?>
                <div class="pxl-item--meta pxl-blog-meta">
                    <?php if ($archive_author) : ?>
                        <div class="pxl-item--author">
                            <i class="flaticon-user"></i>
                            <span><?php echo esc_html__('By', 'northway'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($archive_comment) : ?>
                        <div class="pxl-item--comment">
                            <i class="flaticon-comment"></i>
                            <a href="<?php the_permalink(); ?>#comments">
                                <?php echo comments_number(esc_html__('0 Comments', 'northway'), esc_html__('1 Comment', 'northway'), esc_html__('% Comments', 'northway')); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($archive_category) : ?>
                        <div class="pxl-item--category">
                            <i class="flaticon-tag"></i>
                            <?php the_terms(get_the_ID(), 'category', '', ', '); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif;
        }

        public function get_archive_meta_2()
        {
            $archive_author = northway()->get_theme_opt('archive_author', true);
            $archive_comment = northway()->get_theme_opt('archive_comment', true);
            $archive_date = northway()->get_theme_opt('archive_date', true);
            if ($archive_author || $archive_date || $archive_comment) : ?>
                <div class="pxl-item--meta pxl-blog-meta">
                    <?php if ($archive_author) : ?>
                        <div class="pxl-item--author">
                            <i class="flaticon-user"></i>
                            <span><?php echo esc_html__('By', 'northway'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($archive_comment) : ?>
                        <div class="pxl-item--comment">
                            <i class="flaticon-comment"></i>
                            <a href="<?php the_permalink(); ?>#comments">
                                <?php echo comments_number(esc_html__('0 Comments', 'northway'), esc_html__('1 Comment', 'northway'), esc_html__('% Comments', 'northway')); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($archive_date) : ?>
                        <div class="pxl-item--date">
                            <i class="flaticon-calendar"></i>
                            <?php echo get_the_date('F d, Y'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif;
        }

        public function get_archive_meta_3($post_id = 0)
        {
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
            ?>
            <div class="pxl-post-meta-3">
                <div class="pxl-post-meta-3-inner ">
                    <div class="pxl-post-meta-3-item">
                        <i class="flaticon-calendar"></i>
                        <span class="pxl-post-meta-3-date">
                            <?php echo get_the_date('F d, Y'); ?>
                        </span>
                    </div>
                    <div class="pxl-post-meta-3-right">
                        <div class="pxl-post-meta-3-item">
                            <i class="flaticon-user"></i>
                            <span class="pxl-post-meta-3-author">
                                <?php echo esc_html__('By: ', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                            </span>
                        </div>
                        <span class="pxl-post-meta-3-item  align-items-center">
                            <i class="flaticon-comment"></i>
                            <a href="<?php comments_link(); ?>">
                                <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                            </a>
                        </span>
                        <span class="pxl-post-meta-3-item  align-items-center">
                            <i class="flaticon-tag"></i>
                            <?php the_terms(get_the_ID(), 'category', '', ', '); ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php }

        public function get_date()
        {
            $post_date_on = northway()->get_theme_opt('post_date_on', true);
            if ($post_date_on == '0') return;
        ?>
            <div class="pxl-post--date">
                <span class="pxl-post--date-day"><?php echo get_the_date('d') ?></span>
                <span class="pxl-post--date-month"><?php echo get_the_date('M') ?></span>
            </div>
        <?php }

        public function get_post_title()
        {
            $post_title_on = northway()->get_theme_opt('post_title_on', '0');
            if ($post_title_on == '0') return;
        ?>
            <h3 class="post-title">
                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <?php
        }

        public function get_excerpt()
        {
            $archive_excerpt_length = northway()->get_theme_opt('archive_excerpt_length', '17');
            $northway_the_excerpt = get_the_excerpt();
            if (!empty($northway_the_excerpt)) {
                echo wp_trim_words($northway_the_excerpt, $archive_excerpt_length, $more = null);
            } else {
                echo wp_kses_post($this->get_excerpt_more($archive_excerpt_length));
            }
        }

        public function get_excerpt_more($length = 55, $post = null)
        {
            $post = get_post($post);

            if (empty($post) || 0 >= $length) {
                return '';
            }

            if (post_password_required($post)) {
                return esc_html__('Post password required.', 'northway');
            }

            $content = apply_filters('the_content', strip_shortcodes($post->post_content));
            $content = str_replace(']]>', ']]&gt;', $content);

            $excerpt_more = apply_filters('northway_excerpt_more', '&hellip;');
            $excerpt      = wp_trim_words($content, $length, $excerpt_more);

            return $excerpt;
        }

        public function get_post_metas()
        {
            $post_author_on = northway()->get_theme_opt('post_author_on', true);
            $post_date_on = northway()->get_theme_opt('post_date_on', true);
            $post_comments_on = northway()->get_theme_opt('post_comments_on', true);
            $postID = get_the_ID();
            $post = get_post($postID);
            $author_id = $post->post_author;
            $author = get_user_by('ID', get_post_field('post_author', $postID));
            if ($post_author_on || $post_date_on || $post_comments_on) : ?>
                <div class="post-metas">
                    <div class="meta-inner align-items-center">
                        <?php if ($post_author_on) : ?>
                            <div class="pxl-item--author">
                                <?php echo get_avatar($author_id, 'thumbnail'); ?>
                                <?php echo esc_html__('Post by', 'northway') . ' <span>' . esc_html(get_the_author_meta('display_name', $author_id)) . '</span>'; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($post_comments_on) : ?>
                            <span class="post-comments  align-items-center">
                                <a href="<?php comments_link(); ?>">
                                    <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway')); ?></span>
                                </a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif;
        }

        public function northway_set_post_views($postID)
        {
            $countKey = 'post_views_count';
            $count    = get_post_meta($postID, $countKey, true);
            if ($count == '') {
                $count = 0;
                delete_post_meta($postID, $countKey);
                add_post_meta($postID, $countKey, '0');
            } else {
                $count++;
                update_post_meta($postID, $countKey, $count);
            }
        }

        public function get_post_tags()
        {
            $post_tag = northway()->get_theme_opt('post_tag', true);
            if ($post_tag != '1') return;
            $tags_list = get_the_tag_list();
            if ($tags_list) {
                echo '<div class="post-tags ">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_post_category($post_id = 0)
        {
            $archive_category = northway()->get_theme_opt('archive_category', true);

            $post_category = $archive_category && has_category('', $post_id);
            $post_date = true;

            echo '<ul class="pxl-item--meta">';

            if ($post_category) {
                echo '<li class="item--category">';
                echo get_the_term_list($post_id, 'category', '', '');
                echo '</li>';
            }

            echo '</ul>';
        }

        public function get_post_share($post_id = 0)
        {
            $post_social_share = northway()->get_theme_opt('post_social_share', false);
            $share_icons = northway()->get_theme_opt('post_social_share_icon', []);
            $social_facebook = northway()->get_theme_opt('social_facebook', []);
            $social_twitter = northway()->get_theme_opt('social_twitter', []);
            $social_instagram = northway()->get_theme_opt('social_instagram', []);
            $social_linkedin = northway()->get_theme_opt('social_linkedin', []);
            if ($post_social_share != '1') return;
            $post = get_post($post_id);
            ?>
            <div class="post-shares align-items-center">
                <span class="label"><?php echo esc_html__('Share:', 'northway'); ?></span>
                <div class="social-share">
                    <?php if ($social_facebook): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Facebook', 'northway'); ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <i class="flaticon-facebook"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_twitter): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Twitter/X', 'northway'); ?>" target="_blank" href="https://x.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_the_permalink($post_id)); ?>&text=<?php the_title(); ?>%20">
                            <i class="flaticon-search"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_linkedin): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Linkedin', 'northway'); ?>" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <i class="flaticon-linkedin"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($social_instagram): ?>
                        <a class="social-share-icon " title="<?php echo esc_attr__('Instagram', 'northway'); ?>" target="_blank" href="https://www.instagram.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink($post_id)); ?>">
                            <i class="flaticon-instagram"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        }

        public function get_post_nav()
        {
            $post_navigation = northway()->get_theme_opt('post_navigation', false);
            if ($post_navigation != '1') return;
            global $post;

            $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
            $next     = get_adjacent_post(false, '', false);

            if (! $next && ! $previous)
                return;
        ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();
            if (empty($previous_post) && empty($next_post)) return;

            ?>
            <div class="single-next-prev-nav row gx-0 justify-content-between align-items-center">
                <?php if (!empty($previous_post)): ?>
                    <div class="nav-next-prev prev col relative text-start">
                        <div class="nav-inner">
                            <?php previous_post_link('%link', ''); ?>
                            <div class="nav-label-wrap justify-content-center align-items-center">
                                <i class="bootstrap-icons bi-arrow-left"></i>
                            </div>
                            <div class="nav-title-wrap d-none d-sm-flex">
                                <span class="nav-label"><?php echo esc_html__('Previous Post', 'northway'); ?></span>
                                <div class="nav-title"><?php echo wp_trim_words(get_the_title($previous_post->ID), 5, '...'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="grid-archive">
                    <a href="<?php echo get_post_type_archive_link('post'); ?>">
                        <div class="nav-archive-button">
                            <div class="archive-btn-square square-1"></div>
                            <div class="archive-btn-square square-2"></div>
                            <div class="archive-btn-square square-3"></div>
                        </div>
                    </a>
                </div>
                <?php if (!empty($next_post)) : ?>
                    <div class="nav-next-prev next col relative text-end justify-content-end">
                        <div class="nav-inner">
                            <?php next_post_link('%link', ''); ?>
                            <div class="nav-label-wrap justify-content-center align-items-center">
                                <i class="bootstrap-icons bi-arrow-right"></i>
                            </div>
                            <div class="nav-title-wrap  align-items-end d-none d-sm-flex">
                                <span class="nav-label"><?php echo esc_html__('Newer Post', 'northway'); ?></span>
                                <div class="nav-title"><?php echo wp_trim_words(get_the_title($next_post->ID), 5, '...'); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php
        }
        public function get_project_nav()
        {
            global $post;
            $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
            $next     = get_adjacent_post(false, '', false);
            $link_grid = northway()->get_theme_opt('link_grid', '');
            if (! $next && ! $previous)
                return;
        ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if (!empty($next_post) || !empty($previous_post)) {
            ?>
                <div class="pxl-project--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if (is_a($previous_post, 'WP_Post') && get_the_title($previous_post->ID) != '') {
                            ?>
                                <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>"><i class="far fa-arrow-left"></i>Prev Project</a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-grid">
                            <?php if (!empty($link_grid)) { ?>
                                <a href="<?php echo esc_url($link_grid); ?>">
                                    <span class="bl bl1"></span>
                                    <span class="bl bl2"></span>
                                    <span class="bl bl3"></span>
                                    <span class="bl bl4"></span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if (is_a($next_post, 'WP_Post') && get_the_title($next_post->ID) != '') {
                            ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">Next Project <i class="far fa-arrow-right"></i> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
<?php }
        }
    }
}
