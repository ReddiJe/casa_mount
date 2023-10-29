<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/*
Template Name: Archives
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="<?php echo esc_attr( $content_position ); ?>">
		<div class="main-content-padding">
			<?php
			udesign_main_content_top( is_front_page() );
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/page/content', 'page' );
					
				endwhile;
			endif;
			?>

			<div class="clear"></div>

			<h2><?php esc_html_e( 'Archives by Year:', 'u-design' ); ?></h2>
			<ul class="list-10">
				<?php wp_get_archives( 'type=yearly' ); ?>
			</ul>

			<h2><?php esc_html_e( 'Archives by Month:', 'u-design' ); ?></h2>
			<ul class="list-10">
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>

			<h2><?php esc_html_e( 'Archives by Subject:', 'u-design' ); ?></h2>
			<ul class="list-10">
				<?php wp_list_categories(); ?>
			</ul>

			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->
	
	<?php
	if( sidebar_exist( 'BlogSidebar' ) ) {
		get_sidebar( 'BlogSidebar' );
	}
	?>
	
</div><!-- end content-container -->

<?php

get_footer();

