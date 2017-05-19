<?php
if(!function_exists('aton_qodef_design_styles')) {
    /**
     * Generates general custom styles
     */
    function aton_qodef_design_styles() {

        $preload_background_styles = array();

        if(aton_qodef_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.aton_qodef_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(QODE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo aton_qodef_dynamic_css('.qodef-preload-background', $preload_background_styles);

		if (aton_qodef_options()->getOptionValue('google_fonts')){
			$font_family = aton_qodef_options()->getOptionValue('google_fonts');
			if(aton_qodef_is_font_option_valid($font_family)) {
				echo aton_qodef_dynamic_css('body', array('font-family' => aton_qodef_get_font_option_val($font_family)));
			}
		}

        if(aton_qodef_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.qodef-comment-holder .qodef-comment-text .comment-edit-link:hover',
                '.qodef-comment-holder .qodef-comment-text .comment-reply-link:hover',
                '.qodef-comment-holder .qodef-comment-text .replay:hover',
                '.comment-respond .comment-reply-title #cancel-comment-reply-link',
                '.comment-respond .logged-in-as a:hover',
                '.qodef-pagination li.qodef-pagination-next:hover .qodef-pagination-arrow',
                '.qodef-pagination li.qodef-pagination-number a:hover',
                '.qodef-pagination li.qodef-pagination-number.active span',
                '.qodef-pagination li.qodef-pagination-prev:hover .qodef-pagination-arrow',
                '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header) .qodef-main-menu>ul>li.qodef-active-item>a',
                '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header) .qodef-main-menu>ul>li:hover>a',
                '.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-main-menu>ul>li.qodef-active-item>a',
                '.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-main-menu>ul>li:hover>a',
                '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header) .qodef-main-menu>ul>li.qodef-active-item>a',
                '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header) .qodef-main-menu>ul>li:hover>a',
                '.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-main-menu>ul>li.qodef-active-item>a',
                '.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-main-menu>ul>li:hover>a',
                '.qodef-menu-area .qodef-featured-icon',
                '.qodef-sticky-nav .qodef-featured-icon',
                '.qodef-top-bar .widget .qodef-icon-shortcode a:hover span',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle-click .second .inner ul li a:hover',
                '.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
                '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu>ul>li>a:hover',
                '.qodef-title .qodef-title-holder .qodef-breadcrumbs a:hover',
                '.qodef-side-menu .widget_rss li a.rsswidget:hover',
                '.qodef-side-menu a:not(.qbutton):hover',
                '.qodef-side-menu li:hover',
                '.qodef-side-menu p:hover',
                'nav.qodef-fullscreen-menu ul li a:hover',
                'nav.qodef-fullscreen-menu ul li ul li a:hover',
                '.qodef-search-cover .qodef-search-close a:hover',
                '.qodef-fullscreen-search-holder .qodef-search-submit:hover',
                '.qodef-fullscreen-search-holder .qodef-fullscreen-search-close-container a:hover',
                '.qodef-portfolio-single-holder .qodef-portfolio-single-nav .qodef-portfolio-next:hover span:last-child',
                '.qodef-portfolio-single-holder .qodef-portfolio-single-nav .qodef-portfolio-prev:hover span:first-child',
                '.qodef-portfolio-single-holder .qodef-portfolio-social-holder .qodef-portfolio-like a.liked i',
                '.qodef-portfolio-single-holder .qodef-portfolio-social-holder .qodef-portfolio-like a:hover i',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode:hover .qodef-icon-element',
                '.qodef-icon-shortcode.circle .qodef-icon-element',
                '.qodef-icon-shortcode.square .qodef-icon-element',
                '.qodef-icon-shortcode .qodef-icon-element',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon i',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon span',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-top>div a:hover',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-post-info-author a:hover',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-blog-like:hover i:first-child',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-blog-like:hover span:first-child',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-post-info-comments-holder:hover span:first-child',
                '.qodef-dropcaps',
                '.qodef-interactive-banner-holder .qodef-interactive-banner-icon',
                '.qodef-social-share-holder.qodef-list li a span:hover',
                '.qodef-sidebar .widget ul li a:hover',
                '.qodef-sidebar .widget td a:hover',
                '.qodef-sidebar .widget.widget_search #searchform button[type=submit]:hover',
                '.qodef-sidebar .widget.widget_search #searchform input[type=submit]:hover',
                '.qodef-sidebar .widget.qodef-latest-posts-widget .qodef-blog-list-holder ul>li.qodef-blog-list-item a:hover',
                '.qodef-twitter-widget li .qodef-tweet-icon-holder .qodef-social-twitter',
                'footer .widget.qodef-latest-posts-widget .qodef-blog-list-holder ul>li.qodef-blog-list-item .qodef-item-title a:hover',
                '.qodef-blog-holder article.sticky .qodef-post-title a',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-post-info-author a:hover',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover i:first-child',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover span:first-child',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-post-info-comments-holder:hover span:first-child',
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-post-info-author a:hover',
                '.qodef-blog-holder.qodef-blog-single .qodef-blog-single-navigation .qodef-blog-single-nav-title .qodef-blog-navigation-info:hover',
                '.qodef-blog-holder.qodef-blog-type-narrow article.sticky .qodef-post-title a',
                '.qodef-blog-holder.qodef-blog-type-narrow article .qodef-post-info.qodef-section-bottom .qodef-post-info-author a:hover',
                '.qodef-blog-holder.qodef-blog-type-narrow article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover i:first-child',
                '.qodef-blog-holder.qodef-blog-type-narrow article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover span:first-child',
                '.qodef-blog-holder.qodef-blog-type-narrow article .qodef-post-info.qodef-section-bottom .qodef-post-info-comments-holder:hover span:first-child',
                '.qodef-blog-holder.qodef-blog-type-narrow article.format-link .qodef-post-mark .qodef-link-mark',
                '.qodef-blog-holder.qodef-blog-type-narrow article.format-quote .qodef-post-mark .qodef-link-mark',
                '.qodef-blog-holder.qodef-blog-type-narrow article.format-link .qodef-post-mark .qodef-quote-mark',
                '.qodef-blog-holder.qodef-blog-type-narrow article.format-quote .qodef-post-mark .qodef-quote-mark',
                '.qodef-filter-blog-holder li.qodef-active',
                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-minus:hover',
                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-plus:hover',
                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-minus:hover',
                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-plus:hover',
                '.qodef-single-product-summary .product_meta>span a:hover',
                'ul.products>.product .qodef-pl-text-wrapper .qodef-pl-categories-holder a:hover',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-content mark',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-content a:hover',
                '.widget.woocommerce.widget_rating_filter a:hover .star-rating',
                '.widget.woocommerce.widget_recent_reviews a:hover',
                '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
                '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
                '.qodef-shopping-cart-dropdown .qodef-item-info-holder .remove:hover',
                '.qodef-side-menu #lang_sel ul ul a:hover span',
                'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu > ul > li:hover > a',
                '.qodef-main-menu > ul > li.qodef-active-item > a',
                '.qodef-mobile-header .qodef-mobile-nav ul li.current-menu-ancestor > a',
                '.qodef-mobile-header .qodef-mobile-nav ul li.current-menu-item > a',
                '.qodef-mobile-header .qodef-mobile-nav a:hover, .qodef-mobile-header .qodef-mobile-nav h4:hover',
                '.qodef-mobile-header .qodef-mobile-menu-opener.qodef-mobile-menu-opened a',
                '.qodef-side-menu-button-opener:hover',
                '.qodef-search-opener:hover'
            );

            $color_important_selector = array(
                '.qodef-light-header .qodef-top-bar .widget a:hover',
                '.qodef-dark-header .qodef-top-bar .widget a:hover',
                '.qodef-light-header .qodef-vertical-menu-area .widget span:hover'
            );

            $background_color_selector = array(
                '.qodef-st-loader .pulse',
                '.qodef-st-loader .double_pulse .double-bounce1',
                '.qodef-st-loader .double_pulse .double-bounce2',
                '.qodef-st-loader .cube',
                '.qodef-st-loader .rotating_cubes .cube1',
                '.qodef-st-loader .rotating_cubes .cube2',
                '.qodef-st-loader .stripes>div',
                '.qodef-st-loader .wave>div',
                '.qodef-st-loader .two_rotating_circles .dot1',
                '.qodef-st-loader .two_rotating_circles .dot2',
                '.qodef-st-loader .five_rotating_circles .container1>div',
                '.qodef-st-loader .five_rotating_circles .container2>div',
                '.qodef-st-loader .five_rotating_circles .container3>div',
                '.qodef-st-loader .atom .ball-1:before',
                '.qodef-st-loader .atom .ball-2:before',
                '.qodef-st-loader .atom .ball-3:before',
                '.qodef-st-loader .atom .ball-4:before',
                '.qodef-st-loader .clock .ball:before',
                '.qodef-st-loader .mitosis .ball',
                '.qodef-st-loader .lines .line1',
                '.qodef-st-loader .lines .line2',
                '.qodef-st-loader .lines .line3',
                '.qodef-st-loader .lines .line4',
                '.qodef-st-loader .fussion .ball',
                '.qodef-st-loader .fussion .ball-1',
                '.qodef-st-loader .fussion .ball-2',
                '.qodef-st-loader .fussion .ball-3',
                '.qodef-st-loader .fussion .ball-4',
                '.qodef-st-loader .wave_circles .ball',
                '.qodef-st-loader .pulse_circles .ball',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '#qodef-back-to-top>span',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle-click .second:after',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:before',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:after',
                '.qodef-fullscreen-menu-opener:hover .qodef-line',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode.circle:hover',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode.square:hover',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content',
                '.qodef-testimonials.owl-carousel .owl-dots .owl-dot.active span',
                '.qodef-testimonials.owl-carousel.light .owl-dots .owl-dot.active span',
                '.qodef-testimonials.owl-carousel.cards.dark .owl-dot.active span',
                '.qodef-pricing-tables .qodef-price-table .qodef-price-table-inner ul li.qodef-table-title',
                '.qodef-pie-chart-doughnut-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-pie-chart-pie-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-tabs.qodef-light-tab .qodef-tabs-nav li.ui-state-active a',
                '.qodef-tabs.qodef-light-tab .qodef-tabs-nav li.ui-state-hover a',
                '.qodef-btn.qodef-btn-solid .qodef-hover-background',
                '.qodef-image-gallery .owl-dots .owl-dot.active span',
                '.qodef-dropcaps.qodef-circle',
                '.qodef-dropcaps.qodef-square',
                '.qodef-social-share-holder.qodef-list.circle li a span:hover',
                '.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener',
                '.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown ul li a:hover span',
                '.qodef-sidebar .widget.widget_tag_cloud a:hover',
                '.qodef-blog-holder article.format-link .qodef-post-text',
                '.qodef-blog-holder article.format-quote .qodef-post-text',
                '.qodef-blog-holder.qodef-blog-single .qodef-author-description .qodef-author-social-holder a span:hover',
                '.woocommerce-page .qodef-content a.added_to_cart:hover',
                '.woocommerce-page .qodef-content a.button:hover',
                '.woocommerce-page .qodef-content button[type=submit]:hover',
                '.woocommerce-page .qodef-content input[type=submit]:hover',
                'div.woocommerce a.added_to_cart:hover',
                'div.woocommerce a.button:hover',
                'div.woocommerce button[type=submit]:hover',
                'div.woocommerce input[type=submit]:hover',
                '.woocommerce .qodef-onsale',
                '.woocommerce .qodef-out-of-stock',
                'ul.products>.product .added_to_cart:hover',
                'ul.products>.product .button:hover',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
                '.widget.woocommerce.widget_product_tag_cloud a:hover',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-view-cart'
            );

            $background_color_important_selector = array(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):not([class*=qodef-btn-hover]):hover'
            );

            $border_color_selector = array(
                '.qodef-st-loader .pulse_circles .ball',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.qodef-pagination li.qodef-pagination-number a:hover:after',
                '.qodef-pagination li.qodef-pagination-number.active span:after',
                '.qodef-side-menu .qodef-subscription-form .wpcf7-text:focus',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode.circle:hover',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode.square:hover',
                '.qodef-btn.qodef-btn-solid .qodef-hover-background',
                '.qodef-sidebar .widget.widget_tag_cloud a:hover',
                '.woocommerce-page .qodef-content a.added_to_cart:hover',
                '.woocommerce-page .qodef-content a.button:hover',
                '.woocommerce-page .qodef-content button[type=submit]:hover',
                '.woocommerce-page .qodef-content input[type=submit]:hover',
                'div.woocommerce a.added_to_cart:hover',
                'div.woocommerce a.button:hover',
                'div.woocommerce button[type=submit]:hover',
                'div.woocommerce input[type=submit]:hover',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
                '.widget.woocommerce.widget_product_tag_cloud a:hover'
            );

            $border_color_important_selector = array(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-border-hover):not([class*=qodef-btn-hover]):hover'
            );

            echo aton_qodef_dynamic_css($color_selector, array('color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($color_important_selector, array('color' => aton_qodef_options()->getOptionValue('first_color').'!important'));
            echo aton_qodef_dynamic_css('::selection', array('background' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css('::-moz-selection', array('background' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($background_color_selector, array('background-color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($background_color_important_selector, array('background-color' => aton_qodef_options()->getOptionValue('first_color').'!important'));
            echo aton_qodef_dynamic_css($border_color_selector, array('border-color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($border_color_important_selector, array('border-color' => aton_qodef_options()->getOptionValue('first_color').'!important'));

            $border_top_color_selector = array(
                '.qodef-drop-down .second',
            );
            $border_right_color_selector = array(
                '.qodef-tabs.qodef-light-tab.qodef-vertical-tab .qodef-tabs-nav li.ui-state-active a',
                '.qodef-tabs.qodef-light-tab.qodef-vertical-tab .qodef-tabs-nav li.ui-state-hover a'
            );
            $border_bottom_color_selector = array(
                '.qodef-testimonials.cards .qodef-testimonial-separator',
                '.qodef-testimonials.cards.light .qodef-testimonial-separator',
                '.qodef-tabs.qodef-light-tab.qodef-horizontal-tab.qodef-flexible-tab .qodef-tabs-nav li.ui-state-active a',
                '.qodef-tabs.qodef-light-tab.qodef-horizontal-tab.qodef-flexible-tab .qodef-tabs-nav li.ui-state-hover a',
            );
            $stroke_selector = array(
                '.qodef-svg-separator-holder .qodef-svg-separator svg',
            );
            echo aton_qodef_dynamic_css($border_top_color_selector, array('border-top-color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($border_right_color_selector, array('border-right-color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => aton_qodef_options()->getOptionValue('first_color')));
            echo aton_qodef_dynamic_css($stroke_selector, array('stroke' => aton_qodef_options()->getOptionValue('first_color')));

        }

		if (aton_qodef_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
                '.qodef-content .qodef-content-inner > .qodef-container',
                '.qodef-content .qodef-content-inner > .qodef-full-width'
			);
			echo aton_qodef_dynamic_css($background_color_selector, array('background-color' => aton_qodef_options()->getOptionValue('page_background_color')));
		}

		if (aton_qodef_options()->getOptionValue('selection_color')) {
			echo aton_qodef_dynamic_css('::selection', array('background' => aton_qodef_options()->getOptionValue('selection_color')));
			echo aton_qodef_dynamic_css('::-moz-selection', array('background' => aton_qodef_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (aton_qodef_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = aton_qodef_options()->getOptionValue('page_background_color_in_box');
		}

		if (aton_qodef_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(aton_qodef_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (aton_qodef_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(aton_qodef_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (aton_qodef_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (aton_qodef_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo aton_qodef_dynamic_css('.qodef-boxed .qodef-wrapper', $boxed_background_style);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_design_styles');
}

if (!function_exists('aton_qodef_h1_styles')) {

    function aton_qodef_h1_styles() {

        $h1_styles = array();

        if(aton_qodef_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = aton_qodef_options()->getOptionValue('h1_color');
        }
        if(aton_qodef_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h1_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = aton_qodef_options()->getOptionValue('h1_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = aton_qodef_options()->getOptionValue('h1_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = aton_qodef_options()->getOptionValue('h1_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo aton_qodef_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h1_styles');
}

if (!function_exists('aton_qodef_h2_styles')) {

    function aton_qodef_h2_styles() {

        $h2_styles = array();

        if(aton_qodef_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = aton_qodef_options()->getOptionValue('h2_color');
        }
        if(aton_qodef_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h2_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = aton_qodef_options()->getOptionValue('h2_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = aton_qodef_options()->getOptionValue('h2_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = aton_qodef_options()->getOptionValue('h2_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo aton_qodef_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h2_styles');
}

if (!function_exists('aton_qodef_h3_styles')) {

    function aton_qodef_h3_styles() {

        $h3_styles = array();

        if(aton_qodef_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = aton_qodef_options()->getOptionValue('h3_color');
        }
        if(aton_qodef_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h3_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = aton_qodef_options()->getOptionValue('h3_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = aton_qodef_options()->getOptionValue('h3_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = aton_qodef_options()->getOptionValue('h3_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo aton_qodef_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h3_styles');
}

if (!function_exists('aton_qodef_h4_styles')) {

    function aton_qodef_h4_styles() {

        $h4_styles = array();

        if(aton_qodef_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = aton_qodef_options()->getOptionValue('h4_color');
        }
        if(aton_qodef_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h4_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = aton_qodef_options()->getOptionValue('h4_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = aton_qodef_options()->getOptionValue('h4_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = aton_qodef_options()->getOptionValue('h4_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo aton_qodef_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h4_styles');
}

if (!function_exists('aton_qodef_h5_styles')) {

    function aton_qodef_h5_styles() {

        $h5_styles = array();

        if(aton_qodef_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = aton_qodef_options()->getOptionValue('h5_color');
        }
        if(aton_qodef_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h5_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = aton_qodef_options()->getOptionValue('h5_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = aton_qodef_options()->getOptionValue('h5_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = aton_qodef_options()->getOptionValue('h5_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo aton_qodef_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h5_styles');
}

if (!function_exists('aton_qodef_h6_styles')) {

    function aton_qodef_h6_styles() {

        $h6_styles = array();

        if(aton_qodef_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = aton_qodef_options()->getOptionValue('h6_color');
        }
        if(aton_qodef_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('h6_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = aton_qodef_options()->getOptionValue('h6_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = aton_qodef_options()->getOptionValue('h6_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = aton_qodef_options()->getOptionValue('h6_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo aton_qodef_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_h6_styles');
}

if (!function_exists('aton_qodef_text_styles')) {

    function aton_qodef_text_styles() {

        $text_styles = array();

        if(aton_qodef_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = aton_qodef_options()->getOptionValue('text_color');
        }
        if(aton_qodef_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('text_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('text_fontsize')).'px';
        }
        if(aton_qodef_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('text_lineheight')).'px';
        }
        if(aton_qodef_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = aton_qodef_options()->getOptionValue('text_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = aton_qodef_options()->getOptionValue('text_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = aton_qodef_options()->getOptionValue('text_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo aton_qodef_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_text_styles');
}

if (!function_exists('aton_qodef_link_styles')) {

    function aton_qodef_link_styles() {

        $link_styles = array();

        if(aton_qodef_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = aton_qodef_options()->getOptionValue('link_color');
        }
        if(aton_qodef_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = aton_qodef_options()->getOptionValue('link_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = aton_qodef_options()->getOptionValue('link_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = aton_qodef_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo aton_qodef_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_link_styles');
}

if (!function_exists('aton_qodef_blog_single_title_styles')) {

    function aton_qodef_blog_single_title_styles() {

        $blog_single_title_styles = array();

        if(aton_qodef_options()->getOptionValue('blog_single_title_breadcrumbs_color') !== '') {
            $blog_single_title_styles['color'] = aton_qodef_options()->getOptionValue('blog_single_title_breadcrumbs_color');
        }

        if (!empty($blog_single_title_styles)) {
            echo aton_qodef_dynamic_css('.single-post .qodef-title .qodef-title-holder .qodef-breadcrumbs a,.single-post .qodef-title .qodef-title-holder .qodef-breadcrumbs span', $blog_single_title_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_blog_single_title_styles');
}

if (!function_exists('aton_qodef_link_hover_styles')) {

    function aton_qodef_link_hover_styles() {

        $link_hover_styles = array();

        if(aton_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = aton_qodef_options()->getOptionValue('link_hovercolor');
        }
        if(aton_qodef_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = aton_qodef_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo aton_qodef_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(aton_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = aton_qodef_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo aton_qodef_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_link_hover_styles');
}

if (!function_exists('aton_qodef_smooth_page_transition_styles')) {

    function aton_qodef_smooth_page_transition_styles($style) {
        $id = aton_qodef_get_page_id();
        $loader_style = array();
        $current_style = '';

        if(aton_qodef_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = aton_qodef_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.qodef-smooth-transition-loader');

        if (!empty($loader_style)) {
            $current_style .= aton_qodef_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();
        $spinner_color_style = array();

        if(aton_qodef_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = aton_qodef_get_meta_field_intersect('smooth_pt_spinner_color',$id);
            $spinner_color_style['color'] = aton_qodef_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.qodef-st-loader .pulse', 
            '.qodef-st-loader .double_pulse .double-bounce1', 
            '.qodef-st-loader .double_pulse .double-bounce2', 
            '.qodef-st-loader .cube', 
            '.qodef-st-loader .rotating_cubes .cube1', 
            '.qodef-st-loader .rotating_cubes .cube2', 
            '.qodef-st-loader .stripes > div', 
            '.qodef-st-loader .wave > div', 
            '.qodef-st-loader .two_rotating_circles .dot1', 
            '.qodef-st-loader .two_rotating_circles .dot2', 
            '.qodef-st-loader .five_rotating_circles .container1 > div', 
            '.qodef-st-loader .five_rotating_circles .container2 > div', 
            '.qodef-st-loader .five_rotating_circles .container3 > div', 
            '.qodef-st-loader .atom .ball-1:before', 
            '.qodef-st-loader .atom .ball-2:before', 
            '.qodef-st-loader .atom .ball-3:before', 
            '.qodef-st-loader .atom .ball-4:before', 
            '.qodef-st-loader .clock .ball:before', 
            '.qodef-st-loader .mitosis .ball', 
            '.qodef-st-loader .lines .line1', 
            '.qodef-st-loader .lines .line2', 
            '.qodef-st-loader .lines .line3', 
            '.qodef-st-loader .lines .line4', 
            '.qodef-st-loader .fussion .ball', 
            '.qodef-st-loader .fussion .ball-1', 
            '.qodef-st-loader .fussion .ball-2', 
            '.qodef-st-loader .fussion .ball-3', 
            '.qodef-st-loader .fussion .ball-4', 
            '.qodef-st-loader .wave_circles .ball', 
            '.qodef-st-loader .pulse_circles .ball' 
        );

        $spinner_color_selectors = array(
            '.qodef-st-loader .progress-loader-holder .progress-loader-holder-text',
        );

        if (!empty($spinner_style)) {
            $current_style .= aton_qodef_dynamic_css($spinner_selectors, $spinner_style);
        }
        if (!empty($spinner_color_style)) {
            $current_style .= aton_qodef_dynamic_css($spinner_color_selectors, $spinner_color_style);
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_smooth_page_transition_styles');
}