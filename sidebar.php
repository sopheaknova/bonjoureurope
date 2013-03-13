<?php $sidebar_choice = get_post_meta($post->ID, 'sp_selected_sidebar', true); ?>

<aside id="sidebar">
<?php 
if($sidebar_choice != "Main sidebar") { 
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar($sidebar_choice) ) :	
	else :
?>	
	<div class="non-widget">
    <h3><?php _e('About This Sidebar'.$sidebar_choice, 'sptheme'); ?></h3>
    <p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place widgets into the <strong><em>'.$sidebar_choice.'</em></strong> Area', 'sptheme'); ?></p>
    </div>
<?php	
	endif;
} else {
	if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Main sidebar') ) :	
	endif;
}
?>
</aside> <!--End #Sidebar-->
