<?php

if(!function_exists('aton_qodef_mobile_header_general_styles')) {
    /**
     * Generates general custom styles for mobile header
     */
    function aton_qodef_mobile_header_general_styles() {
        $mobile_header_styles = array();
        if(aton_qodef_options()->getOptionValue('mobile_header_height') !== '') {
            $mobile_header_styles['height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_header_height')).'px';
        }

        if(aton_qodef_options()->getOptionValue('mobile_header_background_color')) {
            $mobile_header_styles['background-color'] = aton_qodef_options()->getOptionValue('mobile_header_background_color');
        }

        echo aton_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-header-inner', $mobile_header_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_mobile_header_general_styles');
}

if(!function_exists('aton_qodef_mobile_navigation_styles')) {
    /**
     * Generates styles for mobile navigation
     */
    function aton_qodef_mobile_navigation_styles() {
        $mobile_nav_styles = array();
        if(aton_qodef_options()->getOptionValue('mobile_menu_background_color')) {
            $mobile_nav_styles['background-color'] = aton_qodef_options()->getOptionValue('mobile_menu_background_color');
        }

        echo aton_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-nav', $mobile_nav_styles);

        $mobile_nav_item_styles = array();
        if(aton_qodef_options()->getOptionValue('mobile_menu_separator_color') !== '') {
            $mobile_nav_item_styles['border-bottom-color'] = aton_qodef_options()->getOptionValue('mobile_menu_separator_color');
        }

        if(aton_qodef_options()->getOptionValue('mobile_text_color') !== '') {
            $mobile_nav_item_styles['color'] = aton_qodef_options()->getOptionValue('mobile_text_color');
        }

        if(aton_qodef_is_font_option_valid(aton_qodef_options()->getOptionValue('mobile_font_family'))) {
            $mobile_nav_item_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('mobile_font_family'));
        }

        if(aton_qodef_options()->getOptionValue('mobile_font_size') !== '') {
            $mobile_nav_item_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_font_size')).'px';
        }

        if(aton_qodef_options()->getOptionValue('mobile_line_height') !== '') {
            $mobile_nav_item_styles['line-height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_line_height')).'px';
        }

        if(aton_qodef_options()->getOptionValue('mobile_text_transform') !== '') {
            $mobile_nav_item_styles['text-transform'] = aton_qodef_options()->getOptionValue('mobile_text_transform');
        }

        if(aton_qodef_options()->getOptionValue('mobile_font_style') !== '') {
            $mobile_nav_item_styles['font-style'] = aton_qodef_options()->getOptionValue('mobile_font_style');
        }

        if(aton_qodef_options()->getOptionValue('mobile_font_weight') !== '') {
            $mobile_nav_item_styles['font-weight'] = aton_qodef_options()->getOptionValue('mobile_font_weight');
        }

        $mobile_nav_item_selector = array(
            '.qodef-mobile-header .qodef-mobile-nav a',
            '.qodef-mobile-header .qodef-mobile-nav h4'
        );

        echo aton_qodef_dynamic_css($mobile_nav_item_selector, $mobile_nav_item_styles);

        $mobile_nav_item_hover_styles = array();
        if(aton_qodef_options()->getOptionValue('mobile_text_hover_color') !== '') {
            $mobile_nav_item_hover_styles['color'] = aton_qodef_options()->getOptionValue('mobile_text_hover_color');
        }

        $mobile_nav_item_selector_hover = array(
            '.qodef-mobile-header .qodef-mobile-nav a:hover',
            '.qodef-mobile-header .qodef-mobile-nav h4:hover'
        );

        echo aton_qodef_dynamic_css($mobile_nav_item_selector_hover, $mobile_nav_item_hover_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_mobile_navigation_styles');
}

if(!function_exists('aton_qodef_mobile_logo_styles')) {
    /**
     * Generates styles for mobile logo
     */
    function aton_qodef_mobile_logo_styles() {
        if(aton_qodef_options()->getOptionValue('mobile_logo_height') !== '') { ?>
            @media only screen and (max-width: 1000px) {
            <?php echo aton_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-logo-wrapper a',
                array('height' => aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_logo_height')).'px !important')
            ); ?>
            }
        <?php }

        if(aton_qodef_options()->getOptionValue('mobile_logo_height_phones') !== '') { ?>
            @media only screen and (max-width: 480px) {
            <?php echo aton_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-logo-wrapper a',
                array('height' => aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_logo_height_phones')).'px !important')
            ); ?>
            }
        <?php }

        if(aton_qodef_options()->getOptionValue('mobile_header_height') !== '') {
            $max_height = intval(aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_header_height')) * 0.9).'px';
            echo aton_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-logo-wrapper a', array('max-height' => $max_height));
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_mobile_logo_styles');
}

if(!function_exists('aton_qodef_mobile_icon_styles')) {
    /**
     * Generates styles for mobile icon opener
     */
    function aton_qodef_mobile_icon_styles() {
        $mobile_icon_styles = array();
        if(aton_qodef_options()->getOptionValue('mobile_icon_color') !== '') {
            $mobile_icon_styles['color'] = aton_qodef_options()->getOptionValue('mobile_icon_color');
        }

        if(aton_qodef_options()->getOptionValue('mobile_icon_size') !== '') {
            $mobile_icon_styles['font-size'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_icon_size')).'px';
        }

        echo aton_qodef_dynamic_css('.qodef-mobile-header .qodef-mobile-menu-opener a', $mobile_icon_styles);

        if(aton_qodef_options()->getOptionValue('mobile_icon_hover_color') !== '') {
            echo aton_qodef_dynamic_css(
                '.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
                array('color' => aton_qodef_options()->getOptionValue('mobile_icon_hover_color')));
        }
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_mobile_icon_styles');
}