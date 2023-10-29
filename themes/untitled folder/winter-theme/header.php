<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Winter_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<div class="background">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/cloud1.svg'?" alt="" class="cloud1">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/cloud2.svg" alt="" class="cloud2">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/cloud3.svg" alt="" class="cloud3">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/ground1.svg" alt="" class="ground1">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/ground2.svg" alt="" class="ground2">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/tree1.svg" alt="" class="tree1">
        <img src="<?php echo get_template_directory_uri(); ?>/inc/images/tree2.svg" alt="" class="tree2">
    </div> 


