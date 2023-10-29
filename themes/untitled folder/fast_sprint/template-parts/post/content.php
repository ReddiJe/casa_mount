<?php
/**
 * Template part for displaying single post's content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    
	<?php udesign_single_post_entry_before(); ?>
    
	<div class="entry">
		<?php 
		udesign_single_post_entry_top();

		the_content( __( '<p class="serif">Read the rest of this entry &raquo;</p>', 'u-design' ) );
			
		udesign_single_post_entry_bottom();
		?>
	</div>
    
	<?php udesign_single_post_entry_after(); ?>
    
</article>
