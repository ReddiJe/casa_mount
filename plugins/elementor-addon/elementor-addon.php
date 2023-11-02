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
	require_once( __DIR__ . '/widgets/questionsAndAnswers.php' );
	require_once( __DIR__ . '/widgets/docsBlocks.php' );
<<<<<<< HEAD
	require_once( __DIR__ . '/widgets/myForm.php' );
	require_once( __DIR__ . '/widgets/timeline.php' );
=======
>>>>>>> c502cf7cc68a36d9f2d6359c636ae2691896c585


	$widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
	$widgets_manager->register( new \Elementor_rightImage() );
	$widgets_manager->register( new \Elementor_richText() );
	$widgets_manager->register( new \Elementor_homePage() );
	$widgets_manager->register( new \Elementor_longSectionHomepage() );
	$widgets_manager->register( new \Elementor_switchSideImage() );
	$widgets_manager->register( new \Elementor_partnersList() );
	$widgets_manager->register( new \Elementor_facilitiesList() );
	$widgets_manager->register( new \Elementor_questionsAndAnswers() );
	$widgets_manager->register( new \Elementor_docsBlocks() );
<<<<<<< HEAD
	$widgets_manager->register( new \Elementor_myForm() );
	$widgets_manager->register( new \Elementor_timeline() );
=======
	
>>>>>>> c502cf7cc68a36d9f2d6359c636ae2691896c585

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );