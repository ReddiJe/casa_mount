<?php
/**
 * Template part for displaying header homepage slider.
 *
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $current_slider, $udesign_options;

switch ( $current_slider ) {

	case '1': // Flashmo slider.
	case '2': // Piecemaker slider.
	case '3': // Piecemaker 2 slider.
		break; // Cases 1, 2 and 3 sliders have been removed from the theme.

	case '4': // Cycle 1 slider.
		include( trailingslashit( get_template_directory() ) . 'inc/frontend/sliders/cycle/cycle1/cycle1_display.php' );
		break;

	case '5': // Cycle 2 slider.
		include( trailingslashit( get_template_directory() ) . 'inc/frontend/sliders/cycle/cycle2/cycle2_display.php' );
		break;

	case '6': // Cycle 3 slider.
		include( trailingslashit( get_template_directory() ) . 'inc/frontend/sliders/cycle/cycle3/cycle3_display.php' );
		break;

	case '7': // No slider option.
		?>
		<section id="page-content-title">
		    <div id="page-content-header" class="container_24">
			<div id="page-title">
				<?php
					if ( $udesign_options['no_slider_text'] ) {
						echo '<h2>' . $udesign_options['no_slider_text'] . '</h2>';
					}
				?>
			</div>
		    </div>
		    <!-- end page-content-header -->
		</section>
		<!-- end page-content-title -->
		<?php
		break;
	case '8': // Revolution slider.
		?>
		<div id="rev-slider-header">
			<?php 
			// Load Revolution slider.
			if ( class_exists( 'RevSliderFront' ) && $udesign_options['rev_slider_shortcode'] ) {
				$rvslider = new RevSlider();
				if ( defined( 'RS_REVISION' ) && version_compare( RS_REVISION, '6.0', '>=' ) ) {
					$arrSliders = $rvslider->get_sliders();
				} else {
					$arrSliders = $rvslider->getArrSliders();
				}
				if ( ! empty( $arrSliders ) ) {
					echo do_shortcode( $udesign_options['rev_slider_shortcode'] );
				}
			}
			?>
		</div>
		<!-- end rev-slider-header -->
		<?php
		break;

}

