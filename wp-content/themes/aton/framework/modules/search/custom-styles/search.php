<?php

if (!function_exists('aton_qodef_search_opener_icon_size')) {

	function aton_qodef_search_opener_icon_size()
	{

		if (aton_qodef_options()->getOptionValue('header_search_icon_size')) {
			echo aton_qodef_dynamic_css('.qodef-search-opener', array(
				'font-size' => aton_qodef_filter_px(aton_qodef_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_opener_icon_size');

}

if (!function_exists('aton_qodef_search_opener_icon_colors')) {

	function aton_qodef_search_opener_icon_colors()
	{

		if (aton_qodef_options()->getOptionValue('header_search_icon_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-opener', array(
				'color' => aton_qodef_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (aton_qodef_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'color' => aton_qodef_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (aton_qodef_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-light-header .qodef-top-bar .qodef-search-opener', array(
				'color' => aton_qodef_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (aton_qodef_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => aton_qodef_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (aton_qodef_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener', array(
				'color' => aton_qodef_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (aton_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => aton_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_opener_icon_colors');

}

if (!function_exists('aton_qodef_search_opener_icon_background_colors')) {

	function aton_qodef_search_opener_icon_background_colors()
	{

		if (aton_qodef_options()->getOptionValue('search_icon_background_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-opener', array(
				'background-color' => aton_qodef_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (aton_qodef_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'background-color' => aton_qodef_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_opener_icon_background_colors');
}

if (!function_exists('aton_qodef_search_opener_text_styles')) {

	function aton_qodef_search_opener_text_styles()
	{
		$text_styles = array();

		if (aton_qodef_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = aton_qodef_options()->getOptionValue('search_icon_text_color');
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = aton_qodef_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = aton_qodef_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = aton_qodef_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo aton_qodef_dynamic_css('.qodef-search-icon-text', $text_styles);
		}
		if (aton_qodef_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => aton_qodef_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_opener_text_styles');
}

if (!function_exists('aton_qodef_search_opener_spacing')) {

	function aton_qodef_search_opener_spacing()
	{
		$spacing_styles = array();

		if (aton_qodef_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo aton_qodef_dynamic_css('.qodef-search-opener', $spacing_styles);
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_opener_spacing');
}

if (!function_exists('aton_qodef_search_bar_background')) {

	function aton_qodef_search_bar_background()
	{

		if (aton_qodef_options()->getOptionValue('search_background_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-cover, .qodef-fullscreen-search-holder .qodef-fullscreen-search-table, .qodef-fullscreen-search-overlay', array(
				'background-color' => aton_qodef_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_bar_background');
}

if (!function_exists('aton_qodef_search_text_styles')) {

	function aton_qodef_search_text_styles()
	{
		$text_styles = array();

		if (aton_qodef_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = aton_qodef_options()->getOptionValue('search_text_color');
		}
		if (aton_qodef_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (aton_qodef_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = aton_qodef_options()->getOptionValue('search_text_texttransform');
		}
		if (aton_qodef_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (aton_qodef_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = aton_qodef_options()->getOptionValue('search_text_fontstyle');
		}
		if (aton_qodef_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = aton_qodef_options()->getOptionValue('search_text_fontweight');
		}
		if (aton_qodef_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo aton_qodef_dynamic_css('.qodef-search-cover input[type="text"], .qodef-fullscreen-search .qodef-form-holder .qodef-search-field', $text_styles);
		}
		if (aton_qodef_options()->getOptionValue('search_text_disabled_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-field::-webkit-input-placeholder, .qodef-search-cover .qodef-search-field::-webkit-input-placeholder', array(
				'color' => aton_qodef_options()->getOptionValue('search_text_disabled_color')
			));
            echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-field::-moz-input-placeholder, .qodef-search-cover .qodef-search-field::-moz-input-placeholder', array(
                'color' => aton_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
            echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-field:-moz-input-placeholder, .qodef-search-cover .qodef-search-field:-moz-input-placeholder', array(
                'color' => aton_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
            echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-field:-ms-input-placeholder, .qodef-search-cover .qodef-search-field:-ms-input-placeholder', array(
                'color' => aton_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_text_styles');
}

if (!function_exists('aton_qodef_search_icon_styles')) {

	function aton_qodef_search_icon_styles()
	{

		if (aton_qodef_options()->getOptionValue('search_icon_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-submit', array(
				'color' => aton_qodef_options()->getOptionValue('search_icon_color')
			));
		}
		if (aton_qodef_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-submit:hover', array(
				'color' => aton_qodef_options()->getOptionValue('search_icon_hover_color')
			));
		}

		if (aton_qodef_options()->getOptionValue('search_icon_size') !== '') {
			echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-search-submit', array(
				'font-size' => aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_icon_styles');
}

if (!function_exists('aton_qodef_search_close_icon_styles')) {

	function aton_qodef_search_close_icon_styles()
	{

		if (aton_qodef_options()->getOptionValue('search_close_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i, .qodef-fullscreen-search-close i', array(
				'color' => aton_qodef_options()->getOptionValue('search_close_color')
			));
		}
		if (aton_qodef_options()->getOptionValue('search_close_hover_color') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i:hover, .qodef-fullscreen-search-close i:hover', array(
				'color' => aton_qodef_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (aton_qodef_options()->getOptionValue('search_close_size') !== '') {
			echo aton_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i, .qodef-fullscreen-search-close i', array(
				'font-size' => aton_qodef_filter_px(aton_qodef_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('aton_qodef_style_dynamic', 'aton_qodef_search_close_icon_styles');
}

if (!function_exists('aton_qodef_search_border_bottom_styles')) {

    function aton_qodef_search_border_bottom_styles()
    {
        if (aton_qodef_options()->getOptionValue('search_border_color') !== '') {
            echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-field-holder', array(
                'border-bottom-color' => aton_qodef_options()->getOptionValue('search_border_color')
            ));
        }

        if (aton_qodef_options()->getOptionValue('search_border_focus_color') !== '') {
            echo aton_qodef_dynamic_css('.qodef-fullscreen-search-holder .qodef-field-holder .qodef-line', array(
                'background-color' => aton_qodef_options()->getOptionValue('search_border_focus_color')
            ));
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_search_border_bottom_styles');
}