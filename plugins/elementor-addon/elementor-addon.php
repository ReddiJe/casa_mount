<?php
/**
 * Plugin Name: Elementor Addon
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hello-world-widget-1.php' );
	require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );
	require_once( __DIR__ . '/widgets/rightImage.php' );
	require_once( __DIR__ . '/widgets/richText.php' );
	require_once( __DIR__ . '/widgets/homePage.php' );
	require_once( __DIR__ . '/widgets/longSectionHomepage.php' );
	require_once( __DIR__ . '/widgets/switchSideImage.php' );
	require_once( __DIR__ . '/widgets/partnersList.php' );
	require_once( __DIR__ . '/widgets/facilitiesList.php' );

	$widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
	$widgets_manager->register( new \Elementor_rightImage() );
	$widgets_manager->register( new \Elementor_richText() );
	$widgets_manager->register( new \Elementor_homePage() );
	$widgets_manager->register( new \Elementor_longSectionHomepage() );
	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_partnersList() );
	$widgets_manager->register( new \Elementor_facilitiesList() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );