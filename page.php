<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container clearfix">

		<?php if( $has_sidebar ): ?>

			<section id="main">

		<?php endif; ?>
		

		<?php if (have_posts()) while ( have_posts() ): the_post(); ?>
        <div class="entry-body">
        	
            <h1 class="page-title"><?php echo the_title(); ?></h1>
            
			<?php remove_filter( 'the_content', 'wpautop' ); the_content(); ?>
			<div class="clear"></div>
			<p><?php edit_post_link( __( 'Edit', 'sptheme' ), '', '' ); ?></p>
            
        </div>    

		<?php endwhile; ?>
		

		<?php if( $has_sidebar ): ?>

			</section><!-- end #main -->
			
			<?php get_sidebar(); ?>

		<?php endif; ?>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
