<?php 
            
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$c2_slides_array = explode( ',', $udesign_options['c2_slides_order_str'] );
$hide_controls = ( count($c2_slides_array) < 2 ) ? 'visibility:hidden;': '';
?>

<div id="c2-header">
	<div id="header-content" class="container_24">
		<div class="c2-slideshow">
			<div class="c2-slide-img-frame"></div>
			<div class="c2-slide-img-frame-bg"></div>
			<ul id="c2-slider">
				<?php foreach( $c2_slides_array as $slide_row_number ) : ?>
					<?php
					$c2_slide_img_url = $udesign_options['c2_slide_img_url_'.$slide_row_number];
					$c2_slide_link_url = $udesign_options['c2_slide_link_url_'.$slide_row_number];
					$c2_slide_link_target = $udesign_options['c2_slide_link_target_'.$slide_row_number];
					$c2_slide_default_info_txt = $udesign_options['c2_slide_default_info_txt_'.$slide_row_number];
					$c2_slide_button_txt = $udesign_options['c2_slide_button_txt_'.$slide_row_number];
					$c2_slide_button_style = $udesign_options['c2_slide_button_style_'.$slide_row_number];
					?>
					<li>
					    <div class="c2-slide-img-wrapper">
						<?php if ( $c2_slide_link_url ) : ?>
							<a href="<?php echo esc_url( $c2_slide_link_url ); ?>" target="_<?php echo esc_attr( $c2_slide_link_target ); ?>">
						<?php endif; ?>
						<img src="<?php echo esc_url( $c2_slide_img_url ); ?>" alt="<?php echo esc_attr( $udesign_options['c2_slide_image_alt_tag_'.$slide_row_number] ); ?>" class="slide-img" />
						<?php if ( $c2_slide_link_url ) : ?>
							</a>
						<?php endif; ?>
					    </div>
					    <div class="slide-desc">
						<?php echo do_shortcode(  $c2_slide_default_info_txt );
						if ( $c2_slide_link_url ) : ?>
						    <a class="<?php echo esc_attr( $c2_slide_button_style ); ?>-button align-btn-left" style="margin-top:10px;" href="<?php echo esc_url( $c2_slide_link_url ); ?>" target="_<?php echo esc_attr( $c2_slide_link_target ); ?>"><span><?php echo esc_attr( $c2_slide_button_txt ); ?></span></a>
						<?php endif; ?>
					    </div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- end c2-slideshow -->
		<div class="c2-slider-controls">
		    <span id="c2-pauseButton" style="<?php echo esc_attr( $hide_controls ); ?>"><a href="" title="<?php esc_attr_e('Pause', 'u-design'); ?>"><?php esc_html_e('Pause', 'u-design'); ?></a></span>
		    <span id="c2-resumeButton" style="<?php echo esc_attr( $hide_controls ); ?>"><a href="" title="<?php esc_attr_e('Play', 'u-design'); ?>"><?php esc_html_e('Play', 'u-design'); ?></a></span>
		    <div id="c2-nav" style="<?php echo esc_attr( $hide_controls ); ?>"></div>
		</div>

	</div>
	<!-- end header-content -->
</div>
<!-- end c2-header -->








