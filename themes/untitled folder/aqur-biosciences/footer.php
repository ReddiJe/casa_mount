<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aqur_Biosciences
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="inFooter">
			<img src="<?php echo get_template_directory_uri();?>/inc/images/logo.png">
			<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'Bottom',
				)
			);
			?>
			<p>© Copyright 2021 Aqur Biosciences, Inc.</p>
		</nav><!-- #site-navigation -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
