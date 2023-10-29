<?php 
            
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$c1_slides_array = explode( ',', $udesign_options['c1_slides_order_str'] );
$hide_controls = ( count( $c1_slides_array ) < 2 ) ? 'visibility:hidden': '';
$c1_no_3d_shadow = $udesign_options['c1_remove_3d_shadow'];
if ( isset( $udesign_options['c1_remove_image_frame'] ) && $udesign_options['c1_remove_image_frame'] == "yes" ) {
    $c1_image_width = 940;
    $c1_image_height = 400;
} else {
    $c1_image_width = 914;
    $c1_image_height = 374;
}
?>

<div id="c1-header">
	<div id="header-content" class="container_24">
		<div class="c1-slideshow">
			<ul id="c1-slider">
				<?php foreach( $c1_slides_array as $slide_row_number ) : ?>
					<?php 
					$c1_slide_img_url = $udesign_options['c1_slide_img_url_'.$slide_row_number];
					$c1_slide_link_url = $udesign_options['c1_slide_link_url_'.$slide_row_number];
					$c1_slide_link_target = $udesign_options['c1_slide_link_target_'.$slide_row_number];
					?>
					<li>
						<div class="c1-slide-img-wrapper">
							<?php if ( $c1_slide_link_url ) : ?>
								<a href="<?php echo esc_url( $c1_slide_link_url ); ?>" target="_<?php echo esc_attr( $c1_slide_link_target ); ?>">
							<?php endif; ?>
							<img src="<?php echo esc_url( $c1_slide_img_url ); ?>" alt="<?php echo esc_attr( $udesign_options['c1_slide_image_alt_tag_'.$slide_row_number] ); ?>" class="slide-img" width="<?php echo esc_attr( $c1_image_width ); ?>" height="<?php echo esc_attr( $c1_image_height ); ?>" />
							<?php if ( $c1_slide_link_url ) : ?>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- end c1-slideshow -->
		<div class="c1-slider-controls">
			<span id="c1-resumeButton" style="<?php echo esc_attr( $hide_controls ); ?>"><a href="" title="<?php esc_attr_e('Play', 'u-design'); ?>"><?php esc_html_e('Play', 'u-design'); ?></a></span>
			<span id="c1-pauseButton" style="<?php echo esc_attr( $hide_controls ); ?>"><a href="" title="<?php esc_attr_e('Pause', 'u-design'); ?>"><?php esc_html_e('Pause', 'u-design'); ?></a></span>
			<div id="c1-nav" style="<?php echo esc_attr( $hide_controls ); ?>"></div>
		</div>

	</div>
	<!-- end header-content -->
<?php if ( !$c1_no_3d_shadow == 'yes' ) : ?>
	<div class="clear"></div>
	<div id="c1-shadow" class="container_24"> </div>
<?php endif; ?>
</div>
<!-- end c1-header -->