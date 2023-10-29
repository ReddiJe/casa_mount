<?php
/**
 * Template part for displaying portfolio's single posts postmetadata block.
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

<div class="single-portfolio-postmetadata-divider-top"><?php echo do_shortcode( '[divider]' ); ?></div>
<section class="postmetadata">
	<span>
		<?php 
		if ( $udesign_options['show_portfolio_postmetadata_author'] == 'yes' ) :
			printf( __( 'By %1$s on %2$s ', 'u-design' ), '</span>' . udesign_get_the_author_page_link() . '<span>', get_the_date() );
		else :
			printf( __( 'On %1$s ', 'u-design' ), get_the_date() );
		endif;
		?>
	</span> &nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link"><?php the_category( ', ' ); ?></span> &nbsp;  <?php echo udesign_get_comments_link(); ?> <?php edit_post_link( __( 'Edit', 'u-design' ), '<div class="postmetadata-edit-link">', '</div>' ); ?> 
	<?php 
	if ( isset( $udesign_options['show_portfolio_postmetadata_tags'] ) && $udesign_options['show_portfolio_postmetadata_tags'] == 'yes' ) {
		echo the_tags( '<div class="portfolio-post-tags-wrapper">' . __( 'Tags: ', 'u-design' ), ', ', '</div>' );
	}
	?> 
</section><!-- end postmetadata -->
<div class="single-portfolio-postmetadata-divider-bottom"><?php echo do_shortcode( '[divider]' ); ?></div>
