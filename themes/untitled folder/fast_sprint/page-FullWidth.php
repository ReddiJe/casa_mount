<?php
/**
 * Template Name: Full-width page
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header(); ?>

<?php if ( get_theme_mod( 'udesign_include_container' ) ) : ?>
	<div id="content-container" class="container_24">
		<main id="main-content" role="main" class="grid_24">
			<div class="main-content-padding">
<?php endif; ?>
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
<?php if( get_theme_mod( 'udesign_include_container' ) ) : ?>
			</div><!-- end main-content-padding -->
		</main><!-- end main-content -->
	</div><!-- end content-container -->
<?php endif; ?>

<div class="clear"></div>

<?php

get_footer();


