<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_bloginfo('template_url').'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		//cycle Slider
		$cycle_effects = array('fade' => 'fade', 'blindX' => 'blindX', 'blindY' => 'blindY', 'blindZ' => 'blindZ', 'cover' => 'cover', 'curtainX' => 'curtainX','curtainY' => 'curtainY', 'fadeZoom' => 'fadeZoom', 'growX' => 'growX', 'growY' => 'growY', 
	 'none' => 'none', 'scrollUp' => 'scrollUp', 'scrollDown' => 'scrollDown', 'scrollLeft' => 'scrollLeft', 
	 'scrollRight' => 'scrollRight', 'scrollHorz' => 'scrollHorz', 'scrollVert' => 'scrollVert',
	'shuffle' => 'shuffle', 'slideX' => 'slideX', 'slideY' => 'slideY', 'toss' => 'toss', 
	 'turnUp' => 'turnUp', 'turnDown' => 'turnDown', 'turnLeft' => 'turnLeft', 'turnRight' => 'turnRight', 'uncover' => 'uncover', 'wipe' => 'wipe', 'zoom' => 	'zoom');


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General
$of_options[] = array( "name" => "General Settings",
					"type" => "heading");
									
$of_options[] = array( "name" => "Custom logo upload",
					"desc" => "Upload your own logo (.png)",
					"id" => "theme_logo",
					"std" => SP_BASE_URL . "images/theme-logo.png",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Custom favicon upload",
					"desc" => "Upload your own favicon that display on browser address bar. (.ico). Anyway you can convert png to ico by click on<a href='http://www.convertico.com'> Convert ico</a>",
					"id" => "theme_favico",
					"std" => SP_BASE_URL . "favicon.ico",
					"mod" => "min",
					"type" => "media");	
					
$of_options[] = array( "name" => 'Feedburner URL',
						"id" => "feedburner",
						"type" => "text",
						);								

$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");

//Feature Slide

$of_options[] = array( "name" => 'Featured Slideshow',
						"type" => "heading",
						"slug" => "feature"
						);

$of_options[] = array( "name" => 'Slidshow Homepage',
					"id" => "feature_category",
					"type" => "select",
					"desc" => "Please Slideshow category to show post as slideshow on homepage",
					"options" => $of_categories
					);

$of_options[] = array( "name" => 'Animation & Effects',
					"desc" => "",
					"id" => "introduction",
					"std" => "<h3 style=\"margin: 0 0 10px;\">Animation & Effects</h3>",
					"icon" => true,
					"type" => "info",
					);

$of_options[] = array( "name" => 'Effect',
					"desc" => 'name of transition effect',
					"id" => "cycle_effect",
					"std" => "fade",
					"type" => "select",
					"options" => $cycle_effects
					);

$of_options[] = array( "name" => 'Speed',
					"desc" => 'speed of the transition',
					"id" => "cycle_speed",
					"std" => "5000",
					"type" => "text",
					);

$of_options[] = array( "name" => 'timeout',
					"desc" => 'milliseconds between slide transitions',
					"id" => "cycle_timeout",
					"std" => "5000",
					"type" => "text",
					);						
					
// Post Setting
$of_options[] = array( "name" => "Post Setting",
					"type" => "heading");																		

$of_options[] = array( "name" => "Disable Share button",
					"desc" => "Show or hide Share button for each news/events and latest offer",
					"id" => "disable_share_post",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);
					
$of_options[] = array( "name" => "Disable post meta",
					"desc" => "Show or hide Posted By",
					"id" => "disable_post_meta",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);

// Media Center Setting
$of_options[] = array( "name" => "Media Center",
					"type" => "heading");

$of_options[] = array( "name" => "Select Media Center",
					"desc" => "Select Media Center category",
					"id" => "media_center_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);

$of_options[] = array( "name" => "Select BFC Voice",
					"desc" => "Select BFC Voice category",
					"id" => "bfc_voice_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);	
										
$of_options[] = array( "name" => "Select In focus",
					"desc" => "Select In focus category",
					"id" => "infocus_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);

$of_options[] = array( "name" => "Select Latest news",
					"desc" => "Select Latest news category",
					"id" => "latest_news_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);	
					
$of_options[] = array( "name" => "Select Press release",
					"desc" => "Select Press release category",
					"id" => "press_release_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);
					
$of_options[] = array( "name" => "Select Video",
					"desc" => "Select Video category",
					"id" => "video_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);																														

// Publication and Reports Setting
$of_options[] = array( "name" => "Publication Report",
					"type" => "heading");
					
$of_options[] = array( "name" => "Select Publication and Reports",
					"desc" => "Select Publication and Reports category",
					"id" => "publication_report_cat",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories
					);					

$of_options[] = array( "name" => "Disable category image",
					"desc" => "If Yes, Will be disable category image in Publication and Reports landing page.",
					"id" => "disable_cat_img",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);					
					
// Contact
$of_options[] = array( "name" => "Contact",
					"type" => "heading");
					
$of_options[] = array( "name" => "Disable value bellow in contact page",
					"desc" => "If Yes, these data bellow will not use in contact page and will use your own text/custom text instead.",
					"id" => "disable_contact_data",
					"std" => "no",
					"type" => "radio",
					"options" => array(
						'yes' => 'Yes',
						'no' => 'No')
					);					
					
$of_options[] = array( "name" => "Latitude",
					"desc" => "Latitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_lat",
					"std" => "11.551249",
					"type" => "text"
					);

$of_options[] = array( "name" => "Longitude",
					"desc" => "Longitude of google map see <a href='http://itouchmap.com'>itouchmap.com</a>",
					"id" => "map_long",
					"std" => "104.927920",
					"type" => "text"
					);										
					
$of_options[] = array( "name" => "Address",
					"desc" => "Enter your company or organization address",
					"id" => "address",
					"std" => "No. 9, St 322 Boeung Keng Kang 1 Chamcamon, Phnom Penh, Cambodia",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Telephone line 1",
					"desc" => "",
					"id" => "tel_1",
					"std" => "+855 23 220 362",
					"type" => "text"
					);	
					
$of_options[] = array( "name" => "Telephone line 2",
					"desc" => "",
					"id" => "tel_2",
					"std" => "+855 23 212 847",
					"type" => "text"
					);																								
					
$of_options[] = array( "name" => "Fax",
					"desc" => "",
					"id" => "fax",
					"std" => "+855 23 212 903",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Email",
					"desc" => "",
					"id" => "email",
					"std" => "betterfactories@ilo.org",
					"type" => "text"
					);					
										
// Footer
$of_options[] = array( "name" => "Footer",
					"type" => "heading");
					
$of_options[] = array( "name" => "Facebook URL",
					"desc" => "Enter Facebook url/link",
					"id" => "fb_url",
					"std" => "#",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "Youtube URL",
					"desc" => "Enter Youtube url/link",
					"id" => "youtube_url",
					"std" => "#",
					"type" => "text"
					);
					
$of_options[] = array( "name" => "URl for ILO (International Labour Organization)",
					"desc" => "Enter the url of ILO website address",
					"id" => "ilo_url",
					"std" => "http://www.ilo.org",
					"type" => "text"
					);										
					
$of_options[] = array( "name" => "Copyright",
					"desc" => "footer copyrights text",
					"id" => "copyrights",
					"std" => "© Better Factories Cambodia, All right Reserved ",
					"type" => "text"
					);

//Sidebar Settings

$of_options[] = array( "name" => "Sidebar Settings",
					"type" => "heading");

$of_options[] = array( "name" => "Sidebar Options",
					"desc" => "",
					"id" => "sidebar_options",
					"std" => "",
					"type" => "sidebar");
									
					
// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>
