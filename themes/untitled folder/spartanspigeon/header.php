<?php 
/**
 * The header for the U-Design theme.
 *
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Set some theme global variables.

?>

<html <?php language_attributes(); ?>>
<head>
	<?php udesign_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0<?php echo ( isset( $udesign_responsive ) && $udesign_responsive ) ? $udesign_responsive_pinch_to_zoom : ''; ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php echo $udesign_options['google_analytics']; ?>
	<?php udesign_head_bottom(); ?>
	<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-skyblue.min.css"
    />
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"
    ></script>
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script src="https://kit.fontawesome.com/ba595e32cd.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/logotype.png" alt="" class="logo"></a>
		<?php wp_nav_menu( [
					'theme_location'  => 'primary',
					'items_wrap'      => '<ul class="newClassForMobile">%3$s</ul>',
				] ); ?>
		<?php get_search_form( ) ?>
        <a href="#" class="closeheaderMobile buttonForMobile" onclick="closeHeaderMobile()">X</a>
        <a href="#" class="openHeaderMobile buttonForMobile" onclick="openHeaderMobile()"><i class="fa-solid fa-bars"></i></a>

    </header>
    


