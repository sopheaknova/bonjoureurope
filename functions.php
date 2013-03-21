<?php global $data; 

/* ---------------------------------------------------------------------- */
/*	Basic Theme Settings
/* ---------------------------------------------------------------------- */
$shortname = get_template();

//WP 3.4+ only
$themeData     = wp_get_theme( $shortname );
$themeName     = $themeData->Name;
$themeVersion  = $themeData->Version;
	
define( 'SP_BASE_DIR', TEMPLATEPATH . '/' );
define( 'SP_BASE_URL', get_template_directory_uri() . '/' );
define( 'THEME_VERSION', $themeData->Version);
define( 'THEME_NAME', 'BE'); // should be $themeName but it's too long

/* ---------------------------------------------------------------------- */
/*	Setup and Load Parts
/* ---------------------------------------------------------------------- */

// Add setup functions
require_once( SP_BASE_DIR . 'framework/functions/setup-theme.php' );

// Add Admin Option
require_once( SP_BASE_DIR . 'framework/admin/index.php' );
// Add metaboxes
require_once( SP_BASE_DIR . 'framework/meta-box/class.php' );
require_once( SP_BASE_DIR . 'framework/meta-box/meta-boxes.php' );

// Add widgets
require_once( SP_BASE_DIR . 'framework/widgets/widgets.php' );

require_once( SP_BASE_DIR . 'framework/functions/aq_resizer.php');
require_once( SP_BASE_DIR . 'framework/functions/theme-functions.php' );

//Add Shortcodes
require_once( SP_BASE_DIR . 'framework/shortcodes/shortcodes.php' );

// Add custom post type
require_once( SP_BASE_DIR . 'framework/custom-post/custom-post-types.php' );

