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
$sidebar_position = ( $udesign_options['blog_sidebar'] == 'left' ) ? 'grid_8 pull_16 sidebar-box' : 'grid_8';
?>

<aside id="sidebar" class="<?php echo esc_attr( $sidebar_position ); ?>">
	<div id="sidebarSubnav">
		<?php
		udesign_sidebar_top();
		
		// Widgetized sidebar.
		if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'BlogSidebar' ) ) :
			?>
			<div class="custom-formatting">
				<h3><?php esc_html_e( 'About This Sidebar', 'u-design' ); ?></h3>
				<ul>
					<li><?php _e( "To edit this sidebar, go to admin backend's <strong><em>Appearance -> Widgets</em></strong> and place widgets into the <strong><em>BlogSidebar</em></strong> Widget Area", 'u-design' ); ?></li>
				</ul>
			</div>
			<?php
		endif;
		
		udesign_sidebar_bottom();
		?>
	</div>
</aside><!-- end sidebar -->

