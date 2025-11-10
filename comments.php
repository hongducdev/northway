<?php
/**
 * @package Case-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">

        <?php
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">

                <h2 class="comments-title">
                    <?php
                        $comment_count = get_comments_number();
                        if ( 1 === intval($comment_count) ) {
                            echo esc_html__( '1 Comment', 'northway' );
                        } else {
                            echo esc_attr( $comment_count ).' '.esc_html__('Comments', 'northway');
                        }
                    ?>
                </h2>

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'northway_comment_list',
                            'max_depth'  => 3
                        ) );
                    ?>
                </ul>

                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'northway' ); ?></p>
            <?php
            endif;

        endif;

    $args = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'class_submit'         => 'btn-submit',
            'title_reply'       => esc_attr__( 'Post a Comment', 'northway'),
            'title_reply_to'    => esc_attr__( 'Post a Comment To ', 'northway') . '%s',
            'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'northway'),
            'label_submit'      => esc_attr__( 'Post Comment', 'northway'),
            'submit_button'     => '<button name="%1$s" id="%2$s" type="submit" class="btn pxl-button-style-2-default btn-default inline pxl-icon--right %3$s">
        <div class="pxl-button--icon pxl-button--icon-left">
            <i class="flaticon-arrow"></i>
        </div>
        <span class="pxl--btn-text" data-text="%4$s">%4$s</span>
        <div class="pxl-button--icon pxl-button--icon-right">
            <i class="flaticon-arrow"></i>
        </div>',
            'comment_notes_before' => '',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' =>
                    '<div class="row"><div class="col-12 notice-f">'. esc_attr('Have thoughts or questions about what you’ve just read? Share them below—we’d love to hear from you.', 'northway' ) .'</div><div class="comment-form-author col-lg-6 col-md-6 col-sm-12"><input id="author" name="author" type="text" placeholder="'.esc_attr__('Name*', 'northway').'" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"/></div>',

                    'email' =>
                    '<div class="comment-form-email col-lg-6 col-md-6 col-sm-12"><input id="email" name="email" type="text" placeholder="'.esc_attr__('Email*', 'northway').'" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"/></div>',
            )
            ),
            'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_attr__('Your Comment Here...', 'northway').'" aria-required="true">' .
            '</textarea></div><div class="col-12 notice-f save-info"> <input type="checkbox" id="save-info" name="save-info"><label for="save-info">'. esc_html__('Save my details in this browser for the next time I comment', 'northway' ) .'</label></div>',
    );
    comment_form($args); ?>
</div>