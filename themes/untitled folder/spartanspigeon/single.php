<?php
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $udesign_options;

// Grab the array of portfolio categories.
$portfolio_categories_array = $udesign_options['portfolio_categories'];


if ( $portfolio_categories_array != '' && post_is_in_category_or_descendants( $portfolio_categories_array ) ) :
	
	// Test if this Post is assigned to the Portfolio category or any descendant and switch the single's template accordingly.
	include 'single-Portfolio.php';

else : // Continue with normal Loop ( Blog category ).

	get_header();

	$content_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
	if ( $udesign_options['remove_single_sidebar'] == 'yes' ) {
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
						
						get_template_part( 'template-parts/post/content' );
						
						comments_template();
						
					endwhile;
				else:
					?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'u-design' ); ?></p>
					<?php
				endif;
				
				udesign_main_content_bottom();
				?>
			</div><!-- end main-content-padding -->
		</main><!-- end main-content -->
		
		<?php
		if( ( ! $udesign_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist( 'BlogSidebar' ) ) { get_sidebar( 'BlogSidebar' ); }
		?>
		
	</div><!-- end content-container -->
	<?php
endif; // End normal Loop.
?>

<div class="clear"></div>

<?php

get_footer(); 

