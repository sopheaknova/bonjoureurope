(function( $ ) {

	var shortcode = '',
		alertBoxShortcode,
		layoutShortcode;

	$('#shortcode-dropdown').live('change', function() {

		var $currentShortcode = $(this).val();

		// Reset everything
		$('#shortcode').empty();
		alertBoxShortcode = false;
		layoutShortcode   = false;

		/* -------------------------------------------------- */
		/*	Divider
		/* -------------------------------------------------- */

		if( $currentShortcode === 'divider' ) {

			sp_show_option('.divider');
			shortcode = '[divider style=""]';

		/* -------------------------------------------------- */
		/*	Slogan
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'slogan' ) {

			sp_show_option('.slogan');
			shortcode = '[slogan align=""] [/slogan]';

		/* -------------------------------------------------- */
		/*	Button
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'button-code' ) {

			sp_show_option('.button-code');
			shortcode = '[button <span class="red">url=""</span> size="" style="" arrow=""] [/button]';

		/* -------------------------------------------------- */
		/*	Dropcap
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'dropcap' ) {

			sp_show_option('.dropcap');
			shortcode = '[dropcap style=""] [/dropcap]';

		/* -------------------------------------------------- */
		/*	Info box
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'info-box' ) {

			sp_show_option('.info-box');
			shortcode = '[infobox] [/infobox]';

		/* -------------------------------------------------- */
		/*	Quote
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'quote' ) {

			sp_show_option('.quote');
			shortcode = '[quote author="" type=""] [/quote]';

		/* -------------------------------------------------- */
		/*	List
		/* -------------------------------------------------- */
		} else if( $currentShortcode === 'list' ) {

			sp_show_option('.list');
			shortcode = '[list icon="" style=""] [/list]';

		/* -------------------------------------------------- */
		/*	Lightbox
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'lightbox' ) {

			sp_show_option('.lightbox');
			shortcode = '[lightbox type="" <span class="red">full=""</span> title="" group=""] [/lightbox]';

		/* -------------------------------------------------- */
		/*	Accordion Content
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'accordion-content' ) {

			sp_show_option('.accordion-content');
			shortcode = '[accordion_content <span class="red">title=""</span> title_size=""] [/accordion_content]';
			
		/* -------------------------------------------------- */
		/*	Toggle Content
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'toggle-content' ) {

			sp_show_option('.toggle-content');
			shortcode = '[toggle_content <span class="red">title=""</span>] [/accordion_content]';	

		/* -------------------------------------------------- */
		/*	Content Tabs
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'content-tabs' ) {

			sp_show_option('.content-tabs');
			shortcode = '[tabgroup] [tab <span class="red">title=""</span>] [/tab] [/tabgroup]';

		/* -------------------------------------------------- */
		/*	Pricing tables
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'pricing-tables' ) {

			sp_show_option('.pricing-tables');
			shortcode = '[pricing_table <span class="red">column_count="" type=""</span>] [pricing_column type="" <span class="red">title="" price="" period=""</span> description="" <span class="red">sign_up_title"=" sign_up_url=""</span> special=""] [/pricing_column] [/pricing_table]';

		/* -------------------------------------------------- */
		/*	Video Player
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'video-player' ) {

			sp_show_option('.video-player');
			shortcode = '[video mp4="" webm="" ogg="" poster="" aspect_ratio=""]';
		
		/* -------------------------------------------------- */
		/*	Video Youtube
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'video-youtube' ) {
			
			sp_show_option('.video-youtube');
			shortcode = '[video_youtube id=""]';	

		/* -------------------------------------------------- */
		/*	Audio Player
		/* -------------------------------------------------- */
		} else if( $currentShortcode === 'audio-player' ) {

			sp_show_option('.audio-player');
			shortcode = '[audio mp3="" ogg=""]';

		/* -------------------------------------------------- */
		/*	Alert Boxes: Success
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'alert-success' ) {

			sp_show_option('.alert-boxes');
			shortcode = '[success] [/success]';
			alertBoxShortcode = true;

		/* -------------------------------------------------- */
		/*	Alert Boxes: Info
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'alert-info' ) {

			sp_show_option('.alert-boxes');
			shortcode = '[info] [/info]';
			alertBoxShortcode = true;

		/* -------------------------------------------------- */
		/*	Alert Boxes: Notice
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'alert-notice' ) {

			sp_show_option('.alert-boxes');
			shortcode = '[notice] [/notice]';
			alertBoxShortcode = true;

		/* -------------------------------------------------- */
		/*	Alert Boxes: Error
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'alert-error' ) {

			sp_show_option('.alert-boxes');
			shortcode = '[error] [/error]';
			alertBoxShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/2
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-half' ) {

			sp_show_option('.layout');
			shortcode = '[one_half] [/one_half]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/2 last
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-half-last' ) {

			sp_show_option('.layout');
			shortcode = '[one_half_last] [/one_half_last]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/3
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-third' ) {

			sp_show_option('.layout');
			shortcode = '[one_third] [/one_third]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/3 last
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-third-last' ) {

			sp_show_option('.layout');
			shortcode = '[one_third_last] [/one_third_last]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/4
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-fourth' ) {

			sp_show_option('.layout');
			shortcode = '[one_fourth] [/one_fourth]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 1/4 last
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'one-fourth-last' ) {

			sp_show_option('.layout');
			shortcode = '[one_fourth_last] [/one_fourth_last]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 2/3
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'two-third' ) {

			sp_show_option('.layout');
			shortcode = '[two_third] [/two_third]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 2/3 last
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'two-third-last' ) {

			sp_show_option('.layout');
			shortcode = '[two_third_last] [/two_third_last]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 3/4
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'three-fourth' ) {

			sp_show_option('.layout');
			shortcode = '[three_fourth] [/three_fourth]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Layout: 3/4 last
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'three-fourth-last' ) {

			sp_show_option('.layout');
			shortcode = '[three_fourth_last] [/three_fourth_last]';
			layoutShortcode = true;

		/* -------------------------------------------------- */
		/*	Post Carousel
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'post-carousel' ) {

			sp_show_option('.post-carousel');
			shortcode = '[post_carousel title="" limit="" categories=""]';

		/* -------------------------------------------------- */
		/*	Project Carousel
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'projects-carousel' ) {

			sp_show_option('.projects-carousel');
			shortcode = '[projects_carousel title="" limit="" categories=""]';

		/* -------------------------------------------------- */
		/*	Portfolio
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'portfolio' ) {

			sp_show_option('.portfolio');
			shortcode = '[portfolio columns="" limit="" categories=""]';

		/* -------------------------------------------------- */
		/*	Slider
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'slider' ) {

			sp_show_option('.slider');
			shortcode = '[slider <span class="red">id=""</span>]';

		/* -------------------------------------------------- */
		/*	Team member
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'team-member' ) {

			sp_show_option('.team-member');
			shortcode = '[team-member <span class="red">id=""</span> column="" last=""]';
			
		/* -------------------------------------------------- */
		/*	Post list
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'postlist' ) {

			sp_show_option('.postlist');
			shortcode = '[postlist postlist="" num=""]';
			
		/* -------------------------------------------------- */
		/*	Page list
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'pagelist' ) {

			sp_show_option('.pagelist');
			shortcode = '[pagelist page_id=""]';		

		/* -------------------------------------------------- */
		/*	Fullwidth map
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'fullwidth-map' ) {

			sp_show_option('.fullwidth-map');
			shortcode = '[fullwidth_map] [/fullwidth_map]';

		/* -------------------------------------------------- */
		/*	Raw
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'raw' ) {

			sp_show_option('.raw');
			shortcode = '[raw] [/raw]';

		} else {

			$('.option').hide();
			shortcode = '';

		}

		$('#shortcode').html( shortcode );

	});

	$('#insert-shortcode').live('click', function() {

		var $currentShortcode = $('#shortcode-dropdown').val();

		/* -------------------------------------------------- */
		/*	Divider
		/* -------------------------------------------------- */

		if( $currentShortcode === 'divider' ) {

			if( $('#divider-style').is(':checked') ) {

				shortcode = '[divider style="dotted"]';
		
			} else {

				shortcode = '[divider]';
				
			}

		/* -------------------------------------------------- */
		/*	Slogan
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'slogan' ) {

			var sloganText  = $('#slogan-text').val(),
				sloganAlign = $('#slogan-align').val();

			shortcode = '[slogan';

			if( sloganAlign )
				shortcode += ' align="' + sloganAlign + '"';

			shortcode += ']' + sloganText + '[/slogan]';

		/* -------------------------------------------------- */
		/*	Button
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'button-code' ) {

			var buttonCodeUrl     = $('#button-code-url').val(),
				buttonCodeSize    = $('#button-code-size').val(),
				buttonCodeStyle   = $('#button-code-style'),
				buttonCodeArrow   = $('#button-code-arrow').val(),
				buttonCodeContent = $('#button-code-content').val();

			shortcode = '[button';

			if( buttonCodeUrl )
				shortcode += ' url="' + buttonCodeUrl + '"';

			if( buttonCodeSize )
				shortcode += ' size="' + buttonCodeSize + '"';

			if( buttonCodeStyle.is(':checked') )
				shortcode += ' style="' + buttonCodeStyle.val() + '"';

			if( buttonCodeArrow )
				shortcode += ' arrow="' + buttonCodeArrow + '"';

			shortcode += ']' + buttonCodeContent + '[/button]';

		/* -------------------------------------------------- */
		/*	Dropcap
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'dropcap' ) {

			var dropcapStyle   = $('#dropcap-style').val(),
				dropcapContent = $('#dropcap-content').val();

			shortcode = '[dropcap';

			if( dropcapStyle )
				shortcode += ' style="' + dropcapStyle + '"';

			shortcode += ']' + dropcapContent + '[/dropcap]';

		/* -------------------------------------------------- */
		/*	Info box
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'info-box' ) {

			var infoBoxContent = $('#info-box-content').val();
			
			shortcode = '[infobox]' + infoBoxContent + '[/infobox]';

		/* -------------------------------------------------- */
		/*	Quote
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'quote' ) {

			var quoteAuthor  = $('#quote-author').val(),
				quoteType    = $('#quote-type').val(),
				quoteContent = $('#quote-content').val();

			shortcode = '[quote';

			if( quoteAuthor )
				shortcode += ' author="' + quoteAuthor + '"';

			if( quoteType )
				shortcode += ' type="' + quoteType + '"';

			shortcode += ']' + quoteContent + '[/quote]';

		/* -------------------------------------------------- */
		/*	List
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'list' ) {

			var listIcon 	= $('#list-icon').val(),
				listStyle   = $('#list-style'),
				listContent = $('#list-content').val();

			shortcode = '[list';

			if( listIcon )
				shortcode += ' icon="' + listIcon + '"';

			if( listStyle.is(':checked') )
				shortcode += ' style="' + listStyle.val() + '"';

			shortcode += ']' + listContent + '[/list]';

		/* -------------------------------------------------- */
		/*	Lightbox
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'lightbox' ) {

			var lightboxType 	= $('#lightbox-type').val(),
				lightboxFull 	= $('#lightbox-full').val(),
				lightboxTitle 	= $('#lightbox-title').val(),
				lightboxGroup 	= $('#lightbox-group').val(),
				lightboxContent = $('#lightbox-content').val();

			shortcode = '[lightbox';

			if( lightboxType )
				shortcode += ' type="' + lightboxType + '"';

			shortcode += ' full="' + lightboxFull + '"';

			if( lightboxTitle )
				shortcode += ' title="' + lightboxTitle + '"';

			if( lightboxGroup && lightboxType === 'image-gallery' )
				shortcode += ' group="' + lightboxGroup.toLowerCase().replace(/ /g, '-') + '"';

			shortcode += ']' + lightboxContent + '[/lightbox]';

		/* -------------------------------------------------- */
		/*	Accordion Content
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'accordion-content' ) {

			var accordionContentTitle     = $('#accordion-content-title').val(),
				accordionContentTitleSize = $('#accordion-content-title-size').val(),
				accordionContentContent   = $('#accordion-content-content').val();

			shortcode = '[accordion_content';

			shortcode += ' title="' + accordionContentTitle + '"';

			if(accordionContentTitleSize )
				shortcode += ' title_size="' + accordionContentTitleSize + '"';

			shortcode += ']' + accordionContentContent + '[/accordion_content]';
			
		/* -------------------------------------------------- */
		/*	Toggle Content
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'toggle-content' ) {

			var toggleContentTitle     = $('#toggle-content-title').val();

			shortcode = '[toggle_content';

			shortcode += ' title="' + toggleContentTitle + '"';

			shortcode += '][/toggle_content]';	

		/* -------------------------------------------------- */
		/*	Content Tabs
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'content-tabs' ) {

			var contentTabsTitle   = $('#content-tabs-title').val(),
				contentTabsContent = $('#content-tabs-content').val(),
				contentTabsSingle  = $('#content-tabs-single').is(':checked');

			shortcode = ( !contentTabsSingle ? '[tabgroup] ' : '' );

			shortcode += '[tab';

			shortcode += ' title="' + contentTabsTitle + '"';

			shortcode += ']' + contentTabsContent + '[/tab]';

			if( !contentTabsSingle )
				shortcode += ' [/tabgroup]';

		/* -------------------------------------------------- */
		/*	Pricing tables
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'pricing-tables' ) {

		var pricingTablesColumnCount       = $('#pricing-tables-column-count').val(),
			pricingTablesType              = $('#pricing-tables-type').val(),
			pricingTablesColumnType        = $('#pricing-tables-column-type').val(),
			pricingTablesColumnTitle       = $('#pricing-tables-column-title').val(),
			pricingTablesColumnPrice       = $('#pricing-tables-column-price').val(),
			pricingTablesColumnPeriod      = $('#pricing-tables-column-period').val(),
			pricingTablesColumnDescription = $('#pricing-tables-column-description').val(),
			pricingTablesColumnSignupTitle = $('#pricing-tables-column-signup-title').val(),
			pricingTablesColumnSignupUrl   = $('#pricing-tables-column-signup-url').val(),
			pricingTablesColumnSpecial     = $('#pricing-tables-column-special').val(),
			pricingTablesColumnContent     = $('#pricing-tables-column-content').val(),
			pricingTablesColumnSingle      = $('#pricing-tables-column-single').is(':checked');

		shortcode = '['

		if( !pricingTablesColumnSingle ) {

			shortcode += 'pricing_table';

			shortcode += ' column_count="' + pricingTablesColumnCount + '"';

			shortcode += ' type="' + pricingTablesType + '"';

			shortcode += '] [';

		}

		shortcode += 'pricing_column';

		if( pricingTablesType === 'extended' && pricingTablesColumnType )
		shortcode += ' type="' + pricingTablesColumnType + '"';

		shortcode += ' title="' + pricingTablesColumnTitle + '"';

		shortcode += ' price="' + pricingTablesColumnPrice + '"';

		shortcode += ' period="' + pricingTablesColumnPeriod + '"';

		if( pricingTablesType === 'simple' && pricingTablesColumnDescription )
			shortcode += ' description="' + pricingTablesColumnDescription + '"';

		shortcode += ' sign_up_title="' + pricingTablesColumnSignupTitle + '"';

		shortcode += ' sign_up_url="' + pricingTablesColumnSignupUrl + '"';

		if( pricingTablesColumnSpecial )
			shortcode += ' special="' + pricingTablesColumnSpecial + '"';

		shortcode += ']' + pricingTablesColumnContent + '[/pricing_column]';

		if( !pricingTablesColumnSingle )
			shortcode += ' [/pricing_table]';

		/* -------------------------------------------------- */
		/*	Video Player
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'video-player' ) {

			var videoPlayerMp4	       = $('#video-player-mp4').val(),
				videoPlayerWebm	       = $('#video-player-webm').val(),
				videoPlayerOgg 	       = $('#video-player-ogg').val(),
				videoPlayerPoster      = $('#video-player-poster').val(),
				videoPlayerAspectRatio = $('#video-player-aspect-ratio').val();

			shortcode = '[video';

			if( videoPlayerMp4 )
				shortcode += ' mp4="' + videoPlayerMp4 + '"';

			if( videoPlayerWebm )
				shortcode += ' webm="' + videoPlayerWebm + '"';

			if( videoPlayerOgg )
				shortcode += ' ogg="' + videoPlayerOgg + '"';

			if( videoPlayerPoster )
				shortcode += ' poster="' + videoPlayerPoster + '"';

			if( videoPlayerAspectRatio )
				shortcode += ' aspect_ratio="' + videoPlayerAspectRatio + '"';

			shortcode += ']';

		/* -------------------------------------------------- */
		/*	Audio Player
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'audio-player' ) {

			var audioPlayerMp3 = $('#audio-player-mp3').val(),
				audioPlayerOgg = $('#audio-player-ogg').val();

			shortcode = '[audio';

			if(audioPlayerMp3) shortcode += ' mp3="' + audioPlayerMp3 + '"';

			if(audioPlayerOgg) shortcode += ' ogg="' + audioPlayerOgg + '"';

			shortcode += ']';	

		/* -------------------------------------------------- */
		/*	Video Youtube
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'video-youtube' ) {

		var videoId = $('#video-youtube-id').val();
			
			shortcode = '[video_youtube id="';
			
			if (videoId) shortcode += videoId;
				
			shortcode += '"]';
		
		/* -------------------------------------------------- */
		/*	Alert Boxes
		/* -------------------------------------------------- */

		} else if(alertBoxShortcode) {

			var alertBoxContent = $('#alert-boxes-content').val();

			if( $currentShortcode === 'alert-success' )
				shortcode = '[success]' + alertBoxContent + '[/success]';

			if( $currentShortcode === 'alert-info' )
				shortcode = '[info]' + alertBoxContent + '[/info]';

			if( $currentShortcode === 'alert-notice' )
				shortcode = '[notice]' + alertBoxContent + '[/notice]';

			if( $currentShortcode === 'alert-error' )
				shortcode = '[error]' + alertBoxContent + '[/error]';
		
		/* -------------------------------------------------- */
		/*	Layout
		/* -------------------------------------------------- */

		} else if(layoutShortcode) {

			var layoutContent = $('#layout-content').val();

			if( $currentShortcode === 'one-half' )
				shortcode = '[one_half]' + layoutContent + '[/one_half]';

			if( $currentShortcode === 'one-half-last' )
				shortcode = '[one_half_last]' + layoutContent + '[/one_half_last]';

			if( $currentShortcode === 'one-third' )
				shortcode = '[one_third]' + layoutContent + '[/one_third]';

			if( $currentShortcode === 'one-third-last' )
				shortcode = '[one_third_last]' + layoutContent + '[/one_third_last]';

			if( $currentShortcode === 'one-fourth' )
				shortcode = '[one_fourth]' + layoutContent + '[/one_fourth]';

			if( $currentShortcode === 'one-fourth-last' )
				shortcode = '[one_fourth_last]' + layoutContent + '[/one_fourth_last]';

			if( $currentShortcode === 'two-third' )
				shortcode = '[two_third]' + layoutContent + '[/two_third]';

			if( $currentShortcode === 'two-third-last' )
				shortcode = '[two_third_last]' + layoutContent + '[/two_third_last]';

			if( $currentShortcode === 'three-fourth' )
				shortcode = '[three_fourth]' + layoutContent + '[/three_fourth]';

			if( $currentShortcode === 'three-fourth-last' )
				shortcode = '[three_fourth_last]' + layoutContent + '[/three_fourth_last]';
			
		/* -------------------------------------------------- */
		/*	Post Carousel
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'post-carousel' ) {

			var postCarouselTitle      = $('#post-carousel-title').val(),
				postCarouselLimit      = parseInt( $('#post-carousel-limit').val() ),
				postCarouselCategories = $('#post-carousel-categories').val();

			shortcode = '[post_carousel';

			if( postCarouselTitle )
				shortcode += ' title="' + postCarouselTitle + '"';

			if( postCarouselLimit )
				shortcode += ' limit="' + postCarouselLimit + '"';

			if(postCarouselCategories[0] !== '')
				shortcode += ' categories="' + postCarouselCategories + '"';

			shortcode += ']';

		/* -------------------------------------------------- */
		/*	Project Carousel
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'projects-carousel' ) {

			var projectsCarouselTitle      = $('#projects-carousel-title').val(),
				projectsCarouselLimit      = parseInt( $('#projects-carousel-limit').val() ),
				projectsCarouselCategories = $('#projects-carousel-categories').val();

			shortcode = '[projects_carousel';

			if( projectsCarouselTitle )
				shortcode += ' title="' + projectsCarouselTitle + '"';

			if( projectsCarouselLimit )
				shortcode += ' limit="' + projectsCarouselLimit + '"';

			if( projectsCarouselCategories[0] !== '' )
				shortcode += ' categories="' + projectsCarouselCategories + '"';

			shortcode += ']';

		/* -------------------------------------------------- */
		/*	Portfolio
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'portfolio' ) {

			var portfolioColumns = $('#portfolio-columns').val(),
				portfolioLimit   = parseInt( $('#portfolio-limit').val() ),
				portfolioCategories = $('#portfolio-categories').val();

			shortcode = '[portfolio';

			shortcode += ' columns="' + portfolioColumns + '"';

			if( portfolioLimit )
				shortcode += ' limit="' + portfolioLimit + '"';

			if( portfolioCategories[0] !== '' )
				shortcode += ' categories="' + portfolioCategories + '"';

			shortcode += ']';

		/* -------------------------------------------------- */
		/*	Slider
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'slider' ) {

			var sliderId = $('#slider-id').val();

			shortcode = '[slider';

			shortcode += ' id="' + sliderId + '"';

			shortcode += ']';

		/* -------------------------------------------------- */
		/*	Team member
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'team-member' ) {

			var teamMemberId     = $('#team-member-id').val(),
				teamMemberColumn = $('#team-member-column').val(),
				teamMemberLast   = $('#team-member-last').is(':checked');

			shortcode = '[team_member';

			shortcode += ' id="' + teamMemberId + '"';

			shortcode += ' column="' + teamMemberColumn + '"';

			if( teamMemberLast )
				shortcode += ' last="last"';

			shortcode += ']';
		
		/* -------------------------------------------------- */
		/*	Post list
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'postlist' ) {

			var category = $('#postlist-category').val(),
				postNum = $('#postlist-num').val();

			shortcode = '[postlist';
			
			shortcode += ' category="' + category + '"';
			
			shortcode += ' num="' + postNum + '"'; 

			shortcode += ']';
			
		/* -------------------------------------------------- */
		/*	Page list
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'pagelist' ) {

			var pageId = $('#pagelist-page-id').val();

			shortcode = '[pagelist';
			
			shortcode += ' page_id="' + pageId + '"';

			shortcode += ']';	

		/* -------------------------------------------------- */
		/*	Fullwidth map
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'fullwidth-map' ) {

			var mapContent = $('#fullwidth-map-content').val();

			shortcode = '[fullwidth_map]' + mapContent + '[/fullwidth_map]';

		/* -------------------------------------------------- */
		/*	Raw
		/* -------------------------------------------------- */

		} else if( $currentShortcode === 'raw' ) {

			var rawContent = $('#raw-content').val();

			shortcode = '[raw]' + rawContent + '[/raw]';

		}
		
		// Insert shortcode and remove popup
		tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcode);
		tb_remove();

	});

	// Show current shortcode
	function sp_show_option( option ) {

		$('.option').hide();
		$( option ).show();

	}

})( jQuery );