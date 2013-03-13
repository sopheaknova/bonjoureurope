<?php get_header(); ?>

<?php $has_sidebar = sp_check_page_layout(); ?>

<section id="content" class="clearfix <?php echo sp_check_sidebar_position(); ?>">

	<div class="container">

		<header class="page-header">

			<?php if ( have_posts() ): ?>
			
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sptheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php else: ?>
			
				<h1 class="page-title"><?php _e( 'Nothing Found', 'sptheme' ); ?></h1>

			<?php endif; ?>

		</header><!-- end .page-header -->
		
			<section id="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

					<?php get_template_part( 'content', get_post_format() ); ?>

				</article><!-- end .hentry -->

			<?php endwhile; ?>

			<?php // Pagination
				if(function_exists('wp_pagenavi'))
					wp_pagenavi();
				else 
					echo sp_pagination(); 
			?>

		<?php else: ?>
		
			<article id="post-0" class="hentry post no-results not-found">
		
				<h3><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sptheme' ); ?></h3>

			</article><!-- end .hentry -->

		<?php endif; ?>

		
			</section><!-- end #main -->

			<?php get_sidebar(); ?>

    </div><!-- end .container.clearfix -->    

</section><!-- end #content -->

<?php get_footer(); ?>



