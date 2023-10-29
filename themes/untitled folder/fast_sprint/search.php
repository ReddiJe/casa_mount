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

include( trailingslashit( get_template_directory() ) . 'inc/frontend/search_excerpt/ylsy_search_excerpt.php' );
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="grid_24">
		<div class="main-content-padding">
			<?php
			udesign_main_content_top( is_front_page() );
			
			if ( have_posts() && trim( $s ) != '' ) :
				
				// Provide search form first.
				ob_start();
				?>
				<h4 class="center"><?php esc_html_e( "Didn't find what you were looking for? Refine your search!", 'u-design' ); ?></h4>
				<div class="inline-search-form"><?php get_search_form(); ?></div>
				<?php
				echo ob_get_clean();
				
				// Continue with the results.
				while ( have_posts() ) : the_post();
					?>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php udesign_entry_before(); ?>
						<div class="entry">
							<?php 
							udesign_entry_top();

							$title = get_the_title();
							$search_term = preg_replace( '/\/|\+|\*|\[|\]/iu', '', trim( $s ) );
							$keys = explode( " ", $search_term );
							$title = preg_replace( '/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title );
							?>
							<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<?php
							$excerpt = new SearchExcerpt();
							echo strip_shortcodes( $excerpt->the_excerpt( get_the_excerpt() ) );

							_e( 'Search again:', 'u-design' );
							
							udesign_entry_bottom(); ?>
						</div>
						<?php udesign_entry_after(); ?>
					</div>

					<?php		
				endwhile;
				?>

				<div class="clear"></div>

				<?php
				// Pagination
				if ( function_exists( 'wp_pagenavi' ) ) :
					wp_pagenavi( array( 'wrapper_tag' => 'nav' ) );
				else :
					?>
					<nav class="navigation">
						<div class="alignleft"><?php previous_posts_link(); ?></div>
						<div class="alignright"><?php next_posts_link(); ?></div>
					</nav>
					<?php
				endif;
			
			else : 

				ob_start();
				?>
				<h4 class="center"><?php esc_html_e( "Didn't find what you were looking for? Refine your search!", 'u-design' ); ?></h4>
				<div class="inline-search-form"><?php get_search_form(); ?></div>
				<?php 
				echo do_shortcode( '[message type="warning"]' . ob_get_clean() . '[/message]' );
			
			endif;
			
			//Reset Query
			wp_reset_query();
			?>

			<div class="clear"></div>

			<?php udesign_main_content_bottom(); ?>
		</div>	<!-- end main-content-padding -->
	</main><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

