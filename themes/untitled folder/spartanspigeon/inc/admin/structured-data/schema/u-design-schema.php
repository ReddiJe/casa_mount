<?php 
/**
 * U-Design Structured Data Schemas with Schema.org tags.
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function run_after_udesign_theme_setup() {
	
	global $udesign_options;
	
	/**
	 * Insert schema tags inside the 'body' tag.
	 * 
	 */
	function udesign_insert_schemta_to_body_tag() {
		echo 'itemtype="https://schema.org/WebPage" itemscope="itemscope"';
	}
	add_action( 'udesign_inside_body_tag', 'udesign_insert_schemta_to_body_tag' );
	
	
	/**
	 * Add Schema.org tags and hatom-feed warnings fix to blog and archive pages' posts postmetadata blocks.
	 * 
	 */
	function udesign_blog_section_postmetadata_with_schema_tags() {
		global $udesign_options;
		ob_start();
		?>
			<section class="postmetadata">
				<?php                               
				if ( $udesign_options['show_postmetadata_author'] == 'yes' ) :
					printf( __('By %1$s on %2$s ', 'u-design'), '<span class="vcard author"><span class="fn">' . udesign_get_the_author_page_link() . '</span></span>', '<span class="updated">' . get_the_date() . '</span>' );
				else :
					printf( __('%1$s On %2$s ', 'u-design'), '<span class="hide-author vcard author"><span class="fn">' . udesign_get_the_author_page_link() . '</span></span>', '<span class="updated">' . get_the_date() . '</span>' );
				endif;
				?>
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"></time>
				<time datetime="<?php echo get_the_modified_time( 'c' ) ?>" class="entry-date updated" itemprop="dateModified"></time>
				&nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link entry-title"><?php the_category( ', ' ); ?></span> &nbsp; <?php echo udesign_get_comments_link(); ?> <?php edit_post_link( __( 'Edit', 'u-design' ), '<div class="postmetadata-edit-link">', '</div>' ); ?> 
				<?php 
				if ( isset( $udesign_options['show_postmetadata_tags'] ) && $udesign_options['show_postmetadata_tags'] == 'yes' ) {
					echo the_tags( '<div class="post-tags-wrapper">' . __( 'Tags: ', 'u-design' ), ', ', '</div>' );
				}
				?>
			</section><!-- end postmetadata -->
		<?php
		$postmetadata_html = ob_get_clean();
		$html = apply_filters( 'udesign_get_blog_section_postmetadata', $postmetadata_html );
		
		// Make sure only the specified HTML elements, attributes, and attribute values will occur in the output.
		$allowed_html_schema_tags = array( 'time' => array( 'class' => array(), 'datetime' => array(), 'itemprop' => array() ) );
		$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), $allowed_html_schema_tags );
		echo wp_kses( $html, $allowed_tags );
	}
	remove_action('udesign_blog_post_top_area_inside', 'udesign_blog_section_postmetadata', 11);
	add_action('udesign_blog_post_top_area_inside', 'udesign_blog_section_postmetadata_with_schema_tags', 11);
	
	
	/**
	 * Add Schema.org tags and hatom-feed warnings fix to Single Post postmetadata block.
	 * 
	 */
	function udesign_single_postmetadata_with_schema_tags() {
		global $udesign_options;
		ob_start();
		?>
			<div class="single-postmetadata-divider-top"><?php echo do_shortcode( '[divider]' ); ?></div>
			<section class="postmetadata">
				<?php                               
				if ( $udesign_options['show_postmetadata_author'] == 'yes' ) :
					printf( __( 'By %1$s on %2$s ', 'u-design' ), '<span class="vcard author"><span class="fn">' . udesign_get_the_author_page_link() . '</span></span>', '<span class="updated">' . get_the_date() . '</span>' );
				else :
					printf( __( '%1$s On %2$s ', 'u-design' ), '<span class="hide-author vcard author"><span class="fn">' . udesign_get_the_author_page_link() . '</span></span>', '<span class="updated">' . get_the_date() . '</span>' );
				endif;
				?>
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"></time>
				<time datetime="<?php echo get_the_modified_time( 'c' ) ?>" class="entry-date updated" itemprop="dateModified"></time>
				&nbsp; <span class="categories-link-divider">/ &nbsp;</span> <span class="postmetadata-categories-link entry-title"><?php the_category( ', ' ); ?></span> &nbsp; <?php echo udesign_get_comments_link(); ?> <?php edit_post_link( __( 'Edit', 'u-design' ), '<div class="postmetadata-edit-link">', '</div>' ); ?>  
				<?php 
				if ( isset( $udesign_options['show_postmetadata_tags'] ) && $udesign_options['show_postmetadata_tags'] == 'yes' ) {
					echo the_tags( '<div class="post-tags-wrapper">' . __( 'Tags: ', 'u-design' ), ', ', '</div>' );
				}
				?>
			</section>
			<div class="single-postmetadata-divider-bottom"><?php echo do_shortcode( '[divider]' ); ?></div>
		<?php
		$postmetadata_html = ob_get_clean();
		$html = apply_filters( 'udesign_get_udesign_single_postmetadata', $postmetadata_html );
		
		// Make sure only the specified HTML elements, attributes, and attribute values will occur in the output.
		$allowed_html_schema_tags = array( 'time' => array( 'class' => array(), 'datetime' => array(), 'itemprop' => array() ) );
		$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), $allowed_html_schema_tags );
		echo wp_kses( $html, $allowed_tags );
	}
	if( $udesign_options['udesign_single_view_postmetadata_location'] == 'alignbottom' ) {
		remove_action( 'udesign_single_post_entry_bottom', 'udesign_single_postmetadata' );
		add_action( 'udesign_single_post_entry_bottom', 'udesign_single_postmetadata_with_schema_tags' );
	} elseif( $udesign_options['udesign_single_view_postmetadata_location'] == 'aligntop' ) {
		remove_action( 'udesign_single_post_entry_top', 'udesign_single_postmetadata' );
		add_action( 'udesign_single_post_entry_top', 'udesign_single_postmetadata_with_schema_tags' );
	}
	
	
	/**
	 * Fix hatom-feed warnings in Structured Data for Pages.
	 * 
	 */
	function fix_hatom_warnings_in_pages() { 
		if ( is_page_template( 'page.php' ) || is_page_template( 'page-FullWidth.php' ) || is_page_template( 'page-Contact.php' ) ) :
			?>
			<div class="u-design-hatom-feed-entries">
				<span class="entry-title" itemprop="headline"><?php the_title(); ?></span>
				<span class="vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></span>
				<span class="date updated"><?php echo get_the_date(); ?></span>
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"></time>
				<time datetime="<?php echo get_the_modified_time( 'c' ); ?>" class="entry-date updated" itemprop="dateModified"></time>
			</div>
			<?php 
		endif;
	}
	add_action('udesign_entry_bottom', 'fix_hatom_warnings_in_pages');
	
	
	/**
	 * Add Schema.org tags to Page Titles.
	 * 
	 */
	function udesign_add_schema_to_post_titles( $udesign_page_title_html ) {
		$pattern = '/class\="(.*)pagetitle">/';
		$replacement = 'class="$1pagetitle entry-title" itemprop="headline">';
		return preg_replace( $pattern, $replacement, $udesign_page_title_html );
	}
	add_filter( 'udesign_get_page_title', 'udesign_add_schema_to_post_titles' );
	
	
	/**
	 * Add Schema.org tags to main content.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_main_content() {
		$schema_page_type = '';
		$schema_itemprop = 'mainContentOfPage';
		if ( is_page_template('page-Blog.php') || is_page_template('archive.php') || is_single() ) {
			$schema_itemprop = 'mainEntity';
			$schema_page_type = ' itemtype="https://schema.org/Blog" ';
		}
		echo '<div itemprop="' . $schema_itemprop . '" '.$schema_page_type.' itemscope="itemscope">';
	}
	function insert_closing_div_for_schema_tag_to_main_content() {
		echo '</div>';
	}
	add_action( 'udesign_main_content_top', 'insert_openning_div_for_schema_tag_to_main_content' );
	add_action( 'udesign_main_content_bottom', 'insert_closing_div_for_schema_tag_to_main_content' );
	
	
	/**
	 * Add Schema.org tags to the main header/top area.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_header() {
		echo '<div itemtype="https://schema.org/WPHeader" itemscope="itemscope">';
	}
	function insert_closing_div_for_schema_tag_to_header() {
		echo '</div>';
	}
	add_action( 'udesign_top_wrapper_top', 'insert_openning_div_for_schema_tag_to_header' );
	add_action( 'udesign_top_wrapper_bottom', 'insert_closing_div_for_schema_tag_to_header' );
	
	
	/**
	 * Add Schema.org tags to logo.
	 * 
	 */
	function udesign_add_schema_to_logo( $logo_html ) {
		$pattern = '/\<h1\>/';
		$replacement = '<h1 itemprop="headline">';
		return preg_replace( $pattern, $replacement, $logo_html );
	}
	add_filter( 'udesign_get_logo', 'udesign_add_schema_to_logo' );
	
	
	/**
	 * Add Schema.org tags to tagline/slogan.
	 * 
	 */
	function udesign_add_schema_to_slogan( $slogan_html ) {
		$pattern = '/\<div id\="slogan"/';
		$replacement = '<div id="slogan" itemprop="description" ';
		return preg_replace( $pattern, $replacement, $slogan_html );
	}
	add_filter( 'udesign_get_slogan', 'udesign_add_schema_to_slogan' );
	
	
	/**
	 * Add Schema.org tags to main menu.
	 * 
	 */
	function udesign_add_schema_to_main_menu( $main_menu_html ) {
		$pattern = '/\<nav id\="main-menu"/';
		$replacement = '<nav id="main-menu" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" ';
		$main_menu_html = preg_replace( $pattern, $replacement, $main_menu_html );

//		$pattern = '/\<a/';
//		$replacement = '<a itemprop="url"';
//		$main_menu_html = preg_replace( $pattern, $replacement, $main_menu_html );
//
//		$pattern = '/"\>\<span/';
//		$replacement = '"><span itemprop="name"';
//		$main_menu_html = preg_replace( $pattern, $replacement, $main_menu_html );

	    return $main_menu_html;
	}
	add_filter( 'udesign_get_top_main_menu', 'udesign_add_schema_to_main_menu' );
	
	
	/**
	 * Add Schema.org tags to single posts.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_single_post() {
		echo '<div itemtype="https://schema.org/BlogPosting" itemprop="blogPost" itemscope="itemscope">';
		echo '  <div itemprop="description articleBody">';
	}
	function insert_closing_div_for_schema_tag_to_single_post() {
		echo '  </div>';
		echo '</div>';
	}
	add_action( 'udesign_single_post_entry_before', 'insert_openning_div_for_schema_tag_to_single_post' );
	add_action( 'udesign_single_post_entry_after', 'insert_closing_div_for_schema_tag_to_single_post' );
	
	
	/**
	 * Add Schema.org tags to Blog and Archive page Posts.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_blog_post() {
		echo '<div itemtype="https://schema.org/BlogPosting" itemprop="blogPost" itemscope="itemscope">';
	}
	function insert_closing_div_for_schema_tag_to_blog_post() {
		echo '</div>';
	}
	add_action( 'udesign_blog_entry_before', 'insert_openning_div_for_schema_tag_to_blog_post' );
	add_action( 'udesign_blog_entry_after', 'insert_closing_div_for_schema_tag_to_blog_post' );
	
	
	/**
	 * Add Schema.org tags to Blog and Archive page Posts.
	 * 
	 */
	function insert_opening_schema_description_tag_to_blog_post() {
		echo '<div itemprop="description">';
	}
	function insert_closing_schema_description_tag_to_blog_post() {
		echo '</div>';
	}
	add_action( 'udesign_blog_post_content_before', 'insert_opening_schema_description_tag_to_blog_post', 15 );
	add_action( 'udesign_blog_entry_bottom', 'insert_closing_schema_description_tag_to_blog_post', 8 );
	
	
	/**
	 * Add Schema.org tags to post comments.
	 * 
	 */
	function udesign_add_schema_to_post_comments( $udesign_comment_template_html ) {
		$pattern = '/\<div class\="author"\>(.*)\<\/div\>/';
		$replacement = '<div class="author" itemscope="itemscope" itemprop="creator" itemtype="https://schema.org/Person"><span itemprop="name">$1</span></div>';
		$udesign_comment_template_html = preg_replace( $pattern, $replacement, $udesign_comment_template_html );
		
		$pattern = '/\<span class\="the-comment-time-and-date"\>/';
		$replacement = '<span class="the-comment-time-and-date" itemprop="commentTime" datetime="' . get_the_date( 'c' ) . '">';
		$udesign_comment_template_html = preg_replace( $pattern, $replacement, $udesign_comment_template_html );
		
		$pattern = '/\<div class\="commenttext"\>/';
		$replacement = '<div class="commenttext" itemprop="commentText">';
		$udesign_comment_template_html = preg_replace( $pattern, $replacement, $udesign_comment_template_html );
		
		return $udesign_comment_template_html;
	}
	add_filter( 'udesign_get_comment_template', 'udesign_add_schema_to_post_comments' );
	
	
	/**
	 * Add Schema.org tags to sidebars.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_blog_sidebar() {
		echo '<div itemtype="https://schema.org/WPSideBar" itemscope="itemscope">';
	}
	function insert_closing_div_for_schema_tag_to_blog_sidebar() {
		echo '</div>';
	}
	add_action( 'udesign_sidebar_top', 'insert_openning_div_for_schema_tag_to_blog_sidebar' );
	add_action( 'udesign_sidebar_bottom', 'insert_closing_div_for_schema_tag_to_blog_sidebar' );
	
	
	/**
	 * Add Schema.org tags to Footer.
	 * 
	 */
	function insert_openning_div_for_schema_tag_to_footer() {
		echo '<div itemtype="https://schema.org/WPFooter" itemscope="itemscope">';
	}
	function insert_closing_div_for_schema_tag_to_footer() {
		echo '</div>';
	}
	add_action( 'udesign_footer_inside', 'insert_openning_div_for_schema_tag_to_footer', 1 );
	add_action( 'udesign_footer_inside', 'insert_closing_div_for_schema_tag_to_footer', 99 );
	
}
add_action( 'after_setup_theme', 'run_after_udesign_theme_setup' );

