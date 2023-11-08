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

	require_once( __DIR__ . '/widgets/richText.php' );
	require_once( __DIR__ . '/widgets/homePage.php' );
	require_once( __DIR__ . '/widgets/longSectionHomepage.php' );
	require_once( __DIR__ . '/widgets/switchSideImage.php' );
	require_once( __DIR__ . '/widgets/partnersList.php' );
	require_once( __DIR__ . '/widgets/facilitiesList.php' );
	require_once( __DIR__ . '/widgets/questionsAndAnswers.php' );
	require_once( __DIR__ . '/widgets/docsBlocks.php' );
	require_once( __DIR__ . '/widgets/myForm.php' );
	require_once( __DIR__ . '/widgets/timeline.php' );
	require_once( __DIR__ . '/widgets/threeSteps.php' );
	require_once( __DIR__ . '/widgets/accommodationsList.php' );
	require_once( __DIR__ . '/widgets/accommodationOptions.php' );
	require_once( __DIR__ . '/widgets/photoSlider.php' );
	require_once( __DIR__ . '/widgets/commentsSlider.php' );
	require_once( __DIR__ . '/widgets/contactUs.php' );
	require_once( __DIR__ . '/widgets/heroSection.php' );
	require_once( __DIR__ . '/widgets/homePageImage.php' );


	$widgets_manager->register( new \Elementor_richText() );
	$widgets_manager->register( new \Elementor_homePage() );
	$widgets_manager->register( new \Elementor_longSectionHomepage() );
	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_partnersList() );
	$widgets_manager->register( new \Elementor_facilitiesList() );
	$widgets_manager->register( new \Elementor_questionsAndAnswers() );
	$widgets_manager->register( new \Elementor_docsBlocks() );
	$widgets_manager->register( new \Elementor_myForm() );
	$widgets_manager->register( new \Elementor_timeline() );
	$widgets_manager->register( new \Elementor_threeSteps() );
	$widgets_manager->register( new \Elementor_accommodationsList() );
	$widgets_manager->register( new \Elementor_accommodationOptions() );
	$widgets_manager->register( new \Elementor_photoSlider() );
	$widgets_manager->register( new \Elementor_commentsSlider() );
	$widgets_manager->register( new \Elementor_contactUs() );
	$widgets_manager->register( new \Elementor_heroSection() );
	$widgets_manager->register( new \Elementor_homePageImage() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );