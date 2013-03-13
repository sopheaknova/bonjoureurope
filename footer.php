<?php
	/* get theme options for further processing */
	global $data; 
?>
<footer id="footer" class="clearfix">
    <div class="container">
    <?php echo sp_footer_navigation(); ?>
	<p>&copy; 2013 NOVA CAMBODIA</p>
    
    </div><!--end .container-->
</footer><!--end #footer-cols-->
 

<?php echo $data['google_analytics']; ?>

<?php wp_footer(); ?>

</body>
</html>