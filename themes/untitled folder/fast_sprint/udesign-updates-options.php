<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*
	U-Design: Updates Options Page
        

        Contents:
	
		1. Options menu
		2. Options page

*/



// 1. Options menu.
function udesign_updates_options_menu() {
	
	$udesign_updates_admin_page =  add_submenu_page(
			'udesign_options_page', 
			__( 'Theme Update', 'u-design' ), 
			__( 'Theme Update', 'u-design' ), 
			who_can_edit_udesign_theme_options(), // Roles and capabilities.
			'udesign_updates_options_page', 
			'updates_options_page_callback'
		);
	
        // Load the required styles and scripts conditionally to this page only.
        add_action('load-'.$udesign_updates_admin_page, 'load_udesign_updates_page_scripts');
	
}
add_action('admin_menu', 'udesign_updates_options_menu');


// Load the required styles.
function load_udesign_updates_page_scripts () {
    // Enque styles.
    wp_enqueue_style('udesign-udpates', get_template_directory_uri().'/assets/css/admin/u-design-updates-page-styles.css', false, '1.0', 'screen');
}

        
// 2. Options page.
function updates_options_page_callback() { ?>
	
	<div class="wrap">
		<h1><?php _e('U-Design Update Options', 'u-design'); ?></h1>
		
		<h3 class="u-design-updater-page-headers"><span class="dashicons dashicons-update"></span> <?php esc_html_e('1-CLICK UPDATE', 'u-design'); ?></h3>
		
		<div style="margin:20px 0 40px;">
		<?php 
		
		if ( ! class_exists( 'Envato_Market' ) ) {
			
			$content = '<p>' . esc_html__( 'The 1-click theme update works with the help of the Envato Market plugin. For that you need to have the plugin installed and activated and provide the necessary Envato API Personal Token in the plugin settings. Once installed and activated you can access its settings in the "Envato Market" left menu item near the bottom.', 'u-design' ) . '</p>';
			$related_plugins_page_link = sprintf( '<a class="button-secondary" href="' . admin_url( 'admin.php?page=udesign_related_plugins' ) . '">%s</a>', esc_html__( 'Install the Envato Market plugin', 'u-design' ) );
			$content .= "<p>{$related_plugins_page_link}</p>";
			echo wp_kses( $content, array( 'p' => array(), 'a' => array( 'class' => array(), 'href' => array() ) ) );
			
		} else {
			
			$envato_market_plugin_slug = ( function_exists( 'envato_market' ) ) ? envato_market()->get_slug() : 'envato-market';
			$envato_market_plugin_settings_slug = $envato_market_plugin_slug . '#settings';
			
			printf( esc_html__( 'Assuming that you have %s the Envato Market plugin and there is a new release of the theme, then you may update the theme under %s.', 'u-design'), 
			    '<a href="' . admin_url( 'admin.php?page=' . $envato_market_plugin_settings_slug ) . '">'.esc_html__('setup', 'u-design').'</a>', 
			    '<a title="' . esc_html__( 'Go to the Updates page', 'u-design' ) . '" href="update-core.php">' . esc_html__( 'Dashboard &rarr; Updates', 'u-design' ) . '</a>' );
			?>
			<p><span class="description"><?php esc_html_e('Please note: If you\'ve setup the Envato Market plugin with the required API Token and still no U-Design update is showing under "Dashboard &rarr; Updates", this may be due to caching. Try logging out of your site and then logging back in.', 'u-design' ); ?></span></p>
			<?php 
		}
		
		?>
		</div>
		
		<div class="clear"></div>
		
		<h3 class="u-design-updater-page-headers"><span class="dashicons dashicons-update"></span> <?php esc_html_e('ALTERNATIVE UPDATE METHODS', 'u-design'); ?></h3>
		
		<h3><?php esc_html_e('Manual update:', 'u-design'); ?></h3>
		<p><strong><?php esc_html_e('Please note:', 'u-design'); ?></strong> <?php printf( esc_html__('It\'s always a great idea to make a backup of the theme\'s folder %s, or better yet, a full backup of your site including the database before proceeding with an update.', 'u-design'),
			'<strong>/wp-content/themes/u-design/</strong>'); ?></p>
		<p><?php printf( esc_html__('First you need to download the latest version of the %1$sU-Design Theme%2$s, for that log into your %3$s account used to purchase the theme and from your %4$sDownloads%5$s section grab the theme\'s latest zip.', 'u-design'),
			'<a target="_blank" title="U-Design WordPress Premium Theme" href="https://udesigntheme.com/envato-market/">', '</a>', 
			'<a href="http://www.themeforest.net/" target="_blank">ThemeForest</a>', 
			'<strong>', '</strong>' ); ?></p>
		<p><?php esc_html_e("Here's a couple of methods we usually recommend for updating the theme manually:", 'u-design'); ?></p>
		<ul>
		    <li><span class="dashicons dashicons-admin-tools" style="color:#696969;"></span> <strong><?php esc_html_e('Method 1:', 'u-design'); ?></strong> <?php esc_html_e('You may simply drag-and-drop using your favorite FTP client the latest version of the theme (unzipped "u-design" folder) over the existing ones in your web server. This will overwrite the current theme files with the new ones. That way if you have uploaded any additional files to the theme\'s folder, they will not be deleted.', 'u-design'); ?></li>
		    <li><span class="dashicons dashicons-admin-tools" style="color:#696969;"></span> <strong><?php esc_html_e('Method 2:', 'u-design'); ?></strong> <?php printf( esc_html__('Go to %s section, activate another theme temporarily which will de-activate the "U-Design" theme automatically. At this point go ahead and delete the "U-Design" theme (don\'t worry, you will not lose any of your themes\' options since those are saved in the database). Then upload, install and activate the latest version of the "U-Design" theme as if doing it for the first time.', 'u-design'),
			'<a title="Go to Appearance &rarr; Themes setion" href="' . admin_url() . 'themes.php" target="_blank">'.esc_html__('Appearance &rarr; Themes', 'u-design').'</a>'); ?></li>
		</ul>
		<p><?php printf( esc_html__('If you have any caching plugins active or server side caching or %s don\'t forget to clear the cache.', 'u-design'),
			'<a href="http://en.wikipedia.org/wiki/Content_delivery_network" title="'.esc_html__('What is CDN?', 'u-design').'" target="_blank">CDN</a>'); ?></p>
		<p><span class="dashicons dashicons-info" style="color:#696969;"></span> <?php printf( esc_html__('Now, %1$sif you have modified any core theme files in the past%2$s (those could be CSS, PHP, JS or ther files) but you haven\'t been keeping track of your changes then you can use some \'diff\' tools to locate exactly what was modified and thus be able to re-apply those changes after the update. For your reference, it\'s always better to use a "child" theme for customizations that way your changes will be safe with future updates of the "parent" theme, we offer a "child" theme for U-Design %3$sHERE%4$s.', 'u-design'),
			'<strong>', '</strong>',
			'<a rel="nofollow" target="_blank" href="http://dreamthemedesign.com/u-design-support/discussion/692/who-wants-a-child-theme-for-u-designss">', '</a>' ); ?></p>
		<p><?php esc_html_e('For a full list of affected files in the latest release please refer to the theme\'s "Changelog".', 'u-design'); ?></p>
		<p><?php printf( esc_html__('Should you have any questions regarding theme updates feel free to post in the %1$ssupport forum%2$s.', 'u-design'),
                    '<a target="_blank" title="'.esc_html__('How do I update the theme!', 'u-design').'" href="http://dreamthemedesign.com/u-design-support/discussion/13/how-do-i-update-the-theme/p1">', '</a>'); ?></p>
		
	</div>
        
<?php 

}

