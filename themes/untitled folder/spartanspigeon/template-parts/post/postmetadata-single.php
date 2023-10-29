<?php
/**
 * Template part for displaying single posts postmetadata block.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="single-postmetadata-divider-top"><?php echo do_shortcode( '[divider]' ); ?></div>
<?php 
	// Insert the "postmetadata" block.
	get_template_part( 'template-parts/post/postmetadata' );
?>
<div class="single-postmetadata-divider-bottom"><?php echo do_shortcode( '[divider]' ); ?></div>
