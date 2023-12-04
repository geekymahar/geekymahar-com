<?php 

// Do not allow directly accessing this file
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="comments-area">
   
    <?php if ( have_comments() ) : ?>
       
        <h4 class="comments-title">
            <?php 
            printf( 
                number_format_i18n( get_comments_number() ) . 
                _nx( ' Comment', ' Comments', get_comments_number(), 'comments-title', 'reframe' ) 
            ); 
            ?>
        </h4>
        
        <ul class="comment-list">
            <?php 
            wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 50,
                'reply_text'  => '<i class="fa fa-reply reply-icon"></i>' . esc_html__( 'Reply', 'reframe' ),
            ) );
            ?>
        </ul>
        
        <?php the_comments_pagination(array(
            'prev_text' => '<span class="ti-arrow-left"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous', 'reframe' ) . '</span>',
            'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'reframe' ) . '</span>' . '<span class="ti-arrow-right"></span>',
		));
        
    endif; 
    
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments', 'reframe' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'reframe' ); ?></p>
    <?php endif;
    
    $comments_args = array( 
        'submit_button' => ' <input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /><span class="icon-button"><span class="ti-arrow-right"></span></span>',
        'label_submit' => esc_html__( 'Submit', 'reframe' ),
        'title_reply' => esc_html__( 'Add Comment', 'reframe' ),
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'comment_notes_after' => '',
    );
    
    comment_form($comments_args); 
    
    ?>
    
</div>