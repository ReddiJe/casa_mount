<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*
	U-Design: Import Demo Data Page

*/


/**
 * Menu setup.
 * 
 */
function udesign_demo_imports_options_menu() {
	
	$udesign_demo_imports_admin_page =  add_submenu_page(
		'udesign_options_page', 
		__( 'Import Demo Data', 'u-design' ), 
		__( 'Import Demo Data', 'u-design' ), 
		who_can_edit_udesign_theme_options(), 
		'udesign_demo_import', // Page slug.
		'udesign_import_demo_data_callback'
	);
	
	// Load the required styles and scripts conditionally to this page only.
	add_action('load-'.$udesign_demo_imports_admin_page, 'load_udesign_demo_import_page_scripts');
}
add_action('admin_menu', 'udesign_demo_imports_options_menu');


/**
 * Load the required styles and scripts.
 * 
 */
function load_udesign_demo_import_page_scripts () {
	// Enque styles.
	wp_enqueue_style( 'udesign-demo-import', get_template_directory_uri() . '/assets/css/admin/u-design-demo-import-page-styles.css', false, UDESIGN_VERSION, 'screen' );
}



/**
 * Page setup.
 * 
 */
function udesign_import_demo_data_callback() {
	?>
	<div class="wrap">
		<h1><?php _e('Import Demo Data', 'u-design'); ?></h1>

		<h3 class="u-design-import-demo-page-headers"><span class="dashicons dashicons-admin-settings"></span> <?php esc_html_e('Import Wizard', 'u-design'); ?></h3>
		
		<div class="udesign-import-demo-wizard">
			<p class="about-description">
				<?php esc_html_e( 'Importing demo data such as posts, pages, images, categories, menus, theme settings, etc. would be the easiest way to setup your site.', 'u-design' ); ?>
				<?php esc_html_e( 'It will allow you to quickly edit everything instead of creating content from scratch.', 'u-design' ); ?>
			</p>

			<div class="udesign-import-demo-wizard-description">
				<p><?php esc_html_e( 'When you import the data, the following things might happen:', 'u-design' ); ?></p>
				<ol>
					<li><?php esc_html_e( 'Existing posts, pages, categories, images, custom post types or any other data will not be deleted or modified.', 'u-design' ); ?></li>
					<li><?php esc_html_e( 'Posts, pages, categories, images, widgets, menus, and U-Design theme settings will get imported.', 'u-design' ); ?></li>
					<li><?php esc_html_e( 'Plugin data for Revolution slider, Essential Grid and/or WooCommerce will only get imported if required.', 'u-design' ); ?></li>
				</ol>
			
				<div class="udesign-import-demo-wizard-warning">
					<?php 
					printf( esc_html__( 'For best results and when testing out multiple demos it is recommended importing demo data on a clean WordPress installation to prevent conflicts with existing content. You may use a plugin like %1$sWP Reset%2$s or %3$sWordPress Database Reset%4$s to reset your site if needed. Just be careful with these plugins as they will %5$serase all your data%6$s, so make sure it is what you want to do in this situation.', 'u-design' ),
						'<a target="_blank" href="https://wordpress.org/plugins/wp-reset/">',
						'</a>',
						'<a target="_blank" href="https://en-ca.wordpress.org/plugins/wordpress-database-reset/">',
						'</a>',
						'<strong>',
						'</strong>' );
					?>
				</div>

				<div class="udesign-import-demo-wizard-link">
					<?php 
					$button_demos_setup_wizard = sprintf( '<a id="button-demos-setup-wizard" class="button-primary" href="'.admin_url( 'themes.php?page=udesign-demo-import-wizard' ).'">%s</a>', esc_html__( 'Run the Wizard', 'u-design' ) );
					$udesign_demos_setup_wizard = "<p>{$button_demos_setup_wizard}</p>";
					echo wp_kses( $udesign_demos_setup_wizard, array( 'p' => array(), 'a' => array( 'id' => array(), 'class' => array(), 'href' => array(), 'target' => array() ) ) );
					?>
				</div>
			</div>
		</div>
		
		<div class="clear"> </div>
		
		<h3 class="u-design-import-demo-page-headers"><span class="dashicons dashicons-admin-settings"></span> <?php esc_html_e('Alternative Import Method', 'u-design'); ?></h3>
		
		<div class="udesign-import-demo-alternative">
			<p class="about-description">
			<?php 
			printf( esc_html__( 'This method of importing demo content involves the %1$sAll-in-One WP Migration%2$s plugin. By going with this method you will get a full replica of a demo site but it also involves more steps to follow to complete the process.', 'u-design' ),
				'<a target="_blank" href="https://wordpress.org/plugins/all-in-one-wp-migration/">',
				'</a>' );

			?>
			</p>
			<p class="about-description">
			<?php esc_html_e( 'A step-by-step guide and necessry files for this method may be accessed at the support forum.', 'u-design' ); ?>
			</p>

			<div class="udesign-import-demo-alternative-description">
				<?php 
				$button_demos_ai1wm = sprintf( '<a id="button-demos-ai1wm" class="button-secondary" target="_blank" href="https://dreamthemedesign.com/u-design-support/discussion/22852/import-instructions-for-u-design-demo-sites">%s</a>', esc_html__( 'Get started with this method', 'u-design' ) );
				$udesign_demos_import_ai1wm = "<p>{$button_demos_ai1wm}</p>";
				echo wp_kses( $udesign_demos_import_ai1wm, array( 'p' => array(), 'a' => array( 'id' => array(), 'class' => array(), 'href' => array(), 'target' => array() ) ) );
				?>
			</div>
	</div>
	<?php 
}
