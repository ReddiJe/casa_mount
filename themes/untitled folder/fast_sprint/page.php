<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

$content_position = ( $udesign_options['pages_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_default_page_sidebar'] == 'yes' ) {
	$content_position = 'grid_24';
}
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
	if( ! $udesign_options['remove_default_page_sidebar'] == 'yes'  ) { 
		get_sidebar();
	}
	?>
	
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

