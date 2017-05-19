<?php
/**
 * Custom styles for woocommerce pages
 * Hooks to moments_qodef_style_dynamic hook
 */

if(!function_exists('aton_qodef_product_list_title_typography_styles')){
    function aton_qodef_product_list_title_typography_styles(){
        $selector = 'ul.products > .product .qodef-pl-text-wrapper .qodef-product-list-title';
        $styles = array();

        $font_family = aton_qodef_options()->getOptionValue('product_list_title_font_family');
        if(aton_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = aton_qodef_get_font_option_val($font_family);
        }

        $text_transform = aton_qodef_options()->getOptionValue('product_list_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = aton_qodef_options()->getOptionValue('product_list_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = aton_qodef_options()->getOptionValue('product_list_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = aton_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = aton_qodef_options()->getOptionValue('product_list_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = aton_qodef_options()->getOptionValue('product_list_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = aton_qodef_filter_px($font_size).'px';
        }

        echo aton_qodef_dynamic_css($selector, $styles);
    }
    add_action('aton_qodef_style_dynamic', 'aton_qodef_product_list_title_typography_styles');
}

if(!function_exists('aton_qodef_product_single_title_typography_styles')){
    function aton_qodef_product_single_title_typography_styles(){
        $selector = '.qodef-single-product-title';
        $styles = array();

        $font_family = aton_qodef_options()->getOptionValue('product_single_title_font_family');
        if(aton_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = aton_qodef_get_font_option_val($font_family);
        }

        $text_transform = aton_qodef_options()->getOptionValue('product_single_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = aton_qodef_options()->getOptionValue('product_single_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = aton_qodef_options()->getOptionValue('product_single_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = aton_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = aton_qodef_options()->getOptionValue('product_single_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = aton_qodef_options()->getOptionValue('product_single_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = aton_qodef_filter_px($font_size).'px';
        }

        echo aton_qodef_dynamic_css($selector, $styles);
    }
    add_action('aton_qodef_style_dynamic', 'aton_qodef_product_single_title_typography_styles');
}
