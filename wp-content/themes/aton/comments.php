<?php if ( post_password_required() ) : ?>
    <p class="qodef-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'aton' ); ?></p>
<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
<div class="qodef-comment-holder clearfix" id="comments" data-qodef-anchor="comments">
    <div class="qodef-comment-number">
        <div class="qodef-comment-number-inner">
            <h5><?php comments_number( esc_html__('No Comments','aton'), '1'.esc_html__(' Comment ','aton'), '% '.esc_html__(' Comments ','aton')); ?></h5>
        </div>
    </div>
    <div class="qodef-comments">
        <ul class="qodef-comment-list">
            <?php wp_list_comments(array( 'callback' => 'aton_qodef_comment')); ?>
        </ul>
    </div>
</div>

<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'aton'); ?></p>

	<?php endif; ?>
<?php endif; ?>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Post a Comment','aton' ),
	'title_reply_to' => esc_html__( 'Post a Reply to %s','aton' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply','aton' ),
	'label_submit' => esc_html__( 'Submit','aton' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Write your comment here...','aton' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
    'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h5>',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="author">'. esc_html__( 'Name','aton' ) .'</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>',
		'url' => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="email">'. esc_html__( 'E-mail Address','aton' ) .'</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div>',
		'email' => '<div class="qodef-comment-column"><label class="qodef-comment-label" for="url">'. esc_html__( 'Website','aton' ) .'</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){
	?>
	<div class="qodef-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<?php if(comments_open()) { ?>
     <div class="qodef-comment-form">
        <?php comment_form($args); ?>
    </div>
<?php } ?>
								
							


