<?php
	/* get theme options for further processing */
	global $data; 
?>
<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js"  <?php language_attributes(); ?>     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" <?php language_attributes(); ?>>  <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- feeds, pingback -->
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php echo ($data['feedburner'] == '') ? bloginfo( 'rss2_url' ) :  $data['feedburner']; ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <link rel="shortcut icon" href="<?php echo ($data['theme_favico'] == '') ? SP_BASE_URL.'favicon.ico' : $data['theme_favico']; ?>" type="image/x-icon" /> 
    
	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>

<header id="header">
<div class="container clearfix">
	<div class="logo">
	  	<h2>
        <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
		<?php if($data['theme_logo'] !== '') : ?>
        <img src="<?php echo $data['theme_logo']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
        <?php else: ?>
        <h1><?php bloginfo('name'); ?></h1>
        <?php endif; ?>
        </a>
        </h2>
  	</div><!-- end .logo -->
</div><!-- end .container.clearfix -->
</header><!-- end #header -->

<nav id="menu-bar">
<div class="container clearfix">
    <?php echo sp_main_navigation(); ?>
</div>
</nav><!-- end .container.clearfix -->


