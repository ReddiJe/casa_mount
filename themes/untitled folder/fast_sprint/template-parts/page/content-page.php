<?php
/**
 * Template part for displaying page content, for example in 'page.php'.
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
    
	<?php udesign_entry_before(); ?>
    
	<div class="entry">
		<?php
		udesign_entry_top();

		the_content( __( '<p class="serif">Read the rest of this page &raquo;</p>', 'u-design' ) );

		udesign_entry_bottom();
		?>
	</div>
    
	<?php udesign_entry_after(); ?>
    
</article>
