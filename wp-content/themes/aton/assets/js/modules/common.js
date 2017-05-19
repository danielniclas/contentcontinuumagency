(function($) {
	"use strict";

    var common = {};
    qodef.modules.common = common;

    common.qodefIsTouchDevice = qodefIsTouchDevice;
    common.qodefDisableSmoothScrollForMac = qodefDisableSmoothScrollForMac;
    common.qodefFluidVideo = qodefFluidVideo;
    common.qodefPreloadBackgrounds = qodefPreloadBackgrounds;
    common.qodefPrettyPhoto = qodefPrettyPhoto;
    common.qodefCheckHeaderStyleOnScroll = qodefCheckHeaderStyleOnScroll;
    common.qodefInitFullScreenSection = qodefInitFullScreenSection;
    common.qodefInitParallax = qodefInitParallax;
    //common.qodefSmoothScroll = qodefSmoothScroll;
    common.qodefEnableScroll = qodefEnableScroll;
    common.qodefDisableScroll = qodefDisableScroll;
    common.qodefWheel = qodefWheel;
    common.qodefKeydown = qodefKeydown;
    common.qodefPreventDefaultValue = qodefPreventDefaultValue;
    common.qodefOwlSlider = qodefOwlSlider;
    common.qodefInitSelfHostedVideoPlayer = qodefInitSelfHostedVideoPlayer;
    common.qodefSelfHostedVideoSize = qodefSelfHostedVideoSize;
    common.qodefInitBackToTop = qodefInitBackToTop;
    common.qodefBackButtonShowHide = qodefBackButtonShowHide;
    common.qodefSmoothTransition = qodefSmoothTransition;
    common.qodefRowScrollingText = qodefRowScrollingText;
    common.qodefCheckSVG = qodefCheckSVG;

    common.qodefOnDocumentReady = qodefOnDocumentReady;
    common.qodefOnWindowLoad = qodefOnWindowLoad;
    common.qodefOnWindowResize = qodefOnWindowResize;
    common.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefIsTouchDevice();
        qodefDisableSmoothScrollForMac();
        qodefFluidVideo();
        qodefPreloadBackgrounds();
        qodefPrettyPhoto();
        qodefInitElementsAnimations();
        qodefInitAnchor().init();
        qodefInitVideoBackground();
        qodefInitVideoBackgroundSize();
        qodefSetContentBottomMargin();
        //qodefSmoothScroll();
        qodefOwlSlider();
        qodefInitSelfHostedVideoPlayer();
        qodefSelfHostedVideoSize();
        qodefInitBackToTop();
        qodefBackButtonShowHide();
        qodefRowScrollingText();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefCheckHeaderStyleOnScroll(); //called on load since all content needs to be loaded in order to calculate row's position right
        qodefInitFullScreenSection();
        qodefInitParallax();
        qodefSmoothTransition();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {
        qodefInitVideoBackgroundSize();
        qodefSelfHostedVideoSize();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {
        
    }

    /*
     ** Disable shortcodes animation on appear for touch devices
     */
    function qodefIsTouchDevice() {
        if(Modernizr.touch && !qodef.body.hasClass('qodef-no-animations-on-touch')) {
            qodef.body.addClass('qodef-no-animations-on-touch');
        }
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function qodefDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && qodef.body.hasClass('qodef-smooth-scroll')) {
            qodef.body.removeClass('qodef-smooth-scroll');
        }
    }

	function qodefFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}

    /**
     * Init Owl Carousel
     */
    function qodefOwlSlider() {

        var sliders = $('.qodef-owl-slider');

        if (sliders.length) {
            sliders.each(function(){

                var slider = $(this);
                slider.owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: false,
                    dots: false,
                    nav: true,
                    navText: [
                        '<span class="qodef-prev-icon"><i class="ion-arrow-left-c"></i></span>',
                        '<span class="qodef-next-icon"><i class="ion-arrow-right-c"></i></span>'
                    ]
                });

            });
        }

    }


    /*
     *	Preload background images for elements that have 'qodef-preload-background' class
     */
    function qodefPreloadBackgrounds(){

        $(".qodef-preload-background").each(function() {
            var preloadBackground = $(this);
            if(preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function(){
                        preloadBackground.removeClass('qodef-preload-background');
                    });
                }
            }else{
                $(window).load(function(){ preloadBackground.removeClass('qodef-preload-background'); }); //make sure that qodef-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    function qodefPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="ion-arrow-right-c"></span></a> \
                                            <a class="pp_previous" href="#"><span class="ion-arrow-left-c"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     *	Check header style on scroll, depending on row settings
     */
    function qodefCheckHeaderStyleOnScroll(){

        if($('[data-qodef_header_style]').length > 0 && qodef.body.hasClass('qodef-header-style-on-scroll')) {

            var waypointSelectors = $('.wpb_row.qodef-section');
            var changeStyle = function(element){
                (element.data("qodef_header_style") !== undefined) ? qodef.body.removeClass('qodef-dark-header qodef-light-header').addClass(element.data("qodef_header_style")) : qodef.body.removeClass('qodef-dark-header qodef-light-header').addClass(''+qodef.defaultHeaderStyle);
            };

            waypointSelectors.waypoint( function(direction) {
                if(direction === 'down') { changeStyle($(this.element)); }
            }, { offset: 0});

            waypointSelectors.waypoint( function(direction) {
                if(direction === 'up') { changeStyle($(this.element)); }
            }, { offset: function(){
                return -$(this.element).outerHeight();
            } });
        }
    }

    /*
     *	Start animations on elements
     */
    function qodefInitElementsAnimations(){

        var touchClass = $('.qodef-no-animations-on-touch'),
            noAnimationsOnTouch = true,
            elements = $('.qodef-grow-in, .qodef-fade-in-down, .qodef-element-from-fade, .qodef-element-from-left, .qodef-element-from-right, .qodef-element-from-top, .qodef-element-from-bottom, .qodef-flip-in, .qodef-x-rotate, .qodef-z-rotate, .qodef-y-translate, .qodef-fade-in, .qodef-fade-in-left-x-rotate'),
            clasess,
            animationClass,
            animationData;

        if (touchClass.length) {
            noAnimationsOnTouch = false;
        }

        if(elements.length > 0 && noAnimationsOnTouch){
            elements.each(function(){
				$(this).appear(function() {
					animationData = $(this).data('animation');
					if(typeof animationData !== 'undefined' && animationData !== '') {
						animationClass = animationData;
						$(this).addClass(animationClass+'-on');
					}
                },{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
            });
        }

    }


/*
 ** Sections with parallax background image
 */
function qodefInitParallax(){

    if(qodef.htmlEl.is('.no-touch') && $('.qodef-parallax-section-holder').length){

        $('.qodef-parallax-section-holder').each(function() {

            var parallaxElement = $(this);
            var speed = parallaxElement.data('qodef-parallax-speed')*0.4;

            parallaxElement.parallax("50%", speed);
        });
    }
}

/*
 ** Sections with parallax background image
 */
function qodefInitFullScreenSection(){
    if($('.qodef-full-screen-height-section').length) {
        $('.qodef-full-screen-height-section').each(function() {
            var fullScreenSection = $(this);
            fullScreenSection.height(qodef.windowHeight);
        });
    }
}

/*
 **	Anchor functionality
 */
var qodefInitAnchor = qodef.modules.common.qodefInitAnchor = function() {

    /**
     * Set active state on clicked anchor
     * @param anchor, clicked anchor
     */
    var setActiveState = function(anchor){

        $('.qodef-main-menu .qodef-active-item, .qodef-mobile-nav .qodef-active-item, .qodef-vertical-menu .qodef-active-item, .qodef-fullscreen-menu .qodef-active-item').removeClass('qodef-active-item');
        anchor.parent().addClass('qodef-active-item');

        $('.qodef-main-menu a, .qodef-mobile-nav a, .qodef-vertical-menu a, .qodef-fullscreen-menu a').removeClass('current');
        anchor.addClass('current');
    };

    /**
     * Check anchor active state on scroll
     */
    var checkActiveStateOnScroll = function(){

        $('[data-qodef-anchor]').waypoint( function(direction) {
            if(direction === 'down') {
                setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("qodef-anchor")+"']"));
            }
        }, { offset: '50%' });

        $('[data-qodef-anchor]').waypoint( function(direction) {
            if(direction === 'up') {
                setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("qodef-anchor")+"']"));
            }
        }, { offset: function(){
            return -($(this.element).outerHeight() - 150);
        } });

    };

    /**
     * Check anchor active state on load
     */
    var checkActiveStateOnLoad = function(){
        var hash = window.location.hash.split('#')[1];

        if(hash !== "" && $('[data-qodef-anchor="'+hash+'"]').length > 0){
            //triggers click which is handled in 'anchorClick' function
            var linkURL = window.location.href.split('#')[0]+"#"+hash;
            if($("a[href='"+linkURL+"']").length){ //if there is a link on page with such href
                $("a[href='"+linkURL+"']").trigger( "click" );
            }else{ //than create a fake link and click it
                var link = $('<a/>').attr({'href':linkURL,'class':'qodef-anchor'}).appendTo('body');
                link.trigger('click');
            }
        }
    };

    /**
     * Calculate header height to be substract from scroll amount
     * @param anchoredElementOffset, anchorded element offest
     */
    var headerHeihtToSubtract = function(anchoredElementOffset, anchoredElementPosition){

        var headerHeight;
        if(qodef.windowWidth > 1024) {

            if (qodef.modules.header.behaviour == 'qodef-sticky-header-on-scroll-down-up') {
                (anchoredElementOffset > qodef.modules.header.stickyAppearAmount) ? qodef.modules.header.isStickyVisible = true : qodef.modules.header.isStickyVisible = false;
            }

            if (qodef.modules.header.behaviour == 'qodef-sticky-header-on-scroll-up') {
                (anchoredElementOffset > qodef.scroll) ? qodef.modules.header.isStickyVisible = false : '';
            }

            headerHeight = qodef.modules.header.isStickyVisible ? qodefGlobalVars.vars.qodefStickyHeaderTransparencyHeight : qodefPerPageVars.vars.qodefHeaderTransparencyHeight;
        }

        else {
            if(anchoredElementPosition === 'down') {
                headerHeight = anchoredElementOffset > qodef.modules.header.stickyMobileAppearAmount ? 0 : qodef.modules.header.stickyMobileAppearAmount;
            }
            else {
                headerHeight = qodefGlobalVars.vars.qodefMobileHeaderHeight;
            }
        }
        return headerHeight;
    };

    /**
     * Handle anchor click
     */
    var anchorClick = function() {
        qodef.document.on("click", ".qodef-main-menu a, .qodef-vertical-menu a, .qodef-fullscreen-menu a, .qodef-btn, .qodef-anchor, .qodef-mobile-nav a", function() {
            var scrollAmount;
            var anchor = $(this);
            var hash = anchor.prop("hash").split('#')[1];

            if(hash !== "" && $('[data-qodef-anchor="' + hash + '"]').length > 0 /*&& anchor.attr('href').split('#')[0] == window.location.href.split('#')[0]*/) {

                var anchoredElementOffset = $('[data-qodef-anchor="' + hash + '"]').offset().top;
                var anchoredElementPosition = anchoredElementOffset > qodef.scroll ? 'down' : 'up';
                scrollAmount = $('[data-qodef-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset, anchoredElementPosition);

                setActiveState(anchor);

                qodef.html.stop().animate({
                    scrollTop: Math.round(scrollAmount)
                }, 1000, function() {
                    //change hash tag in url
                    if(history.replaceState) { history.replaceState(null, null, '#'+hash); }
                });
                return false;
            }
        });
    };

    return {
        init: function() {
            if($('[data-qodef-anchor]').length) {
                anchorClick();
                checkActiveStateOnScroll();
                $(window).load(function() { checkActiveStateOnLoad(); });
            }
        }
    };

};

/*
 **	Video background initialization
 */
function qodefInitVideoBackground(){

    $('.qodef-section .qodef-video-wrap .qodef-video').mediaelementplayer({
        enableKeyboard: false,
        iPadUseNativeControls: false,
        pauseOtherPlayers: false,
        // force iPhone's native controls
        iPhoneUseNativeControls: false,
        // force Android's native controls
        AndroidUseNativeControls: false
    });

    //mobile check
    if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
        qodefInitVideoBackgroundSize();
        $('.qodef-section .qodef-mobile-video-image').show();
        $('.qodef-section .qodef-video-wrap').remove();
    }
}

    /*
     **	Calculate video background size
     */
    function qodefInitVideoBackgroundSize(){

        $('.qodef-section .qodef-video-wrap').each(function(){

            var element = $(this);
            var sectionWidth = element.closest('.qodef-section').outerWidth();
            element.width(sectionWidth);

            var sectionHeight = element.closest('.qodef-section').outerHeight();
            qodef.minVideoWidth = qodef.videoRatio * (sectionHeight+20);
            element.height(sectionHeight);

            var scaleH = sectionWidth / qodef.videoWidthOriginal;
            var scaleV = sectionHeight / qodef.videoHeightOriginal;
            var scale =  scaleV;
            if (scaleH > scaleV)
                scale =  scaleH;
            if (scale * qodef.videoWidthOriginal < qodef.minVideoWidth) {scale = qodef.minVideoWidth / qodef.videoWidthOriginal;}

            element.find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * qodef.videoWidthOriginal +2));
            element.find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * qodef.videoHeightOriginal +2));
            element.scrollLeft((element.find('video').width() - sectionWidth) / 2);
            element.find('.mejs-overlay, .mejs-poster').scrollTop((element.find('video').height() - (sectionHeight)) / 2);
            element.scrollTop((element.find('video').height() - sectionHeight) / 2);
        });

    }

    /*
     **	Set content bottom margin because of the uncovering footer
     */
    function qodefSetContentBottomMargin(){
        var uncoverFooter = $('.qodef-footer-uncover');

        if(uncoverFooter.length){
            $('.qodef-content').css('margin-bottom', $('.qodef-footer-inner').height());
        }
    }

	/*
	** Initiate Smooth Scroll
	*/
	//function qodefSmoothScroll(){
	//
	//	if(qodef.body.hasClass('qodef-smooth-scroll')){
	//
	//		var scrollTime = 0.4;			//Scroll time
	//		var scrollDistance = 300;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll
	//
	//		var mobile_ie = -1 !== navigator.userAgent.indexOf("IEMobile");
	//
	//		var smoothScrollListener = function(event){
	//			event.preventDefault();
	//
	//			var delta = event.wheelDelta / 120 || -event.detail / 3;
	//			var scrollTop = qodef.window.scrollTop();
	//			var finalScroll = scrollTop - parseInt(delta * scrollDistance);
	//
	//			TweenLite.to(qodef.window, scrollTime, {
	//				scrollTo: {
	//					y: finalScroll, autoKill: !0
	//				},
	//				ease: Power1.easeOut,
	//				autoKill: !0,
	//				overwrite: 5
	//			});
	//		};
	//
	//		if (!$('html').hasClass('touch') && !mobile_ie) {
	//			if (window.addEventListener) {
	//				window.addEventListener('mousewheel', smoothScrollListener, false);
	//				window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
	//			}
	//		}
	//	}
	//}

    function qodefDisableScroll() {

        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', qodefWheel, false);
        }
        window.onmousewheel = document.onmousewheel = qodefWheel;
        document.onkeydown = qodefKeydown;

        if(qodef.body.hasClass('qodef-smooth-scroll')){
            window.removeEventListener('mousewheel', smoothScrollListener, false);
            window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function qodefEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', qodefWheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;

        if(qodef.body.hasClass('qodef-smooth-scroll')){
            window.addEventListener('mousewheel', smoothScrollListener, false);
            window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function qodefWheel(e) {
        qodefPreventDefaultValue(e);
    }

    function qodefKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                qodefPreventDefaultValue(e);
                return;
            }
        }
    }

    function qodefPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function qodefInitSelfHostedVideoPlayer() {

        var players = $('.qodef-self-hosted-video');
            players.mediaelementplayer({
                audioWidth: '100%'
            });
    }

	function qodefSelfHostedVideoSize(){

		$('.qodef-self-hosted-video-holder .qodef-video-wrap').each(function(){
			var thisVideo = $(this);

			var videoWidth = thisVideo.closest('.qodef-self-hosted-video-holder').outerWidth();
			var videoHeight = videoWidth / qodef.videoRatio;

			if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
				thisVideo.parent().width(videoWidth);
				thisVideo.parent().height(videoHeight);
			}

			thisVideo.width(videoWidth);
			thisVideo.height(videoHeight);

			thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
			thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
		});
	}

    function qodefToTopButton(a) {

        var b = $("#qodef-back-to-top");
        b.removeClass('off on');
        if (a === 'on') { b.addClass('on'); } else { b.addClass('off'); }
    }

    function qodefBackButtonShowHide(){
        qodef.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) { d = b + c / 2; } else { d = 1; }
            if (d < 1e3) { qodefToTopButton('off'); } else { qodefToTopButton('on'); }
        });
    }

    function qodefInitBackToTop(){
        var backToTopButton = $('#qodef-back-to-top');
        backToTopButton.on('click',function(e){
            e.preventDefault();
            qodef.html.animate({scrollTop: 0}, qodef.window.scrollTop()/3, 'linear');
        });
    }

    function qodefSmoothTransition() {
        if (qodef.body.hasClass('qodef-smooth-page-transitions')) {

            //check for preload animation
            if (qodef.body.hasClass('qodef-smooth-page-transitions-preloader')) {
                var loader = $('body > .qodef-smooth-transition-loader.qodef-mimic-ajax');
                loader.fadeOut(500);
                $(window).bind("pageshow", function (event) {
                    if (event.originalEvent.persisted) {
                        loader.fadeOut(500);
                    }
                });
            }

            //check for fade out animation
            if (qodef.body.hasClass('qodef-smooth-page-transitions-fadeout')) {
                if ($('a').parent().hasClass('qodef-blog-load-more-button') || $('a').parent().hasClass('qodef-ptf-list-load-more')) {
                    return false;
                }
                $('a').click(function (e) {
                    var a = $(this);
                    if (
                        e.which == 1 && // check if the left mouse button has been pressed
                        a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                        (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                        (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                        (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                    ) {
                        e.preventDefault();
                        $('.qodef-wrapper-inner').fadeOut(1000, function () {
                            window.location = a.attr('href');
                        });
                    }
                });
            }
        }
    }

    function qodefCheckSVG(element) {
        var el = element;
        var drawingEnabled = el.data('svg-drawing');
        var animationDelay;

        if(typeof el.data('animation-delay') !== 'undefined') {
            animationDelay = el.data('animation-delay');
        }

        if (drawingEnabled == 'yes') {
            qodefDrawSVG(el, animationDelay);
        }

    }

    /**
     * Function for drawing slider svgs. Based on Codrops article 'SVG Drawing Animation'
     */
    function qodefDrawSVG(svg, delay) {

        var animationDelay = typeof delay !== 'undefined' ? delay : 0;


        var svgs = Array.prototype.slice.call( svg.find('svg') ),
            svgArr = new Array(),
            resizeTimeout;
        // the svgs already shown...

        svgs.forEach( function( el, i ) {
            var svg = new SVGEl( el );
            svgArr[i] = svg;
            setTimeout(function( el ) {
                return function() {
                    svg.render();
                };
            }( el ), animationDelay );//0ms pause before drawing
        } );
    }

    var docElem = window.document.documentElement;
    window.requestAnimFrame = function(){

        return (
            window.requestAnimationFrame       ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame    ||
            window.oRequestAnimationFrame      ||
            window.msRequestAnimationFrame     ||
            function(/* function */ callback){
                window.setTimeout(callback, 1000 / 60);
            }
        );
    }();
    window.cancelAnimFrame = function(){

        return (
            window.cancelAnimationFrame       ||
            window.webkitCancelAnimationFrame ||
            window.mozCancelAnimationFrame    ||
            window.oCancelAnimationFrame      ||
            window.msCancelAnimationFrame     ||
            function(id){
                window.clearTimeout(id);
            }
        );
    }();
    function SVGEl( el ) {

        this.el = el;
        var frameRate = $(this.el).closest('.qodef-svg-frames-class').data('svg-frames');
        this.image = this.el.previousElementSibling;
        this.current_frame = 0;
        this.total_frames = frameRate;//number of frames defines speed of drawing
        this.path = new Array();
        this.length = new Array();
        this.handle = 0;
        this.init();
    }
    SVGEl.prototype.init = function() {

        var self = this;
        [].slice.call( this.el.querySelectorAll( 'path' ) ).forEach( function( path, i ) {
            self.path[i] = path;
            var l = self.path[i].getTotalLength();
            self.length[i] = l;
            self.path[i].style.strokeDasharray = l + ' ' + l;
            self.path[i].style.strokeDashoffset = l;
        } );
    };
    SVGEl.prototype.render = function() {

        if( this.rendered ) return;
        this.rendered = true;
        this.draw();
    };
    SVGEl.prototype.draw = function() {

        var self = this,
            progress = this.current_frame/this.total_frames;
        if (progress > 1) {
            window.cancelAnimFrame(this.handle);
        } else {
            this.current_frame++;
            for(var j=0, len = this.path.length; j<len;j++){
                this.path[j].style.strokeDashoffset = Math.floor(this.length[j] * (1 - progress));
            }
            this.handle = window.requestAnimFrame(function() { self.draw(); });
        }
    };

   
    function qodefRowScrollingText(){

        var element = $('.qodef-marquee-holder');
        element.each(function() {
            var holder = $(this);
            var inner = $(this).find('.qodef-marquee');
            holder.scrollForever({
                placeholder: 0,
                speed: 1000,
                delayTime: 0,
                continuous: true,
                num: 1
            });
            holder.animate({opacity: "1"}, 300);

        });
    }

})(jQuery);


