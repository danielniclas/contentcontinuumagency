<?php
if(!function_exists('aton_qodef_icon_list_item_typography_styles')){
	function aton_qodef_icon_list_item_typography_styles(){
		$selector = '.qodef-icon-list-item .qodef-icon-list-text';
		$icon_list_item_tipography_array = array();
		$font_family = aton_qodef_options()->getOptionValue('icon_list_item_font_family');
		
		if(aton_qodef_is_font_option_valid($font_family)){
			$icon_list_item_tipography_array['font-family'] = aton_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = aton_qodef_options()->getOptionValue('icon_list_item_text_transform');
        if(!empty($text_transform)) {
            $icon_list_item_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = aton_qodef_options()->getOptionValue('icon_list_item_font_style');
        if(!empty($font_style)) {
            $icon_list_item_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = aton_qodef_options()->getOptionValue('icon_list_item_letter_spacing');
        if($letter_spacing !== '') {
            $icon_list_item_tipography_array['letter-spacing'] = aton_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = aton_qodef_options()->getOptionValue('icon_list_item_font_weight');
        if(!empty($font_weight)) {
            $icon_list_item_tipography_array['font-weight'] = $font_weight;
        }

        $font_size = aton_qodef_options()->getOptionValue('icon_list_item_font_size');
        if($font_size !== '') {
            $icon_list_item_tipography_array['font-size'] = aton_qodef_filter_px($font_size).'px';
        }

        echo aton_qodef_dynamic_css($selector, $icon_list_item_tipography_array);
	}
	add_action('aton_qodef_style_dynamic', 'aton_qodef_icon_list_item_typography_styles');
}

if(!function_exists('aton_qodef_icon_list_item_icon_settings')){
    function aton_qodef_icon_list_item_icon_settings(){
        $selector = '.qodef-icon-list-item .qodef-icon-list-icon-holder-inner i';
        $icons_settings_array = array();

        $font_size = aton_qodef_options()->getOptionValue('icon_list_item_font_size_setting');
        if($font_size !== '') {
            $icons_settings_array['font-size'] = aton_qodef_filter_px($font_size).'px';
        }

        if(aton_qodef_options()->getOptionValue('icon_list_item_color_setting')) {
            $icons_settings_array['color'] = aton_qodef_options()->getOptionValue('icon_list_item_color_setting');
        }

        echo aton_qodef_dynamic_css($selector, $icons_settings_array);
    }
    add_action('aton_qodef_style_dynamic', 'aton_qodef_icon_list_item_icon_settings');
}
