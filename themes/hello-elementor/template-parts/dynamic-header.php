<?php

/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!hello_get_header_display()) {
	return;
}

$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$header_nav_menu = wp_nav_menu([
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
]);
?>

<style>
	.site-header {
		z-index: 1000;
		width: 100vw;
		padding-bottom: 73px;
		overflow: visible;
	}

	.header-inner{
		position: fixed;
		top: 0;
		width: 100%;
	}

	.site-navigation-toggle i {
		color: #fff;
	}

	.site-navigation-dropdown ul.menu {
		background: rgba(26, 43, 50, 0.90);
	}

	.site-navigation-dropdown ul.menu li a {
		background: transparent;
		color: #fff;
	}

	.pcEmail {
		display: block;
	}

	.site-header {
		width: 100%;
		max-width: 100%;
	}

	@media screen and (min-width:1100px) {
		.site-header {
		padding-bottom: 98px;
	}
	}

	@media screen and (max-width: 600px) {
		.pcEmail {
			display: none;
		}

	}
</style>
<header id="site-header" class="site-header dynamic-header <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="header-inner">
		<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
			<?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ($site_name && ('logo' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<h1 class="site-title <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" rel="home">
						<?php echo esc_html($site_name); ?>
					</a>
				</h1>
			<?php endif; ?>
		</div>
		<?php if ($header_nav_menu) : ?>
			<nav class="site-navigation <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
			<div class="site-navigation-toggle-holder <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<div class="site-navigation-toggle" role="button" tabindex="0">
					<i class="eicon-menu-bar" aria-hidden="true"></i>
					<span class="screen-reader-text"><?php echo esc_html__('Menu', 'hello-elementor'); ?></span>
				</div>
			</div>
			<nav class="site-navigation-dropdown <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>

		<?php endif; ?>

		<a href="mailto:info@casamounthomesja.com" class="emailHeader pcEmail">info@casamounthomesja.com</a>
	</div>
</header>
<!-- <header class="mobile">
	<div class="mobileHeaderInner">
	<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
		<?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
			<div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif;
		if ($site_name && ('logo' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
			<h1 class="site-title <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" rel="home">
					<?php echo esc_html($site_name); ?>
				</a>
			</h1>
		<?php endif; ?>
	</div>
	<span onClick="openMenu();">
		<svg xmlns="http://www.w3.org/2000/svg" width="30" height="19" viewBox="0 0 30 19" fill="none">
			<path d="M1.66666 0.871094H6.66666M28.3333 0.871094H13.3333M28.3333 17.5378H23.3333M1.66666 17.5378H16.6667M1.66666 9.20443H28.3333" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
		</svg>
	</span>
	</div>
	<div class="mobileNavigation">

	</div>
	
</header> -->