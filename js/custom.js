//Cufon.replace('.cat-article h2, .news-wrap .items h4, .cufon', { fontFamily: 'Myriad Pro Bold', hover: true });

// If JavaScript is enabled remove 'no-js' class and give 'js' class
jQuery('html').removeClass('no-js').addClass('js');
jQuery(document).ready(function($) {
	
	/* ---------------------------------------------------------------------- */
	/*	Dropdown menu navigation
	/* ---------------------------------------------------------------------- */ 
	jQuery("ul.menu-nav a").removeAttr('title');
	jQuery("ul.menu-nav ul").css({display: "none"}); // Opera Fix
	jQuery("ul.menu-nav li").each(function()
		{	
	var jQuerysubmeun = jQuery(this).find('ul:first');
	jQuery(this).hover(function()
		{	
	jQuerysubmeun.stop().css({overflow:"hidden", height:"auto", display:"none", paddingTop:0}).slideDown(250, function()
		{
	jQuery(this).css({overflow:"visible", height:"auto"});
		});	
		},
	function()
		{	
	jQuerysubmeun.stop().slideUp(250, function()
		{	
	jQuery(this).css({overflow:"hidden", display:"none"});
			});
		});	
	});
	
	//MISC
	
	if ($(".menu-item:last")){
		$(".menu-item:last").html($(".menu-item:last").html().replace("</a> |","</a>")); 
	} 
	$("#footer-cols .widget:last").addClass("last");  
	/* ---------------------------------------------------------------------- */
	/*	Featured Slideshow Cycle
	/* ---------------------------------------------------------------------- */
	$(function() {
        $('#slideshow').cycle({
            fx:     'fade',
            easing:   'easeInQuad',
            speed: 3000,
            delay: 3,
            pause:    1,  // pause on hover
            timeout: 3000,
            slideExpr: '.item-slide'
      });
    }); 
    /* ---------------------------------------------------------------------- */
	/*	Sticky-footer js
	/* ---------------------------------------------------------------------- */ 
	$('.content-sticky-1 .stick-arrow-up a').click(function(){
	$(this).parent().parent().stop().animate({
                                            margin: '35px 0px'
	                                 },1000);
	$('.content-sticky-2').stop().animate({
                                            margin: '0px'
	                                 },1200);

	});
	$('.content-sticky-2 .stick-arrow-up a').click(function(){
	$(this).parent().parent().stop().animate({
                                            margin: '41px 0px'
	                                 },1000);
	$('.content-sticky-1').stop().animate({
                                            margin: '0px'
	                                 },1200);

	}); 

	/* ---------------------------------------------------------------------- */
	/*	Detect touch device
	/* ---------------------------------------------------------------------- */

	(function() {

		if( Modernizr.touch ) {

			$('body').addClass('touch-device');

		}

	})();
	
	/* ---------------------------------------------------------------------- */
	/*	FitVids
	/* ---------------------------------------------------------------------- */

	(function() {

		function adjustVideos() {

			var $videos = $('.fluid-width-video-wrapper');

			$videos.each(function() {

				var $this        = $(this)
					playerWidth  = $this.parent().width(),
					playerHeight = playerWidth / $this.data('aspectRatio');

				$this.css({
					'height' : playerHeight,
					'width'  : playerWidth
				})

			});

		}

		$('.container').each(function(){

			var selectors  = [
				"iframe[src^='http://player.vimeo.com']",
				"iframe[src^='http://www.youtube.com']",
				"iframe[src^='http://blip.tv']",
				"iframe[src^='http://www.kickstarter.com']", 
				"object",
				"embed"
			],
				$allVideos = $(this).find(selectors.join(','));

			$allVideos.each(function(){

				var $this = $(this);

				if ( $this.hasClass('vjs-tech') || this.tagName.toLowerCase() == 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length )
					return;

				var videoHeight = $this.attr('height') || $this.height(),
					videoWidth  = $this.attr('width') || $this.width();

				$this.css({
					'height' : '100%',
					'width'  : '100%'
				}).removeAttr('height').removeAttr('width')
				.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css({
					'height' : videoHeight,
					'width'  : videoWidth
				}).data( 'aspectRatio', videoWidth / videoHeight );

				adjustVideos();

			});

		});

		$(window).on('resize', function() {

			var timer = window.setTimeout( function() {
				window.clearTimeout( timer );
				adjustVideos();
			}, 30 );

		});

	})();
	
	/* ---------------------------------------------------------------------- */
	/*	AudioPlayerV1
	/* ---------------------------------------------------------------------- */

	(function() {

		var $player = $('.APV1_wrapper');

		if( $player.length ) {

			function adjustPlayer( resize ){
			
				$player.each(function( i ) {

					var $this            = $(this),
						$lis             = $this.children('li'),
						$progressBar     = $this.children('li.APV1_container'),
						playerWidth      = $this.parent().width(),
						lisWidth         = 0;

					if( !resize )
						$this.prev('audio').hide()

					if( playerWidth <= 300 ) {
						$this.addClass('APV1_player_width_300');
					} else {
						$this.removeClass('APV1_player_width_300');
					}

					if( playerWidth <= 250 ) {
						$this.addClass('APV1_player_width_250');
					} else {
						$this.removeClass('APV1_player_width_250');
					}

					if( playerWidth <= 200 ) {
						$this.addClass('APV1_player_width_200');
					} else {
						$this.removeClass('APV1_player_width_200');
					}

					$lis.each(function() {

						var $li = $(this);
						lisWidth += $li.width()

					});

					$this.width( $this.parent().width() );
					$progressBar.width( playerWidth - ( lisWidth - $progressBar.width() ) );
					
				});

			}

			adjustPlayer();

			$(window).on('resize', function() {

				var timer = window.setTimeout( function() {
					window.clearTimeout( timer );
					adjustPlayer( resize = true );
				}, 30 );

			});

		}

	})();
	
	/* ---------------------------------------------------------------------- */
	/*	Toggle Content
	/* ---------------------------------------------------------------------- */
	
	$(".toggle-container").hide(); 
	$(".trigger").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});
	$(".trigger").click(function(){
		$(this).next(".toggle-container").slideToggle();
	});
	
	/* ---------------------------------------------------------------------- */
	/*	Accordion Content
	/* ---------------------------------------------------------------------- */

	(function() {

		var $container = $('.acc-container'),
			$trigger   = $('.acc-trigger');

		$container.hide();
		$trigger.first().addClass('active').next().show();

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		
		$trigger.on('click', function(e) {
			if( $(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				$(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();
	
	/* ---------------------------------------------------- */
	/*	Content Tabs
	/* ---------------------------------------------------- */

	(function() {

		var $tabsNav    = $('.tabs-nav'),
			$tabsNavLis = $tabsNav.children('li'),
			$tabContent = $('.tab-content');

		$tabsNav.each(function() {
			var $this = $(this);

			$this.next().children('.tab-content').hide()
												 .first().show()
												 .css('background-color','#ffffff');

			$this.children('li').first().addClass('active').show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
				 .addClass('active');
			
			$this.parent().next().children('.tab-content').hide()
														  .siblings( $this.find('a').attr('href') ).fadeIn()
														  .css('background-color','#ffffff');

			e.preventDefault();
		});

	})();
	
});