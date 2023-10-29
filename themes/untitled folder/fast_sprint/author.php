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

$curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
?>

<div id="content-container" class="container_24">
	<main id="main-content" role="main" class="grid_24">
		<div class="main-content-padding">
			<?php udesign_main_content_top( is_front_page() ); ?>
			<h2 class="margin-top-3"><?php esc_html_e( 'About:', 'u-design' ); ?> <?php echo esc_html( $curauth->display_name ); ?></h2>
			<p>
				<div class="small-custom-frame-wrapper alignleft"><div class="custom-frame-inner-wrapper"><div class="custom-frame-padding"><?php echo get_avatar( $curauth->user_email, 100 ); ?></div></div></div>
				<strong><?php esc_html_e( 'Website:', 'u-design' ); ?></strong> <a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_url( $curauth->user_url ); ?></a><br />
				<strong><?php esc_html_e( 'Profile:', 'u-design' ); ?></strong> <br />
				<?php echo wp_kses_post( $curauth->user_description ); ?>
			</p>
			<div class="clear"></div>
			<h2><?php printf( esc_html__( 'Posts by %s:', 'u-design' ), $curauth->display_name ); ?></h2>
			<?php
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
					?>
					<ul class="list-11">
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php echo get_the_date(); ?> - <?php the_category(', ');?>)
						</li>
					</ul>
					<?php
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
			else:
				?>
				<p><?php esc_html_e( 'No posts by this author.', 'u-design' ); ?></p>
				<?php
			endif;
			?>
			<div class="clear"></div>
			<?php udesign_main_content_bottom(); ?>
		</div><!-- end main-content-padding -->
	</main><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


