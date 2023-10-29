<?php 

/**
 * Generate U-Design theme related CMB2 metaboxes, custom fields, or forms.
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Add the theme related CMB2 metaboxes.
 * 
 */
add_action( 'cmb2_admin_init', 'udesign_cmb2_metaboxes' );

/**
 * Define the metabox and field configurations.
 * 
 */
function udesign_cmb2_metaboxes() {
	
	// Include the CMB2 Field Slider.
	$cmb2_field_slider = trailingslashit( get_template_directory() ) . 'inc/admin/u-design-cmb2/cmb2/3rd-party-resources/cmb2-field-slider/cmb2_field_slider.php';
	if ( file_exists( $cmb2_field_slider ) ) {
		require_once $cmb2_field_slider;
	}


	// Include the Easy Responsive Tabs.
	$cmb2_easy_responsive_tabs = trailingslashit( get_template_directory() ) . 'inc/admin/u-design-cmb2/cmb2/3rd-party-resources/Easy-Responsive-Tabs/cmb2_easy_responsive_tabs.php';
	if ( file_exists( $cmb2_easy_responsive_tabs ) ) {
		require_once $cmb2_easy_responsive_tabs;
	}

	// Start with an underscore to hide fields from custom fields list.
	$prefix = '_udesign_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'udesign_metabox',
		'title'         => __( 'U-Design Options', 'u-design' ),
		'object_types'  => array( 'post', 'page', 'essential_grid', 'product'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		'closed'        => false, // Keep the metabox closed by default
	) );


	/*******************************( TITLE )***********************************/

	// Page Title select options.
	$cmb->add_field( array(
		'name'              => __( 'Title Position', 'u-design' ),
		'desc'              => __( 'Overwrite the global title position (applies to this page only)', 'u-design' ),
		'id'                => $prefix . 'page_title',
		'type'              => 'select',
		'show_option_none'  => false,
		'default'           => 'default_position',
		'options'           => array(
			'default_position'   => __( 'Use the default position', 'u-design' ),
			'position1'          => __( 'Title Position 1 (before the main content)', 'u-design' ),
			'position2'          => __( 'Title Position 2 (inside the main content)', 'u-design' ),
			'remove1'            => __( 'Remove Title (SEO-friendly)', 'u-design' ),
			'remove2'            => __( 'Remove Title Completely', 'u-design' ),
		),
		'before_row' => 'opening_easy_tabs_wrapper',
		'after_row' => '</div>',
	) );

	function opening_easy_tabs_wrapper( $args, $field ) {
		ob_start();
		?>
<!-- BEGIN: Opening Easy Tabs Wrapper -->
		<div id="udesign-optns-parent-horizontal-tab">
			<ul class="resp-tabs-list hor_1">
			    <li><?php _e( 'Title', 'u-design' ) ?></li>
			    <li><?php _e( 'Breadcrumbs', 'u-design' ) ?></li>
			    <li><?php _e( 'Page Layout', 'u-design' ) ?></li>
			    <li><?php _e( 'Header', 'u-design' ) ?></li>
			    <li><?php _e( 'Sliders', 'u-design' ) ?></li>
			</ul>
			<div class="resp-tabs-container hor_1">
				<div>
<!-- END: Opening Easy Tabs Wrapper -->
		<?php
		return ob_get_clean();
	}

	/*******************************( BREADCRUMBS )***********************************/

	// Breadcrumbs option checkbox.
	$cmb->add_field( array(
		'name' => __( 'Breadcrumbs', 'u-design' ),
		//'desc' => __( 'The description (optional)', 'u-design' ),
		'id'   => $prefix . 'page_breadcrumbs_options',
		'type' => 'multicheck',
		'select_all_button' => false,
		'default_cb' => 'cmb2_set_checkboxes_default_for_breadcrumbs_options', // use a callback function to determine whether the deprecated value exists and update the new one accordingly
		'options' => array(
			'disable_breadcrumbs' => sprintf( esc_html__('Disable Breadcrumbs - %1$sThis option will disable/hide the breadcrumbs on this page only%2$s', 'u-design'), '<span class="cmb2-metabox-description">', '</span>'),
			'move_to_title' => sprintf( esc_html__('Move Breadcrumbs to title area - %1$sThis only applies for "Title Position 1" %2$s', 'u-design'), '<span class="cmb2-metabox-description">', '</span>'),
		),
		'before_row' => '<div>', // this opening div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div
		'after_row' => '</div>', // this closing div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div
	) );

	/**
	 * Backward compatability: check if the user had disabled breadcrumbs for this particular post
	 * with the old single checkbox option '_udesign_disable_breadcrumbs' option.
	 */
	function cmb2_set_checkboxes_default_for_breadcrumbs_options() {
		$defaults =  array();
		if ( get_post_meta( get_the_ID(), '_udesign_disable_breadcrumbs', true ) ) {
		    $defaults =  array('disable_breadcrumbs');
		    update_post_meta( get_the_ID(), '_udesign_page_breadcrumbs_options', $defaults ); // assign the deprecated value to the new (this line takes care of not having to save the page for this to stick)
		    delete_post_meta( get_the_ID(), '_udesign_disable_breadcrumbs' ); // delete the deprecated post meta option
		}
		return $defaults;
	}



	/*******************************( PAGE LAYOUT )***********************************/

	// Page layout options.
	$cmb->add_field( array(
		'name'    => __( 'Page Layout Options', 'u-design' ),
		'desc'    => __( 'Select the sections above you would like to remove from this page', 'u-design' ),
		'id'      => $prefix . 'page_layout_options',
		'type'    => 'multicheck',
		'select_all_button' => false,
		'options_cb' => 'cmb_get_the_page_layout_options_array',
		'before_row' => '<div>', // this opening div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div
	) );

	/**
	 * Conditionally build the multicheck options based on which page template is used.
	 */
	function cmb_get_the_page_layout_options_array() {
		$options =  array(
			'no_header'     => sprintf( esc_html__('No Header - %1$s Remove all top area items (main menu, logo, secondary menu bar, etc.)%2$s', 'u-design'), '<span class="cmb2-metabox-description">', '</span>'),
			'no_container'  => sprintf( esc_html__('No Container - %1$s Remove main content\'s inner wrapping divs%2$s', 'u-design'), '<span class="cmb2-metabox-description">', '</span>'),
			'no_bottom'     => __( 'No Bottom area', 'u-design' ),
			'no_footer'     => __( 'No Footer', 'u-design' ),
		);
		if ( get_page_template_slug( get_the_ID() ) !== 'page-FullWidth.php' ) {
		    unset( $options['no_container'] );
		}
		return $options;
	}

	// Page width options.
	$cmb->add_field( array(
		'name' => __( 'Page Width', 'u-design' ),
		'desc' => __( 'Enable this option to override the global page/sidebar width.', 'u-design' ),
		'id'   => $prefix . 'overwrite_page_width',
		'type' => 'checkbox',
		'after_row' => 'page_width_option_styles', // use this callback to insert some custom CSS and JS to style the CUSTOM PAGE WIDTH options as one group
	) );

	function page_width_option_styles( $args, $field ) {
		ob_start();
		?>
			<style>
			    .cmb2-id--udesign-overwrite-page-width,
			    .cmb2-id--udesign-max-page-width,
			    .cmb2-id--udesign-custom-page-width { border-bottom: none !important; }
			    .cmb2-id--udesign-max-page-width,
			    .cmb2-id--udesign-custom-page-width,
			    .cmb2-id--udesign-custom-sidebar-width { margin-top: -27px !important; }
			    .cmb-th label[for="_udesign_max_page_width"],
			    .cmb-th label[for="_udesign_custom_page_width"],
			    .cmb-th label[for="_udesign_custom_sidebar_width"] {
				display: none !important;
			    }
			    #custom-page-width-optns-wrapper { display: none; padding-right: 20px; }
			</style>
			<script type="text/javascript">
				// <![CDATA[
			    jQuery(document).ready(function($){
					"use strict";
					// on page load: show the page/sidebar width slider options if the checkbox is checked
					if ( $("input#_udesign_overwrite_page_width").is(':checked')  ) {
					    $("#custom-page-width-optns-wrapper").fadeIn( 250 );
					}
					// toggle visibility for the page/sidebar width slider options when the checkbox is toggled
					$( "input#_udesign_overwrite_page_width" ).click(function() {
					    if ( $("input#_udesign_overwrite_page_width").is(':checked')  ) {
						$("#custom-page-width-optns-wrapper").fadeIn( 250 );
					    } else {
						$("#custom-page-width-optns-wrapper").fadeOut( 350 );
					    }
					});

					// When Max Width enabled disable the Theme Width slide and text field 
					var $udesignMaxPageWidth = $( "#_udesign_max_page_width" );
					var $customPageWidthSlideBar = $( ".cmb2-id--udesign-custom-page-width .own-slider-field" );
					$customPageWidthSlideBar.slider(); // initialize the slider to avoid error should the actual slide bar element has not been initialized yet
					if ( $udesignMaxPageWidth.is(':checked')  ) {
					    $customPageWidthSlideBar.slider( "disable" );
					}
					$udesignMaxPageWidth.click(function() {
					    if ( $udesignMaxPageWidth.is(':checked')  ) {
						$customPageWidthSlideBar.slider( "disable" );
					    } else {
						$customPageWidthSlideBar.slider( "enable" );
					    }
					});

			    });
				// ]]>
			</script>
		<?php
		return ob_get_clean();
	}


	// Max Width (Fluid page).
	$cmb->add_field( array(
		'name' => __( 'Maximum Width (Fluid Layout)', 'u-design' ),
		'desc' => __( 'Set the page width to the maximum possible browser or device width. (Fluid Layout)', 'u-design' ),
		'id'   => $prefix . 'max_page_width', // Formerly used to be manually set as the custom field: 'udesign_max_page_width'.
		'type' => 'checkbox',
		'before_field'  => sprintf( esc_html__('%1$sMaximum Width (Fluid page):%2$s', 'u-design'), '<p><strong>', '</strong></p>'),
		'before_row'    => '<div id="custom-page-width-optns-wrapper">',
	) );


	// Page width.
	$cmb->add_field( array(
		'name'		=> __( 'Custom Page Width', 'u-design' ),
		'desc'		=> __( 'Set the width (px)', 'u-design' ),
		'id'		=> $prefix . 'custom_page_width', // Formerly used to be manually set as the custom field: 'udesign_custom_page_width'.
		'type'		=> 'own_slider',
		'min'		=> '960',
		'max'		=> '1600',
		'default_cb'	=> 'custom_page_width_default', // Callback function to determine default value.
		'value_label'	=> 'Value:',
		'before_field'	=> sprintf( esc_html__('%1$sCustom Page Width:%2$s', 'u-design'), '<p><strong>', '</strong></p>'),
	) );

	/**
	 * Check whether a custom field: '_udesign_custom_page_width' already exists,
	 * if 'yes' then assign its value as the new default,
	 * if 'no' then grab the global page width value.
	 */
	function custom_page_width_default() {
		global $udesign_options;
		$default = ( isset( $udesign_options['global_theme_width'] ) && is_numeric( $udesign_options['global_theme_width'] ) ) ? (string)$udesign_options['global_theme_width'] : '960';
		$udesign_custom_page_width = get_post_meta( get_the_ID(), '_udesign_custom_page_width', true );
		if ( is_numeric($udesign_custom_page_width) ) {
			$default = $udesign_custom_page_width;
		}
		// Update the custom field with the default value before even the page has been saved or updated.
		update_post_meta( get_the_ID(), '_udesign_custom_page_width', $default );
		return $default;
	}

	// Sidebar width.
	$cmb->add_field( array(
		'name'		=> __( 'Sidebar Width', 'u-design' ),
		'desc'		=> __( 'Set the width (%) (default is: 33)', 'u-design' ),
		'id'		=> $prefix . 'custom_sidebar_width', // Formerly used to be manually set as the custom field: 'udesign_custom_sidebar_width'.
		'type'		=> 'own_slider',
		'min'		=> '20',
		'max'		=> '50',
		'default_cb'	=> 'custom_sidebar_width_default', // Callback function to determine default value.
		'value_label'	=> 'Value:',
		'before_field'	=> sprintf( esc_html__( '%1$sSidebar Width:%2$s', 'u-design' ), '<p><strong>', '</strong></p>'),
		'after_row' => '</div></div>', // Closing div for page layout options.
	) );

	/**
	 * Check whether a custom field: '_udesign_custom_sidebar_width' already exists,
	 * if 'yes' then assign its value as the new default,
	 * if 'no' then grab the global sidebar width value.
	 */
	function custom_sidebar_width_default() {
		global $udesign_options;
		$default = ( isset($udesign_options['global_sidebar_width']) && is_numeric($udesign_options['global_sidebar_width']) ) ? (string)$udesign_options['global_sidebar_width'] : '33';
		$udesign_custom_sidebar_width = get_post_meta( get_the_ID(), '_udesign_custom_sidebar_width', true );
		if ( is_numeric($udesign_custom_sidebar_width) ) {
		    $default = $udesign_custom_sidebar_width;
		}
		// update the custom field with the default value before even the page has been saved or updated
		update_post_meta( get_the_ID(), '_udesign_custom_sidebar_width', $default );
		return $default;
	}


	/*******************************( HEADER )***********************************/
	// Get the image.
	$cmb->add_field( array(
		'name'      => __( 'Header Image', 'u-design' ),
		'desc'      => __( 'Upload an image.', 'u-design' ),
		'id'        => $prefix . 'page_header_image',
		'type'      => 'file',
		// Optional:
		'options'   => array(
		    'url'   => false, // Show the text input for the url.
		    'add_upload_file_text' => __( 'Add Image', 'u-design' ) // Upload button text. Default: "Add or Upload File".
		),
		'before_row' => '<div>', // This opening div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div.
		'after_row' => 'insert_custom_styles', // Use this callback to insert some custom CSS and JS to style the CUSTOM HEADER options as one group.
	) );

	function insert_custom_styles( $args, $field ) {
		ob_start();
		?>
			<style>
			    .cmb2-id--udesign-page-header-image,
			    .cmb2-id--udesign-page-top-area-over-header-image { border-bottom: none !important; }
			    .cmb-th label[for="_udesign_page_top_area_over_header_image"],
			    .cmb-th label[for="_udesign_page_top_area_bg"] {
				display: none !important;
			    }
			    .cmb-row.cmb2-id--udesign-page-top-area-bg, #top-area-over-header-optns-wrapper { display: none; }
			    .cmb-row.cmb2-id--udesign-page-top-area-bg, .cmb-row.cmb2-id--udesign-page-top-area-over-header-image { margin-top: -20px; }
			</style>
			<script type="text/javascript">
				// <![CDATA[
				jQuery(document).ready(function($){
					"use strict";
					// on page load: determine whether an image has been selected and show/hide dependent options accordingly
					if( $("#_udesign_page_header_image-status .img-status").length == 1 ) { // image selected
					     $("#top-area-over-header-optns-wrapper").fadeIn( 150 );
					}
					// when image is selected or deleted: show/hide dependent options accordingly
					var container = document.querySelector('#_udesign_page_header_image-status');
					if (typeof MutationObserver === 'function') { // exclude browsers that don't support "MutationObserver"
					    var observer = new MutationObserver(function(mutations){
						if( $("#_udesign_page_header_image-status .img-status").length == 0 ) { // image removed
						     $("#top-area-over-header-optns-wrapper").fadeOut( 250 );
						} else {  // image selected
						     $("#top-area-over-header-optns-wrapper").fadeIn( 450 );
						}
					    });
					    observer.observe(container, {childList: true}); // we just need to monitor for changes to the "container" element's children
					}

					// on page load: show the color picker if the checkbox is checked
					if ( $("input#_udesign_page_top_area_over_header_image").is(':checked')  ) {
					    $(".cmb-row.cmb2-id--udesign-page-top-area-bg").fadeIn( 250 );
					}
					// toggle visibility for the color picker when the checkbox is toggled
					$( "input#_udesign_page_top_area_over_header_image" ).click(function() {
					    if ( $("input#_udesign_page_top_area_over_header_image").is(':checked')  ) {
						$(".cmb-row.cmb2-id--udesign-page-top-area-bg").fadeIn( 250 );
					    } else {
						$(".cmb-row.cmb2-id--udesign-page-top-area-bg").fadeOut( 350 );
					    }
					});
				});
				// ]]>
			</script>
		<?php
		return ob_get_clean();
	}

	$cmb->add_field( array(
		'name'		=> __( 'Top Area Over Header Image', 'u-design' ),
		'desc'		=> __( 'Position the top area over the header image', 'u-design' ),
		'id'		=> $prefix . 'page_top_area_over_header_image',
		'type'		=> 'checkbox',
		'before_field'	=> sprintf( esc_html__('%1$sTop Area Over Header Image:%2$s', 'u-design'), '<p><strong>', '</strong></p>'),
		'before_row'	=> '<div id="top-area-over-header-optns-wrapper">',
	) );

	// Top area color.
	$cmb->add_field( array(
		'name'		=> __( 'Top Area Background Color', 'u-design' ),
		'desc'		=> __( 'Pick a color for the top area background which will go over the image, ', 'u-design' ),
		'id'		=> $prefix . 'page_top_area_bg',
		'type'		=> 'colorpicker',
		'default'	=> 'rgba(0,0,0,0.1)',
		'options'	=> array(
		       'alpha'	=> true, // Make this a rgba color picker.
		),
//	        'attributes' => array(
//	               'data-colorpicker' => json_encode( array(
//	                       'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
//	               ) ),
//	        ),
		'after_row' => '</div></div>', // 1st closing div is for #top-area-over-header-optns-wrapper.
					       // The 2nd closing div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div.
	) );


	/*******************************( SLIDER )***********************************/

	// Sliders' options.
	$cmb->add_field( array(
		'name'              => __( 'Choose a Slider', 'u-design' ),
		'desc'              => __( 'Select one of the available sliders to be displayed near the top of this page', 'u-design' ),
		'id'                => $prefix . 'add_slider_revolution',
		'type'              => 'select',
		'show_option_none'  => true,
		'options_cb'           => 'cmb_get_the_available_revolution_sliders_array',
		'default_cb'           => 'default_slider_revolution',
		'after'             => 'revolution_slider_option_description',
		'before_row' => '<div>', // This opening div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div.
		'after_row' => 'closing_divs_for_the_tabs',
	) );

	/**
	 * This is additional info for the user.
	 */
	function revolution_slider_option_description() {
		ob_start(); ?>
			<br />
			<span class="description"><?php printf( __('To create additional sliders or to configure the existing ones please refer to the %1$sRevolution Slider%2$s page.', 'u-design'), '<a title="'.esc_html__('Go to Revolution Slider page', 'u-design').'" href="admin.php?page=revslider">', '</a>' ); ?></span><br />
			<span class="description"><?php printf( __('For help please refer to the %1$sDocumentation%2$s.', 'u-design'), '<a title="'.esc_html__('Go to the Documentation', 'u-design').'" target="_blank" href="'.get_template_directory_uri().'/inc/shared/documentation/index.html#revslider-description">', '</a>' ); ?></span>
			<div class="clear"></div>
		<?php 
		return ob_get_clean();
	}

	/**
	 * Build an array of the available sliders.
	 */
	function cmb_get_the_available_revolution_sliders_array() {
		$options =  array();
		if ( class_exists( 'RevSliderFront' ) ) { // Make sure the Rev. slider plugin is activated.
			$rvslider = new RevSlider();
			if ( defined( 'RS_REVISION' ) && version_compare( RS_REVISION, '6.0', '>=' ) ) {
				$arrSliders = $rvslider->get_sliders();
			} else {
				$arrSliders = $rvslider->getArrSliders();
			}
			if( ! empty( $arrSliders ) ) {
				foreach( $arrSliders as $rvslider ) {
					$options[esc_attr($rvslider->getShortcode())] = $rvslider->getTitle();
				}
			}
		}
		return $options;
	}

	/**
	 * This is additional info for the user.
	 */
	function default_slider_revolution() {
		$default = '';
		$default_slider_revolution = get_post_meta( get_the_ID(), '_udesign_add_slider_revolution', true );
		if ( $default_slider_revolution ) {
			$default = $default_slider_revolution;
		}
		// Update the custom field with the default value before even the page has been saved or updated.
		update_post_meta( get_the_ID(), '_udesign_add_slider_revolution', $default );
		return $default;
	}


	function closing_divs_for_the_tabs( $args, $field ) {
		ob_start();
		?>
				</div> <?php // This closing div is for "Easy Responsive Tabs" markup structure, which requires each tab's content be wrapped with a plain div. ?>

<!-- BEGIN: Closing Easy Tabs Wrapper -->
			</div><!-- .resp-tabs-container hor_1 -->
		</div><!-- #udesign-optns-parent-horizontal-tab -->
		<div class="clear"></div>

		<script type="text/javascript">
			// <![CDATA[
			jQuery(document).ready(function($) {
				"use strict";
				// Vertical Tab.
				$( '#udesign-optns-parent-horizontal-tab' ).easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion.
					width: 'auto', //auto or any width like 600px.
					fit: true, // 100% fit in a container.
					closed: false, // Keep this to "false" to avoid an issue with the WP metabox when the metabox is closed.
					tabidentify: 'hor_1', // The tab groups identifier.
				});
				// Display tabs when ready.
				$( "#udesign-optns-parent-horizontal-tab" ).fadeIn( 250 );
			});
			// ]]>
		</script>
<!-- END: Closing Easy Tabs Wrapper -->
		<?php
		return ob_get_clean();
	}
	
}








