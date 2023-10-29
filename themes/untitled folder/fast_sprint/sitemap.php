<?php
/**
 * Template Name: Sitemap page
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

$content_position = ( $udesign_options['sitemap_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="<?php echo esc_attr( $content_position ); ?>">
		<div class="main-content-padding">
			<?php
			udesign_main_content_top( is_front_page() );
			
			if ( have_posts() ) :
				
				while ( have_posts() ) : the_post();
					
					the_content();
					
				endwhile;
				
			endif;
			
			// The sitemap contents are passed through the action hook "udesign_main_content_bottom" and defined in "functions.php".
			udesign_main_content_bottom();
			?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->

	<?php
	if ( sidebar_exist( 'SitemapSidebar' ) ) {
		get_sidebar( 'SitemapSidebar' );
	}
	?>
	
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

