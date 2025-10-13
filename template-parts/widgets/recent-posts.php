<?php defined('ABSPATH') or exit(-1);
/**
 * Recent Posts widgets
 * @package Case-Themes
 */

class Northway_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'pxl_recent_posts',
            esc_html__('Northway Recent Posts', 'northway'),
            array(
                'description' => esc_html__('Your site’s most recent Posts.', 'northway'),
                'customize_selective_refresh' => true,
            )
        );
    }

    function widget($args, $instance)
    {
        $instance = wp_parse_args((array) $instance, array(
            'title'         => '',
            'number'        => 3,
            'post_in'        => '',
        ));

        $title = $instance['title'];
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo wp_kses_post($args['before_widget']);

        // Allow SVG in title by using wp_kses with custom allowed tags
        $allowed_html = array(
            'span' => array(
                'class' => array(),
                'style' => array(),
            ),
            'svg' => array(
                'xmlns' => array(),
                'width' => array(),
                'height' => array(),
                'viewbox' => array(),
                'fill' => array(),
            ),
            'path' => array(
                'd' => array(),
                'fill' => array(),
            ),
        );

        echo wp_kses_post($args['before_title']) . wp_kses($title, $allowed_html) . wp_kses_post($args['after_title']);

        $number = absint($instance['number']);
        if ($number <= 0 || $number > 10) {
            $number = 4;
        }
        $post_in = $instance['post_in'];
        $sticky = '';
        if ($post_in == 'featured') {
            $sticky = get_option('sticky_posts');
        }
        $r = new WP_Query(array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'  => $sticky,
        ));

        if ($r->have_posts()) {
            echo '<div class="pxl--items">';

            while ($r->have_posts()) {
                $r->the_post();
                global $post; ?>
                <div class="pxl--item">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img  = pxl_get_image_by_size(array(
                            'attach_id'  => get_post_thumbnail_id($post->ID),
                            'thumb_size' => '152x164',
                        ));
                        $thumbnail    = $img['thumbnail']; ?>
                        <div class="pxl-item--img">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <a href="<?php the_permalink(); ?>"></a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                        <?php printf(
                            '<h4 class="pxl-item--title"><a href="%1$s" title="%2$s">%3$s</a></h4>',
                            esc_url(get_permalink()),
                            esc_attr(get_the_title()),
                            get_the_title()
                        ); ?>
                        <div class="pxl-item--meta">
                            <span class="pxl-item--author">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                    <path d="M1.88849 3.32635C1.88849 2.7773 2.0513 2.24058 2.35634 1.78406C2.66137 1.32754 3.09493 0.971722 3.60219 0.761609C4.10945 0.551496 4.66762 0.496521 5.20612 0.603635C5.74463 0.71075 6.23927 0.975144 6.62751 1.36338C7.01575 1.75162 7.28014 2.24627 7.38726 2.78477C7.49437 3.32327 7.4394 3.88144 7.22928 4.3887C7.01917 4.89596 6.66336 5.32952 6.20684 5.63456C5.75032 5.93959 5.21359 6.10241 4.66454 6.10241C3.92854 6.10157 3.22293 5.80882 2.7025 5.28839C2.18207 4.76796 1.88933 4.06235 1.88849 3.32635ZM9.30452 10.213C9.24792 9.97289 9.16961 9.73847 9.07054 9.51259C8.36344 7.89852 6.6756 6.89557 4.66454 6.89557C2.38143 6.89557 0.52108 8.2138 0.0348735 10.1753C-0.00854444 10.3509 -0.0114599 10.5341 0.026348 10.7109C0.0641558 10.8878 0.141697 11.0538 0.253105 11.1963C0.364513 11.3388 0.506871 11.4541 0.66941 11.5335C0.831949 11.6129 1.01041 11.6543 1.1913 11.6545H8.13937C8.32107 11.6549 8.50047 11.6139 8.66395 11.5346C8.82743 11.4553 8.97068 11.3398 9.08283 11.1969C9.19198 11.0604 9.26866 10.9009 9.30707 10.7305C9.34548 10.56 9.34461 10.383 9.30452 10.213Z" fill="currentColor" />
                                </svg>
                                <?php esc_html_e('By:', 'northway'); ?> <?php echo get_the_author(); ?>
                            </span>
                            <span class="pxl-item--comments">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                    <path d="M6.69956 0.554688C5.66085 0.554437 4.64089 0.798277 3.74503 1.26102C2.84917 1.72377 2.10988 2.38865 1.60353 3.18699C1.09717 3.98532 0.842098 4.88818 0.864658 5.8023C0.887218 6.71643 1.18659 7.60868 1.73186 8.38691L1.26989 10.6151C1.25631 10.6822 1.26131 10.7511 1.28444 10.8161C1.30758 10.881 1.34817 10.9401 1.40279 10.9884C1.44713 11.0264 1.4996 11.0563 1.55717 11.0764C1.61475 11.0965 1.67627 11.1063 1.73818 11.1053H1.83311L4.896 10.5483C5.47439 10.7356 6.0835 10.8391 6.69956 10.8547C8.25121 10.8547 9.7393 10.3121 10.8365 9.34627C11.9337 8.38046 12.5501 7.07054 12.5501 5.70468C12.5501 4.33882 11.9337 3.0289 10.8365 2.06308C9.7393 1.09727 8.25121 0.554688 6.69956 0.554688ZM3.69362 5.84116C3.69362 5.70344 3.74002 5.56881 3.82694 5.4543C3.91386 5.33979 4.0374 5.25054 4.18194 5.19784C4.32649 5.14514 4.48554 5.13135 4.63898 5.15822C4.79243 5.18508 4.93338 5.2514 5.04401 5.34878C5.15463 5.44617 5.22997 5.57024 5.2605 5.70531C5.29102 5.84038 5.27535 5.98039 5.21548 6.10763C5.15561 6.23486 5.05422 6.34361 4.92414 6.42013C4.79405 6.49664 4.64111 6.53748 4.48466 6.53748C4.27486 6.53748 4.07366 6.46412 3.92531 6.33353C3.77697 6.20294 3.69362 6.02583 3.69362 5.84116ZM5.90852 5.84116C5.90852 5.70344 5.95492 5.56881 6.04184 5.4543C6.12876 5.33979 6.2523 5.25054 6.39684 5.19784C6.54138 5.14514 6.70044 5.13135 6.85388 5.15822C7.00733 5.18508 7.14828 5.2514 7.2589 5.34878C7.36953 5.44617 7.44487 5.57024 7.47539 5.70531C7.50592 5.84038 7.49025 5.98039 7.43038 6.10763C7.37051 6.23486 7.26912 6.34361 7.13903 6.42013C7.00895 6.49664 6.85601 6.53748 6.69956 6.53748C6.48976 6.53748 6.28856 6.46412 6.14021 6.33353C5.99186 6.20294 5.90852 6.02583 5.90852 5.84116ZM8.91446 6.53748C8.758 6.53748 8.60507 6.49664 8.47498 6.42013C8.3449 6.34361 8.24351 6.23486 8.18364 6.10763C8.12376 5.98039 8.1081 5.84038 8.13862 5.70531C8.16914 5.57024 8.24448 5.44617 8.35511 5.34878C8.46574 5.2514 8.60669 5.18508 8.76013 5.15822C8.91358 5.13135 9.07263 5.14514 9.21717 5.19784C9.36172 5.25054 9.48526 5.33979 9.57218 5.4543C9.6591 5.56881 9.70549 5.70344 9.70549 5.84116C9.70549 6.02583 9.62215 6.20294 9.4738 6.33353C9.32546 6.46412 9.12425 6.53748 8.91446 6.53748Z" fill="currentColor" />
                                </svg>
                                <?php
                                $comments_count = get_comments_number();
                                if ($comments_count == 0) {
                                    echo '0 ' . esc_html__('Comments', 'northway');
                                } elseif ($comments_count == 1) {
                                    echo '1 ' . esc_html__('Comment', 'northway');
                                } else {
                                    echo esc_html($comments_count) . ' ' . esc_html__('Comments', 'northway');
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
        <?php }

            echo '</div>';
        }

        wp_reset_postdata();
        wp_reset_query();

        echo wp_kses_post($args['after_widget']);
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title']         = sanitize_text_field($new_instance['title']);
        $instance['number']        = absint($new_instance['number']);
        $instance['post_in'] = strip_tags($new_instance['post_in']);
        return $instance;
    }

    function form($instance)
    {
        $instance = wp_parse_args((array) $instance, array(
            'title'         => esc_html__('Recent Posts', 'northway'),
            'number'        => 4,
        ));

        $title         = $instance['title'];
        $number        = absint($instance['number']);
        $post_in = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'northway'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p><label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e('Post in', 'northway'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('post_in')); ?>" name="<?php echo esc_attr($this->get_field_name('post_in')); ?>">
                <option value="recent" <?php if ($post_in == 'recent') {
                                            echo 'selected="selected"';
                                        } ?>><?php esc_html_e('Recent', 'northway'); ?></option>
                <option value="featured" <?php if ($post_in == 'featured') {
                                                echo 'selected="selected"';
                                            } ?>><?php esc_html_e('Featured', 'northway'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts to show:', 'northway'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" />
        </p>

<?php
    }
}
add_action('widgets_init', 'northway_register_recent_widget');
function northway_register_recent_widget()
{
    if (function_exists('pxl_register_wp_widget')) {
        pxl_register_wp_widget('Northway_Recent_Posts_Widget');
    }
}
