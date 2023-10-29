<?php 
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header();

// Front page widget area.
get_template_part( 'template-parts/page/content', 'front-page-widgets' );


get_footer();

