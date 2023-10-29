<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aqur_Biosciences
 */

get_header();
?>
	<div class="main404">
		<img src="<?php echo get_template_directory_uri();?>/inc/images/404 illustration.png" alt="">
		<h1>Oops... Page not found</h1>
		<p>Looks like the page is missing. Dont worry though. Try to find information on another page.
			If this is a problem from our side, we will solve it as soon as possible.</p>
	</div>
<?php
get_footer();
?>