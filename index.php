<?php
/**
 * @package WordPress
 * @subpackage Better_Factories_Cambodia
 * @since Better Factories Cambodia 1.0
 */
?>
<?php get_header(); ?>

<section id="content">
	<div class="container content-inner clearfix">
          <!--<div class="sidebar-left">
          	   <h2 class="title-mod">Other Event</h2>
          	   <h5 class="label-mod">Festival in March</h5>
          	   <div class="defined-left">
          	   	    <h5>Binche Carnival</h5>
          	   	    <img src="<?php bloginfo('template_url');?>/images/dev/Kiruna-Snow.png" width="135" height="160" />
          	   	    19th to 25th, March
          	   </div>
          	   <div class="defined-left">
          	   	    <h5>Kiruna​Snow​</h5>
          	   	    <img src="<?php bloginfo('template_url');?>/images/dev/Starkbierzeit.png" width="135" height="160" />
          	   	    28th to 30th, March
          	   </div>
                  <div class="defined-left clearfix">
                        <a class="read-more add-left">Months..</a>
                  </div>
          </div>-->
          <!--end .sidebar-left-->
          
          <?php get_sidebar('left'); ?>
          
          <div class="main">
          	   <h1 class="title-mod">News and Hot Informations</h1>
          	   <?php $cat_id = get_cat_ID($data['news_cat']);
                $query  = new WP_Query(array('cat'=>$cat_id));
                if( $query->have_posts()) :
                while( $query->have_posts()) : $query->the_post();?>
                
                <div class="entry-body clearfix">
                <h3><?php the_title();?></h3>
                <div class="entry-meta">
                  Post by&nbsp;<?php the_author();?>&nbsp;&nbsp;<a href=""><?php echo $data['news_cat'];?>,&nbsp;<?php the_modified_date('F j, Y'); ?></a>
                </div><!-- end .entry-meta -->
                <?php if(has_post_thumbnail()){
                
                the_post_thumbnail();
                }?>
                <div class="entry-content">
                <?php the_content();?>
                </div>
                </div>
                <!--end .entry-body clearfix -->
              
          <?php endwhile;
                endif;?>
               
          </div>
          <!--end .main-->
          
          <?php get_sidebar(); ?>
          
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>