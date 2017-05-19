<?php

if(!function_exists('aton_qodef_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function aton_qodef_button_typography_styles() {
        $selector = '.qodef-btn';
        $styles = array();

        $font_family = aton_qodef_options()->getOptionValue('button_font_family');
        if(aton_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = aton_qodef_get_font_option_val($font_family);
        }

        $text_transform = aton_qodef_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = aton_qodef_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = aton_qodef_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = aton_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = aton_qodef_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo aton_qodef_dynamic_css($selector, $styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_button_typography_styles');
}

if(!function_exists('aton_qodef_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function aton_qodef_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.qodef-btn.qodef-btn-outline';

        if(aton_qodef_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = aton_qodef_options()->getOptionValue('btn_outline_text_color');
        }

        if(aton_qodef_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = aton_qodef_options()->getOptionValue('btn_outline_border_color');
        }

        echo aton_qodef_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(aton_qodef_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-color):hover',
                array('color' => aton_qodef_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(aton_qodef_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => aton_qodef_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(aton_qodef_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover',
                array('border-color' => aton_qodef_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_button_outline_styles');
}

if(!function_exists('aton_qodef_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function aton_qodef_button_solid_styles() {
        //solid styles
        $solid_selector = '.qodef-btn.qodef-btn-solid';
        $solid_styles = array();

        if(aton_qodef_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = aton_qodef_options()->getOptionValue('btn_solid_text_color');
        }

        if(aton_qodef_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = aton_qodef_options()->getOptionValue('btn_solid_border_color');
        }

        if(aton_qodef_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = aton_qodef_options()->getOptionValue('btn_solid_bg_color');
        }

        echo aton_qodef_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(aton_qodef_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-color):hover',
                array('color' => aton_qodef_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(aton_qodef_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => aton_qodef_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(aton_qodef_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('border-color' => aton_qodef_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_button_solid_styles');
}

if(!function_exists('aton_qodef_button_transparent_styles')) {
    /**
     * Generate styles for transparent type buttons
     */
    function aton_qodef_button_transparent_styles() {
        //transparent styles

        $transparent_selector = '.qodef-btn.qodef-btn-transparent';
        $transparent_styles = array();

        if(aton_qodef_options()->getOptionValue('btn_transparent_text_color')) {
            $transparent_styles['color'] = aton_qodef_options()->getOptionValue('btn_transparent_text_color');
        }

        echo aton_qodef_dynamic_css($transparent_selector, $transparent_styles);

        //solid hover styles
        if(aton_qodef_options()->getOptionValue('btn_transparent_hover_text_color')) {
            echo aton_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-transparent:not(.qodef-btn-custom-hover-color):hover',
                array('color' => aton_qodef_options()->getOptionValue('btn_transparent_hover_text_color').'!important')
            );
        }

    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_button_transparent_styles');
}