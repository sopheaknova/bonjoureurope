<aside class="sidebar-right">
<h2 class="title-mod"><?php _e('Important Tips', 'sptheme'); ?></h2>
<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-right')){ 
         
      }else{?>
         <div class="non-widget">
         <h3><?php _e('About This Sidebar', 'sptheme'); ?></h3>
         <p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place widgets into the <strong><em>Right Sidebar</em></strong> Area', 'sptheme'); ?></p>
         </div>
<?php }?>
</aside>
<!--end .sidebar-right-->
