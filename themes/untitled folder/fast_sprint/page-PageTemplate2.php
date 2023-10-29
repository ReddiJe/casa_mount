<?php
/**
 * Template Name: Page Template 2
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

$content_position = ( $udesign_options['pages_sidebar_2'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="<?php echo esc_attr( $content_position ); ?>">
		<div class="main-content-padding">
			<?php
			udesign_main_content_top( is_front_page() );
			
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/page/content', 'page' );
					
					if ( $udesign_options['show_comments_on_pages'] == 'yes' ) {
						comments_template();
					}
				endwhile;
			endif;
			?>
			<div class="clear"></div>
			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->
	
	<?php 
	if( sidebar_exist( 'PagesSidebar2' ) ) {
		get_sidebar( 'PagesSidebar2' );
	}
	?>
	
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

