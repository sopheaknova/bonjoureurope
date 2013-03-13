<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container clearfix">
		
        <center>
		<header class="page-header">
		
			<h1 class="page-title"><?php _e( 'Well this is somewhat embarrassing, isn&rsquo;t it?', 'sptheme' ); ?></h1>

		<article id="post-0" class="post error404 not-found">
		
        	<h3><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for...', 'sptheme' ); ?></h3>
            <h4><?php printf( __('<strong>Start over again</strong> with the %1$sHomepage%2$s.', 'sptheme'), '<a href="'.get_bloginfo('url').'">', '</a>' ); ?></h4>
		
		</article><!-- end .hentry -->
        
        </header><!-- end .page-header -->
        
        
        </center>
        
    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>
