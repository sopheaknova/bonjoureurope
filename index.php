<?php
/**
 * @package WordPress
 * @subpackage Bonjour_Europe
 * @since Bonjour Europe 1.0
 */
?>
<?php get_header(); ?>

<section id="content">
	<div class="container content-inner clearfix">
          
		  <?php get_sidebar('left'); ?>
          
          <div class="main">
          	   <h1 class="title-mod"><?php _e('News and Hot Informations', 'sptheme'); ?></h1>
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