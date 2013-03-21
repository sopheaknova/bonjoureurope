jQuery( document ).ready( function($) {

	var	$videoSettings = $('#post-video-settings').hide(),
		$linkSettings  = $('#post-link-settings').hide(), 
		$postdivrich   = $('#postdivrich'),
		$generalSettings  = $('#general-settings'), 
		$headingImage  = $('#heading-image'),
		$postFormat    = $('#post-formats-select input[name="post_format"]'),
		
		//var for change template
		$pageTempalte = $('#page_template'),
		$pageLayout = $('.rwmb-label-radio-image input[name="sp_page_layout"]'),
		$selectSidebar = $('.rwmb-sidebar-wrapper').hide(),
		
		//var for event post type
		$neatEvent = $('#sp_neat_event');
		$eventEndDate = $("#sp_event_end_date").parent().parent();
	
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
		$linkSettings.hide();
		$postdivrich.show();
		$generalSettings.show();
		$headingImage.show();

		if( val === 'video' ) {

			$videoSettings.show();
			
		} else if( val === 'link' ) {

			$linkSettings.show();
		}

	}
	
	$('#page_template').change(function() {
		changePageTemplate( $(this).val() );
	});
	
	function changePageTemplate( val ) {
		
		$generalSettings.show();
		
		if( val === 'page-contact.php' || val === 'page-teams.php' ) {

			$generalSettings.hide();
			
		}
	}	
	
	$pageLayout.each(function() {
		
		var $this = $(this);

		if( $this.is(':checked') )
			changePageLayout( $this.val() );

	});
	
	$pageLayout.change(function() {
		changePageLayout( $(this).val() );
	})
	
	function changePageLayout( val ) {
		
		$selectSidebar.show();
		
		if( val === '1col' ) {

			$selectSidebar.hide();
			
		} else if( val === '2cr' || val === '3col' ) {
			$selectSidebar.show();
		}
	}
	
	// Fire element of Event CPT
	( $neatEvent.is(':checked') ) ? $eventEndDate.show() : $eventEndDate.hide();	
	
	$neatEvent.change(function() {
		var $this = $(this);
		( $this.is(':checked') ) ? $eventEndDate.show() : $eventEndDate.hide();	
	});

});