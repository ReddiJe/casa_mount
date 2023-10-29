<?php
/**
 * Template part for displaying portfolio page content.
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

<article class="post portfolio-page" id="post-<?php the_ID(); ?>">
	<?php 
	if ( get_the_content() ) :
		
		udesign_entry_before();
		?>
    
		<div class="entry">
			<?php 
			udesign_entry_top();

			the_content( __( '<p class="serif">Read the rest of this page &raquo;</p>', 'u-design' ) );

			udesign_entry_bottom();
			?>
		</div>
    
		<?php
		udesign_entry_after();
	endif;
	?>
</article>
