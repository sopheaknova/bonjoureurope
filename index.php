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
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					
                    <div class="entry-body">
                        
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'sptheme'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
                            <h1 class="title"><?php the_title(); ?></h1>
                        </a>
                        
                        <div class="entry-meta">
                        <?php echo sp_post_meta(); ?>
                        </div><!-- end .entry-meta -->
                        
                        <?php if ( sp_post_image() ) { ?>
                        
                        <div class="cat-post-img">
                        <?php
						$post_type = get_post_format($post->ID);
						$thumb = sp_post_image('large');
						$img_thumb = aq_resize( $thumb, 440, 250, true );
						?>
                        <?php if ( $post_type == 'video' ) { ?>
                        <img src="<?php echo sp_post_image(); ?>" width="440" height="250" align="<?php the_title(); ?>" />
                        <?php } else { ?>
                        <img src="<?php echo $img_thumb; ?>" align="<?php the_title(); ?>" />
                        <?php } ?>
                        </div><!-- end .cat-post-img -->
                        
						<?php } // sp_post_image() ?>
                        
                        <div class="entry-content">
                        <?php echo sp_post_content(); ?>
                        </div><!-- end .entry-content -->
                        <div class="clear"></div>
                    
                    </div><!-- end .entry-body -->

				</article><!-- end .post-entry -->
              
          <?php endwhile; ?>
		  
		  <?php // Pagination
				if(function_exists('wp_pagenavi'))
					wp_pagenavi();
				else 
					echo sp_pagination(); 
			?>		
          <?php else: ?>
		
                <article id="post-0" class="post no-results not-found">
            
                    <h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>
    
                </article><!-- end .hentry -->
    
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
               
          </div>
          <!--end .main-->
          
          <?php get_sidebar(); ?>
          
    </div><!-- end .container -->
</section><!-- end #content -->

<?php get_footer(); ?>