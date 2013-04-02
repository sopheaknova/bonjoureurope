<?php

/* ---------------------------------------------------------------------- */
/*	Show language list on header
/* ---------------------------------------------------------------------- */
if( !function_exists('languages_list_header')) {
	
	function languages_list_header(){
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			echo '<div class="language"><ul>';
			foreach($languages as $l){
				echo '<li class="'.$l['language_code'].'">';
				
				if(!$l['active']) echo '<a href="'.$l['url'].'">';
				echo $l['native_name'];
				if(!$l['active']) echo '</a>';
				
				echo '</li>';
			}
			echo '</ul></div>';
		}
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Show main and footer navigation
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_main_navigation')) {

	function sp_main_navigation() {
		
		// set default main menu if wp_nav_menu not active
		if ( function_exists ( 'wp_nav_menu' ) )
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'	 => 'menu-nav',
				'theme_location' => 'primary_nav',
				'fallback_cb' => 'sp_main_nav_fallback'
				) );
		else
			sp_main_nav_fallback();	
	}
}

if (!function_exists('sp_main_nav_fallback')) {
	
	function sp_main_nav_fallback() {
    	
		$menu_html .= '<ul class="menu-nav">';
		$menu_html .= '<li><a href="'.admin_url('nav-menus.php').'">'.esc_html__('Add Main menu', 'sptheme').'</a></li>';
		$menu_html .= '</ul>';
		echo $menu_html;
		
	}
	
}

if (!function_exists('sp_footer_navigation')){
	
	function sp_footer_navigation() {
		
		// set default main menu if wp_nav_menu not active
		if ( function_exists ( 'wp_nav_menu' ) )
			wp_nav_menu( array(
				'container'      => false,
				'menu_class'	 => 'footer-nav',
				'after'		 	 => ' |',
				'theme_location' => 'footer_nav',
				'fallback_cb'	 => 'sp_footer_nav_fallback'
				));	
		else
			sp_footer_nav_fallback();	
	}
}

if (!function_exists('sp_footer_nav_fallback')) {
	
	function sp_footer_nav_fallback() {
    	
		$menu_html .= '<ul class="footer-nav">';
		$menu_html .= '<li><a href="'.admin_url('nav-menus.php').'">'.esc_html__('Add Footer menu', 'sptheme').'</a></li>';
		$menu_html .= '</ul>';
		echo $menu_html;
		
	}
	
}

/* ---------------------------------------------------------------------- */
/*	Get Custom Field
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_get_custom_field') ) {
	
	function sp_get_custom_field( $key, $post_id = null) {
		
		global $wp_query;
		
		$post_id = $post_id ? $post_id : $wp_query->get_queried_object()->ID;
		
		return get_post_meta( $post_id, $key, true );
	}
}

/* ---------------------------------------------------------------------- */
/*	Check page layout
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_check_page_layout') ) {

	function sp_check_page_layout( $single_project = null, $portfolio_category = null ) {

		$page_layout = sp_get_custom_field('sp_page_layout');

		/*if( $single_project )
			$page_layout = sp_get_custom_field('sp_project_page_layout');

		if( $portfolio_category )
			$page_layout = sp_get_custom_field( 'sp_page_layout', of_get_option('sp_portfolio_parent') );

		$site_structure = of_get_option('sp_site_structure');*/

		//if( ( $page_layout == '2cl' || $page_layout == '2cr' ) || ( $page_layout != '1col' && ( $site_structure == '2cl' || $site_structure == '2cr' ) ) )
		if( ( $page_layout == '2cl' || $page_layout == '2cr' || $page_layout == '3col' ) )
			return true;
			
		//if( ( $page_layout == '3col' ) )
			//return $page_layout;	

		return false;

	}
	
}

/* ---------------------------------------------------------------------- */
/*	Check sidebar position
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_check_sidebar_position') ) {

	function sp_check_sidebar_position( $single_project = null, $portfolio_category = null ) {

		$page_layout = sp_get_custom_field('sp_page_layout');

		/*if( $single_project )
			$page_layout = sp_get_custom_field('sp_project_page_layout');

		if( $portfolio_category )
			$page_layout = sp_get_custom_field( 'sp_page_layout', of_get_option('sp_portfolio_parent') );

		$site_structure = of_get_option('sp_site_structure');

		if( $page_layout == '2cl' || ( $page_layout == '' && $site_structure == '2cl' ) )*/
		if( $page_layout == '2cl' )
			return 'sidebar-left';	

		return null;

	}
	
}

/* ---------------------------------------------------------------------- */
/*	Get post thumbnail data
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_get_the_post_thumbnail_data') ) {

	function sp_get_the_post_thumbnail_data( $post_id = 0 ) {	

		if( $post_id == 0 )
			return $post_id;

		if( !get_the_post_thumbnail( $post_id ) )
			return null;

		$objDom = new SimpleXMLElement( get_the_post_thumbnail( $post_id ) );
		$arrDom = (array)$objDom;

		return (array)$arrDom['@attributes'];

	}

}

/* ---------------------------------------------------------------------- */
/*	Blog navigation
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_pagination') ) {

	function sp_pagination( $pages = '', $range = 2 ) {

		$showitems = ( $range * 2 ) + 1;

		global $paged, $wp_query;

		if( empty( $paged ) )
			$paged = 1;

		if( $pages == '' ) {

			$pages = $wp_query->max_num_pages;

			if( !$pages )
				$pages = 1;

		}

		if( 1 != $pages ) {

			$output = '<nav class="pagination">';

			// if( $paged > 2 && $paged >= $range + 1 /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( 1 ) . '" class="next">&laquo; ' . __('First', 'sptheme') . '</a>';

			if( $paged > 1 /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="next">&larr; ' . __('Previous', 'sptheme') . '</a>';

			for ( $i = 1; $i <= $pages; $i++ )  {

				if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) )
					$output .= ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '">' . $i . '</a>';

			}

			if ( $paged < $pages /*&& $showitems < $pages*/ )
				$output .= '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="prev">' . __('Next', 'sptheme') . ' &rarr;</a>';

			// if ( $paged < $pages - 1 && $paged + $range - 1 <= $pages /*&& $showitems < $pages*/ )
				// $output .= '<a href="' . get_pagenum_link( $pages ) . '" class="prev">' . __('Last', 'sptheme') . ' &raquo;</a>';

			$output .= '</nav>';

			return $output;

		}

	}

}

/* ---------------------------------------------------------------------- */
/*	Show the post content
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_post_content')) {

	function sp_post_content() {

		global $post, $user_ID;

		get_currentuserinfo();

		if ( is_singular() ) {

			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );

			$output = $content;

			$output .= wp_link_pages( array( 'echo' => false ) );

		} else {
			$output = '<p>' . sp_excerpt_length(20) . '</p>';	
			//$output = '<p>' . sp_excerpt_string_length(350) . '</p>';
			$output .= '<a href="'.get_permalink().'" class="learn-more button">' . __( 'Read more »', 'sptheme' ) . '</a>';
		}
		
		return $output;

	}

}

/* ---------------------------------------------------------------------- */
/*	Show the post meta (permalink, date, tags, categories & comments)
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_post_meta')) {

	function sp_post_meta() {

		global $post;
		
		$output = '<span>' . __('By: ', 'sptheme') . '</span>';
		$output .= '<span class="title">' . get_the_author() . ' &mdash; </span>';
		$output .= sp_posted_on() . ' &mdash; ';
		$output .= '<span class="post-categories">' . __(' in: ', 'sptheme') . ' ' . get_the_category_list(', ') . '</span>';
		
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	The current post—date/time
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_posted_on')) {

	function sp_posted_on() {

		return sprintf( __( '<time datetime="%1$s" pubdate>%2$s</time>', 'sptheme' ),
			esc_attr( get_the_date('c') ),
			esc_html( get_the_date('M d Y') )
		);

	}

}

/* ---------------------------------------------------------------------- */
/*	Get Post image
/* ---------------------------------------------------------------------- */

if( !function_exists('sp_post_image')) {

	function sp_post_image($size = 'thumbnail'){
		global $post;
		$image = '';
		
		//get the post thumbnail;
		$image_id = get_post_thumbnail_id($post->ID);
		$image = wp_get_attachment_image_src($image_id, $size);
		$image = $image[0];
		if ($image) return $image;
		
		//if the post is video post and haven't a feutre image
		$post_type = get_post_format($post->ID);
		$vtype = sp_get_custom_field( 'sp_video_type', $post->ID );
		$vId = get_post_meta($post->ID, 'sp_video_id', true);

		if($post_type == 'video') {
						if($vtype == 'youtube') {
						  $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
						} elseif ($vtype == 'vimeo') {
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
						  $image = $hash[0]['thumbnail_large'];
						} elseif ($vtype == 'daily') {
						  $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
						}
				}
						
		if ($image) return $image;
		//If there is still no image, get the first image from the post
		return sp_get_first_image();
	}
		

}

/* ---------------------------------------------------------------------- */
/*	Get first image in post
/* ---------------------------------------------------------------------- */
if( !function_exists('sp_get_first_image')) {
	
	function sp_get_first_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches[1][0];
		
		return $first_img;
	}
}

/* ---------------------------------------------------------------------- */
/*	Show Event mata (Neat event, Start and End date)
/* ---------------------------------------------------------------------- */
if( !function_exists('sp_events_meta')) {

	function sp_events_meta() {

		global $post;
		
		$neat_event = sp_get_custom_field( 'sp_neat_event', $post->ID );
		$start_date = explode('-', sp_get_custom_field( 'sp_event_start_date', $post->ID ));
		$end_date = explode('-', sp_get_custom_field( 'sp_event_end_date', $post->ID ));
		
		if ( $start_date[1] == $end_date[1] ) {
			$output = '<span>' . __( 'From ', 'sptheme' ) . $start_date[0]  . '</span>';			
		} else {
			$output = '<span>' . __( 'From ', 'sptheme' ) . $start_date[0] . ' ' . sp_event_month_kh( $start_date[1] ) . '</span>';
		}
		
		if ( $neat_event ) {
			if ( !empty($end_date) )
				$output .= ' <span>' . __( ' To ', 'sptheme' ) . $end_date[0] . ' ' . sp_event_month_kh( $end_date[1] ). '</span>';
		}
		
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	Show Month of Event into string translation
/* ---------------------------------------------------------------------- */
if( !function_exists('sp_event_month_kh')) {

	function sp_event_month_kh($month) {
		
		switch ($month) {
			case 'Jan':
				$output = __( 'January', 'sptheme' );	
				break;
				
			case 'Feb':	
				$output = __( 'February', 'sptheme' );
				break;
				
			case 'Mar':	
				$output = __( 'Mar', 'sptheme' );
				break;
				
			case 'Apr':	
				$output = __( 'April', 'sptheme' );
				break;
			
			case 'May':
				$output = __( 'May', 'sptheme' );	
				break;
				
			case 'Jun':	
				$output = __( 'June', 'sptheme' );
				break;
				
			case 'Jul':	
				$output = __( 'July', 'sptheme' );
				break;
				
			case 'Aug':	
				$output = __( 'August', 'sptheme' );
				break;
			
			case 'Sep':
				$output = __( 'September', 'sptheme' );	
				break;
				
			case 'Oct':	
				$output = __( 'October', 'sptheme' );
				break;
				
			case 'Nov':	
				$output = __( 'November', 'sptheme' );
				break;
				
			case 'Dec':	
				$output = __( 'December', 'sptheme' );
				break;					
		}
		
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	View post by events type (Event in France or Europe)
/* ---------------------------------------------------------------------- */
if( !function_exists('sp_get_events')) {
	
	function sp_get_events( $posts_per_page = 1, $meta_key= 'Jan', $orderby = 'none', $event_type = null ) {
		$args = array(
			'posts_per_page' => (int) $posts_per_page,
			'post_type' => 'events',
			'tax_query' => array(
				array(
					'taxonomy' => 'events-categories',
					'field' => 'id',
					'terms' => $event_type
				)
			),
			'meta_query' => array(
				array(
					'key' => 'sp_event_start_date',
					'value' => $meta_key,
					'compare' => 'LIKE'
				)
			),
			'orderby' => $orderby,
			'paged' => $paged,
		);
		
		$output = '';
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts($args);
		if ( have_posts() ) {
	
			while ( have_posts() ) : the_post();
			
			
	 		$output .= '<div class="event-items">';
			$output .= '<h3 class="name"><a href="'.get_permalink().'">' . get_the_title() .'</a></h3>';
			$output .= '<div class="entry-meta">' . sp_events_meta() . '</div>';
			
			if ( sp_post_image() ) {
				$thumb = sp_post_image('large');
				$img_thumb = aq_resize( $thumb, 386, 250, true );
				if ($img_thumb) {
				$output .= '<a href="'.get_permalink().'"><img src="' . $img_thumb . '" class="alignnone" /></a>';
				} else {
				$output .= '<img src="' . SP_BASE_URL . 'images/blank-pagelist-photo.gif" width="386" height="250" alt="Blank photo" class="alignnone" />';	
				}
			}
			
			$output .= '<p>' . sp_excerpt_length(10) . '</p>';
			$output .= '<a href="'.get_permalink().'" class="learn-more button">' . __( 'Read more »', 'sptheme' ) . '</a>';
			$output .= '</div>';   
			endwhile;
			
			// Pagination
			if(function_exists('wp_pagenavi'))
				$output .= wp_pagenavi();
			else 
				$output .= sp_pagination(); 
			
			wp_reset_query();
			
		}
		
		return $output;
	}

}

/* ---------------------------------------------------------------------- */
/*	VideoJS Flash fallback url
/* ---------------------------------------------------------------------- */

if ( !function_exists('sp_videojs_fallback') ) {

	function sp_videojs_fallback() {
		?>

<script>
_V_.options.flash.swf = '<?php echo SP_BASE_URL; ?>js/video-js.swf';
</script>

		<?php

	}

}
add_action('wp_head', 'sp_videojs_fallback');


/* ---------------------------------------------------------------------- */
/*	Breadcrumb
/* ---------------------------------------------------------------------- */
if ( !function_exists('sp_breadcrumb') ) {
	
	function sp_breadcrumb() {
	
	global $data;
		
	 if( $data['disable_breadcrum'] == 'no' ) {
	  $delimiter = "<span class='delimiter'>&raquo;</span>";
	  $home = __('Home', 'sptheme'); // text for the 'Home' link
	  $before = '<span class="current">'; // tag before the current crumb
	  $after = '</span>'; // tag after the current crumb
	 
	  if ( !is_home() && !is_front_page() || is_paged() ) {
	 
		echo '<div id="crumbs">';
	 
		global $post;
		$homeLink = home_url();
		echo __('You Are Here: ', 'sptheme') . '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
		if ( is_category() ) {
		  global $wp_query;
		  $cat_obj = $wp_query->get_queried_object();
		  $thisCat = $cat_obj->term_id;
		  $thisCat = get_category($thisCat);
		  $parentCat = get_category($thisCat->parent);
		  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		  echo $before . '' . single_cat_title('', false) . '' . $after;
	 
		} elseif ( is_day() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('d') . $after;
	 
		} elseif ( is_month() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('F') . $after;
	 
		} elseif ( is_year() ) {
		  echo $before . get_the_time('Y') . $after;
	 
		} elseif ( is_single() && !is_attachment() ) {
		  if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		  } else {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo $before . get_the_title() . $after;
		  }
	 
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
		  $post_type = get_post_type_object(get_post_type());
		  echo $before . $post_type->labels->singular_name . $after;
	 
		} elseif ( is_attachment() ) {
		  $parent = get_post($post->post_parent);
		  $cat = get_the_category($parent->ID); $cat = $cat[0];
		  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		  echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_page() && !$post->post_parent ) {
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_page() && $post->post_parent ) {
		  $parent_id  = $post->post_parent;
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_search() ) {
		  echo $before . __('Search results for ', 'sptheme') . '"' . get_search_query() . '"' . $after;
	 
		} elseif ( is_tag() ) {
		  echo $before . __('Posts tagged ', 'sptheme') . '"' . single_tag_title('', false) . '"' . $after;
	 
		} elseif ( is_author() ) {
		   global $author;
		  $userdata = get_userdata($author);
		  echo $before . __('Articles posted by ', 'sptheme') . $userdata->display_name . $after;
	 
		} elseif ( is_404() ) {
		  echo $before . __('Error 404 ', 'sptheme') . $after;
		}
	 
		if ( get_query_var('paged') ) {
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo __(' &mdash; Page', 'sptheme') . ' ' . get_query_var('paged');
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
	 
		echo '</div>';
	 
	  }
	 }
	} // end breadcrumbs
	
}