<?php
/*
Plugin Name: Simple Breadcrumb Navigation
Plugin URI: http://www.kriesi.at/archives/wordpress-plugin-simple-breadcrumb-navigation
Description: A simple and very lightweight breadcrumb navigation that covers nested pages and categories
Version: 1
Author: Christian "Kriesi" Budschedl
Author URI: http://www.kriesi.at/
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Simple_Breadcrumb {

	var $options;

	/**
	 * PHP5 constructor.
	 */
	public function __construct() {
		
		$this->options = array( // Change this array if you want another output scheme.
			'before'	=> '<span class="breadarrow"> ',
			'after'		=> ' </span>',
			'delimiter'	=> ( is_rtl() ) ? '&larr;' : '&rarr;'
		);
		
		$markup = $this->options['before'] . $this->options['delimiter'] . $this->options['after'];
		
		global $post;
		
		echo '<p class="breadcrumbs"><a href="' . home_url() . '">' . esc_html__( 'Home', 'u-design' ) . '</a>';
		
		if ( ! is_front_page() ) {
			echo wp_kses_post( $markup );
		}
		
		$output = $this->simple_breadcrumb_case( $post );
		
		if ( is_page() || is_single() ) {
			$output = get_the_title();
		}
		echo '<span class="current_crumb">' . $output . ' </span></p>';
		
	}
	
	/**
	 * PHP4 construction ( backward compatibility ).
	 */
	public function Simple_Breadcrumb() {
		
		// This will NOT invoked, unless a sub-class that extends `Simple_Breadcrumb` calls it. In that case, call the new-style constructor to keep compatibility.
		self::__construct();
		
	}

	function simple_breadcrumb_case( $der_post ) {
		
		global $post;
		
		$markup = $this->options['before'] . $this->options['delimiter'] . $this->options['after'];
		
		if ( is_page() ) {
			
			if( $der_post->post_parent ) {
				$my_query = get_post( $der_post->post_parent );			 
				$this->simple_breadcrumb_case( $my_query );
				$link = '<a href="';
				$link .= get_permalink( $my_query->ID );
				$link .= '">';
				$link .= '' . get_the_title( $my_query->ID ) . '</a>' . $markup;
				echo wp_kses_post( $link );
			}
			return;
			
		} elseif ( is_single() ) {
			
			$category = get_the_category();
			
			if ( is_attachment() ){
				
				$my_query = get_post( $der_post->post_parent );			 
				$category = get_the_category( $my_query->ID );
				if( $category != null ) {
					$ID = $category[0]->cat_ID;
					echo get_category_parents( $ID, true, $markup, false );
				}
				previous_post_link( "%link $markup" );
				
			} elseif ( get_post_type( $post ) == 'post' ) {
				
				$ID = $category[0]->cat_ID;
				get_category_parents_for_breadcrumbs( $ID, true, $markup, false );
				
			} else { // Custom types.
			
				// echo ucwords( get_post_type( $post ) ) . $markup;
				
			}
			return;
			
		} elseif ( is_category() ) {
			
			$category = get_the_category(); 
			$i = $category[0]->cat_ID;
			$parent = $category[0]-> category_parent;

			if( $parent > 0 && $category[0]->cat_name == single_cat_title( '', false ) ) {
			    echo get_category_parents( $parent, true, $markup, false );
			}
			
			return single_cat_title('',false);
			
		} elseif ( is_tax() ) { // Taxonomy.

			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo sanitize_title( $term->name );

		} elseif ( is_author() ) {
			
			$curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
			return esc_html__( 'Author: ', 'u-design' ).$curauth->nickname;
			
		} elseif ( is_tag() ) {
			
			return esc_html__( 'Tag: ', 'u-design' ) . single_tag_title( '', false );
			
		} elseif ( is_404() ) {
			
			return esc_html__( '404 - Page not Found', 'u-design' );
			
		} elseif ( is_search() ) {
			
			return esc_html__( 'Search', 'u-design' );
			
		} elseif ( is_year() ) {
			
			return get_the_time( 'Y' );
			
		} elseif ( is_month() ) {
			
			$k_year = get_the_time( 'Y' );
			echo "<a href='" . get_year_link( $k_year ) . "'>" . $k_year . "</a>" . $markup;
			return get_the_time( 'F' );
			
		} elseif ( is_day() || is_time() ) {
			
			$k_year = get_the_time( 'Y' );
			$k_month = get_the_time( 'm' );
			$k_month_display = get_the_time( 'F' );
			echo "<a href='" . get_year_link( $k_year ) . "'>" . $k_year . "</a>" . $markup;
			echo "<a href='" . get_month_link( $k_year, $k_month ) . "'>" . $k_month_display . "</a>" . $markup;
			return get_the_time( 'jS (l)' );
			
		}
		
	}
	
}

