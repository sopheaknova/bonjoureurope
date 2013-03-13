<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" id="s" class="searchtxt" value="<?php _e( 'Search', 'sptheme' ); ?> &#8230;" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'sptheme' ); ?> &#8230;';}" onfocus="if (this.value == '<?php _e( 'Search', 'sptheme' ); ?> &#8230;') {this.value = '';}">
        <input type="submit" class="search-submit" value="<?php _e('Search', 'sptheme'); ?>" /><!-- hide this button in custom.js-->
    </form>