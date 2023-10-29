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

$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_archive_sidebar'] == 'yes' ) {
	$content_position = 'grid_24';
}

?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="<?php echo esc_attr( $content_position ); ?>">
		<div class="main-content-padding">
			<?php udesign_main_content_top( is_front_page() );
			if ( have_posts() ) :
				
				$post = $posts[0]; // Hack. Set $post so that the_date() works.
			
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/page/content', 'page-blog-entries' );
					
					echo do_shortcode( '[divider_top]' );
				endwhile;
				?>

				<div class="clear"></div>

				<?php
				// Pagination.
				if( function_exists( 'wp_pagenavi' ) ) :
					wp_pagenavi( array( 'wrapper_tag' => 'nav' ) );
				else :
					?>
					<nav class="navigation">
						<div class="alignleft"><?php previous_posts_link( esc_html__( '&larr; Newer Entries', 'u-design' ) ); ?></div>
						<div class="alignright"><?php next_posts_link( esc_html__( 'Older Entries &rarr;', 'u-design' ) ); ?></div>
					</nav>
					<?php
				endif;
			else :
				ob_start();

					if ( is_category() ) { // If this is a category archive.
						printf( __( "<p class='center'>No entries were found under the %s category either because they were not published or this category has been excluded from the Blog section.</p>", 'u-design' ), '<em>' . single_cat_title( '', false ) . '</em>' );
					} else if ( is_date() ) { // If this is a date archive.
						_e( "<p>Sorry, but there aren't any posts with this date.</p>", 'u-design' );
					} else if ( is_author() ) { // If this is a category archive.
						$userdata = get_userdatabylogin( get_query_var( 'author_name' ) );
						printf( __( "<p class='center'>Sorry, but there aren't any posts by %s yet.</p>", 'u-design' ), $userdata->display_name );
					} else {
						_e( "<p class='center'>No posts found.</p>", 'u-design' );
					}
					?>
					<div class="inline-search-form"><?php get_search_form(); ?></div>
					<?php 

				echo do_shortcode( '[message type="warning"]' . ob_get_clean() . '[/message]' );
			endif;
			
			// Reset Query.
			wp_reset_query();
			?>
			<div class="clear"></div>
			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->

	<?php
	if ( ( ! $udesign_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist( 'BlogSidebar' ) ) {
		get_sidebar( 'BlogSidebar' );
		
	}
	?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

