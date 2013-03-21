<aside class="columns clearfix">
      <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-footer')){
                 
            }else{ ?>
             <div class="non-widget">
             <h3><?php _e('About This Sidebar', 'sptheme'); ?></h3>
             <p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place widgets into the <strong><em>Footer Sidebar</em></strong> Area', 'sptheme'); ?></p>
             </div>
            <?php }?>
</aside>