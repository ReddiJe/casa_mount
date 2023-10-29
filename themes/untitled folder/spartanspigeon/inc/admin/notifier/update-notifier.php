<?php 
/**
 * Provides a notification to the user every time the U-Design theme is updated.
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Define some constants.
define( 'UDESIGN_NOTIFIER_XML_FILE', 'http://idesignmywebsite.com/notifier/u-design/notifier.xml' ); // The remote notifier XML file containing the latest version of the theme and changelog.
define( 'UDESIGN_NOTIFIER_CACHE_INTERVAL', 21600 ); // The time interval for the remote XML cache in the database (21600 seconds = 6 hours).


// Get the current theme version (always from parent theme).
if ( function_exists('wp_get_theme') ) {
	$curr_theme = ( wp_get_theme()->parent() ) ? wp_get_theme()->parent() : wp_get_theme();
	$curr_theme_version = $curr_theme->get('Version');
}
define( 'UDESIGN_NOTIFIER_CURR_THEME_VERSION', $curr_theme_version );



/**
 * Adds an update notification to the WordPress Dashboard menu.
 * 
 */
function update_notifier_menu() {
	if ( function_exists( 'simplexml_load_string' ) ) { // Stop if simplexml_load_string funtion isn't available.
		$xml = get_latest_theme_version( UDESIGN_NOTIFIER_CACHE_INTERVAL ); // Get the latest remote XML file on our server.
		
		if( version_compare( $xml->latest, UDESIGN_NOTIFIER_CURR_THEME_VERSION, '>' ) ) { // Compare current theme version with the remote XML version.
			add_dashboard_page( 
				__( 'U-Design Theme Updates', 'u-design' ),  
				__( 'U-Design <span class="update-plugins">' . __( '1 Update', 'u-design' ) . '</span>' ), 
				who_can_edit_udesign_theme_options(), // Roles and capabilities.
				'theme-update-notifier', 
				'update_notifier' 
			);
		}
	}
}
add_action( 'admin_menu', 'update_notifier_menu' );  



/**
 * Adds an update notification to the WordPress Admin Bar.
 * 
 */
function update_notifier_bar_menu_udesign() {
	if ( function_exists( 'simplexml_load_string' ) ) { // Stop if simplexml_load_string funtion isn't available
		global $wp_admin_bar;
		
		// Don't display notification in admin bar if it's disabled or the current user isn't an administrator.
		if ( ! is_super_admin() || ! is_admin_bar_showing() ) { 
			return;
		}
		
		// Get the latest remote XML file on our server.
		$xml = get_latest_theme_version( UDESIGN_NOTIFIER_CACHE_INTERVAL );
		
		// Compare current theme version with the remote XML version then add admin bar menu item accordingly.
		if( version_compare( $xml->latest, UDESIGN_NOTIFIER_CURR_THEME_VERSION, '>' ) ) { 
			$wp_admin_bar->add_menu( 
				array( 
					'id' => 'update_notifier', 
					'title' => 'U-Design <span id="ab-updates">' . __( '1 Update', 'u-design' ) . '</span>', 
					'href' => get_admin_url() . 'index.php?page=theme-update-notifier' 
				) 
			);
		}
	}
}
add_action( 'wp_before_admin_bar_render', 'update_notifier_bar_menu_udesign', 999 );



/**
 * The notifier page.
 * 
 */
function update_notifier() { 
	$xml = get_latest_theme_version( UDESIGN_NOTIFIER_CACHE_INTERVAL ); // Get the latest remote XML file on our server ?>
	
	<style>
		.update-nag { display: none; }
		#instructions {max-width: 100%;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<div id="icon-tools" class="icon32"></div>
		<h2><?php esc_html_e( 'U-Design Theme Updates', 'u-design' ); ?></h2>
                <div id="message" class="updated below-h2">
			<p><strong><?php esc_html_e( 'There is a new version of the U-Design theme available.', 'u-design' ); ?></strong> <?php printf( esc_html__( 'You have version %s installed. Update to version %s.', 'u-design'), UDESIGN_NOTIFIER_CURR_THEME_VERSION, $xml->latest ); ?></p>
		</div>

		<img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd;" src="<?php echo trailingslashit( get_template_directory_uri() ) . 'screenshot.png'; ?>" width="350" />
                
		<div id="instructions">
			<h3 style="margin-top: 30px; line-height: 1.5;"><?php printf( esc_html__( 'For update options please refer to %s.', 'u-design'), '<a href="' . admin_url( 'admin.php?page=udesign_updates_options_page' ) . '">'.esc_html__('Theme Update', 'u-design').'</a>' ) ?></h3>
			<p><?php esc_html_e( 'To find out what\'s new in the latest release please refer to the section below.', 'u-design' ); ?></p>
		</div>
                <div class="clear"></div>

		<h3 class="title"><?php esc_html_e( 'Changelog', 'u-design' ); ?></h3>
		<?php echo wp_kses_post( $xml->changelog ); ?>

	</div>
    
<?php } 



/**
 * Get the remote XML file contents and return its data (Version and Changelog).
 * Uses the cached version if available and inside the time interval defined.
 * 
 * @param int $interval
 * @return xml
 */
function get_latest_theme_version( $interval ) {
	
	$notifier_file_url = UDESIGN_NOTIFIER_XML_FILE;	
	$db_cache_field = 'udesign-notifier-cache';
	$db_cache_field_last_updated = 'udesign-notifier-cache-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	
	// Check the cache.
	if ( ! $last || ( ( $now - $last ) > $interval ) ) {
		// cache doesn't exist, or is old, so refresh it.
                if ( function_exists('wp_remote_get') ) { // If WordPress HTTP API is available.
			
			$resp = wp_remote_get( $notifier_file_url, array( 'timeout' => 10 ) );
			if ( ! is_wp_error( $resp ) && is_array( $resp ) && 200 == $resp['response']['code'] ) {
				
				$cache = $resp['body'];
				
				if ( $cache ) {			
					// We got good results.
					update_option( $db_cache_field, $cache );
				}
				
			}
			
		}
                
                // Update the last check timestamp regardless of results above. This is to avoid unecessary requests to remote file in case the remote server is down, the file renamed, missing, etc., which could cause slow admin pages.
                update_option( $db_cache_field_last_updated, time() );
		 
		// Read from the cache file.
		$notifier_data = get_option( $db_cache_field );
	} else {
		// cache file is fresh enough, so read from it.
		$notifier_data = get_option( $db_cache_field );
	}
	
	// Let's see if the $xml data was returned as we expected it to.
	// If it didn't, use the default 1.0.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down.
	if( strpos( ( string ) $notifier_data, '<notifier>' ) === false ) {
		$notifier_data = '<?xml version="1.0.0" encoding="UTF-8"?><notifier><latest>1.0.0</latest><changelog></changelog></notifier>';
	}
	
	// Load the remote XML data into a variable and return it.
	$xml = @simplexml_load_string( $notifier_data ); 
	
	return $xml;
	
}

