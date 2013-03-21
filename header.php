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
<section id="header">
     <div class="container clearfix">
           <div class="logo">
                 <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
                 <?php if($data['theme_logo'] !== '') : ?>
                 <img src="<?php echo $data['theme_logo']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
                 <?php endif; ?>
                 </a>
           </div>
           <div class="cover-menu">
                <?php echo sp_main_navigation(); ?>
                
           </div>
           <div class="featured" id="slideshow">
                <div class="img"><img src="<?php bloginfo('template_url');?>/images/dev/slide_0007.jpg" width="980" height="250"/></div>
                <div class="img"><img src="<?php bloginfo('template_url');?>/images/dev/slide_1018.jpg" width="980" height="250"/></div>
                <div class="img"><img src="<?php bloginfo('template_url');?>/images/dev/slide_1026.jpg" width="980" height="250"/></div>
                <div class="img"><img src="<?php bloginfo('template_url');?>/images/dev/slide_1038.jpg" width="980" height="250"/></div>
           </div>
     </div>
</section>
<section id="news-ticker">
     <div class="container clearfix">
          <span id="hot-news">Hot News&nbsp;:&nbsp;</span>
          <span class="text-run">
                <marquee direction="left" behavior="scroll" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                    We are very please to inform that we have a greate game for new year jion with us now! you all will get award to go abroad or travel around Cambodia.
                </marquee>
          </span>
     </div>
</section>



