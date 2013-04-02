<section id="footer-cols">
         <div class="container">
         	   <?php get_sidebar('footer');?>
	               
         </div>
</section>
<section id="footer-bottom">
	    <div class="container clearfix">
	    	 <div class="footer-menu">
	    	 	   <?php echo sp_footer_navigation(); ?>
	    	 	   
	    	 </div>
	    	 <div class="sponsors">
	    	 	   Sponsors by &nbsp;:&nbsp;
	    	 	   <span><img src="<?php bloginfo('template_url');?>/images/arfrance.png" width="109" height="12"/></span>
	    	 	   <span><img src="<?php bloginfo('template_url');?>/images/LOGO-KLM-H.png" width="78" height="30" /></span>
	    	 </div>
	    </div>
</section>

<?php echo $data['google_analytics']; ?>

<?php wp_footer(); ?>

</body>
</html>