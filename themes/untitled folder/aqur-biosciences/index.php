<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aqur_Biosciences
 */
?>
<div class="mainBlockMainPage">
	<?php
		get_header();
	?>
	<img src="<?php echo get_template_directory_uri();?>/inc/images/ImageForMainPage.png" alt="" class="imageForMainPage">

</div>


<?php
get_footer();
?>
