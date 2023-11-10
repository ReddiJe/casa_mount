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

	require_once( __DIR__ . '/widgets/switchSideImage.php' );
	require_once( __DIR__ . '/widgets/commentsSlider.php' );
	require_once( __DIR__ . '/widgets/heroSection.php' );
	require_once( __DIR__ . '/widgets/ourServices.php' );
	require_once( __DIR__ . '/widgets/contactUs.php' );
	require_once( __DIR__ . '/widgets/priceDependence.php' );
	require_once( __DIR__ . '/widgets/prices.php' );
	require_once( __DIR__ . '/widgets/blockWithDots.php' );


	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_commentsSlider() );
	$widgets_manager->register( new \Elementor_heroSection() );
	$widgets_manager->register( new \Elementor_ourServices() );
	$widgets_manager->register( new \Elementor_contactUs() );
	$widgets_manager->register( new \Elementor_prices() );
	$widgets_manager->register( new \Elementor_priceDependence() );
	$widgets_manager->register( new \Elementor_blockWithDots() );


}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );