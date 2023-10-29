<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	?>
        <p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'u-design' ); ?></p>
	<?php 
	return;
}
global $udesign_options;


/* You can start editing from here: */
?>
<div class="clear"></div>

<?php
if ( have_comments() ) :
	?>
	<h5 id="comments"><?php comments_number( __( 'No Responses', 'u-design' ), __( '1 Comment','u-design' ), __( '% Comments', 'u-design' ) ); ?></h5>
	<div class="clear"></div>
	<ol class="commentlist">
		<?php wp_list_comments( 'type=comment&callback=udesign_theme_comment' ); ?>
        </ol>
        <div class="clear"></div>
	<?php
	// Comment pagination.
	if ( function_exists( 'wp_commentnavi' ) ) :
		wp_commentnavi();
	else :
		?>
		<nav class="navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</nav>
		<?php 
	endif;
endif;
?>

<div class="clear"></div>

<?php 
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) && ( $udesign_options['show_comments_are_closed_message'] ) ) :
	?>
	<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'u-design' ); ?></p>
	<div class="clear"></div>
	<?php
endif;

$comments_args = array(
		'class_form'            =>  'u-design-comment-form comment-form',
		'comment_notes_before'  =>  '',
		// Change the title of send button.
		'label_submit'          =>  esc_attr__( 'Submit Comment', 'u-design' ),
		// Redefine the comment textarea field.
		'comment_field'         =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="100%" rows="10" placeholder="'.esc_attr__( 'write your comment here...', 'u-design' ).'" aria-required="true" required="required"></textarea></p>',
	);

// Output the comment form.
comment_form( $comments_args );
?>

<div class="clear"></div>

