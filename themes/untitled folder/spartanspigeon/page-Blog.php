<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */
/**
 * Template Name: Blog page
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

global $post;
// Get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language).
$page_id = ( function_exists( 'icl_object_id' ) && function_exists( 'icl_get_default_language' ) ) ? icl_object_id( $post->ID, 'page', true, icl_get_default_language() ) : $post->ID;
$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $udesign_options['remove_blog_sidebar'] == 'yes' ) {
	$content_position = 'grid_24';
}
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="<?php echo esc_attr( $content_position ); ?>">
		<div class="main-content-padding">
			<?php 
			udesign_main_content_top( is_front_page() );
			
			// Display Blog page Content if any.
			$blog_page_query = new WP_Query( 'page_id=' . $page_id );
			if ( $blog_page_query->have_posts() ) :
				while ( $blog_page_query->have_posts() ) : $blog_page_query->the_post();
			
					if( get_the_content() ) {
						
						get_template_part( 'template-parts/page/content', 'page-blog' );
						
					}
					
				endwhile;
			endif;
			// Reset Query.
			wp_reset_postdata();
			?>
			<div class="clear"></div>

			<?php
			// Begin the main loop for all posts.
			
			// Adhere to paging rules.
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) { // Applies when this page template is used as a static homepage in WP3+.
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}
			
			if ( $udesign_options['exclude_portfolio_from_blog'] == 'yes' ) {
				// Get the portfolio categories to be excluded from the blog section.
				global $portfolio_cats_as_a_negative_ids_string;
				$blog_posts_query_args = 'cat=' . $portfolio_cats_as_a_negative_ids_string . '&paged=' . $paged;
			} else {
				$blog_posts_query_args = 'cat=0&paged=' . $paged;
			}

			$blog_posts_query = new WP_Query( $blog_posts_query_args );

			if ( $blog_posts_query->have_posts() ) :
				while ( $blog_posts_query->have_posts() ) : $blog_posts_query->the_post();
					
					get_template_part( 'template-parts/page/content', 'page-blog-entries' );
					
					echo do_shortcode('[divider_top]');
				endwhile;
				?>

				<div class="clear"></div>

				<?php
				// Pagination.
				if( function_exists( 'wp_pagenavi' ) ) :
					wp_pagenavi( array( 'wrapper_tag' => 'nav', 'query' => $blog_posts_query ) );
				else :
					?>
					<nav class="navigation">
						<div class="alignleft"><?php previous_posts_link( esc_html__( '&larr; Newer Entries', 'u-design' ), $blog_posts_query->max_num_pages ); ?></div>
						<div class="alignright"><?php next_posts_link( esc_html__( 'Older Entries &rarr;', 'u-design' ), $blog_posts_query->max_num_pages ); ?></div>
					</nav>
					<?php
				endif;

				// Restore original Post Data.
				wp_reset_postdata();
				
			else :
				ob_start();
				?>
				<p class="center"><?php esc_html_e( 'No entries were found under this blog section.', 'u-design' ); ?></p>
				<div class="inline-search-form"><?php get_search_form(); ?></div><?php 

				echo do_shortcode( '[message type="warning"]' . ob_get_clean() . '[/message]' );

			endif;
			?>
			
			<div class="clear"></div>
			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->

	<?php
	if( ( ! $udesign_options['remove_blog_sidebar'] == 'yes' ) && sidebar_exist( 'BlogSidebar' ) ) {
		get_sidebar( 'BlogSidebar' );
	}
	?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


