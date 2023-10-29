<?php
/**
 * Template Name: Portfolio page 1 Column
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

global $post;
// Get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language).
$page_id = ( function_exists( 'icl_object_id' ) && function_exists( 'icl_get_default_language' ) ) ? icl_object_id( $post->ID, 'page', true, icl_get_default_language() ) : $post->ID;
$portfolio_cat_ID = $udesign_options['portfolio_cat_for_page_' . $page_id]; // Get the portfolio category specified by the user in the 'U-Design Options' page.
if ( function_exists( 'icl_get_default_language' ) ) {
	udesign_wpml_replace_category_id( $portfolio_cat_ID ); // Fix the category ID with the current language one.
}
$current_categoryID = ( isset( $_GET['cat'] ) ) ? $_GET['cat'] : '';
$categories =  get_categories( 'child_of=' . $portfolio_cat_ID );
$query_string_prefix = ( get_option( 'permalink_structure' ) != '' ) ? '?' : '&amp;';
if ( preg_match( '/\?/', get_permalink() ) ) {
	$query_string_prefix = '&amp;';
}
$portfolio_items_per_page = $udesign_options['portfolio_items_per_page_for_page_' . $page_id];
$portfolio_do_not_link_adjacent_items = $udesign_options['portfolio_do_not_link_adjacent_items_' . $page_id];
$portfolio_title_posistion = $udesign_options['portfolio_title_posistion'];
?>


<div id="content-container" class="container_24 portfolio-1-column-page">
	<main id="main-content" role="main" class="grid_24">
		<div class="main-content-padding">
			<?php 
			udesign_main_content_top( is_front_page() );
			
			// BEGIN the actual page content here.
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/page/content', 'page-portfolio' );
					
				endwhile;
			endif;
			
			if ( ! post_password_required() ) :

				// Check if a category has been assigned as Portfolio section
				if( $portfolio_cat_ID ) :
					if ( $categories ) :
						?>
						<div id="category-links" class="grid_22">
							<ul>
							    <li><?php esc_html_e('Categories', 'u-design'); ?>: &nbsp;&nbsp;&nbsp;</li>
								    <?php if ( $current_categoryID ) : // Generate the link to "All" categories. ?>
									    <li><a href="<?php echo the_permalink(); ?>"><?php esc_html_e('All', 'u-design'); ?></a></li>
								    <?php else : ?>
									    <li><a href="<?php echo the_permalink(); ?>" class="current"><?php esc_html_e('All', 'u-design'); ?></a></li>
								    <?php endif; ?>

								    <?php foreach( $categories as $category ) : // Generate the link to the rest of categories. ?>
									    <?php if ( $current_categoryID == $category->cat_ID ) : ?>
										    <li><a href="<?php echo the_permalink().$query_string_prefix.'cat='.$category->cat_ID; ?>" class="current"><?php echo esc_attr( $category->cat_name ); ?></a></li>
									    <?php else : ?>
										    <li><a href="<?php echo the_permalink().$query_string_prefix.'cat='.$category->cat_ID; ?>"><?php echo esc_attr( $category->cat_name ); ?></a></li>
									    <?php endif; ?>
								    <?php endforeach; ?>
							</ul>
						</div><!-- end category-links -->
						<?php
					endif;

					if ( ! $current_categoryID ) {
						$current_categoryID = $portfolio_cat_ID;
					}

					// Adhere to paging rules//adhere to paging rules.
					if ( get_query_var( 'paged' ) ) {
						$paged = get_query_var( 'paged' );
					} elseif ( get_query_var( 'page' ) ) { // Applies when this page template is used as a static homepage in WP3+.
						$paged = get_query_var( 'page' );
					} else {
						$paged = 1;
					}
					// Switch the focus to the chosen portfolio category and its subcategories.
					$portfolio_posts_query = new WP_Query( array(
						'cat' => $current_categoryID,
						'posts_per_page' => $portfolio_items_per_page,
						'paged' => $paged
					    )
					);


					// Start Portfolio items' loop.
					?>
					<div class="clear"></div>
					<div class="portfolio-items-wrapper">
						<?php
						if ( $portfolio_posts_query->have_posts() ) :
							while ( $portfolio_posts_query->have_posts() ) : $portfolio_posts_query->the_post(); ?>
								<div class="one_half">
									<div class="thumb-holder-2-col">
										<div class="portfolio-img-thumb-2-col">
											<?php
											// Get Portfolio Item Thumbnail.
											get_portfolio_item_thumbnail( $portfolio_posts_query->post->ID, '2', '410', '220', $portfolio_do_not_link_adjacent_items, true );
											?>
										</div><!-- end portfolio-img-thumb-2-col -->
									</div><!-- end thumb-holder-2-col -->
								</div><!-- end one_half -->

								<div class="one_half last_column">
									<h2 class="portfolio-single-column"><?php the_title(); ?></h2>
									<div class="clear"></div>
									<?php
										$portfolio_item_description = get_post_meta( $portfolio_posts_query->post->ID, 'portfolio_item_description', true );
										if ( $portfolio_item_description ) :
											echo do_shortcode( __($portfolio_item_description) );
										endif;
									?>
									<div class="clear"></div>
								</div><!-- end one_half last_column -->

								<div class='clear'> </div>
								<?php
							endwhile;
							?>

							<div id="paginationPortfolio" class="grid_23">
								<?php
								// Pagination.
								if ( function_exists( 'wp_pagenavi' ) ) :
									wp_pagenavi( array( 'wrapper_tag' => 'nav', 'query' => $portfolio_posts_query ) );
								else :
									?>
									<nav class="navigation">
										<div class="alignleft"><?php previous_posts_link( esc_html__( '&larr; Newer Entries', 'u-design' ), $portfolio_posts_query->max_num_pages ); ?></div>
										<div class="alignright"><?php next_posts_link( esc_html__( 'Older Entries &rarr;', 'u-design' ), $portfolio_posts_query->max_num_pages ); ?></div>
									</nav>
									<?php
								endif;
								?>
							</div>
							<?php
							// Restore original Post Data.
							wp_reset_postdata();
						endif; // End Portfolio items' loop.
						?>
					</div><!-- end portfolio-items-wrapper -->
					<?php
				else :  // Category has not been assigned.
					?>
					<div class="grid_22 prefix_1 suffix_1">
						<h2><?php esc_html_e( 'Portfolio section for this page has not been found!', 'u-design' ); ?></h2>
						<p><?php _e( "<strong>Reason:</strong> No category has been assigned as Portfolio section for this page yet. In order to fix this, go to the theme's options page and assign a category for this page.", 'u-design' ); ?></p>
					</div>
					<?php
				endif;

			endif; // Close password required if-statement.
			?>

			<div class="clear"></div>

			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();

