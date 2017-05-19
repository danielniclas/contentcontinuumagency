<?php
if(!function_exists('aton_qodef_tabs_typography_styles')){
	function aton_qodef_tabs_typography_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = aton_qodef_options()->getOptionValue('tabs_font_family');
		
		if(aton_qodef_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = aton_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = aton_qodef_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = aton_qodef_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = aton_qodef_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = aton_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = aton_qodef_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        $font_size = aton_qodef_options()->getOptionValue('tabs_font_size');
        if($font_size !== '') {
            $tabs_tipography_array['font-size'] = aton_qodef_filter_px($font_size).'px';
        }

        echo aton_qodef_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('aton_qodef_style_dynamic', 'aton_qodef_tabs_typography_styles');
}

//DARK TABS

if(!function_exists('aton_qodef_dark_tabs_inital_color_styles')){
	function aton_qodef_dark_tabs_inital_color_styles(){
		$selector = '.qodef-tabs.qodef-dark-tab .qodef-tabs-nav li a';
		$styles = array();
		
		if(aton_qodef_options()->getOptionValue('dark_tabs_color')) {
            $styles['color'] = aton_qodef_options()->getOptionValue('dark_tabs_color');
        }
		if(aton_qodef_options()->getOptionValue('dark_tabs_back_color')) {
            $styles['background-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color');
        }
		
		echo aton_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab.qodef-dark-tab .qodef-tabs-nav li a';
        $styles_vertical = array();

        if(aton_qodef_options()->getOptionValue('dark_tabs_back_color')) {
            $styles_vertical['border-right-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_vertical, $styles_vertical);

        $selector_horizontal = '.qodef-tabs.qodef-horizontal-tab.qodef-dark-tab .qodef-tab-container';
        $styles_horizontal = array();

        if(aton_qodef_options()->getOptionValue('dark_tabs_back_color')) {
            $styles_horizontal['border-top-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_horizontal, $styles_horizontal);

        $selector_horizontal_flexible = '.qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-dark-tab .qodef-tabs-nav li a';
        $styles_horizontal_flexible = array();

        if(aton_qodef_options()->getOptionValue('dark_tabs_back_color')) {
            $styles_horizontal_flexible['border-bottom-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_horizontal_flexible, $styles_horizontal_flexible);
	}
	add_action('aton_qodef_style_dynamic', 'aton_qodef_dark_tabs_inital_color_styles');
}
if(!function_exists('aton_qodef_dark_tabs_active_color_styles')){
	function aton_qodef_dark_tabs_active_color_styles(){
		$selector = '.qodef-tabs.qodef-dark-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-dark-tab .qodef-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(aton_qodef_options()->getOptionValue('dark_tabs_color_active')) {
            $styles['color'] = aton_qodef_options()->getOptionValue('dark_tabs_color_active');
        }
		if(aton_qodef_options()->getOptionValue('dark_tabs_back_color_active')) {
            $styles['background-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color_active');
        }

        echo aton_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab.qodef-dark-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-vertical-tab.qodef-dark-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles_vertical = array();

        if(aton_qodef_options()->getOptionValue('dark_tabs_back_color_active')) {
            $styles_vertical['border-right-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color_active');
        }
        echo aton_qodef_dynamic_css($selector_vertical, $styles_vertical);

        $selector_horizontal_flexible = '.qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-dark-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-dark-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles_horizontal_flexible = array();

        if(aton_qodef_options()->getOptionValue('dark_tabs_back_color_active')) {
            $styles_horizontal_flexible['border-bottom-color'] = aton_qodef_options()->getOptionValue('dark_tabs_back_color_active');
        }
        echo aton_qodef_dynamic_css($selector_horizontal_flexible, $styles_horizontal_flexible);

	}
	add_action('aton_qodef_style_dynamic', 'aton_qodef_dark_tabs_active_color_styles');
}

//LIGHT TABS

if(!function_exists('aton_qodef_light_tabs_inital_color_styles')){
    function aton_qodef_light_tabs_inital_color_styles(){
        $selector = '.qodef-tabs.qodef-light-tab .qodef-tabs-nav li a';
        $styles = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_color')) {
            $styles['color'] = aton_qodef_options()->getOptionValue('light_tabs_color');
        }
        if(aton_qodef_options()->getOptionValue('light_tabs_back_color')) {
            $styles['background-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color');
        }

        echo aton_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab.qodef-light-tab .qodef-tabs-nav li a';
        $styles_vertical = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_back_color')) {
            $styles_vertical['border-right-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_vertical, $styles_vertical);

        $selector_horizontal = '.qodef-tabs.qodef-horizontal-tab.qodef-light-tab .qodef-tab-container';
        $styles_horizontal = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_back_color')) {
            $styles_horizontal['border-top-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_horizontal, $styles_horizontal);

        $selector_horizontal_flexible = '.qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-light-tab .qodef-tabs-nav li a';
        $styles_horizontal_flexible = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_back_color')) {
            $styles_horizontal_flexible['border-bottom-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color');
        }
        echo aton_qodef_dynamic_css($selector_horizontal_flexible, $styles_horizontal_flexible);
    }
    add_action('aton_qodef_style_dynamic', 'aton_qodef_light_tabs_inital_color_styles');
}
if(!function_exists('aton_qodef_light_tabs_active_color_styles')){
    function aton_qodef_light_tabs_active_color_styles(){
        $selector = '.qodef-tabs.qodef-light-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-light-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_color_active')) {
            $styles['color'] = aton_qodef_options()->getOptionValue('light_tabs_color_active');
        }
        if(aton_qodef_options()->getOptionValue('light_tabs_back_color_active')) {
            $styles['background-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color_active');
        }

        echo aton_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab.qodef-light-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-vertical-tab.qodef-light-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles_vertical = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_back_color_active')) {
            $styles_vertical['border-right-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color_active');
        }
        echo aton_qodef_dynamic_css($selector_vertical, $styles_vertical);

        $selector_horizontal_flexible = '.qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-light-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-horizontal-tab.qodef-flexible-tab.qodef-light-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles_horizontal_flexible = array();

        if(aton_qodef_options()->getOptionValue('light_tabs_back_color_active')) {
            $styles_horizontal_flexible['border-bottom-color'] = aton_qodef_options()->getOptionValue('light_tabs_back_color_active');
        }
        echo aton_qodef_dynamic_css($selector_horizontal_flexible, $styles_horizontal_flexible);

    }
    add_action('aton_qodef_style_dynamic', 'aton_qodef_light_tabs_active_color_styles');
}