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
	require_once( __DIR__ . '/widgets/blocksWithPictures.php' );
	require_once( __DIR__ . '/widgets/cleaningServicesTypes.php' );
	require_once( __DIR__ . '/widgets/contactUsWithLocation.php' );
	require_once( __DIR__ . '/widgets/cleaningDifference.php' );
	require_once( __DIR__ . '/widgets/textCenter.php' );
	require_once( __DIR__ . '/widgets/twoColumnsValues.php' );
	require_once( __DIR__ . '/widgets/servicesSlider.php' );
	require_once( __DIR__ . '/widgets/titleWithButton.php' );
	require_once( __DIR__ . '/widgets/hoverBlocks.php' );
	require_once( __DIR__ . '/widgets/calculator.php' );
	require_once( __DIR__ . '/widgets/heroSectionWithButton.php' );
	require_once( __DIR__ . '/widgets/twoRowsValues.php' );


	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_commentsSlider() );
	$widgets_manager->register( new \Elementor_heroSection() );
	$widgets_manager->register( new \Elementor_ourServices() );
	$widgets_manager->register( new \Elementor_contactUs() );
	$widgets_manager->register( new \Elementor_prices() );
	$widgets_manager->register( new \Elementor_priceDependence() );
	$widgets_manager->register( new \Elementor_blockWithDots() );
	$widgets_manager->register( new \Elementor_blocksWithPictures() );
	$widgets_manager->register( new \Elementor_cleaningServicesTypes() );
	$widgets_manager->register( new \Elementor_contactUsWithLocation() );
	$widgets_manager->register( new \Elementor_cleaningDifference() );
	$widgets_manager->register( new \Elementor_textCenter() );
	$widgets_manager->register( new \Elementor_twoColumnsValues() );
	$widgets_manager->register( new \Elementor_servicesSlider() );
	$widgets_manager->register( new \Elementor_titleWithButton() );
	$widgets_manager->register( new \Elementor_hoverBlocks() );
	$widgets_manager->register( new \Elementor_calculator() );
	$widgets_manager->register( new \Elementor_heroSectionWithButton() );
	$widgets_manager->register( new \Elementor_twoRowsValues() );


}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );