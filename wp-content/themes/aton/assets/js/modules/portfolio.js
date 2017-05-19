(function($) {
    'use strict';

    var portfolio = {};
    qodef.modules.portfolio = portfolio;

    portfolio.qodefOnDocumentReady = qodefOnDocumentReady;
    portfolio.qodefOnWindowLoad = qodefOnWindowLoad;
    portfolio.qodefOnWindowResize = qodefOnWindowResize;
    portfolio.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefPortfolioSingleMasonry();
        qodefInitPortfolioListPinterest();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefPortfolioSingleFollow().init();
        qodefInitPortfolioSingleAppear();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {

    }

    /**
     * Init Portfolio Single Masonry
     */
    function qodefPortfolioSingleMasonry(){
        var gallery = $('.qodef-portfolio-single-holder .qodef-masonry-gallery-holder .qodef-portfolio-media');
        var itemSelector = '.qodef-portfolio-single-holder .qodef-masonry-gallery-holder  .qodef-portfolio-single-media';
        var gridSizer = '.qodef-single-masonry-grid-sizer';

        if(gallery.length) {
            gallery.each(function () {
                var $this = $(this);
                $this.waitForImages(function () {
                    $this.animate({opacity: 1});
                    $this.isotope({
                        itemSelector: itemSelector,
                        masonry: {
                            columnWidth: gridSizer,
                            gutter: 0
                        },
                        sortBy : 'original-order'
                    });
                });
            });
        }
    }



    /**
     * Initializes portfolio single pinterest
     */
    function qodefInitPortfolioListPinterest(){

        var portList = $('.qodef-portfolio-single-holder .qodef-pinterest-gallery-holder');
        if(portList.length) {
            portList.each(function() {
                var thisPortList = $(this).children('.qodef-portfolio-media');
                qodefInitPinterest(thisPortList);
                $(window).resize(function(){
                    qodefInitPinterest(thisPortList);
                });
            });

        }
    }

    function qodefInitPinterest(container){
        container.waitForImages(function() {
            container.isotope({
                layoutMode: 'packery',
                itemSelector: '.qodef-portfolio-single-media',
                packery: {
                    columnWidth: '.qodef-single-masonry-grid-sizer'
                }
            });
        });
        container.addClass('qodef-appeared');

    }

    

    var qodefPortfolioSingleFollow = function() {

        var info = $('.qodef-follow-portfolio-info .small-images.qodef-portfolio-single-holder .qodef-portfolio-info-holder, ' +
            '.qodef-follow-portfolio-info .masonry-gallery-left.qodef-portfolio-single-holder .qodef-portfolio-info-holder');

        if (info.length) {
            var infoHolder = info.parent(),
                infoHolderOffset = infoHolder.offset().top,
                infoHolderHeight = infoHolder.height(),
                mediaHolder = $('.qodef-portfolio-media'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .qodef-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0,
                masondryAdd = info.parents('.masonry-gallery-left').length ? 32 : 0; //32 is for 2 * margin of 16px
        }

        var infoHolderPosition = function() {

            if(info.length) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(qodef.scroll > infoHolderOffset) {
                        info.animate({
                            marginTop: (qodef.scroll - (infoHolderOffset) + qodefGlobalVars.vars.qodefAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
                        });
                    }
                }

            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(qodef.scroll > infoHolderOffset) {

                        if(qodef.scroll + headerHeight + qodefGlobalVars.vars.qodefAddForAdminBar + infoHolderHeight + 20 < infoHolderOffset + mediaHolderHeight - masondryAdd) {    //20 px is for styling, spacing between header and info holder

                            //Calculate header height if header appears
                            if ($('.header-appear, .qodef-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .qodef-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (qodef.scroll - (infoHolderOffset) + qodefGlobalVars.vars.qodefAddForAdminBar + headerHeight + 20) //20 px is for styling, spacing between header and info holder
                            });
                            //Reset header height
                            headerHeight = 0;
                        }
                        else{
                            info.stop().animate({
                                marginTop: mediaHolderHeight - infoHolderHeight - masondryAdd
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {

            init : function() {

                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });

            }

        };

    };




    /*
     *  Animate portfolio  articles on appear
     */
    function qodefInitPortfolioSingleAppear() {

        var portfolioSingle = $('.qodef-portfolio-single-holder .qodef-animate-appear');

        if(portfolioSingle.length){

            portfolioSingle.each(function(){

                var thisPortfolioSingle = $(this),
                    media = thisPortfolioSingle.find('.qodef-portfolio-single-media ');

                    media.each(function(l) {
                        var thisMedia = $(this);
                        setTimeout(function(){
                            thisMedia.appear(function(){
                                setTimeout(function(){
                                    thisMedia.addClass('qodef-appeared');
                                },l * 120);
                            },{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
                        },30);
                    });

            });
        }

    }

})(jQuery);