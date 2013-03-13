<?php

/* ---------------------------------------------------------------------- */
/*	General
/* ---------------------------------------------------------------------- */

	/* -------------------------------------------------- */
	/*	Divider
	/* -------------------------------------------------- */

	function sp_divider_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' => ''
		), $atts ) );

		return '<hr class="' . esc_attr( $style ) . '" />';
	
	}
	add_shortcode('divider', 'sp_divider_sc');
	
	/* -------------------------------------------------- */
	/*	Slogan
	/* -------------------------------------------------- */

	function sp_slogan_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'align' => ''
		), $atts ) );

		return '<h1 class="slogan ' . ( $align ? 'align-' . esc_attr( $align ) : '' )  . '">' . do_shortcode( $content ) . '</h1>';
	
	}
	add_shortcode('slogan', 'sp_slogan_sc');
	
	/* -------------------------------------------------- */
	/*	Button
	/* -------------------------------------------------- */

	function sp_button_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'url'   => '',
			'size'  => '',
			'style' => '',
			'arrow' => ''
		), $atts ) );

		$output = '<a class="button ' . esc_attr( $size ) . ' ' . esc_attr( $style ) . '" href="' . esc_attr( $url ) . '">';

		if( $arrow && $arrow == 'left' )
			$output .= '<span class="arrow ' . esc_attr( $arrow ) . '">&laquo;</span> ';

		$output .= $content;

		if( $arrow && $arrow == 'right' )
			$output .= ' <span class="arrow">&raquo;</span>';

		$output .= '</a>';

		return $output;
	
	}
	add_shortcode('button', 'sp_button_sc');
	
	/* -------------------------------------------------- */
	/*	Dropcap
	/* -------------------------------------------------- */

	function sp_dropcap_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' => ''
		), $atts ) );

		return '<span class="dropcap ' . esc_attr( $style ) . '">' . $content . '</span>';

	}
	add_shortcode('dropcap', 'sp_dropcap_sc');

	/* -------------------------------------------------- */
	/*	Info box
	/* -------------------------------------------------- */

	function sp_infobox_sc( $atts, $content = null ) {

		return '<div class="infobox">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('infobox', 'sp_infobox_sc');

	/* -------------------------------------------------- */
	/*	List
	/* -------------------------------------------------- */

	function sp_list_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon'  => '',
			'style' => ''
		), $atts ) );

		return '<div class="' . esc_attr( $icon ) . ' ' . esc_attr( $style ) . '">' . $content . '</div>';

	}
	add_shortcode('list', 'sp_list_sc');

	/* -------------------------------------------------- */
	/*	Quote
	/* -------------------------------------------------- */

	function sp_quote_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'author' => '',
			'type'   => ''
		), $atts ) );

		$output = '<blockquote class="' . esc_attr( $type ) . '">';

		$output .= '<p>' . $content . '</p>';

		if( $author )
			$output .= '<small>' . esc_attr( $author ) . '</small>';

		$output .= '</blockquote>';

		return $output;

	}
	add_shortcode('quote', 'sp_quote_sc');
	
	/* -------------------------------------------------- */
	/*	Lightbox
	/* -------------------------------------------------- */

	function sp_lightbox_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'type'  => 'single-image',
			'full'  => '',
			'title' => '',
			'group' => ''
		), $atts ) );

		return '<a class="' . esc_attr( $type ) . '" href="' . esc_attr( $full ) . '" title="' . esc_attr( $title ) . '" rel="' . esc_attr( $group ) . '"> ' . $content . ' </a>';
	
	}
	add_shortcode('lightbox', 'sp_lightbox_sc');
	
	/* -------------------------------------------------- */
	/*	Toggle Content
	/* -------------------------------------------------- */
	function sp_framework_toggle_content_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'      => ''
		), $atts ) );
		
		$output = '<div class="toggle-wrap">';
		$output .= '<span class="trigger"><a href="#">'  . esc_attr( $title ) .  '</a></span><div class="toggle-container">';
		$output .= $content;  
		$output .= '</div></div>';

		return $output;
	
	}
	add_shortcode('toggle_content', 'sp_framework_toggle_content_sc');
	
	/* -------------------------------------------------- */
	/*	Accordion Content
	/* -------------------------------------------------- */

	function sp_framework_accordion_content_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'      => '',
			'title_size' => 'div'
		), $atts ) );

		return '<' . esc_attr( $title_size ) . ' class="acc-trigger"><a href="#">' . esc_attr( $title ) . '</a></' . esc_attr( $title_size ) . '><div class="acc-container"><div class="content">' . do_shortcode( $content ) . '</div></div>';
	
	}
	add_shortcode('accordion_content', 'sp_framework_accordion_content_sc');

	/* -------------------------------------------------- */
	/*	Content Tabs
	/* -------------------------------------------------- */

	// Tabs container
	function sp_content_tabgroup_sc( $atts, $content = null ) {

		if( !$GLOBALS['tabs_groups'] )
			$GLOBALS['tabs_groups'] = 0;
			
		$GLOBALS['tabs_groups']++;

		$GLOBALS['tab_count'] = 0;

		$tabs_count = 1;

		do_shortcode( $content );

		if( is_array( $GLOBALS['tabs'] ) ) {

			foreach( $GLOBALS['tabs'] as $tab ) {

				$tabs[] = '<li><a href="#tab-' . $GLOBALS['tabs_groups'] . '-' . $tabs_count . '">' . $tab['title'] . '</a></li>';
				$panes[] = '<div id="tab-' . $GLOBALS['tabs_groups'] . '-' . $tabs_count++ . '" class="tab-content">' . do_shortcode( $tab['content'] ) . '</div>';

			}

			$return = "\n". '<ul class="tabs-nav">' . implode( "\n", $tabs ) . '</ul>' . "\n" . '<div class="tabs-container">' . implode( "\n", $panes ) . '</div>' . "\n";
		}

		return $return;

	}
	add_shortcode('tabgroup', 'sp_content_tabgroup_sc');

	// Single tab
	function sp_content_tab_sc( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' => ''
		), $atts) );

		$i = $GLOBALS['tab_count'];

		$GLOBALS['tabs'][$i] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => $content );

		$GLOBALS['tab_count']++;

	}
	add_shortcode('tab', 'sp_content_tab_sc');

/* ---------------------------------------------------------------------- */
/*	HTML5 Video
/* ---------------------------------------------------------------------- */
function sp_video_sc( $atts ) {

	extract( shortcode_atts( array(
		'mp4'          => '',
		'webm'         => '',
		'ogg'          => '',
		'track'        => '',
		'poster'       => '',
		'aspect_ratio' => '1.7',
		'preload'      => false,
		'autoplay'     => false,
	), $atts ) );

	global $post;

	if ( $mp4 )
		$mp4 = '<source src="' . $mp4 . '" type="video/mp4" />';

	if ( $webm )
		$webm = '<source src="' . $webm . '" type="video/webm" />';

	if ( $ogg )
		$ogg = '<source src="' . $ogg . '" type="video/ogg" />';

	if ( $track)
		$track = '<track kind="subtitles" src="' . $track . '" srclang="en" label="English">';

	if ( $poster)
		$poster = ' poster="' . $poster . '"';

	if ( $preload )
		$preload = 'preload="' . $preload . '"';

	if ( $autoplay )
		$autoplay = 'autoplay';
		
	$output = "<video id='video-js-id-$post->ID' class='video-js vjs-default-skin' width='700' height='405' controls {$preload} {$autoplay} {$poster} data-setup='{}' data-aspect-ratio='{$aspect_ratio}'>
			{$mp4}
			{$webm}
			{$ogg}
			{$track}
		</video>";
	return $output;	

}
add_shortcode('video', 'sp_video_sc');

/* ---------------------------------------------------------------------- */
/*	Video Youtube 
/* ---------------------------------------------------------------------- */
function sp_video_youtube_sc( $atts ) {

	extract( shortcode_atts( array(
		'id'          => '',
	), $atts ) );

	global $post;

	$output = '<div class="entry-video">';
	$output .= '<iframe width="600" height="338" src="http://www.youtube.com/embed/'.$id.'?rel=0" frameborder="0" allowfullscreen></iframe>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('video_youtube', 'sp_video_youtube_sc');
	
/* ---------------------------------------------------------------------- */
/*	HTML5 Audio
/* ---------------------------------------------------------------------- */
function sp_audio_sc( $atts ) {

	extract( shortcode_atts( array(
		'mp3'      => '',
		'ogg'      => '',
		'width'    => '',
		'height'   => '',
		'preload'  => false,
		'autoplay' => false,
	), $atts ) );

	global $post;

	if ( $mp3 )
		$mp3 = '<source src="' . $mp3 . '" type="audio/mp3" />';

	if ( $ogg )
		$ogg = '<source src="' . $ogg . '" type="audio/ogg" />';

	if ( $preload )
		$preload = 'preload="' . $preload . '"';

	if ( $autoplay )
		$autoplay = 'autoplay';

	$output = "<audio id='AudioPlayerV1-id-$post->ID' class='AudioPlayerV1' width='100%' height='29' controls {$preload} {$autoplay}  data-fallback='" . SP_BASE_URL . "js/audioplayerv1.swf'>
					{$mp3}
					{$ogg}
				</audio>";

	return $output;

}
add_shortcode('audio', 'sp_audio_sc');
	
/* ---------------------------------------------------------------------- */
/*	Alert Boxes
/* ---------------------------------------------------------------------- */

	/* -------------------------------------------------- */
	/*	Error
	/* -------------------------------------------------- */

	function sp_error_sc( $atts, $content = null ) {

		return '<p class="error">' . $content . '</p>';

	}
	add_shortcode('error', 'sp_error_sc');

	/* -------------------------------------------------- */
	/*	Success
	/* -------------------------------------------------- */

	function sp_success_sc( $atts, $content = null ) {

		return '<p class="success">' . $content . '</p>';

	}
	add_shortcode('success', 'sp_success_sc');

	/* -------------------------------------------------- */
	/*	Info
	/* -------------------------------------------------- */

	function sp_info_sc( $atts, $content = null ) {

		return '<p class="info">' . $content . '</p>';

	}
	add_shortcode('info', 'sp_info_sc');

	/* -------------------------------------------------- */
	/*	Notice
	/* -------------------------------------------------- */

	function sp_notice_sc( $atts, $content = null ) {

		return '<p class="notice">' . $content . '</p>';

	}
	add_shortcode('notice', 'sp_notice_sc');
	
/* ---------------------------------------------------------------------- */
/*	Columns
/* ---------------------------------------------------------------------- */

	/* -------------------------------------------------- */
	/*	One half
	/* -------------------------------------------------- */

	function sp_one_half_sc( $atts, $content = null ) {

		return '<div class="one_half">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_half', 'sp_one_half_sc');

	/* -------------------------------------------------- */
	/*	One half last
	/* -------------------------------------------------- */

	function sp_one_half_last_sc( $atts, $content = null ) {

		return '<div class="one_half last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_half_last', 'sp_one_half_last_sc');

	/* -------------------------------------------------- */
	/*	One third
	/* -------------------------------------------------- */

	function sp_one_third_sc( $atts, $content = null ) {

		return '<div class="one_third">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_third', 'sp_one_third_sc');

	/* -------------------------------------------------- */
	/*	One third last
	/* -------------------------------------------------- */

	function sp_one_third_last_sc( $atts, $content = null ) {

		return '<div class="one_third last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_third_last', 'sp_one_third_last_sc');

	/* -------------------------------------------------- */
	/*	One fourth
	/* -------------------------------------------------- */

	function sp_one_fourth_sc( $atts, $content = null ) {

		return '<div class="one_fourth">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('one_fourth', 'sp_one_fourth_sc');

	/* -------------------------------------------------- */
	/*	One fourth last
	/* -------------------------------------------------- */

	function sp_one_fourth_last_sc( $atts, $content = null ) {

		return '<div class="one_fourth last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('one_fourth_last', 'sp_one_fourth_last_sc');

	/* -------------------------------------------------- */
	/*	Two third
	/* -------------------------------------------------- */

	function sp_two_third_sc( $atts, $content = null ) {

		return '<div class="two_third">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('two_third', 'sp_two_third_sc');

	/* -------------------------------------------------- */
	/*	Two third last
	/* -------------------------------------------------- */

	function sp_two_third_last_sc( $atts, $content = null ) {

		return '<div class="two_third last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('two_third_last', 'sp_two_third_last_sc');

	/* -------------------------------------------------- */
	/*	Three fourth
	/* -------------------------------------------------- */

	function sp_three_four_sc( $atts, $content = null ) {

		return '<div class="three_fourth">' . do_shortcode( $content ) . '</div>';

	}
	add_shortcode('three_fourth', 'sp_three_four_sc');

	/* -------------------------------------------------- */
	/*	Three fourth last
	/* -------------------------------------------------- */

	function sp_three_fourth_last_sc( $atts, $content = null ) {

		return '<div class="three_fourth last">' . do_shortcode( $content ) . '</div><div class="clear"></div>';

	}
	add_shortcode('three_fourth_last', 'sp_three_fourth_last_sc');
	

/* ---------------------------------------------------------------------- */
/*	Template Tags
/* ---------------------------------------------------------------------- */
	
	/* -------------------------------------------------- */
	/*	Portfolio
	/* -------------------------------------------------- */

	function sp_portfolio_sc( $atts ) {

		$atts = extract( shortcode_atts( array(
			'columns'    => 'one-fourth',
			'limit'      => -1,
			'categories' => ''
		), $atts ) );

		global $post;
		$output = '';
		$last_project = 1;

		$args = array('post_type'      => 'portfolio',
					  'posts_per_page' => esc_attr( $limit ),
					  'order'          => 'DESC',
					  'orderby'        => 'date',
					  'post_status'    => 'publish'
				  );
		
		if( $categories ) {
		
			$categories = explode( ',', $categories );
			
			foreach ( $categories as $i => $category ) {
				
				$category_slugs[$i] .= get_term( $category, 'portfolio-categories' )->slug;

			}
			
			$categories = implode( ',', $category_slugs );
			
			$args = array_merge( $args, array( 'portfolio-categories' => esc_attr( $categories ) ) );
		
		}
			
		query_posts( $args );

		if( have_posts() ) :

			$output .= '<section id="portfolio-items" class="clearfix">';

			$lightbox_class = null;


			while ( have_posts() ) : the_post();

				// Remove any old data
				$data_categories = null;
				$category_names = null;

				$categories = get_the_terms( $post->ID, 'portfolio-categories' );

				if( $categories ) {

					foreach ( $categories as $category ) {
						
						$data_categories .= $category->slug . ' ';
						
						$category_names .= $category->slug . ' / ';

					}

				}
				
				if (($last_project % esc_attr( $limit )) == 0) 
					$last_class = 'last';

				$post_thumbnail_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-' . esc_attr( $columns ) );
				$post_thumbnail_data = sp_get_the_post_thumbnail_data( $post->ID );
				$permalink = $post_thumbnail_data['src'];

				$output .= '<article class="' . esc_attr( $columns ) . ' ' . $last_class . '" data-categories="' . trim( $data_categories ) . '">';
					
					if( $post_thumbnail_img ) {
						$output .= '<a href="' . $permalink . '" title="' . get_the_title() . '"' . $lightbox_class . '>';
						$output .= '<img src="' . $post_thumbnail_img[0] . '" alt="' . $post_thumbnail_data['alt'] . '" title="' . $post_thumbnail_data['title'] . '" class="' . $post_thumbnail_data['class'] . '">';
						$output .= '</a>';
					}

				$output .= '<a href="' . get_permalink() . '" class="project-meta">';
				$output .= '<h5 class="title">' . get_the_title()  . '</h5>';
				$output .= '<span class="categories">' . substr( trim( $category_names ), 0, -2 ) . '</span>';
				$output .= '</a>';
				$output .= '</article><!-- end project -->';
				
				$last_project++;
				
			endwhile;
			wp_reset_query();
			
			$output .= '</section><!-- end #portfolio-items -->';

		endif;

		return $output;

	}
	add_shortcode('portfolio', 'sp_portfolio_sc');
	
	/* -------------------------------------------------- */
	/*	 Post list base on category
	/* -------------------------------------------------- */
	function sp_postlist_sc( $atts ){
		global $post;
		
		extract(shortcode_atts(array(
			'category' => '',
			'num' => ''
		),$atts));	
		
		$output = '';
		$category_link = get_category_link( $category );
		
		$args = array(
						'cat' 				=> $category,
						'posts_per_page' 	=> $num
				  );
		query_posts( $args );	
		
		if( have_posts() ) while ( have_posts() ) : the_post();
		
		$format = get_post_format();
		
		$post_thumb = get_post_thumbnail_id( $post->ID );
		$image_src = wp_get_attachment_image_src($post_thumb, 'large');
		$image = aq_resize( $image_src[0], 267, 175, true ); //resize & crop the image
		
		$output .= '<div class="pagelist-items">';
		
		if ( ( function_exists( 'get_post_format' ) && 'audio' == get_post_format( $post->ID ) )  ) :
		
		$output .= do_shortcode( sp_get_custom_field( 'sp_audio_external', $post->ID ) );
		
		else:
		
		$output .= '<div class="one_third">';
		
		if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $post->ID ) )  ) : 
		$output .= '<a href="'.get_permalink().'">';
		$output .= '<img src="http://img.youtube.com/vi/' . sp_get_custom_field( 'sp_video_id', $post->ID ) . '/0.jpg" width="267" height="175" class="alignnone" />';
		$output .= '</a>';
		else:
			if ($image) {
			$output .= '<a href="'.get_permalink().'"><img src="' . $image . '" class="alignnone" /></a>';
			} else {
			$output .= '<img src="' . SP_BASE_URL . 'images/blank-pagelist-photo.gif" alt="Blank photo" class="alignnone" />';
			}
		endif;
		
		$output .= '</div>';
		
		$output .= '<div class="two_third last">';
		$output .= '<h3 class="name"><a href="'.get_permalink().'">' . get_the_title() .'</a></h3>';

		$output .= '<p>' . sp_excerpt_length(40) . '</p>';
		$output .= '<a href="'.get_permalink().'" class="learn-more button">' . __( 'Learn more »', 'sptheme' ) . '</a>';
		
		$output .= '</div>';
		$output .= '<div class="clear"></div>';
		
		endif; // end if audio post
		
		$output .= '</div>';
		
		endwhile;

		wp_reset_query();
		
		$output .= '<a href="'.esc_url( $category_link ).'" class="learn-more button">' . __('See more ', 'sptheme') . get_the_title($post->ID) .'</a>';

		return $output;	  	  
	}
	add_shortcode('postlist', 'sp_postlist_sc');
		
	
	/* -------------------------------------------------- */
	/*	 Child pages list base on parent page
	/* -------------------------------------------------- */	
	function sp_pagelist_sc( $atts ){
		global $post;
		
		extract(shortcode_atts(array(
			"page_id" => ''
		),$atts));	

		$output = '';
		
		$args = array('post_parent'           => $page_id,
					  'post_type'      => 'page',
					  'orderby' => 'title',
					  'order' => 'ASC'
				  );
		query_posts( $args );	
		
		if( have_posts() ) while ( have_posts() ) : the_post();
		
		$post_thumb = get_post_thumbnail_id( $post->ID );
		$image_src = wp_get_attachment_image_src($post_thumb, 'large');
		$image = aq_resize( $image_src[0], 267, 175, true ); //resize & crop the image
		
		$output .= '<div class="pagelist-items">';
		$output .= '<div class="one_third">';
		if ($image) {
			$output .= '<a href="'.get_permalink().'"><img src="' . $image . '" class="alignnone" /></a>';
		} else {
			$output .= '<img src="' . SP_BASE_URL . 'images/blank-pagelist-photo.gif" alt="Blank photo" class="alignnone" />';
		}
		$output .= '</div>';
		
		$output .= '<div class="two_third last">';
		$output .= '<h3 class="name"><a href="'.get_permalink().'">' . get_the_title() .'</a></h3>';

		$output .= '<p>' . sp_excerpt_length(40) . '</p>';
		$output .= '<a href="'.get_permalink().'" class="learn-more button">' . __( 'Learn more »', 'sptheme' ) . '</a>';
		
		$output .= '</div>';
		$output .= '<div class="clear"></div>';
		$output .= '</div>';
		
		endwhile;

		wp_reset_query();

		return $output;	  	  
	}
	add_shortcode('pagelist', 'sp_pagelist_sc');	

/* ---------------------------------------------------------------------- */
/*	Misc
/* ---------------------------------------------------------------------- */

	/* -------------------------------------------------- */
	/*	Fullwidth map
	/* -------------------------------------------------- */

	function sp_fullwidth_map_sc( $atts, $content = null ) {

		$output = '</div><!-- end .container --><section id="map">' . do_shortcode( $content ) . '</section><!-- end #map --><div class="container clearfix">';

		return $output;

	}
	add_shortcode('fullwidth_map', 'sp_fullwidth_map_sc');

	/* -------------------------------------------------- */
	/*	Editor Fix (Raw)
	/* -------------------------------------------------- */

	function my_formatter( $content ) {

		$new_content = '';
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
		$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		foreach ( $pieces as $piece ) {

			if ( preg_match( $pattern_contents, $piece, $matches ) ) {
				$new_content .= $matches[1];
			} else {
				$new_content .= wptexturize( wpautop( $piece ) );
			}

		}

		return $new_content;

	}
	remove_filter('the_content', 'wpautop');
	remove_filter('the_content', 'wptexturize');
	add_filter('the_content', 'my_formatter', 99);

/* ---------------------------------------------------------------------- */
/*	TinyMCE Buttons
/* ---------------------------------------------------------------------- */
function add_shortcodes_button() {
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )
		return;
		
	if ( get_user_option('rich_editing') == 'true' ) {
		add_filter('mce_external_plugins', 'add_shortcodes_tinymce_plugin');
		add_filter('mce_buttons', 'register_shortcodes_button');
	}
}

add_action('init', 'add_shortcodes_button');

function register_shortcodes_button( $buttons ) {
	array_push( $buttons, '|', 'sp_shortcodes' );
	
	return $buttons;
}

function add_shortcodes_tinymce_plugin( $plugin_array) {
	$plugin_array['sp_shortcodes'] = SP_BASE_URL.'framework/shortcodes/tinymce/tinymce.js';
	
	return $plugin_array;
}

function my_refresh_mce( $ver ) {

	$ver += 3;

	return $ver;

}
add_filter('tiny_mce_version', 'my_refresh_mce');

/* ---------------------------------------------------------------------- */
/*	Quicktags
/* ---------------------------------------------------------------------- */

function aw_quicktags() {

	wp_enqueue_script( 'aw_quicktags', SP_BASE_URL . 'framework/shortcodes/tinymce/quicktags.js', array('quicktags') );

}
add_action('admin_print_scripts', 'aw_quicktags');

/* ---------------------------------------------------------------------- */
/*	Backend Scripts
/* ---------------------------------------------------------------------- */
function sp_admin_scripts( $hook ) {

	//Custom javascript working on Shortcodes Manager popup
	if( $hook == 'post.php' || $hook == 'post-new.php' ) {
		wp_register_script( 'tinymce_scripts', SP_BASE_URL . 'framework/shortcodes/tinymce/js/scripts.js', array('jquery'), false, true );
		wp_enqueue_script('tinymce_scripts');
	}

}
add_action('admin_enqueue_scripts', 'sp_admin_scripts');