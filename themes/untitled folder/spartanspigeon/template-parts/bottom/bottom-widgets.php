<?php
/**
 * Displays bottom widget area if enabled.
 *
 * @package WordPress
 * @subpackage U-Design
 */

?>

<?php

if ( ! udesign_check_page_layout_option( 'no_bottom' ) ) :
    
	$bottom_1_is_active = sidebar_exist_and_active( 'bottom-widget-area-1' );
	$bottom_2_is_active = sidebar_exist_and_active( 'bottom-widget-area-2' );
	$bottom_3_is_active = sidebar_exist_and_active( 'bottom-widget-area-3' );
	$bottom_4_is_active = sidebar_exist_and_active( 'bottom-widget-area-4' );

	if ( $bottom_1_is_active || $bottom_2_is_active || $bottom_3_is_active || $bottom_4_is_active ) : // Hide this area if no widgets are active.
		?>
		<section id="bottom-bg">
			<div id="bottom" class="container_24">
				<div class="bottom-content-padding">
					<?php
					udesign_bottom_section_top();

					$output = '';
					// All 4 active: 1 case.
					if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_fourth', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_2', 'one_fourth', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_3', 'one_fourth', 'bottom-widget-area-3' );
						$output .= get_dynamic_column( 'bottom_4', 'one_fourth last_column', 'bottom-widget-area-4' );
					}
					// 3 active: 4 cases.
					if ( $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_3', 'one_third last_column', 'bottom-widget-area-3' );
					}
					if ( $bottom_1_is_active && $bottom_2_is_active && ! $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
					}
					if ( $bottom_1_is_active && ! $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_third', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
						$output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
					}
					if ( ! $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_2', 'one_third', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_3', 'one_third', 'bottom-widget-area-3' );
						$output .= get_dynamic_column( 'bottom_4', 'one_third last_column', 'bottom-widget-area-4' );
					}
					// 2 active: 6 cases.
					if ( $bottom_1_is_active && $bottom_2_is_active && ! $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_2', 'one_half last_column', 'bottom-widget-area-2' );
					}
					if ( $bottom_1_is_active && ! $bottom_2_is_active && $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
					}
					if ( ! $bottom_1_is_active && $bottom_2_is_active && $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_3', 'one_half last_column', 'bottom-widget-area-3' );
					}
					if ( ! $bottom_1_is_active && $bottom_2_is_active && ! $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_2', 'one_half', 'bottom-widget-area-2' );
						$output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
					}
					if ( ! $bottom_1_is_active && ! $bottom_2_is_active && $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_3', 'one_half', 'bottom-widget-area-3' );
						$output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
					}
					if ( $bottom_1_is_active && ! $bottom_2_is_active && ! $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'one_half', 'bottom-widget-area-1' );
						$output .= get_dynamic_column( 'bottom_4', 'one_half last_column', 'bottom-widget-area-4' );
					}
					// 1 active: 4 cases.
					if ( $bottom_1_is_active && ! $bottom_2_is_active && ! $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_1', 'full_width', 'bottom-widget-area-1' );
					}
					if ( ! $bottom_1_is_active && $bottom_2_is_active && ! $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_2', 'full_width', 'bottom-widget-area-2' );
					}
					if ( ! $bottom_1_is_active && ! $bottom_2_is_active && $bottom_3_is_active && ! $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_3', 'full_width', 'bottom-widget-area-3' );
					}
					if ( ! $bottom_1_is_active && ! $bottom_2_is_active && ! $bottom_3_is_active && $bottom_4_is_active ) {
						$output .= get_dynamic_column( 'bottom_4', 'full_width', 'bottom-widget-area-4' );
					}

					echo $output;

					udesign_bottom_section_bottom(); ?>
				</div><!-- end bottom-content-padding -->

			</div><!-- end bottom -->

		</section><!-- end bottom-bg -->

		<div class="clear"></div>

		<?php
	endif; // Close bottom widget areas if-statement.

endif; // Hide bottom area check.
