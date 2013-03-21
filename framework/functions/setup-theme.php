<?php

/*-----------------------------------------------------------------------------------*/
/*  Set Max Content Width (use in conjuction with ".entry-content img" css)
/* ----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 415;

if( !function_exists( 'sp_content_width' ) ) {
    function sp_content_width() {
        if( is_page_template( 'template-full-width.php' ) || is_attachment() || !sp_check_page_layout() ) {
            global $content_width;
            $content_width = 840;
        }
    }
}
add_action( 'template_redirect', 'sp_content_width' );

/*-----------------------------------------------------------------------------------*/
/*	theme set up
/*-----------------------------------------------------------------------------------*/
if( !function_exists('sp_theme_setup') ) {

	function sp_theme_setup() {
		
		// Make theme available for translation
		load_theme_textdomain( $shortname, SP_BASE_DIR . 'languages' );
		
		$locale = get_locale();
    	$locale_file = get_template_directory() . "/languages/$locale.php";
    	if ( is_readable( $locale_file ) )
    		require_once( $locale_file );
		
		// Editor style
		add_editor_style('css/editor-style.css');
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_nav' => __( 'Primary Navigation', 'sptheme' ),
			'footer_nav'  => __( 'Footer Navigation', 'sptheme' )
		) );

		// Post thumbnails
		add_theme_support('post-thumbnails');
<<<<<<< HEAD

		add_image_size( 'blog-post', 400, null, true );
		add_image_size( 'slideshow', 980, 250, true);
		add_image_size( 'blog-post-thumb', 135, null, true );
		add_image_size( 'fullwidth', 980, null, true );
=======
>>>>>>> d87d22cf81cdbfe8c5b51b873dcf22742061437d
		
		add_image_size( 'large', 440, null, true );
		add_image_size( 'medium', 211, null, true );
	
		add_image_size( 'blog-post-left', 180, 120, true );
		add_image_size( 'blog-post-right', 270, 180, true );
		add_image_size( 'slideshow-header', 980, 250, true );
		
		// Add support for post formats
		add_theme_support( 'post-formats', array( 'audio', 'video', 'link' ) ); // aside, gallery, image, link, quote, video, audio
		
		// Add default post and comments RSS feed links to head
		add_theme_support('automatic-feed-links');

	}
}
add_action('after_setup_theme', 'sp_theme_setup');

// Determine whether WP-prettyPhoto plugin is acivated and assign the result to a constant
defined('WP_PRETTY_PHOTO_PLUGIN_ACTIVE')
        || define('WP_PRETTY_PHOTO_PLUGIN_ACTIVE', class_exists( 'WP_prettyPhoto' ) );


// if the WP-prettyPhoto plugin is not active handle rel="wp-prettyPhoto" in links for the prettyPhoto integrated script (if enabled)
if ( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
    /**
     * Insert rel="wp-prettyPhoto" to all links for images, movie, YouTube and iFrame. 
     * This function will ignore links where you have manually entered your own rel reference.
     * @param string $content Post/page contents
     * @return string Prettified post/page contents
     * @link http://0xtc.com/2008/05/27/auto-lightbox-function.xhtml
     * @access public
      */
    function autoinsert_rel_prettyPhoto ($content) {
        global $post;
        $rel = 'wp-prettyPhoto';
        $image_match = '\.bmp|\.gif|\.jpg|\.jpeg|\.png';
        $movie_match = '\.mov.*?';
        $swf_match = '\.swf.*?';
        $youtube_match = 'http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*';
        $iframe_match = '.*iframe=true.*';
        $pattern[0] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")([^\>]*?)>/i";
        $pattern[1] = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)(".$image_match."|".$movie_match."|".$swf_match."|".$youtube_match."|".$iframe_match.")('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
        $replacement[0] = '<a$1href=$2$3$4$5$6 rel="'.$rel.'['.$post->ID.']">';
        $replacement[1] = '<a$1href=$2$3$4$5$6$7>';
        $content = preg_replace($pattern, $replacement, $content);
        return $content;
    }
    add_filter('the_content', 'autoinsert_rel_prettyPhoto');
    add_filter('the_excerpt', 'autoinsert_rel_prettyPhoto');


    // Add the 'wp-prettyPhoto' rel attribute to the default WP gallery links
    function gallery_prettyPhoto ($content) {
            // add checks if you want to add prettyPhoto on certain places (archives etc).
            return str_replace("<a", "<a rel='wp-prettyPhoto[gallery]'", $content);
    }
    add_filter( 'wp_get_attachment_link', 'gallery_prettyPhoto');
}

/* ---------------------------------------------------------------------- */
/*	Insert Custom Sized Image Into Post Using Media Gallery
/* ---------------------------------------------------------------------- */
/*add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );
function custom_image_sizes_choose( $sizes ) {
	$custom_sizes = array(
		'portrait-thumb' => 'Portrait',
		'landscape-thumb' => 'Landscape'
	);
	return array_merge( $sizes, $custom_sizes );
}*/

/* ---------------------------------------------------------------------- */
/*	Register sidebars
/* ---------------------------------------------------------------------- */
function sp_widgets_init() {
	
	global $data;
	
	// Main Widget Area
	register_sidebar(array(
		'name'          => __('Right Sidebar', 'sptheme'),
		'id' => 'sidebar-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	
	// Main Widget Area
	register_sidebar(array(
		'name'          => __('Left Sidebar', 'sptheme'),
		'id' => 'sidebar-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	// Main Widget Area
	register_sidebar(array(
		'name'          => __('Footer Sidebar', 'sptheme'),
		'id' => 'sidebar-footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	
	$generate_sidebars = $data['sidebar_options']; 
	if($generate_sidebars){
		foreach ($generate_sidebars as $sidebar) { 
			if ( function_exists('register_sidebar') )
			register_sidebar(array(
			'name' 			=> $sidebar['title'],
			'id'			=> $sidebar['title'],
			'description' 	=> 'Widgets in this area will be shown in the sidebar.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			));
		}
	}
	
	
	
}
add_action('widgets_init', 'sp_widgets_init');



/* ---------------------------------------------------------------------- */
/*	Theme styles
/* ---------------------------------------------------------------------- */

function sp_register_styles() {	
	
	if( !is_admin() ) {

	//wp_register_style( 'g_droidsans', 'http://fonts.googleapis.com/css?family=Droid+Sans', array(), THEME_VERSION ); //wp_register_style( $handle, $src, $deps, $ver, $media ); $media => 'all', 'screen', 'handheld', 'print'. default false
	wp_register_style( 'g_suwannaphum', 'http://fonts.googleapis.com/css?family=Suwannaphum', array(), THEME_VERSION );
	wp_register_style( 'sp-theme-styles', SP_BASE_URL . 'style.css', array(), THEME_VERSION );
	
	/*if ( ICL_LANGUAGE_CODE == 'kh' ) {
		wp_register_style( 'khcss', SP_BASE_URL . 'css/kh.css', array(), THEME_VERSION );
	}*/
	wp_register_style( 'khcss', SP_BASE_URL . 'css/kh.css', array(), THEME_VERSION );
		
		wp_register_style( 'video-js',         SP_BASE_URL . 'css/video-js.min.css', array(), '3.2.0' );
		wp_register_style( 'audioplayerv1',    SP_BASE_URL . 'css/audioplayerv1.min.css', array(), '1.1.3' );
		//addon style 'PrettyPhoto'
		if ( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
			wp_register_style('pretty_photo', SP_BASE_URL . 'js/prettyPhoto/css/prettyPhoto.css', array(), '3.1.3', 'screen');
		}
	}

}
add_action('init', 'sp_register_styles');

function sp_enqueue_styles() {

	if( !is_admin() ) {
	/*if ( ICL_LANGUAGE_CODE == 'en' ) {	
		wp_enqueue_style('g_droidsans');
		wp_enqueue_style('g_suwannaphum');
		wp_enqueue_style('sp-theme-styles');
	}*/
	
	//wp_enqueue_style('g_droidsans');
	wp_enqueue_style('g_suwannaphum');
	wp_enqueue_style('sp-theme-styles');
	wp_enqueue_style('khcss');
		
	/*if ( ICL_LANGUAGE_CODE == 'kh' ) {	
		wp_enqueue_style('khcss');
	}*/
		wp_enqueue_style('video-js');
		wp_enqueue_style('audioplayerv1');
		if ( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
			wp_enqueue_style('pretty_photo');
		}
	}

}
add_action('wp_print_styles', 'sp_enqueue_styles');


/* ---------------------------------------------------------------------- */
/*	Register and load JS
/* ---------------------------------------------------------------------- */

function sp_register_scripts() {
	if( !is_admin() ) {
		
	/* Register our scripts -----------------------------------------------------*/
	wp_deregister_script('jquery');
	//wp_register_script( 'jquery',   'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', array(), '1.8.2', false ); //use for online
	wp_register_script( 'jquery',   SP_BASE_URL . 'js/jquery-1.8.2.js', array(), '1.8.2', false ); //use for local development
	wp_register_script( 'modernizr_custom',  SP_BASE_URL . 'js/modernizr.custom.js', array(), '2.5.3', false );
	wp_register_script( 'video-js',          SP_BASE_URL . 'js/video-js.min.js', array(), '3.2.0', false );
	wp_register_script( 'selectivizr',       SP_BASE_URL . 'js/selectivizr-and-extra-selectors.min.js', array('jquery'), '1.0.2', true );
	wp_register_script( 'audioplayerv1',     SP_BASE_URL . 'js/audioplayerv1.min.js', array('jquery'), '1.0', true ); 
	wp_register_script( 'cycle',  			 SP_BASE_URL . 'js/jquery.cycle.all.min.js', array(), '1.3.2', true );
	wp_register_script( 'easing',            SP_BASE_URL . 'js/jquery.easing-1.3.min.js', array('jquery'), '1.3', true );
	// PrettyPhoto script
	if( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
		wp_register_script('pretty_photo_lib', SP_BASE_URL . "js/prettyPhoto/js/jquery.prettyPhoto.js", array('jquery'), '3.1.3', false);
		wp_register_script('custom_pretty_photo', SP_BASE_URL . "js/prettyPhoto/custom_params.js", array('pretty_photo_lib'), '3.1.3', false);
	}
	wp_register_script( 'custom_scripts',    SP_BASE_URL . 'js/custom.js', array('jquery'), THEME_VERSION, true );
	}

}
add_action('init', 'sp_register_scripts');

function sp_enqueue_scripts() {
	if( !is_admin() ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('modernizr_custom');
		wp_enqueue_script('video-js');
		
		// For Internet Explorer
		global $is_IE;

		if( $is_IE )
			wp_enqueue_script('selectivizr');
		
		wp_enqueue_script('cycle');
		wp_enqueue_script('easing');
		wp_enqueue_script('audioplayerv1');	
		// PrettyPhoto script
		if( !WP_PRETTY_PHOTO_PLUGIN_ACTIVE ) {
			wp_enqueue_script('pretty_photo_lib');
			wp_enqueue_script('custom_pretty_photo');	
		}	
		wp_enqueue_script('custom_scripts');
	}
}

add_action('wp_print_scripts', 'sp_enqueue_scripts');

function sp_dynamic_js() {
	if (!is_admin()) {
		wp_register_script( 'scroll_to_top',    SP_BASE_URL . 'js/scroll.to.top.js', array(), THEME_VERSION, false, false );
		wp_enqueue_script('scroll_to_top');
	}
}
add_action( 'wp_head', 'sp_dynamic_js' );

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
function sp_page_menu_args( $args ) {

	$args['show_home'] = true;

	return $args;

}
add_filter('wp_page_menu_args', 'sp_page_menu_args');

// Sets the post excerpt length
function sp_excerpt_length( $length ) {
	global $post;
	
	$content = $post->post_content;
	$words = explode(' ', $content, $length + 1);
	if(count($words) > $length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
	$content = strip_tags(strip_shortcodes($content));
  
	return $content;

}
add_filter('excerpt_length', 'sp_excerpt_length');

// Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
function sp_auto_excerpt_more( $more ) {

	return '&hellip;';

}
add_filter('excerpt_more', 'sp_auto_excerpt_more');

add_filter( 'widget_text', 'shortcode_unautop');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


// Empty Pragraph and Clean up Shortcodes
function sp_shortcode_empty_paragraph_sc($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr($content, $array);

	return $content;
}
add_filter('the_content', 'sp_shortcode_empty_paragraph_sc');


// Makes some changes to the <title> tag, by filtering the output of wp_title()
function sp_filter_wp_title( $title, $separator ) {

	if ( is_feed() ) return $title;

	global $paged, $page;

	if ( is_search() ) {
		$title = sprintf(__('Search results for %s', 'sptheme'), '"' . get_search_query() . '"');

		if ( $paged >= 2 )
			$title .= " $separator " . sprintf(__('Page %s', 'sptheme'), $paged);

		$title .= " $separator " . get_bloginfo('name', 'display');

		return $title;
	}

	$title .= get_bloginfo('name', 'display');
	$site_description = get_bloginfo('description', 'display');

	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	if ( $paged >= 2 || $page >= 2)
		$title .= " $separator " . sprintf(__('Page %s', 'sptheme'), max($paged, $page) );

	return $title;

}
add_filter('wp_title', 'sp_filter_wp_title', 10, 2);

// Custom logo login
function sp_custom_login_logo() {
    echo '<style type="text/css">
		body.login{ background-color:#ffffff; }
        .login h1 a { background-image:url('.SP_BASE_URL.'images/custom-login-logo.png) !important; height:140px !important; background-size: auto auto !important;}
    </style>';
}

add_action('login_head', 'sp_custom_login_logo');

//  Remove error message login
add_filter('login_errors', create_function('$a', "return null;"));


//  Remove wordpress link on admin login logo
function sp_remove_link_on_admin_login_info() {
     return  get_bloginfo('url');
}
  
add_filter('login_headerurl', 'sp_remove_link_on_admin_login_info');

// Change login logo title
function sp_change_loging_logo_title(){
	return 'Go to '.get_bloginfo('name').' Homepage';
}
add_filter('login_headertitle', 'sp_change_loging_logo_title');

//	Remove logo and other items in Admin menu bar
function sp_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'sp_remove_admin_bar_links' );

//  Remove wordpress version generation
function sp_remove_version_info() {
     return '';
}
add_filter('the_generator', 'sp_remove_version_info');

// Customising footer text
function sp_modify_footer_admin () {  
  echo 'Created by <a href="http://www.novacambodia.com" target="_blank">novadesign</a>. Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>';  
}  
add_filter('admin_footer_text', 'sp_modify_footer_admin');  

// Remove dashboard widget
function sp_disable_default_dashboard_widgets() {  
    //remove_meta_box('dashboard_right_now', 'dashboard', 'core');  
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');  
    //remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');  
    //remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');  
    remove_meta_box('dashboard_primary', 'dashboard', 'core');  
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');  
}  
add_action('admin_menu', 'sp_disable_default_dashboard_widgets'); 

//  Set favicons for backend code
function sp_adminfavicon() {
echo '<link rel="icon" type="image/x-icon" href="'.SP_BASE_URL.'favicon.ico" />';
}
add_action( 'admin_head', 'sp_adminfavicon' );

// unregister all default WP Widgets
function sp_unregister_default_wp_widgets() {
    /*unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('WP_Widget_Search');
	*/
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Meta');
}
add_action('widgets_init', 'sp_unregister_default_wp_widgets', 1);

// Add language code in body class
function append_language_class ($classes) {
	// add 'class-name' to the $classes array
	$classes[] = ICL_LANGUAGE_CODE;
	// return the $classes array
	return $classes;
}
add_filter('body_class','append_language_class');