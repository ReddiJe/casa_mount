<?php
/**
 * Template part for displaying blog page main loop entries.
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

global $udesign_options;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php udesign_blog_entry_before(); ?>
	<div class="entry">
		<?php udesign_blog_entry_top(); ?>
		<div class="post-top">
			<?php udesign_blog_post_top_area_inside(); ?>
		</div><!-- end post-top -->

		<div class="clear"></div>
		<?php
		udesign_blog_post_content_before();

		if ( $udesign_options['show_excerpt'] == 'yes' ) {

			the_excerpt(); // Display the excerpt.

			if ( $udesign_options['blog_button_text'] ) {
				
				echo do_shortcode( '[read_more text="' . $udesign_options['blog_button_text'] . '" title="' . $udesign_options['blog_button_text'] . '" url="' . get_permalink() . '" align="left"]' );
				echo '<div class="clear"></div>';
				
			}

		} else {

		    global $more; $more = 0; // Enable 'more tag' for this page.

		    the_content( $udesign_options['blog_button_text'] );

		}

		udesign_blog_entry_bottom();
		?>
	</div><!-- end entry -->
	<?php udesign_blog_entry_after(); ?>
</article>
