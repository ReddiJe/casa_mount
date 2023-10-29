<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



// Before VC init.
add_action( 'vc_before_init', 'udesign_vc_elements' );


function udesign_vc_elements() {

    /**
     * ---------------------------------------------------------------------------------
     * ---------------( U-Design VisualComposer "Content Block" Element )---------------
     * ---------------------------------------------------------------------------------
     * 
     * The following [vc_udesign_content_block] shortcode is a wrapper for the U-Design [content_block] shortcode.
     * This is required because the VC's 'attach_image' attribute type returns an image attachment ID where 
     * the theme's [content_block] shortcode requires bg_image to be a valid URL and not an ID. The wrapper [vc_udesign_content_block]
     * shortcode bellow will extract the image source from an attachment ID and pass it to the theme's [content_block] shortcode's 'bg_image' attribute.
     * 
     */
    add_shortcode('vc_udesign_content_block', 'vc_udesign_content_block_func');
    function vc_udesign_content_block_func(  $atts, $content = null ) {
        $atts = shortcode_atts( array(
                        'bg_image'          => '',
                        'bg_position'       => 'center top',
                        'bg_repeat'         => 'no-repeat',
                        'parallax_scroll'   => 'no',
                        'bg_color'          => '#7A7A7A',
                        'bg_fixed'          => 'yes',
                        'bg_size'           => 'auto',
                        'font_color'        => '#FFFFFF',
                        'max_bg_width'      => 'yes',
                        'content_padding'   => '60px 0',
                        'class' => ''
                ), $atts, 'vc_udesign_content_block' );
        
        $bg_image_attchmt = wp_get_attachment_image_src( $atts['bg_image'], "full" );
        $bg_image_src = $bg_image_attchmt[0];
        
        return do_shortcode( '[content_block bg_image="' . $bg_image_src . '" max_bg_width="' . $atts['max_bg_width'] . '" bg_fixed="' . $atts['bg_fixed'] . '" bg_position="' . $atts['bg_position'] . '" bg_repeat="' . $atts['bg_repeat'] . '" bg_size="' . $atts['bg_size'] . '" parallax_scroll="' . $atts['parallax_scroll'] . '" bg_color="' . $atts['bg_color'] . '" content_padding="' . $atts['content_padding'] . '" font_color="' . $atts['font_color'] . '" class="' . $atts['class'] . '"]' . $content . '[/content_block]' );
        
    }

    vc_map(array(
        "name" => __( "Content Block", 'u-design' ),
        "base" => "vc_udesign_content_block",
        "category" => __( "U-Design", 'u-design' ),
        'description' => __( "U-Design theme element", 'u-design' ),
        'icon' => get_template_directory_uri() . '/inc/admin/vc-elements/image/ud-logo-small.png',
        "params" => array(
            array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'heading' => __( 'Text', 'u-design' ),
                    'param_name' => 'content',
                    'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'u-design' ),
            ),
            array(
                    'type' => 'attach_image',
                    'heading' => __( 'Background Image', 'u-design' ),
                    'param_name' => 'bg_image',
                    'value' => '',
                    "save_always" => true,
                    'description' => __( 'Select image from media library.', 'u-design' ),
                    //'admin_label' => true,
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Fixed Background', 'u-design' ),
                    'param_name' => 'bg_fixed',
                    'description' => __( 'Sets whether the background image is fixed or scrolls with the rest of the page', 'u-design' ),
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    'std'   => 'yes',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'bg_image',
                            'not_empty' => true,
                    ),
                    "edit_field_class" => "vc_col-sm-6",
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Background Position", 'u-design'),
                    "param_name" => "bg_position",
                    "value" => "center top",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'bg_image',
                            'not_empty' => true,
                    ),
                    "description" => sprintf( __('Select the background image position property. For more info on the CSS "background-position" property visit %1$sthis page%2$s.', 'u-design'), '<a rel="nofollow" target="_blank" href="http://www.w3schools.com/cssref/pr_background-position.asp">', '</a>' ),
                    "edit_field_class" => "vc_col-sm-6",
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Background Repeat', 'u-design' ),
                    'param_name' => 'bg_repeat',
                    'value' => array(
                            __( 'no-repeat', 'u-design' )  => 'no-repeat',
                            __( 'repeat', 'u-design' )     => 'repeat',
                            __( 'repeat-x', 'u-design' )   => 'repeat-x',
                            __( 'repeat-y', 'u-design' )   => 'repeat-y',
                            __( 'initial', 'u-design' )    => 'initial',
                            __( 'inherit', 'u-design' )    => 'inherit',
                    ),
                    'std'   => 'no-repeat',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'bg_image',
                            'not_empty' => true,
                    ),
                    "description" => sprintf( __('Select the background image repeat property. For more info on the CSS "background-repeat" property visit %1$sthis page%2$s.', 'u-design'), '<a rel="nofollow" target="_blank" href="http://www.w3schools.com/cssref/pr_background-repeat.asp">', '</a>' ),
                    "edit_field_class" => "vc_col-sm-6",
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Background Size', 'u-design' ),
                    'param_name' => 'bg_size',
                    'value' => array(
                            __( 'auto', 'u-design' )  => 'auto',
                            __( 'cover', 'u-design' )     => 'cover',
                            __( 'contain', 'u-design' )   => 'contain',
                            __( 'initial', 'u-design' )    => 'initial',
                            __( 'inherit', 'u-design' )    => 'inherit',
                    ),
                    'std'   => 'auto',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'bg_image',
                            'not_empty' => true,
                    ),
                    "description" => __( 'Select the background image size.', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-6",
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Parallax Scroll', 'u-design' ),
                    'param_name' => 'parallax_scroll',
                    'description' => __( 'Sets whether the background image is fixed or scrolls with the rest of the page', 'u-design' ),
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'bg_image',
                            'not_empty' => true,
                    ),
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Background Color", 'u-design' ),
                    "param_name" => "bg_color",
                    "value" => '#7A7A7A', 
                    "save_always" => true,
                    "description" => __( "Choose background color.", 'u-design' ),
                    'group' => __( 'Background Options', 'u-design' ),
            
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Background Stretch', 'u-design' ),
                    'param_name' => 'max_bg_width',
                    'description' => __( 'Extend the background to maximum width (the width of the browser window).', 'u-design' ),
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    'std'   => 'yes',
                    'save_always' => true,
                    'group' => __( 'Background Options', 'u-design' ),
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Text Color", 'u-design' ),
                    "param_name" => "font_color",
                    "value" => '#FFFFFF', 
                    "save_always" => true,
                    "description" => __( "Choose text color.", 'u-design' ),
                    "edit_field_class" => "vc_col-sm-6",
            
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Content padding", 'u-design'),
                    "param_name" => "content_padding",
                    "value" => "60px 0",
                    "save_always" => true,
                    "description" => sprintf( __('Use the above textfield to specify the content padding. For more info on the CSS "padding" property visit %1$sthis page%2$s.', 'u-design'), '<a rel="nofollow" target="_blank" href="http://www.w3schools.com/cssref/pr_padding.asp">', '</a>' ),
                    "edit_field_class" => "vc_col-sm-6",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Custom Class", 'u-design'),
                    "param_name" => "class",
                    "value" => "",
                    "save_always" => true,
                    "description" => __( "Use this option to pass a unique CSS class which you may use to style this particular instance of the content block in the front end with custom CSS.", 'u-design' ),
            ),
        )
    ));
    
    
    
    /**
     * ---------------------------------------------------------------------------------
     * ---------------( U-Design VisualComposer "Quote" Element )---------------
     * ---------------------------------------------------------------------------------
     * 
     * The following  will create the [vc_udesign_quote]...[/vc_udesign_quote] element
     * 
     */
    add_shortcode('vc_udesign_quote', 'vc_udesign_quote_func');
    function vc_udesign_quote_func(  $atts, $content = null ) {
        $atts = shortcode_atts( array(
                        'quote_type'            => 'blockquote', // options: 'blockquote', 'pullquote'
                        'quote_symbol'          => 'symbol_1', // options: 'symbol_1' or 'symbol_2'
                        'quote_style'           => 'dark', // options: 'dark' or 'light'
                        // "Pullquote" specific:
                        'alignment'             => 'alignment',
                        // "Quote with Author" specific:
                        'quote_title'           => '',
                        'author_image'          => '',
                        'author_img_location'   => 'top_left',
                        'author_img_shape'      => 'square',
                        'bg_color'              => 'rgba(0,0,0,0.3)',
                        'border_color'          => 'rgba(0,0,0,0.3)',
                        'text_color'            => '#777777',
                        'author_name'           => '',
                        'author_name_color'     => '#777777',
                        'author_title'          => '',
                        'author_title_color'    => '#777777',
                        // All:
                        'class' => ''
                ), $atts, 'vc_udesign_quote' );
        
        if ( 'symbol_1' === $atts['quote_symbol'] ) {
            $blockquote_style = ( $atts['quote_style'] === 'light' ) ? ' bq-light' : ' bq-dark';
        } else {
            $blockquote_style = ( $atts['quote_style'] === 'light' ) ? ' bq-light-2' : ' bq-dark-2';
        }
        
        switch ( $atts['quote_type'] ) {
            
            case 'pullquote':
                $pullquote_shortcode =  ( 'symbol_1' === $atts['quote_symbol'] ) ? 'pullquote' : 'pullquote2';
                $output = do_shortcode( '['.$pullquote_shortcode.' style="'.$atts['alignment'].'" quote="'.$atts['quote_style'].'"]' . $content . '[/'.$pullquote_shortcode.']' );
                break;
            
            case 'quote_with_author':
                $author_image_attchmt = wp_get_attachment_image_src( $atts['author_image'], "thumbnail" );
                $author_image_src = $author_image_attchmt[0];
                $author_img_circle = '';
                $author_img_w_h = '110';
                $text_area_width = '100%';
                $background_color_when_circle = '';
                
                if ( 'top_left' === $atts['author_img_location'] ) {
                    if ( 'round' === $atts['author_img_shape'] ) {
                        $author_img_circle = 'img-circle';
                        $author_img_w_h = '130';
                        $background_color_when_circle = ' background-color:'.$atts['border_color'].'; '; // add same background-color as the border to fix an issue with pixelation of the circled border
                    }
                    $author_image = ( $author_image_src ) ? '<p><img style="border: 7px solid '.$atts['border_color'].'; '.$background_color_when_circle.' margin-right:0;" class="alignleft '.$author_img_circle.'" src="'.$author_image_src.'" alt="'.__( 'Author Image', 'u-design' ).'" width="'.$author_img_w_h.'" height="'.$author_img_w_h.'" /></p>' :  '';
                    if( $author_image ) { $text_area_width = '87%'; }
                } else {
                    if ( 'round' === $atts['author_img_shape'] ) {
                        $author_img_circle = 'img-circle';
                        $author_img_w_h = '74';
                        $background_color_when_circle = ' background-color:'.$atts['border_color']; // add same background-color as the border to fix an issue with pixelation of the circled border
                    } else { // when square
                        $author_img_w_h = '70';
                    }
                    $author_image = ( $author_image_src ) ? '<img style="margin-top:-45px; margin-left:20px; border:7px solid '.$atts['border_color'].'; '.$background_color_when_circle.'" class="alignleft '.$author_img_circle.'" src="'.$author_image_src.'" alt="'.__( 'Author Image', 'u-design' ).'" width="'.$author_img_w_h.'" height="'.$author_img_w_h.'" />' :  '';
                }
                    
                ob_start(); ?>
                <div>
                    <?php echo ( esc_attr( $atts['quote_title'] ) ) ? '<h4 style="color:'.$atts['text_color'].'; margin:30px 0 20px;">'.$atts['quote_title'].'</h4>' : '<div style="height:20px;">&nbsp;</div>'; ?>
                    <blockquote class="<?php echo esc_attr( $blockquote_style ); ?>" style="margin-bottom: 20px; display: inline-block;">
                        <p><?php echo wp_kses_post( $content ); ?></p>
<?php                   if ( 'top_left' === $atts['author_img_location'] && ( $atts['author_name'] || $atts['author_title'] ) ) : ?>
                            <div style="float:right; text-align:right; font-style:normal; font-weight:bold; font-size: 14px; color:<?php echo wp_strip_all_tags( $atts['text_color'] ); ?>;">
                                <?php echo ( esc_attr( $atts['author_name'] ) ) ? '<span style="color:'.$atts['author_name_color'].';">'.$atts['author_name'].'</span>' : ''; ?>
                                <?php echo ( esc_attr( $atts['author_title'] ) ) ? '<br /><span style="color:'.$atts['author_title_color'].';">'.$atts['author_title'].'</span>' : ''; ?>
                            </div>
<?php                   endif; ?>
                    </blockquote>
                </div>
                <?php
                $the_text = ob_get_clean();

                $output = do_shortcode( '[message type="custom" width="'.$text_area_width.'" align="right" start_color="'.$atts['bg_color'].'" end_color="'.$atts['bg_color'].'" border="'.$atts['bg_color'].'" color="'.$atts['text_color'].'"]'.$the_text.'[/message]' );
                if ( $author_image ) {
                    if ( 'top_left' === $atts['author_img_location'] ) {
                        $output = $author_image . '<div style="margin-top: 25px;">'. $output .'</div>';  // if author image then add top margin to the text section
                    } else {
                        $author_name_html = ( $atts['author_name'] ) ? '<strong><span style="color:'.$atts['author_name_color'].';">'.$atts['author_name'].'</span></strong>' : '';
                        $author_title_html = ( $atts['author_title'] ) ? '<span style="font-size:11px; color:'.$atts['author_title_color'].'">'.$atts['author_title'].'</span>' : '';
                        $seperator = ( $author_name_html && $author_title_html ) ? ' <span style="color:'.$atts['author_title_color'].';">&ndash;</span> ' : '';
                        $author_info_html = ( $author_name_html || $author_title_html ) ? '<p>'.$author_name_html . $seperator . $author_title_html.'</p>': '';
                        $output = '<div style="margin-top: 5px;">'. $output .'</div>' . $author_image . $author_info_html;
                    }
                }
                break;
                
            default: // when 'blockquote' type
                $output = '<blockquote class="'.$blockquote_style.'">'.do_shortcode( $content ).'</blockquote>';
                break;
        }
        return $output;
        
    }

    vc_map(array(
        "name" => __( "Quote", 'u-design' ),
        "base" => "vc_udesign_quote",
        "category" => __( "U-Design", 'u-design' ),
        'description' => __( "U-Design theme element", 'u-design' ),
        'icon' => get_template_directory_uri() . '/inc/admin/vc-elements/image/ud-logo-small.png',
        "params" => array(
            array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'heading' => __( 'Text', 'u-design' ),
                    'param_name' => 'content',
                    'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Quote Type', 'u-design' ),
                    'param_name' => 'quote_type',
                    'value' => array(
                            __( 'Blockquote', 'u-design' )           => 'blockquote',
                            __( 'Pullquote', 'u-design' )            => 'pullquote',
                            __( 'Quote with Author', 'u-design' )    => 'quote_with_author',
                    ),
                    'std'   => 'blockquote',
                    "save_always" => true,
                    "description" => __( 'Select the quote type.', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Quote Symbol', 'u-design' ),
                    'param_name' => 'quote_symbol',
                    'value' => array(
                            __( 'Symbol 1', 'u-design' )   => 'symbol_1',
                            __( 'Symbol 2', 'u-design' )   => 'symbol_2',
                    ),
                    'std'   => 'symbol_2',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'blockquote', 'pullquote', 'quote_with_author' ),
                    ),
                    "description" => __( 'Select the quote symbol.', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Quote Style', 'u-design' ),
                    'param_name' => 'quote_style',
                    'value' => array(
                            __( 'Dark', 'u-design' )   => 'dark',
                            __( 'Light', 'u-design' )  => 'light',
                    ),
                    'std'   => 'dark',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'blockquote', 'pullquote', 'quote_with_author' ),
                    ),
                    "description" => __( 'Select the quote symbol style.', 'u-design' ),
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Alignment', 'u-design' ),
                    'param_name' => 'alignment',
                    'value' => array(
                            __( 'Left', 'u-design' )  => 'left',
                            __( 'Right', 'u-design' ) => 'right',
                    ),
                    'std'   => 'left',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'pullquote' ),
                    ),
                    "description" => __( 'Select the pullquote alignment.', 'u-design' ),
            ),
            // "Quote with Author" specific:
            array(
                    "type" => "textfield",
                    "heading" => __("Quote Title", 'u-design'),
                    "param_name" => "quote_title",
                    "value" => "",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "description" => __( "Enter quote title (optional). It will be positioned above the quote text.", 'u-design' ),
            ),
            array(
                    'type' => 'attach_image',
                    'heading' => __( 'Author Image', 'u-design' ),
                    'param_name' => 'author_image',
                    'value' => '',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    'description' => __( 'Select image from media library.', 'u-design' ),
                    //'admin_label' => true,
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Image Location', 'u-design' ),
                    'param_name' => 'author_img_location',
                    'value' => array(
                            __( 'Top Left', 'u-design' ) => 'top_left',
                            __( 'Bottom Left', 'u-design' ) => 'bottom_left',
                    ),
                    'std'   => 'top_left',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'author_image',
                            'not_empty' => true,
                    ),
                    "edit_field_class" => "vc_col-sm-6",
            ),
            array(
                    'type' => 'dropdown',
                    'heading' => __( 'Image Shape', 'u-design' ),
                    'param_name' => 'author_img_shape',
                    'value' => array(
                            __( 'Square', 'u-design' ) => 'square',
                            __( 'Round', 'u-design' ) => 'round',
                    ),
                    'std'   => 'square',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'author_image',
                            'not_empty' => true,
                    ),
                    "description" => "&nbsp;", // adds an extra line of space
                    "edit_field_class" => "vc_col-sm-6",
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Image Border Color", 'u-design' ),
                    "param_name" => "border_color",
                    "value" => '#F5F5F5',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'author_image',
                            'not_empty' => true,
                    ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Background Color", 'u-design' ),
                    "param_name" => "bg_color",
                    "value" => '#F5F5F5',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Text Color", 'u-design' ),
                    "param_name" => "text_color",
                    "value" => '#777777', 
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "description" => "&nbsp;", // adds an extra line of space
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Author Name", 'u-design'),
                    "param_name" => "author_name",
                    "value" => "Joe Dow",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "description" => __( "Enter author name (optional).", 'u-design' ),
                    "edit_field_class" => "vc_col-sm-8",
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Author Name Color", 'u-design' ),
                    "param_name" => "author_name_color",
                    "value" => '#777777',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Author Title", 'u-design'),
                    "param_name" => "author_title",
                    "value" => "Financial Consultant",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "description" => __( "Enter author title (optional).", 'u-design' ),
                    "edit_field_class" => "vc_col-sm-8",
            ),
            array(
                    "type" => "colorpicker",
                    "heading" => __( "Author Title Color", 'u-design' ),
                    "param_name" => "author_title_color",
                    "value" => '#777777',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'quote_type',
                            'value' => array( 'quote_with_author' ),
                    ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Custom Class", 'u-design'),
                    "param_name" => "class",
                    "value" => "",
                    "save_always" => true,
                    "description" => __( "Use this option to pass a unique CSS class which you may use to style this particular instance of the content block in the front end with custom CSS.", 'u-design' ),
            ),
        )
    ));
    
    
    
    /**
     * ---------------------------------------------------------------------------------
     * ---------------( U-Design VisualComposer "Recent Posts" Element )---------------
     * ---------------------------------------------------------------------------------
     * 
     * The following [vc_udesign_recent_posts] shortcode is a wrapper for the U-Design [udesign_recent_posts] shortcode.
     * 
     */
    add_shortcode('vc_udesign_recent_posts', 'vc_udesign_recent_posts_func');
    function vc_udesign_recent_posts_func( $atts ) {
        $atts = shortcode_atts( array(
                        'title' => esc_html__('Latest Posts', 'u-design'), 
                        'category_id' => '', 
                        'num_posts' => 3, 
                        'post_offset' => 0, 
                        'num_words_limit' => 13,
                        'show_date_author' => false,
                        'show_more_link' => false,
                        'more_link_text' => esc_html__('Read more', 'u-design'), 
                        'show_thumbs' => true,
                        'remove_thumb_frame' => false,
                        'thumb_frame_shadow' => false,
                        'default_thumb' => true,
                        'post_thumb_width' => 60,
                        'post_thumb_height' => 60,
                        'class' => ''
                ), $atts, 'vc_udesign_recent_posts' );
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        return do_shortcode( '[udesign_recent_posts title="' . $atts['title'] . '" category_id="' . $atts['category_id'] . '" num_posts="' . $atts['num_posts'] . '" post_offset="' . $atts['post_offset'] . '" num_words_limit="' . $atts['num_words_limit'] . '" show_date_author="' . $atts['show_date_author'] . '" show_more_link="' . $atts['show_more_link'] . '" more_link_text="' . $atts['more_link_text'] . '" show_thumbs="' . $atts['show_thumbs'] . '" remove_thumb_frame="' . $atts['remove_thumb_frame'] . '" thumb_frame_shadow="' . $atts['thumb_frame_shadow'] . '" default_thumb="' . $atts['default_thumb'] . '" post_thumb_width="' . $atts['post_thumb_width'] . '" post_thumb_height="' . $atts['post_thumb_height'] . '"]' );
	
    }
    
    function udesign_get_categories_as_array(){
            $categories_array = array( array( 'label' => __( 'All', 'u-design' ), 'value' => 0, 'group' => 'category' ) );
            $args = array(  'hide_empty'    => 0,
                            'hierarchical'  => 0,
                            //'type'        => 'post',      
                            'orderby'       => 'name',
                            'order'         => 'ASC',
            );
            $categories = (array) get_categories( $args );
            foreach( $categories as $category ){
                $categories_array[] = array( 'label' => $category->name, 
                                             'value' => $category->term_id, 
                                             'group' => $category->taxonomy,
                );
            }
            return $categories_array;
    }
    
    vc_map(array(
        "name" => __( "Recent Posts", 'u-design' ),
        "base" => "vc_udesign_recent_posts",
        "category" => __( "U-Design", 'u-design' ),
        'description' => __( "U-Design theme element", 'u-design' ),
        'icon' => get_template_directory_uri() . '/inc/admin/vc-elements/image/ud-logo-small.png',
        "params" => array(
            array(
                    "type" => "textfield",
                    "heading" => __("Title", 'u-design'),
                    "param_name" => "title",
                    "value" => __("Latest from the Blog", 'u-design'),
                    "save_always" => true,
                    "admin_label" => true,
            ),
            array(
                    'type' => 'autocomplete',
                    'heading' => __( 'Enter categories', 'u-design' ),
                    'param_name' => 'category_id',
                    'settings' => array(
                            'multiple' => true,
                            'sortable' => true,
                            'min_length' => 1,
                            'no_hide' => true, // In UI after select doesn't hide an select list
                            'groups' => false, // In UI show results grouped by groups
                            'unique_values' => true, // In UI show results except selected. NB! You should manually check values in backend
                            'display_inline' => true, // In UI show results inline view
                            'auto_focus' => false, // auto focus input, default true
                            'values'   => udesign_get_categories_as_array(), // See the example format in the comment below for the returned array 
//                            array( // Using key 'values' will disable an AJAX requests on autocomplete input and also any filter for suggestions
//                                    array( 'label' => __( 'All', 'u-design' ), 'value' => 0, 'group' => 'category' ),
//                                    array( 'label' => 'Abrams', 'value' => 1, 'group' => 'category' ),
//                                    array( 'label' => 'Brama', 'value' => 2, 'group' => 'category' ),
//                                    array( 'label' => 'Dron', 'value' => 3, 'group' => 'tags' ),
//                                    array( 'label' => 'Akelloam', 'value' => 4, 'group' => 'tags' ),
//                                    // Label will show when adding
//                                    // Value will saved in input
//                                    // Group only used if groups=>true, this will group data in select dropdown by groups
//                            ),
                    ),
                    "save_always" => true,
                    "description" => __( 'Use the above field to select categoy or multiple categories to pull posts from. If left blank all categories will be considered.', 'u-design' ),
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Number of posts to show", 'u-design'),
                    "param_name" => "num_posts",
                    "value" => "3",
                    "save_always" => true,
                    "description" => __( 'at most 15', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Number of posts to skip", 'u-design'),
                    "param_name" => "post_offset",
                    "value" => "0",
                    "save_always" => true,
                    "description" => __( 'offset from latest', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Number of words to show", 'u-design'),
                    "param_name" => "num_words_limit",
                    "value" => "13",
                    "save_always" => true,
                    "description" => __( 'If lesser value, "Excerpt Length" defined in the theme\'s Blog Section page can overwrite this.', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Show date & author info', 'u-design' ),
                    'param_name' => 'show_date_author',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    "save_always" => true,
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Show "more" link', 'u-design' ),
                    'param_name' => 'show_more_link',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    "save_always" => true,
                    "edit_field_class" => "vc_col-sm-4",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __('"more" link text', 'u-design'),
                    "param_name" => "more_link_text",
                    "value" => "Read more",
                    "save_always" => true,
                    "edit_field_class" => "vc_col-sm-8",
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Show thumbnails', 'u-design' ),
                    'param_name' => 'show_thumbs',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    'std'   => 'yes',
                    "save_always" => true,
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Remove thumbnail frame', 'u-design' ),
                    'param_name' => 'remove_thumb_frame',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'show_thumbs',
                            'not_empty' => true,
                    ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Show thumbnail frame shadow', 'u-design' ),
                    'param_name' => 'thumb_frame_shadow',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'show_thumbs',
                            'not_empty' => true,
                    ),
            ),
            array(
                    'type' => 'checkbox',
                    'heading' => __( 'Use default image (when no image found)', 'u-design' ),
                    'param_name' => 'default_thumb',
                    'value' => array( __( 'Yes', 'u-design' ) => 'yes' ),
                    'std'   => 'yes',
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'show_thumbs',
                            'not_empty' => true,
                    ),
            ),
            array(
                    "type" => "textfield",
                    "heading" => __( "Thumbnail width", 'u-design' ),
                    "param_name" => "post_thumb_width",
                    "value" => "60",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'show_thumbs',
                            'not_empty' => true,
                    ),
                    'description' => __( 'Width in pixels', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-6",
                
            ),
            array(
                    "type" => "textfield",
                    "heading" =>  __( "Thumbnail height", 'u-design' ),
                    "param_name" => "post_thumb_height",
                    "value" => "60",
                    "save_always" => true,
                    'dependency' => array(
                            'element' => 'show_thumbs',
                            'not_empty' => true,
                    ),
                    'description' => __( 'Height in pixels', 'u-design' ),
                    "edit_field_class" => "vc_col-sm-6",
            ),
            array(
                    "type" => "textfield",
                    "heading" => __("Custom Class", 'u-design'),
                    "param_name" => "class",
                    "value" => "",
                    "save_always" => true,
                    "description" => __( "Use this option to pass a unique CSS class which you may use to style this particular instance of the content block in the front end with custom CSS.", 'u-design' ),
            ),
        ),
    ));
    
    
    
}





