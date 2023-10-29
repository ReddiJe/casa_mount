<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ORTTEH
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
	<div class="wrapper">
		<header class="header">
			<div class="headerContainer">
				<div class="headerLogo">
					<a href="#" class="headerLogoLink">
						<img src="<?php echo get_template_directory_uri(); ?>/inc/img/header-logo.webp" alt="icon-logo" class="headerLogoLink">
					</a>
				</div>
				<nav class="headerMenu">
				<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
				</nav>
				<div class="headerTell">
					<a class="headerTellLink" href="tell:+38061-236-67-77">+38(061)-236-67-77</a>
				</div>
			</div>
		</header>
