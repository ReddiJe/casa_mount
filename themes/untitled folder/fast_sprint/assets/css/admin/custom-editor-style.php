<?php
/*
U-Design Editor Styles.
*/

$root = dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}


global $udesign_options;

$general_font_family = preg_replace( '/:.*/','', $udesign_options['general_font_family'] );
$headings_font_family = preg_replace( '/:.*/','', $udesign_options['headings_font_family'] );
$headings_font_size_coefficient = $udesign_options['headings_font_size_coefficient'];

header( 'Content-type: text/css' );
?>
/**
 * U-Design dynamic block editor styles.
 */

/* Handle Gutenberg's alignwide option for global fixed width page layout. */
@media screen and (min-width: <?php echo wp_strip_all_tags( $udesign_options['global_theme_width'] + 140 ); ?>px) {
	/* Main column width */
	.wp-block {
	    max-width: <?php echo wp_strip_all_tags( $udesign_options['global_theme_width'] ); ?>px;
	}

	/* Width of "wide" blocks */
	.wp-block[data-align="wide"] {
	    max-width: <?php echo wp_strip_all_tags( $udesign_options['global_theme_width'] + 140 ); ?>px;
	}

	/* Width of "full-wide" blocks */
	.wp-block[data-align="full"] {
	    max-width: none;
	}
}

.editor-writing-flow p { margin: 0 0 5px; }

.editor-writing-flow, .editor-writing-flow p {
	font-family:'<?php echo wp_strip_all_tags( $general_font_family ); ?>';
	font-weight: <?php echo udesign_block_editor_parse_font_variants('general', 'weight'); ?>;
	font-style: <?php echo udesign_block_editor_parse_font_variants('general', 'style'); ?>;
	font-size: <?php echo wp_strip_all_tags( $udesign_options['general_font_size'] ); ?>px;
	line-height: <?php echo wp_strip_all_tags( $udesign_options['general_font_line_height'] ); ?>;
}
.editor-writing-flow, .editor-writing-flow p, 
.editor-writing-flow .wp-block-verse pre, .editor-writing-flow pre.wp-block-verse {
	color:#<?php echo wp_strip_all_tags( $udesign_options['body_text_color'] ); ?>;
}
.wp-block-cover p,
.wp-block-cover-image p,
.wp-block-cover-image .wp-block-cover-image-text,
.wp-block-cover-image .wp-block-cover-text,
.wp-block-cover-image h2,
.wp-block-cover .wp-block-cover-image-text,
.wp-block-cover .wp-block-cover-text,
.wp-block-cover h2 {
	color: #fff;
	font-size: 2em;
	line-height: 1.25;
	z-index: 1;
	margin-bottom: 0;
	padding: 14px;
	text-align: center;
}

.editor-writing-flow a, { color:#<?php echo wp_strip_all_tags( $udesign_options['main_link_color'] ); ?>; text-decoration: none; }
.editor-writing-flow a:hover { color:#<?php echo wp_strip_all_tags( $udesign_options['main_link_color_hover'] ); ?>; cursor: pointer; }

.editor-writing-flow .has-small-font-size { font-size: <?php echo ( wp_strip_all_tags( $udesign_options['general_font_size'] ) - 2 ); ?>px; }
.editor-writing-flow .has-normal-font-size { font-size: <?php echo wp_strip_all_tags( $udesign_options['general_font_size'] ); ?>px; }
.editor-writing-flow .has-medium-font-size { font-size: <?php echo ( wp_strip_all_tags( $udesign_options['general_font_size'] ) + 4 ); ?>px; }
.editor-writing-flow .has-large-font-size { font-size: <?php echo ( wp_strip_all_tags( $udesign_options['general_font_size'] ) + 20  ); ?>px; }
.editor-writing-flow .has-larger-font-size { font-size: <?php echo ( wp_strip_all_tags( $udesign_options['general_font_size'] ) + 34 ); ?>px; }
.editor-writing-flow .wp-block-pullquote blockquote { font-family:'<?php echo wp_strip_all_tags( $general_font_family ); ?>'; }

.editor-post-title__block .editor-post-title__input {
	font-family:'<?php echo wp_strip_all_tags( $headings_font_family ); ?>';
	font-size:<?php echo wp_strip_all_tags( ( 1.333 * $headings_font_size_coefficient ) ); ?>em;
	font-weight: <?php echo udesign_block_editor_parse_font_variants('headings', 'weight'); ?>;
	font-style: <?php echo udesign_block_editor_parse_font_variants('headings', 'style'); ?>;
}
.editor-writing-flow h1, .editor-writing-flow h2, .editor-writing-flow h3, .editor-writing-flow h4, .editor-writing-flow h5, .editor-writing-flow h6 {
	font-family:'<?php echo wp_strip_all_tags( $headings_font_family ); ?>';
	line-height: <?php echo wp_strip_all_tags( $udesign_options['headings_font_line_height'] ); ?>;
	font-weight: <?php echo udesign_block_editor_parse_font_variants('headings', 'weight'); ?>;
	font-style: <?php echo udesign_block_editor_parse_font_variants('headings', 'style'); ?>;
	color:#<?php echo wp_strip_all_tags( $udesign_options['main_headings_color'] ); ?>;
}

.editor-writing-flow h1 { font-size:<?php echo wp_strip_all_tags( ( 1.833 * $headings_font_size_coefficient ) ); ?>em; }
.editor-writing-flow h2 { font-size:<?php echo wp_strip_all_tags( ( 1.667 * $headings_font_size_coefficient ) ); ?>em; }
.editor-writing-flow h3 { font-size:<?php echo wp_strip_all_tags( ( 1.5 * $headings_font_size_coefficient ) ); ?>em; }
.editor-writing-flow h4 { font-size:<?php echo wp_strip_all_tags( ( 1.333 * $headings_font_size_coefficient ) ); ?>em; }
.editor-writing-flow h5 { font-size:<?php echo wp_strip_all_tags( ( 1.25 * $headings_font_size_coefficient ) ); ?>em; }
.editor-writing-flow h6 { font-size:<?php echo wp_strip_all_tags( ( 1.083 * $headings_font_size_coefficient) ); ?>em; }

<?php // Overwrite Indivisual Headings. ?>
<?php if ( isset($udesign_options['heading1_font_settings_enabled']) && $udesign_options['heading1_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h1, .editor-post-title__block .editor-post-title__input { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading1_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading1', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading1', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading1_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading1_font_line_height'] ); ?>; }
<?php endif; ?>
<?php if ( isset($udesign_options['heading2_font_settings_enabled']) && $udesign_options['heading2_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h2 { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading2_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading2', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading2', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading2_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading2_font_line_height'] ); ?>; }
<?php endif; ?>
<?php if ( isset($udesign_options['heading3_font_settings_enabled']) && $udesign_options['heading3_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h3 { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading3_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading3', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading3', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading3_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading3_font_line_height'] ); ?>; }
<?php endif; ?>
<?php if ( isset($udesign_options['heading4_font_settings_enabled']) && $udesign_options['heading4_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h4 { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading4_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading4', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading4', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading4_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading4_font_line_height'] ); ?>; }
<?php endif; ?>
<?php if ( isset($udesign_options['heading5_font_settings_enabled']) && $udesign_options['heading5_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h5 { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading5_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading5', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading5', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading5_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading5_font_line_height'] ); ?>; }
<?php endif; ?>
<?php if ( isset($udesign_options['heading6_font_settings_enabled']) && $udesign_options['heading6_font_settings_enabled'] == "yes" ) : ?>
	.editor-writing-flow h6 { font-family:'<?php echo wp_strip_all_tags( $udesign_options['heading6_font_family'] ); ?>'; font-weight: <?php echo udesign_block_editor_parse_font_variants('heading6', 'weight'); ?>; font-style: <?php echo udesign_block_editor_parse_font_variants('heading6', 'style'); ?>; font-size:<?php echo wp_strip_all_tags( $udesign_options['heading6_font_size'] ); ?>em; line-height:<?php echo wp_strip_all_tags( $udesign_options['heading6_font_line_height'] ); ?>; }
<?php endif; ?>

	
i.circle-wrap {
    border: 2px solid;
    border-radius: 50% !important;
    background-color: transparent !important;
    display: inline-block;
    height: 2.5em;
    line-height: 2.5em;
    position: relative;
    text-align: center;
    vertical-align: middle;
    width: 2.5em;
}
i.circle-wrap:before { line-height: inherit; } /* Overwrite Fontello's defaults. */
.fa-ul { margin-left: 0; }




<?php
/**
 * This function will parse the Google Fonts Variants into font-weight and/or font-style property values respectively.
 * 
 * Dynamically generated names in this function:
 *      'general_font_variant', 'top_nav_font_variant', 'headings_font_variant', 
 *      'heading1_font_variant', 'heading2_font_variant', 'heading3_font_variant', 'heading4_font_variant', 'heading5_font_variant', 'heading6_font_variant',
 * 
 * @param string $prefix This is the font setting prefix, for example 'general', 'top_nav', 'headings' will be used to generate 'general_font_variant', 'top_nav_font_variant', 'headings_font_variant' names respectively
 * @param string $which_property Possible value: 'weight" or 'style' for returning font-weight or font-style respectively
 * @return string Return the font-weight or font-style string respectively
 */
function udesign_block_editor_parse_font_variants( $prefix = 'general', $which_property = 'weight' ) {
	global $udesign_options;
	${$prefix.'_font_weight'} = ${$prefix.'_font_style'} = 'normal';
	if ( isset( $udesign_options[$prefix.'_font_variant'] ) && $udesign_options[$prefix.'_font_variant'] !== "" ) {
		if ( $udesign_options[$prefix.'_font_variant'] === "italic" ) {
			${$prefix.'_font_style'} = 'italic';
		} elseif ( $udesign_options[$prefix.'_font_variant'] !== "regular" ) {
			$font_variant = preg_split( '/(?<=\d)(?=[a-z])/i', $udesign_options[$prefix.'_font_variant'] );
			if( is_numeric( $font_variant[0] ) ) {
				${$prefix.'_font_weight'} = $font_variant[0];
			}
			if( in_array( 'italic', $font_variant ) ) {
				${$prefix.'_font_style'} = 'italic';
			}
		}
	}
	return ( $which_property === 'weight' ) ? ${$prefix.'_font_weight'} : ${$prefix.'_font_style'};
}
