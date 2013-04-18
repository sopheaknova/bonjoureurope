<?php global $data; ?>
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
	    	 	   <?php _e('Sponsors by &nbsp;:&nbsp;', 'sptheme'); ?>
	    	 	   <a href="http://www.airfrance.com/KH/en/local/resainfovol/meilleuresoffres/promo_best_offers.htm" target="_blank" title="Air France"><img src="<?php bloginfo('template_url');?>/images/arfrance.png" width="109" height="12"/></a>
	    	 	   <a href="http://www.klm.com/" target="_blank" title="KLM"><img src="<?php bloginfo('template_url');?>/images/LOGO-KLM-H.png" width="78" height="30" /></a>
	    	 </div>
	    </div>
</section>

<?php echo $data['google_analytics']; ?>

<?php wp_footer(); ?>

</body>
</html>