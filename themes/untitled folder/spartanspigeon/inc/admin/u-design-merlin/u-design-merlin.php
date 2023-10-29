<?php
/**
 * U-Design theme setup wizard with Merlin WP.
 * 
 * "U-Design Setup Wizard" pointer:
 *	is shown:
 *		- When the theme is first installed and activated.
 *		- To all administrators that have not dismissed the pointer.
 *	is permanently dismissed:
 *		- For administrators that have dismissed it.
 *		- For all administrators - once the wizard has been run and completed. Note: he "After Import" advanced option 
 *		  needs to have been selected as it will set a flag that the wizards has completed.
 * 
 * "U-Design Setup Wizard" direct access:
 *	An administrator could run the setup wizard at any time from:
 *		- "U-Design -> Import Demo Data" menu.
 *		- "Appearance -> Import Demo Data" menu.
 * 
 * 
 * @package   U-Design
 * @author    AndonDesign
 * @license   Licensed GPLv3 for Open Source Use
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Set the location of the demo import files.
if ( ! defined('UDESIGN_DEMO_FILES_LOCATION') ) {
        define ( 'UDESIGN_DEMO_FILES_LOCATION', 'http://assets.andondesign.net/udesign-theme/demo-importer-content/' );
}
// Set the URL for the WP uploads folder (where media files are uploaded).
if ( ! defined('UDESIGN_UPLOADS_URL') ) {
	$upload_dir = wp_upload_dir();
        define ( 'UDESIGN_UPLOADS_URL', $upload_dir['baseurl'] );
}

// Load Merlins' files.
require_once get_parent_theme_file_path( '/inc/admin/u-design-merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/inc/admin/u-design-merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/inc/admin/u-design-merlin/merlin-config.php' );




/**
 * Add a submenu to the U-Design admin menu.
 * 
 */
function udesign_demo_import_admin_menu() {
	
        // Reset Merlin's 'merlin_udesign_completed' flag so the wizard can be run at any time. By default it only runs once on theme activation (for initial setup).
        delete_option( 'merlin_udesign_completed' ); // Equivalent of 'merlin_' . $this->slug . '_completed' in 'class-merlin.php'.
	
        // Grab merlin wizard's admin page from the global instance of the 'Merlin' class instantiated in 'merlin-config.php'.
        $admin_page_callback = $GLOBALS['udesign_merlin_wizard'] ? array( $GLOBALS['udesign_merlin_wizard'], 'admin_page' ) : '';
	
	/* Uncomment the following block to add a submenu to U-Design as a direct link to the wizard.
        global $submenu;
        $url = self_admin_url( 'themes.php?page=udesign-demo-import-wizard' );
        if ( current_user_can( who_can_edit_udesign_theme_options() ) ) {
		$submenu['udesign_options_page'][5] = array( esc_html__( 'Import Demo Wizard' , 'u-design' ), who_can_edit_udesign_theme_options(), esc_url( $url ), $admin_page_callback );
        }*/
	
}
add_action( 'admin_menu', 'udesign_demo_import_admin_menu' );




/**
 * Define the demo import files (remote files) using the 'merlin_import_files' filter.
 * 
 */
function merlin_import_files() {
        
	return array(
                array(
                        'import_file_name'           => 'Business Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'business/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'business/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'business/customizer.dat',
                        'import_rev_slider_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'business/sliders/vertical_fullscreen.zip',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'business/preview_image_business.png',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Business Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'https://udesigntheme.com/demos/business/',
                ),
                array(
                        'import_file_name'           => 'UStore Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'ustore/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'ustore/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'ustore/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'ustore/preview_image_ustore.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "UStore Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/ustore/',
                ),
                array(
                        'import_file_name'           => 'Healthcoach Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'healthcoach/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'healthcoach/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'healthcoach/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'healthcoach/preview_image_healthcoach.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Healthcoach Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/healthcoach/',
                ),
                array(
                        'import_file_name'           => 'Photography Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'photography/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'photography/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'photography/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'photography/preview_image_photography.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Photography Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/photography/',
                ),
                array(
                        'import_file_name'           => 'Shop Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'shop-demo/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'shop-demo/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'shop-demo/customizer.dat',
                        'import_rev_slider_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'shop-demo/sliders/teatimeslider.zip',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'shop-demo/review_image_shop_teatime.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Shop (TeaTime) Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://idesignmywebsite.com/u-design-shop/',
                ),
                array(
                        'import_file_name'           => 'Music Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'music/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'music/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'music/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'music/preview_image_photography.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Music Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/music/',
                ),
                array(
                        'import_file_name'           => 'Wedding Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'wedding/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'wedding/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'wedding/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'wedding/preview_image_wedding.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Wedding Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/ubuild/',
                ),
                array(
                        'import_file_name'           => 'UBuild Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'ubuild/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'ubuild/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'ubuild/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'ubuild/preview_image_ubuild.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "UBuild Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/ubuild/',
                ),
                array(
                        'import_file_name'           => 'UFit Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'ufit/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'ufit/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'ufit/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'ufit/preview_image_ufit.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "UFit Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/ufit/',
                ),
                array(
                        'import_file_name'           => 'Yoga Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'yoga/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'yoga/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'yoga/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'yoga/preview_image_yoga.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Yoga Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/yoga/',
                ),
                array(
                        'import_file_name'           => 'USpa Demo',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'uspa/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'uspa/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'uspa/customizer.dat',
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'uspa/preview_image_uspa.jpg',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "USpa Demo"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'http://udesigntheme.com/demos/spa/',
                ),
                array(
                        'import_file_name'           => 'Main Demo 2017',
                        'import_file_url'            => UDESIGN_DEMO_FILES_LOCATION . 'main-demo-2017/demo-content.xml',
                        'import_widget_file_url'     => UDESIGN_DEMO_FILES_LOCATION . 'main-demo-2017/widgets.wie',
                        'import_customizer_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'main-demo-2017/customizer.dat',
                        'import_rev_slider_file_url' => UDESIGN_DEMO_FILES_LOCATION . 'main-demo-2017/sliders/slider1.zip', // Additional sliders are imported in the after import step below.
                        'import_preview_image_url'   => UDESIGN_DEMO_FILES_LOCATION . 'main-demo-2017/preview_image_main_demo_2017.png',
                        'import_notice'              => __( 'You are about the import the U-Design theme\'s "Main Demo 2017"! Would you like to continue?', 'u-design' ),
                        'preview_url'                => 'https://dreamthemedesign.com/themes/u-design/',
                ),
	    
	);
	
}
add_filter( 'merlin_import_files', 'merlin_import_files' );




/**
 * Do post import setup.
 * Example: Assign "Front page", "Posts page" and menu locations after the importer is done.
 * 
 */
function udesign_merlin_after_import_setup( $selected_import_index ) {
        
        // Grab the selected import file.
        $selected_import_file = $GLOBALS['udesign_merlin_wizard']->import_files[ $selected_import_index ];
        
        // Log file notice:
        Merlin_Logger::get_instance()->info( '===============================( AFTER IMPORT SETUP BEGIN )===============================' );
        
        global $udesign_options;
        $main_menu = $top_menu = $front_page_title = '';

	switch ( $selected_import_file['import_file_name'] ) {
		
		case 'Business Demo':
			
			$demo_slug = 'business';

			Merlin_Logger::get_instance()->info( 'The import for "Business Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Business Main Menu';
			// The name of the secondary menu.
			$top_menu = 'Business Secondary Menu';

			// What page should be set as front page.
			$front_page_title = 'Business Home';

			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Update the "Blog pages show at most X posts" option.
			update_option( 'posts_per_page', 3 );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );
			
			// Update URLs (site wide).
			udesign_importer_update_urls( $demo_slug );
		    
			break;
			
		
		case 'UStore Demo':
		
			$demo_slug = 'ustore';

			Merlin_Logger::get_instance()->info( 'The import for "UStore Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'UStore Main Menu';
			// The name of the secondary menu.
			$top_menu = 'UStore Secondary menu';

			// What page should be set as front page.
			$front_page_title = 'UStore Home';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Update the "Blog pages show at most X posts" option.
			update_option( 'posts_per_page', 3 );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'off' );
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// WooCommerce pages assignments: 'Shop', 'Cart', 'Checkout' and 'My Account' pages. The user can later modify these from the WooCommerce settings.
			update_option( 'woocommerce_shop_page_id', get_page_id_by_slug( $demo_slug . '-shop' ) );
			update_option( 'woocommerce_cart_page_id', get_page_id_by_slug( $demo_slug . '-cart' ) );
			update_option( 'woocommerce_checkout_page_id', get_page_id_by_slug( $demo_slug . '-checkout' ) );
			update_option( 'woocommerce_myaccount_page_id', get_page_id_by_slug( $demo_slug . '-my-account' ) );
			// Flush rules, otherwise the products may not display in the "Shop" page. Another option is to manually save the WC Settings.
			update_option( 'woocommerce_queue_flush_rewrite_rules', 'yes' );
			Merlin_Logger::get_instance()->info( 'WooCommerce pages assignment finished.' );

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );
			
			break;
		
		
		case 'Healthcoach Demo':
			
			$demo_slug = 'healthcoach';

			Merlin_Logger::get_instance()->info( 'The import for "Healthcoach Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Healthcoach Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'Healthcoach Home';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'off' );
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Photography Demo':
			
			$demo_slug = 'photography';

			Merlin_Logger::get_instance()->info( 'The import for "Photography Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Photography Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'PHOTOGRAPHY HOME';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'on' ); // 'on' for GLOBAL STYLES to be imported as well.
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Shop Demo':
			
			$demo_slug = 'shop-demo';

			Merlin_Logger::get_instance()->info( 'The import for "Shop Demo" begins!' );
			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location
			$main_menu = 'Shop Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = ''; // Front page is not a static page but widgetized.

			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// WooCommerce pages assignments: 'Shop', 'Cart', 'Checkout' and 'My Account' pages. The user can later modify these from the WooCommerce settings.
			update_option( 'woocommerce_shop_page_id', get_page_id_by_slug( $demo_slug . '-shop' ) );
			update_option( 'woocommerce_cart_page_id', get_page_id_by_slug( $demo_slug . '-cart' ) );
			update_option( 'woocommerce_checkout_page_id', get_page_id_by_slug( $demo_slug . '-checkout' ) );
			update_option( 'woocommerce_myaccount_page_id', get_page_id_by_slug( $demo_slug . '-my-account' ) );
			// Flush rules, otherwise the products may not display in the "Shop" page. Another option is to manually save the WC Settings.
			update_option( 'woocommerce_queue_flush_rewrite_rules', 'yes' );
			Merlin_Logger::get_instance()->info( 'WooCommerce pages assignment finished.' );

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Music Demo':

			$demo_slug = 'music';

			Merlin_Logger::get_instance()->info( 'The import for "Music Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Music Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'Music Home';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'on' ); // 'on' for GLOBAL STYLES to be imported as well.
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Wedding Demo':
			
			$demo_slug = 'wedding';

			Merlin_Logger::get_instance()->info( 'The import for "Wedding Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Wedding Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'Wedding Home';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'UBuild Demo':

			$demo_slug = 'ubuild';

			Merlin_Logger::get_instance()->info( 'The import for "UBuild Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'UBuild Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'UBUILD HOME';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'off' );
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'UFit Demo':

			$demo_slug = 'ufit';

			Merlin_Logger::get_instance()->info( 'The import for "UFit Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'UFit Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'UFIT HOME';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Yoga Demo':

			$demo_slug = 'yoga';

			Merlin_Logger::get_instance()->info( 'The import for "Yoga Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Yoga Main Menu';
			// The name of the secondary menu.
			$top_menu = ''; // Currently there is no secondary menu in this demo.

			// What page should be set as front page.
			$front_page_title = 'Yoga Home';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'off' );
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'USpa Demo':

			$demo_slug = 'uspa';

			Merlin_Logger::get_instance()->info( 'The import for "USpa Demo" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'USpa Main Menu';
			// The name of the secondary menu.
			$top_menu = 'USpa Secondary menu';

			// What page should be set as front page.
			$front_page_title = 'USPA HOME';
			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Update the "Blog pages show at most X posts" option.
			update_option( 'posts_per_page', 5 );

			// Disable Gutenberg Editor for WPBakery Page Builder.
			update_option( 'wpb_js_gutenberg_disable', true );

			// Try to import EG's grids and skins.
			if ( class_exists( 'Essential_Grid_Import' ) ) {
				$eg_import_results = udesign_eg_import_data( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/ess_grid.json', 'off' );
				// Check for errors, else write the results to the log file.
				if ( is_wp_error( $eg_import_results ) ) {
					Merlin_Logger::get_instance()->error( $eg_import_results->get_error_message() );
				} else {
					Merlin_Logger::get_instance()->info( 'Essential Grid data have been imported successfully.' );
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			break;
		
		
		case 'Main Demo 2017':
			
			$demo_slug = 'main-demo-2017';

			Merlin_Logger::get_instance()->info( 'The import for "Main Demo 2017" begins!' );

			// Try to import theme settings.
			$results = udesign_options_import( UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/u-design-theme-options.dat' );
			// Check for errors, else write the results to the log file.
			if ( is_wp_error( $results ) ) {
				Merlin_Logger::get_instance()->error( $results->get_error_message() );
			} else {
				Merlin_Logger::get_instance()->info( 'The U-Design Options have been imported successfully.' );
			}

			// The name of the main menu to assign for the 'primary' location.
			$main_menu = 'Main Menu';
			// The name of the secondary menu.
			$top_menu = 'Top Menu';

			// What page should be set as front page.
			$front_page_title = 'Main Demo 2017 Home';

			// Update the slogan/tagline.
			update_option( 'blogdescription', ''  );

			// Update the "Blog pages show at most X posts" option.
			update_option( 'posts_per_page', 3 );

			/**
			 * Import Revolution Slider
			 * 
			 * Because at this time the Merlin script can only import a single Rev. slider, the first slider is imported 
			 * in the 'merlin_import_files()' function above in the Merlin's main import array. The rest of sliders will have to be imported here.
			 * 
			 */
			if ( class_exists( 'RevSlider' ) ) {
				//$remote_sliders_array['slider1'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/slider1.zip'; // Imported in 'merlin_import_files()' function above
				$remote_sliders_array['slider2'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/slider2.zip';
				$remote_sliders_array['Features'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/Features.zip';
				$remote_sliders_array['demopage2'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/demopage2.zip';
				$remote_sliders_array['demopage3'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/demopage3.zip';
				$remote_sliders_array['AboutUs'] = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/sliders/AboutUs.zip';

				// Initiate Revolution slider(s) import.
				if( class_exists('RevSliderAdmin') ) {
					// Try to download Revolution sliders from remote location, save them locally and then return an array of the local sliders' paths.
					$local_sliders_array = udesign_merlin_download_revslider_locally( $remote_sliders_array );
					// Check for errors, else write the results to the log file.
					if ( is_wp_error( $local_sliders_array ) ) {
						Merlin_Logger::get_instance()->error( $local_sliders_array->get_error_message() );
					} else {
						Merlin_Logger::get_instance()->info( 'Revolution Slider were downloaded successfully.' );
					}

					$slider = new RevSlider();
					foreach( $local_sliders_array as $filepath ){
						$slider->importSliderFromPost( true, true, $filepath );
						Merlin_Logger::get_instance()->info( 'Revolution Slider import finished.', array( 'slider: ' => $filepath ) );
					}
				}
			}

			// Update URLs.
			udesign_importer_update_urls( $demo_slug );

			// Fix Portfolio section pages/categories associations.
			udesign_portfolio_import_fix( $demo_slug );
		    
			break;
		
	}
	
	
        // Assign the main menu to its location.
        $main_menu_obj = get_term_by( 'name', $main_menu, 'nav_menu' );
        if( $main_menu_obj ){
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu_obj->term_id,
			)
		);
		Merlin_Logger::get_instance()->info( 'Main menu assignment finished.' );
        }
        
        // Update the secondary menu ID in the theme's options.
        $top_menu_obj = get_term_by( 'name', $top_menu, 'nav_menu' );
        if( $top_menu_obj ){
		$udesign_options['secondary_menu_term_id'] = $top_menu_obj->term_id;
		update_option( 'udesign_options', $udesign_options );
		Merlin_Logger::get_instance()->info( 'Updated the secondary menu ID in the theme\'s options.' );
        }

        // Assign front page.
	if ( $front_page_title ) {
		$front_page_id = get_page_by_title( $front_page_title );
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		Merlin_Logger::get_instance()->info( 'Front page assignment finished.', array( 'Homepage' => $front_page_title ) );
	} else { // Set homepage as "Your latest posts" or widgetized.
		update_option( 'show_on_front', 'posts' );
		update_option( 'page_on_front', 0 );
		Merlin_Logger::get_instance()->info( 'Front page assigned as "Your latest posts" (widgetized) finished.' );
	}
        
        // Set 'udesign_setup_wizard_completed' flag that the theme's setup wizard has been run.
	update_option( 'udesign_setup_wizard_completed', time() );
	
        // Log file notice:
        Merlin_Logger::get_instance()->info( '================================( AFTER IMPORT SETUP END )================================' );
}
add_action( 'merlin_after_all_import', 'udesign_merlin_after_import_setup' );


/**
 * Remove widgets from sidebars just before widget import starts.
 * 
 */
function udesign_before_widgets_import() {
        update_option( 'sidebars_widgets', array() );
        Merlin_Logger::get_instance()->info( 'Widgets removed from sidebars just before widget import starts.' );
}
add_action( 'merlin_widget_importer_before_widgets_import', 'udesign_before_widgets_import' );


/**
 * Widgets about to be imported might contain media links in their content like 
 * images for example that still point to the source site. This function finds 
 * these URLs and replaces them to point to the current site URL.
 * 
 * @global type $udesign_options
 * @param type $widget
 * @return type
 */
function udesign_filter_widget_data_before_import( $widget ) {

	$site_url = esc_url_raw( site_url() );
	
	// Find any URL(s) in the widgets using a regular expression filter.
	$regex_url = '/(https?)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}([^\'" >]+)/';
	
	// Convert the widget array to a string.
	$widget_as_string = implode( ' ', $widget );

	// Check if there are any URLs in the widgets.
	if( preg_match_all( $regex_url, $widget_as_string, $urls ) ) {
		
		$count = 0; // Counter for replaced URLs.
		
		/*
		 * If any URLs are found that contain '/wp-content' then return the substring before, 
		 * which is basically the URL of the source site that needs to be replaced.
		 */
		foreach ( (array) $urls[0] as $url ) {
			
			$replace_url = strstr( $url, '/wp-content', true );
			
			if ( $replace_url ) {
				
				// Replace source site URL that needs to be replaced.
				$widget = str_replace( $replace_url, $site_url, $widget, $count );
				
				break; // Exit the foreach.
			}
			
		}
		
		// Do some logs.
		Merlin_Logger::get_instance()->info( 'Updated ' . $count . ' URL(s) in widget by replacing old URLs with the new.', (array) $widget );
	}
	
	return $widget;
	
}
add_filter( 'merlin_widget_settings_array', 'udesign_filter_widget_data_before_import' ); // 'wie_widget_settings_array' would be the equivalent filter in 'Widget Importer & Exporter' plugin.




/**
 * Download Revolution sliders' import files from remote location, save them locally and then return an array of the local paths to them.
 * This function is using some of Merlins' "Download" functions.
 * 
 * @param array $remote_sliders_array An array in the format: array( 'revslider_filename' => 'revslider_import_file_url' )
 * @return array An array of file paths
 */
function udesign_merlin_download_revslider_locally( $remote_sliders_array ) {
    $local_sliders_array = array();
    $downloader = new Merlin_Downloader();

    foreach ( (array) $remote_sliders_array as $revslider_filename => $revslider_import_file_url ) {

            // Set the filename string for revslider import file.
            $revslider_filename = 'demo-'. $revslider_filename .'-import-file_' . date( 'Y-m-d__H-i-s' ) . '.zip';

            // Retrieve the content import file.
            $downloaded_revslider_filepath = $downloader->fetch_existing_file( $revslider_filename );

            // Download the file, if it's missing.
            if ( empty( $downloaded_revslider_filepath ) ) {
                    $downloaded_revslider_filepath = $downloader->download_file( $revslider_import_file_url, $revslider_filename );
            }
                        
            // Return from this function if there was an error.
            if ( is_wp_error( $downloaded_revslider_filepath ) ) {
                    return $downloaded_revslider_filepath;
            }
            $local_sliders_array[$revslider_filename] = $downloaded_revslider_filepath;
    }
    
    return $local_sliders_array;
}




/**
 * Import U-Design theme settings.
 * 
 */
function udesign_options_import( $url ) {
    
        // Test if the URL to the file is defined.
        if ( empty( $url ) ) {
                return new WP_Error(
                        'missing_url',
                        __( 'Missing URL for downloading a file!', 'u-design' )
                );
        }

        // Get file content from the server.
        $response = wp_remote_get(
                $url,
                array( 'timeout' => 10 )
        );

        // Test if the get request was not successful.
        if ( is_wp_error( $response ) || 200 !== $response['response']['code'] ) {
                // Collect the right format of error data (array or WP_Error).
                $response_error = $this->get_error_from_response( $response );

                return new WP_Error(
                        'download_error',
                        sprintf(
                                __( 'An error occurred while fetching file from: %1$s%2$s%3$s!%4$sReason: %5$s - %6$s.', 'u-design' ),
                                '<strong>',
                                $url,
                                '</strong>',
                                '<br />',
                                $response_error['error_code'],
                                $response_error['error_message']
                        )
                );
        }

        // Return content retrieved from the URL.
        $theme_options = wp_remote_retrieve_body( $response );

        if ( $theme_options ) {
            $theme_options = maybe_unserialize( $theme_options );
            
		if ( $theme_options ) {
			foreach ($theme_options as $option) {
				$imported_option_name = $option->option_name;
				$imported_option_value = maybe_unserialize($option->option_value);

				if ( $imported_option_name === 'udesign_options' ) { // U-Design Settings page options need special care
					global $udesign_options;
					foreach( $imported_option_value as $name => $value ) {
						$udesign_options[$name] = $value;
					}

					// Update all references of the source site URL in the theme's imported settings with this site's URL (eg. logos, background images, etc.).
					$site_url = esc_url_raw( site_url() );
					// Get the source site URL that needs to be replaced.
					$old_url = explode( '/wp-content', $udesign_options['site_url'] );
					// Store the old (source) site URL in the database for later use. We are going to need it, for example, to update all links still pointing to the old site in the content.
					update_option( 'udesign_old_site_url', esc_url_raw( $old_url[0] ) );
					
					$udesign_options['site_url'] = str_replace( $old_url, $site_url, $udesign_options['site_url'] ); // Time to update the $udesign_options['site_url'] with the new site URL.
					$udesign_options['custom_logo_img'] = str_replace( $old_url, $site_url, $udesign_options['custom_logo_img'] );
					$udesign_options['page_peel_url'] = str_replace( $old_url, $site_url, $udesign_options['page_peel_url'] );
					$udesign_options['feedback_url'] = str_replace( $old_url, $site_url, $udesign_options['feedback_url'] );
					$udesign_options['fixed_menu_logo'] = str_replace( $old_url, $site_url, $udesign_options['fixed_menu_logo'] );
					$udesign_options['responsive_logo_img'] = str_replace( $old_url, $site_url, $udesign_options['responsive_logo_img'] );
					$udesign_options['secondary_menu_text_area_1'] = str_replace( $old_url, $site_url, $udesign_options['secondary_menu_text_area_1'] );
					$udesign_options['secondary_menu_text_area_2'] = str_replace( $old_url, $site_url, $udesign_options['secondary_menu_text_area_2'] );
					$udesign_options['custom_styles'] = str_replace( $old_url, $site_url, $udesign_options['custom_styles'] );
					$udesign_options['top_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['top_bg_img'] );
					$udesign_options['header_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['header_bg_img'] );
					$udesign_options['home_page_before_content_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['home_page_before_content_bg_img'] );
					$udesign_options['page_title_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['page_title_bg_img'] );
					$udesign_options['main_content_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['main_content_bg_img'] );
					$udesign_options['bottom_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['bottom_bg_img'] );
					$udesign_options['footer_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['footer_bg_img'] );
					$udesign_options['one_continuous_bg_img'] = str_replace( $old_url, $site_url, $udesign_options['one_continuous_bg_img'] );
					$udesign_options['data_collection_message'] = str_replace( $old_url, $site_url, $udesign_options['data_collection_message'] );
					$udesign_options['contact_consent_text'] = str_replace( $old_url, $site_url, $udesign_options['contact_consent_text'] );
					$udesign_options['email_receipients'] = get_option( 'admin_email' ); // Set contact email to the current site admin user.
					$udesign_options['copyright_message'] = str_replace( $old_url, $site_url, $udesign_options['copyright_message'] );
					$udesign_options['c1_slide_img_url_1'] = str_replace( $old_url, $site_url, $udesign_options['c1_slide_img_url_1'] );
					$udesign_options['c2_slide_img_url_1'] = str_replace( $old_url, $site_url, $udesign_options['c2_slide_img_url_1'] );
					$udesign_options['c3_slide_img_url_1'] = str_replace( $old_url, $site_url, $udesign_options['c3_slide_img_url_1'] );
					$udesign_options['c3_slide_img2_url_1'] = str_replace( $old_url, $site_url, $udesign_options['c3_slide_img2_url_1'] );
					
					
					// Update the options.
					update_option( $imported_option_name, $udesign_options );

					// require_once(ABSPATH . 'wp-admin/includes/file.php'); // uncomment this if you need to include the WP_Filesystem directly
					// Change the datestamp for custom_style.css so it can be updated with the new styles from the DB
					$access_type = get_filesystem_method();
					if ( $access_type === 'direct' ) {
						$creds = request_filesystem_credentials( esc_url_raw( site_url() ) . '/wp-admin/', '', false, false, array() );
						/* initialize the API */
						if ( ! WP_Filesystem( $creds ) ) { return false; }
						global $wp_filesystem;
						$custom_style_css_file = get_template_directory(). '/assets/css/frontend/global/custom_style.css';
						$wp_filesystem->touch( $custom_style_css_file );
					}
				} else {
					// Update other options.
					update_option( $imported_option_name, $imported_option_value );
				}
			}
		} else {
			// No options.
			return new WP_Error(
				'missing_url',
				__( "uDesign Error: There are no options to import.", 'u-design')
			);
		}

        }

}




/**
 * Import EG grids programmatically using a json file (default EG export file).
 * 
 * Part of the following function's code was taken from "essential-grid/admin/essential-grid-admin.class.php" (look for case 'import_data'), 
 * which is part of EG's manual import functionality. Currently, the EG plugin does't offer a way to programmatically import grids/skins.
 * The below function is my solution to that so EG grids/skins will be imported along theme demo imports.
 * 
 * @param string $url The URL to the json import file.
 * @param string $import_global_styles This variable simulates the checkbox option for the GLOBAL STYLES, of course if set to 'on' the GLOBAL STYLES option needs to had been checked off when generating the export file.
 * @return mixed WP_Error on failure, void on success.
 */
function udesign_eg_import_data( $url, $import_global_styles = 'off' ) {
    
        // Test if the URL to the file is defined.
        if ( empty( $url ) ) {
		return new WP_Error(
			'missing_url',
			__( 'Missing URL for downloading a file!', 'u-design' )
		);
        }

        // Get file content from the server.
        $response = wp_remote_get(
		$url,
		array( 'timeout' => 10 )
        );

        // Test if the get request was not successful.
        if ( is_wp_error( $response ) || 200 !== $response['response']['code'] ) {
		// Collect the right format of error data (array or WP_Error).
		$response_error = $this->get_error_from_response( $response );

		return new WP_Error(
			'download_error',
			sprintf(
				__( 'An error occurred while fetching file from: %1$s%2$s%3$s!%4$sReason: %5$s - %6$s.', 'u-design' ),
				'<strong>',
				$url,
				'</strong>',
				'<br />',
				$response_error['error_code'],
				$response_error['error_message']
			)
		);
        }

        // Return content retrieved from the URL.
        $eg_import_data = wp_remote_retrieve_body( $response );

        if ( $eg_import_data ) {

		$data['imports'] = json_decode( $eg_import_data, true );

		if( !isset( $data['imports'] ) || empty($data['imports'] ) ){
			exit();
		}
		try {
			$im = new Essential_Grid_Import();

			$temp_d = @$data['imports'];

			unset($temp_d['grids']);
			unset($temp_d['skins']);
			unset($temp_d['elements']);
			unset($temp_d['navigation-skins']);
			unset($temp_d['global-css']);

			$im->set_overwrite_data($temp_d); //set overwrite data global to class
			
			/**
			 * This filter allows to overwrite the existing EG data rather then append imported data.
			 * This means the imported grids, skins, global styles, etc. will overwrite existing 
			 * with the same name grids, skins, global styles, etc.
			 * 
			 * @param string $val The value to set: default "append" or "overwrite".
			 * @return string
			 */
			function udesign_eg_overwrite_data( $val ) {
				$val = 'overwrite';
				return $val;
			}
			add_filter( 'essgrid_getVar', 'udesign_eg_overwrite_data' );
			
			
			// Skins.
			$skins = @$data['imports']['skins'];
			if(!empty($skins) && is_array($skins)){
				// Get an array of the skins' IDs to be imported.
				$skins_ids = array();
				foreach ($skins as $value) {
					$skins_ids[] = $value['id'];
				}
				$skins_imported = $im->import_skins($skins, $skins_ids);
				Merlin_Logger::get_instance()->info( 'Essential Grid SKINS have been imported successfully.' );
			}

			// Navigation Skins.
			$navigation_skins = @$data['imports']['navigation-skins'];
			if(!empty($navigation_skins) && is_array($navigation_skins)){
				// Get an array of the navigation skins' IDs to be imported.
				$navigation_skins_ids = array();
				foreach ($navigation_skins as $value) {
					$navigation_skins_ids[] = $value['id'];
				}
				$navigation_skins_imported = $im->import_navigation_skins(@$navigation_skins, $navigation_skins_ids);
				Merlin_Logger::get_instance()->info( 'Essential Grid NAVIGATION SKINS have been imported successfully.' );
			}

			// Grids.
			$grids = @$data['imports']['grids'];
			if(!empty($grids) && is_array($grids)){
				// Get an array of the grids' IDs to be imported.
				$grids_ids = array();
				foreach ($grids as $value) {
					$grids_ids[] = $value['id'];
				}
				$grids_imported = $im->import_grids($grids, $grids_ids);
				Merlin_Logger::get_instance()->info( 'Essential Grid GRIDS have been imported successfully.' );
			}

			// Elements.
			$elements = @$data['imports']['elements'];
			if(!empty($elements) && is_array($elements)){
				// Get an array of the elements' IDs to be imported.
				$elements_ids = array();
				foreach ($elements as $value) {
					$elements_ids[] = $value['id'];
				}
				$elements_imported = $im->import_elements(@$elements, $elements_ids);
				Merlin_Logger::get_instance()->info( 'Essential Grid ELEMENTS have been imported successfully.' );
			}

			// Custom meta.
			$custom_metas = @$data['imports']['custom-meta'];
			if(!empty($custom_metas) && is_array($custom_metas)){
				$custom_metas_handle = true; // Set to true to import all.
				$custom_metas_imported = $im->import_custom_meta($custom_metas, $custom_metas_handle);
				Merlin_Logger::get_instance()->info( 'Essential Grid CUSTOM META have been imported successfully.' );
			}

			// Punch fonts.
			$custom_fonts = @$data['imports']['punch-fonts'];
			if(!empty($custom_fonts) && is_array($custom_fonts)){
				$custom_fonts_handle = true; // Set to true to import all.
				$custom_fonts_imported = $im->import_punch_fonts($custom_fonts, $custom_fonts_handle);
				Merlin_Logger::get_instance()->info( 'Essential Grid PUNCH FONTS have been imported successfully.' );
			}

			// Global styles.
			if( $import_global_styles == 'on' ){
				$global_css = @$data['imports']['global-css'];
				$global_styles_imported = $im->import_global_styles($global_css);
				Merlin_Logger::get_instance()->info( 'Essential Grid GLOBAL STYLES have been imported successfully.' );
			}
			
		} catch( Exception $d ){
			echo $d->getMessage();
		}

        }

}


/**
 * Get a page's ID from it's slug
 *
 * @param string $slug Page slug to search on
 * @return null Empty on error
 * @return int Page ID
 */
function get_page_id_by_slug( $slug ) {
	
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return (int) $page->ID;
	} else {
		return null;
	}
	
}


/**
 * Content template for the child theme "functions.php" file.
 *
 */
function udesign_generate_child_functions_php() {

        $output = "<?php
/**
 * Theme functions and definitions.
 *
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Right-to-left (RTL) Support.
 * Determines whether the current locale is right-to-left (RTL).
 * If yes then load the parent rtl.css file.
 * 
 */
function udesign_child_theme_styles() {
	// Load the rtl.css stylesheet.
	if ( is_rtl() ) {
		wp_enqueue_style( 'u-design-rtl', trailingslashit( get_template_directory_uri() ) . 'rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'udesign_child_theme_styles', 99 );

/***************** BEGIN ADDING YOUR CODE BELOW: *****************/
\n
";

        return $output;
}
add_filter( 'merlin_generate_child_functions_php', 'udesign_generate_child_functions_php' );


/**
 * Content template for the child theme "style.css" file.
 *
 * @param string $slug    The name of the parent theme directory.
 * @param string $parent  Parent theme name.
 * @param string $version Parent theme version.
 */
function udesign_generate_child_style_css( $slug, $parent, $version ) {
        
	$parent = 'U-Design';
	$slug = 'u-design';
	$version = '1.0.0';
        
        $output = "
		/**
		 * Theme Name: {$parent} Child
		 * Theme URI: https://udesigntheme.com/envato-market/
		 * Description: This is a child theme of {$parent}.
		 * Author: Andon
		 * Author URI: https://1.envato.market/OdObz
		 * Template: {$slug}
		 * Version: {$version}
		 */

		/** 
		 * IMPORTANT: By default this file is not loaded since it has no CSS preloaded. Loading it blank
		 * will result in a CSS file needlessly being loaded. This will usually not affect the site appearance, 
		 * but it's inefficient and extends your page's loading time.
		 * 
		 * If you decide to use this file make sure to enable it from the theme's 'General Options' section first, 
		 * it's the last checkbox called 'Custom Styles'.
		 */
                 
		/*********** ADD YOUR CUSTOM CSS CODE BELOW THIS LINE: ***********/
		\n
        ";

        // Let's remove the tabs so that it displays nicely.
        $output = trim( preg_replace( '/\t+/', '', $output ) );

        return $output;
}

add_filter( 'merlin_generate_child_style_css', 'udesign_generate_child_style_css', 10, 3 );


/**
 * Generate child theme screenshot file.
 *
 */
function udesign_generate_child_screenshot() {
    
        $screenshot = trailingslashit( get_template_directory() ) . 'inc/admin/u-design-merlin/child-theme-screenshot/screenshot.png';
        return $screenshot;
        
}
add_filter( 'merlin_generate_child_screenshot', 'udesign_generate_child_screenshot' );



/**
 * Disable Merlin's default redirection on theme switch.
 */
if ( isset( $GLOBALS['udesign_merlin_wizard'] ) ) {
        remove_action( 'after_switch_theme', array( $GLOBALS['udesign_merlin_wizard'], 'switch_theme' ) );
}


/**
 * Adds a simple WordPress pointer to "U-Design Theme" top admin bar.
 * 
 */
function udesign_enqueue_pointer_script( $hook_suffix ) {
	
	// Assume pointer shouldn't be shown.
	$enqueue_pointer_script_style = false;

	// Get array list of dismissed pointers for current user and convert it to array.
	$dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

	// Check whether the setup wizard has been run before and if our pointer is not among dismissed ones.
	if( ! get_option( 'udesign_setup_wizard_completed' ) && ! in_array( 'udesign_settup_pointer', $dismissed_pointers ) ) {
		$enqueue_pointer_script_style = true;
		
		// Add footer scripts using callback function.
		add_action( 'admin_print_footer_scripts', 'udesign_pointer_print_scripts' );
	}

	// Enqueue pointer CSS and JS files, if needed.
	if( $enqueue_pointer_script_style ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	}
	
}
add_action( 'admin_enqueue_scripts', 'udesign_enqueue_pointer_script' );



/**
 * Callback function to add footer scripts for the U-Design setup wizard pointer.
 * 
 */
function udesign_pointer_print_scripts() {

	$pointer_content  = '<h3>' . __( 'Welcome to U-Design', 'u-design' ) . '</h3>';
	$pointer_content .= '<p>' . __( 'Would you like some help setting up your site with the U-Design theme?', 'u-design' ) . '</p>';
	$button_demos_wizard = wp_kses( sprintf( '<a id="pointer-udesign-demos-wizard" class="button-primary" href="'.admin_url( 'themes.php?page=udesign-demo-import-wizard' ).'">%s</a>', esc_html__( 'Start Setup Wizard', 'u-design' ) ), array( 'a' => array( 'id' => array(), 'class' => array(), 'href' => array(), 'target' => array() ) ) );
	//$button_udesign_settings = wp_kses( sprintf( '<a id="pointer-udesign-settings" class="button-secondary" href="'.admin_url( 'admin.php?page=udesign_options_page' ).'">%s</a>', esc_html__( 'Start Customizing', 'u-design' ) ), array( 'a' => array( 'id' => array(), 'class' => array(), 'href' => array(), 'target' => array() ) ) );
	//$pointer_content .= "<p>{$button_udesign_settings} &nbsp; {$button_demos_wizard}</p>";
	$pointer_content .= "<p>{$button_demos_wizard}</p>";
	?>
	
	<script type="text/javascript">
	//<![CDATA[
	(function($) {
		"use strict";
		$('#wp-admin-bar-u-design-settings-page').pointer({
			content:	'<?php echo $pointer_content; ?>',
			position:	{
						edge:	'top', // arrow direction (top, bottom, left, right)
						align:	'left' // vertical alignment (top, bottom, left, right, middle)
					},
			pointerWidth:	350,
			close:	function() {
					$.post( ajaxurl, {
						pointer: 'udesign_settup_pointer', // pointer ID
						action: 'dismiss-wp-pointer'
					});
				}
		}).pointer('open');
	})(jQuery);
	//]]>
	</script>
	<?php
}


/**
 * Show a simple WordPress pointer, for theme setup options, on theme switch.
 * 
 */
function udesign_call_pointer_on_switch_theme() {
	// Only admins can see and run the theme's setup wizard (capability: 'manage_options').
	if ( who_can_edit_udesign_theme_options() ) {
		// Get the dismissed pointer for the current user as an array.
		$dismissed_pointers_arr = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
		$udesign_settup_pointer_arr = array( 'udesign_settup_pointer' );
		// If our pointer is among dismissed ones, remove it from that list so it can be shown again.
		if ( in_array( 'udesign_settup_pointer', $dismissed_pointers_arr ) ) {
			$updated_dismissed_pointers = implode( ',', array_diff( $dismissed_pointers_arr, $udesign_settup_pointer_arr ) );
			update_user_meta( get_current_user_id(), 'dismissed_wp_pointers', $updated_dismissed_pointers );
		}
	}
}
add_action( 'after_switch_theme', 'udesign_call_pointer_on_switch_theme' );




/**
 * This function will update URLs embedded in content, excerpts, attachments, and custom fields by replacing old URLs with new URLs.
 * It first addresses media URLs then site URL.
 * 
 * @param string $demo_slug
 */
function udesign_importer_update_urls( $demo_slug ){
	
	/* Update URLs for media files like images found anywhere in the content. */
	$old_media_url = UDESIGN_DEMO_FILES_LOCATION . $demo_slug . '/media-files';
	$new_media_url = UDESIGN_UPLOADS_URL;
	$update_media_urls_results = udesign_update_urls( $old_media_url, $new_media_url );
	// Check for errors, else write the results to the log file.
	if ( is_wp_error( $update_media_urls_results ) ) {
		Merlin_Logger::get_instance()->error( $update_media_urls_results->get_error_message() );
	} else {
		Merlin_Logger::get_instance()->info( 'Media URLs have been updated successfully.', $update_media_urls_results );
	}
	
	/* Update old site URLs found anywhere in the content. */
	if ( get_option( 'udesign_old_site_url' ) ) {
		$old_url = get_option( 'udesign_old_site_url' );
		$new_url = esc_url_raw( site_url() );
		$update_urls_results = udesign_update_urls( $old_url, $new_url );
		// Check for errors, else write the results to the log file.
		if ( is_wp_error( $update_urls_results ) ) {
			Merlin_Logger::get_instance()->error( $update_urls_results->get_error_message() );
		} else {
			Merlin_Logger::get_instance()->info( 'Site URLs have been updated successfully.', $update_urls_results );
			// At this opoint the old site's URL can be removed.
			delete_option( 'udesign_old_site_url' );
		}
	} else {
		Merlin_Logger::get_instance()->error( 'Old site URL not found!' );
	}
}




/**
 * Update URLs embedded in content, excerpts, attachments, and custom fields by replacing old URLs with new URLs.
 * Code is mostly from the "Velvet Blues Update URLs" plugin.
 *
 * @link https://en-ca.wordpress.org/plugins/velvet-blues-update-urls/
 * 
 * @global type $wpdb WordPress database object.
 * @param string $oldurl The URL to be replaced.
 * @param string $newurl The URL to replace the old URL with.
 * @return mixed Results array on success, otherwise and error object.
 */
function udesign_update_urls( $oldurl, $newurl ){
	
	global $wpdb;
	$results = array();
	
	$options = array ( 
		'content',	// URLs in page content (posts, pages, custom post types, revisions).
		'excerpts',	// URLs in excerpts.
		'attachments',	// URLs for attachments (images, documents, general media).
		'links',	// URLs in links.
		'custom',	// URLs in custom fields and meta boxes.
	);
	
	$queries = array(
		'content'	=>	array( "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)", __( 'Content Items (Posts, Pages, Custom Post Types, Revisions)','u-design' ) ),
		'excerpts'	=>	array("UPDATE $wpdb->posts SET post_excerpt = replace(post_excerpt, %s, %s)", __('Excerpts','u-design') ),
		'attachments'	=>	array("UPDATE $wpdb->posts SET guid = replace(guid, %s, %s) WHERE post_type = 'attachment'",  __( 'Attachments','u-design' ) ),
		'links'		=>	array("UPDATE $wpdb->links SET link_url = replace(link_url, %s, %s)", __( 'Links','u-design' ) ),
		'custom'	=>	array("UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)",  __( 'Custom Fields','u-design' ) )
	);
	
	foreach( $options as $option ){
		if( $option == 'custom' ){ // URLs in custom fields and meta boxes.
			$n = 0;
			$row_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->postmeta" );
			$page_size = 10000;
			$pages = ceil( $row_count / $page_size );

			for( $page = 0; $page < $pages; $page++ ) {
				$current_row = 0;
				$start = $page * $page_size;
				$end = $start + $page_size;
				$pmquery = "SELECT * FROM $wpdb->postmeta WHERE meta_value <> ''";
				$items = $wpdb->get_results( $pmquery );
				foreach( $items as $item ){
					$value = $item->meta_value;
					if( trim($value) == '' ){
						continue;
					}

					$edited = udesign_unserialize_replace( $oldurl, $newurl, $value );

					if( $edited != $value ){
						$fix = $wpdb->query( "UPDATE $wpdb->postmeta SET meta_value = '".$edited."' WHERE meta_id = ".$item->meta_id );
						if( $fix ){
							$n++;
						}
					}
				}
			}
			$results[$option] = array( $n, $queries[$option][1] );
		}
		else{
			$result = $wpdb->query( $wpdb->prepare( $queries[$option][0], $oldurl, $newurl ) );
			$results[$option] = array( $result, $queries[$option][1] );
		}
	}
	return $results;			
}


/**
 * Update URLs embedded in custom fields and meta boxes data.
 * Code is mostly from the "Velvet Blues Update URLs" plugin.
 *
 * @link https://en-ca.wordpress.org/plugins/velvet-blues-update-urls/
 * 
 * @param string $from URL
 * @param string $to URL
 * @param mixed $data Custom fields and meta boxes data.
 * @param boul $serialised
 * @return mixed Updated URLs in custom fields and meta boxes data.
 */
function udesign_unserialize_replace( $from = '', $to = '', $data = '', $serialised = false ) {
	try {
		if ( false !== is_serialized( $data ) ) {
			$unserialized = unserialize( $data );
			$data = udesign_unserialize_replace( $from, $to, $unserialized, true );
		}
		elseif ( is_array( $data ) ) {
			$_tmp = array( );
			foreach ( $data as $key => $value ) {
				$_tmp[ $key ] = udesign_unserialize_replace( $from, $to, $value, false );
			}
			$data = $_tmp;
			unset( $_tmp );
		}
		else {
			if ( is_string( $data ) )
				$data = str_replace( $from, $to, $data );
		}
		if ( $serialised ){
			return serialize( $data );
		}
	} catch( Exception $error ) {
	}
	return $data;
}



/**
 * Get the page ID by slug or rather page path (eg. 'portfolio/one-column-portfolio').
 * 
 * @link https://codex.wordpress.org/Function_Reference/get_page_by_path
 * 
 * @param type $slug
 * @return mixed Page ID on success else NULL.
 */
function udesign_get_page_id_by_slug( $slug ) {
    $page = get_page_by_path( $slug );
    if ( $page ) {
        return (int) $page->ID;
    }
    else {
        return null;
    }
}



/**
 * Fixes the association between page and category for the imported demo portfolio section.
 * By default a portfolio page is associated with a specific category by their IDs.
 * A problem occurs when the WP Importer starts messing with the IDs of pages and categories.
 * The function below takes care of this issue.
 * 
 * @param type $demo_slug
 * @return void
 */
function udesign_portfolio_import_fix( $demo_slug = '' ) {
	
	global $udesign_options;
	
	/**
	 * This function assigns a portfolio page with a category.
	 * 
	 * @param string $cat_id This is a category ID.
	 * @param string $page_path This is a page path (eg. 'portfolio/one-column-portfolio').
	 */
	function assign_portfolio_page_to_category( $cat_id, $page_path ) {
		global $udesign_options;
		$page_id = udesign_get_page_id_by_slug( $page_path );
		$udesign_options['portfolio_cat_for_page_' . $page_id] = $cat_id;
		Merlin_Logger::get_instance()->info( 'Portfolio page (' . $page_id . ') assigned to category (' . $cat_id . ')' );
	}
	
	// The Main Demo 2017.
	if ( 'main-demo-2017' === $demo_slug ) {
		
		$cats_by_slug_array = array(
			'one-column-portfolio',
			'two-column-portfolio',
			'three-column-portfolio',
			'four-column-portfolio',
			'video-portfolio',
			'sortable-one-column',
			'sortable'
		);
		
		
		foreach ( $cats_by_slug_array as $cat_slug ) {
			
			$cat_obj = get_category_by_slug( $cat_slug );
			$cat_id = $cat_obj->term_id;
			
			
			switch ( $cat_slug ) {
				
				// One Column Portfolio.
				case 'one-column-portfolio':
					$page_path = 'portfolio/one-column-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
				// Two Column Portfolio.
				case 'two-column-portfolio':
					$page_path = 'portfolio/two-column-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
				// Three Column Portfolio.
				case 'three-column-portfolio':
					$page_path = 'portfolio/three-column-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
				// Four Column Portfolio.
				case 'four-column-portfolio':
					$page_path = 'portfolio/four-column-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
					
				// Video Portfolio.
				case 'video-portfolio':
					$page_path = 'portfolio/video-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
				// One Column Sortable Portfolio.
				case 'sortable-one-column':
					$page_path = 'portfolio/one-column-sortable-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
				// Two, Three and Four Column Sortable Portfolio.
				case 'sortable':
					$page_path = 'portfolio/two-column-sortable-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					
					$page_path = 'portfolio/three-column-sortable-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					
					$page_path = 'portfolio/four-column-sortable-portfolio';
					assign_portfolio_page_to_category( $cat_id, $page_path );
					break;
				
			}
			
		}
		
		// Update the theme options in the database.
		update_option( 'udesign_options', $udesign_options );
		
	}
	
	return void;
}



