<?php 
/**
 * @package WordPress
 * @subpackage U-Design
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


global $udesign_options, $google_webfonts, $google_webfonts_variants, $google_webfonts_subsets;
$udesign_options  = get_option( 'udesign_options' );
include( trailingslashit( get_template_directory() ) . 'inc/admin/google-fonts/udesign-google-web-fonts.php' );
$google_webfonts = maybe_unserialize( udesign_google_fonts_families() );
$google_webfonts_variants = maybe_unserialize( udesign_google_fonts_variants() );
$google_fonts_variants_descriptions = udesign_google_fonts_variants_descriptions();
$google_webfonts_subsets = maybe_unserialize( udesign_google_fonts_subsets() );

$recaptcha_languages = array( "Arabic" => "ar", "Bulgarian" => "bg", "Catalan" => "ca", "Chinese (Simplified)" => "zh-CN", "Chinese (Traditional)" => "zh-TW", "Croatian" => "hr", "Czech" => "cs", "Danish" => "da", "Dutch" => "nl", "English (UK)" => "en-GB", "English (US)" => "en", "Filipino" => "fil", "Finnish" => "fi", "French" => "fr", "French (Canadian)" => "fr-CA", "German" => "de", "German (Austria)" => "de-AT", "German (Switzerland)" => "de-CH", "Greek" => "el", "Hebrew" => "iw", "Hindi" => "hi", "Hungarain" => "hu", "Indonesian" => "id", "Italian" => "it", "Japanese" => "ja", "Korean" => "ko", "Latvian" => "lv", "Lithuanian" => "lt", "Norwegian" => "no", "Persian" => "fa", "Polish" => "pl", "Portuguese" => "pt", "Portuguese (Brazil)" => "pt-BR", "Portuguese (Portugal)" => "pt-PT", "Romanian" => "ro", "Russian" => "ru", "Serbian" => "sr", "Slovak" => "sk", "Slovenian" => "sl", "Spanish" => "es", "Spanish (Latin America)" => "es-419", "Swedish" => "sv", "Thai" => "th", "Turkish" => "tr", "Ukrainian" => "uk", "Vietnamese" => "vi" );

// Class for the theme options.
class UDesign_Theme_Options {

	/**
	 * PHP5 constructor.
	 */
        public function __construct() {
		
		add_action( 'admin_menu', array( $this, 'udesign_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_udesign_theme_settings' ) );
		add_action( 'admin_post_save_udesign_options', array( $this, 'on_save_changes' ) );
		
        }
	
        /**
	 * PHP4 construction (backward compatibility).
	 */
	public function UDesign_Theme_Options() {
		// This will NOT invoked, unless a sub-class that extends `UDesign_Theme_Options` calls it. In that case, call the new-style constructor to keep compatibility.
		self::__construct();
        }


	function init_udesign_theme_options() {
	    global $udesign_options;
	    if( $udesign_options['reset_to_defaults'] == 'yes' ) delete_option( "udesign_options");
	    if (! get_option("udesign_options")) {
		add_option( "udesign_options",
		    array( // intitialize the 'udesign_options' array with the following key => value pairs:
			    "reset_to_defaults" => '',
			    "custom_styles" => '',
			    "udesign_settings_page_last_saved_version" => UDESIGN_VERSION, // set a flag to indicate which version of the theme was the U-Design Settings page last saved by the user
			    "color_scheme" => "1",
                            "site_url" => esc_url_raw( site_url() ),
			    "custom_logo_img" => "",
			    "top_area_height" => 110,
			    "logo_width" => 150,
			    "logo_height" => 85,
			    "logo_retina" => "",
			    "logo_position_center" => "",
			    "logo_position_vertical" => 6,
			    "slogan_distance_from_the_top" => 100,
			    "slogan_distance_from_the_left" => 0,
			    "slogan_font_size" => "12",
			    "top_page_phone_number" => "Call Us Free: 1-800-123-4567",
			    "enable_search" => "yes",
			    "enable_page_peel" => "",
			    "page_peel_url" => '',
			    "enable_feedback" => "",
			    "feedback_btn_text" => "feedback",
			    "feedback_url" => '',
			    "feedback_position_fixed" => '',
			    "feedback_button_color" => "F95700",
			    "enable_prettyPhoto_script" => "yes",
			    "udesign_pretty_photo_style_theme" => "dark_rounded",
			    "udesign_disable_pretty_photo_gallery_overlay" => "",
			    "show_breadcrumbs" => "yes",
			    "disable_the_theme_update_notifier" => "no",
			    "enable_udesign_schema_tags" => "",
			    "udesign_disable_img_cropping" => "",
			    "udesign_enable_retina_images" => "",
			    "disable_smooth_scrolling_on_pages" => "",
			    "enable_default_style_css" => "no",
			    "fixed_main_menu" => "",
			    "fixed_menu_logo_disabled" => "",
                            "fixed_menu_logo" => "",
			    "add_fixed_menu_shadow" => "",
			    "remove_fixed_menu_background_image" => "",
			    "remove_fixed_menu_on_mobile_devices" => "",
			    "main_menu_alignment" => "right",
			    "main_menu_vertical_positioning" => 0,
			    "submenu_arrows" => "angle-down",
			    "show_menu_drop_shadows" => "",
			    "remove_border_under_menu" => "",
			    "enable_secondary_menu_bar" => "",
			    "secondary_menu_text_area_1" => get_udesign_text_area_1_dummy_content(),
			    "secondary_menu_text_area_1_alignment" => "left",
			    "secondary_menu_text_area_1_width" => 0,
			    "secondary_menu_text_area_2" => get_udesign_social_icons_html(),
			    "secondary_menu_text_area_2_alignment" => "right",
			    "secondary_menu_text_area_2_width" => 0,
			    "secondary_menu_term_id" => "select_menu",
			    "secondary_menu_text_alignment" => "center",
			    "secondary_menu_width" => 0,
			    "secondary_menu_items_order" => 'not_applicable',
			    "page_title_position" => "position1",
			    "home_page_col_1_fixed" => "",
			    "remove_default_page_sidebar" => "",
			    "pages_sidebar" => "left",
			    "pages_sidebar_2" => "left",
			    "pages_sidebar_3" => "left",
			    "pages_sidebar_4" => "left",
			    "pages_sidebar_5" => "left",
			    "pages_sidebar_6" => "left",
			    "pages_sidebar_7" => "left",
			    "pages_sidebar_8" => "left",
			    "sitemap_sidebar" => "right",
			    "show_comments_on_pages" => "no",
			    "max_theme_width" => "no",
			    "global_theme_width" => 960,
			    "global_sidebar_width" => 33,
			    "udesign_content_width" => 600,
			    "enable_google_web_fonts" => "",
			    "google_web_fonts_assoc" => array(),
			    "general_font_family" => "Arial",
			    "general_font_variant" => "",
			    "general_font_subset" => "",
			    "general_font_size" => "14",
                            "general_font_line_height" => "1.8",
			    "top_nav_font_family" => "Arial",
			    "top_nav_font_variant" => "",
			    "top_nav_font_subset" => "",
			    "top_nav_font_size" => "16",
			    "headings_font_family" => "Tahoma",
			    "headings_font_variant" => "",
			    "headings_font_subset" => "",
			    "headings_font_size_coefficient" => "1.2",
                            "headings_font_line_height" => "1.3",
			    "heading1_font_settings_enabled" => "",
			    "heading2_font_settings_enabled" => "",
			    "heading3_font_settings_enabled" => "",
			    "heading4_font_settings_enabled" => "",
			    "heading5_font_settings_enabled" => "",
			    "heading6_font_settings_enabled" => "",
			    "heading1_font_family" => "Tahoma",
			    "heading1_font_variant" => "",
			    "heading1_font_subset" => "",
			    "heading1_font_size" => "1.85",
                            "heading1_font_line_height" => "1.3",
			    "heading2_font_family" => "Tahoma",
			    "heading2_font_variant" => "",
			    "heading2_font_subset" => "",
			    "heading2_font_size" => "1.65",
                            "heading2_font_line_height" => "1.3",
			    "heading3_font_family" => "Tahoma",
			    "heading3_font_variant" => "",
			    "heading3_font_subset" => "",
			    "heading3_font_size" => "1.50",
                            "heading3_font_line_height" => "1.3",
			    "heading4_font_family" => "Tahoma",
			    "heading4_font_variant" => "",
			    "heading4_font_subset" => "",
			    "heading4_font_size" => "1.35",
                            "heading4_font_line_height" => "1.3",
			    "heading5_font_family" => "Tahoma",
			    "heading5_font_variant" => "",
			    "heading5_font_subset" => "",
			    "heading5_font_size" => "1.25",
                            "heading5_font_line_height" => "1.3",
			    "heading6_font_family" => "Tahoma",
			    "heading6_font_variant" => "",
			    "heading6_font_subset" => "",
			    "heading6_font_size" => "1.10",
                            "heading6_font_line_height" => "1.3",
			    "custom_colors_switch" => "disable",
			    "body_text_color" => "555555",
			    "main_link_color" => "F95700",
			    "main_link_color_hover" => "333333",
			    "main_headings_color" => "333333",
			    "top_bg_color" => "FCFCFC",
			    "top_text_color" => "AAAAAA",
			    "top_nav_background_color" => "FBFBFB",
			    "top_nav_background_opacity" => 0,
			    "top_nav_link_color" => "555555",
			    "top_nav_active_link_color" => "F95700",
			    "top_nav_hover_link_color" => "AAAAAA",
			    "dropdown_nav_link_color" => "EEEEEE",
			    "dropdown_nav_hover_link_color" => "FF8400",
			    "dropdown_nav_background_color" => "343A41",
			    "dropdown_nav_background_opacity" => 0.96,
                            "sec_menu_bg_color" => "293037",
			    "sec_menu_bg_opacity" => 0.95,
                            "sec_menu_text_color" => "EBEBEB",
                            "sec_menu_link_color" => "D4D4D4",
                            "sec_menu_link_hover_color" => "FF8400",
			    "page_title_color" => "333333",
			    "page_title_bg_color" => "F5F5F5",
			    "header_bg_color" => "FFFFFF",
			    "main_content_bg" => "FFFFFF",
			    "widget_title_color" => "333333",
			    "widget_text_color" => "555555",
			    "widget_bg_color" => "FAFAFA",
			    "bottom_bg_color" => "EDEDED",
			    "bottom_title_color" => "26313D",
			    "bottom_text_color" => "777777",
			    "bottom_link_color" => "333333",
			    "bottom_hover_link_color" => "F95700",
			    "footer_bg_color" => "212121",
			    "footer_text_color" => "EBEBEB",
			    "footer_link_color" => "949494",
			    "footer_hover_link_color" => "F95700",
			    "top_bg_img" => "",
			    "top_bg_img_repeat" => "no-repeat",
			    "top_bg_img_position_horizontal" => "center",
			    "top_bg_img_position_vertical" => "top",
			    "header_bg_img" => "",
			    "header_bg_img_repeat" => "no-repeat",
			    "header_bg_img_position_horizontal" => "center",
			    "header_bg_img_position_vertical" => "top",
			    "home_page_before_content_bg_img" => "",
			    "home_page_before_content_bg_img_repeat" => "no-repeat",
			    "home_page_before_content_bg_img_position_horizontal" => "center",
			    "home_page_before_content_bg_img_position_vertical" => "top",
			    "page_title_bg_img" => "",
			    "page_title_bg_img_repeat" => "no-repeat",
			    "page_title_bg_img_position_horizontal" => "center",
			    "page_title_bg_img_position_vertical" => "top",
			    "main_content_bg_img" => "",
			    "main_content_bg_img_repeat" => "no-repeat",
			    "main_content_bg_img_position_horizontal" => "center",
			    "main_content_bg_img_position_vertical" => "top",
			    "bottom_bg_img" => "",
			    "bottom_bg_img_repeat" => "no-repeat",
			    "bottom_bg_img_position_horizontal" => "center",
			    "bottom_bg_img_position_vertical" => "top",
			    "footer_bg_img" => "",
			    "footer_bg_img_repeat" => "no-repeat",
			    "footer_bg_img_position_horizontal" => "center",
			    "footer_bg_img_position_vertical" => "top",
			    "one_continuous_bg_img" => "",
			    "one_continuous_bg_img_repeat" => "no-repeat",
			    "one_continuous_bg_img_position_horizontal" => "center",
			    "one_continuous_bg_img_position_vertical" => "top",
			    "one_continuous_bg_img_fixed" => "",
			    "one_continuous_bg_img_with_other_bg_imgs" => "",
			    "udesign_remove_horizontal_rulers" => "",
			    "current_slider" => '8',
			    "c1_slides_order_str" => "1",
			    "c1_slide_img_url_1" => esc_url_raw( get_template_directory_uri().'/inc/frontend/sliders/cycle/cycle1/images/914x374_slide_01.jpg' ),
			    "c1_transition_type_1" => 'fade',
			    "c1_slide_link_url_1" => '',
			    "c1_slide_link_target_1" => 'self',
			    "c1_slide_image_alt_tag_1" => '',
			    "c1_speed" => 1000,
			    "c1_timeout" => 5000,
			    "c1_sync" => "yes",
			    "c1_remove_image_frame" => "",
			    "c1_remove_3d_shadow" => "yes",
			    "c2_slides_order_str" => "1",
			    "c2_slide_img_url_1" => esc_url_raw( get_template_directory_uri().'/inc/frontend/sliders/cycle/cycle2/images/476x287_slide_01.jpg' ),
			    "c2_transition_type_1" => 'fade',
			    "c2_slide_link_url_1" => '',
			    "c2_slide_link_target_1" => 'self',
			    "c2_slide_image_alt_tag_1" => '',
			    "c2_slide_default_info_txt_1" => get_c2_slide_default_info_txt(),
			    "c2_slide_button_txt_1" => "Read More",
			    "c2_slide_button_style_1" => 'dark',
			    "c2_speed" => 1500,
			    "c2_timeout" => 5000,
			    "c2_sync" => "yes",
			    "c2_text_transition_on" => "yes",
			    "c2_text_color" => "333333",
			    "c2_slider_text_size" => "1.2",
			    "c2_slider_text_line_height" => "1.7",
			    "c3_slides_order_str" => "1",
			    "c3_slide_img_url_1" => esc_url_raw( get_template_directory_uri().'/inc/frontend/sliders/cycle/cycle3/images/940x430_slide_01.jpg' ),
			    "c3_slide_img2_url_1" => esc_url_raw( get_template_directory_uri().'/inc/frontend/sliders/cycle/cycle3/images/940x430_slide_02.png' ),
			    "c3_slide_link_url_1" => '',
			    "c3_slide_link_target_1" => 'self',
			    "c3_slide_image_alt_tag_1" => '',
			    "c3_slide_default_info_txt_1" => get_c3_slide_default_info_txt(),
			    "c3_timeout" => 5000,
			    "c3_autostop" => "",
			    "c3_text_color" => "FFFFFF",
			    "c3_slider_text_size" => "1.2",
			    "c3_slider_text_line_height" => "1.7",
			    "no_slider_text" => "Home",
			    "rev_slider_shortcode" => "",
			    "portfolio_categories" => array(),
			    "portfolio_pages_ids_array" => array(),
			    "portfolio_title_posistion" => "below",
			    "portfolio_sidebar" => "left",
			    "show_portfolio_postmetadata" => "yes",
			    "udesign_single_portfolio_postmetadata_location" => "alignbottom",
			    "show_portfolio_postmetadata_author" => "",
			    "show_portfolio_postmetadata_tags" => "",
			    "show_portfolio_comments" => "yes",
			    "remove_single_portfolio_sidebar" => "",
			    "show_single_portfolio_navigation" => "",
			    "blog_sidebar" => "right",
			    "show_excerpt" => "yes",
			    "excerpt_length_in_words" => 47,
			    "blog_button_text" => "Read more",
			    "exclude_portfolio_from_blog" => "yes",
			    "exclude_portfolio_from_recent_posts_widget" => "",
			    "exclude_portfolio_from_archives_widget" => "",
			    "exclude_portfolio_from_main_query" => "",
			    "show_postmetadata_author" => "",
			    "show_postmetadata_tags" => "",
			    "show_archive_for_string" => "",
			    "udesign_comment_field_to_bottom" => "",
			    "show_comments_are_closed_message" => "",
			    "remove_blog_sidebar" => "",
			    "remove_archive_sidebar" => "",
			    "remove_single_sidebar" => "",
			    "udesign_single_view_postmetadata_location" => "alignbottom",
			    "show_single_post_navigation" => "",
			    "display_post_image_in_single_post" => "",
			    "enable_custom_featured_image" => "",
			    "featured_image_width" => 150,
			    "featured_image_height" => 150,
			    "force_image_dimention" => "",
			    "featured_image_alignment" => "alignleft",
			    "remove_featured_image_frame" => "",
			    "show_contact_fields" => "yes",
			    "contact_field_name1" => "Address:",
			    "contact_field_value1" => "123 Street Name, Suite #",
			    "contact_field_value2" => "City, State 12345, Country",
			    "contact_field_name3" => "Phone:",
			    "contact_field_value3" => "(123) 123-4567",
			    "contact_field_name4" => "Fax:",
			    "contact_field_value4" => "(123) 123-4567",
			    "contact_field_name5" => "Toll Free:",
			    "contact_field_value5" => "(800) 123-4567",
			    "contact_sidebar" => "left",
			    "remove_contact_sidebar" => "",
			    "NA_phone_format" => "", // North American phone number check, disabled by default
			    "email_receipients" => get_option('admin_email'),
			    "recaptcha_enabled" => "no",
			    "recaptcha_publickey" => "",
			    "recaptcha_privatekey" => "",
			    "recaptcha_lang" => "en",
                            "data_collection_message_on" => "no",
			    "data_collection_message" => data_collection_message_default_text(),
			    "contact_consent_on" => "yes",
                            "contact_consent_text" => contact_consent_default_text(),
			    "copyright_message" => '&copy; ' . date("Y") . ' <strong>U-Design</strong>',
			    "back_to_top" => "angle-up",
			    "show_wp_link_in_footer" => "yes",
			    "show_udesign_affiliate_link" => "",
			    "affiliate_username" => "",
			    "show_entries_rss_in_footer" => "yes",
			    "show_comments_rss_in_footer" => "yes",
			    "udesign_sticky_footer" => "",
			    "google_analytics" => "",
			    "enable_responsive" => "",
			    "responsive_logo_img" => "",
			    "responsive_logo_height" => 150,
			    "responsive_remove_secondary_menu" => "",
			    "responsive_remove_slider_area" => "",
			    "responsive_remove_bg_images_960-720" => "",
			    "responsive_menu" => "responsive_menu_1",
			    "menu_2_screen_width" => "",
			    "responsive_pinch_to_zoom" => "",
			    "responsive_disable_pretty_photo_at_width" => 0,
			    "show_udesign_action_hooks" => ""
                        )
		);
	    }
	    //Add more options here if needed
	    //if (! get_option("another_of_my_options")) {
	    //    add_option("another_of_my_options", "Hi there!!!");
	    //}
	}

	function register_udesign_theme_settings() {
	    register_setting( 'udesign_options_page', 'udesign_options', array( $this, 'validate_options' ) );
	    // register_setting( 'udesign_options_page', array( $this, 'another_of_my_options' ) );         
        }
        
	//extend the admin menu
	function udesign_admin_menu() {
		$this->init_udesign_theme_options();
		// Add the U-Design options menu
		$this->pagehook = add_menu_page( 'U-Design Theme', esc_html__( 'U-Design', 'u-design' ), who_can_edit_udesign_theme_options(), 'udesign_options_page', array( $this, 'udesign_generate_options_page' ), 'dashicons-star-filled' );
		add_action( 'load-'.$this->pagehook, array( $this, 'on_load_page' ) );
	}

	function on_load_page() {
		
                global $wp_scripts, $udesign_options, $google_webfonts_variants, $google_fonts_variants_descriptions, $google_webfonts_subsets;
                $enable_google_web_fonts = isset( $udesign_options['enable_google_web_fonts'] ) ? $udesign_options['enable_google_web_fonts'] : '';
		
                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-slider');
                wp_enqueue_script('jquery-ui-tooltip');
                wp_enqueue_script('jquery-ui-sortable');
                wp_enqueue_script('jquery-ui-resizable');
                // get the jquery ui object
                $queryui = $wp_scripts->query('jquery-ui-core');
                // load the jquery ui theme
                $scheme = is_ssl() ? 'https://' : 'http://';
                $url = $scheme . "code.jquery.com/ui/".$queryui->ver."/themes/flick/jquery-ui.min.css";
                wp_enqueue_style('jquery-ui-flick', $url, false, null);

                
		// load javascripts to allow drag/drop, expand/collapse and hide/show of boxes
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
                
		wp_enqueue_style('style', get_template_directory_uri().'/assets/css/admin/style.css', false, UDESIGN_VERSION, 'screen');
                wp_enqueue_media();
                
                // load the select2 script css
                wp_enqueue_style('u-design-select2', get_template_directory_uri() . '/inc/admin/select2/css/select2.min.css', false, '4.0.2', 'screen');
                // load the "select2" scripts
                wp_enqueue_script('u-design-select2', get_template_directory_uri() . '/inc/admin/select2/js/select2.min.js', array('jquery'), '4.0.2', true);
                
		//load color picker scripts
		wp_enqueue_style('ud-colorpicker-style', get_template_directory_uri().'/inc/admin/colorpicker/css/colorpicker.css', false, UDESIGN_VERSION, 'screen');
		wp_register_script('ud-colorpicker', get_template_directory_uri().'/inc/admin/colorpicker/js/colorpicker.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script('ud-colorpicker');
		
                // Load the main admin scripts for the theme's settings page
		//wp_register_script('admin-scripts', get_template_directory_uri().'/assets/js/admin/scripts.js', array('jquery'), UDESIGN_VERSION, true);
		wp_register_script('admin-scripts', get_template_directory_uri().'/assets/js/admin/scripts.min.js', array('jquery'), UDESIGN_VERSION, true);
		wp_enqueue_script('admin-scripts');
                wp_localize_script( 'admin-scripts', 'admin_scripts_params', array(
                                        'enable_google_web_fonts' => $enable_google_web_fonts,
                                        'google_webfonts_variants' => $google_webfonts_variants,
                                        'google_fonts_variants_descriptions' => $google_fonts_variants_descriptions,
                                        'google_webfonts_subsets' => $google_webfonts_subsets,
                                        'font_family_select2_placeholder' => esc_html__('Choose a Font', 'u-design'),
                                        'custom_colors_switch' => $udesign_options['custom_colors_switch'],
                                        'current_slider' => $udesign_options['current_slider']
                                    )
                                  );
                
		// load tablednd scripts for all sliders except Revolution slider
                if ( $udesign_options['current_slider'] != 8) {
                    wp_register_script('tablednd', get_template_directory_uri().'/assets/js/admin/jquery.tablednd.js', array('jquery'), '0.6', true);
                    wp_enqueue_script('tablednd');
                    wp_register_script('sliders-scripts', get_template_directory_uri().'/assets/js/admin/sliders.scripts.js', array('jquery','tablednd'), UDESIGN_VERSION, true);
                    wp_enqueue_script('sliders-scripts');
                }
                
                // jQuery validation script
                wp_enqueue_script('jquery_validate_lib', get_template_directory_uri()."/inc/frontend/jquery-validate/jquery.validate.min.js", array('jquery'), '1.11.1', false);
                wp_enqueue_script('masked_input_plugin', get_template_directory_uri()."/inc/frontend/masked-input-plugin/jquery.maskedinput.min.js", array('jquery'), '1.3.1', false);
                

		add_meta_box( 'udesign-help-options-metabox', esc_html__('Help', 'u-design'), array( $this, 'help_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-general-options-metabox', esc_html__('General Options', 'u-design'), array( $this, 'general_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-menus-options-metabox', esc_html__('Menus Options', 'u-design'), array( $this, 'menus_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-layout-options-metabox', esc_html__('Layout Options', 'u-design'), array( $this, 'layout_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-font-settings-metabox', esc_html__('Font Settings', 'u-design'), array( $this, 'font_settings_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-custom-colors-metabox', esc_html__('Custom Colors', 'u-design'), array( $this, 'custom_colors_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-front-page-options-metabox', esc_html__('Front Page Sliders', 'u-design'), array( $this, 'front_page_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-portfolio-section-options-metabox', esc_html__('Portfolio Section', 'u-design'), array( $this, 'portfolio_section_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-blog-section-options-metabox', esc_html__('Blog Section', 'u-design'), array( $this, 'blog_section_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-contact_page-options-metabox', esc_html__('Contact Page', 'u-design'), array( $this, 'contact_page_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-footer-options-metabox', esc_html__('Footer Options', 'u-design'), array( $this, 'footer_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-statistics-options-metabox', esc_html__('Statistics', 'u-design'), array( $this, 'statistics_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-responsive-options-metabox', esc_html__('Responsive Layout', 'u-design'), array( $this, 'responsive_options_contentbox' ), $this->pagehook, 'normal', 'core' );
		add_meta_box( 'udesign-advanced-options-metabox', esc_html__('Advanced Options', 'u-design'), array( $this, 'advanced_options_contentbox' ), $this->pagehook, 'normal', 'core' );
                
                // Get the current user ID.
                if ( current_user_can( 'manage_options' ) ) {
			$curr_user = get_current_user_id();
			// Close metaboxes when the U-Design options page is visited for the very first time.
			if ( ! get_user_meta( $curr_user, "closedpostboxes_$this->pagehook", false ) ) {
				update_user_meta( 
					$curr_user, 
					"closedpostboxes_$this->pagehook", 
					array(
						// 'udesign-help-options-metabox', 
						'udesign-general-options-metabox', 
						'udesign-menus-options-metabox', 
						'udesign-layout-options-metabox', 
						'udesign-font-settings-metabox', 
						'udesign-custom-colors-metabox', 
						'udesign-front-page-options-metabox', 
						'udesign-portfolio-section-options-metabox', 
						'udesign-blog-section-options-metabox', 
						'udesign-contact_page-options-metabox', 
						'udesign-footer-options-metabox', 
						'udesign-statistics-options-metabox', 
						'udesign-responsive-options-metabox',
						// 'udesign-advanced-options-metabox'
					)
				 );
			}

			// Hide the "Advanced Options" metabox by default. The user can toggle this option from the "Screen Options".
			if ( '' == get_user_meta( $curr_user, "udesign_hidden_metaboxes_by_default", array( 'udesign-advanced-options-metabox' ) ) ) {
				update_user_meta( $curr_user, "metaboxhidden_$this->pagehook", array( 'udesign-advanced-options-metabox' ) );
				// Add the following user specific meta to know which metabox options need to be hidden by default.
				add_user_meta( $curr_user, "udesign_hidden_metaboxes_by_default", array( 'udesign-advanced-options-metabox' ), true );
			}
                    
                }
        }

	function udesign_generate_options_page() {

		// Global screen column value to be able to have a sidebar in WordPress 2.8+.
		global $screen_layout_columns, $udesign_options;

		// Messages to display saved and reset.
		if ( isset( $_GET['settings-updated'] ) || isset( $_GET['updated'] ) ) { 
			echo '<div id="message" class="updated fade"><p><strong>'.esc_html__( 'Settings saved.', 'u-design' ).'</strong></p></div>';

			$file_was_included = true; // Used in preventing direct access to 'assets/css/frontend/global/custom_style.php'.
			// Update custom styles css file.
			$udesign_custom_style_css = trailingslashit( get_template_directory() ) . 'assets/css/frontend/global/custom_style.css';
			if ( is_writable( $udesign_custom_style_css ) ) {
				set_theme_mod( 'udesign_custom_styles_use_css_file', 'yes' );
				include_once( trailingslashit( get_template_directory() ) . 'assets/css/frontend/global/custom_style.php' );
				set_theme_mod( 'udesign_custom_style_last_modified', filemtime( $udesign_custom_style_css ) );
			} else {
				remove_theme_mod( 'udesign_custom_styles_use_css_file' );
			}
                }
                
		//if ( $_GET['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings reset.', 'u-design').'</strong></p></div>'; ?>
		<div id="udesign-metaboxes-general" class="wrap">
			<div style="float:left; padding:0 10px 10px 0;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/u-design-logo-small.png" /></div>
			<h1 style="padding-top:25px; padding-bottom: 30px;"><?php printf( __( 'Options <small>(version %1$s)</small>', 'u-design' ), UDESIGN_VERSION ); ?></h1>
			<?php 
			$theme_home_directory = substr(strrchr( get_template_directory(), "/" ), 1 );
			if ( $theme_home_directory != 'u-design' || strpos(get_template_directory(), '/U-Design-WP-Theme/u-design') || strpos(get_template_directory(), '/u-design/u-design') ) {
				echo '<div id="message" class="error fade"><p>The current directory structure to the theme is not valid! The CORRECT path is: <code>wp-content/themes/u-design/...(theme files)</code></p>
					<p style="line-height:1.5;">You have either not installed the theme correctly or have renamed the theme home directory. In either case the theme will not function properly.
						Pease refer to <a href="https://help.market.envato.com/hc/en-us/articles/202821510" target="_blank">this guide</a> or preview the Documentation included in the "Help" section below to install the theme correctly. Also, don\'t forget to unzip the zip file you downloaded from ThemeForest after purchase, the actual theme zip file would be inside the extracted folder as "u-design.zip"</p></div>';
			}
			?>
			<form id="udesign_options_submit_form" method="post" action="options.php">
				<?php 
				settings_fields( 'udesign_options_page' ); // Checks that the user can update options and also redirect the user back to the correct admin page (this form).
				$options = get_option('udesign_options');
				// Allows the 'closed' state of metaboxes to be remembered.
				wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
				// Allows the order of metaboxes to be remembered.
				wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

				<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							<?php do_meta_boxes( $this->pagehook, 'normal', $options ); ?>
							<?php do_meta_boxes( $this->pagehook, 'additional', $options ); ?>
							<div class="udesign-settings-main-submit-wrapper">
								<div class="submit">
									<input type="hidden" id="udesign_submit" value="1" name="udesign_submit" />
									<input class="button-primary left" type="submit" name="form-submit" value="<?php esc_attr_e( 'Save Changes', 'u-design' ); ?>" />
									<span class="spinner"></span>
								</div>
								<label for="reset_to_defaults" class="reset-to-defaults">
									<input name="udesign_options[reset_to_defaults]" type="checkbox" id="reset_to_defaults" value="yes" />
									<?php esc_attr_e( 'Reset to defaults', 'u-design' ); ?>
								</label>
							</div>
						</div>
					</div>
					<br class="clear"/>
				</div>
			</form>
			<?php /* The reset button */; ?>
			<!-- <form method="post">
			    <p class="submit">
				<input name="reset" type="submit" value="Reset" />
				<input type="hidden" name="action" value="reset" />
			    </p>
			</form> -->
		</div>
		<script type="text/javascript">
			//<![CDATA[
			jQuery(document).ready(function($) {
				"use strict";
				// Close postboxes that should be closed.
				$( '.if-js-closed' ).removeClass( 'if-js-closed' ).addClass( 'closed' );
				// Postboxes setup.
				postboxes.add_postbox_toggles('<?php echo esc_attr( $this->pagehook ); ?>');

				// Confirm the reset.
				$( '#reset_to_defaults' ).click(function() {
					if ( $(this).is( ':checked' ) ) {
					    this.checked = confirm( "Are you sure you want to reset all options?" );
					    $(this).trigger( "change" );
					}
				});
			});
			//]]>
		</script>
<?php	}

	/**
	 * Validate user input
	 *
	 * @param array $input, an array of user input
	 * @return array Return an input array of sanitized input
	 */
	function validate_options( $input ) {
		global $udesign_options, $google_webfonts, $google_webfonts_variants, $google_webfonts_subsets, $portfolio_pages_array;

                $input['reset_to_defaults'] = $input['reset_to_defaults'];
                $input['custom_styles'] = $udesign_options['custom_styles'];
                $input['udesign_settings_page_last_saved_version'] = UDESIGN_VERSION;
                $input['color_scheme'] = $udesign_options['color_scheme'];
                $input['site_url'] = esc_url_raw( site_url() );
                
		// General Options.
		$input['custom_logo_img'] = esc_url_raw($input['custom_logo_img']);
		$input['top_area_height'] = is_numeric( $input['top_area_height'] ) ? absint($input['top_area_height']) : $udesign_options['top_area_height'];
		$input['logo_width'] = ( is_numeric( $input['logo_width'] ) > 0 ) ? $input['logo_width'] : $udesign_options['logo_width'];
		$input['logo_height'] = ( is_numeric( $input['logo_height'] ) > 0 ) ? $input['logo_height'] : $udesign_options['logo_height'];
		$input['logo_retina'] = $input['logo_retina'];
		$input['logo_position_center'] = $input['logo_position_center'];
		$input['logo_position_vertical'] = ( $input['logo_position_vertical'] === '' ) ? $udesign_options['logo_position_vertical'] : $input['logo_position_vertical'];
		$input['slogan_distance_from_the_top'] =  ( $input['slogan_distance_from_the_top'] ) ? absint($input['slogan_distance_from_the_top']) : $udesign_options['slogan_distance_from_the_top'];
		$input['slogan_distance_from_the_left'] =  ( preg_match('/^0*([0-9]{1}|[0-9]{1,2}|[0-3]{1}[0-9]{1,2}|400)$/', $input['slogan_distance_from_the_left']) )  ? ($input['slogan_distance_from_the_left']) : $udesign_options['slogan_distance_from_the_left'];
		$input['slogan_font_size'] = (  $input['slogan_font_size'] ) ? $input['slogan_font_size'] : $udesign_options['slogan_font_size'];
		$input['top_page_phone_number'] = trim(stripslashes($input['top_page_phone_number']));
                $input['enable_search'] = ( isset($input['enable_search']) ) ? $input['enable_search'] : 'no';
                $input['enable_page_peel'] = $input['enable_page_peel'];
		$input['page_peel_url'] = esc_url_raw($input['page_peel_url']);
                $input['enable_feedback'] = $input['enable_feedback'];
		$input['feedback_btn_text'] = ( $input['feedback_btn_text'] ) ? trim( stripslashes( $input['feedback_btn_text'] ) ) : $udesign_options['feedback_btn_text'];
		$input['feedback_url'] = esc_url_raw($input['feedback_url']);
                $input['feedback_position_fixed'] = $input['feedback_position_fixed'];
		$input['feedback_button_color'] = ( ctype_alnum($input['feedback_button_color']) ) ? strtoupper(stripslashes($input['feedback_button_color'])) : $udesign_options['feedback_button_color'];
                $input['enable_prettyPhoto_script'] = $input['enable_prettyPhoto_script'];
		$input['udesign_pretty_photo_style_theme'] = ($input['udesign_pretty_photo_style_theme']) ? $input['udesign_pretty_photo_style_theme'] : $udesign_options['udesign_pretty_photo_style_theme'];
                $input['udesign_disable_pretty_photo_gallery_overlay'] = $input['udesign_disable_pretty_photo_gallery_overlay'];
                $input['disable_the_theme_update_notifier'] = $input['disable_the_theme_update_notifier'];
                $input['show_breadcrumbs'] = $input['show_breadcrumbs'];
                $input['enable_udesign_schema_tags'] = $input['enable_udesign_schema_tags'];
                $input['udesign_disable_img_cropping'] = $input['udesign_disable_img_cropping'];
                $input['udesign_enable_retina_images'] = $input['udesign_enable_retina_images'];
                $input['disable_smooth_scrolling_on_pages'] = $input['disable_smooth_scrolling_on_pages'];
                $input['enable_default_style_css'] = $input['enable_default_style_css'];

		// Main Menu Options.
                $input['fixed_main_menu'] = $input['fixed_main_menu'];
                $input['fixed_menu_logo_disabled'] = $input['fixed_menu_logo_disabled'];
		$input['fixed_menu_logo'] = esc_url_raw($input['fixed_menu_logo']);
                $input['add_fixed_menu_shadow'] = $input['add_fixed_menu_shadow'];
                $input['remove_fixed_menu_background_image'] = $input['remove_fixed_menu_background_image'];
                $input['remove_fixed_menu_on_mobile_devices'] = $input['remove_fixed_menu_on_mobile_devices'];
		$input['main_menu_alignment'] = ($input['main_menu_alignment']) ? $input['main_menu_alignment'] : $udesign_options['main_menu_alignment'];
		$input['main_menu_vertical_positioning'] =  ( $input['main_menu_vertical_positioning'] >= 0  ) ? $input['main_menu_vertical_positioning'] : $udesign_options['main_menu_vertical_positioning'];
		$input['submenu_arrows'] =  ( $input['submenu_arrows'] ) ? $input['submenu_arrows'] : $udesign_options['submenu_arrows'];
                $input['remove_border_under_menu'] = $input['remove_border_under_menu'];
		// Secondary Menu Options.
                $input['enable_secondary_menu_bar'] = $input['enable_secondary_menu_bar'];
		$input['secondary_menu_text_area_1'] = stripslashes($input['secondary_menu_text_area_1']);
		$input['secondary_menu_text_area_2'] = stripslashes($input['secondary_menu_text_area_2']);
		$input['secondary_menu_term_id'] = ($input['secondary_menu_term_id']) ? $input['secondary_menu_term_id'] : $udesign_options['secondary_menu_term_id'];
		$input['secondary_menu_text_area_1_alignment'] = ($input['secondary_menu_text_area_1_alignment']) ? $input['secondary_menu_text_area_1_alignment'] : $udesign_options['secondary_menu_text_area_1_alignment'];
		$input['secondary_menu_text_area_2_alignment'] = ($input['secondary_menu_text_area_2_alignment']) ? $input['secondary_menu_text_area_2_alignment'] : $udesign_options['secondary_menu_text_area_2_alignment'];
		$input['secondary_menu_text_alignment'] = ($input['secondary_menu_text_alignment']) ? $input['secondary_menu_text_alignment'] : $udesign_options['secondary_menu_text_alignment'];
                // Make sure the total secondary menu bar items' width don't exceed 24.
                $secondary_menu_total_width_is_ok = ( $input['secondary_menu_text_area_1_width'] + $input['secondary_menu_text_area_2_width'] + $input['secondary_menu_width'] <= 24 ) ? true : false;
                $input['secondary_menu_text_area_1_width'] = ( $secondary_menu_total_width_is_ok ) ? $input['secondary_menu_text_area_1_width'] : $udesign_options['secondary_menu_text_area_1_width'];
                $input['secondary_menu_text_area_2_width'] = ( $secondary_menu_total_width_is_ok ) ? $input['secondary_menu_text_area_2_width'] : $udesign_options['secondary_menu_text_area_2_width'];
                $input['secondary_menu_width'] = ( $secondary_menu_total_width_is_ok ) ? $input['secondary_menu_width'] : $udesign_options['secondary_menu_width'];
		$input['secondary_menu_items_order'] = ($input['secondary_menu_items_order']) ? $input['secondary_menu_items_order'] : $udesign_options['secondary_menu_items_order'];
                
                // Layout Options.
		$input['page_title_position'] = (  $input['page_title_position'] ) ? $input['page_title_position'] : $udesign_options['page_title_position'];
                $input['home_page_col_1_fixed'] = $input['home_page_col_1_fixed'];
                $input['remove_default_page_sidebar'] = $input['remove_default_page_sidebar'];
		$input['pages_sidebar'] = ($input['pages_sidebar']) ? $input['pages_sidebar'] : $udesign_options['pages_sidebar'];
		$input['pages_sidebar_2'] = ($input['pages_sidebar_2']) ? $input['pages_sidebar_2'] : $udesign_options['pages_sidebar_2'];
		$input['pages_sidebar_3'] = ($input['pages_sidebar_3']) ? $input['pages_sidebar_3'] : $udesign_options['pages_sidebar_3'];
		$input['pages_sidebar_4'] = ($input['pages_sidebar_4']) ? $input['pages_sidebar_4'] : $udesign_options['pages_sidebar_4'];
		$input['pages_sidebar_5'] = ($input['pages_sidebar_5']) ? $input['pages_sidebar_5'] : $udesign_options['pages_sidebar_5'];
		$input['pages_sidebar_6'] = ($input['pages_sidebar_6']) ? $input['pages_sidebar_6'] : $udesign_options['pages_sidebar_6'];
		$input['pages_sidebar_7'] = ($input['pages_sidebar_7']) ? $input['pages_sidebar_7'] : $udesign_options['pages_sidebar_7'];
		$input['pages_sidebar_8'] = ($input['pages_sidebar_8']) ? $input['pages_sidebar_8'] : $udesign_options['pages_sidebar_8'];
		$input['sitemap_sidebar'] = ($input['sitemap_sidebar']) ? $input['sitemap_sidebar'] : $udesign_options['sitemap_sidebar'];
                $input['show_comments_on_pages'] = $input['show_comments_on_pages'];
                $input['max_theme_width'] = $input['max_theme_width'];
		$input['global_theme_width'] = ( is_numeric( $input['global_theme_width']  ) && $input['global_theme_width'] > 959 && $input['global_theme_width'] < 1601 ) ? $input['global_theme_width'] : $udesign_options['global_theme_width'];
		$input['global_sidebar_width'] = ( is_numeric( $input['global_sidebar_width']  ) && $input['global_sidebar_width'] > 19 && $input['global_sidebar_width'] < 51 ) ? $input['global_sidebar_width'] : $udesign_options['global_sidebar_width'];
		$input['udesign_content_width'] = ( is_numeric( $input['udesign_content_width']  ) && $input['udesign_content_width'] > 599 && $input['udesign_content_width'] < 1601 ) ? $input['udesign_content_width'] : $udesign_options['udesign_content_width'];
                
		// Font Settings.
                $gf_general_font = $gf_top_nav_font = $gf_headings_font = $gf_heading1_font = $gf_heading2_font = $gf_heading3_font = $gf_heading4_font = $gf_heading5_font = $gf_heading6_font = $google_font_name_and_variant = $google_font_subsets = array();
                
                // General Body Text Font.
		if( $input['general_font_family'] && ( in_array( $input['general_font_family'], $google_webfonts ) ) ) { // If a Google Web Font is selected
			$input['general_font_variant'] = ( $input['general_font_variant'] ) ? $input['general_font_variant'] : $udesign_options['general_font_variant'];
			$input['general_font_subset'] = ( $input['general_font_subset'] ) ? $input['general_font_subset'] : $udesign_options['general_font_subset'];
			// Generate specially formatted array containing all of the above font options to be parsed later in "functions.php" for the browser.
			$gf_general_font = array( $input['general_font_family'] => array( "font_variant" => $input['general_font_variant'], "font_subset" => $input['general_font_subset'] ) );
                } else { // The case when generic font is selected.
			$input['general_font_family'] = ( $input['general_font_family'] ) ? $input['general_font_family'] : $udesign_options['general_font_family'];
                }
		$input['general_font_size'] = ( $input['general_font_size'] ) ? $input['general_font_size'] : $udesign_options['general_font_size'];
                $input['general_font_line_height'] = ( is_numeric( $input['general_font_line_height'] ) && $input['general_font_line_height'] >= 0.2 && $input['general_font_line_height'] <= 5.0 ) ? abs($input['general_font_line_height']) : $udesign_options['general_font_line_height'];
		
                // Top Navination Font.
		if( $input['top_nav_font_family'] && ( in_array( $input['top_nav_font_family'], $google_webfonts ) ) ) { // If a Google Web Font is selected
			$input['top_nav_font_variant'] = ( $input['top_nav_font_variant'] ) ? $input['top_nav_font_variant'] : $udesign_options['top_nav_font_variant'];
			$input['top_nav_font_subset'] = ( $input['top_nav_font_subset'] ) ? $input['top_nav_font_subset'] : $udesign_options['top_nav_font_subset'];
			// Generate specially formatted array containing all of the above font options to be parsed later in "functions.php" for the browser
			$gf_top_nav_font = array( $input['top_nav_font_family'] => array( "font_variant" => $input['top_nav_font_variant'], "font_subset" => $input['top_nav_font_subset'] ) );
                } else { // The case when generic font is selected.
			$input['top_nav_font_family'] = ( $input['top_nav_font_family'] ) ? $input['top_nav_font_family'] : $udesign_options['top_nav_font_family'];
                }
		$input['top_nav_font_size'] = ( $input['top_nav_font_size'] ) ? $input['top_nav_font_size'] : $udesign_options['top_nav_font_size'];
                
                // Headings Fonts.
		if( $input['headings_font_family'] && ( in_array( $input['headings_font_family'], $google_webfonts ) ) ) { // If a Google Web Font is selected
			$input['headings_font_variant'] = ( $input['headings_font_variant'] ) ? $input['headings_font_variant'] : $udesign_options['headings_font_variant'];
			$input['headings_font_subset'] = ( $input['headings_font_subset'] ) ? $input['headings_font_subset'] : $udesign_options['headings_font_subset'];
			// Generate specially formatted array containing all of the above font options to be parsed later in "functions.php" for the browser.
			$gf_headings_font = array( $input['headings_font_family'] => array( "font_variant" => $input['headings_font_variant'], "font_subset" => $input['headings_font_subset'] ) );
                } else { // The case when generic font is selected.
			$input['headings_font_family'] = ( $input['headings_font_family'] ) ? $input['headings_font_family'] : $udesign_options['headings_font_family'];
                }
		$input['headings_font_size_coefficient'] = ( $input['headings_font_size_coefficient'] ) ? $input['headings_font_size_coefficient'] : $udesign_options['headings_font_size_coefficient'];
                $input['headings_font_line_height'] = ( is_numeric( $input['headings_font_line_height'] ) && $input['headings_font_line_height'] >= 0.2 && $input['headings_font_line_height'] <= 5.0 ) ? abs($input['headings_font_line_height']) : $udesign_options['headings_font_line_height'];

                /**
                 *  Heading 1 through 6
                 * 
                 *  Dynamically generated names:
                 *      'heading1_font_family', 'heading1_font_variant', 'heading1_font_subset', 'heading1_font_size', 'heading1_font_line_height'
                 *      'heading2_font_family', 'heading2_font_variant', 'heading2_font_subset', 'heading2_font_size', 'heading2_font_line_height'
                 *      'heading3_font_family', 'heading3_font_variant', 'heading3_font_subset', 'heading3_font_size', 'heading3_font_line_height'
                 *      'heading4_font_family', 'heading4_font_variant', 'heading4_font_subset', 'heading4_font_size', 'heading4_font_line_height'
                 *      'heading5_font_family', 'heading5_font_variant', 'heading5_font_subset', 'heading5_font_size', 'heading5_font_line_height'
                 *      'heading6_font_family', 'heading6_font_variant', 'heading6_font_subset', 'heading6_font_size', 'heading6_font_line_height'
                 * 
                 *  Dynamically generated variables:
                 *      $gf_heading1_font, $gf_heading2_font, $gf_heading3_font, $gf_heading4_font, $gf_heading5_font, $gf_heading6_font
                 * 
                 */
                for ( $i = 1; $i <= 6; $i++ ) {
			if( $input['heading'.$i.'_font_family'] && ( in_array( $input['heading'.$i.'_font_family'], $google_webfonts ) ) ) { // If a Google Web Font is selected.
				$input['heading'.$i.'_font_variant'] = ( $input['heading'.$i.'_font_variant'] ) ? $input['heading'.$i.'_font_variant'] : $udesign_options['heading'.$i.'_font_variant'];
				$input['heading'.$i.'_font_subset'] = ( $input['heading'.$i.'_font_subset'] ) ? $input['heading'.$i.'_font_subset'] : $udesign_options['heading'.$i.'_font_subset'];
				// Generate specially formatted array containing all of the above font options to be parsed later in "functions.php" for the browser.
				${'gf_heading'.$i.'_font'} = array( $input['heading'.$i.'_font_family'] => array( "font_variant" => $input['heading'.$i.'_font_variant'], "font_subset" => $input['heading'.$i.'_font_subset'] ) );
			} else { // The case when generic font is selected.
				$input['heading'.$i.'_font_family'] = ( $input['heading'.$i.'_font_family'] ) ? $input['heading'.$i.'_font_family'] : $udesign_options['heading'.$i.'_font_family'];
			}
			$input['heading'.$i.'_font_size'] = ( $input['heading'.$i.'_font_size'] ) ? $input['heading'.$i.'_font_size'] : $udesign_options['heading'.$i.'_font_size'];
			$input['heading'.$i.'_font_line_height'] = ( is_numeric( $input['heading'.$i.'_font_line_height'] ) && $input['heading'.$i.'_font_line_height'] >= 0.2 && $input['heading'.$i.'_font_line_height'] <= 5.0 ) ? abs($input['heading'.$i.'_font_line_height']) : $udesign_options['heading'.$i.'_font_line_height'];
                }
                
                // Make sure Googe Fonts are enabled before proceeding with generating the final 'google_web_fonts_assoc' array.
		if( isset($input['enable_google_web_fonts']) && $input['enable_google_web_fonts'] == 'yes' && 
                                            (!empty($gf_general_font) || !empty($gf_top_nav_font) || !empty($gf_headings_font) || 
                                             !empty($gf_heading1_font) || !empty($gf_heading2_font) || !empty($gf_heading3_font) ||
                                             !empty($gf_heading4_font) || !empty($gf_heading5_font) || !empty($gf_heading6_font) ) ) {
			// This array will merge two or more arrays recursively.
			$all_selected_gfs = array_merge_recursive( $gf_general_font, $gf_top_nav_font, $gf_headings_font, $gf_heading1_font, $gf_heading2_font, $gf_heading3_font, $gf_heading4_font, $gf_heading5_font, $gf_heading6_font );
			foreach( $all_selected_gfs as $font_name => $font_optns ) {
				$google_font_variants = ( is_array($font_optns['font_variant']) ) ? implode(",", array_unique($font_optns['font_variant'])) : $font_optns['font_variant'];
				$google_font_subsets[] = ( is_array($font_optns['font_subset']) ) ? implode(",", array_unique($font_optns['font_subset'])) : $font_optns['font_subset'];
				$font = $font_name . ":" . $google_font_variants;
				$google_font_name_and_variant[] = $font;
			}
			$input['google_web_fonts_assoc'] = array( 
					'font_name_and_variant'  =>  $google_font_name_and_variant,
					'font_subsets'           =>  array_unique($google_font_subsets)
				);
		} else { // If disabled clear the 'google_web_fonts_assoc' array.
			unset($input['google_web_fonts_assoc']);
			$input['google_web_fonts_assoc'] = array();
		}
                
                
                
		// Custom Colors.
		$input['body_text_color'] = ( ctype_alnum($input['body_text_color']) ) ? strtoupper(stripslashes($input['body_text_color'])) : $udesign_options['body_text_color'];
		$input['main_link_color'] = ( ctype_alnum($input['main_link_color']) ) ? strtoupper(stripslashes($input['main_link_color'])) : $udesign_options['main_link_color'];
		$input['main_link_color_hover'] = ( ctype_alnum($input['main_link_color_hover']) ) ? strtoupper(stripslashes($input['main_link_color_hover'])) : $udesign_options['main_link_color_hover'];
		$input['main_headings_color'] = ( ctype_alnum($input['main_headings_color']) ) ? strtoupper(stripslashes($input['main_headings_color'])) : $udesign_options['main_headings_color'];
		$input['top_bg_color'] = ( ctype_alnum($input['top_bg_color']) ) ? strtoupper(stripslashes($input['top_bg_color'])) : $udesign_options['top_bg_color'];
		$input['top_text_color'] = ( ctype_alnum($input['top_text_color']) ) ? strtoupper(stripslashes($input['top_text_color'])) : $udesign_options['top_text_color'];
		$input['top_nav_background_color'] = ( ctype_alnum($input['top_nav_background_color']) ) ? strtoupper(stripslashes($input['top_nav_background_color'])) : $udesign_options['top_nav_background_color'];
		$input['top_nav_background_opacity'] = ( is_numeric( $input['top_nav_background_opacity'] ) && $input['top_nav_background_opacity'] >= 0 && $input['top_nav_background_opacity'] <= 1 ) ? abs($input['top_nav_background_opacity']) : $udesign_options['top_nav_background_opacity'];
		$input['top_nav_link_color'] = ( ctype_alnum($input['top_nav_link_color']) ) ? strtoupper(stripslashes($input['top_nav_link_color'])) : $udesign_options['top_nav_link_color'];
		$input['top_nav_active_link_color'] = ( ctype_alnum($input['top_nav_active_link_color']) ) ? strtoupper(stripslashes($input['top_nav_active_link_color'])) : $udesign_options['top_nav_active_link_color'];
		$input['top_nav_hover_link_color'] = ( ctype_alnum($input['top_nav_hover_link_color']) ) ? strtoupper(stripslashes($input['top_nav_hover_link_color'])) : $udesign_options['top_nav_hover_link_color'];
		$input['dropdown_nav_link_color'] = ( ctype_alnum($input['dropdown_nav_link_color']) ) ? strtoupper(stripslashes($input['dropdown_nav_link_color'])) : $udesign_options['dropdown_nav_link_color'];
		$input['dropdown_nav_hover_link_color'] = ( ctype_alnum($input['dropdown_nav_hover_link_color']) ) ? strtoupper(stripslashes($input['dropdown_nav_hover_link_color'])) : $udesign_options['dropdown_nav_hover_link_color'];
		$input['dropdown_nav_background_color'] = ( ctype_alnum($input['dropdown_nav_background_color']) ) ? strtoupper(stripslashes($input['dropdown_nav_background_color'])) : $udesign_options['dropdown_nav_background_color'];
		$input['dropdown_nav_background_opacity'] = ( is_numeric( $input['dropdown_nav_background_opacity'] ) && $input['dropdown_nav_background_opacity'] >= 0 && $input['dropdown_nav_background_opacity'] <= 1 ) ? abs($input['dropdown_nav_background_opacity']) : $udesign_options['dropdown_nav_background_opacity'];
		$input['sec_menu_bg_color'] = ( ctype_alnum($input['sec_menu_bg_color']) ) ? strtoupper(stripslashes($input['sec_menu_bg_color'])) : $udesign_options['sec_menu_bg_color'];
		$input['sec_menu_bg_opacity'] = ( is_numeric( $input['sec_menu_bg_opacity'] ) && $input['sec_menu_bg_opacity'] >= 0 && $input['sec_menu_bg_opacity'] <= 1 ) ? abs($input['sec_menu_bg_opacity']) : $udesign_options['sec_menu_bg_opacity'];
		$input['sec_menu_text_color'] = ( ctype_alnum($input['sec_menu_text_color']) ) ? strtoupper(stripslashes($input['sec_menu_text_color'])) : $udesign_options['sec_menu_text_color'];
		$input['sec_menu_link_color'] = ( ctype_alnum($input['sec_menu_link_color']) ) ? strtoupper(stripslashes($input['sec_menu_link_color'])) : $udesign_options['sec_menu_link_color'];
		$input['sec_menu_link_hover_color'] = ( ctype_alnum($input['sec_menu_link_hover_color']) ) ? strtoupper(stripslashes($input['sec_menu_link_hover_color'])) : $udesign_options['sec_menu_link_hover_color'];
		$input['page_title_color'] = ( ctype_alnum($input['page_title_color']) ) ? strtoupper(stripslashes($input['page_title_color'])) : $udesign_options['page_title_color'];
		$input['page_title_bg_color'] = ( ctype_alnum($input['page_title_bg_color']) ) ? strtoupper(stripslashes($input['page_title_bg_color'])) : $udesign_options['page_title_bg_color'];
		$input['header_bg_color'] = ( ctype_alnum($input['header_bg_color']) ) ? strtoupper(stripslashes($input['header_bg_color'])) : $udesign_options['header_bg_color'];
		$input['main_content_bg'] = ( ctype_alnum($input['main_content_bg']) ) ? strtoupper(stripslashes($input['main_content_bg'])) : $udesign_options['main_content_bg'];
		$input['widget_title_color'] = ( ctype_alnum($input['widget_title_color']) ) ? strtoupper(stripslashes($input['widget_title_color'])) : $udesign_options['widget_title_color'];
		$input['widget_text_color'] = ( ctype_alnum($input['widget_text_color']) ) ? strtoupper(stripslashes($input['widget_text_color'])) : $udesign_options['widget_text_color'];
		$input['widget_bg_color'] = ( ctype_alnum($input['widget_bg_color']) ) ? strtoupper(stripslashes($input['widget_bg_color'])) : $udesign_options['widget_bg_color'];
		$input['bottom_bg_color'] = ( ctype_alnum($input['bottom_bg_color']) ) ? strtoupper(stripslashes($input['bottom_bg_color'])) : $udesign_options['bottom_bg_color'];
		$input['bottom_title_color'] = ( ctype_alnum($input['bottom_title_color']) ) ? strtoupper(stripslashes($input['bottom_title_color'])) : $udesign_options['bottom_title_color'];
		$input['bottom_text_color'] = ( ctype_alnum($input['bottom_text_color']) ) ? strtoupper(stripslashes($input['bottom_text_color'])) : $udesign_options['bottom_text_color'];
		$input['bottom_link_color'] = ( ctype_alnum($input['bottom_link_color']) ) ? strtoupper(stripslashes($input['bottom_link_color'])) : $udesign_options['bottom_link_color'];
		$input['bottom_hover_link_color'] = ( ctype_alnum($input['bottom_hover_link_color']) ) ? strtoupper(stripslashes($input['bottom_hover_link_color'])) : $udesign_options['bottom_hover_link_color'];
		$input['footer_bg_color'] = ( ctype_alnum($input['footer_bg_color']) ) ? strtoupper(stripslashes($input['footer_bg_color'])) : $udesign_options['footer_bg_color'];
		$input['footer_text_color'] = ( ctype_alnum($input['footer_text_color']) ) ? strtoupper(stripslashes($input['footer_text_color'])) : $udesign_options['footer_text_color'];
		$input['footer_link_color'] = ( ctype_alnum($input['footer_link_color']) ) ? strtoupper(stripslashes($input['footer_link_color'])) : $udesign_options['footer_link_color'];
		$input['footer_hover_link_color'] = ( ctype_alnum($input['footer_hover_link_color']) ) ? strtoupper(stripslashes($input['footer_hover_link_color'])) : $udesign_options['footer_hover_link_color'];
		$input['top_bg_img'] = esc_url_raw($input['top_bg_img']);
		$input['top_bg_img_repeat'] = $input['top_bg_img_repeat'];
		$input['top_bg_img_position_horizontal'] = $input['top_bg_img_position_horizontal'];
		$input['top_bg_img_position_vertical'] = $input['top_bg_img_position_vertical'];
		$input['header_bg_img'] = esc_url_raw($input['header_bg_img']);
		$input['header_bg_img_repeat'] = $input['header_bg_img_repeat'];
		$input['header_bg_img_position_horizontal'] = $input['header_bg_img_position_horizontal'];
		$input['header_bg_img_position_vertical'] = $input['header_bg_img_position_vertical'];
		$input['home_page_before_content_bg_img'] = esc_url_raw($input['home_page_before_content_bg_img']);
		$input['home_page_before_content_bg_img_repeat'] = $input['home_page_before_content_bg_img_repeat'];
		$input['home_page_before_content_bg_img_position_horizontal'] = $input['home_page_before_content_bg_img_position_horizontal'];
		$input['home_page_before_content_bg_img_position_vertical'] = $input['home_page_before_content_bg_img_position_vertical'];
		$input['page_title_bg_img'] = esc_url_raw($input['page_title_bg_img']);
		$input['page_title_bg_img_repeat'] = $input['page_title_bg_img_repeat'];
		$input['page_title_bg_img_position_horizontal'] = $input['page_title_bg_img_position_horizontal'];
		$input['page_title_bg_img_position_vertical'] = $input['page_title_bg_img_position_vertical'];
		$input['main_content_bg_img'] = esc_url_raw($input['main_content_bg_img']);
		$input['main_content_bg_img_repeat'] = $input['main_content_bg_img_repeat'];
		$input['main_content_bg_img_position_horizontal'] = $input['main_content_bg_img_position_horizontal'];
		$input['main_content_bg_img_position_vertical'] = $input['main_content_bg_img_position_vertical'];
		$input['bottom_bg_img'] = esc_url_raw($input['bottom_bg_img']);
		$input['bottom_bg_img_repeat'] = $input['bottom_bg_img_repeat'];
		$input['bottom_bg_img_position_horizontal'] = $input['bottom_bg_img_position_horizontal'];
		$input['bottom_bg_img_position_vertical'] = $input['bottom_bg_img_position_vertical'];
		$input['footer_bg_img'] = esc_url_raw($input['footer_bg_img']);
		$input['footer_bg_img_repeat'] = $input['footer_bg_img_repeat'];
		$input['footer_bg_img_position_horizontal'] = $input['footer_bg_img_position_horizontal'];
		$input['footer_bg_img_position_vertical'] = $input['footer_bg_img_position_vertical'];
		$input['one_continuous_bg_img'] = esc_url_raw($input['one_continuous_bg_img']);
		$input['one_continuous_bg_img_repeat'] = $input['one_continuous_bg_img_repeat'];
		$input['one_continuous_bg_img_position_horizontal'] = $input['one_continuous_bg_img_position_horizontal'];
		$input['one_continuous_bg_img_position_vertical'] = $input['one_continuous_bg_img_position_vertical'];
		$input['one_continuous_bg_img_fixed'] = $input['one_continuous_bg_img_fixed'];
		$input['one_continuous_bg_img_with_other_bg_imgs'] = $input['one_continuous_bg_img_with_other_bg_imgs'];
		$input['udesign_remove_horizontal_rulers'] = $input['udesign_remove_horizontal_rulers'];

		// Front Page Sliders.
		$input['current_slider'] = ( $input['current_slider'] ) ? $input['current_slider'] : $udesign_options['current_slider'];

		// Cycle 1.
		$input['c1_slides_order_str'] = ( $input['c1_slides_order_str'] ) ? $input['c1_slides_order_str'] : $udesign_options['c1_slides_order_str'];
		$c1_slides_array = explode( ',', $input['c1_slides_order_str'] );
		foreach( $c1_slides_array as $slide_row_number ) {
			$input['c1_slide_img_url_'.$slide_row_number] = ( $input['c1_slide_img_url_'.$slide_row_number] ) ? esc_url_raw( $input['c1_slide_img_url_'.$slide_row_number] ) : $udesign_options['c1_slide_img_url_'.$slide_row_number];
			$input['c1_transition_type_'.$slide_row_number] = (  $input['c1_transition_type_'.$slide_row_number] ) ? $input['c1_transition_type_'.$slide_row_number] : $udesign_options['c1_transition_type_'.$slide_row_number];
			if ($input['c1_slide_link_url_'.$slide_row_number] == ' ') { // If space then remove url from field.
				$input['c1_slide_link_url_'.$slide_row_number] = '';
			} elseif ($input['c1_slide_link_url_'.$slide_row_number] == '') { // If blank then grab the previously saved value for the link.
				$input['c1_slide_link_url_'.$slide_row_number] = $udesign_options['c1_slide_link_url_'.$slide_row_number];
			} else { // if some url, clean it, format it an save it
				$input['c1_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c1_slide_link_url_'.$slide_row_number]);
			}
			$input['c1_slide_link_target_'.$slide_row_number] = (  $input['c1_slide_link_target_'.$slide_row_number] ) ? $input['c1_slide_link_target_'.$slide_row_number] : $udesign_options['c1_slide_link_target_'.$slide_row_number];
			$input['c1_slide_image_alt_tag_'.$slide_row_number] = ($input['c1_slide_image_alt_tag_'.$slide_row_number]) ? trim(stripslashes($input['c1_slide_image_alt_tag_'.$slide_row_number])) : $udesign_options['c1_slide_image_alt_tag_'.$slide_row_number];
		}
		$input['c1_speed'] = is_numeric( $input['c1_speed'] ) ? absint( $input['c1_speed'] ) : $udesign_options['c1_speed'];
		$input['c1_timeout'] = is_numeric( $input['c1_timeout'] ) ? absint( $input['c1_timeout'] ) : $udesign_options['c1_timeout'];

		// Cycle 2.
		$input['c2_slides_order_str'] = ( $input['c2_slides_order_str'] ) ? $input['c2_slides_order_str'] : $udesign_options['c2_slides_order_str'];
		$c2_slides_array = explode( ',', $input['c2_slides_order_str'] );
		foreach( $c2_slides_array as $slide_row_number ) {
			$input['c2_slide_img_url_'.$slide_row_number] = ($input['c2_slide_img_url_'.$slide_row_number]) ? esc_url_raw($input['c2_slide_img_url_'.$slide_row_number]) : $udesign_options['c2_slide_img_url_'.$slide_row_number];
			$input['c2_transition_type_'.$slide_row_number] = (  $input['c2_transition_type_'.$slide_row_number] ) ? $input['c2_transition_type_'.$slide_row_number] : $udesign_options['c2_transition_type_'.$slide_row_number];
			if ( $input['c2_slide_link_url_'.$slide_row_number] == ' ' ) { // If space then remove url from field.
				$input['c2_slide_link_url_'.$slide_row_number] = '';
			} elseif ( $input['c2_slide_link_url_'.$slide_row_number] == '' ) { // If blank then grab the previously saved value for the link.
				$input['c2_slide_link_url_'.$slide_row_number] = $udesign_options['c2_slide_link_url_'.$slide_row_number];
			} else { // If some url, clean it, format it and save it.
				$input['c2_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c2_slide_link_url_'.$slide_row_number]);
			}
			$input['c2_slide_link_target_'.$slide_row_number] = (  $input['c2_slide_link_target_'.$slide_row_number] ) ? $input['c2_slide_link_target_'.$slide_row_number] : $udesign_options['c2_slide_link_target_'.$slide_row_number];
			$input['c2_slide_image_alt_tag_'.$slide_row_number] = ($input['c2_slide_image_alt_tag_'.$slide_row_number]) ? trim(stripslashes($input['c2_slide_image_alt_tag_'.$slide_row_number])) : $udesign_options['c2_slide_image_alt_tag_'.$slide_row_number];
			$input['c2_slide_default_info_txt_'.$slide_row_number] = ($input['c2_slide_default_info_txt_'.$slide_row_number]) ? stripslashes($input['c2_slide_default_info_txt_'.$slide_row_number]) : $udesign_options['c2_slide_default_info_txt_'.$slide_row_number];
			$input['c2_slide_button_txt_'.$slide_row_number] = ($input['c2_slide_button_txt_'.$slide_row_number]) ? stripslashes($input['c2_slide_button_txt_'.$slide_row_number]) : $udesign_options['c2_slide_button_txt_'.$slide_row_number];
			$input['c2_slide_button_style_'.$slide_row_number] = (  $input['c2_slide_button_style_'.$slide_row_number] ) ? $input['c2_slide_button_style_'.$slide_row_number] : $udesign_options['c2_slide_button_style_'.$slide_row_number];
		}
		$input['c2_speed'] = is_numeric( $input['c2_speed'] ) ? absint($input['c2_speed']) : $udesign_options['c2_speed'];
		$input['c2_timeout'] = is_numeric( $input['c2_timeout'] ) ? absint($input['c2_timeout']) : $udesign_options['c2_timeout'];
		$input['c2_text_color'] = ( ctype_alnum($input['c2_text_color']) ) ? strtoupper(stripslashes($input['c2_text_color'])) : $udesign_options['c2_text_color'];
		$input['c2_slider_text_size'] = (  $input['c2_slider_text_size'] ) ? $input['c2_slider_text_size'] : $udesign_options['c2_slider_text_size'];
		$input['c2_slider_text_line_height'] = (  $input['c2_slider_text_line_height'] ) ? $input['c2_slider_text_line_height'] : $udesign_options['c2_slider_text_line_height'];
                

		// Cycle 3.
		$input['c3_slides_order_str'] = ($input['c3_slides_order_str']) ? $input['c3_slides_order_str'] : $udesign_options['c3_slides_order_str'];
		$c3_slides_array = explode( ',', $input['c3_slides_order_str'] );
		foreach( $c3_slides_array as $slide_row_number ) {
			if ( $input['c3_slide_img_url_'.$slide_row_number] == ' ' ) { // If space then remove url from field.
				$input['c3_slide_img_url_'.$slide_row_number] = '';
			} elseif ( $input['c3_slide_img_url_'.$slide_row_number] == '' ) { // If blank then grab the previously saved value for the link.
				$input['c3_slide_img_url_'.$slide_row_number] = $udesign_options['c3_slide_img_url_'.$slide_row_number];
			} else { // if some url, clean it, format it and save it.
				$input['c3_slide_img_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_img_url_'.$slide_row_number]);
			}
			if ( $input['c3_slide_link_url_'.$slide_row_number] == ' ' ) { // If space then remove url from field.
				$input['c3_slide_link_url_'.$slide_row_number] = '';
			} elseif ( $input['c3_slide_link_url_'.$slide_row_number] == '' ) { // If blank then grab the previously saved value for the link.
				$input['c3_slide_link_url_'.$slide_row_number] = $udesign_options['c3_slide_link_url_'.$slide_row_number];
			} else { // If some url, clean it, format it and save it.
				$input['c3_slide_link_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_link_url_'.$slide_row_number]);
			}
			if ( $input['c3_slide_img2_url_'.$slide_row_number] == ' ' ) { // If space then remove url from field.
				$input['c3_slide_img2_url_'.$slide_row_number] = '';
			} elseif ( $input['c3_slide_img2_url_'.$slide_row_number] == '' ) { // If blank then grab the previously saved value for the link.
				$input['c3_slide_img2_url_'.$slide_row_number] = $udesign_options['c3_slide_img2_url_'.$slide_row_number];
			} else { // If some url, clean it, format it and save it.
				$input['c3_slide_img2_url_'.$slide_row_number] = esc_url_raw($input['c3_slide_img2_url_'.$slide_row_number]);
			}
			$input['c3_slide_link_target_'.$slide_row_number] = ( $input['c3_slide_link_target_'.$slide_row_number] ) ? $input['c3_slide_link_target_'.$slide_row_number] : $udesign_options['c3_slide_link_target_'.$slide_row_number];
			$input['c3_slide_image_alt_tag_'.$slide_row_number] = ( $input['c3_slide_image_alt_tag_'.$slide_row_number] ) ? trim( stripslashes( $input['c3_slide_image_alt_tag_' . $slide_row_number] ) ) : $udesign_options['c3_slide_image_alt_tag_'.$slide_row_number];
			$input['c3_slide_default_info_txt_'.$slide_row_number] = ( $input['c3_slide_default_info_txt_'.$slide_row_number] ) ? stripslashes( trim( $input['c3_slide_default_info_txt_'.$slide_row_number] ) ) : $udesign_options['c3_slide_default_info_txt_'.$slide_row_number];
		}
		$input['c3_timeout'] = is_numeric( $input['c3_timeout'] ) ? absint( $input['c3_timeout'] ) : $udesign_options['c3_timeout'];
		$input['c3_text_color'] = ( ctype_alnum($input['c3_text_color']) ) ? strtoupper(stripslashes($input['c3_text_color'])) : $udesign_options['c3_text_color'];
		$input['c3_slider_text_size'] = ( $input['c3_slider_text_size'] ) ? $input['c3_slider_text_size'] : $udesign_options['c3_slider_text_size'];
		$input['c3_slider_text_line_height'] = (  $input['c3_slider_text_line_height'] ) ? $input['c3_slider_text_line_height'] : $udesign_options['c3_slider_text_line_height'];
               

		// No slider.
		$input['no_slider_text'] = stripslashes($input['no_slider_text']);
                
		// Revolution slider.
		$input['rev_slider_shortcode'] = $input['rev_slider_shortcode'];

		// Portfolio Section.
                $input['portfolio_categories'] = array(); // Reset the $input['portfolio_categories'] option.
                $input['portfolio_pages_ids_array'] = array();  // Reset the $input['portfolio_pages_ids_array'] option.
		foreach ( $portfolio_pages_array as $portfolio_page_obj ) {
			$port_page_ID = $portfolio_page_obj->ID;
			if ( $input['portfolio_cat_for_page_'.$port_page_ID] !== '0' ) { // As long as the category has been assigned to a portfolio page, '0' means NOT.
				$input['portfolio_categories'][] = $input['portfolio_cat_for_page_'.$port_page_ID]; // Add new values to the array.
				$input['portfolio_pages_ids_array'][] = $port_page_ID; // Add new values to the 'portfolio_pages_ids_array' array.
			}
			$input['portfolio_items_per_page_for_page_'.$port_page_ID] = ( is_numeric( $input['portfolio_items_per_page_for_page_'.$port_page_ID] ) && $input['portfolio_items_per_page_for_page_'.$port_page_ID] > 0 ) ? absint($input['portfolio_items_per_page_for_page_'.$port_page_ID]) : $udesign_options['portfolio_items_per_page_for_page_'.$port_page_ID];
			$input['portfolio_do_not_link_adjacent_items_'.$port_page_ID] = $input['portfolio_do_not_link_adjacent_items_'.$port_page_ID];
		}
		$input['portfolio_categories'] = array_unique( $input['portfolio_categories'] );
		$input['portfolio_title_posistion'] = ($input['portfolio_title_posistion']) ? $input['portfolio_title_posistion'] : $udesign_options['portfolio_title_posistion'];
		$input['portfolio_sidebar'] = ($input['portfolio_sidebar']) ? $input['portfolio_sidebar'] : $udesign_options['portfolio_sidebar'];
                $input['show_portfolio_postmetadata'] = $input['show_portfolio_postmetadata'];
		$input['udesign_single_portfolio_postmetadata_location'] = (  $input['udesign_single_portfolio_postmetadata_location'] ) ? $input['udesign_single_portfolio_postmetadata_location'] : $udesign_options['udesign_single_portfolio_postmetadata_location'];
                $input['show_portfolio_postmetadata_author'] = $input['show_portfolio_postmetadata_author'];
                $input['show_portfolio_postmetadata_tags'] = $input['show_portfolio_postmetadata_tags'];
                $input['show_portfolio_comments'] = $input['show_portfolio_comments'];
                $input['remove_single_portfolio_sidebar'] = $input['remove_single_portfolio_sidebar'];
                $input['show_single_portfolio_navigation'] = $input['show_single_portfolio_navigation'];

		// Blog Section.
		$input['blog_sidebar'] = ($input['blog_sidebar']) ? $input['blog_sidebar'] : $udesign_options['blog_sidebar'];
                $input['show_excerpt'] = $input['show_excerpt'];
		$input['excerpt_length_in_words'] = is_numeric( $input['excerpt_length_in_words'] ) ? absint($input['excerpt_length_in_words']) : $udesign_options['excerpt_length_in_words'];
		$input['blog_button_text'] = trim(stripslashes($input['blog_button_text']));
		$input['exclude_portfolio_from_blog'] = $input['exclude_portfolio_from_blog'];
		$input['exclude_portfolio_from_recent_posts_widget'] = $input['exclude_portfolio_from_recent_posts_widget'];
		$input['exclude_portfolio_from_archives_widget'] = $input['exclude_portfolio_from_archives_widget'];
		$input['exclude_portfolio_from_main_query'] = $input['exclude_portfolio_from_main_query'];
                $input['show_postmetadata_author'] = $input['show_postmetadata_author'];
                $input['show_postmetadata_tags'] = $input['show_postmetadata_tags'];
                $input['show_archive_for_string'] = $input['show_archive_for_string'];
                $input['udesign_comment_field_to_bottom'] = $input['udesign_comment_field_to_bottom'];
                $input['show_comments_are_closed_message'] = $input['show_comments_are_closed_message'];
                $input['remove_blog_sidebar'] = $input['remove_blog_sidebar'];
                $input['remove_archive_sidebar'] = $input['remove_archive_sidebar'];
                $input['remove_single_sidebar'] = $input['remove_single_sidebar'];
		$input['udesign_single_view_postmetadata_location'] = (  $input['udesign_single_view_postmetadata_location'] ) ? $input['udesign_single_view_postmetadata_location'] : $udesign_options['udesign_single_view_postmetadata_location'];
                $input['show_single_post_navigation'] = $input['show_single_post_navigation'];
                $input['display_post_image_in_single_post'] = $input['display_post_image_in_single_post'];
                $input['enable_custom_featured_image'] = $input['enable_custom_featured_image'];
		$input['featured_image_width'] = is_numeric( $input['featured_image_width'] ) ? absint($input['featured_image_width']) : $udesign_options['featured_image_width'];
		$input['featured_image_height'] = is_numeric( $input['featured_image_height'] ) ? absint($input['featured_image_height']) : $udesign_options['featured_image_height'];
                $input['force_image_dimention'] = $input['force_image_dimention'];
		$input['featured_image_alignment'] = (  $input['featured_image_alignment'] ) ? $input['featured_image_alignment'] : $udesign_options['featured_image_alignment'];
                $input['remove_featured_image_frame'] = $input['remove_featured_image_frame'];
                
		// Contact Page.
		$input['contact_field_name1'] = stripslashes($input['contact_field_name1']);
		$input['contact_field_value1'] = stripslashes($input['contact_field_value1']);
		$input['contact_field_name2'] = stripslashes($input['contact_field_name2']);
		$input['contact_field_value2'] = stripslashes($input['contact_field_value2']);
		$input['contact_field_name3'] = stripslashes($input['contact_field_name3']);
		$input['contact_field_value3'] = stripslashes($input['contact_field_value3']);
		$input['contact_field_name4'] = stripslashes($input['contact_field_name4']);
		$input['contact_field_value4'] = stripslashes($input['contact_field_value4']);
		$input['contact_field_name5'] = stripslashes($input['contact_field_name5']);
		$input['contact_field_value5'] = stripslashes($input['contact_field_value5']);
		$input['contact_field_name6'] = stripslashes($input['contact_field_name6']);
		$input['contact_field_value6'] = stripslashes($input['contact_field_value6']);
		$input['contact_field_name7'] = stripslashes($input['contact_field_name7']);
		$input['contact_field_value7'] = stripslashes($input['contact_field_value7']);
		$input['contact_sidebar'] = ($input['contact_sidebar']) ? $input['contact_sidebar'] : $udesign_options['contact_sidebar'];
                $input['remove_contact_sidebar'] = $input['remove_contact_sidebar'];
                $input['NA_phone_format'] = $input['NA_phone_format'];
		$email_receipients = $this->email_receipients_are_valid($input['email_receipients']); // validate email(s)
		$input['email_receipients'] = ( $email_receipients ) ?  $email_receipients : $udesign_options['email_receipients'];
                // reCAPTCHA related fields.
		$input['recaptcha_publickey'] = trim(stripslashes($input['recaptcha_publickey']));
		$input['recaptcha_privatekey'] = trim(stripslashes($input['recaptcha_privatekey']));
		$input['recaptcha_enabled'] = ($input['recaptcha_publickey'] && $input['recaptcha_privatekey']) ? $input['recaptcha_enabled'] : 'no'; // disable ReCAPTCHA if publickey and privatekey are empty
		$input['recaptcha_lang'] = (  $input['recaptcha_lang'] ) ? $input['recaptcha_lang'] : $udesign_options['recaptcha_lang'];
                // Data Collection, GDPR and Privacy related fields.
		$input['data_collection_message_on'] = ( $input['data_collection_message_on'] ) ? $input['data_collection_message_on'] : 'no';
		$input['data_collection_message'] = ( $input['data_collection_message'] ) ? stripslashes( $input['data_collection_message'] ) : $udesign_options['data_collection_message'];
		$input['contact_consent_on'] = $input['contact_consent_on'];
		$input['contact_consent_text'] = ( $input['contact_consent_text'] ) ? stripslashes( $input['contact_consent_text'] ) : $udesign_options['contact_consent_text'];

		// Footer Options.
		$input['copyright_message'] = stripslashes($input['copyright_message']);
		$input['back_to_top'] =  ( $input['back_to_top'] ) ? $input['back_to_top'] : $udesign_options['back_to_top'];
                $input['show_wp_link_in_footer'] = $input['show_wp_link_in_footer'];
                $input['show_entries_rss_in_footer'] = $input['show_entries_rss_in_footer'];
                $input['show_comments_rss_in_footer'] = $input['show_comments_rss_in_footer'];
		$input['show_udesign_affiliate_link'] = $input['show_udesign_affiliate_link'];
		$input['affiliate_username'] = esc_url_raw( $input['affiliate_username'] );
                $input['udesign_sticky_footer'] = $input['udesign_sticky_footer'];
                
                // Responsive.
                $input['enable_responsive'] = $input['enable_responsive'];
		$input['responsive_logo_img'] = esc_url_raw($input['responsive_logo_img']);
		$input['responsive_logo_height'] = is_numeric( $input['responsive_logo_height'] ) ? absint($input['responsive_logo_height']) : $udesign_options['responsive_logo_height'];
                $input['responsive_remove_secondary_menu'] = $input['responsive_remove_secondary_menu'];
                $input['responsive_remove_slider_area'] = $input['responsive_remove_slider_area'];
                $input['responsive_remove_bg_images_960-720'] = $input['responsive_remove_bg_images_960-720'];
		$input['responsive_menu'] = (  $input['responsive_menu'] ) ? $input['responsive_menu'] : $udesign_options['responsive_menu'];
                $input['menu_2_screen_width'] = $input['menu_2_screen_width'];
                $input['responsive_pinch_to_zoom'] = $input['responsive_pinch_to_zoom'];
		$input['responsive_disable_pretty_photo_at_width'] = is_numeric( $input['responsive_disable_pretty_photo_at_width'] ) ? absint($input['responsive_disable_pretty_photo_at_width']) : $udesign_options['responsive_disable_pretty_photo_at_width'];

		// Statistics.
		$input['google_analytics'] = stripslashes($input['google_analytics']);
                
                // Advanced Options.
                $input['show_udesign_action_hooks'] = $input['show_udesign_action_hooks'];
                
		return $input;
	}

	function on_save_changes() {
		// User permission check.
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( "Cheatin' uh?", 'u-design' ) );
		}
		// Cross check the given referer.
		check_admin_referer( 'udesign_options_page-options' );
		// Lets redirect the post request into get request (you may add additional params at the url, if you need to show save results.
		wp_redirect( $_POST['_wp_http_referer'] );
	}
        
	/**
	 * Validate email recipient(s) email addresses
	 *
	 * @param string $receipients, a string of CSV email addresses
	 * @return bool|mixed False on failure or a string of properly formatted CSV email addresses otherwise
	 */
	function email_receipients_are_valid ( $receipients ) {
	    	$emails_array = explode( ",", $receipients );
		foreach ( $emails_array as $email ) {
			if ( ! is_email( trim($email) ) ) {
			    return false;
			}
		}
		return implode( ', ', array_map( 'trim', $emails_array) ); // Trim white spaced from beginning and end of email addresses.
	}



	/**************************************************************************************/
	/**** Below you will find the callback method for each of the registered metaboxes ****/
	/**************************************************************************************/

	function help_options_contentbox( $options ) { ?>
		<p style="margin-left:5px;"><?php esc_html_e('U-Design theme help resources:', 'u-design'); ?></p>
		<ul style="list-style-type:none; margin:5px 5px 10px 20px;">
			<li><?php echo '<div><a href="'.get_template_directory_uri().'/inc/shared/documentation/index.html" title="'.esc_html__('Open the documentation', 'u-design').'" target="_blank">'.esc_html__('Documentation', 'u-design').'</a></div>'; ?></li>
			<li><?php echo '<div><a title="'.esc_html__('Go to the Support Forum', 'u-design').'" href="http://dreamthemedesign.com/u-design-support/" target="_blank">'.esc_html__('Support Forum', 'u-design').'</a>'; ?> (<span class="description"><?php  printf( __('You should be able to register yourself with the Support Forum %1$sHERE%2$s.', 'u-design'), '<a target="_blank" title="Support Forum Registration" href="http://dreamthemedesign.com/u-design-support/">', '</a>' ); ?></span>)</div></li>
			<li><?php echo '<div><a title="'.esc_html__('Go to the Video Tutorials', 'u-design').'" href="http://www.youtube.com/user/internq7" target="_blank">'.esc_html__('Video Tutorials (Author\'s YouTube Tutorials Channel)', 'u-design').'</a></div>'; ?></li>
			<li><?php echo '<div><a title="'.esc_html__('Go to the U-Design Demo Site', 'u-design').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/" target="_blank">'.esc_html__('U-Design Demo Site', 'u-design').'</a></div>'; ?></li>
			<li><?php echo '<div><a title="'.esc_html__('Go to the U-Design Shortcodes examples', 'u-design').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/?page_id=59" target="_blank">'.esc_html__('U-Design Shortcodes', 'u-design').'</a></div>'; ?></li>
			<li><?php echo '<div><a title="'.esc_html__('Go to the "Get the Code" page', 'u-design').'" href="http://www.universallyacclaimed.com/wp-themes/u-design/?page_id=1417" target="_blank">'.esc_html__('Get the Code: All of the Home page examples source code is available here.', 'u-design').'</a></div>'; ?></li>
		</ul>
<?php	}

	function general_options_contentbox( $options ) { ?>
                
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Logo', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('URL', 'u-design'); ?></th>
			    <td>
                                <div style="margin-bottom:5px;  padding:0; float:left;">
                                    <label for="custom_logo_img"><?php esc_html_e('Enter a URL or upload an image for your logo:', 'u-design'); ?></label><br />
                                    <input name="udesign_options[custom_logo_img]" type="text" id="custom_logo_img" value="<?php if( $options['custom_logo_img'] ){ echo esc_url($options['custom_logo_img']); } ?>" size="65" />
                                    <input id="upload_logo_button" type="button" value="<?php esc_attr_e('Upload Logo', 'u-design'); ?>" class="button-secondary" />
                                </div>
                                <div class="clear"></div>
				<span class="description"><?php esc_html_e('To upload an image click on "Upload Logo" button. Once you upload or choose your image click the "Choose Image" button to insert it into the text field above.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Link Dimensions', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[logo_width]" type="text" id="logo_width" value="<?php echo esc_attr($options['logo_width']); ?>" size="5" maxlength="4" />
				<span> X </span>
				<input name="udesign_options[logo_height]" type="text" id="logo_height" value="<?php echo esc_attr($options['logo_height']); ?>" size="5" maxlength="4" />
				px <?php esc_html_e("(Width X Height) in pixels.", 'u-design'); ?><br/> <span class="description"><?php esc_html_e("Make sure to accurately enter the logo's width and height. This option will not resize the logo but will define the logo link (clickable area over the logo).", 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Retina Logo', 'u-design'); ?></th>
			    <td>
				<label for="logo_retina">
				    <input name="udesign_options[logo_retina]" type="checkbox" id="logo_retina" value="yes" <?php checked('yes', $options['logo_retina']); ?> />
				</label>
				<?php esc_html_e('To display retina logo you need to provide a logo image that has twice (2x) the width and height of what is set in the width and height fields above. For example if your logo image is 300px (width) by 200px (height) then set the width and height in the "Link Dimensions" option above to 150 x 100 which is exactly half the width and height of your image.', 'u-design'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Position', 'u-design'); ?></th>
			    <td>
                                <strong style="margin-top: 4px; display: inline-block;"><?php esc_html_e('Horizontal:', 'u-design'); ?></strong><br />
				<label for="logo_position_center">
				    <input name="udesign_options[logo_position_center]" type="checkbox" id="logo_position_center" value="yes" <?php checked('yes', $options['logo_position_center']); ?> />
				    <?php esc_html_e('Center the logo across the header area of the page. ', 'u-design'); ?>
				</label>
                                <span class="description"><br/><?php esc_html_e("Please Note: In order for this to work make sure the logo width you've provided in the option above is an accurate representation of the logo's width. ", 'u-design'); ?></span>
                                
                                <div class="clear"></div>
                                
                                <strong style="margin: 10px 0 5px; display: inline-block;"><?php esc_html_e('Vertical:', 'u-design'); ?></strong><br />
                                <fieldset>
                                    <input name="udesign_options[logo_position_vertical]" type="text" id="logo_position_vertical" value="<?php echo ( empty( $options['logo_position_vertical'] ) && $options['logo_position_vertical'] != '0' ) ? 6 : esc_attr( $options['logo_position_vertical'] ); ?>" size="5" maxlength="3" />
                                    <span> px <?php esc_html_e('from the top.', 'u-design'); ?></span>
                                </fieldset>
                                
                                <div class="clear"></div>
                                
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
		    </tbody>
                </table>
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Tagline', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><label for="slogan_distance_from_the_top"><?php esc_html_e('Position', 'u-design'); ?></label></th>
			    <td>
                                <fieldset>
                                    <input name="udesign_options[slogan_distance_from_the_top]" type="text" id="slogan_distance_from_the_top" value="<?php echo esc_attr($options['slogan_distance_from_the_top']); ?>" size="5" maxlength="3" />
                                    <span> px <?php esc_html_e('from the top.', 'u-design'); ?></span>
                                </fieldset><br />
                                <fieldset>
                                    <input name="udesign_options[slogan_distance_from_the_left]" type="text" id="slogan_distance_from_the_left" value="<?php echo esc_attr($options['slogan_distance_from_the_left']); ?>" size="5" maxlength="3" />
                                    <span> px <?php esc_html_e('from the left. Enter a number between 0 and 400.', 'u-design'); ?></span><br />
                                    <span class="description"><?php  printf( __('Please note that the actual Slogan text can be changed or deleted at %1$sSettings %2$s General%3$s <strong>Tagline</strong> option.', 'u-design'), '<a title="'.esc_html__('Go to the "General Settings" page', 'u-design').'" href="options-general.php">', '&rarr;', '</a>' ); ?></span>
                                </fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Font Size', 'u-design'); ?></th>
			    <td>
				<label for="slogan_font_size">
					<select name="udesign_options[slogan_font_size]" id="slogan_font_size">
                                            <?php for ($index = 8; $index < 37; $index++) {
                                                $selected_val = ( $options['slogan_font_size'] ) ? $options['slogan_font_size'] : '12';
                                                $selected = ( $selected_val == $index ) ? $selected = ' selected="selected"' : '';
                                                $default_text = ($index == "12") ? esc_html__('(Default)', 'u-design') : '';
                                                echo '<option value="'.$index.'"'.$selected.'>'.$index.'px '.$default_text.'</option>';
                                            } ?>
                                        </select>
				</label>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
                            </td>
			</tr>
                    </tbody>
                </table>
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Top Area', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Height', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[top_area_height]" type="text" id="top_area_height" value="<?php echo esc_attr($options['top_area_height']); ?>" size="5" maxlength="4" />
				px <?php esc_html_e('in pixels.', 'u-design'); ?><br /><span class="description">
				<?php esc_html_e('Note: the minimum recommended height is 55px.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Search Box', 'u-design'); ?></th>
			    <td>
				<label for="enable_search">
				    <input name="udesign_options[enable_search]" type="checkbox" id="enable_search" value="yes" <?php checked('yes', $options['enable_search']); ?> />
				    <?php esc_html_e('Enable the Search box displayed in the top area of the page.', 'u-design'); ?>
				</label>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Call to action', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Phone Number Information', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[top_page_phone_number]" type="text" id="top_page_phone_number" value="<?php if ($options['top_page_phone_number']) { echo esc_attr($options['top_page_phone_number'], 'u-design'); } ?>" size="30" maxlength="500" />
				<br /><?php esc_html_e('Use this field to provide a phone number or any other piece of information.  It is displayed near the search box located at the top right corner of the theme.', 'u-design'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Page Peel', 'u-design'); ?></th>
			    <td>
                                <fieldset>
                                    <label for="enable_page_peel">
                                        <input name="udesign_options[enable_page_peel]" type="checkbox" id="enable_page_peel" value="yes" <?php checked('yes', $options['enable_page_peel']); ?> />
                                        <?php esc_html_e('Display the page curl/peel located in the top right corner of the site. Could be used for your FeedBurner subscription or advertising.', 'u-design'); ?>
                                    </label><br />
                                    <label for="page_peel_url"><?php esc_html_e('Enter a URL:', 'u-design'); ?></label>
                                    <input name="udesign_options[page_peel_url]" type="text" id="page_peel_url" value="<?php if ($options['page_peel_url']) { echo esc_attr($options['page_peel_url'], 'u-design'); } ?>" size="50" maxlength="100" />
                                </fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Feedback Button', 'u-design'); ?></th>
			    <td>
                                <fieldset>
				    <!-- Toggle Feedback button visibility. -->
                                    <label for="enable_feedback">
                                        <input name="udesign_options[enable_feedback]" type="checkbox" id="enable_feedback" value="yes" <?php checked('yes', $options['enable_feedback']); ?> />
                                        <?php esc_html_e('Display the Feedback button located in the most left side of the site.', 'u-design'); ?>
                                    </label>
				    <br />
				    <!-- Feedback button text field. -->
                                    <label for="feedback_btn_text"><?php esc_html_e( 'Button Text:', 'u-design' ); ?></label>
				    <input name="udesign_options[feedback_btn_text]" type="text" id="feedback_btn_text" value="<?php echo ( isset( $options['feedback_btn_text'] ) && $options['feedback_btn_text'] ) ? esc_attr( $options['feedback_btn_text'], 'u-design' ) : 'feedback'; ?>" size="20" maxlength="100" />
				    <br />
				    <!-- Feedback button URL Ffield. -->
                                    <label for="feedback_url"><?php esc_html_e('Enter a URL:', 'u-design'); ?></label>
                                    <input name="udesign_options[feedback_url]" type="text" id="feedback_url" value="<?php if ($options['feedback_url']) { echo esc_attr($options['feedback_url'], 'u-design'); } ?>" size="50" maxlength="100" />
                                </fieldset>
                                <fieldset>
				    <!-- Feedback button position. -->
                                    <label for="feedback_position_fixed">
                                        <input name="udesign_options[feedback_position_fixed]" type="checkbox" id="feedback_position_fixed" value="yes" <?php checked('yes', $options['feedback_position_fixed']); ?> />
                                        <?php esc_html_e('Fix the position of the "Feedback" button to prevent it from scrolling with the page.', 'u-design'); ?>
                                    </label>
                                </fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row">&nbsp;</th>
			    <td style="width:37px; padding:4px 4px">
				<div id="feedbackButtonColor">
				    <div style="background-color: #<?php echo ( isset( $options['feedback_button_color'] ) && $options['feedback_button_color'] ) ? esc_attr( $options['feedback_button_color'] ) : 'F95700'; ?>;"></div>
				</div>
			    </td>
			    <td>
				<input name="udesign_options[feedback_button_color]" id="feedback_button_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo (isset( $options['feedback_button_color'] ) && $options['feedback_button_color'] ) ? esc_attr( $options['feedback_button_color'] ) : 'F95700'; ?>" />
				<?php esc_html_e("Button color.", 'u-design'); ?>
			    </td>
			</tr>
		    </tbody>
		</table>
		
		<?php display_save_changes_button(); ?>
		
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('prettyPhoto', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable', 'u-design'); ?></th>
			    <td>
				<label for="enable_prettyPhoto_script">
				    <input name="udesign_options[enable_prettyPhoto_script]" type="checkbox" id="enable_prettyPhoto_script" value="yes" <?php checked('yes', $options['enable_prettyPhoto_script']); ?> />
                                    <?php esc_html_e('Enable prettyPhoto lightbox script.', 'u-design'); ?> 
                                </label><br />
                                <span class="description"><?php printf( __('In case of conflicts with some other lightbox plugins you may wish to disable the %1$sprettyPhoto%2$s script.', 'u-design'), '<a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/" target="_blank" title="Go to prettyPhoto website">', '</a>'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Style Themes', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Theme:', 'u-design'); ?>
                                <select name="udesign_options[udesign_pretty_photo_style_theme]" id="udesign_pretty_photo_style_theme">
                                    <option value="dark_rounded"<?php echo ( 'dark_rounded' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('dark_rounded', 'u-design'); ?></option>
                                    <option value="dark_square"<?php echo ( 'dark_square' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('dark_square', 'u-design'); ?></option>
                                    <option value="light_rounded"<?php echo ( 'light_rounded' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('light_rounded', 'u-design'); ?></option>
                                    <option value="light_square"<?php echo ( 'light_square' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('light_square', 'u-design'); ?></option>
                                    <option value="pp_default"<?php echo ( 'pp_default' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('pp_default', 'u-design'); ?></option>
                                    <option value="facebook"<?php echo ( 'facebook' === $options['udesign_pretty_photo_style_theme'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('facebook', 'u-design'); ?></option>
                                </select>
				<br /><span class="description"><?php esc_html_e('This option allows you to choose from a few prettyPhoto style themes available by default.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Gallery Overlay', 'u-design'); ?></th>
			    <td>
				<label for="udesign_disable_pretty_photo_gallery_overlay">
				    <input name="udesign_options[udesign_disable_pretty_photo_gallery_overlay]" type="checkbox" id="udesign_disable_pretty_photo_gallery_overlay" value="yes" <?php checked('yes', $options['udesign_disable_pretty_photo_gallery_overlay']); ?> />
                                    <?php esc_html_e('Disable the mini gallery of thumbnails that overlays the preview image on mouse over.', 'u-design'); ?>
				</label>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('General', 'u-design'); ?></h4>
<?php           $show_breadcrumbs = isset( $options['show_breadcrumbs'] ) ? $options['show_breadcrumbs'] : ''; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Breadcrumbs', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Breadcrumbs', 'u-design'); ?></span></legend>
				<label for="show_breadcrumbs">
				    <input name="udesign_options[show_breadcrumbs]" type="checkbox" id="show_breadcrumbs" value="yes" <?php checked('yes', $show_breadcrumbs); ?> />
				    <?php esc_html_e('Show Breadcrumbs', 'u-design'); ?>
				</label>
				</fieldset>
                             </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php printf( __('Theme Update Notifier', 'u-design'), '<code>', '</code>'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable Theme Update Notifier', 'u-design'); ?></span></legend>
				<label for="disable_the_theme_update_notifier">
				    <input name="udesign_options[disable_the_theme_update_notifier]" type="checkbox" id="disable_the_theme_update_notifier" value="yes" <?php checked('yes', $options['disable_the_theme_update_notifier']); ?> />
                                    <?php esc_html_e("Disable notifications for new theme updates.", 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Schema.org Tags', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Schema.org Tags', 'u-design'); ?></span></legend>
				<label for="enable_udesign_schema_tags">
				    <input name="udesign_options[enable_udesign_schema_tags]" type="checkbox" id="enable_udesign_schema_tags" value="yes" <?php checked('yes', $options['enable_udesign_schema_tags']); ?> />
                                    <?php esc_html_e("This option will enable schema.org tags within the theme where applicable.", 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Disable Image Cropping', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable Image Cropping', 'u-design'); ?></span></legend>
				<label for="udesign_disable_img_cropping">
				    <input name="udesign_options[udesign_disable_img_cropping]" type="checkbox" id="udesign_disable_img_cropping" value="yes" <?php checked('yes', $options['udesign_disable_img_cropping']); ?> />
                                    <?php esc_html_e("Disable image cropping when generating thumbnail images in sections like Blog, Portfolio, 'U-Design: Recent Posts' widget, etc.", 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Retina for Cropped Images', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Retina for Cropped Images', 'u-design'); ?></span></legend>
				<label for="udesign_enable_retina_images">
				    <input name="udesign_options[udesign_enable_retina_images]" type="checkbox" id="udesign_enable_retina_images" value="yes" <?php checked('yes', $options['udesign_enable_retina_images']); ?> />
                                    <?php esc_html_e("Enable automatic retina images for cropped images (those usually are thumbnail images in sections like Blog, Portfolio, 'U-Design: Recent Posts' widget, etc.)", 'u-design'); ?>
                                </label><br /> 
                                <span class="description"><?php esc_html_e("If enabled, a double pixel ratio will be used for the cropped images. In order for this option to be applied the above 'Disable Image Cropping' option should not be checked. This option can be overwritten for individual portfolio thumbnails by the use of custom fields (see documentation for more information).", 'u-design'); ?></span>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Smooth Scrolling', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable Smooth Scrolling', 'u-design'); ?></span></legend>
				<label for="disable_smooth_scrolling_on_pages">
				    <input name="udesign_options[disable_smooth_scrolling_on_pages]" type="checkbox" id="disable_smooth_scrolling_on_pages" value="yes" <?php checked('yes', $options['disable_smooth_scrolling_on_pages']); ?> />
                                    <?php esc_html_e("This option will disable the smooth scrolling to an anchor link on same pages.", 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php printf( __('Custom Styles', 'u-design'), '<code>', '</code>'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable "style.css"', 'u-design'); ?></span></legend>
				<label for="enable_default_style_css">
				    <input name="udesign_options[enable_default_style_css]" type="checkbox" id="enable_default_style_css" value="yes" <?php checked('yes', $options['enable_default_style_css']); ?> />
                                    <?php printf( __('Enable the %1$sstyle.css%2$s located in the theme\'s root folder. You can then edit that file from %3$sAppearance %4$s Edit%5$s to add any custom CSS. You would also need to enable this option if you want to use a %6$schild theme%7$s.', 'u-design'), '<code>', '</code>', '<a href="theme-editor.php">', '&rarr;', '</a>', '<a target="_blank" title="More Info on WordPress Child Themes..." href="http://codex.wordpress.org/Child_Themes">', '</a>'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function menus_options_contentbox( $options ) {
		
                $show_menu_drop_shadows = isset( $options['show_menu_drop_shadows'] ) ? $options['show_menu_drop_shadows']: '';
		?>
                
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Main Menu', 'u-design'); ?></h4>
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('"Stay-On-Top" Main Menu', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" the Main Menu', 'u-design'); ?></span></legend>
                                <label for="fixed_main_menu">
                                    <input name="udesign_options[fixed_main_menu]" type="checkbox" id="fixed_main_menu" value="yes" <?php checked('yes', $options['fixed_main_menu']); ?> />
                                    <?php esc_html_e("Fix the main navigation bar to stay on top of the page once header has been scrolled past.", 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Stay-On-Top" Main Menu Logo (optional)', 'u-design'); ?></th>
			    <td>
                                <div style="margin-bottom:5px;  padding:0; float:left;">
                                    <label for="fixed_menu_logo"><?php esc_html_e('Enter a URL or upload an image for your "Stay-On-Top" menu logo:', 'u-design'); ?></label><br />
                                    <input name="udesign_options[fixed_menu_logo]" type="text" id="fixed_menu_logo" value="<?php if( $options['fixed_menu_logo'] ){ echo esc_url($options['fixed_menu_logo']); } ?>" size="65" />
                                    <input id="upload_fixed_menu_logo_button" type="button" value="<?php esc_attr_e('Upload Logo', 'u-design'); ?>" class="button-secondary" />
                                </div>
                                <div class="clear"></div>
                                <span class="description"><?php esc_html_e('You may use this option to specify a logo for the "Stay-On-Top" menu. Please note, this is optional, the fallback is the the main logo (scaled down version).', 'u-design'); ?></span>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Disable the "Stay-On-Top" Main Menu Logo', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" the Main Menu', 'u-design'); ?></span></legend>
                                <label for="fixed_menu_logo_disabled">
                                    <input name="udesign_options[fixed_menu_logo_disabled]" type="checkbox" id="fixed_menu_logo_disabled" value="yes" <?php checked('yes', $options['fixed_menu_logo_disabled']); ?> />
                                    <?php esc_html_e('Selecting this option will remove the logo from the "Stay-On-Top" menu.', 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('"Stay-On-Top" Menu Shadow', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" Menu Shadow', 'u-design'); ?></span></legend>
                                <label for="add_fixed_menu_shadow">
                                    <input name="udesign_options[add_fixed_menu_shadow]" type="checkbox" id="add_fixed_menu_shadow" value="yes" <?php checked('yes', $options['add_fixed_menu_shadow']); ?> />
                                    <?php esc_html_e("Add shadow to the Stay-On-Top menu.", 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('"Stay-On-Top" Remove Background Image', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Stay-On-Top" Remove Background Image', 'u-design'); ?></span></legend>
                                <label for="remove_fixed_menu_background_image">
                                    <input name="udesign_options[remove_fixed_menu_background_image]" type="checkbox" id="remove_fixed_menu_background_image" value="yes" <?php checked('yes', $options['remove_fixed_menu_background_image']); ?> />
                                    <?php esc_html_e("Remove the background image behind the Stay-On-Top menu, in which case the background color assigned to the Main Menu or Top Area will be used instead.", 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Disable "Stay-On-Top" Menu on Mobile Devices', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Disable "Stay-On-Top" Menu on Mobile Devices', 'u-design'); ?></span></legend>
                                <label for="remove_fixed_menu_on_mobile_devices">
                                    <input name="udesign_options[remove_fixed_menu_on_mobile_devices]" type="checkbox" id="remove_fixed_menu_on_mobile_devices" value="yes" <?php checked('yes', $options['remove_fixed_menu_on_mobile_devices']); ?> />
                                    <?php esc_html_e("This option will disable the Stay-On-Top menu on mobile devices only.", 'u-design'); ?>
                                    <span class="description">(<?php esc_html_e("It only applies for non-responsive layout.", 'u-design'); ?>)</span>
                                </label>
                                </fieldset>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Main Menu Alignment', 'u-design'); ?></th>
                            <td>
                                <?php esc_html_e('Choose alignment:', 'u-design'); ?>
                                <select name="udesign_options[main_menu_alignment]" id="main_menu_alignment">
                                    <option value="right"<?php echo ( 'right' === $options['main_menu_alignment'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('right', 'u-design'); ?></option>
                                    <option value="left"<?php echo ( 'left' === $options['main_menu_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                    <option value="center"<?php echo ( 'center' === $options['main_menu_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                </select>
                                <span class="description"><?php esc_html_e('This option sets the main navigation menu alignment.', 'u-design'); ?></span>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><label for="main_menu_vertical_positioning"><?php esc_html_e('Main Menu Vertical Positioning', 'u-design'); ?></label></th>
			    <td>
				<input name="udesign_options[main_menu_vertical_positioning]" type="text" id="main_menu_vertical_positioning" value="<?php echo ( isset( $options['main_menu_vertical_positioning'] ) && $options['main_menu_vertical_positioning'] ) ? esc_attr( $options['main_menu_vertical_positioning'] ) : 0; ?>" size="5" maxlength="3" />
				<span> px. <?php esc_html_e('This option allows you to move the menu vertically towards the top or bottom of the Top Area ("0" is the default which places the menu at the bottom).', 'u-design'); ?></span>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Submenu Indicator Arrows', 'u-design'); ?></th>
                            <td>
                                <?php esc_html_e('Choose arrow style:', 'u-design'); ?>
                                <select name="udesign_options[submenu_arrows]" id="submenu_arrows">
                                    <option value="none"<?php echo ( 'none' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('None', 'u-design'); ?></option>
                                    <option value="plus-sign"<?php echo ( 'plus-sign' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Plus Sign', 'u-design'); ?></option>
                                    <option value="angle-down"<?php echo ( 'angle-down' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Angle Down', 'u-design'); ?></option>
                                    <option value="angle-double-down"<?php echo ( 'angle-double-down' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Angle Double Down', 'u-design'); ?></option>
                                    <option value="downwards-arrow"<?php echo ( 'downwards-arrow' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Downwards Arrow', 'u-design'); ?></option>
                                    <option value="caret"<?php echo ( 'caret' === $options['submenu_arrows'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Caret', 'u-design'); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Submenu Drop Shadow', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Submenu Drop Shadow', 'u-design'); ?></span></legend>
                                <label for="show_menu_drop_shadows">
                                    <input name="udesign_options[show_menu_drop_shadows]" type="checkbox" id="show_menu_drop_shadows" value="yes" <?php checked( 'yes', $show_menu_drop_shadows ); ?> />
                                    <?php esc_html_e("Enable drop shadow for the submenu. ", 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Border Under the Menu', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Border Under the Menu', 'u-design'); ?></span></legend>
                                <label for="remove_border_under_menu">
                                    <input name="udesign_options[remove_border_under_menu]" type="checkbox" id="remove_border_under_menu" value="yes" <?php checked('yes', $options['remove_border_under_menu']); ?> />
                                    <?php esc_html_e("Remove the border line located under the menu. ", 'u-design'); ?>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Secondary Menu', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Enable Secondary Menu Bar', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Secondary Menu Bar', 'u-design'); ?></span></legend>
                                <label for="enable_secondary_menu_bar">
                                    <input name="udesign_options[enable_secondary_menu_bar]" type="checkbox" id="enable_secondary_menu_bar" value="yes" <?php checked('yes', $options['enable_secondary_menu_bar']); ?> />
                                    <?php esc_html_e("Toggle the visibility for the secondary menu bar. ", 'u-design'); ?>
                                    <div style="margin-top:10px;">
                                        <span class="description"><?php printf( __('You may customize the colors of the secondary navigation bar from %1$sCustom Colors %2$s Secondary Menu Colors%3$s section.', 'u-design'), '<strong>', '&rarr;' ,'</strong>'); ?></span>
                                    </div>
                                </label>
                                </fieldset>
                            </td>
                        </tr>
                        <tr id="sec_nav_text_area_1_options" valign="top">
			    <th scope="row" id="sec_nav_text_area_1_options_header"><?php esc_html_e('Text Area 1', 'u-design'); ?></th>
			    <td class="sec_nav_td_options_wrapper">
				<span class="description sec_nav_txt_area_1_description"><?php esc_html_e('You could use this area to add text, phone number, or other information. You may use HTML tags.', 'u-design'); ?></span>
				<textarea style="width: 98%;" id="secondary_menu_text_area_1" rows="2" cols="60" name="udesign_options[secondary_menu_text_area_1]"><?php if( $options['secondary_menu_text_area_1'] ){ echo esc_attr($options['secondary_menu_text_area_1']); } ?></textarea>
                                <div class="clear" style="margin-bottom: 3px;"></div>
                                <div id="text_area_1_dummy_content"><?php echo get_udesign_text_area_1_dummy_content(); ?></div>
                                <a id="insert_text_area_1_dummy_content" href=""><?php esc_html_e('Restore Default Content', 'u-design'); ?></a>
                                
                                <div class="clear" style="margin-bottom: 15px;"></div>
                                <label for="secondary_menu_text_area_1_alignment"><?php esc_html_e('Text alignment:', 'u-design'); ?></label>
                                <select name="udesign_options[secondary_menu_text_area_1_alignment]" id="secondary_menu_text_area_1_alignment">
                                    <option value="left"<?php echo ( 'left' === $options['secondary_menu_text_area_1_alignment'] ) ? ' selected="selected"' : ''; ?> style="min-width:60px;"><?php esc_attr_e('left', 'u-design'); ?></option>
                                    <option value="right"<?php echo ( 'right' === $options['secondary_menu_text_area_1_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                    <option value="center"<?php echo ( 'center' === $options['secondary_menu_text_area_1_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                </select>
                                <span class="description"><?php esc_html_e('This option sets the text alignment for the Text Area 1.', 'u-design'); ?></span>
                                <div class="clear" style="margin-bottom: 10px;"></div>
                                <div class="sec-nav-width-opt-wrapper">
                                    <label for="secondary_menu_text_area_1_width"><?php esc_html_e('Select width:', 'u-design'); ?></label>
                                    <select name="udesign_options[secondary_menu_text_area_1_width]" id="secondary_menu_text_area_1_width">
<?php                                   for ( $x = 0; $x <= 24; $x++ ) : 
                                            if ( ! isset( $options['secondary_menu_text_area_1_width'] ) && $x == 0 ) { // default value case
                                                $is_selected = ' selected="selected"';
                                            } else {
                                                $is_selected = ( $options['secondary_menu_text_area_1_width'] == $x ) ? ' selected="selected"' : '';
                                            } ?>
                                            <option value="<?php echo esc_attr( $x ); ?>"<?php echo esc_attr( $is_selected ); ?>>grid_<?php echo ( 0 == $x ) ? $x . esc_html__(" &nbsp;(Hide)", 'u-design') : $x; ?></option>
<?php                                   endfor; ?>
                                    </select>
                                    <span class="description"><?php esc_html_e('The total including the other two areas combined should add up to grid_24.', 'u-design'); ?></span>
                                </div>
<?php                           // The following button is use for closing the Thickbox modal only ?>
                                <p id="sec_nav_txt_area_1_btn" style="display:none;">
                                    <input type="button" onclick="tb_remove();" class="button-primary" value="<?php echo __('Save Changes', 'u-design'); ?>" />
                                </p>
			    </td>
			</tr>
                        <tr id="sec_nav_text_area_2_options" valign="top">
			    <th scope="row" id="sec_nav_text_area_2_options_header"><?php esc_html_e('Text Area 2', 'u-design'); ?></th>
			    <td class="sec_nav_td_options_wrapper">
				<span class="description sec_nav_txt_area_2_description"><?php esc_html_e('You could use this area to add text, phone number, or other information. You may use HTML tags.', 'u-design'); ?></span>
				<textarea style="width: 98%;" id="secondary_menu_text_area_2" rows="2" cols="60" name="udesign_options[secondary_menu_text_area_2]"><?php if( $options['secondary_menu_text_area_2'] ){ echo esc_attr($options['secondary_menu_text_area_2']); } ?></textarea>
                                <div class="clear" style="margin-bottom: 3px;"></div>
                                <div id="text_area_2_dummy_content"><?php echo get_udesign_social_icons_html(); ?></div>
                                <a id="insert_text_area_2_dummy_content" href=""><?php esc_html_e('Restore Default Icons', 'u-design'); ?></a>
                                
                                <div class="clear" style="margin-bottom: 10px;"></div>
                                <label for="secondary_menu_text_area_2_alignment"><?php esc_html_e('Text alignment:', 'u-design'); ?></label>
                                <select name="udesign_options[secondary_menu_text_area_2_alignment]" id="secondary_menu_text_area_2_alignment">
                                    <option value="right"<?php echo ( 'right' === $options['secondary_menu_text_area_2_alignment'] ) ? ' selected="selected"' : ''; ?> style="min-width:60px;"><?php esc_attr_e('right', 'u-design'); ?></option>
                                    <option value="left"<?php echo ( 'left' === $options['secondary_menu_text_area_2_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                    <option value="center"<?php echo ( 'center' === $options['secondary_menu_text_area_2_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                </select>
                                <span class="description"><?php esc_html_e('This option sets the text alignment for the Text Area 2.', 'u-design'); ?></span>
                                <div class="clear" style="margin-bottom: 10px;"></div>
                                <div class="sec-nav-width-opt-wrapper">
                                    <label for="secondary_menu_text_area_2_width"><?php esc_html_e('Select width:', 'u-design'); ?></label>
                                    <select name="udesign_options[secondary_menu_text_area_2_width]" id="secondary_menu_text_area_2_width">
<?php                                   for ( $x = 0; $x <= 24; $x++ ) : 
                                            if ( !isset($options['secondary_menu_text_area_2_width']) && $x == 0 ) { // default value case
                                                $is_selected = ' selected="selected"';
                                            } else {
                                                $is_selected = ( $options['secondary_menu_text_area_2_width'] == $x ) ? ' selected="selected"' : '';
                                            } ?>
                                            <option value="<?php echo esc_attr( $x ); ?>"<?php echo esc_attr( $is_selected ); ?>>grid_<?php echo ( 0 == $x ) ? $x . esc_html__(" &nbsp;(Hide)", 'u-design') : $x; ?></option>
<?php                                   endfor; ?>
                                    </select>
                                    <span class="description"><?php esc_html_e('The total including the other two areas combined should add up to grid_24.', 'u-design'); ?></span>
                                </div>
<?php                           // The following button is use for closing the Thickbox modal only ?>
                                <p id="sec_nav_txt_area_2_btn" style="display:none;">
                                    <input type="button" onclick="tb_remove();" class="button-primary" value="<?php echo __('Save Changes', 'u-design'); ?>" />
                                </p>
			    </td>
			</tr>
                        <tr id="sec_nav_menu_options" valign="top">
			    <th scope="row" id="sec_nav_menu_options_header"><?php esc_html_e('Choose a Menu', 'u-design'); ?></th>
			    <td class="sec_nav_td_options_wrapper">
                                <select name="udesign_options[secondary_menu_term_id]" id="secondary_menu_term_id">
					<option selected="selected" value="select_menu">&mdash; <?php esc_html_e('Select Menu', 'u-design'); ?> &mdash;</option>
					<?php $available_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); ?>
					<?php foreach ( $available_menus as $menu ): ?>
						<?php $secondary_menu_term_id = ( $options['secondary_menu_term_id'] == $menu->term_id ) ? ' selected="selected"' : ''; ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>"<?php echo esc_attr( $secondary_menu_term_id ); ?>><?php echo esc_html( $menu->name ); ?></option>
					<?php endforeach; ?>
                                </select>
				<?php esc_html_e('This option allows you to assign a menu to the secondary nativation bar. Please note that only the top level menu items will be displayed (submenus are excluded).', 'u-design'); ?> 
                                <span class="description"><?php printf( __('If there are no menus listed above you may create one from the %1$sAppearance %2$s Menus%3$s section.', 'u-design'), 
                                        '<a title="'.esc_html__('This link will open in a new window the WordPress Menus Editor section.', 'u-design').'" target="_blank" href="nav-menus.php">', '&rarr;', '</a>'); ?></span>
                                <div class="clear" style="margin-bottom: 10px;"></div>
                                <label for="secondary_menu_text_alignment"><?php esc_html_e('Text alignment:', 'u-design'); ?></label>
                                <select name="udesign_options[secondary_menu_text_alignment]" id="secondary_menu_text_alignment">
                                    <option value="center"<?php echo ( 'center' === $options['secondary_menu_text_alignment'] ) ? ' selected="selected"' : ''; ?> style="min-width:60px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                    <option value="left"<?php echo ( 'left' === $options['secondary_menu_text_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                    <option value="right"<?php echo ( 'right' === $options['secondary_menu_text_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                </select>
                                <span class="description"><?php esc_html_e('This option sets the text alignment for the menu.', 'u-design'); ?></span>
                                <div class="clear" style="margin-bottom: 10px;"></div>
                                <div class="sec-nav-width-opt-wrapper">
                                    <label for="secondary_menu_width"><?php esc_html_e('Select width:', 'u-design'); ?></label>
                                    <select name="udesign_options[secondary_menu_width]" id="secondary_menu_width">
<?php                                   for ( $x = 0; $x <= 24; $x++ ) : 
                                            if ( !isset($options['secondary_menu_width']) && $x == 0 ) { // default value case
                                                $is_selected = ' selected="selected"';
                                            } else {
                                                $is_selected = ( $options['secondary_menu_width'] == $x ) ? ' selected="selected"' : '';
                                            } ?>
                                            <option value="<?php echo esc_attr( $x ); ?>"<?php echo esc_attr( $is_selected ); ?>>grid_<?php echo ( 0 == $x ) ? $x . esc_html__(" &nbsp;(Hide)", 'u-design') : $x; ?></option>
<?php                                   endfor; ?>
                                    </select>
                                    <span class="description"><?php esc_html_e('The total including the other two areas combined should add up to grid_24.', 'u-design'); ?></span>
                                </div>
<?php                           // The following button is use for closing the Thickbox modal only ?>
                                <p id="sec_nav_menu_btn" style="display:none;">
                                    <input type="button" onclick="tb_remove();" class="button-primary" value="<?php echo __('Save Changes', 'u-design'); ?>" />
                                </p>
                            </td>
                        </tr>
                        <tr id="sec_nav_items_order_option" valign="top" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
                            <th scope="row"><?php esc_html_e('Choose Order', 'u-design'); ?></th>
			    <td style="padding-top: 20px; padding-bottom: 20px;">
                                <select name="udesign_options[secondary_menu_items_order]" id="secondary_menu_items_order">
                                    <option value="not_applicable"<?php echo ( 'not_applicable' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>No Items Available</option>
                                    <option value="txt1|menu|txt2"<?php echo ( 'txt1|menu|txt2' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 1 | Menu | Text Area 2</option>
                                    <option value="txt1|txt2|menu"<?php echo ( 'txt1|txt2|menu' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 1 | Text Area 2 | Menu</option>
                                    <option value="menu|txt1|txt2"<?php echo ( 'menu|txt1|txt2' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Menu | Text Area 1 | Text Area 2</option>
                                    <option value="menu|txt2|txt1"<?php echo ( 'menu|txt2|txt1' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Menu | Text Area 2 | Text Area 1</option>
                                    <option value="txt2|menu|txt1"<?php echo ( 'txt2|menu|txt1' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 2 | Menu | Text Area 1</option>
                                    <option value="txt2|txt1|menu"<?php echo ( 'txt2|txt1|menu' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 2 | Text Area 1 | Menu</option>
                                    <option value="txt1|menu"<?php echo ( 'txt1|menu' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 1 | Menu</option>
                                    <option value="menu|txt1"<?php echo ( 'menu|txt1' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Menu | Text Area 1</option>
                                    <option value="txt2|menu"<?php echo ( 'txt2|menu' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 2 | Menu</option>
                                    <option value="menu|txt2"<?php echo ( 'menu|txt2' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Menu | Text Area 2</option>
                                    <option value="txt1|txt2"<?php echo ( 'txt1|txt2' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 1 | Text Area 2</option>
                                    <option value="txt2|txt1"<?php echo ( 'txt2|txt1' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 2 | Text Area 1</option>
                                    <option value="txt1"<?php echo ( 'txt1' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 1</option>
                                    <option value="txt2"<?php echo ( 'txt2' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Text Area 2</option>
                                    <option value="menu"<?php echo ( 'menu' === $options['secondary_menu_items_order'] ) ? ' selected="selected"' : ''; ?>>Menu</option>
                                </select>
				<?php esc_html_e('This option allows you to assign the order in which the secondary menu items will be shown.', 'u-design'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <?php add_thickbox(); ?>
                <div id="sec-nav-bar-simulator-wrapper">
                    <div class="ui-widget ui-helper-clearfix">
                        <span class="description"><?php esc_html_e('Drag and Drop items in this menu simulator area from the dashed border area below to add them to the menu. Drag and drop horizontally to change order or resize to set desired width:', 'u-design'); ?></span>
                        <ul id="sec-nav-bar-items-simulator-list" class="sec-nav-bar-items-list ui-helper-reset ui-helper-clearfix sec-nav-bar-connected-sortable"></ul>
                        <div class="clear" style="height: 30px;"></div>
                        <span class="description"><?php esc_html_e('Drop items in this area to remove them from the menu:', 'u-design'); ?></span>
                        <ul id="sec-nav-bar-items-list" class="sec-nav-bar-items-list ui-helper-reset ui-helper-clearfix sec-nav-bar-connected-sortable"></ul>
                    </div>
                </div>
                <div class="clear"></div>
                
                
<?php		display_save_changes_button(); ?>
<?php	}

	function layout_options_contentbox( $options ) { ?>
                
                <div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin:6px 0 0;  padding:15px 15px 5px;">
		  <table class="form-table">
		    <tbody>
                        <tr valign="top">
                            <th scope="row" style="padding-right:0"><?php esc_html_e('Page Title', 'u-design'); ?></th>
                            <td>
                                <label for="page_title_position" class="link-target" style="float:left; display:inline-block;">
                                        <select name="udesign_options[page_title_position]" id="page_title_position">
                                            <option value="position1"<?php echo ( 'position1' === $options['page_title_position'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Title Position 1', 'u-design'); ?></option>
                                            <option value="position2"<?php echo ( 'position2' === $options['page_title_position'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Title Position 2', 'u-design'); ?></option>
                                            <option value="remove1"<?php echo ( 'remove1' === $options['page_title_position'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Remove Title (SEO-Friendly)', 'u-design'); ?></option>
                                            <option value="remove2"<?php echo ( 'remove2' === $options['page_title_position'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Remove Title Completely', 'u-design'); ?></option>
                                        </select>
                                </label>
                                <div class="submit" style="padding-left:20px; float:left; display:inline-block;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary left" type="submit" name="form-submit" value="<?php esc_attr_e('Update', 'u-design'); ?>" />
                                    <span class="spinner"></span>
				</div>
                                <ul style="float:left; margin-bottom:0;">
                                    <li><strong><?php esc_html_e('Title Position 1', 'u-design'); ?></strong> - <?php esc_html_e('Display Title immediately under the Main Menu, it spans the full width of page.', 'u-design'); ?></li>
                                    <li><strong><?php esc_html_e('Title Position 2', 'u-design'); ?></strong> - <?php esc_html_e('Display Title inside Main Content, it spans the main content width.', 'u-design'); ?></li>
                                    <li><strong><?php esc_html_e('Remove Title (SEO-Friendly)', 'u-design'); ?></strong> - <?php esc_html_e('Remove Title visually, so that human visitors will not see it, yet it will still be served as an "h1" heading to search engine spiders.', 'u-design'); ?></li>
                                    <li><strong><?php esc_html_e('Remove Title Completely', 'u-design'); ?></strong> - <?php esc_html_e(' ... just as it says! A word of caution, when using this option keep in mind that your pages will be left without an "h1" heading. It is your responsibility to look after that.', 'u-design'); ?></li>
                                </ul>
                            </td>
                        </tr>
		    </tbody>
                  </table>
                </div>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Home Page Column 1', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Home Page Column 1', 'u-design'); ?></span></legend>
				    <label for="home_page_col_1_fixed">
					<input name="udesign_options[home_page_col_1_fixed]" type="checkbox" id="home_page_col_1_fixed" value="yes" <?php checked('yes', $options['home_page_col_1_fixed']); ?> />
					<?php esc_html_e('Set the width of the "Home Page Column 1" Widget Area as constant 1/3 width (Applies only to a two column layout, in other words having the first widget area "Home Page Column 1" in combination with any of the other widget areas being active).', 'u-design'); ?><br />
				    </label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Remove Sidebar from Default Pages', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Sidebar from Default Pages', 'u-design'); ?></span></legend>
                                <label for="remove_default_page_sidebar">
                                    <input name="udesign_options[remove_default_page_sidebar]" type="checkbox" id="remove_default_page_sidebar" value="yes" <?php checked('yes', $options['remove_default_page_sidebar']); ?> />
                                    <?php esc_html_e('Remove the sidebar from the default page template. This will make all pages that have been assigned "Default Template" full width.', 'u-design'); ?><br />
                                </label>
                                </fieldset>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar]" id="pages_sidebar_left" value="left" <?php checked('left', $options['pages_sidebar']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar]" id="pages_sidebar_right" value="right" <?php checked('right', $options['pages_sidebar']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Default Template".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 2 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_2]" id="pages_sidebar_2_left" value="left" <?php checked('left', $options['pages_sidebar_2']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_2]" id="pages_sidebar_2_right" value="right" <?php checked('right', $options['pages_sidebar_2']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 2".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 3 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_3]" id="pages_sidebar_3_left" value="left" <?php checked('left', $options['pages_sidebar_3']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_3]" id="pages_sidebar_3_right" value="right" <?php checked('right', $options['pages_sidebar_3']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 3".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 4 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_4]" id="pages_sidebar_4_left" value="left" <?php checked('left', $options['pages_sidebar_4']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_4]" id="pages_sidebar_4_right" value="right" <?php checked('right', $options['pages_sidebar_4']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 4".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 5 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_5]" id="pages_sidebar_5_left" value="left" <?php checked('left', $options['pages_sidebar_5']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_5]" id="pages_sidebar_5_right" value="right" <?php checked('right', $options['pages_sidebar_5']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 5".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 6 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_6]" id="pages_sidebar_6_left" value="left" <?php checked('left', $options['pages_sidebar_6']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_6]" id="pages_sidebar_6_right" value="right" <?php checked('right', $options['pages_sidebar_6']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 6".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 7 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_7]" id="pages_sidebar_7_left" value="left" <?php checked('left', $options['pages_sidebar_7']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_7]" id="pages_sidebar_7_right" value="right" <?php checked('right', $options['pages_sidebar_7']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 7".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Default Pages Sidebar 8 Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[pages_sidebar_8]" id="pages_sidebar_8_left" value="left" <?php checked('left', $options['pages_sidebar_8']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[pages_sidebar_8]" id="pages_sidebar_8_right" value="right" <?php checked('right', $options['pages_sidebar_8']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Page Template 8".', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Sitemap Page Sidebar Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[sitemap_sidebar]" id="sitemap_sidebar_left" value="left" <?php checked('left', $options['sitemap_sidebar']); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[sitemap_sidebar]" id="sitemap_sidebar_right" value="right" <?php checked('right', $options['sitemap_sidebar']); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar position for all pages assigned with "Sitemap page" template.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Comments on Pages', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Comments on Pages', 'u-design'); ?></span></legend>
				<label for="show_comments_on_pages">
				    <input name="udesign_options[show_comments_on_pages]" type="checkbox" id="show_comments_on_pages" value="yes" <?php checked('yes', $options['show_comments_on_pages']); ?> />
				    <?php esc_html_e("Show Comments on Pages. Those are the pages assigned with the 'Default Page', 'Page Template 2', ..., 'Page Template 8' and 'Full-width Page' templates. Additionally, you can 'Allow' these comments from the individual page's configuration.", 'u-design'); ?>
				</label>
				</fieldset>
                                
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                
                <div style="margin:10px 0; padding:15px 15px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
                  <h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Custom Page Width', 'u-design'); ?></h2>
                  <p><span class="description"><?php esc_html_e("This section allows you to set the page and sidebar width globally.", 'u-design'); ?></span></p>
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Fluid Layout', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Fluid Layout', 'u-design'); ?></span></legend>
				<label for="max_theme_width">
				    <input name="udesign_options[max_theme_width]" type="checkbox" id="max_theme_width" value="yes" <?php checked('yes', $options['max_theme_width']); ?> />
				    <?php esc_html_e("Set the theme width to the maximum possible browser or device width.", 'u-design'); ?>
                                    <span class="description"><?php esc_html_e('(Fluid Layout)', 'u-design'); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top" id="global_theme_width_slide_bar_wrapper">
			    <th scope="row" style="padding-right:0"><?php esc_html_e('Page Width', 'u-design'); ?></th>
			    <td>
                                <div id="global_theme_width_slide_bar"></div>
				<input name="udesign_options[global_theme_width]" type="text" id="global_theme_width" value="<?php echo ( isset( $options['global_theme_width'] ) && $options['global_theme_width'] ) ? esc_attr($options['global_theme_width']) : '960'; ?>" size="5" maxlength="4" />px. 
                                <span class="description"><?php esc_html_e('(Width) in pixels.', 'u-design'); ?></span>
                                <?php esc_html_e('This option is about the overall theme width and it will be applied to all pages. You may specify a range between 960px and 1600px.', 'u-design'); ?>
                                <span class="description"><?php esc_html_e('(default: 960)', 'u-design'); ?></span>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row" style="padding-right:0"><?php esc_html_e('Sidebar Width', 'u-design'); ?></th>
			    <td>
                                <div id="global_sidebar_width_slide_bar"></div>
				<input name="udesign_options[global_sidebar_width]" type="text" id="global_sidebar_width" value="<?php echo ( isset( $options['global_sidebar_width'] ) && $options['global_sidebar_width'] ) ? esc_attr($options['global_sidebar_width']) : '33'; ?>" size="5" maxlength="6" />%. 
                                <span class="description"><?php esc_html_e('(Width) in percentage.', 'u-design'); ?></span>
                                <?php esc_html_e('This option is about the overall sidebar width and it will be applied to all pages. You may specify a range between 20% and 50%.', 'u-design'); ?>
                                <span class="description"><?php esc_html_e('(default: 33)', 'u-design'); ?></span>

                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row" style="padding-right:0"><?php esc_html_e('Content Width', 'u-design'); ?></th>
			    <td>
                                <div id="udesign_content_width_slide_bar"></div>
				<input name="udesign_options[udesign_content_width]" type="text" id="udesign_content_width" value="<?php echo ( isset( $options['udesign_content_width'] ) && $options['udesign_content_width'] ) ? esc_attr($options['udesign_content_width']) : '600'; ?>" size="5" maxlength="4" />px. 
                                <span class="description"><?php esc_html_e('(WordPress Content Width) in pixels.', 'u-design'); ?></span>
                                <?php esc_html_e('Content Width is a feature that allows you to set the maximum allowed width for videos, images, and other oEmbed content in a theme. That means, when you paste that YouTube URL in the visual editor and WordPress automatically displays the actual video on the front-end, that video will not exceed the width you set here. ', 'u-design'); ?>
                                <span class="description"><?php esc_html_e('(default: 600)', 'u-design'); ?></span>
                            </td>
                        </tr>
		    </tbody>
                  </table>
                </div>
<?php		display_save_changes_button(); ?>
<?php	}

	function font_settings_contentbox( $options ) {
                $enable_google_web_fonts = isset( $options['enable_google_web_fonts'] ) ? $options['enable_google_web_fonts']: '';
                $heading1_font_settings_enabled = isset( $options['heading1_font_settings_enabled'] ) ? $options['heading1_font_settings_enabled']: '';
                $heading2_font_settings_enabled = isset( $options['heading2_font_settings_enabled'] ) ? $options['heading2_font_settings_enabled']: '';
                $heading3_font_settings_enabled = isset( $options['heading3_font_settings_enabled'] ) ? $options['heading3_font_settings_enabled']: '';
                $heading4_font_settings_enabled = isset( $options['heading4_font_settings_enabled'] ) ? $options['heading4_font_settings_enabled']: '';
                $heading5_font_settings_enabled = isset( $options['heading5_font_settings_enabled'] ) ? $options['heading5_font_settings_enabled']: '';
                $heading6_font_settings_enabled = isset( $options['heading6_font_settings_enabled'] ) ? $options['heading6_font_settings_enabled']: ''; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top" style="background-color: #fcfcfc; border: 1px solid #dddddd;">
			    <th scope="row" style="padding-top:20px;padding-bottom:20px;"><?php esc_html_e('Google Fonts', 'u-design'); ?></th>
			    <td style="padding-top:20px;padding-bottom:20px;">
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Google Fonts', 'u-design'); ?></span></legend>
                                    <label for="enable_google_web_fonts" style="display:inline-block; float:left;">
                                        <input name="udesign_options[enable_google_web_fonts]" type="checkbox" id="enable_google_web_fonts" value="yes" <?php checked('yes', $enable_google_web_fonts); ?> />
                                        <?php esc_html_e('Enable Google Fonts', 'u-design'); ?>
                                    </label>
                                    <div class="submit" style="padding-left:20px; float:left; display:inline-block;">
                                        <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                        <input class="button-secondary left" type="submit" name="form-submit" value="<?php esc_attr_e('Update', 'u-design'); ?>" />
                                        <span class="spinner"></span>
                                    </div>
                                    <div class="clear"></div>
                                    <?php esc_html_e('You may preview all available Google fonts at', 'u-design'); ?> <a title="<?php esc_html_e('Google Fonts directory', 'u-design'); ?>" href="http://www.google.com/fonts/" target="_blank"><?php esc_html_e('Google Fonts directory', 'u-design'); ?></a>.
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('General (body) text', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "general", "general", $options['general_font_family'], $enable_google_web_fonts, $options, "pixels", "14" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="general_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[general_font_line_height]" type="text" id="general_font_line_height" value="<?php echo ( isset( $options['general_font_line_height'] ) && $options['general_font_line_height'] ) ? esc_attr( $options['general_font_line_height'] ) : '1.8'; ?>" size="5" maxlength="4" />
                                <?php esc_html_e('This option can be used to specify the line height for the general body text. Range from 0.2 to 5.0 (default: 1.8)', 'u-design'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Main Menu', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "top_nav", "top-nav", $options['top_nav_font_family'], $enable_google_web_fonts, $options, "pixels", "16" ); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Headings', 'u-design'); ?></th>
			    <td>
				<div style="float:left; margin-bottom:7px;"><?php esc_html_e("The following settings are applied to all headings (h1, h2, h3, h4, h5 and h6) as well as the tagline (slogan) text:", 'u-design'); ?></div>
                                <div class="clear"></div>
                                <?php echo get_udesign_fonts_select_options( "headings", "headings", $options['headings_font_family'], $enable_google_web_fonts, $options, "coefficient", "1.2" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="headings_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[headings_font_line_height]" type="text" id="headings_font_line_height" value="<?php echo ( isset( $options['headings_font_line_height'] ) && $options['headings_font_line_height'] ) ? esc_attr( $options['headings_font_line_height'] ) : '1.3'; ?>" size="5" maxlength="4" />
                                <?php esc_html_e('This option can be used to specify the line height for the headings. Range from 0.2 to 5.0 (default: 1.3)', 'u-design'); ?>
                               
                                <div class="clear" style="margin-top: 40px;"></div>
                                <h4 class="headings-section-switch-title"><?php esc_html_e('Individual Headings overwrites:', 'u-design'); ?></h4>
                                <div class="headings-section-switch-wrapper">
                                    <label for="heading1_font_settings_enabled" class="heading1-font-settings-enabled">
                                        <input name="udesign_options[heading1_font_settings_enabled]" type="checkbox" id="heading1_font_settings_enabled" value="yes" <?php checked('yes', $heading1_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 1', 'u-design'); ?>
                                    </label> 
                                    <label for="heading2_font_settings_enabled" class="heading2-font-settings-enabled">
                                        <input name="udesign_options[heading2_font_settings_enabled]" type="checkbox" id="heading2_font_settings_enabled" value="yes" <?php checked('yes', $heading2_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 2', 'u-design'); ?>
                                    </label>
                                    <label for="heading3_font_settings_enabled" class="heading3-font-settings-enabled">
                                        <input name="udesign_options[heading3_font_settings_enabled]" type="checkbox" id="heading3_font_settings_enabled" value="yes" <?php checked('yes', $heading3_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 3', 'u-design'); ?>
                                    </label>
                                    <label for="heading4_font_settings_enabled" class="heading4-font-settings-enabled">
                                        <input name="udesign_options[heading4_font_settings_enabled]" type="checkbox" id="heading4_font_settings_enabled" value="yes" <?php checked('yes', $heading4_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 4', 'u-design'); ?>
                                    </label>
                                    <label for="heading5_font_settings_enabled" class="heading5-font-settings-enabled">
                                        <input name="udesign_options[heading5_font_settings_enabled]" type="checkbox" id="heading5_font_settings_enabled" value="yes" <?php checked('yes', $heading5_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 5', 'u-design'); ?>
                                    </label>
                                    <label for="heading6_font_settings_enabled" class="heading6-font-settings-enabled">
                                        <input name="udesign_options[heading6_font_settings_enabled]" type="checkbox" id="heading6_font_settings_enabled" value="yes" <?php checked('yes', $heading6_font_settings_enabled); ?> />
                                        <?php esc_html_e('Heading 6', 'u-design'); ?>
                                    </label>
                                </div>
			    </td>
			</tr>
                        <tr valign="top" id="heading1_font_settings_option"<?php if( !$heading1_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 1', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading1", "heading1", $options['heading1_font_family'], $enable_google_web_fonts, $options, "ems", "1.85" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading1_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading1_font_line_height]" type="text" id="heading1_font_line_height" value="<?php echo ( isset( $options['heading1_font_line_height'] ) && $options['heading1_font_line_height'] ) ? esc_attr( $options['heading1_font_line_height'] ) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top" id="heading2_font_settings_option"<?php if( !$heading2_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 2', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading2", "heading2", $options['heading2_font_family'], $enable_google_web_fonts, $options, "ems", "1.65" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading2_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading2_font_line_height]" type="text" id="heading2_font_line_height" value="<?php echo ( isset( $options['heading2_font_line_height'] ) && $options['heading2_font_line_height'] ) ? esc_attr( $options['heading2_font_line_height'] ) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top" id="heading3_font_settings_option"<?php if( !$heading3_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 3', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading3", "heading3", $options['heading3_font_family'], $enable_google_web_fonts, $options, "ems", "1.50" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading3_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading3_font_line_height]" type="text" id="heading3_font_line_height" value="<?php echo ( isset( $options['heading3_font_line_height'] ) && $options['heading3_font_line_height'] ) ? esc_attr( $options['heading3_font_line_height'] ) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top" id="heading4_font_settings_option"<?php if( !$heading4_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 4', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading4", "heading4", $options['heading4_font_family'], $enable_google_web_fonts, $options, "ems", "1.35" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading4_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading4_font_line_height]" type="text" id="heading4_font_line_height" value="<?php echo ( isset( $options['heading4_font_line_height'] ) && $options['heading4_font_line_height'] ) ? esc_attr($options['heading4_font_line_height']) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top" id="heading5_font_settings_option"<?php if( !$heading5_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 5', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading5", "heading5", $options['heading5_font_family'], $enable_google_web_fonts, $options, "ems", "1.25" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading5_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading5_font_line_height]" type="text" id="heading5_font_line_height" value="<?php echo ( isset( $options['heading5_font_line_height'] ) && $options['heading5_font_line_height'] ) ? esc_attr( $options['heading5_font_line_height'] ) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top" id="heading6_font_settings_option"<?php if( !$heading6_font_settings_enabled ) echo ' class="hide"'; ?>>
			    <th scope="row"><?php esc_html_e('Heading 6', 'u-design'); ?></th>
			    <td>
                                <?php echo get_udesign_fonts_select_options( "heading6", "heading6", $options['heading6_font_family'], $enable_google_web_fonts, $options, "ems", "1.10" ); ?>
                                <div class="clear" style="margin-bottom: 10px;"></div>
				<label for="heading6_font_line_height" style="float:left; margin-right:7px; line-height:2;"><?php esc_html_e('Line Height: ', 'u-design'); ?></label>
                                <input name="udesign_options[heading6_font_line_height]" type="text" id="heading6_font_line_height" value="<?php echo ( isset( $options['heading6_font_line_height'] ) && $options['heading6_font_line_height'] ) ? esc_attr( $options['heading6_font_line_height'] ) : '1.2'; ?>" size="5" maxlength="4" />
                                &nbsp;&nbsp;<span class="description"><?php esc_html_e('(min: 0.2, max: 5.0, default: 1.3)', 'u-design'); ?></span>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

        function custom_colors_options_contentbox( $options ) { ?>
    		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Custom Colors Switch', 'u-design'); ?></th>
			    <td>
				<span class="description"><?php esc_html_e("If enabled this option will overwrite the default CSS styles.", 'u-design'); ?></span><br />
				<?php esc_html_e('Custom colors option:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[custom_colors_switch]" id="custom_colors_switch_enable" value="enable" <?php checked('enable', $options['custom_colors_switch']); ?> /> <?php esc_html_e('Enable', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[custom_colors_switch]" id="custom_colors_switch_disable" value="disable" <?php checked('disable', $options['custom_colors_switch']); ?> /> <?php esc_html_e('Disable', 'u-design'); ?></label>
				<br />
				<div class="submit" style="padding:10px 0 0 80px; float:left; clear:both;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary left" type="submit" name="form-submit" value="<?php esc_attr_e('Update', 'u-design'); ?>" />
                                    <span class="spinner"></span>
				</div>
<?php				if ( $options['custom_colors_switch'] == 'enable' ) : ?>
				    <div style="padding-top:10px; clear:both;"><?php esc_html_e('Continue with the section below to customize the colors...', 'u-design'); ?></div>
<?php				else : ?>
				    <input style="display:none;" name="udesign_options[one_continuous_bg_img_fixed]" type="checkbox" id="one_continuous_bg_img_fixed" value="yes" <?php checked('yes', $options['one_continuous_bg_img_fixed']); ?> />
<?php				endif; ?>
			    </td>
			</tr>
		    </tbody>
		</table>
                
<?php		if ( $options['custom_colors_switch'] == 'enable' ) : ?>
			<?php 
			$body_text_color = ( isset( $options['body_text_color'] ) && $options['body_text_color'] ) ? esc_attr( $options['body_text_color'] ) : '555555';
			$main_link_color = ( isset( $options['main_link_color'] ) && $options['main_link_color'] ) ? esc_attr( $options['main_link_color'] ) : 'F95700';
			$main_link_color_hover = ( isset( $options['main_link_color_hover'] ) && $options['main_link_color_hover'] ) ? esc_attr( $options['main_link_color_hover'] ) : '333333';
			$main_headings_color = ( isset( $options['main_headings_color'] ) && $options['main_headings_color'] ) ? esc_attr( $options['main_headings_color'] ) : '333333';
			$top_bg_color = ( isset( $options['top_bg_color'] ) && $options['top_bg_color'] ) ? esc_attr( $options['top_bg_color'] ) : 'FCFCFC';
			$top_text_color = ( isset( $options['top_text_color'] ) && $options['top_text_color'] ) ? esc_attr( $options['top_text_color'] ) : 'AAAAAA';
			$top_nav_background_color = ( isset( $options['top_nav_background_color'] ) && $options['top_nav_background_color'] ) ? esc_attr( $options['top_nav_background_color'] ) : 'FBFBFB';
			$top_nav_link_color = ( isset( $options['top_nav_link_color'] ) && $options['top_nav_link_color'] ) ? esc_attr( $options['top_nav_link_color'] ) : '555555';
			$top_nav_active_link_color = ( isset( $options['top_nav_active_link_color'] ) && $options['top_nav_active_link_color'] ) ? esc_attr( $options['top_nav_active_link_color'] ) : 'F95700';
			$top_nav_hover_link_color = ( isset( $options['top_nav_hover_link_color'] ) && $options['top_nav_hover_link_color'] ) ? esc_attr( $options['top_nav_hover_link_color'] ) : 'AAAAAA';
			$dropdown_nav_link_color = ( isset( $options['dropdown_nav_link_color'] ) && $options['dropdown_nav_link_color'] ) ? esc_attr( $options['dropdown_nav_link_color'] ) : 'EEEEEE';
			$dropdown_nav_hover_link_color = ( isset( $options['dropdown_nav_hover_link_color'] ) && $options['dropdown_nav_hover_link_color'] ) ? esc_attr( $options['dropdown_nav_hover_link_color'] ) : 'FF8400';
			$dropdown_nav_background_color = ( isset( $options['dropdown_nav_background_color'] ) && $options['dropdown_nav_background_color'] ) ? esc_attr( $options['dropdown_nav_background_color'] ) : '343A41';
			$sec_menu_bg_color = ( isset( $options['sec_menu_bg_color'] ) && $options['sec_menu_bg_color'] ) ? esc_attr( $options['sec_menu_bg_color'] ) : '293037';
			$sec_menu_text_color = ( isset( $options['sec_menu_text_color'] ) && $options['sec_menu_text_color'] ) ? esc_attr( $options['sec_menu_text_color'] ) : 'EBEBEB';
			$sec_menu_link_color = ( isset( $options['sec_menu_link_color'] ) && $options['sec_menu_link_color'] ) ? esc_attr( $options['sec_menu_link_color'] ) : 'D4D4D4';
			$sec_menu_link_hover_color = ( isset( $options['sec_menu_link_hover_color'] ) && $options['sec_menu_link_hover_color'] ) ? esc_attr( $options['sec_menu_link_hover_color'] ) : 'FF8400';
			$page_title_color = ( isset( $options['page_title_color'] ) && $options['page_title_color'] ) ? esc_attr( $options['page_title_color'] ) : '333333';
			$page_title_bg_color = ( isset( $options['page_title_bg_color'] ) && $options['page_title_bg_color'] ) ? esc_attr( $options['page_title_bg_color'] ) : 'F5F5F5';
			$header_bg_color = ( isset( $options['header_bg_color'] ) && $options['header_bg_color'] ) ? esc_attr( $options['header_bg_color'] ) : 'FFFFFF';
			$main_content_bg = ( isset( $options['main_content_bg'] ) && $options['main_content_bg'] ) ? esc_attr( $options['main_content_bg'] ) : 'FFFFFF';
			$widget_title_color = ( isset( $options['widget_title_color'] ) && $options['widget_title_color'] ) ? esc_attr( $options['widget_title_color'] ) : '333333';
			$widget_text_color = ( isset( $options['widget_text_color'] ) && $options['widget_text_color'] ) ? esc_attr( $options['widget_text_color'] ) : '555555';
			$widget_bg_color = ( isset( $options['widget_bg_color'] ) && $options['widget_bg_color'] ) ? esc_attr( $options['widget_bg_color'] ) : 'FAFAFA';
			$bottom_bg_color = ( isset( $options['bottom_bg_color'] ) && $options['bottom_bg_color'] ) ? esc_attr( $options['bottom_bg_color'] ) : 'EDEDED';
			$bottom_title_color = ( isset( $options['bottom_title_color'] ) && $options['bottom_title_color'] ) ? esc_attr( $options['bottom_title_color'] ) : '26313D';
			$bottom_text_color = ( isset( $options['bottom_text_color'] ) && $options['bottom_text_color'] ) ? esc_attr( $options['bottom_text_color'] ) : '777777';
			$bottom_link_color = ( isset( $options['bottom_link_color'] ) && $options['bottom_link_color'] ) ? esc_attr( $options['bottom_link_color'] ) : '333333';
			$bottom_hover_link_color = ( isset( $options['bottom_hover_link_color'] ) && $options['bottom_hover_link_color'] ) ? esc_attr( $options['bottom_hover_link_color'] ) : 'F95700';
			$footer_bg_color = ( isset( $options['footer_bg_color'] ) && $options['footer_bg_color'] ) ? esc_attr( $options['footer_bg_color'] ) : '212121';
			$footer_text_color = ( isset( $options['footer_text_color'] ) && $options['footer_text_color'] ) ? esc_attr( $options['footer_text_color'] ) : 'EBEBEB';
			$footer_link_color = ( isset( $options['footer_link_color'] ) && $options['footer_link_color'] ) ? esc_attr( $options['footer_link_color'] ) : '949494';
			$footer_hover_link_color = ( isset( $options['footer_hover_link_color'] ) && $options['footer_hover_link_color'] ) ? esc_attr( $options['footer_hover_link_color'] ) : 'F95700';
		
			?>
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('General Text and Link Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Body Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bodyTextColor">
					<div style="background-color: #<?php echo esc_attr( $body_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[body_text_color]" id="body_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $body_text_color ); ?>" />
				    <?php esc_html_e("Main body text color affecting the entire site.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainLinkColor">
					<div style="background-color: #<?php echo esc_attr( $main_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_link_color]" id="main_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $main_link_color ); ?>" />
				    <?php esc_html_e("Main link color affecting the entire site.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Hover Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainLinkColorHover">
					<div style="background-color: #<?php echo esc_attr( $main_link_color_hover ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_link_color_hover]" id="main_link_color_hover" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $main_link_color_hover ); ?>" />
				    <?php esc_html_e("This is the link hover color.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Headings Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainHeadingsColor">
					<div style="background-color: #<?php echo esc_attr( $main_headings_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_headings_color]" id="main_headings_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $main_headings_color ); ?>" />
				    <?php esc_html_e("This is the color for general H1, H2, H3, H4 ,H5 ,H6 Headings where applicable.", 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <h4 id="top-area-background" class="u-design-settings-page-headers"><?php esc_html_e('Top Section Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Area Background', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topBGcolorSelector">
					<div style="background-color: #<?php echo esc_attr( $top_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_bg_color]" id="top_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_bg_color ); ?>" />
				    <?php esc_html_e("Site's top section background color. This is the section with the logo, slogan, phone number and search box, immediately above the menu.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Top Area Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topTextcolorSelector">
					<div style="background-color: #<?php echo esc_attr( $top_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_text_color]" id="top_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_text_color ); ?>" />
				    <?php esc_html_e("This color affects the slogan, phone number and search text.", 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    
                    <div class="clear"></div>
                    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                        <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                        <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                        <span class="spinner"></span>
                    </div>
                    <div class="clear"></div>
                            
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('Main Menu Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavBackgroundColor">
					<div style="background-color: #<?php echo esc_attr( $top_nav_background_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_background_color]" id="top_nav_background_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_nav_background_color ); ?>" />
				    <?php esc_html_e('This is the background color of the main menu.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <table class="form-table" style="margin-top: 0;">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Opacity', 'u-design'); ?></th>
				<td>
                                    <input name="udesign_options[top_nav_background_opacity]" type="text" id="top_nav_background_opacity" value="<?php echo ( isset( $options['top_nav_background_opacity'] ) ) ? esc_attr( $options['top_nav_background_opacity'] ) : '0'; ?>" size="5" maxlength="4" />
                                    <?php esc_html_e('This option can be used to specify the opacity of the background. From 0 (fully transparent) to 1.0 (fully opaque).', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <table class="form-table" style="margin-top: 0;">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavLinkColor">
					<div style="background-color: #<?php echo esc_attr( $top_nav_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_link_color]" id="top_nav_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_nav_link_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu links.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Active Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavActiveLinkColor">
					<div style="background-color: #<?php echo esc_attr( $top_nav_active_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_active_link_color]" id="top_nav_active_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_nav_active_link_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu active/selected link.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Hover Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="topNavHoverLinkColor">
					<div style="background-color: #<?php echo esc_attr( $top_nav_hover_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[top_nav_hover_link_color]" id="top_nav_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $top_nav_hover_link_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu hover link.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Dropdown Menu Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="dropdownNavLinkColor">
					<div style="background-color: #<?php echo esc_attr( $dropdown_nav_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[dropdown_nav_link_color]" id="dropdown_nav_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $dropdown_nav_link_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu dropdown (submenu) links.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Dropdown Menu Hover Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="dropdownNavHoverLinkColor">
					<div style="background-color: #<?php echo esc_attr( $dropdown_nav_hover_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[dropdown_nav_hover_link_color]" id="dropdown_nav_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $dropdown_nav_hover_link_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu dropdown (submenu) hover link.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Dropdown Menu Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="dropdownNavBackgroundColor">
					<div style="background-color: #<?php echo esc_attr( $dropdown_nav_background_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[dropdown_nav_background_color]" id="dropdown_nav_background_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $dropdown_nav_background_color ); ?>" />
				    <?php esc_html_e('This is the color of the main menu dropdown (submenu) background.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <table class="form-table" style="margin-top: 0;">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Dropdown Menu Background Opacity', 'u-design'); ?></th>
				<td>
                                    <input name="udesign_options[dropdown_nav_background_opacity]" type="text" id="dropdown_nav_background_opacity" value="<?php echo ( isset( $options['dropdown_nav_background_opacity'] ) ) ? esc_attr( $options['dropdown_nav_background_opacity'] ) : '0.96'; ?>" size="5" maxlength="4" />
                                    <?php esc_html_e('This option can be used to specify the opacity of the background. From 0 (fully transparent) to 1.0 (fully opaque).', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    
                    <h4 id="sec-nav-section-colors" class="u-design-settings-page-headers"><?php esc_html_e('Secondary Menu Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="secMenuBGColorSelector">
					<div style="background-color: #<?php echo esc_attr( $sec_menu_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[sec_menu_bg_color]" id="sec_menu_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $sec_menu_bg_color ); ?>" />
				    <?php esc_html_e("This is the secondary menu's background color.", 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <table class="form-table" style="margin-top: 0;">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Opacity', 'u-design'); ?></th>
				<td>
                                    <input name="udesign_options[sec_menu_bg_opacity]" type="text" id="sec_menu_bg_opacity" value="<?php echo ( isset( $options['sec_menu_bg_opacity'] ) ) ? esc_attr( $options['sec_menu_bg_opacity'] ) : '0.95'; ?>" size="5" maxlength="4" />
                                    <?php esc_html_e('This option can be used to specify the opacity of the background. From 0 (fully transparent) to 1.0 (fully opaque).', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <table class="form-table" style="margin-top: 0;">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="secMenuTextColorSelector">
					<div style="background-color: #<?php echo esc_attr( $sec_menu_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[sec_menu_text_color]" id="sec_menu_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $sec_menu_text_color ); ?>" />
				    <?php esc_html_e("This is the general text color.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="secMenuLinkColorSelector">
					<div style="background-color: #<?php echo esc_attr( $sec_menu_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[sec_menu_link_color]" id="sec_menu_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $sec_menu_link_color ); ?>" />
				    <?php esc_html_e("This is the menu's link color.", 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Link Hover Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="secMenuLinkHoverColorSelector">
					<div style="background-color: #<?php echo esc_attr( $sec_menu_link_hover_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[sec_menu_link_hover_color]" id="sec_menu_link_hover_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $sec_menu_link_hover_color ); ?>" />
				    <?php esc_html_e("This is the menu's link hover color.", 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    
                    <div class="clear"></div>
                    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                        <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                        <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                        <span class="spinner"></span>
                    </div>
                    <div class="clear"></div>
                    
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('Midsection Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Page Title Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="pageTitleColor">
					<div style="background-color: #<?php echo esc_attr( $page_title_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[page_title_color]" id="page_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $page_title_color ); ?>" />
				    <?php esc_html_e('This is the color for the title of pages/posts/archives, etc. located in the area underneath the menu.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Page Title Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="pageTitleBGcolorSelector">
					<div style="background-color: #<?php echo esc_attr( $page_title_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[page_title_bg_color]" id="page_title_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $page_title_bg_color ); ?>" />
				    <?php esc_html_e('This is the background color behind the page titles.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Header/Slider Background', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="headerBGcolorSelector">
					<div style="background-color: #<?php echo esc_attr( $header_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[header_bg_color]" id="header_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $header_bg_color ); ?>" />
				    <?php esc_html_e('This is the background color behind the home page sliders.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Main Content Area Background', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="mainContentBG">
					<div style="background-color: #<?php echo esc_attr( $main_content_bg ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[main_content_bg]" id="main_content_bg" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $main_content_bg ); ?>" />
				    <?php esc_html_e('This is the color of the main content wrapper background.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('Home Page Before Content Widget Area Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Title Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetTitleColor">
					<div style="background-color: #<?php echo esc_attr( $widget_title_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_title_color]" id="widget_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $widget_title_color ); ?>" />
				    <?php esc_html_e('This is the color for the title of widgets used in this Widget Area, usually an "H3" Headings.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetTextColor">
					<div style="background-color: #<?php echo esc_attr( $widget_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_text_color]" id="widget_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $widget_text_color ); ?>" />
				    <?php esc_html_e('This is the default text color applied to this Widget Area.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="widgetBGColor">
					<div style="background-color: #<?php echo esc_attr( $widget_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[widget_bg_color]" id="widget_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $widget_bg_color ); ?>" />
				    <?php esc_html_e('This is the background color.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    
                    <div class="clear"></div>
                    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                        <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                        <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                        <span class="spinner"></span>
                    </div>
                    <div class="clear"></div>
                    
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('Bottom Area Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomBGColor">
					<div style="background-color: #<?php echo esc_attr( $bottom_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_bg_color]" id="bottom_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $bottom_bg_color ); ?>" />
				    <?php esc_html_e('This is the background color for the bottom area.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Titles Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomTitleColor">
					<div style="background-color: #<?php echo esc_attr( $bottom_title_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_title_color]" id="bottom_title_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $bottom_title_color ); ?>" />
				    <?php esc_html_e('This is the color applied to the bottom area widget titles.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomTextColor">
					<div style="background-color: #<?php echo esc_attr( $bottom_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_text_color]" id="bottom_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $bottom_text_color ); ?>" />
				    <?php esc_html_e('This is the default text color applied to the bottom area.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomLinkColor">
					<div style="background-color: #<?php echo esc_attr( $bottom_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_link_color]" id="bottom_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $bottom_link_color ); ?>" />
				    <?php esc_html_e('This is the bottom area link color.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Bottom Link Hover Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="bottomHoverLinkColor">
					<div style="background-color: #<?php echo esc_attr( $bottom_hover_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[bottom_hover_link_color]" id="bottom_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $bottom_hover_link_color ); ?>" />
				    <?php esc_html_e('This is the bottom area link hover color.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
                    <h4 class="u-design-settings-page-headers"><?php esc_html_e('Footer Area Colors', 'u-design'); ?></h4>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Background Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerBGColor">
					<div style="background-color: #<?php echo esc_attr( $footer_bg_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_bg_color]" id="footer_bg_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $footer_bg_color ); ?>" />
				    <?php esc_html_e('This is the footer background color.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerTextColor">
					<div style="background-color: #<?php echo esc_attr( $footer_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_text_color]" id="footer_text_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $footer_text_color ); ?>" />
				    <?php esc_html_e('This is the footer general text color.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Link Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerLinkColor">
					<div style="background-color: #<?php echo esc_attr( $footer_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_link_color]" id="footer_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $footer_link_color ); ?>" />
				    <?php esc_html_e('This is the footer link color.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Footer Link Hover Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="footerHoverLinkColor">
					<div style="background-color: #<?php echo esc_attr( $footer_hover_link_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[footer_hover_link_color]" id="footer_hover_link_color" type="text" maxlength="6" size="7" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $footer_hover_link_color ); ?>" />
				    <?php esc_html_e('This is the footer link hover color.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
<?php		    display_save_changes_button(); ?>

                   
		    <div style="margin:10px;">
                        <h4 class="u-design-settings-page-headers"><?php esc_html_e('Background Images', 'u-design'); ?></h4>
                        <p style="margin: 10px 10px 15px;"><span class="description"><?php esc_html_e("Tip: To upload an image click on 'Upload Image' button below. Once the image is uploaded it will give you various options. Click on 'Insert into Post' button. Once you click on 'Insert into Post', link with the uploaded image will be inserted into the corresponding text field below. The background image is placed according to the background-position property. If 'No Repeat' is specified (see below), the image is placed at the element's top center position.", 'u-design'); ?></span></p>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Top Area Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="top_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[top_bg_img]" type="text" id="top_bg_img" value="<?php if( $options['top_bg_img'] ){ echo esc_url($options['top_bg_img']); } ?>" size="65" />
                                            <input id="upload_top_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'u-design'); ?>
                                            <select name="udesign_options[top_bg_img_repeat]" id="top_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['top_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['top_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['top_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['top_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[top_bg_img_position_horizontal]" id="top_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['top_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['top_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['top_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[top_bg_img_position_vertical]" id="top_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['top_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['top_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['top_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Home Page Header/Slider Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="header_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[header_bg_img]" type="text" id="header_bg_img" value="<?php if( $options['header_bg_img'] ){ echo esc_url($options['header_bg_img']); } ?>" size="65" />
                                            <input id="upload_header_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'u-design'); ?>
                                            <select name="udesign_options[header_bg_img_repeat]" id="header_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['header_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['header_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['header_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['header_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[header_bg_img_position_horizontal]" id="header_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['header_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['header_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['header_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[header_bg_img_position_vertical]" id="header_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['header_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['header_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['header_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Home Page Before Content Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="home_page_before_content_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[home_page_before_content_bg_img]" type="text" id="home_page_before_content_bg_img" value="<?php if( $options['home_page_before_content_bg_img'] ){ echo esc_url($options['home_page_before_content_bg_img']); } ?>" size="65" />
                                            <input id="upload_home_page_before_content_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'u-design'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_repeat]" id="home_page_before_content_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['home_page_before_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['home_page_before_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['home_page_before_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['home_page_before_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_position_horizontal]" id="home_page_before_content_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['home_page_before_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['home_page_before_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['home_page_before_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[home_page_before_content_bg_img_position_vertical]" id="home_page_before_content_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['home_page_before_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['home_page_before_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['home_page_before_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Page Title Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="page_title_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[page_title_bg_img]" type="text" id="page_title_bg_img" value="<?php if( $options['page_title_bg_img'] ){ echo esc_url($options['page_title_bg_img']); } ?>" size="65" />
                                            <input id="upload_page_title_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background  Properties:', 'u-design'); ?>
                                            <select name="udesign_options[page_title_bg_img_repeat]" id="page_title_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['page_title_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['page_title_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['page_title_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['page_title_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[page_title_bg_img_position_horizontal]" id="page_title_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['page_title_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['page_title_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['page_title_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[page_title_bg_img_position_vertical]" id="page_title_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['page_title_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['page_title_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['page_title_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Main Content Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="main_content_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[main_content_bg_img]" type="text" id="main_content_bg_img" value="<?php if( $options['main_content_bg_img'] ){ echo esc_url($options['main_content_bg_img']); } ?>" size="65" />
                                            <input id="upload_main_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'u-design'); ?>
                                            <select name="udesign_options[main_content_bg_img_repeat]" id="main_content_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['main_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['main_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['main_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['main_content_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[main_content_bg_img_position_horizontal]" id="main_content_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['main_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['main_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['main_content_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[main_content_bg_img_position_vertical]" id="main_content_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['main_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['main_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['main_content_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Bottom Area Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="bottom_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[bottom_bg_img]" type="text" id="bottom_bg_img" value="<?php if( $options['bottom_bg_img'] ){ echo esc_url($options['bottom_bg_img']); } ?>" size="65" />
                                            <input id="upload_bottom_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'u-design'); ?>
                                            <select name="udesign_options[bottom_bg_img_repeat]" id="bottom_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['bottom_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['bottom_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['bottom_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['bottom_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[bottom_bg_img_position_horizontal]" id="bottom_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['bottom_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['bottom_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['bottom_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[bottom_bg_img_position_vertical]" id="bottom_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['bottom_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['bottom_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['bottom_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#FCFCFC; border:1px solid #EBEBEB;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Footer Background Image', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="footer_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[footer_bg_img]" type="text" id="footer_bg_img" value="<?php if( $options['footer_bg_img'] ){ echo esc_url($options['footer_bg_img']); } ?>" size="65" />
                                            <input id="upload_footer_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 2px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'u-design'); ?>
                                            <select name="udesign_options[footer_bg_img_repeat]" id="footer_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['footer_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['footer_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['footer_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['footer_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[footer_bg_img_position_horizontal]" id="footer_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['footer_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['footer_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['footer_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[footer_bg_img_position_vertical]" id="footer_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['footer_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['footer_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['footer_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table" style="background-color:#F0F5F5; border:1px solid #DDE6E7;">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('One Continuous Background Image That Will Span Across All Sections', 'u-design'); ?></th>
                                    <td>
                                        <div style="padding:0; float:left;">
                                            <label for="one_continuous_bg_img"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input name="udesign_options[one_continuous_bg_img]" type="text" id="one_continuous_bg_img" value="<?php if( $options['one_continuous_bg_img'] ){ echo esc_url($options['one_continuous_bg_img']); } ?>" size="65" />
                                            <input id="upload_one_continuous_bg_img_button" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary" />
                                        </div>
                                        <div class="clear"></div>
                                        <div style="margin:10px 10px 10px 0; float:left;">
                                            <?php esc_html_e('Background Properties:', 'u-design'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_repeat]" id="one_continuous_bg_img_repeat">
                                                <option value="no-repeat"<?php echo ( 'no-repeat' === $options['one_continuous_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('No Repeat', 'u-design'); ?></option>
                                                <option value="repeat-x"<?php echo ( 'repeat-x' === $options['one_continuous_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Horizontally', 'u-design'); ?></option>
                                                <option value="repeat-y"<?php echo ( 'repeat-y' === $options['one_continuous_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Repeat only Vertically', 'u-design'); ?></option>
                                                <option value="repeat"<?php echo ( 'repeat' === $options['one_continuous_bg_img_repeat'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Repeat both Vertically and Horizontally', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Horizontal:', 'u-design'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_position_horizontal]" id="one_continuous_bg_img_position_horizontal">
                                                <option value="center"<?php echo ( 'center' === $options['one_continuous_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="left"<?php echo ( 'left' === $options['one_continuous_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('left', 'u-design'); ?></option>
                                                <option value="right"<?php echo ( 'right' === $options['one_continuous_bg_img_position_horizontal'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('right', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('Vertical:', 'u-design'); ?>
                                            <select name="udesign_options[one_continuous_bg_img_position_vertical]" id="one_continuous_bg_img_position_vertical">
                                                <option value="top"<?php echo ( 'top' === $options['one_continuous_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('top', 'u-design'); ?></option>
                                                <option value="center"<?php echo ( 'center' === $options['one_continuous_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('center', 'u-design'); ?></option>
                                                <option value="bottom"<?php echo ( 'bottom' === $options['one_continuous_bg_img_position_vertical'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('bottom', 'u-design'); ?></option>
                                            </select>
                                        </div>
                                        <div class="clear"></div>
                                        <div><span class="description" style="color:#A60000;"><?php printf( __('For Background color  %1$sTop Area Background %2$s%3$s  will be used.', 'u-design'), '<a title="Go To Top Area Background..." href="#top-area-background">', '&rarr;', '</a>'); ?></span></div>
                                        
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e('Fixed Position', 'u-design'); ?></span></legend>
                                            <label for="one_continuous_bg_img_fixed">
                                                <input name="udesign_options[one_continuous_bg_img_fixed]" type="checkbox" id="one_continuous_bg_img_fixed" value="yes" <?php checked('yes', $options['one_continuous_bg_img_fixed']); ?> />
                                                <?php esc_html_e("Fix the position of the background image so that it is not scrollable.", 'u-design'); ?><br />
                                            </label>
                                        </fieldset>
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e("Allow Other Sections' Images", 'u-design'); ?></span></legend>
                                            <label for="one_continuous_bg_img_with_other_bg_imgs">
                                                <input name="udesign_options[one_continuous_bg_img_with_other_bg_imgs]" type="checkbox" id="one_continuous_bg_img_with_other_bg_imgs" value="yes" <?php checked('yes', $options['one_continuous_bg_img_with_other_bg_imgs']); ?> />
                                                <?php esc_html_e("Enable background images from other sections to show as well, you can achieve sort of layered layout.", 'u-design'); ?><br />
                                            </label>
                                        </fieldset>
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Remove Horizontal Rulers', 'u-design'); ?></th>
                                    <td>
                                        <fieldset style="margin-top:5px;"><legend class="screen-reader-text"><span><?php esc_html_e("Remove Horizontal Rulers", 'u-design'); ?></span></legend>
                                            <label for="udesign_remove_horizontal_rulers">
                                                <input name="udesign_options[udesign_remove_horizontal_rulers]" type="checkbox" id="udesign_remove_horizontal_rulers" value="yes" <?php checked('yes', $options['udesign_remove_horizontal_rulers']); ?> />
                                                <?php esc_html_e("This option will allow you to remove the horizontal ruler lines that are enabled by default for some sections.", 'u-design'); ?><br />
                                            </label>
                                            <div style="margin-top:10px;"><span class="description"><?php printf( __('Note: If you wish to remove the border line under the top navigation menu, the option for that is located under: %1$s Menus Options %2$s Main Menu %2$s Border Under the Menu %3$s', 'u-design'), '<br /><strong>', '&rarr;', '</strong>'); ?></span></div>
                                        </fieldset>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clear"></div>
                    </div>
<?php		    display_save_changes_button(); ?>
                    
<?php		endif; ?>

<?php	}

	function front_page_options_contentbox( $options ) {
		$current_slider = $options['current_slider']; ?>

		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Current Slider', 'u-design'); ?></th>
			    <td>
				<label for="current_slider"><?php esc_html_e('Choose a slider:', 'u-design'); ?></label>
				<br />
				<select name="udesign_options[current_slider]" id="current_slider">
				    <option value="4"<?php echo ( '4' === $current_slider ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 1 (full width image)', 'u-design'); ?></option>
				    <option value="5"<?php echo ( '5' === $current_slider ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 2 (image with text)', 'u-design'); ?></option>
				    <option value="6"<?php echo ( '6' === $current_slider ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('Cycle 3 (image with sliding text)', 'u-design'); ?></option>
				    <option value="8"<?php echo ( '8' === $current_slider ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('Revolution Slider', 'u-design'); ?></option>
				    <option value="7"<?php echo ( '7' === $current_slider ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('No Slider', 'u-design'); ?></option>
				</select>
				<div class="clear"></div>
				<div class="submit" style="padding:10px 0 0 80px; float:left; clear:both;">
				    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
				    <input class="button-secondary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save & Activate', 'u-design'); ?>" />
                                    <span class="spinner"></span>
				</div>
<?php				if ( $current_slider != '7' ) : ?>
				    <div style="padding-top:10px; clear:both;"><?php esc_html_e('Continue with the section below to customize the slider...', 'u-design'); ?></div>
<?php				endif; ?>
			    </td>
			</tr>
		    </tbody>
		</table>

<?php		if ( $current_slider == '4' ) :
		    $c1_slides_order_str = $options['c1_slides_order_str'];
		    $c1_slides_array = explode( ',', $options['c1_slides_order_str'] );
		    $c1_speed = $options['c1_speed'];
		    $c1_timeout = $options['c1_timeout'];
		    $c1_remove_image_frame = ( isset( $options['c1_remove_image_frame'] ) ) ? $options['c1_remove_image_frame'] : '';
		    $c1_sync = $options['c1_sync']; // Also make sure that the other slides' forms add an invisible instance of this checkbox to preserve the state.
		    $c1_remove_3d_shadow = ( isset( $options['c1_remove_3d_shadow'] ) ) ? $options['c1_remove_3d_shadow'] : '';
		    $c2_sync = ( isset( $options['c2_sync'] ) ) ? $options['c2_sync'] : '';
		    $c2_text_transition_on = ( isset( $options['c2_text_transition_on'] ) ) ? $options['c2_text_transition_on'] : '';
		    $c3_autostop = ( isset( $options['c3_autostop'] ) ) ? $options['c3_autostop'] : '';
		    ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $c2_text_transition_on); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $c3_autostop); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 1 Slider Settings:', 'u-design'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c1_speed"><?php esc_html_e('Transition Speed', 'u-design'); ?></label></th>
				<td>
				    <input name="udesign_options[c1_speed]" type="text" id="c1_speed" value="<?php echo esc_attr($c1_speed); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Speed of the transition.', 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="c1_timeout"><?php esc_html_e('Timeout', 'u-design'); ?></label></th>
				<td>
				    <input name="udesign_options[c1_timeout]" type="text" id="c1_timeout" value="<?php echo esc_attr($c1_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sync', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Sync', 'u-design'); ?></span></legend>
				    <label for="c1_sync">
					<input name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $c1_sync); ?> />
					<?php esc_html_e('Toggle this option to see how some effects behave differently (such as blind, curtain, and zoom).', 'u-design'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Image Frame', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Image Frame', 'u-design'); ?></span></legend>
				    <label for="c1_remove_image_frame">
					<input name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $c1_remove_image_frame); ?> />
					<?php esc_html_e('Remove the image frame with the border around the image?', 'u-design'); ?><br />
					<span class="description"><?php esc_html_e('With the frame enabled (default state) image dimension is 914px by 374px (width by height). Without the frame image dimension is 940px by 400px. Depending on which option is selected, create and upload images with the corresponding dimensions for optimal quality.', 'u-design'); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('3D Shadow', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('3D Shadow', 'u-design'); ?></span></legend>
				    <label for="c1_remove_3d_shadow">
					<input name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $c1_remove_3d_shadow); ?> />
					<?php esc_html_e('Remove the 3D shadow under the slider', 'u-design'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>

		    <input name="udesign_options[c1_slides_order_str]" type="hidden" id="c1_slides_order_str" value="<?php if ($c1_slides_order_str){ echo esc_attr($c1_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="c1-table-slides" class="c1-table-slides">
			<tbody>
    <?php		    foreach( $c1_slides_array as $position => $slide_row_number ) : ?>
				<tr id="<?php echo esc_attr( $slide_row_number ); ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo ( esc_attr( $position ) + 1 ); ?></td>
				    <td style="padding:0 10px 10px 20px; width:100%" valign="top">
                                        <div class="c1_slide_upload_section" style="padding:10px 0; float:left;">
                                            <label style="float:left; margin:1px; font-weight:bold;" for="c1_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                            <input class="c1_slide_img_url_field" name="udesign_options[c1_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c1_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if( $options['c1_slide_img_url_'.$slide_row_number] ){ echo esc_url($options['c1_slide_img_url_'.$slide_row_number]); } ?>" size="65" />
                                            <input id="c1_slide_upload_button_<?php echo esc_attr( $slide_row_number ); ?>" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c1_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                        </div>
                                        <div class="clear"></div>
					<div class="transition-type" style="padding:7px 5px 0 0; float:left;">
					    <select name="udesign_options[c1_transition_type_<?php echo esc_attr( $slide_row_number ); ?>]" id="c1_transition_type_<?php echo esc_attr( $slide_row_number ); ?>">
						<option value="fade"<?php echo ( 'fade' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>fade</option>
						<option value="curtainX"<?php echo ( 'curtainX' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>curtainX</option>
						<option value="curtainY"<?php echo ( 'curtainY' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>curtainY</option>
						<option value="turnUp"<?php echo ( 'turnUp' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnUp</option>
						<option value="turnDown"<?php echo ( 'turnDown' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnDown</option>
						<option value="wipe"<?php echo ( 'wipe' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>wipe</option>
						<option value="scrollHorz"<?php echo ( 'scrollHorz' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollHorz</option>
						<option value="scrollVert"<?php echo ( 'scrollVert' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollVert</option>
						<option value="growX"<?php echo ( 'growX' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>growX</option>
						<option value="growY"<?php echo ( 'growY' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>growY</option>
						<option value="scrollUp"<?php echo ( 'scrollUp' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollUp</option>
						<option value="scrollDown"<?php echo ( 'scrollDown' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollDown</option>
						<option value="shuffle"<?php echo ( 'shuffle' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>shuffle</option>
						<option value="blindX"<?php echo ( 'blindX' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindX</option>
						<option value="blindY"<?php echo ( 'blindY' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindY</option>
						<option value="blindZ"<?php echo ( 'blindZ' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindZ</option>
						<option value="cover"<?php echo ( 'cover' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>cover</option>
						<option value="fadeZoom"<?php echo ( 'fadeZoom' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>fadeZoom</option>
						<option value="scrollLeft"<?php echo ( 'scrollLeft' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollLeft</option>
						<option value="scrollRight"<?php echo ( 'scrollRight' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollRight</option>
						<option value="slideX"<?php echo ( 'slideX' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>slideX</option>
						<option value="slideY"<?php echo ( 'slideY' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>slideY</option>
						<option value="toss"<?php echo ( 'toss' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>toss</option>
						<option value="turnLeft"<?php echo ( 'turnLeft' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnLeft</option>
						<option value="turnRight"<?php echo ( 'turnRight' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnRight</option>
						<option value="uncover"<?php echo ( 'uncover' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>uncover</option>
						<option value="zoom"<?php echo ( 'zoom' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>zoom</option>
						<option value="none"<?php echo ( 'none' === $options['c1_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>none</option>
					    </select>
					    <span><?php esc_html_e('Transition effect.', 'u-design'); ?></span>
					</div>
					<div id="c1_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" class="slide-link" style="padding:20px 5px 0; clear:both;">
					    <label for="c1_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>"><?php esc_html_e('Link:', 'u-design'); ?> </label>
					    <input name="udesign_options[c1_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c1_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c1_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c1_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c1_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c1_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>]" id="c1_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						    <option value="self"<?php echo ( 'self' === $options['c1_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"<?php echo ( 'blank' === $options['c1_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c1_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label> 
                                                <input name="udesign_options[c1_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c1_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php echo esc_attr($options['c1_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
                                            <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'u-design'); ?></span></div>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c1-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:0 10px 10px 20px; width:100%" valign="top">
                                    <div class="c1_slide_upload_section" style="padding:10px 0; float:left;">
                                        <label style="float:left; margin:1px; font-weight:bold;" for="c1_slide_img_url_999"><?php esc_html_e('Enter a URL or upload an image:', 'u-design'); ?></label><br />
                                        <input class="c1_slide_img_url_field" name="udesign_options[c1_slide_img_url_999]" type="text" id="c1_slide_img_url_999" value="" size="65" />
                                        <input id="c1_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c1_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
                                    </div>
                                    <div class="clear"></div>
				    <div class="transition-type" style="padding:7px 5px 0 0; float:left;">
					<select name="udesign_options[c1_transition_type_999]" id="c1_transition_type_999">
					    <option value="fade" selected="selected">fade</option>
					    <option value="curtainX">curtainX</option>
					    <option value="curtainY">curtainY</option>
					    <option value="turnUp">turnUp</option>
					    <option value="turnDown">turnDown</option>
					    <option value="wipe">wipe</option>
					    <option value="scrollHorz">scrollHorz</option>
					    <option value="scrollVert">scrollVert</option>
					    <option value="growX">growX</option>
					    <option value="growY">growY</option>
					    <option value="scrollUp">scrollUp</option>
					    <option value="scrollDown">scrollDown</option>
					    <option value="shuffle">shuffle</option>
					    <option value="blindX">blindX</option>
					    <option value="blindY">blindY</option>
					    <option value="blindZ">blindZ</option>
					    <option value="cover">cover</option>
					    <option value="fadeZoom">fadeZoom</option>
					    <option value="scrollLeft">scrollLeft</option>
					    <option value="scrollRight">scrollRight</option>
					    <option value="slideX">slideX</option>
					    <option value="slideY">slideY</option>
					    <option value="toss">toss</option>
					    <option value="turnLeft">turnLeft</option>
					    <option value="turnRight">turnRight</option>
					    <option value="uncover">uncover</option>
					    <option value="zoom">zoom</option>
					    <option value="none">none</option>
					</select>
					<span><?php esc_html_e('Transition effect.', 'u-design'); ?></span>
				    </div>
				    <div id="c1_slide_link_url_999" class="slide-link" style="padding:20px 5px 0; clear:both;">
					<label for="c1_slide_link_url_999" class="link-url"><?php esc_html_e('Link:', 'u-design'); ?> </label>
					<input name="udesign_options[c1_slide_link_url_999]" type="text" id="c1_slide_link_url_999" value="" size="30" />
					<label for="c1_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c1_slide_link_target_999]" id="c1_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c1_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label>
                                            <input name="udesign_options[c1_slide_image_alt_tag_999]" type="text" id="c1_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
                                        <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'u-design'); ?></span></div>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '5' ) :
		    $c2_slides_order_str = $options['c2_slides_order_str'];
		    $c2_slides_array = explode( ',', $options['c2_slides_order_str'] );
		    $c2_speed = $options['c2_speed'];
		    $c2_timeout = $options['c2_timeout'];
		    $c2_sync = ( isset( $options['c2_sync'] ) ) ? $options['c2_sync'] : ''; // Also make sure that the other slides' forms add an invisible instance of this checkbox to preserve the state.
		    $c1_remove_image_frame = ( isset( $options['c1_remove_image_frame'] ) ) ? $options['c1_remove_image_frame'] : '';
		    $c2_text_transition_on = ( isset( $options['c2_text_transition_on'] ) ) ? $options['c2_text_transition_on'] : '';
		    $c3_autostop = ( isset( $options['c3_autostop'] ) ) ? $options['c3_autostop'] : '';
		    $c2_text_color = ( isset( $options['c2_text_color'] )&& $options['c2_text_color'] ) ? $options['c2_text_color'] : '333333'; ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $c1_remove_image_frame); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $options['c1_remove_3d_shadow']); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $c3_autostop); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 2 Slider Settings:', 'u-design'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c2_speed"><?php esc_html_e('Transition Speed', 'u-design'); ?></label></th>
				<td>
				    <input name="udesign_options[c2_speed]" type="text" id="c2_speed" value="<?php echo esc_attr($c2_speed); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Speed of the transition.', 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><label for="c2_timeout"><?php esc_html_e('Timeout', 'u-design'); ?></label></th>
				<td>
				    <input name="udesign_options[c2_timeout]" type="text" id="c2_timeout" value="<?php echo esc_attr($c2_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sync', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Sync', 'u-design'); ?></span></legend>
				    <label for="c2_sync">
					<input name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
					<?php esc_html_e('Toggle this option to see how some effects behave differently (such as blind, curtain, and zoom).', 'u-design'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Enable Transition on Text', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Transition on Text', 'u-design'); ?></span></legend>
				    <label for="c2_text_transition_on">
					<input name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $c2_text_transition_on); ?> />
					<?php esc_html_e('Toggle this option to enable/disable the transition effect on the info text. If disabled (unchecked) then the text will disapear for the duration of the transition.', 'u-design'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Size', 'u-design'); ?></th>
				<td>
				    <label for="c2_slider_text_size">
					    <?php esc_html_e('Font Size: ', 'u-design'); ?>
					    <select name="udesign_options[c2_slider_text_size]" id="c2_slider_text_size">
						<option value="1.0"<?php echo ( '1.0' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.0em</option>
						<option value="1.1"<?php echo ( '1.1' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.1em</option>
						<option value="1.2"<?php echo ( '1.2' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.2em (Default)</option>
						<option value="1.3"<?php echo ( '1.3' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.3em</option>
						<option value="1.4"<?php echo ( '1.4' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.4em</option>
						<option value="1.5"<?php echo ( '1.5' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.5em</option>
						<option value="1.6"<?php echo ( '1.6' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.6em</option>
						<option value="1.7"<?php echo ( '1.7' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.7em</option>
						<option value="1.8"<?php echo ( '1.8' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.8em</option>
						<option value="1.9"<?php echo ( '1.9' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.9em</option>
						<option value="2.0"<?php echo ( '2.0' === $options['c2_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>2.0em</option>
					    </select>
				    </label>
				    <br />
				    <?php esc_html_e('When using "em" you are specifying size relative to the general font size.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Line Height', 'u-design'); ?></th>
				<td>
				    <label for="c2_slider_text_line_height">
					    <?php esc_html_e('Line Height: ', 'u-design'); ?>
					    <select name="udesign_options[c2_slider_text_line_height]" id="c2_slider_text_line_height">
						<option value="0.5"<?php echo ( '0.5' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.5</option>
						<option value="0.6"<?php echo ( '0.6' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.6</option>
						<option value="0.7"<?php echo ( '0.7' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.7</option>
						<option value="0.8"<?php echo ( '0.8' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.8</option>
						<option value="0.9"<?php echo ( '0.9' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.9</option>
						<option value="1.0"<?php echo ( '1.0' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.0</option>
						<option value="1.1"<?php echo ( '1.1' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.1</option>
						<option value="1.2"<?php echo ( '1.2' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.2</option>
						<option value="1.3"<?php echo ( '1.3' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.3</option>
						<option value="1.4"<?php echo ( '1.4' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.4</option>
						<option value="1.5"<?php echo ( '1.5' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.5</option>
						<option value="1.6"<?php echo ( '1.6' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.6</option>
						<option value="1.7"<?php echo ( '1.7' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.7 (Default)</option>
						<option value="1.8"<?php echo ( '1.8' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.8</option>
						<option value="1.9"<?php echo ( '1.9' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.9</option>
						<option value="2.0"<?php echo ( '2.0' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.0</option>
						<option value="2.1"<?php echo ( '2.1' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.1</option>
						<option value="2.2"<?php echo ( '2.2' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.2</option>
						<option value="2.3"<?php echo ( '2.3' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.3</option>
						<option value="2.4"<?php echo ( '2.4' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.4</option>
						<option value="2.5"<?php echo ( '2.5' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.5</option>
						<option value="2.6"<?php echo ( '2.6' === $options['c2_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.6</option>
					    </select>
				    </label>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="c2-colorSelector1">
					<div style="background-color: #<?php echo esc_attr( $c2_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[c2_text_color]" id="c2_text_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $c2_text_color );; ?>" />
				    <?php esc_html_e('Slider text color including the Title.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>


		    <input name="udesign_options[c2_slides_order_str]" type="hidden" id="c2_slides_order_str" value="<?php if ( $c2_slides_order_str ){ echo esc_attr( $c2_slides_order_str ); }?>" />
		    <div class="add-row" style></div>
		    <table id="c2-table-slides" class="c2-table-slides">
			<tbody>
    <?php		    foreach( $c2_slides_array as $position=>$slide_row_number ) : ?>
				<tr id="<?php echo esc_attr( $slide_row_number ); ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo ( esc_attr( $position ) + 1 ); ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="c2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label style="font-weight:bold;" for="c2_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>"><?php esc_html_e('Image:', 'u-design'); ?></label>
                                            <input class="c2_slide_img_url_field" name="udesign_options[c2_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c2_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c2_slide_img_url_'.$slide_row_number]){ echo esc_url($options['c2_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c2_slide_upload_button_<?php echo esc_attr( $slide_row_number ); ?>" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c2_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
					<div class="transition-type" style="padding:10px 5px 0 0; clear:both;">
					    <strong><?php esc_html_e('Transition:', 'u-design'); ?></strong>
					    <select name="udesign_options[c2_transition_type_<?php echo esc_attr( $slide_row_number ); ?>]" id="c2_transition_type_<?php echo esc_attr( $slide_row_number ); ?>">
						<option value="fade"<?php echo ( 'fade' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>fade</option>
						<option value="curtainX"<?php echo ( 'curtainX' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>curtainX</option>
						<option value="curtainY"<?php echo ( 'curtainY' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>curtainY</option>
						<option value="turnUp"<?php echo ( 'turnUp' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnUp</option>
						<option value="turnDown"<?php echo ( 'turnDown' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnDown</option>
						<option value="wipe"<?php echo ( 'wipe' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>wipe</option>
						<option value="scrollHorz"<?php echo ( 'scrollHorz' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollHorz</option>
						<option value="scrollVert"<?php echo ( 'scrollVert' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollVert</option>
						<option value="growX"<?php echo ( 'growX' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>growX</option>
						<option value="growY"<?php echo ( 'growY' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>growY</option>
						<option value="scrollUp"<?php echo ( 'scrollUp' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollUp</option>
						<option value="scrollDown"<?php echo ( 'scrollDown' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollDown</option>
						<option value="shuffle"<?php echo ( 'shuffle' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>shuffle</option>
						<option value="blindX"<?php echo ( 'blindX' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindX</option>
						<option value="blindY"<?php echo ( 'blindY' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindY</option>
						<option value="blindZ"<?php echo ( 'blindZ' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>blindZ</option>
						<option value="cover"<?php echo ( 'cover' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>cover</option>
						<option value="fadeZoom"<?php echo ( 'fadeZoom' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>fadeZoom</option>
						<option value="scrollLeft"<?php echo ( 'scrollLeft' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollLeft</option>
						<option value="scrollRight"<?php echo ( 'scrollRight' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>scrollRight</option>
						<option value="slideX"<?php echo ( 'slideX' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>slideX</option>
						<option value="slideY"<?php echo ( 'slideY' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>slideY</option>
						<option value="toss"<?php echo ( 'toss' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>toss</option>
						<option value="turnLeft"<?php echo ( 'turnLeft' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnLeft</option>
						<option value="turnRight"<?php echo ( 'turnRight' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>turnRight</option>
						<option value="uncover"<?php echo ( 'uncover' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>uncover</option>
						<option value="zoom"<?php echo ( 'zoom' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>zoom</option>
						<option value="none"<?php echo ( 'none' === $options['c2_transition_type_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>>none</option>
					    </select>
					</div>
					<div id="c2_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" class="slide-link" style="padding:10px 5px 0 0; clear:both;">
					    <label for="c2_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" style="font-weight:bold;"><?php esc_html_e('Link:', 'u-design'); ?> </label>
					    <input name="udesign_options[c2_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c2_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c2_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c2_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c2_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c2_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>]" id="c2_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						    <option value="self"<?php echo ( 'self' === $options['c2_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"<?php echo ( 'blank' === $options['c2_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c2_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label> 
                                                <input name="udesign_options[c2_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c2_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php echo esc_attr($options['c2_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
					</div>
					<div class="slide-info-text" style="padding:10px 5px 0 0; width:60%; float:left; display:inline;">
					    <strong><?php esc_html_e('Slide text', 'u-design'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'u-design'); ?></span>:<br />
					    <textarea name="udesign_options[c2_slide_default_info_txt_<?php echo esc_attr( $slide_row_number ); ?>]" class="code"
							style="width:97%; font-size:12px; margin: 5px 0;" id="c2_slide_default_info_txt_<?php echo esc_attr( $slide_row_number ); ?>"
							rows="4" cols="60"><?php echo ( isset( $options['c2_slide_default_info_txt_'.$slide_row_number] ) && $options['c2_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr( $options['c2_slide_default_info_txt_'.$slide_row_number] ) : ''; ?></textarea>
					</div>
					<div class="slide-button" style="padding-top:10px; float:left; display:inline; width:35%">
					    <label for="c2_slide_button_txt_<?php echo esc_attr( $slide_row_number ); ?>" class="slide-button-text" style="font-weight:bold;"><?php esc_html_e('Button Text:', 'u-design'); ?> </label><br />
					    <input name="udesign_options[c2_slide_button_txt_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c2_slide_button_txt_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php echo esc_attr($options['c2_slide_button_txt_'.$slide_row_number]); ?>" size="20" /><br />
					    <label for="c2_slide_button_style_<?php echo esc_attr( $slide_row_number ); ?>" class="slide-button-style" style="margin-top:5px;font-weight:bold; float:left;"><?php esc_html_e('Button Style: ', 'u-design'); ?>
						<select name="udesign_options[c2_slide_button_style_<?php echo esc_attr( $slide_row_number ); ?>]" id="c2_slide_button_style_<?php echo esc_attr( $slide_row_number ); ?>">
						    <option value="dark"<?php echo ( 'dark' === $options['c2_slide_button_style_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Dark', 'u-design'); ?></option>
						    <option value="light"<?php echo ( 'light' === $options['c2_slide_button_style_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Light', 'u-design'); ?></option>
						</select>
					    </label><br />
					    <span class="description" style="float:left;padding:5px; display:block; line-height:1.4; font-size:12px;"><?php _e('The button is activated only if a <strong>Link</strong> is provided. To remove the button just replace the link with a single space.', 'u-design'); ?></span>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c2-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="c2_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label style="font-weight:bold;" for="c2_slide_img_url_999"><?php esc_html_e('Image:', 'u-design'); ?></label>
                                        <input class="c2_slide_img_url_field" name="udesign_options[c2_slide_img_url_999]" type="text" id="c2_slide_img_url_999" value="" size="65" />
                                        <input id="c2_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c2_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
				    <div class="transition-type" style="padding:10px 5px 0 0; clear:both;">
					<strong><?php esc_html_e('Transition:', 'u-design'); ?></strong>
					<select name="udesign_options[c2_transition_type_999]" id="c2_transition_type_999">
					    <option value="fade" selected="selected">fade</option>
					    <option value="curtainX">curtainX</option>
					    <option value="curtainY">curtainY</option>
					    <option value="turnUp">turnUp</option>
					    <option value="turnDown">turnDown</option>
					    <option value="wipe">wipe</option>
					    <option value="scrollHorz">scrollHorz</option>
					    <option value="scrollVert">scrollVert</option>
					    <option value="growX">growX</option>
					    <option value="growY">growY</option>
					    <option value="scrollUp">scrollUp</option>
					    <option value="scrollDown">scrollDown</option>
					    <option value="shuffle">shuffle</option>
					    <option value="blindX">blindX</option>
					    <option value="blindY">blindY</option>
					    <option value="blindZ">blindZ</option>
					    <option value="cover">cover</option>
					    <option value="fadeZoom">fadeZoom</option>
					    <option value="scrollLeft">scrollLeft</option>
					    <option value="scrollRight">scrollRight</option>
					    <option value="slideX">slideX</option>
					    <option value="slideY">slideY</option>
					    <option value="toss">toss</option>
					    <option value="turnLeft">turnLeft</option>
					    <option value="turnRight">turnRight</option>
					    <option value="uncover">uncover</option>
					    <option value="zoom">zoom</option>
					    <option value="none">none</option>
					</select>
				    </div>
				    <div id="c2_slide_link_url_999" class="slide-link" style="padding:10px 5px 0 0; clear:both;">
					<label for="c2_slide_link_url_999" class="link-url" style="font-weight:bold;"><?php esc_html_e('Link:', 'u-design'); ?> </label>
					<input name="udesign_options[c2_slide_link_url_999]" type="text" id="c2_slide_link_url_999" value="" size="30" />
					<label for="c2_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c2_slide_link_target_999]" id="c2_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c2_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label>
                                            <input name="udesign_options[c2_slide_image_alt_tag_999]" type="text" id="c2_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
				    </div>
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:60%; float:left; display:inline;">
					<strong><?php esc_html_e('Slide text', 'u-design'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'u-design'); ?></span>:<br />
					<textarea name="udesign_options[c2_slide_default_info_txt_999]" class="code"
						    style="width:97%; font-size:12px; margin: 5px 0;" id="c2_slide_default_info_txt_999"
						    rows="4" cols="60"><?php echo get_c2_slide_default_info_txt(); ?></textarea>
				    </div>
				    <div class="slide-button" style="padding-top:10px; float:left; display:inline; width:35%">
					<label for="c2_slide_button_txt_999" class="slide-button-text" style="font-weight:bold;"><?php esc_html_e('Button Text:', 'u-design'); ?> </label><br />
					<input name="udesign_options[c2_slide_button_txt_999]" type="text" id="c2_slide_button_txt_999" value="<?php echo esc_attr($options['c2_slide_button_txt_1']); ?>" size="20" /><br />
					<label for="c2_slide_button_style_999" class="slide-button-style" style="margin-top:5px;font-weight:bold; float:left;"><?php esc_html_e('Button Style: ', 'u-design'); ?>
					    <select name="udesign_options[c2_slide_button_style_999]" id="c2_slide_button_style_999">
						<option value="dark" selected="selected" style="padding-right:10px;"><?php esc_attr_e('Dark', 'u-design'); ?></option>
						<option value="light"><?php esc_attr_e('Light', 'u-design'); ?></option>
					    </select>
					</label><br />
					<span class="description" style="float:left; padding:5px; display:block; line-height:17px;"><?php _e('The button is activated only if a <strong>Link</strong> is provided. To remove the button just replace the link with a single space.', 'u-design'); ?></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '6' ) :
		    $c3_slides_order_str = $options['c3_slides_order_str'];
		    $c3_slides_array = explode( ',', $options['c3_slides_order_str'] );
		    $c3_timeout = $options['c3_timeout'];
		    $c3_text_color = ( isset( $options['c3_text_color'] ) && $options['c3_text_color'] ) ? $options['c3_text_color'] : 'FFFFFF';
		    $c3_autostop = ( isset( $options['c3_autostop'] ) ) ? $options['c3_autostop'] : '';
		    $c1_remove_image_frame = ( isset( $options['c1_remove_image_frame'] ) ) ? $options['c1_remove_image_frame'] : '';
		    $c1_sync = $options['c1_sync']; // Also make sure that the other slides' forms add an invisible instance of this checkbox to preserve the state.
		    $c1_remove_3d_shadow = ( isset( $options['c1_remove_3d_shadow'] ) ) ? $options['c1_remove_3d_shadow'] : '';
		    $c2_sync = ( isset( $options['c2_sync'] ) ) ? $options['c2_sync'] : '';
		    $c2_text_transition_on = ( isset( $options['c2_text_transition_on'] ) ) ? $options['c2_text_transition_on'] : '';
		    ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $options['c1_sync']); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $c1_remove_image_frame); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $c1_remove_3d_shadow); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $c2_text_transition_on); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ( $options['no_slider_text'] ) { echo esc_attr( $options['no_slider_text'] ); } ?>" />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ( $options['rev_slider_shortcode'] ) { echo esc_attr( $options['rev_slider_shortcode'] ); } ?>" />


		    <h2 style="color:#2680AA; margin-top: 2px; padding:20px 10px 0;"><?php esc_html_e('Cycle 3 Slider Settings:', 'u-design'); ?></h2>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><label for="c3_timeout"><?php esc_html_e('Timeout', 'u-design'); ?></label></th>
				<td>
				    <input name="udesign_options[c3_timeout]" type="text" id="c3_timeout" value="<?php echo esc_attr($c3_timeout); ?>" size="5" maxlength="6" />
				    <span><?php esc_html_e('Milliseconds between slide transitions (0 to disable auto advance).', 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Autostop', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Autostop', 'u-design'); ?></span></legend>
				    <label for="c3_autostop">
					<input name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $c3_autostop); ?> />
					<?php esc_html_e('End slideshow after the last slide.', 'u-design'); ?><br />
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Size', 'u-design'); ?></th>
				<td>
				    <label for="c3_slider_text_size">
					    <?php esc_html_e('Font Size: ', 'u-design'); ?>
					    <select name="udesign_options[c3_slider_text_size]" id="c3_slider_text_size">
						<option value="1.0"<?php echo ( '1.0' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.0em</option>
						<option value="1.1"<?php echo ( '1.1' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.1em</option>
						<option value="1.2"<?php echo ( '1.2' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.2em (Default)</option>
						<option value="1.3"<?php echo ( '1.3' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.3em</option>
						<option value="1.4"<?php echo ( '1.4' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.4em</option>
						<option value="1.5"<?php echo ( '1.5' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.5em</option>
						<option value="1.6"<?php echo ( '1.6' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.6em</option>
						<option value="1.7"<?php echo ( '1.7' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.7em</option>
						<option value="1.8"<?php echo ( '1.8' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.8em</option>
						<option value="1.9"<?php echo ( '1.9' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>1.9em</option>
						<option value="2.0"<?php echo ( '2.0' === $options['c3_slider_text_size'] ) ? ' selected="selected"' : ''; ?>>2.0em</option>
					    </select>
				    </label>
				    <br />
				    <?php esc_html_e('When using "em" you are specifying size relative to the general font size.', 'u-design'); ?>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Line Height', 'u-design'); ?></th>
				<td>
				    <label for="c3_slider_text_line_height">
					    <?php esc_html_e('Line Height: ', 'u-design'); ?>
					    <select name="udesign_options[c3_slider_text_line_height]" id="c3_slider_text_line_height">
						<option value="0.5"<?php echo ( '0.5' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.5</option>
						<option value="0.6"<?php echo ( '0.6' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.6</option>
						<option value="0.7"<?php echo ( '0.7' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.7</option>
						<option value="0.8"<?php echo ( '0.8' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.8</option>
						<option value="0.9"<?php echo ( '0.9' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>0.9</option>
						<option value="1.0"<?php echo ( '1.0' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.0</option>
						<option value="1.1"<?php echo ( '1.1' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.1</option>
						<option value="1.2"<?php echo ( '1.2' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.2</option>
						<option value="1.3"<?php echo ( '1.3' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.3</option>
						<option value="1.4"<?php echo ( '1.4' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.4</option>
						<option value="1.5"<?php echo ( '1.5' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.5</option>
						<option value="1.6"<?php echo ( '1.6' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.6</option>
						<option value="1.7"<?php echo ( '1.7' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?> style="padding-right:7px;">1.7 (Default)</option>
						<option value="1.8"<?php echo ( '1.8' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.8</option>
						<option value="1.9"<?php echo ( '1.9' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>1.9</option>
						<option value="2.0"<?php echo ( '2.0' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.0</option>
						<option value="2.1"<?php echo ( '2.1' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.1</option>
						<option value="2.2"<?php echo ( '2.2' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.2</option>
						<option value="2.3"<?php echo ( '2.3' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.3</option>
						<option value="2.4"<?php echo ( '2.4' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.4</option>
						<option value="2.5"<?php echo ( '2.5' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.5</option>
						<option value="2.6"<?php echo ( '2.6' === $options['c3_slider_text_line_height'] ) ? ' selected="selected"' : ''; ?>>2.6</option>
					    </select>
				    </label>
				</td>
			    </tr>
			</tbody>
		    </table>

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Text Color', 'u-design'); ?></th>
				<td style="width:37px; padding:4px 4px">
				    <div id="c3-colorSelector1">
					<div style="background-color: #<?php echo esc_attr( $c3_text_color ); ?>;"></div>
				    </div>
				</td>
				<td>
				    <input name="udesign_options[c3_text_color]" id="c3_text_color" type="text" maxlength="6" size="6" style="margin:2px 10px 0 0" value="<?php echo esc_attr( $c3_text_color ); ?>" />
				    <?php esc_html_e('Slider text color.', 'u-design'); ?>
				</td>
			    </tr>
			</tbody>
		    </table>
		    <?php display_save_changes_button(); ?>


		    <input name="udesign_options[c3_slides_order_str]" type="hidden" id="c3_slides_order_str" value="<?php if ($c3_slides_order_str){ echo esc_attr($c3_slides_order_str); }?>" />
		    <div class="add-row" style></div>
		    <table id="c3-table-slides" class="c3-table-slides">
			<tbody>
    <?php		    foreach( $c3_slides_array as $position => $slide_row_number ) : ?>
				<tr id="<?php echo esc_attr( $slide_row_number ); ?>" class="row-style">
				    <td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				    <td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				    <td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px"><?php echo ( esc_attr( $position ) + 1 ); ?></td>
				    <td style="padding:10px 10px 10px 20px; width:100%" valign="top">
					<div class="c3_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                            <label style="font-weight:bold;" for="c3_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>"><?php esc_html_e('Image:', 'u-design'); ?></label>
                                            <input class="c3_slide_img_url_field" name="udesign_options[c3_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c3_slide_img_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c3_slide_img_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_img_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c3_slide_upload_button_<?php echo esc_attr( $slide_row_number ); ?>" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c3_slide_img_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
 
					<div id="c3_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" class="slide-link" style="padding:5px 5px 10px 0; clear:both;">
					    <label for="c3_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" style="font-weight:bold;"><?php esc_html_e('Image Link:', 'u-design'); ?> </label>
					    <input name="udesign_options[c3_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c3_slide_link_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c3_slide_link_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_link_url_'.$slide_row_number]); }?>" size="30" />
					    <label for="c3_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c3_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>]" id="c3_slide_link_target_<?php echo esc_attr( $slide_row_number ); ?>">
						    <option value="self"<?php echo ( 'self' === $options['c3_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"<?php echo ( 'blank' === $options['c3_slide_link_target_'.$slide_row_number] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					    </label>
                                            <div class="slide-alt-tag" style="display:inline-block;">
                                                <label for="c3_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label> 
                                                <input name="udesign_options[c3_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c3_slide_image_alt_tag_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php echo esc_attr($options['c3_slide_image_alt_tag_'.$slide_row_number]); ?>" size="20" />
                                            </div>
                                            <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'u-design'); ?></span></div>
					</div>

                                        <div class="c3_slide_img2_url" style="padding:10px 5px 0 0; float:left; display:inline; clear:left;">
                                            <label style="font-weight:bold;" for="c3_slide_img2_url_<?php echo esc_attr( $slide_row_number ); ?>"><?php esc_html_e('Image 2:', 'u-design'); ?></label>
                                            <input class="c3_slide_img2_url_field" name="udesign_options[c3_slide_img2_url_<?php echo esc_attr( $slide_row_number ); ?>]" type="text" id="c3_slide_img2_url_<?php echo esc_attr( $slide_row_number ); ?>" value="<?php if ($options['c3_slide_img2_url_'.$slide_row_number]){ echo esc_url($options['c3_slide_img2_url_'.$slide_row_number]); }?>" size="65" />
                                            <input id="c3_slide_upload_button2_<?php echo esc_attr( $slide_row_number ); ?>" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c3_slide_img2_url_btn" />
                                            <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
					</div>
                                        
					<div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; clear:both;">
					    <strong><?php esc_html_e('Slide text', 'u-design'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'u-design'); ?></span>:<br />
					    <textarea name="udesign_options[c3_slide_default_info_txt_<?php echo esc_attr( $slide_row_number ); ?>]" class="code"
							style="float:left; width:70%; display:inline; font-size:12px; margin: 5px 0;" id="c3_slide_default_info_txt_<?php echo esc_attr( $slide_row_number ); ?>"
							rows="3" cols="70"><?php echo ( isset( $options['c3_slide_default_info_txt_'.$slide_row_number] ) && $options['c3_slide_default_info_txt_'.$slide_row_number] ) ? esc_attr( $options['c3_slide_default_info_txt_'.$slide_row_number] ) : ''; ?></textarea>
					</div>
				    </td>
				</tr>
    <?php		    endforeach; ?>
			</tbody>
		    </table>
		    <table id="c3-clone-table" style="display:none;">
			<tbody>
			    <tr id="999" class="row-style">
				<td class="dragHandle showDragHandle" style="width:30px; padding:15px 20px;">&nbsp;</td>
				<td class="deleteSlide" style="margin:10px 10px; width:30px; padding:5px 15px;">&nbsp;</td>
				<td class="position" style="padding:15px 20px; width:40px; font-weight:bold; font-size:20px; text-align:center; height:110px">999</td>
				<td style="padding:10px 10px 10px 20px; width:100%" valign="top">
				    <div class="c3_slide_img_url" style="padding:7px 5px 0 0; float:left; display:inline;">
                                        <label style="font-weight:bold;" for="c3_slide_img_url_999"><?php esc_html_e('Image:', 'u-design'); ?></label>
                                        <input class="c3_slide_img_url_field" name="udesign_options[c3_slide_img_url_999]" type="text" id="c3_slide_img_url_999" value="" size="65" />
                                        <input id="c3_slide_upload_button_999" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c3_slide_img_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
                                    
				    <div id="c3_slide_link_url_999" class="slide-link" style="padding:5px 5px 10px 0; clear:both;">
					<label for="c3_slide_link_url_999" class="link-url" style="font-weight:bold;"><?php esc_html_e('Image Link:', 'u-design'); ?> </label>
					<input name="udesign_options[c3_slide_link_url_999]" type="text" id="c3_slide_link_url_999" value="" size="30" />
					<label for="c3_slide_link_target_999" class="link-target">
						<?php esc_html_e('Target: ', 'u-design'); ?>
						<select name="udesign_options[c3_slide_link_target_999]" id="c3_slide_link_target_999">
						    <option value="self" selected="selected"><?php esc_attr_e('self', 'u-design'); ?></option>
						    <option value="blank"><?php esc_attr_e('blank', 'u-design'); ?></option>
						</select>
					</label>
                                        <div class="slide-alt-tag" style="display:inline-block;">
                                            <label for="c3_slide_image_alt_tag_999" style="margin-left:10px;"><?php esc_html_e('Alt Tag:', 'u-design'); ?> </label>
                                            <input name="udesign_options[c3_slide_image_alt_tag_999]" type="text" id="c3_slide_image_alt_tag_999" value="" size="20" />
                                        </div>
                                        <div><span style="line-height: 1.5; font-size: 12px;" class="description" style="margin:5px 0;float:left;"><?php esc_html_e('(To clear a text field above, replace it with a single space)', 'u-design'); ?></span></div>
				    </div>
                                    
                                    <div class="c3_slide_img2_url" style="padding:10px 5px 0 0; float:left; display:inline; clear:left;">
                                        <label style="font-weight:bold;" for="c3_slide_img2_url_999"><?php esc_html_e('Image 2:', 'u-design'); ?></label>
                                        <input class="c3_slide_img2_url_field" name="udesign_options[c3_slide_img2_url_999]" type="text" id="c3_slide_img2_url_999" value="" size="65" />
                                        <input id="c3_slide_upload_button2_999" type="button" value="<?php esc_attr_e('Upload Image', 'u-design'); ?>" class="button-secondary c3_slide_img2_url_btn" />
                                        <a class="info-help" style="margin:0 5px 0 10px;" title="Click the 'Upload Image' button. Once you've selected or uploaded an image (see documentation for proper dimensions), look for the 'Insert into Post' button and click it.">HELP</a>
				    </div>
                                    
				    <div class="slide-info-text" style="padding:10px 5px 0 0; width:100%; float:left; clear:both;">
					<strong><?php esc_html_e('Slide text', 'u-design'); ?></strong> <span class="description" style="margin:20px 0;"><?php esc_html_e('(You could use text and/or html)', 'u-design'); ?></span>:<br />
					<textarea name="udesign_options[c3_slide_default_info_txt_999]" class="code"
						    style="float:left; width:70%; display:inline; font-size:12px; margin: 5px 0;" id="c3_slide_default_info_txt_999"
						    rows="3" cols="70"><?php echo get_c3_slide_default_info_txt(); ?></textarea>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '7' ) : // No slider 
                    $c1_sync = isset($options['c1_sync']) ? $options['c1_sync'] : '';
                    $c1_remove_image_frame = isset($options['c1_remove_image_frame']) ? $options['c1_remove_image_frame'] : '';
                    $c1_remove_3d_shadow = isset($options['c1_remove_3d_shadow']) ? $options['c1_remove_3d_shadow'] : '';
                    $c2_sync = isset($options['c2_sync']) ? $options['c2_sync'] : '';
                    $c2_text_transition_on = isset($options['c2_text_transition_on']) ? $options['c2_text_transition_on'] : '';
                    $c3_autostop = isset($options['c3_autostop']) ? $options['c3_autostop'] : ''; ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $c1_sync); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $c1_remove_image_frame); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $c1_remove_3d_shadow); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $c2_text_transition_on); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $c3_autostop); ?> />
		    <input name="udesign_options[rev_slider_shortcode]" type="hidden" id="rev_slider_shortcode" value="<?php if ($options['rev_slider_shortcode']) { echo esc_attr($options['rev_slider_shortcode']); } ?>" />

		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Title Text', 'u-design'); ?></th>
				<td>
				    <?php esc_html_e('Change the Title:', 'u-design'); ?> <input name="udesign_options[no_slider_text]" type="text" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" size="35" maxlength="1000" />
				    <br />
				    <span class="description"><?php esc_html_e('This is the title text displayed in the place of the slider on the home page', 'u-design'); ?></span>
				</td>
			    </tr>
			</tbody>
		    </table>

<?php		elseif ( $current_slider == '8' ) : // Revolution Slider 
                    $c1_sync = isset($options['c1_sync']) ? $options['c1_sync'] : '';
                    $c1_remove_image_frame = isset($options['c1_remove_image_frame']) ? $options['c1_remove_image_frame'] : '';
                    $c1_remove_3d_shadow = isset($options['c1_remove_3d_shadow']) ? $options['c1_remove_3d_shadow'] : '';
                    $c2_sync = isset($options['c2_sync']) ? $options['c2_sync'] : '';
                    $c2_text_transition_on = isset($options['c2_text_transition_on']) ? $options['c2_text_transition_on'] : '';
                    $c3_autostop = isset($options['c3_autostop']) ? $options['c3_autostop'] : ''; ?>
		    <!-- Add invisible fields from the other sliders' forms to preserve their state. (this is only necessary for checkboxes and some text fields)  -->
		    <input style="display:none;" name="udesign_options[c1_sync]" type="checkbox" id="c1_sync" value="yes" <?php checked('yes', $c1_sync); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_image_frame]" type="checkbox" id="c1_remove_image_frame" value="yes" <?php checked('yes', $c1_remove_image_frame); ?> />
		    <input style="display:none;" name="udesign_options[c1_remove_3d_shadow]" type="checkbox" id="c1_remove_3d_shadow" value="yes" <?php checked('yes', $c1_remove_3d_shadow); ?> />
		    <input style="display:none;" name="udesign_options[c2_sync]" type="checkbox" id="c2_sync" value="yes" <?php checked('yes', $c2_sync); ?> />
		    <input style="display:none;" name="udesign_options[c2_text_transition_on]" type="checkbox" id="c2_text_transition_on" value="yes" <?php checked('yes', $c2_text_transition_on); ?> />
		    <input style="display:none;" name="udesign_options[c3_autostop]" type="checkbox" id="c3_autostop" value="yes" <?php checked('yes', $c3_autostop); ?> />
		    <input name="udesign_options[no_slider_text]" type="hidden" id="no_slider_text" value="<?php if ($options['no_slider_text']) { echo esc_attr($options['no_slider_text']); } ?>" />

<?php               if ( ! class_exists( 'RevSliderAdmin' ) ) : ?>
                        <div style="background-color:#FFEBE8; border:1px solid #C00; padding:0 0.8em; margin:10px 0;">
                            <p style="font-weight:bold;"><?php printf( __('You need  to install the "Revolution Slider" first before using this feature. You may install the slider through the %1$sInstall Plugins%2$s section.', 'u-design'), '<a href="admin.php?page=udesign_related_plugins">', '</a>' ); ?></p>
                        </div>
<?php               else : ?>
                        <table class="form-table">
                            <tbody>
                                <tr valign="top">
                                    <th scope="row"><?php esc_html_e('Revolution Slider', 'u-design'); ?></th>
                                    <td>
  <?php                                 $rvslider = new RevSlider();
					if ( defined( 'RS_REVISION' ) && version_compare( RS_REVISION, '6.0', '>=' ) ) {
						$arrSliders = $rvslider->get_sliders();
					} else {
						$arrSliders = $rvslider->getArrSliders();
					}
                                        if( empty( $arrSliders ) ) : ?>
                                            <div style="background-color:#FFFFE0; border:1px solid #E6DB55; padding:0 0.8em; margin:0;">
                                                <p style="font-weight:bold; margin:7px 0;"><?php  printf( __('No sliders found!  Please create a new slider from the %1$sRevolution Slider%2$s page.', 'u-design'), '<a href="admin.php?page=revslider">', '</a>' ); ?></p>
                                            </div>
<?php                                   else : ?>
                                            <label for="current_rev_slider"><?php esc_html_e('Choose a Revolution Slider:', 'u-design'); ?></label>
                                            <select name="udesign_options[rev_slider_shortcode]" id="current_rev_slider">
                                                    <option value=""<?php echo ( '' == $options['rev_slider_shortcode'] ) ? ' selected="selected"' : ''; ?>><?php esc_html_e('--Select Slider--', 'u-design'); ?></option> 
<?php                                           foreach( $arrSliders as $rvslider ): ?>
						    <?php $selected_slider_shortcode = ( $rvslider->getShortcode() === $options['rev_slider_shortcode'] ) ? ' selected="selected"' : '' ?>
                                                    <option value='<?php echo esc_attr( $rvslider->getShortcode() ); ?>'<?php echo esc_attr( $selected_slider_shortcode ); ?>><?php echo esc_attr( $rvslider->getTitle() ); ?></option> 
<?php                                           endforeach; ?>
                                            </select><br />
                                            <span class="description"><?php  printf( __('To create additional sliders or to configure the existing ones please refer to the %1$sRevolution Slider%2$s page.', 'u-design'), '<a title="'.esc_html__('Go to Revolution Slider page', 'u-design').'" href="admin.php?page=revslider">', '</a>' ); ?></span><br />
                                            <span class="description"><?php  printf( __('For help please refer to the %1$sDocumentation%2$s.', 'u-design'), '<a title="'.esc_html__('Go to the Documentation', 'u-design').'" target="_blank" href="'.get_template_directory_uri().'/inc/shared/documentation/index.html#revslider-description">', '</a>' ); ?></span>
                                            <div class="clear"></div>
<?php                                   endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
<?php               endif; ?>
    
<?php		endif;
		display_save_changes_button();
	}

	function portfolio_section_options_contentbox( $options ) {
		global $portfolio_pages_array;
		$portfolio_title_posistion = $options['portfolio_title_posistion'];
		$portfolio_sidebar = $options['portfolio_sidebar']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Portfolio Pages', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Use this area to assign Portfolio Categories to their respective Portfolio pages.', 'u-design'); ?><br />
				<?php esc_html_e('Firstly though, you have to create the Portfolio page(s) and assign the "Portfolio page" template to it.', 'u-design'); ?><br />
				<?php esc_html_e("If you don't see any categories in the dropdown(s) below it's because you haven't created any yet, in that case go to 'Posts &rarr; Categories' and create a 'Portfolio' category there. Also don't forget to save all your Portfolio related Posts and sub categories under that category.", 'u-design'); ?><br />
<?php				foreach ($portfolio_pages_array as $portfolio_page_obj) :
				    $port_page_ID = $portfolio_page_obj->ID; 
				    $selected_portfolio_cat_for_page = ( isset( $options['portfolio_cat_for_page_'.$port_page_ID] ) && $options['portfolio_cat_for_page_'.$port_page_ID] ) ? $options['portfolio_cat_for_page_'.$port_page_ID] : '';
				    $portfolio_do_not_link_adjacent_items = ( isset( $options['portfolio_do_not_link_adjacent_items_'.$port_page_ID] ) && $options['portfolio_do_not_link_adjacent_items_'.$port_page_ID] ) ? $options['portfolio_do_not_link_adjacent_items_'.$port_page_ID] : '';
				    ?>
				    <div style="margin-bottom:10px; float:left; background-color:#FCFCFC; padding:7px; border:1px solid #ddd;">
                                        <div style="margin-bottom:10px; float:left;">
                                            <?php esc_html_e('To Portfolio page', 'u-design'); ?> <strong><?php echo esc_attr( $portfolio_page_obj->post_title ); ?></strong> (page ID: <strong><?php echo esc_attr( $port_page_ID ); ?></strong>) <br />
                                            <?php esc_html_e('assign the Category:', 'u-design'); ?> <?php wp_dropdown_categories("show_option_all=".esc_html__('Select Category', 'u-design')."&hierarchical=1&orderby=name&selected={$selected_portfolio_cat_for_page}&name=udesign_options[portfolio_cat_for_page_{$port_page_ID}]&class=postform"); ?><br />
                                            <?php esc_html_e('with', 'u-design'); ?> <input name="udesign_options[portfolio_items_per_page_for_page_<?php echo esc_attr( $port_page_ID ); ?>]" type="text" id="portfolio_items_per_page_for_page_<?php echo esc_attr( $port_page_ID ); ?>" value="<?php echo ( isset( $options['portfolio_items_per_page_for_page_'.$port_page_ID] ) && $options['portfolio_items_per_page_for_page_'.$port_page_ID] ) ? esc_attr($options['portfolio_items_per_page_for_page_'.$port_page_ID]) : '6'; ?>" size="5" maxlength="5" /> <?php esc_html_e('items per page.', 'u-design'); ?><br />
                                        </div>
                                        <div style="float:left; clear:left;">
                                            <label for="portfolio_do_not_link_adjacent_items_<?php echo esc_attr( $port_page_ID ); ?>">
                                                <input name="udesign_options[portfolio_do_not_link_adjacent_items_<?php echo esc_attr( $port_page_ID ); ?>]" type="checkbox" id="portfolio_do_not_link_adjacent_items_<?php echo esc_attr( $port_page_ID ); ?>" value="yes" <?php checked('yes', $portfolio_do_not_link_adjacent_items); ?> />&nbsp;
                                                <strong><?php esc_html_e('Do not link adjacent items in this category as gallery.', 'u-design'); ?></strong>
                                            </label> 
                                            <span class="description"><?php esc_html_e('(Remove the ability to go to the next or previous item when previewing with prettyPhoto lightbox)', 'u-design'); ?></span>
                                        </div>
				    </div>
<?php				endforeach; ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Portfolio Title Position', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e('Choose position:', 'u-design'); ?><br />
				<label><input type="radio" name="udesign_options[portfolio_title_posistion]" id="portfolio_title_posistion_below" value="below" <?php checked('below', $portfolio_title_posistion); ?> /> <?php esc_html_e('Below', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[portfolio_title_posistion]" id="portfolio_title_posistion_above" value="above" <?php checked('above', $portfolio_title_posistion); ?> /> <?php esc_html_e('Above', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the post title shown with every thumbnail. Choose whether you would like to have it displayed above the Thumbnail or just below it.', 'u-design'); ?></span>
			    </td>
			</tr>
		    </tbody>
		</table>

		<div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin-bottom:5px; padding-bottom:15px;">
		    <p style="padding:10px 5px;"><?php esc_html_e('The following settings refer to the individual portfolio item post (single post view)', 'u-design'); ?></p>
		    <table class="form-table">
			<tbody>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Sidebar Position', 'u-design'); ?></th>
				<td>
				    <?php esc_html_e('Choose position:', 'u-design'); ?><br />
				    <label><input type="radio" name="udesign_options[portfolio_sidebar]" id="portfolio_sidebar_left" value="left" <?php checked('left', $portfolio_sidebar); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				    <label><input type="radio" name="udesign_options[portfolio_sidebar]" id="portfolio_sidebar_right" value="right" <?php checked('right', $portfolio_sidebar); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				    <span class="description"><?php esc_html_e("This is the sidebar shown on individual portfolio items' posts", 'u-design'); ?></span>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Postmetadata', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Postmetadata', 'u-design'); ?></span></legend>
				    <label for="show_portfolio_postmetadata">
					<input name="udesign_options[show_portfolio_postmetadata]" type="checkbox" id="show_portfolio_postmetadata" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata']); ?> />
					<?php esc_html_e('Show Portfolio Post Metadata box (Single View).', 'u-design'); ?><br />
					<span class="description"><?php esc_html_e('This is the info block containing the information about Author, Date, Categories, Comments in a single view portfolio post.', 'u-design'); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Portfolio Postmetadata Location', 'u-design'); ?></th>
                                <td>
                                    <label for="udesign_single_portfolio_postmetadata_location" class="link-target">
                                            <?php esc_html_e('Choose Location: ', 'u-design'); ?>
                                            <select name="udesign_options[udesign_single_portfolio_postmetadata_location]" id="udesign_single_portfolio_postmetadata_location">
                                                <option value="alignbottom"<?php echo ( 'alignbottom' === $options['udesign_single_portfolio_postmetadata_location'] ) ? ' selected="selected"' : ''; ?> style="min-width:70px;"><?php esc_attr_e('Bottom', 'u-design'); ?></option>
                                                <option value="aligntop"<?php echo ( 'aligntop' === $options['udesign_single_portfolio_postmetadata_location'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Top', 'u-design'); ?></option>
                                            </select>
                                            <?php esc_html_e('This is the location of the block containing the information about Author, Date, Categories, Comments in a single view portfolio post.', 'u-design'); ?><br />
                                    </label>
                                </td>
                            </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Post Author', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Post Author', 'u-design'); ?></span></legend>
				    <label for="show_portfolio_postmetadata_author">
					<input name="udesign_options[show_portfolio_postmetadata_author]" type="checkbox" id="show_portfolio_postmetadata_author" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata_author']); ?> />
					<?php esc_html_e('Show Author Name ("Portfolio Post Metadata" needs to be enabled for this option)', 'u-design'); ?><br />
					<span class="description"><?php printf( __('The following text: "Written by: Author Name" will be added to the postmetadata box. The author\'s name will be displayed as specified under %1$sUsers %2$s Your Profile%3$s <strong>Display name publicly as</strong> field and linking it to the author\'s page.', 'u-design'), '<a title="'.esc_html__('Go to your Profile', 'u-design').'" href="profile.php">', '&rarr;', '</a>' ); ?></span>
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Portfolio Post Tags', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Portfolio Post Tags', 'u-design'); ?></span></legend>
				    <label for="show_portfolio_postmetadata_tags">
					<input name="udesign_options[show_portfolio_postmetadata_tags]" type="checkbox" id="show_portfolio_postmetadata_tags" value="yes" <?php checked('yes', $options['show_portfolio_postmetadata_tags']); ?> />
					<?php esc_html_e('Show Portfolio Post Tags', 'u-design'); ?><br />
				    </label>
				    </fieldset>
				</td>
			    </tr>
			    <tr valign="top">
				<th scope="row"><?php esc_html_e('Show Comment Area', 'u-design'); ?></th>
				<td>
				    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Comment Area', 'u-design'); ?></span></legend>
				    <label for="show_portfolio_comments">
					<input name="udesign_options[show_portfolio_comments]" type="checkbox" id="show_portfolio_comments" value="yes" <?php checked('yes', $options['show_portfolio_comments']); ?> />
					<?php esc_html_e('Show comment area in portfolio posts (Single View)', 'u-design'); ?>
				    </label>
				    </fieldset>
				</td>
			    </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Full-width Single Post View Page', 'u-design'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Single Post View Page', 'u-design'); ?></span></legend>
                                    <label for="remove_single_portfolio_sidebar">
                                        <input name="udesign_options[remove_single_portfolio_sidebar]" type="checkbox" id="remove_single_portfolio_sidebar" value="yes" <?php checked('yes', $options['remove_single_portfolio_sidebar']); ?> />
                                        <?php esc_html_e('Remove the sidebar from single post view portfolio pages.', 'u-design'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Single Portfolio Post Navigation Links', 'u-design'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Single Portfolio Post Navigation Links', 'u-design'); ?></span></legend>
                                    <label for="show_single_portfolio_navigation">
                                        <input name="udesign_options[show_single_portfolio_navigation]" type="checkbox" id="show_single_portfolio_navigation" value="yes" <?php checked('yes', $options['show_single_portfolio_navigation']); ?> />
                                        <?php esc_html_e('Show "Previous" and "Next" navigation links on a single post view portfolio pages.', 'u-design'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
			</tbody>
		    </table>
		</div>
<?php		display_save_changes_button(); ?>
<?php	}

	function blog_section_options_contentbox( $options ) {
		$blog_sidebar = $options['blog_sidebar']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Sidebar Position', 'u-design'); ?></th>
			    <td><?php  ?>
				<?php esc_html_e('Choose position:', 'u-design'); ?> <br />
				<label><input type="radio" name="udesign_options[blog_sidebar]" id="blog_sidebar_left" value="left" <?php checked('left', $blog_sidebar); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;&nbsp;
				<label><input type="radio" name="udesign_options[blog_sidebar]" id="blog_sidebar_right" value="right" <?php checked('right', $blog_sidebar); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="description"><?php esc_html_e('This is the sidebar shown on blog pages', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Excerpt', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Excerpt', 'u-design'); ?></span></legend>
				<label for="show_excerpt">
				    <input name="udesign_options[show_excerpt]" type="checkbox" id="show_excerpt" value="yes" <?php checked('yes', $options['show_excerpt']); ?> />
				    <?php esc_html_e('Show the excerpt instead of the full post content on the Blog page.', 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><label for="excerpt_length_in_words"><?php esc_html_e('Excerpt Length', 'u-design'); ?></label></th>
			    <td>
				<?php esc_html_e('Change the excerpt length:', 'u-design'); ?> <input name="udesign_options[excerpt_length_in_words]" type="text" id="excerpt_length_in_words" value="<?php echo esc_attr( $options['excerpt_length_in_words'] ); ?>" size="5" maxlength="5" /> 
				<span class="description"><?php esc_html_e('This number refers to the number of words to show.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Read more" Link', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[blog_button_text]" type="text" id="blog_button_text" value="<?php if ($options['blog_button_text']) { echo esc_attr($options['blog_button_text']); } ?>" size="30" maxlength="100" />
				<?php esc_html_e("Enter the text for the post's 'Read more' link.  Leave blank to hide it.", 'u-design'); ?>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Exclude Portfolio(s) from Blog', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio(s) from Blog', 'u-design'); ?></span></legend>
				<label for="exclude_portfolio_from_blog">
				    <input name="udesign_options[exclude_portfolio_from_blog]" type="checkbox" id="exclude_portfolio_from_blog" value="yes" <?php checked('yes', $options['exclude_portfolio_from_blog']); ?> />
				    <?php esc_html_e('Exclude portfolio categories and posts from the blog and archive pages.', 'u-design'); ?><br />
				    <span class="description"><?php esc_html_e('Note: If a portfolio category has children categories those will also be excluded although they may not necessarily be assigned a portfolio page template themselves.', 'u-design'); ?></span>
				</label>
				</fieldset>
                                <strong><?php esc_html_e('Extended exclusion:', 'u-design'); ?></strong>
                                <div class="clear"></div>
                                <div style="margin-left: 20px;">
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio Entries from Recent Posts Widget', 'u-design'); ?></span></legend>
                                        <label for="exclude_portfolio_from_recent_posts_widget"><strong><?php esc_html_e('"Recent Posts" Widget : ', 'u-design'); ?></strong>  <br />
                                        <input name="udesign_options[exclude_portfolio_from_recent_posts_widget]" type="checkbox" id="exclude_portfolio_from_recent_posts_widget" value="yes" <?php checked('yes', $options['exclude_portfolio_from_recent_posts_widget']); ?> />
                                        <?php printf( esc_html__('Enabling this option will exlude portfolio related entries from the %sRecent Posts%s widget.', 'u-design'), '<em>', '</em>'); ?>
                                    </label>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio(s) from Archives Widget', 'u-design'); ?></span></legend>
                                        <label for="exclude_portfolio_from_archives_widget"><strong><?php esc_html_e('"Archives" Widget : ', 'u-design'); ?></strong>  <br />
                                        <input name="udesign_options[exclude_portfolio_from_archives_widget]" type="checkbox" id="exclude_portfolio_from_archives_widget" value="yes" <?php checked('yes', $options['exclude_portfolio_from_archives_widget']); ?> />
                                        <?php printf( esc_html__('Enabling this option will exlude portfolio related entries from the %sArchives%s widget.', 'u-design'), '<em>', '</em>'); ?>
                                    </label>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Exclude Portfolio(s) from Main Query', 'u-design'); ?></span></legend>
                                    <label for="exclude_portfolio_from_main_query"><strong><?php esc_html_e('Main Query : ', 'u-design'); ?></strong> <br />
                                        <input name="udesign_options[exclude_portfolio_from_main_query]" type="checkbox" id="exclude_portfolio_from_main_query" value="yes" <?php checked('yes', $options['exclude_portfolio_from_main_query']); ?> />
                                        <?php printf( esc_html__('Enabling this option will exlude portfolio categories and posts from the %1$sWordPress Main Query%2$s (note that the %1$sRecent Posts%2$s widget will also be affected).', 'u-design'), 
                                                '<em>', '</em>'); ?>
                                    </label>
                                    </fieldset>
                                </div>
                                <div class="clear"></div>
                                <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
                                    <input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
                                    <input class="button-primary right" type="submit" name="form-submit" value="<?php esc_attr_e('Save Changes', 'u-design') ?>" />
                                    <span class="spinner"></span>
                                </div>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Post Author', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Post Author', 'u-design'); ?></span></legend>
				<label for="show_postmetadata_author">
				    <input name="udesign_options[show_postmetadata_author]" type="checkbox" id="show_postmetadata_author" value="yes" <?php checked('yes', $options['show_postmetadata_author']); ?> />
				    <?php esc_html_e('Show Author Name', 'u-design'); ?><br />
				    <span class="description"><?php  printf( __('The following text: "Written by: Author Name" will be added to the postmetadata box. The author\'s name will be displayed as specified under %1$sUsers %2$s Your Profile%3$s <strong>Display name publicly as</strong> field and linking it to the author\'s page.', 'u-design'), '<a title="'.esc_html__('Go to Your Profile', 'u-design').'" href="profile.php">', '&rarr;', '</a>' ); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Post Tags', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Post Tags', 'u-design'); ?></span></legend>
				<label for="show_postmetadata_tags">
				    <input name="udesign_options[show_postmetadata_tags]" type="checkbox" id="show_postmetadata_tags" value="yes" <?php checked('yes', $options['show_postmetadata_tags']); ?> />
				    <?php esc_html_e('Show Post Tags', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Category Archive Title', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Category Archive Title', 'u-design'); ?></span></legend>
				<label for="show_archive_for_string">
				    <input name="udesign_options[show_archive_for_string]" type="checkbox" id="show_archive_for_string" value="yes" <?php checked('yes', $options['show_archive_for_string']); ?> />
				    <?php esc_html_e('Remove the "Archive for the \'...\' Category" string from the category archive title.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Move Comment Text Field to Bottom', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Move Comment Text Field to Bottom', 'u-design'); ?></span></legend>
				<label for="udesign_comment_field_to_bottom">
				    <input name="udesign_options[udesign_comment_field_to_bottom]" type="checkbox" id="udesign_comment_field_to_bottom" value="yes" <?php checked('yes', $options['udesign_comment_field_to_bottom']); ?> />
				    <?php esc_html_e('In WordPress 4.4 the comment textarea was moved to the top above the Name, Email, and Website fields which is supposed to be better from usability and accessibility point of view. This option will move back the comment text field to the bottom if you so wish.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Comments are closed" message', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Comments are closed" message', 'u-design'); ?></span></legend>
				<label for="show_comments_are_closed_message">
				    <input name="udesign_options[show_comments_are_closed_message]" type="checkbox" id="show_comments_are_closed_message" value="yes" <?php checked('yes', $options['show_comments_are_closed_message']); ?> />
				    <?php esc_html_e('Show "Comments are closed" message for posts where the comments have been disabled, otherwise no message will be displayed.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Blog Page', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Blog Page', 'u-design'); ?></span></legend>
				<label for="remove_blog_sidebar">
				    <input name="udesign_options[remove_blog_sidebar]" type="checkbox" id="remove_blog_sidebar" value="yes" <?php checked('yes', $options['remove_blog_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Blog pages.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Archive Page', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Archive Page', 'u-design'); ?></span></legend>
				<label for="remove_archive_sidebar">
				    <input name="udesign_options[remove_archive_sidebar]" type="checkbox" id="remove_archive_sidebar" value="yes" <?php checked('yes', $options['remove_archive_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Archive pages (e.g. Category archives, Date archives, Tag archives, etc.).', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Full-width Single Post View Page', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Full-width Single Post View Page', 'u-design'); ?></span></legend>
				<label for="remove_single_sidebar">
				    <input name="udesign_options[remove_single_sidebar]" type="checkbox" id="remove_single_sidebar" value="yes" <?php checked('yes', $options['remove_single_sidebar']); ?> />
				    <?php esc_html_e('Remove the sidebar from Single Post View pages.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Single View Postmetadata Location', 'u-design'); ?></th>
                            <td>
                                <label for="udesign_single_view_postmetadata_location" class="link-target">
                                        <?php esc_html_e('Choose Location: ', 'u-design'); ?>
                                        <select name="udesign_options[udesign_single_view_postmetadata_location]" id="udesign_single_view_postmetadata_location">
                                            <option value="alignbottom"<?php echo ( 'alignbottom' === $options['udesign_single_view_postmetadata_location'] ) ? ' selected="selected"' : ''; ?> style="min-width: 70px;"><?php esc_attr_e('Bottom', 'u-design'); ?></option>
                                            <option value="aligntop"<?php echo ( 'aligntop' === $options['udesign_single_view_postmetadata_location'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Top', 'u-design'); ?></option>
                                            <option value="alignnone"<?php echo ( 'alignnone' === $options['udesign_single_view_postmetadata_location'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('None', 'u-design'); ?></option>
                                        </select>
                                        <?php esc_html_e('This is the location of the block containing the information about Author, Date, Categories, Comments in a single view post.', 'u-design'); ?><br />
                                </label>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Single Post Navigation Links', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Single Post Navigation Links', 'u-design'); ?></span></legend>
				<label for="show_single_post_navigation">
				    <input name="udesign_options[show_single_post_navigation]" type="checkbox" id="show_single_post_navigation" value="yes" <?php checked('yes', $options['show_single_post_navigation']); ?> />
				    <?php esc_html_e('Show "Previous" and "Next" navigation links on a single post view pages.', 'u-design'); ?><br />
				</label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Post Image in Single Post View', 'u-design'); ?></th>
                            <td>
                                <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Post Image in Single Post View', 'u-design'); ?></span></legend>
                                <label for="display_post_image_in_single_post">
                                    <input name="udesign_options[display_post_image_in_single_post]" type="checkbox" id="display_post_image_in_single_post" value="yes" <?php checked('yes', $options['display_post_image_in_single_post']); ?> />
                                    <?php esc_html_e('Display the post image in single post view.', 'u-design'); ?><br />
                                </label>
                                </fieldset>
                            </td>
                        </tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>

                <div style="margin:10px 3px; padding:15px 20px 20px; display:block; background-color:#F8F8F1; border:1px solid #DDD;">
                    <h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('Blog and Archive Section "Featured Image":', 'u-design'); ?></h2>
                    <p><span class="description"><?php esc_html_e('Use this section to set the Post "Featured Image" the way it will be shown on the Blog and Archive Pages for each post. Please note, that if you have "post_image" custom field specified in a post, it will be given priority over the post "Featured Image", so if you would like to use the "Featured Image" do not use the custom field "post_image".', 'u-design'); ?></span></p>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Enable This Section', 'u-design'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Custom "Featured Image"', 'u-design'); ?></span></legend>
                                    <label for="enable_custom_featured_image">
                                        <input name="udesign_options[enable_custom_featured_image]" type="checkbox" id="enable_custom_featured_image" value="yes" <?php checked('yes', $options['enable_custom_featured_image']); ?> />
                                        <?php esc_html_e('Select this option to apply the settings below to the "Featured Image".', 'u-design'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><label for="featured_image_width"><?php esc_html_e('Image Width', 'u-design'); ?></label></th>
                                <td>
                                    <input name="udesign_options[featured_image_width]" type="text" id="featured_image_width" value="<?php echo esc_attr($options['featured_image_width']); ?>" size="5" maxlength="4" />
                                    <span><?php esc_html_e('Apply this image width in pixels.', 'u-design'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><label for="featured_image_height"><?php esc_html_e('Image Height', 'u-design'); ?></label></th>
                                <td>
                                    <input name="udesign_options[featured_image_height]" type="text" id="featured_image_height" value="<?php echo esc_attr($options['featured_image_height']); ?>" size="5" maxlength="4" />
                                    <span><?php esc_html_e('Apply this image height in pixels.', 'u-design'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Force Image Dimensions', 'u-design'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Custom "Featured Image"', 'u-design'); ?></span></legend>
                                    <label for="force_image_dimention">
                                        <input name="udesign_options[force_image_dimention]" type="checkbox" id="force_image_dimention" value="yes" <?php checked('yes', $options['force_image_dimention']); ?> />
                                        <?php esc_html_e('Select this option to force cropping and resizing the images which is recommended if you would like all images to be of the same specified dimensions.', 'u-design'); ?><br />
                                    </label>
                                    </fieldset>
                                    <span class="description"><?php esc_html_e('(This option would only be considered if image cropping is enabled (default) from the "General Options" section)', 'u-design'); ?></span>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Image Alignment', 'u-design'); ?></th>
                                <td>
                                    <label for="featured_image_alignment" class="link-target">
                                            <?php esc_html_e('Choose Alignment: ', 'u-design'); ?>
                                            <select name="udesign_options[featured_image_alignment]" id="featured_image_alignment">
                                                <option value="alignleft"<?php echo ( 'alignleft' === $options['featured_image_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Left', 'u-design'); ?></option>
                                                <option value="aligncenter"<?php echo ( 'aligncenter' === $options['featured_image_alignment'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('Center', 'u-design'); ?></option>
                                                <option value="alignright"<?php echo ( 'alignright' === $options['featured_image_alignment'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Right', 'u-design'); ?></option>
                                            </select>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?php esc_html_e('Remove Image Frame', 'u-design'); ?></th>
                                <td>
                                    <fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Image Frame', 'u-design'); ?></span></legend>
                                    <label for="remove_featured_image_frame">
                                        <input name="udesign_options[remove_featured_image_frame]" type="checkbox" id="remove_featured_image_frame" value="yes" <?php checked('yes', $options['remove_featured_image_frame']); ?> />
                                        <?php esc_html_e('This option will remove the image frame.', 'u-design'); ?><br />
                                    </label>
                                    </fieldset>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<?php		display_save_changes_button(); ?>
<?php	}

	function contact_page_options_contentbox( $options ) {
                global $recaptcha_languages;
		$show_contact_fields = $options['show_contact_fields'];
		$contact_field_name1 =  ( isset( $options['contact_field_name1'] ) && $options['contact_field_name1'] ) ? $options['contact_field_name1'] : '';
		$contact_field_value1 = ( isset( $options['contact_field_value1'] ) && $options['contact_field_value1'] ) ? $options['contact_field_value1'] : '';
		$contact_field_name2 = ( isset( $options['contact_field_name2'] ) && $options['contact_field_name2'] ) ? $options['contact_field_name2'] : '';
		$contact_field_value2 = ( isset( $options['contact_field_value2'] ) && $options['contact_field_value2'] ) ? $options['contact_field_value2'] : '';
		$contact_field_name3 = ( isset( $options['contact_field_name3'] ) && $options['contact_field_name3'] ) ? $options['contact_field_name3'] : '';
		$contact_field_value3 = ( isset( $options['contact_field_value3'] ) && $options['contact_field_value3'] ) ? $options['contact_field_value3'] : '';
		$contact_field_name4 = ( isset( $options['contact_field_name4'] ) && $options['contact_field_name4'] ) ? $options['contact_field_name4'] : '';
		$contact_field_value4 = ( isset( $options['contact_field_value4'] ) && $options['contact_field_value4'] ) ? $options['contact_field_value4'] : '';
		$contact_field_name5 = ( isset( $options['contact_field_name5'] ) && $options['contact_field_name5'] ) ? $options['contact_field_name5'] : '';
		$contact_field_value5 = ( isset( $options['contact_field_value5'] ) && $options['contact_field_value5'] ) ? $options['contact_field_value5'] : '';
		$contact_field_name6 = ( isset( $options['contact_field_name6'] ) && $options['contact_field_name6'] ) ? $options['contact_field_name6'] : '';
		$contact_field_value6 = ( isset( $options['contact_field_value6'] ) && $options['contact_field_value6'] ) ? $options['contact_field_value6'] : '';
		$contact_field_name7 = ( isset( $options['contact_field_name7'] ) && $options['contact_field_name7'] ) ? $options['contact_field_name7'] : '';
		$contact_field_value7 = ( isset( $options['contact_field_value7'] ) && $options['contact_field_value7'] ) ? $options['contact_field_value7'] : '';
		$contact_sidebar = $options['contact_sidebar'];
		$remove_contact_sidebar = $options['remove_contact_sidebar'];
		$NA_phone_format = $options['NA_phone_format'];
		$email_receipients = $options['email_receipients']; ?>
                    
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Contact Information', 'u-design'); ?></h4>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Enable Contact Info Fields', 'u-design'); ?></span></legend>
		    <label for="show_contact_fields">
			<input name="udesign_options[show_contact_fields]" type="checkbox" id="show_contact_fields" value="yes" <?php checked('yes', $show_contact_fields); ?> />
			<?php esc_html_e('Enable the contact fields (see below for description)', 'u-design'); ?>
		    </label>
		</fieldset>
		<h4><?php esc_html_e('Contact Fields', 'u-design'); ?></h4>
		<p style="margin:5px 20px">
		    <?php _e('The fields below provide a way to display additional contact information such as Company Name, Address, Phone, etc. on the contact page in a pre-formatted layout. An example of a field pair could be <strong>Telephone: (123) 123-4567</strong>, where you would enter the "<strong>Telephone:</strong>" part in the first field and "<strong>(123) 123-4567</strong>" in the second (under the same "Line #") respectively.', 'u-design'); ?><br /><br />
		    <?php esc_html_e('Line 1:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name1]" type="text" id="contact_field_name1" value="<?php if ($contact_field_name1){echo esc_attr($contact_field_name1);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value1]" type="text" id="contact_field_value1" value="<?php if ($contact_field_value1){echo esc_attr($contact_field_value1);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 2:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name2]" type="text" id="contact_field_name2" value="<?php if ($contact_field_name2){echo esc_attr($contact_field_name2);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value2]" type="text" id="contact_field_value2" value="<?php if ($contact_field_value2){echo esc_attr($contact_field_value2);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 3:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name3]" type="text" id="contact_field_name3" value="<?php if ($contact_field_name3){echo esc_attr($contact_field_name3);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value3]" type="text" id="contact_field_value3" value="<?php if ($contact_field_value3){echo esc_attr($contact_field_value3);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 4:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name4]" type="text" id="contact_field_name4" value="<?php if ($contact_field_name4){echo esc_attr($contact_field_name4);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value4]" type="text" id="contact_field_value4" value="<?php if ($contact_field_value4){echo esc_attr($contact_field_value4);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 5:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name5]" type="text" id="contact_field_name5" value="<?php if ($contact_field_name5){echo esc_attr($contact_field_name5);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value5]" type="text" id="contact_field_value5" value="<?php if ($contact_field_value5){echo esc_attr($contact_field_value5);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 6:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name6]" type="text" id="contact_field_name6" value="<?php if ($contact_field_name6){echo esc_attr($contact_field_name6);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value6]" type="text" id="contact_field_value6" value="<?php if ($contact_field_value6){echo esc_attr($contact_field_value6);}?>" size="50" maxlength="500" /><br/>
		    <?php esc_html_e('Line 7:', 'u-design'); ?> <br />
		    <input name="udesign_options[contact_field_name7]" type="text" id="contact_field_name7" value="<?php if ($contact_field_name7){echo esc_attr($contact_field_name7);}?>" size="30" maxlength="50" />
			     <input name="udesign_options[contact_field_value7]" type="text" id="contact_field_value7" value="<?php if ($contact_field_value7){echo esc_attr($contact_field_value7);}?>" size="50" maxlength="500" /><br/><br/>
		    <span class="description"><?php esc_html_e('Some html tags and inline styling could be used for formatting here, e.g.', 'u-design'); ?> &lt;em&gt;<?php esc_html_e('Address', 'u-design'); ?>:&lt;/em&gt; <?php esc_html_e('or', 'u-design'); ?> &lt;span style=&quot;color:red;&quot;&gt;<?php esc_html_e('Address', 'u-design'); ?>:&lt;/span&gt;</span>
		</p>
<?php		display_save_changes_button(); ?>
                
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('General', 'u-design'); ?></h4>
		<h4><?php esc_html_e('Sidebar Position', 'u-design'); ?></h4>
		<p><?php esc_html_e('Choose position:', 'u-design'); ?><br />
		    <label style="margin:20px"><input type="radio" name="udesign_options[contact_sidebar]" id="contact_sidebar_left" value="left" <?php checked('left', $contact_sidebar); ?> /> <?php esc_html_e('Left', 'u-design'); ?></label>&nbsp;
		    <label><input type="radio" name="udesign_options[contact_sidebar]" id="contact_sidebar_right" value="right" <?php checked('right', $contact_sidebar); ?> /> <?php esc_html_e('Right', 'u-design'); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
		    <span class="description"><?php esc_html_e('This is the sidebar shown on the Contact page', 'u-design'); ?></span>
		</p>
		<h4><?php esc_html_e('Remove Sidebar', 'u-design'); ?></h4>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Remove Sidebar', 'u-design') ?></span></legend>
		    <label for="remove_contact_sidebar">
			<input name="udesign_options[remove_contact_sidebar]" type="checkbox" id="remove_contact_sidebar" value="yes" <?php checked('yes', $remove_contact_sidebar); ?> />
			<?php esc_html_e('Remove the sidebar from the Contact page, which will make it a full-width page layout.', 'u-design'); ?><br />
		    </label>
		</fieldset>
		<h4><?php esc_html_e('Phone Number validation', 'u-design'); ?></h4>
		<p><?php esc_html_e('This is the field displayed in the E-mail form on the Contact page template. If checked, the validation for North American phone numbers will be enabled.', 'u-design'); ?></p>
		<fieldset style="margin: 10px 20px 20px"><legend class="screen-reader-text"><span><?php esc_html_e('Enable North American phone number validation', 'u-design') ?></span></legend>
		    <label for="NA_phone_format">
			<input name="udesign_options[NA_phone_format]" type="checkbox" id="NA_phone_format" value="yes" <?php checked('yes', $NA_phone_format); ?> />
			<?php esc_html_e('Enable North American phone number validation in the contact email form', 'u-design'); ?><br />
		    </label>
		</fieldset>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('E-mail Recipient(s)', 'u-design'); ?></th>
			    <td>
				<?php esc_html_e("Please enter recipient's email address, comma-separate multiple recipients:", 'u-design'); ?><br />
				<textarea style="width: 98%;" id="email_receipients" rows="2" cols="60" name="udesign_options[email_receipients]"><?php if( $email_receipients ){ echo esc_attr($email_receipients); } ?></textarea><br />
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
                
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('reCAPTCHA (v2)', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable reCAPTCHA', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable reCAPTCHA', 'u-design'); ?></span></legend>
				<label for="recaptcha_enabled">
				    <input name="udesign_options[recaptcha_enabled]" type="checkbox" id="recaptcha_enabled" value="yes" <?php checked( 'yes', $options['recaptcha_enabled']); ?> />
				    <?php printf( esc_html__('Add reCAPTCHA to the email form for extra security (for more information visit %s)', 'u-design'), '<a title="'.esc_html__('Go to www.reCAPTCHA.net', 'u-design').'" href="https://www.google.com/recaptcha/" target="_blank">www.google.com/recaptcha/</a>' ); ?>
				</label><br />
				<span class="description"><?php esc_html_e('Please note: reCAPTCHA will be automatically disabled if the two fields below are empty!', 'u-design'); ?></span>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
                
                <div style="margin:10px 0; padding:15px 15px 20px; display:block; background-color:#FCFCFC; border:1px solid #DDD;">
                  <h2 style="color:#ff4d00; margin: 2px 0; padding:0;"><?php esc_html_e('reCAPTCHA API keys', 'u-design'); ?></h2>
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Site Key', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[recaptcha_publickey]" type="text" id="recaptcha_publickey" value="<?php if ($options['recaptcha_publickey']) { echo esc_attr($options['recaptcha_publickey']); } ?>" size="55" maxlength="100" />
				<br /><?php esc_html_e('To use reCAPTCHA you must get an API public key from', 'u-design'); ?> <a title="<?php esc_html_e('Go to www.reCAPTCHA.net', 'u-design') ?>" href="https://www.google.com/recaptcha/" target="_blank">www.google.com/recaptcha/</a>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Secret Key', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[recaptcha_privatekey]" type="text" id="recaptcha_privatekey" value="<?php if ($options['recaptcha_privatekey']) { echo esc_attr($options['recaptcha_privatekey']); } ?>" size="55" maxlength="100" />
				<br /><?php esc_html_e('To use reCAPTCHA you must get an API private key from', 'u-design'); ?> <a title="<?php esc_html_e('Go to www.reCAPTCHA.net', 'u-design') ?>" href="https://www.google.com/recaptcha/" target="_blank">www.google.com/recaptcha/</a><br />
				<span class="description"><?php esc_html_e('This key is used when communicating between your server and the reCAPTCHA server. Be sure to keep it a secret.', 'u-design'); ?></span>
			    </td>
			</tr>
		    </tbody>
		  </table>
		</div>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Language', 'u-design'); ?></th>
			    <td>
				<label for="recaptcha_lang" class="link-target">
					<?php esc_html_e('Language: ', 'u-design'); ?>
					<select name="udesign_options[recaptcha_lang]" id="recaptcha_lang">
<?php                                       foreach ( $recaptcha_languages as $lang => $code ) : ?>
						<?php $recaptcha_selected_lang = ( $options['recaptcha_lang'] === $code ) ? ' selected="selected"' : '' ?>
                                                <option value="<?php echo esc_attr( $code ); ?>"<?php echo esc_attr( $recaptcha_selected_lang ); ?>><?php echo esc_attr( $lang ); ?></option>
<?php                                       endforeach; ?>
					</select>
				</label>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
                
                <h4 class="u-design-settings-page-headers"><?php esc_html_e('Data Collection, Privacy and GDPR', 'u-design'); ?></h4>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Data Collection and Privacy', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Data Collection and Privacy', 'u-design'); ?></span></legend>
				<label for="data_collection_message_on">
				    <input name="udesign_options[data_collection_message_on]" type="checkbox" id="data_collection_message_on" value="yes" <?php checked( 'yes', $options['data_collection_message_on']); ?> />
				    <?php esc_html_e( 'Enable Data Collection and Privacy Message.', 'u-design' ); ?>
				</label><br />
				<span class="description"><?php esc_html_e('Enable Data Collection and Privacy Message', 'u-design'); ?></span>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Data Collection and Privacy Text', 'u-design'); ?></th>
			    <td>
				<textarea style="width: 98%;" id="data_collection_message" rows="2" cols="60" name="udesign_options[data_collection_message]"><?php echo ( isset( $options['data_collection_message'] ) && $options['data_collection_message'] ) ? esc_attr( $options['data_collection_message'] ) : data_collection_message_default_text(); ?></textarea>
				<br />
				<span class="description"><?php esc_html_e( "The content provided in the above field will be displayed immediately above the consent checkbox to tell users which personal data you want to collect and have a link to your privacy policy page, something required for GDPR compliance.", 'u-design'); ?></span>
                                <span class="description"><?php echo sprintf( esc_html__( "You may create or select your site's privacy policy page under %sSettings &rarr; Privacy%s.", 'u-design'), '<strong>', '</strong>' ); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Consent Checkbox', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Consent Checkbox', 'u-design'); ?></span></legend>
				<label for="contact_consent_on">
				    <input name="udesign_options[contact_consent_on]" type="checkbox" id="contact_consent_on" value="yes" <?php checked( 'yes', $options[ 'contact_consent_on' ] ); ?> />
				    <?php esc_html_e( 'Enable the user consent option.', 'u-design' ); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Consent Checkbox Text', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[contact_consent_text]" type="text" id="contact_consent_text" value="<?php echo ( isset( $options['contact_consent_text'] ) && $options['contact_consent_text'] ) ? esc_attr( $options['contact_consent_text'] ) : contact_consent_default_text(); ?>" size="100" maxlength="1000" />
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function footer_options_contentbox( $options ) {
		$copyright_message = $options['copyright_message'];
		$show_wp_link_in_footer = $options['show_wp_link_in_footer'];
		$show_entries_rss_in_footer = $options['show_entries_rss_in_footer'];
		$show_comments_rss_in_footer = $options['show_comments_rss_in_footer'];
		$wordpress_or_classicpress = ( function_exists( 'classicpress_version' ) ) ? 'ClassicPress': 'WordPress'; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Copyright Message', 'u-design'); ?></th>
			    <td>
				<textarea style="width: 98%;" id="copyright_message" rows="2" cols="60" name="udesign_options[copyright_message]"><?php if( $copyright_message ){ echo esc_attr($copyright_message); } ?></textarea>
				<br />
				<span class="description"><?php esc_html_e('Copyright message displayed in the footer.', 'u-design'); ?></span>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('"Back to Top" link', 'u-design'); ?></th>
                            <td>
                                <?php esc_html_e('Choose style:', 'u-design'); ?>
                                <select name="udesign_options[back_to_top]" id="back_to_top">
                                    <option value="angle-up"<?php echo ( 'angle-up' === $options['back_to_top'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Angle-Up Icon (fixed on scroll)', 'u-design'); ?></option>
                                    <option value="text"<?php echo ( 'text' === $options['back_to_top'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('"Back to Top" Text', 'u-design'); ?></option>
                                    <option value="none"<?php echo ( 'none' === $options['back_to_top'] ) ? ' selected="selected"' : ''; ?> style="padding-right:10px;"><?php esc_attr_e('None', 'u-design'); ?></option>
                                </select>
                            </td>
                        </tr>
			<tr valign="top">
			    <th scope="row"><?php printf( esc_html__('%s credits link', 'u-design'), $wordpress_or_classicpress ); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php printf( esc_html__('%s credits link', 'u-design'), $wordpress_or_classicpress ); ?></span></legend>
				<label for="show_wp_link_in_footer">
				    <input name="udesign_options[show_wp_link_in_footer]" type="checkbox" id="show_wp_link_in_footer" value="yes" <?php checked('yes', $show_wp_link_in_footer); ?> />
				    <?php printf( esc_html__('Show "is proudly powered by %s" in footer?', 'u-design'), '<strong>' . $wordpress_or_classicpress . '</strong>' ); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
                <div style="background-color:#FCFCFC; border:1px solid #DDDDDD; margin:6px 0 0; padding-bottom:8px;">
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Your "U-Design" Affiliate Link', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Your "U-Design" Affiliate Link', 'u-design'); ?></span></legend><?php printf( esc_html__('Would you like to make money with "U-Design"? Refer new users to "U-Design" theme and ThemeForest will pay you 30&#37; of their first purchase or cash deposit!! Click %1$shere%2$s for more information.', 'u-design'), '<a target="_blank" title="More information on the ThemeForest Affiliate Program" href="https://envato.com/market/affiliate-program/">', '</a>' ); ?><br />
					<label for="show_udesign_affiliate_link">
					    <input name="udesign_options[show_udesign_affiliate_link]" type="checkbox" id="show_udesign_affiliate_link" value="yes" <?php checked('yes', $options['show_udesign_affiliate_link']); ?> />
					    <?php printf( esc_html__('Show %1$sThemeForest Affiliate%2$s link in footer?', 'u-design'), '<a target="_blank" title="More information on the ThemeForest Affiliate Program" href="https://envato.com/market/affiliate-program/">', '</a>' ); ?>
					</label>
					<label style="margin-left:20px;" for="affiliate_username"><?php esc_html_e( 'Your affiliate link:', 'u-design' ); ?></label>
					<input name="udesign_options[affiliate_username]" type="text" id="affiliate_username" value="<?php if ( $options['affiliate_username'] ) { echo esc_attr( $options['affiliate_username'] ); } ?>" size="50" maxlength="500" />
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
                </div>
		  <table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Entries (RSS) link', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Entries (RSS) link', 'u-design'); ?></span></legend>
				<label for="show_entries_rss_in_footer">
				    <input name="udesign_options[show_entries_rss_in_footer]" type="checkbox" id="show_entries_rss_in_footer" value="yes" <?php checked('yes', $show_entries_rss_in_footer); ?> />
				    <?php esc_html_e('Show "Entries (RSS)" link in footer?', 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Comments (RSS) link', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Comments (RSS) link', 'u-design'); ?></span></legend>
				<label for="show_comments_rss_in_footer">
				    <input name="udesign_options[show_comments_rss_in_footer]" type="checkbox" id="show_comments_rss_in_footer" value="yes" <?php checked('yes', $show_comments_rss_in_footer); ?> />
				    <?php esc_html_e('Show "Comments (RSS)" link in footer?', 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('"Sticky" Footer', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('"Sticky" Footer', 'u-design'); ?></span></legend>
				<label for="udesign_sticky_footer">
				    <input name="udesign_options[udesign_sticky_footer]" type="checkbox" id="udesign_sticky_footer" value="yes" <?php checked('yes', $options['udesign_sticky_footer']); ?> />
				    <?php esc_html_e('Have the footer stay at the bottom of the page on pages that have very little content.', 'u-design'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function statistics_options_contentbox( $options ) {
		$google_analytics = $options['google_analytics']; ?>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			<th scope="row"><label for="google_analytics"><?php esc_html_e('Google Analytics', 'u-design'); ?></label></th>
			<td>
			    <textarea class="code" style="width: 98%;" id="google_analytics" rows="10" cols="60" name="udesign_options[google_analytics]"><?php if( $google_analytics ){ echo  esc_attr($google_analytics); } ?></textarea>
			    <br />
			    <span class="description"><?php esc_html_e('Paste your Google Analytics or other tracking code here. It will be inserted just before the closing &lt;/head&gt; tag.', 'u-design'); ?></span>
			</td>
			</tr>
		    </tbody>
		</table>
<?php		display_save_changes_button(); ?>
<?php	}

	function responsive_options_contentbox( $options ) { ?>
                
    		<table class="form-table" style="background-color:#FCFCFC; border:1px solid #DDDDDD;">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('General Information', 'u-design'); ?></th>
			    <td>
				<span class="description"><?php esc_html_e("960px is the theme's default width. If responsive is enabled the theme will resize automatically to adjust to the size of the browser window or the type of device being used based on the following three breakpoints:", 'u-design'); ?></span><br />
                                <div style="padding-left:5px;">
                                    <span class="description"><?php esc_html_e("1 ) Breakpoint 1 - [ 960px to 720px ]", 'u-design'); ?></span><br />
                                    <span class="description"><?php esc_html_e("2 ) Breakpoint 2 - [ 720px to 480px ]", 'u-design'); ?></span><br />
                                    <span class="description"><?php esc_html_e("3 ) Breakpoint 3 - [ smaller than 480px ]", 'u-design'); ?></span><br />
                                </div>
			    </td>
			</tr>
		    </tbody>
		</table>
                
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Enable Responsive', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Enable Responsive', 'u-design'); ?></span></legend>
				<label for="enable_responsive">
				    <input name="udesign_options[enable_responsive]" type="checkbox" id="enable_responsive" value="yes" <?php checked('yes', $options['enable_responsive']); ?> />
				    <?php esc_html_e('Enable responsive layout.', 'u-design'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Responsive Logo (optional)', 'u-design'); ?></th>
			    <td>
                                <div style="margin-bottom:5px;  padding:0; float:left;">
                                    <label for="responsive_logo_img"><?php esc_html_e("Enter a URL or upload an image for your alternative logo:", 'u-design'); ?></label><br />
                                    <input name="udesign_options[responsive_logo_img]" type="text" id="responsive_logo_img" value="<?php if( $options['responsive_logo_img'] ){ echo esc_url($options['responsive_logo_img']); } ?>" size="65" />
                                    <input id="upload_responsive_logo_button" type="button" value="<?php esc_attr_e('Upload Logo', 'u-design'); ?>" class="button-secondary" />
                                </div>
                                <div class="clear"></div>
                                <span class="description"><?php esc_html_e("An alternative logo will be loaded ONLY in the case Breakpoints 2 and 3. Please note, this is optional, in most cases you won't need an alternative logo but in some cases might be handy. In either case the theme will resize (if necessary) and center the logo automatically.", 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Responsive Logo Height', 'u-design'); ?></th>
			    <td>
				<input name="udesign_options[responsive_logo_height]" type="text" id="responsive_logo_height" value="<?php echo esc_attr($options['responsive_logo_height']); ?>" size="5" maxlength="4" />px 
                                <span class="description"><?php esc_html_e('(Height) in pixels.  Note: The width is automatically adjusted to the maximum allowed width.', 'u-design'); ?></span>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Remove Secondary Menu', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Secondary Menu', 'u-design'); ?></span></legend>
				<label for="responsive_remove_secondary_menu">
				    <input name="udesign_options[responsive_remove_secondary_menu]" type="checkbox" id="responsive_remove_secondary_menu" value="yes" <?php checked('yes', $options['responsive_remove_secondary_menu']); ?> />
				    <?php esc_html_e('Remove the secondary menu completely from the top of the page for the Breakpoints 2 and 3.', 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Remove the Slider Area', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove the Slider Area', 'u-design'); ?></span></legend>
				<label for="responsive_remove_slider_area">
				    <input name="udesign_options[responsive_remove_slider_area]" type="checkbox" id="responsive_remove_slider_area" value="yes" <?php checked('yes', $options['responsive_remove_slider_area']); ?> />
				    <?php esc_html_e('Remove the Slider Area completely from the home page for the Breakpoints 2 and 3.', 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Remove Background Images', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Remove Background Images', 'u-design'); ?></span></legend>
				<label for="responsive_remove_bg_images_960-720">
				    <input name="udesign_options[responsive_remove_bg_images_960-720]" type="checkbox" id="responsive_remove_bg_images_960-720" value="yes" <?php checked('yes', $options['responsive_remove_bg_images_960-720']); ?> />
				    <?php esc_html_e("Remove all background images for Breakpoint 1. Those are the background images that have been assigned through the theme's 'Custom Colors' section.", 'u-design'); ?>
                                    <span class="description"><?php esc_html_e("(Note: The background images will be replaced with their corresponding background colors for those respective sections. Also, by default the background images will be removed automatically for Breakpoints 2 and 3 respectively)", 'u-design'); ?></span>
				</label>
				</fieldset>
			    </td>
			</tr>
                        <tr valign="top">
                            <th scope="row"><?php esc_html_e('Responsive Menu', 'u-design'); ?></th>
                            <td>
                                <label for="responsive_menu" class="link-target" style="float:left; display:inline-block;">
                                        <select name="udesign_options[responsive_menu]" id="responsive_menu">
                                            <option value="responsive_menu_1"<?php echo ( 'responsive_menu_1' === $options['responsive_menu'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Responsive Menu 1', 'u-design'); ?></option>
                                            <option value="responsive_menu_2"<?php echo ( 'responsive_menu_2' === $options['responsive_menu'] ) ? ' selected="selected"' : ''; ?>><?php esc_attr_e('Responsive Menu 2', 'u-design'); ?></option>
                                        </select>
                                    <?php esc_html_e("Choose a menu to be used for Breakpoints 2 and 3.", 'u-design'); ?>
                                </label>
                                <div class="clear"></div>
                                <fieldset class="menu_2_screen_width" style="margin-top: 10px;"><legend class="screen-reader-text"><span><?php esc_html_e('Responsive Menu 2 Threshold', 'u-design'); ?></span></legend>
                                    <label for="menu_2_screen_width">
                                        <input name="udesign_options[menu_2_screen_width]" type="checkbox" id="menu_2_screen_width" value="yes" <?php checked('yes', $options['menu_2_screen_width']); ?> />
                                        <?php esc_html_e('Enable "Responsive Menu 2" starting at Breakpoint 1.', 'u-design'); ?>
                                    </label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Pinch-to-Zoom', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Pinch-to-Zoom', 'u-design'); ?></span></legend>
				<label for="responsive_pinch_to_zoom">
				    <input name="udesign_options[responsive_pinch_to_zoom]" type="checkbox" id="responsive_pinch_to_zoom" value="yes" <?php checked('yes', $options['responsive_pinch_to_zoom']); ?> />
				    <?php esc_html_e("Enable pinch-to-zoom on mobile devices. Adds the ability to zoom in on images, text, links, etc. which could come really handy in some situations.", 'u-design'); ?>
				</label>
				</fieldset>
			    </td>
			</tr>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Disable prettyPhoto', 'u-design'); ?></th>
			    <td>
                                <div id="disable_pp_at_width_slide_bar"></div>
				<input name="udesign_options[responsive_disable_pretty_photo_at_width]" type="text" id="responsive_disable_pretty_photo_at_width" value="<?php echo ( isset( $options['responsive_disable_pretty_photo_at_width'] ) && $options['responsive_disable_pretty_photo_at_width'] ) ? esc_attr($options['responsive_disable_pretty_photo_at_width']) : '0'; ?>" size="5" maxlength="4" />px. 
                                <span class="description"><?php esc_html_e('(Width) in pixels.', 'u-design'); ?></span>
                                <?php esc_html_e('This is the device width or browser width at which the prettyPhoto lightbox effect will be disabled, anything smaller than that width will not have prettyPhoto enabled. This is especially useful for widths smaller than the Breakpoint 3 - [ 480px ], but a value slightly greater than that could be a good start, for instance "600". To disable this option set the width to "0".', 'u-design'); ?>
			    </td>
			</tr>
		    </tbody>
		  </table>
<?php		display_save_changes_button(); ?>
<?php	}

	function advanced_options_contentbox( $options ) { ?>
                
                <p style="margin: 10px 0 10px;"><span class="description"><?php esc_html_e("The options in this section are generally offered to assist more advanced users with deeper knowledge of WordPress programming.", 'u-design'); ?></span></p>
		<table class="form-table">
		    <tbody>
			<tr valign="top">
			    <th scope="row"><?php esc_html_e('Show Action Hook Locations', 'u-design'); ?></th>
			    <td>
				<fieldset><legend class="screen-reader-text"><span><?php esc_html_e('Show Action Hook Locations', 'u-design'); ?></span></legend>
				<label for="show_udesign_action_hooks">
				    <input name="udesign_options[show_udesign_action_hooks]" type="checkbox" id="show_udesign_action_hooks" value="yes" <?php checked('yes', $options['show_udesign_action_hooks']); ?> />
				    <?php esc_html_e('Enabling this option will allow you to see in the front end the exact locations of the U-Design action hooks located within the "body" tags.', 'u-design'); ?>
                                </label>
				</fieldset>
			    </td>
			</tr>
		    </tbody>
		  </table>
<?php		display_save_changes_button(); ?>
<?php	}

} // end of UDESIGN_Theme_Options Class.



function display_save_changes_button() {
	    echo ('
		    <table class="form-table" style="position: relative;">
			<tbody>
			    <tr valign="top">
				<th scope="row">&nbsp;</th>
				<td>
				    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
					<input type="hidden" id="udesign_submit" value="1" name="udesign_submit"/>
					<input class="button-primary right" type="submit" name="form-submit" value="'.esc_attr__('Save Changes', 'u-design').'" />
                                        <span class="spinner"></span>
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>');
}

function get_c2_slide_default_info_txt() {
    return <<<XML
<h2>Title Goes Here...</h2>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>

<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
XML;
}

function get_c3_slide_default_info_txt() {
    return <<<XML
<div style="width:400px; height:100px; top:300px; left:220px; position:absolute; z-index:9999;">
    <p style="text-align:left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
</div>
XML;
}

function get_udesign_social_icons_html() {
    return <<<XML
<ul class="ud-social-icons">
    <li><a title="Twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
    <li><a title="Facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
    <li><a title="Google+" href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
    <li><a title="LinkedIn" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
    <li><a title="Instagram" href="http://instagram.com/"><i class="fa fa-instagram"></i></a></li>
    <li><a title="Yelp" href="http://www.yelp.com/"><i class="fa fa-yelp"></i></a></li>
    <li><a title="YouTube" href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
    <li><a title="Flickr" href="https://www.flickr.com/"><i class="fa fa-flickr"></i></a></li>
    <li><a title="Pinterest" href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
</ul>
XML;
}

/**
 * This function will generate the fonts select options for the "Font Settings" section
 * If used in new locations make sure to update the necessary new classes and ID in the appropriate CSS file
 * The following "udesign_options" were dynamically substittuded in this function:
 *      "general_font_family","general_font_variant","general_font_subset","general_font_size"
 *      "top_nav_font_family","top_nav_font_variant","top_nav_font_subset","top_nav_font_size"
 *      "headings_font_family","headings_font_variant","headings_font_subset","headings_font_size_coefficient"
 *      "heading1_font_family","heading1_font_variant","heading1_font_subset","heading1_font_size"
 *      "heading2_font_family","heading2_font_variant","heading2_font_subset","heading2_font_size"
 *      "heading3_font_family","heading3_font_variant","heading3_font_subset","heading3_font_size"
 *      "heading4_font_family","heading4_font_variant","heading4_font_subset","heading4_font_size"
 *      "heading5_font_family","heading5_font_variant","heading5_font_subset","heading5_font_size"
 *      "heading6_font_family","heading6_font_variant","heading6_font_subset","heading6_font_size"
 * 
 * @param string $option_name_prefix For example if the select name attribute should be "udesign_options[top_nav_font_family]" then $option_name_prefix should be "top_nav"
 * @param string $class_prefix For example if the class is supposed to be "top-nav-font-family" then $class_prefix should be "top-nav"
 * @param string $the_font_family This is font family option for the current setting
 * @param string $enable_google_web_fonts "yes" or "no" respectively
 * @param array $options This one is passed from the Options Settings of the page
 * @param string $font_size_units Acceptable values: "pixels", "ems" or "coefficient"
 * @param string $default_font_size Some unit in pixels (eg. "14") or coefficient (eg. "1.2")
 * 
 * @return string HTML
 */
function get_udesign_fonts_select_options( $option_name_prefix = "general", $class_prefix = "general", $the_font_family = "Arial", $enable_google_web_fonts = "" , $options, $font_size_units = "pixels", $default_font_size = "14") {
    global $google_webfonts, $google_webfonts_variants, $google_fonts_variants_descriptions, $google_webfonts_subsets;
    $google_font_selected = false;
    ob_start(); ?>
				<label for="<?php echo esc_attr( $option_name_prefix ); ?>_font_family"  class="<?php echo esc_attr( $option_name_prefix ); ?>_font_family">
					<?php esc_html_e('Font Family: ', 'u-design'); ?><br />
					<select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_family]" id="<?php echo esc_attr( $option_name_prefix ); ?>_font_family" class="<?php echo esc_attr( $class_prefix ); ?>-font-family">
                                            <optgroup label="<?php esc_html_e('Generic Fonts:', 'u-design'); ?>">
                                                <option value="Arial"<?php echo ( 'Arial' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Arial</option>
                                                <option value="Comic Sans MS"<?php echo ( 'Comic Sans MS' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Comic Sans MS</option>
                                                <option value="Georgia"<?php echo ( 'Georgia' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Georgia</option>
                                                <option value="Lucida Sans Unicode"<?php echo ( 'Lucida Sans Unicode' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Lucida Sans Unicode</option>
                                                <option value="Palatino Linotype"<?php echo ( 'Palatino Linotype' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Palatino Linotype</option>
                                                <option value="Symbol"<?php echo ( 'Symbol' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Symbol</option>
                                                <option value="Tahoma"<?php echo ( 'Tahoma' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Tahoma</option>
                                                <option value="Times New Roman"<?php echo ( 'Times New Roman' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Times New Roman</option>
                                                <option value="Trebuchet MS"<?php echo ( 'Trebuchet MS' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Trebuchet MS</option>
                                                <option value="Verdana"<?php echo ( 'Verdana' === $the_font_family ) ? ' selected="selected"' : ''; ?>>Verdana</option>
                                            </optgroup>
<?php					    if( $enable_google_web_fonts == 'yes' ) : ?>
                                            <optgroup label="Google Web Fonts:"><?php 
                                                foreach ($google_webfonts as $id => $font_name) {
						    if( $options[$option_name_prefix.'_font_family'] == $font_name ) {$make_current_font_selected = ' selected="selected"'; $google_font_selected = $id;}
                                                    else {$make_current_font_selected = '';}
                                                    echo '<option value="'.$font_name.'"'.$make_current_font_selected.' data-font-id="'.$id.'">'.$font_name.'</option>';
                                                } ?>
                                            </optgroup>
<?php 					    endif; ?>
					</select>
				</label>
<?php				if( $enable_google_web_fonts == 'yes' ) : 
                                    $hide_class = ( $google_font_selected ) ? '' : ' hide'; ?>
                                    <label for="<?php echo esc_attr( $option_name_prefix ); ?>_font_variants" class="<?php echo esc_attr( $option_name_prefix ); ?>_font_variants<?php echo esc_attr( $hide_class ); ?>">
                                        <?php esc_html_e('Font Variant: ', 'u-design'); ?><br />
                                        <select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_variant]" class="<?php echo esc_attr( $class_prefix ); ?>-font-variants" style="width:180px;"><?php 
                                            foreach ($google_webfonts_variants[$google_font_selected]['text'] as $variant) {
                                                $selected_val = ( $options[$option_name_prefix.'_font_variant'] ) ? $options[$option_name_prefix.'_font_variant'] : 'regular';
						$make_current_variant_selected = ( $selected_val == $variant ) ? $make_current_variant_selected = ' selected="selected"' : '';
                                                echo '<option value="'.$variant.'"'.$make_current_variant_selected.'>'.$google_fonts_variants_descriptions[$variant].'</option>';
                                            } ?>
                                        </select>
                                    </label>
                                    <label for="<?php echo esc_attr( $option_name_prefix ); ?>_font_subsets" class="<?php echo esc_attr( $option_name_prefix ); ?>_font_subsets<?php echo esc_attr( $hide_class ); ?>">
                                        <?php esc_html_e('Font Subset: ', 'u-design'); ?><br />
                                        <select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_subset]" class="<?php echo esc_attr( $class_prefix ); ?>-font-subsets" style="width:160px;"><?php 
                                            foreach ($google_webfonts_subsets[$google_font_selected]['text'] as $subset) {
                                                $selected_val = ( $options[$option_name_prefix.'_font_subset'] ) ? $options[$option_name_prefix.'_font_subset'] : 'latin';
						$make_current_subset_selected = ( $selected_val == $subset ) ? $make_current_subset_selected = ' selected="selected"' : '';
                                                echo '<option value="'.$subset.'"'.$make_current_subset_selected.'>'.$subset.'</option>';
                                            } ?>
                                        </select>
                                    </label>
<?php 				endif; ?>
                
<?php                           if ( $font_size_units == "pixels" ) : ?>
                                    <label for="<?php echo esc_attr( $option_name_prefix ); ?>_font_size" class="<?php echo esc_attr( $option_name_prefix ); ?>_font_size">
                                            <?php esc_html_e('Font Size: ', 'u-design'); ?>
                                            <select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_size]" id="<?php echo esc_attr( $option_name_prefix ); ?>_font_size" class="<?php echo esc_attr( $class_prefix ); ?>-font-size">
                                                <?php for ($index = 8; $index < 37; $index++) {
                                                    $selected_val = ( $options[$option_name_prefix.'_font_size'] ) ? $options[$option_name_prefix.'_font_size'] : $default_font_size;
                                                    $selected = ( $selected_val == $index ) ? $selected = ' selected="selected"' : '';
                                                    $default_text = ($index == $default_font_size) ? esc_html__('(Default)', 'u-design') : '';
                                                    echo '<option value="'.$index.'"'.$selected.'>'.$index.'px '.$default_text.'</option>';
                                                } ?>
                                            </select>
                                    </label>
<?php                           elseif( $font_size_units == "ems" ) : ?>
                                    <label for="<?php echo esc_attr( $option_name_prefix ); ?>_font_size" class="<?php echo esc_attr( $option_name_prefix ); ?>_font_size">
                                            <?php esc_html_e('Font Size Coefficient: ', 'u-design'); ?><br />
                                            <select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_size]" id="<?php echo esc_attr( $option_name_prefix ); ?>_font_size" class="<?php echo esc_attr( $class_prefix ); ?>-font-size">
                                                <?php 
                                                $start = 1.05;
                                                $increment = 0.05;
                                                for ($i = 0; $i < 100; $i++){
                                                    $ems = sprintf('%0.2f', $start + $increment * $i);
                                                    $selected_val = ( $options[$option_name_prefix.'_font_size'] ) ? $options[$option_name_prefix.'_font_size'] : $default_font_size;
                                                    $selected = ( $selected_val == $ems ) ? $selected = ' selected="selected"' : '';
                                                    $default_text = ($ems == $default_font_size) ? esc_html__('(Default)', 'u-design') : '';
                                                    echo '<option value="'.$ems.'"'.$selected.'>'.$ems.'em '.$default_text.'</option>';
                                                } ?>
                                            </select>
                                    </label>
                                    <div style="clear:both;"><span class="description"><?php esc_html_e('The Font Size Coefficient is multiplied by the actual heading size in "em".', 'u-design'); ?></span></div>
<?php                           else : ?>
                                    <label for="<?php echo esc_attr( $option_name_prefix ); ?>_size_coefficient" class="<?php echo esc_attr( $option_name_prefix ); ?>_font_size">
                                            <?php esc_html_e('Font Size Coefficient: ', 'u-design'); ?><br />
                                            <select name="udesign_options[<?php echo esc_attr( $option_name_prefix ); ?>_font_size_coefficient]" id="<?php echo esc_attr( $option_name_prefix ); ?>_font_size_coefficient" class="<?php echo esc_attr( $class_prefix ); ?>-font-size">
                                                <?php 
                                                $start = 0.2;
                                                $increment = 0.2;
                                                for ($i = 0; $i < 20; $i++){
                                                    $coefficient = sprintf('%0.1f', $start + $increment * $i);
                                                    $selected_val = ( $options[$option_name_prefix.'_font_size_coefficient'] ) ? $options[$option_name_prefix.'_font_size_coefficient'] : $default_font_size;
                                                    $selected = ( $selected_val == $coefficient ) ? $selected = ' selected="selected"' : '';
                                                    $default_text = ($coefficient == $default_font_size) ? esc_html__('(Default)', 'u-design') : '';
                                                    echo '<option value="'.$coefficient.'"'.$selected.'>'.$coefficient.' '.$default_text.'</option>';
                                                } ?>
                                            </select>
                                    </label>
                                    <div style="clear:both;"><span class="description"><?php esc_html_e('The Font Size Coefficient is multiplied by the actual heading size in "em".', 'u-design'); ?></span></div>
<?php                           endif; ?>
    <?php 
    return ob_get_clean();
}


function get_udesign_text_area_1_dummy_content() {
    $admin_email = get_option('admin_email');
    return <<<XML
Questions? &nbsp; <i class="fa fa-phone"></i> <a href="tel:+0009876543">+(000) 987-6543</a> &nbsp; <i class="fa fa-envelope-o"></i> [safe_email]{$admin_email}[/safe_email]
XML;
}


function data_collection_message_default_text() {
    return sprintf( esc_html__('This form collects your name, email and phone number so that we can correspond with you. Check out our %1$sprivacy policy%2$s for the full story on how we protect and manage your submitted data!', 'u-design'), '<a href="'.esc_url( trailingslashit( is_multisite() ? network_site_url() : site_url() ) . 'privacy-policy/' ).'">', '</a>' );
}

function contact_consent_default_text() {
    return sprintf( esc_html__( 'I consent to having "%s" collect my name, email and phone number!', 'udesign' ), get_option( 'blogname' ) );
}


// Let's begin...
new UDesign_Theme_Options();




