jQuery( document ).ready( function($) {

	var	$videoSettings = $('#post-video-settings').hide(),
		$audioSettings = $('#post-audio-settings').hide(),
		$linkSettings  = $('#post-link-settings').hide(), 
		$postdivrich   = $('#postdivrich'),
		$generalSettings  = $('#general-settings'), 
		$headingImage  = $('#heading-image'),
		$postFormat    = $('#post-formats-select input[name="post_format"]'),
		$pageTempalte = $('#page_template'),
		$pageLayout = $('.rwmb-label-radio-image input[name="sp_page_layout"]'),
		$selectSidebar = $('.rwmb-sidebar-wrapper').hide();
	
	$postFormat.each(function() {
		
		var $this = $(this);

		if( $this.is(':checked') )
			changePostFormat( $this.val() );

	});

	$postFormat.change(function() {

		changePostFormat( $(this).val() );

	});

	function changePostFormat( val ) {
		
		$videoSettings.hide();
		$audioSettings.hide();
		$linkSettings.hide();
		$postdivrich.show();
		$generalSettings.show();
		$headingImage.show();

		if( val === 'video' ) {

			$videoSettings.show();
			
		} else if( val === 'audio' ) {

			$audioSettings.show();
			
		} else if( val === 'link' ) {

			$linkSettings.show();
		}

	}
	
	$('#page_template').change(function() {
		changePageTemplate( $(this).val() );
	});
	
	function changePageTemplate( val ) {
		
		$generalSettings.show();
		
		if( val === 'page-contact.php' || val === 'jobs-page.php' || val === 'page-media-center.php' || val === 'page-publication-reports.php' || val === 'page-teams.php' ) {

			$generalSettings.hide();
			
		}
	}	
	
	$pageLayout.change(function() {
		changePageLayout( $(this).val() );
	})
	
	function changePageLayout( val ) {
		
		$selectSidebar.show();
		
		if( val === '1col' ) {

			$selectSidebar.hide();
			
		} else if( val === '2cr' ) {
			$selectSidebar.show();
		}
	}

});