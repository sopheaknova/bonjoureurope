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
			<?php 
			$args = array('post_type'=>'slideshow', 'posts_per_page'	=> -1);
			$query = new WP_Query( $args  );
			
			if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
			?>
            
			<?php if ( has_post_thumbnail() ) {?>
			<div class="item-slide">
			<?php the_post_thumbnail('slideshow-header');?>
			</div>
			<?php } ?>
            
            <?php 
			endwhile; 
			endif;
			wp_reset_postdata();
			?> 
           </div>
     </div>
</section>
<section id="news-ticker">
     <div class="container clearfix">
          <span class="hot-news"><?php _e('Hot news &nbsp;:&nbsp;', 'sptheme'); ?></span>
          <span class="text-run">
                <marquee direction="left" behavior="scroll" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                <?php 
                      $cat_id = get_cat_ID($data['ticker_cat']);
                      $query_cat = new WP_Query(array('cat'=>$cat_id, 'posts_per_page'	=> 1));
                      if( $query_cat->have_posts()) :
                      while( $query_cat->have_posts()) : $query_cat->the_post();
                           the_content();
                      endwhile;
                      endif;
					  wp_reset_postdata();
                ?>
                </marquee>
          </span>
     </div>
</section>

<section id="breadcrumb">
     <div class="container clearfix">
          <div id="title-map"><?php sp_breadcrumb(); ?></div>
     </div>
</section>

