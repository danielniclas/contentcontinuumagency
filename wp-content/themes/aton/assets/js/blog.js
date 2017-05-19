(function($) {
    "use strict";


    var blog = {};
    qodef.modules.blog = blog;

    blog.qodefInitAudioPlayer = qodefInitAudioPlayer;
    blog.qodefInitBlogMasonry = qodefInitBlogMasonry;
    blog.qodefInitBlogGallery = qodefInitBlogGallery;
    blog.qodefBlogGalleryAnimation = qodefBlogGalleryAnimation;
    blog.qodefInitBlogLoadMore = qodefInitBlogLoadMore;

    blog.qodefOnDocumentReady = qodefOnDocumentReady;
    blog.qodefOnWindowLoad = qodefOnWindowLoad;
    blog.qodefOnWindowResize = qodefOnWindowResize;
    blog.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitAudioPlayer();
        qodefInitBlogMasonry();
        qodefInitBlogGallery();
        qodefInitBlogLoadMore();

    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitBlogMasonry();
        qodefInitBlogGallery();
        qodefInitBlogGalleryAppear();
        qodefInitBlogNarrowAppear();
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



    function qodefInitAudioPlayer() {

        var players = $('audio.qodef-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }


    function qodefInitBlogMasonry() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-masonry');

            container.waitForImages(function() {
                container.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    resizable: false,
                    packery: {
                        columnWidth: '.qodef-blog-masonry-grid-sizer',
                        gutter: '.qodef-blog-masonry-grid-gutter'
                    }
                });
                container.addClass('qodef-appeared');
            });

            var filters = $('.qodef-filter-blog-holder');
            $('.qodef-filter').click(function() {
                var filter = $(this);
                var selector = filter.attr('data-filter');
                filters.find('.qodef-active').removeClass('qodef-active');
                filter.addClass('qodef-active');
                container.isotope({filter: selector});
                return false;
            });
        }
    }

    function qodefInitBlogGallery() {

        if($('.qodef-blog-holder.qodef-blog-type-gallery').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-gallery');

            container.waitForImages(function() {
                container.isotope({
                    layoutMode: 'masonry',
                    itemSelector: 'article',
                    resizable: false,
                    packery: {
                        columnWidth: '.qodef-blog-masonry-grid-sizer',
                        gutter: '.qodef-blog-masonry-grid-gutter'
                    }
                });
                container.addClass('qodef-appeared');
                qodefBlogGalleryAnimation();
            });
        }
    }

    /*
     *  Animate blog  articles on appear
     */
    function qodefInitBlogGalleryAppear() {
        var blogList = $('.qodef-blog-holder.qodef-blog-type-gallery');
        if(blogList.length){
            blogList.each(function(){
                var thisblogList = $(this),
                    article = thisblogList.find('article'),
                    animateCycle = 7, // rewind delay
                    animateCycleCounter = 0;
                article.each(function(){
                    var thisArticle = $(this);
                    setTimeout(function(){
                        thisArticle.appear(function(){
                            animateCycleCounter ++;
                            if(animateCycleCounter == animateCycle) {
                                animateCycleCounter = 0;
                            }
                            setTimeout(function(){
                                thisArticle.addClass('qodef-appeared');
                            },animateCycleCounter * 200);
                        },{accX: 0, accY: 0});
                    },150);
                });
            });
        }
    }

    /*
     *  Animate blog narrow  articles on appear
     */
    function qodefInitBlogNarrowAppear() {
        var blogList = $('.qodef-blog-holder.qodef-blog-type-narrow');
        if(blogList.length){
            blogList.each(function(){
                var thisblogList = $(this),
                    article = thisblogList.find('article'),
                    pagination = thisblogList.find('.qodef-pagination');

                article.each(function(){
                    var thisArticle = $(this);
                        thisArticle.appear(function(){
                            thisArticle.addClass('qodef-appeared');
                        },{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
                });

                pagination.appear(function(){
                    pagination.addClass('qodef-appeared');
                },{accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});

            });
        }
    }

    function qodefBlogGalleryAnimation() {
        var blogGalleries = $('.qodef-blog-holder.qodef-blog-type-gallery');
        if (blogGalleries.length) {
            blogGalleries.each(function(){
                var blogGallery = $(this),
                    articles = blogGallery.find('article'),
                    size = blogGallery.find('.qodef-blog-gallery-grid-sizer').width() * 1.25;

                articles.each(function(){
                    var article = $(this),
                        excerpt = article.find('.qodef-post-excerpt'),
                        excerptHeight = parseInt(excerpt.outerHeight(true)),
                        category = article.find('.qodef-post-info-category'),
                        date = article.find('.qodef-post-info-date'),
                        separator = article.find('.qodef-post-text-inner-separator'),
                        title = article.find('.qodef-post-title');

                    article.css('height', size);

                    category.css({'transform':'translateY('+excerptHeight+'px)'});
                    date.css({'transform':'translateY('+excerptHeight+'px)'});
                    separator.css({'transform':'translateY('+excerptHeight+'px)'});
                    title.css({'transform':'translateY('+excerptHeight+'px)'});


                    article.mouseenter(function(){
                        category.css({'transform':'translateY(0px)'});
                        date.css({'transform':'translateY(0px)'});
                        separator.css({'transform':'translateY(0px)'});
                        title.css({'transform':'translateY(0px)'});
                        excerpt.css({'visibility':'visible','opacity':'1'});
                    });
                    article.mouseleave(function(){
                        category.css({'transform':'translateY('+excerptHeight+'px)'});
                        date.css({'transform':'translateY('+excerptHeight+'px)'});
                        separator.css({'transform':'translateY('+excerptHeight+'px)'});
                        title.css({'transform':'translateY('+excerptHeight+'px)'});
                        excerpt.css({'visibility':'hidden', 'opacity':'0'});
                    });
                });
            });
        }
    }

    function qodefInitBlogLoadMore(){
        var blogHolder = $('.qodef-blog-holder.qodef-blog-load-more');

        if(blogHolder.length){
            blogHolder.each(function(){
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;

                var loadMoreButton = thisBlogHolder.find('.qodef-load-more-ajax-pagination .qodef-btn');
                if(blogHolder.hasClass('qodef-blog-type-masonry') || blogHolder.hasClass('qodef-blog-type-gallery') ){
                    loadMoreButton = blogHolder.next().find('.qodef-btn');
                }
                maxNumPages =  thisBlogHolder.data('max-pages');

                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var loadMoreDatta = getBlogLoadMoreData(thisBlogHolder);
                    nextPage = loadMoreDatta.nextPage;

                    if(nextPage <= maxNumPages){
                        var ajaxData = setBlogLoadMoreAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: QodefAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml =  response.html;
                                thisBlogHolder.waitForImages(function(){

                                    if(thisBlogHolder.hasClass('qodef-blog-type-masonry')){
                                        thisBlogHolder.append(responseHtml);
                                        //Timeouts are fixes for chrome - too much space below loaded items, firefox - overlapping images
                                        setTimeout(function() {
                                            qodef.modules.blog.qodefInitAudioPlayer();
                                            qodef.modules.common.qodefOwlSlider();
                                            qodef.modules.common.qodefFluidVideo();
                                        },100);
                                        setTimeout(function() {
                                            thisBlogHolder.isotope('reloadItems').isotope({sortBy: 'original-order'});
                                        },110);
                                    }
                                    else if(thisBlogHolder.hasClass('qodef-blog-type-gallery')){
                                        thisBlogHolder.append(responseHtml);
                                        qodefBlogGalleryAnimation();
                                        qodefInitBlogGalleryAppear();
                                        thisBlogHolder.isotope('reloadItems').isotope({sortBy: 'original-order',layoutMode: 'masonry'});
                                    }
                                    else{
                                        thisBlogHolder.find('article:last').after(responseHtml); // Append the new content
                                        setTimeout(function() {
                                            qodef.modules.blog.qodefInitAudioPlayer();
                                            qodef.modules.common.qodefOwlSlider();
                                            qodef.modules.common.qodefFluidVideo();
                                        },400);
                                    }

                                });
                            }
                        });
                    }

                    if(nextPage === maxNumPages){
                        loadMoreButton.hide();
                    }

                });
            });
        }
    }
    function getBlogLoadMoreData(container){

        var returnValue = {};

        returnValue.nextPage = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.blogType = '';
        returnValue.archiveCategory = '';
        returnValue.archiveAuthor = '';
        returnValue.archiveTag = '';
        returnValue.archiveDay = '';
        returnValue.archiveMonth = '';
        returnValue.archiveYear = '';

        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('post-number') !== 'undefined' && container.data('post-number') !== false) {
            returnValue.number = container.data('post-number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }
        if (typeof container.data('blog-type') !== 'undefined' && container.data('blog-type') !== false) {
            returnValue.blogType = container.data('blog-type');
        }
        if (typeof container.data('archive-category') !== 'undefined' && container.data('archive-category') !== false) {
            returnValue.archiveCategory = container.data('archive-category');
        }
        if (typeof container.data('archive-author') !== 'undefined' && container.data('archive-author') !== false) {
            returnValue.archiveAuthor = container.data('archive-author');
        }
        if (typeof container.data('archive-tag') !== 'undefined' && container.data('archive-tag') !== false) {
            returnValue.archiveTag = container.data('archive-tag');
        }
        if (typeof container.data('archive-day') !== 'undefined' && container.data('archive-day') !== false) {
            returnValue.archiveDay = container.data('archive-day');
        }
        if (typeof container.data('archive-month') !== 'undefined' && container.data('archive-month') !== false) {
            returnValue.archiveMonth = container.data('archive-month');
        }
        if (typeof container.data('archive-year') !== 'undefined' && container.data('archive-year') !== false) {
            returnValue.archiveYear = container.data('archive-year');
        }

        return returnValue;

    }

    function setBlogLoadMoreAjaxData(container){

        var returnValue = {
            action: 'aton_qodef_blog_load_more',
            nextPage: container.nextPage,
            number: container.number,
            category: container.category,
            blogType: container.blogType,
            archiveCategory: container.archiveCategory,
            archiveAuthor: container.archiveAuthor,
            archiveTag: container.archiveTag,
            archiveDay: container.archiveDay,
            archiveMonth: container.archiveMonth,
            archiveYear: container.archiveYear
        };

        return returnValue;
    }


})(jQuery);