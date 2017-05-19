<?php

if(!function_exists('aton_qodef_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function aton_qodef_header_top_bar_styles() {

        if(aton_qodef_options()->getOptionValue('top_bar_height') !== '') {
            echo aton_qodef_dynamic_css('.qodef-top-bar', array('height' => aton_qodef_options()->getOptionValue('top_bar_height') . 'px'));
            echo aton_qodef_dynamic_css('.qodef-top-bar .qodef-position-left-inner, .qodef-top-bar .qodef-position-right-inner, .qodef-top-bar #lang_sel .lang_sel_sel', array('line-height' => aton_qodef_options()->getOptionValue('top_bar_height') . 'px'));
            echo aton_qodef_dynamic_css('.qodef-top-bar .qodef-logo-wrapper a', array('max-height' => aton_qodef_options()->getOptionValue('top_bar_height').'px'));
        }

        if(aton_qodef_options()->getOptionValue('top_bar_in_grid') == 'yes') {
            $top_bar_grid_selector = '.qodef-top-bar .qodef-grid .qodef-vertical-align-containers';
            $top_bar_grid_styles = array();
            if(aton_qodef_options()->getOptionValue('top_bar_grid_background_color') !== '') {
                $grid_background_color    = aton_qodef_options()->getOptionValue('top_bar_grid_background_color');
                $grid_background_transparency = 1;

                if(aton_qodef_options()->getOptionValue('top_bar_grid_background_transparency') !== '') {
                    $grid_background_transparency = aton_qodef_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = aton_qodef_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo aton_qodef_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = aton_qodef_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(aton_qodef_options()->getOptionValue('top_bar_background_transparency') !== '') {
                $background_transparency = aton_qodef_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = aton_qodef_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo aton_qodef_dynamic_css('.qodef-top-bar .qodef-vertical-align-containers', $top_bar_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_header_top_bar_styles');
}



if(!function_exists('aton_qodef_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function aton_qodef_header_standard_menu_area_styles() {

        $menu_area_header_standard_styles = array();

        if(aton_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '') {
            $menu_area_background_color        = aton_qodef_options()->getOptionValue('menu_area_background_color_header_standard');
            $menu_area_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '') {
                $menu_area_background_transparency = aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard');
            }

            $menu_area_header_standard_styles['background-color'] = aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(aton_qodef_options()->getOptionValue('menu_area_height_header_standard') !== '') {
            $max_height = intval(aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_standard')) * 0.9).'px';
            echo aton_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_standard')).'px';

        }

        echo aton_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if(aton_qodef_options()->getOptionValue('menu_area_in_grid_header_standard') == 'yes' && aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '') {
            $menu_area_grid_background_color        = aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard');
            $menu_area_grid_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') !== '') {
                $menu_area_grid_background_transparency = aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard');
            }

            $menu_area_grid_header_standard_styles['background-color'] = aton_qodef_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo aton_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-menu-area .qodef-grid .qodef-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_header_standard_menu_area_styles');
}

if(!function_exists('aton_qodef_header_centered_menu_area_styles')) {
    /**
     * Generates styles for header centered menu
     */
    function aton_qodef_header_centered_menu_area_styles() {

        $menu_area_header_centered_styles = array();

        if(aton_qodef_options()->getOptionValue('menu_area_background_color_header_centered') !== '') {
            $menu_area_background_color        = aton_qodef_options()->getOptionValue('menu_area_background_color_header_centered');
            $menu_area_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_centered') !== '') {
                $menu_area_background_transparency = aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_centered');
            }
            $menu_area_header_centered_styles['background-color'] = aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }
        echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-menu-area, .qodef-header-centered .qodef-page-header .qodef-logo-area', $menu_area_header_centered_styles);

        $menu_area_centered_header_height = array();
        if(aton_qodef_options()->getOptionValue('menu_area_height_header_centered') !== '') {
            $menu_area_centered_header_height['height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_centered')).'px';
        }
        echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-menu-area', $menu_area_centered_header_height);


        $logo_area_centered_header_height = array();
        if(aton_qodef_options()->getOptionValue('logo_area_height_header_centered') !== '') {
            $max_height = intval(aton_qodef_filter_px(aton_qodef_options()->getOptionValue('logo_area_height_header_centered')) * 0.9).'px';
            echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));
            $logo_area_centered_header_height['height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('logo_area_height_header_centered')).'px';
        }
        echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-logo-area', $logo_area_centered_header_height);


        if(aton_qodef_options()->getOptionValue('logo_wrapper_padding_header_centered') !== '') {
            echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-logo-area .qodef-logo-wrapper', array('padding'=>aton_qodef_options()->getOptionValue('logo_wrapper_padding_header_centered')));
        }

        $menu_area_grid_header_centered_styles = array();

        if(aton_qodef_options()->getOptionValue('menu_area_in_grid_header_centered') == 'yes' && aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_centered') !== '') {
            $menu_area_grid_background_color        = aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_centered');
            $menu_area_grid_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_centered') !== '') {
                $menu_area_grid_background_transparency = aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_centered');
            }

            $menu_area_grid_header_centered_styles['background-color'] = aton_qodef_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo aton_qodef_dynamic_css('.qodef-header-centered .qodef-page-header .qodef-menu-area .qodef-grid .qodef-vertical-align-containers, .qodef-header-centered .qodef-page-header .qodef-logo-area .qodef-grid .qodef-vertical-align-containers', $menu_area_grid_header_centered_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_header_centered_menu_area_styles');
}

if(!function_exists('aton_qodef_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function aton_qodef_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.qodef-header-vertical .qodef-vertical-area-background'
        );

        if(aton_qodef_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = aton_qodef_options()->getOptionValue('vertical_header_background_color');
        }

        if(aton_qodef_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = aton_qodef_options()->getOptionValue('vertical_header_transparency');
        }

        if(aton_qodef_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.aton_qodef_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo aton_qodef_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_vertical_menu_styles');
}


if(!function_exists('aton_qodef_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function aton_qodef_sticky_header_styles() {

        if(aton_qodef_options()->getOptionValue('sticky_header_in_grid') == 'yes' && aton_qodef_options()->getOptionValue('sticky_header_grid_background_color') !== '') {
            $sticky_header_grid_background_color        = aton_qodef_options()->getOptionValue('sticky_header_grid_background_color');
            $sticky_header_grid_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('sticky_header_grid_transparency') !== '') {
                $sticky_header_grid_background_transparency = aton_qodef_options()->getOptionValue('sticky_header_grid_transparency');
            }

            echo aton_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-grid .qodef-vertical-align-containers', array('background-color' => aton_qodef_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if(aton_qodef_options()->getOptionValue('sticky_header_background_color') !== '') {

            $sticky_header_background_color              = aton_qodef_options()->getOptionValue('sticky_header_background_color');
            $sticky_header_background_color_transparency = 1;

            if(aton_qodef_options()->getOptionValue('sticky_header_transparency') !== '') {
                $sticky_header_background_color_transparency = aton_qodef_options()->getOptionValue('sticky_header_transparency');
            }

            echo aton_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array('background-color' => aton_qodef_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if(aton_qodef_options()->getOptionValue('sticky_header_height') !== '') {
            $max_height = intval(aton_qodef_filter_px(aton_qodef_options()->getOptionValue('sticky_header_height')) * 0.9).'px';

            echo aton_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header', array('height' => aton_qodef_options()->getOptionValue('sticky_header_height').'px'));
            echo aton_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if(aton_qodef_options()->getOptionValue('sticky_color') !== '') {
            $sticky_menu_item_styles['color'] = aton_qodef_options()->getOptionValue('sticky_color');
        }
        if(aton_qodef_options()->getOptionValue('sticky_google_fonts') !== '-1') {
            $sticky_menu_item_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('sticky_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('sticky_fontsize') !== '') {
            $sticky_menu_item_styles['font-size'] = aton_qodef_options()->getOptionValue('sticky_fontsize').'px';
        }
        if(aton_qodef_options()->getOptionValue('sticky_lineheight') !== '') {
            $sticky_menu_item_styles['line-height'] = aton_qodef_options()->getOptionValue('sticky_lineheight').'px';
        }
        if(aton_qodef_options()->getOptionValue('sticky_texttransform') !== '') {
            $sticky_menu_item_styles['text-transform'] = aton_qodef_options()->getOptionValue('sticky_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('sticky_fontstyle') !== '') {
            $sticky_menu_item_styles['font-style'] = aton_qodef_options()->getOptionValue('sticky_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('sticky_fontweight') !== '') {
            $sticky_menu_item_styles['font-weight'] = aton_qodef_options()->getOptionValue('sticky_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('sticky_letterspacing') !== '') {
            $sticky_menu_item_styles['letter-spacing'] = aton_qodef_options()->getOptionValue('sticky_letterspacing').'px';
        }

        $sticky_menu_item_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li > a'
        );

        echo aton_qodef_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if(aton_qodef_options()->getOptionValue('sticky_hovercolor') !== '') {
            $sticky_menu_item_hover_styles['color'] = aton_qodef_options()->getOptionValue('sticky_hovercolor');
        }

        $sticky_menu_item_hover_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            '.qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a'
        );

        echo aton_qodef_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_sticky_header_styles');
}

if(!function_exists('aton_qodef_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function aton_qodef_fixed_header_styles() {

        if(aton_qodef_options()->getOptionValue('fixed_header_grid_background_color') !== '') {

            $fixed_header_grid_background_color              = aton_qodef_options()->getOptionValue('fixed_header_grid_background_color');
            $fixed_header_grid_background_color_transparency = 1;

            if(aton_qodef_options()->getOptionValue('fixed_header_grid_transparency') !== '') {
                $fixed_header_grid_background_color_transparency = aton_qodef_options()->getOptionValue('fixed_header_grid_transparency');
            }

            echo aton_qodef_dynamic_css('.qodef-fixed-wrapper.fixed .qodef-grid .qodef-vertical-align-containers',
                array('background-color' => aton_qodef_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if(aton_qodef_options()->getOptionValue('fixed_header_background_color') !== '') {

            $fixed_header_background_color              = aton_qodef_options()->getOptionValue('fixed_header_background_color');
            $fixed_header_background_color_transparency = 1;

            if(aton_qodef_options()->getOptionValue('fixed_header_transparency') !== '') {
                $fixed_header_background_color_transparency = aton_qodef_options()->getOptionValue('fixed_header_transparency');
            }

            echo aton_qodef_dynamic_css('.qodef-fixed-wrapper.fixed .qodef-menu-area',
                array('background-color' => aton_qodef_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_fixed_header_styles');
}



if(!function_exists('aton_qodef_header_full_screen_menu_area_styles')) {
    /**
     * Generates styles for header full-screen  menu
     */
    function aton_qodef_header_full_screen_menu_area_styles() {

        $menu_area_header_full_screen_styles = array();

        if(aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen') !== '') {

            $menu_area_background_color        = aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen');
            $menu_area_background_transparency = 1;

            if(aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_full_screen') !== '') {
                $menu_area_background_transparency = aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_full_screen');
            }

            $menu_area_header_full_screen_styles['background-color'] = aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if(aton_qodef_options()->getOptionValue('menu_area_height_header_full_screen') !== '') {
            $max_height = intval(aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_full_screen')) * 0.9).'px';
            echo aton_qodef_dynamic_css('.qodef-header-full-screen .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_full_screen_styles['height'] = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_full_screen')).'px';

        }

        echo aton_qodef_dynamic_css('.qodef-header-full-screen .qodef-page-header .qodef-menu-area', $menu_area_header_full_screen_styles);


    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_header_full_screen_menu_area_styles');
}





if(!function_exists('aton_qodef_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function aton_qodef_main_menu_styles() {
        global $aton_qodef_options;

        $main_menu_styles_array = array();

        if ( aton_qodef_options()->getOptionValue( 'menu_color' ) !== '' ) {
            $main_menu_styles_array['color'] = aton_qodef_options()->getOptionValue( 'menu_color' );
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_google_fonts' ) !== '-1' ) {
            $main_menu_styles_array['font-family'] = aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( 'menu_google_fonts' ) );
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_fontsize' ) !== '' ) {
            $main_menu_styles_array['font-size'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_fontsize' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_fontstyle' ) !== '' ) {
            $main_menu_styles_array['font-style'] = aton_qodef_options()->getOptionValue( 'menu_fontstyle' );
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_fontweight' ) !== '' ) {
            $main_menu_styles_array['font-weight'] = aton_qodef_options()->getOptionValue( 'menu_fontweight' );
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_texttransform' ) !== '' ) {
            $main_menu_styles_array['text-transform'] = aton_qodef_options()->getOptionValue( 'menu_texttransform' );
        }
        if ( aton_qodef_options()->getOptionValue( 'menu_letterspacing' ) !== '' ) {
            $main_menu_styles_array['letter-spacing'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_letterspacing' ) ) . 'px';
        }

        echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a,
            .qodef-page-header #lang_sel > ul > li > a,
            .qodef-page-header #lang_sel_click > ul > li > a,
            .qodef-page-header #lang_sel ul > li:hover > a', $main_menu_styles_array );

        if ( aton_qodef_options()->getOptionValue( 'menu_google_fonts' ) !== '-1' ) {
            echo aton_qodef_dynamic_css( '.qodef-page-header #lang_sel_list', array(
                'font-family' => aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( '' ) ) . 'sans-serif !important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_hovercolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            .qodef-page-header #lang_sel ul li a:hover,
            .qodef-page-header #lang_sel_click > ul > li a:hover', array(
                'color' => aton_qodef_options()->getOptionValue( 'menu_hovercolor' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_activecolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a,
			body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => aton_qodef_options()->getOptionValue( 'menu_activecolor' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_icon_position' ) == 'top' && aton_qodef_options()->getOptionValue( 'menu_item_icon_size' ) !== '' ) {

            echo aton_qodef_dynamic_css( 'body.qodef-menu-with-large-icons .qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner i', array(
                'font-size' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_item_icon_size' ) ) . 'px !important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' && ( aton_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' || aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) ) {

            $menu_item_style_array = array();
            if ( aton_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' ) {
                $menu_item_style_array['background-color'] = aton_qodef_options()->getOptionValue( 'menu_text_background_color' );
            }

            if ( aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) !== 'yes' ) {

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_radius' ) !== '' ) {
                    $menu_item_style_array['border-radius'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_item_border_radius' ) ) . 'px';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style_style' ) !== '' ) {
                    $menu_item_style_array['border-style'] = aton_qodef_options()->getOptionValue( 'menu_item_border_style_style' );
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_width' ) !== '' ) {
                    $menu_item_style_array['border-width'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_item_border_width' ) ) . 'px';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                    $menu_item_style_array['border-color'] = aton_qodef_options()->getOptionValue( 'menu_item_border_color' );
                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'top_bottom_borders' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
                    $menu_item_style_array['border-left']   = 'none';
                    $menu_item_style_array['border-top']    = 'none';
                    $menu_item_style_array['border-bottom'] = 'none';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                    $menu_item_style_array['border-top']   = 'none';
                }

            }

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', $menu_item_style_array );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a span.item_inner,
			.qodef-main-menu.qodef-default-nav > ul > li:last-child > a', array(
                'border-right' => 'none'
            ) );
        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {

            $menu_item_style_array = array();
            if ( aton_qodef_options()->getOptionValue( 'menu_text_background_color' ) !== '' ) {
                $menu_item_style_array['background-color'] = aton_qodef_options()->getOptionValue( 'menu_text_background_color' );
            }

            if ( aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) !== 'yes' ) {

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_radius' ) !== '' ) {
                    $menu_item_style_array['border-radius'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_item_border_radius' ) ) . 'px';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style_style' ) !== '' ) {
                    $menu_item_style_array['border-style'] = aton_qodef_options()->getOptionValue( 'menu_item_border_style_style' );
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_width' ) !== '' ) {
                    $menu_item_style_array['border-width'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_item_border_width' ) ) . 'px';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                    $menu_item_style_array['border-color'] = aton_qodef_options()->getOptionValue( 'menu_item_border_color' );
                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'top_bottom_borders' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' ) {
                    $menu_item_style_array['border-left']   = 'none';
                    $menu_item_style_array['border-top']    = 'none';
                    $menu_item_style_array['border-bottom'] = 'none';
                }
                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border' ) {
                    $menu_item_style_array['border-left']  = 'none';
                    $menu_item_style_array['border-right'] = 'none';
                    $menu_item_style_array['border-top']   = 'none';
                }

            }

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', $menu_item_style_array );

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_hover_background_color' ) !== '' ) {
            $menu_hover_background_color     = aton_qodef_options()->getOptionValue( 'menu_hover_background_color' );
            $menu_hover_background_color_rgb = 1;
            if ( aton_qodef_options()->getOptionValue( 'menu_hover_background_color_transparency' ) !== '' ) {
                $menu_hover_background_color_rgb = aton_qodef_options()->getOptionValue( 'menu_hover_background_color_transparency' );
            }
            $menu_hover_background_color = aton_qodef_rgba_color( $menu_hover_background_color, $menu_hover_background_color_rgb );

            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'small_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner', array(
                    'background-color' => $menu_hover_background_color
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'large_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                    'background-color' => $menu_hover_background_color
                ) );
            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_active_background_color' ) !== '' ) {
            $menu_active_background_color     = aton_qodef_options()->getOptionValue( 'menu_active_background_color' );
            $menu_active_background_color_rgb = 1;
            if ( aton_qodef_options()->getOptionValue( 'menu_active_background_color_transparency' ) !== '' ) {
                $menu_active_background_color_rgb = aton_qodef_options()->getOptionValue( 'menu_active_background_color_transparency' );
            }
            $menu_active_background_color = aton_qodef_rgba_color( $menu_active_background_color, $menu_active_background_color_rgb );

            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'small_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'background-color' => $menu_active_background_color
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) !== 'large_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'background-color' => $menu_active_background_color
                ) );
            }

        }

        if ( aton_qodef_options()->getOptionValue('menu_light_hovercolor') !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
			.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                'color' => aton_qodef_options()->getOptionValue('menu_light_hovercolor') . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue('menu_light_activecolor') !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => aton_qodef_options()->getOptionValue('menu_light_activecolor') . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue('menu_dark_hovercolor') !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
			.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a', array(
                'color' => aton_qodef_options()->getOptionValue('menu_dark_hovercolor') . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue('menu_dark_activecolor') !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                'color' => aton_qodef_options()->getOptionValue('menu_dark_activecolor') . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( aton_qodef_options()->getOptionValue('menu_light_border_color') !== '' ) {
                $light = aton_qodef_options()->getOptionValue('menu_light_border_color');

                if ( aton_qodef_options()->getOptionValue('menu_item_style') == 'small_item' ) {
                    echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
					.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border-color' => $light
                    ));
                }
                if ( aton_qodef_options()->getOptionValue('menu_item_style') == 'large_item' ) {
                    echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
					.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                        'border-color' => $light
                    ));
                }

            }
            if ( aton_qodef_options()->getOptionValue('menu_dark_border_color') !== '' ) {
                $dark = aton_qodef_options()->getOptionValue('menu_dark_border_color');

                if ( aton_qodef_options()->getOptionValue('menu_item_style') == 'small_item' ) {
                    echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
					.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border-color' => $dark
                    ));
                }
                if ( aton_qodef_options()->getOptionValue('menu_item_style') == 'large_item' ) {
                    echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
					.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                        'border-color' => $dark
                    ));
                }

            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_lineheight' ) !== '' || aton_qodef_options()->getOptionValue( 'menu_padding_left_right' ) !== '' ) {
            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                'line-height' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_lineheight' ) ) . 'px',
                'padding'     => '0 ' . aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_padding_left_right' ) ) . 'px'
            ) );
        }

        if ( aton_qodef_options()->getOptionValue( 'menu_margin_left_right' ) !== '' ) {
            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li', array(
                'margin'     => '0 ' . aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'menu_margin_left_right' ) ) . 'px'
            ) );
        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' && aton_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li a span.item_inner', array(
                    'color' => '#000'
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                    'color' => '#000'
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'color' => '#000'
                ) );
            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' && aton_qodef_options()->getOptionValue('enable_manu_item_border') == 'yes' ) {

            if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li > a', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li > a', array(
                    'color' => '#000'
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'color' => '#000'
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'color' => '#fff'
                ) );
                echo aton_qodef_dynamic_css( '.qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'color' => '#000'
                ) );
            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'bottom_border_double' && aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {

            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_border_color' ),
                        'display' => 'block'
                    ) );

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ),
                    ) );

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner:before,
					.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ),
                    ) );

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner', array(
                        'border' => 'none'
                    ) );

                }

            }

            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {

                if ( aton_qodef_options()->getOptionValue( 'menu_item_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li > a:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_border_color' ),
                        'display' => 'block'
                    ) );

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', array(
                        'border' => 'none'
                    ) );

                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ),
                    ) );

                    echo aton_qodef_dynamic_css( 'nav.main_menu > ul > li.qodef-active-item > a', array(
                        'border' => 'none'
                    ) );

                }

                if ( aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) == '' ) {

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a:before,
					.qodef-main-menu.qodef-default-nav > ul > li:hover > a:after', array(
                        'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ),
                    ) );

                    echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li > a', array(
                        'border' => 'none'
                    ) );

                }

            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_border_style' ) == 'right_border' && aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {

            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a span.item_inner', array(
                    'border-right' => 'none'
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:last-child > a', array(
                    'border-right' => 'none'
                ) );
            }

        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' ) !== '' && aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover a span.item_inner', array(
                    'border-color' => aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' )
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover > a', array(
                    'border-color' => aton_qodef_options()->getOptionValue( 'menu_item_hover_border_color' )
                ) );
            }
        }

        if ( aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' ) !== '' && aton_qodef_options()->getOptionValue( 'enable_manu_item_border' ) == 'yes' ) {
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'small_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                    'border-color' => aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' )
                ) );
            }
            if ( aton_qodef_options()->getOptionValue( 'menu_item_style' ) == 'large_item' ) {
                echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item a,
				header:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a', array(
                    'border-color' => aton_qodef_options()->getOptionValue( 'menu_item_active_border_color' )
                ) );
            }
        }

        if ( aton_qodef_options()->getOptionValue( 'enable_menu_item_separators' ) == 'yes' ) {
            echo aton_qodef_dynamic_css( '.qodef-main-menu > ul > li > a > span.item_outer:before', array(
                'display' => 'block')
            );
        }

        if ( aton_qodef_options()->getOptionValue( 'enable_menu_item_separators' ) == 'yes' && aton_qodef_options()->getOptionValue('menu_item_separators_color') !== '' ) {
            echo aton_qodef_dynamic_css( '.qodef-main-menu > ul > li > a > span.item_outer:before', array(
                'background-color' => aton_qodef_options()->getOptionValue( 'menu_item_separators_color' )
            ) );
        }

        if ( aton_qodef_options()->getOptionValue( 'enable_menu_item_text_decoration' ) == 'yes' ) {

            $decoration = aton_qodef_options()->getOptionValue( 'menu_item_text_decoration_style' );

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li:hover > a span.item_inner,
				.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.item_inner', array(
                'text-decoration' => $decoration
            ) );

            $active_decoration = aton_qodef_options()->getOptionValue( 'menu_item_active_text_decoration_style' );

            echo aton_qodef_dynamic_css( '.qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.item_inner', array(
                'text-decoration' => $active_decoration
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_background_color' ) !== '' || aton_qodef_options()->getOptionValue( 'dropdown_background_transparency' ) !== '' ) {

            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = aton_qodef_options()->getOptionValue('dropdown_background_color') !== "" ? aton_qodef_options()->getOptionValue('dropdown_background_color') : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = aton_qodef_options()->getOptionValue('dropdown_background_transparency') !== "" ? aton_qodef_options()->getOptionValue('dropdown_background_transparency') : $dropdown_bg_transparency_initial;

            $dropdown_bg_color = aton_qodef_rgba_color( $dropdown_bg_color, $dropdown_bg_transparency );

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul,
			.qodef-drop-down .second .inner ul li ul,
			.shopping_cart_dropdown,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-main-menu.qodef-default-nav #lang_sel ul ul,
			.qodef-main-menu.qodef-default-nav #lang_sel_click  ul ul,
			.header-widget.widget_nav_menu ul ul,
			.qodef-drop-down .wide.wide_background .second', array(
                'background-color' => $dropdown_bg_color
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_top_padding' ) !== '' || aton_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'no' ) {

            $menu_inner_ul_top = 15; //default value without border
            if ( aton_qodef_options()->getOptionValue( 'dropdown_top_padding' ) !== '' ) {
                echo aton_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul,
				.qodef-drop-down .wide .second .inner > ul', array(
                    'padding-top' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_top_padding' ) ) . 'px'
                ) );
                $menu_inner_ul_top = $aton_qodef_options['dropdown_top_padding']; //overwrite default value
            }
            if ( aton_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'yes' ) {
                $menu_inner_ul_top += 1; //top border is 1px
            }

            echo aton_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul li ul,
			body.qodef-slide-from-bottom .qodef-drop-down .narrow .second .inner ul li:hover ul,
			body.qodef-slide-from-top .narrow .second .inner ul li:hover ul', array(
                'top' => '-' . $menu_inner_ul_top . 'px'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_bottom_padding' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .wide .second .inner > ul', array(
                'padding-bottom' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_bottom_padding' ) ) . 'px'
            ) );

        }


        if ( aton_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) == 'yes' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li:last-child > a,
			.qodef-drop-down .second .inner > ul > li > ul > li:last-child > a,
			.qodef-drop-down .second .inner > ul > li > ul > li > ul > li:last-child > a', array(
                'border-bottom' => '1px solid transparent'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) !== 'yes' && aton_qodef_options()->getOptionValue( 'dropdown_separator_color' ) != '') {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li a,
			.header-widget.widget_nav_menu ul.menu li ul li a', array(
                'border-color' => aton_qodef_options()->getOptionValue( 'dropdown_separator_color' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'enable_dropdown_separator_full_width' ) == 'yes' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li,
			.header-widget.widget_nav_menu ul.menu li ul li', array(
                'border-bottom' => '1px solid ' . aton_qodef_options()->getOptionValue( 'dropdown_separator_color' )
            ) );

        }


        if ( aton_qodef_options()->getOptionValue( 'dropdown_top_position' ) !== '' ) {

            echo aton_qodef_dynamic_css( 'header .qodef-drop-down .second', array(
                'top' => aton_qodef_options()->getOptionValue( 'dropdown_top_position' ) . '%'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'yes' && aton_qodef_options()->getOptionValue('dropdown_border_around_color') !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .narrow .second .inner ul li ul,
			.shopping_cart_dropdown,
			.shopping_cart_dropdown ul li', array(
                'border-color' => aton_qodef_options()->getOptionValue( 'dropdown_border_around_color' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_border_around' ) == 'no' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner>ul,
			.qodef-drop-down .narrow .second .inner ul,
			.qodef-drop-down .narrow .second .inner ul li ul', array(
                'border' => 'none'
            ) );

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul.right li ul', array(
                'margin-left' => 0
            ) );

        }

        $dropdown_styles_array = array();

        if ( aton_qodef_options()->getOptionValue( 'dropdown_color' ) !== '' ) {
            $dropdown_styles_array['color'] = aton_qodef_options()->getOptionValue( 'dropdown_color' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_google_fonts' ) !== '-1' ) {
            $dropdown_styles_array['font-family'] = aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( 'dropdown_google_fonts' ) );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontsize' ) !== '' ) {
            $dropdown_styles_array['font-size'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_fontsize' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_lineheight' ) !== '' ) {
            $dropdown_styles_array['line-height'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_lineheight' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontstyle' ) !== '' ) {
            $dropdown_styles_array['font-style'] = aton_qodef_options()->getOptionValue( 'dropdown_fontstyle' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontweight' ) !== '' ) {
            $dropdown_styles_array['font-weight'] = aton_qodef_options()->getOptionValue( 'dropdown_fontweight' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_texttransform' ) !== '' ) {
            $dropdown_styles_array['text-transform'] = aton_qodef_options()->getOptionValue( 'dropdown_texttransform' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_letterspacing' ) !== '' ) {
            $dropdown_styles_array['letter-spacing'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_letterspacing' ) );
        }

        echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li > a,
			.qodef-drop-down .second .inner > ul > li > h4,
			.qodef-drop-down .wide .second .inner > ul > li > h4,
			.qodef-drop-down .wide .second .inner > ul > li > a,
			.qodef-drop-down .wide .second ul li ul li.menu-item-has-children > a,
			.qodef-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
			.qodef-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4 a,
			.qodef-drop-down .wide .second .inner > ul li .flexslider ul li  h4 a,
			.qodef-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4,
			.qodef-drop-down .wide .second .inner > ul li .flexslider ul li  h4,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li li a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul ul a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul ul a', $dropdown_styles_array );

        if ( aton_qodef_options()->getOptionValue( 'dropdown_color' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.shopping_cart_dropdown ul li
			.item_info_holder .item_left a,
			.shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount', array(
                'color' => aton_qodef_options()->getOptionValue( 'dropdown_color' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_hovercolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner > ul > li:hover > a,
			.qodef-drop-down .wide .second ul li ul li.menu-item-has-children:hover > a,
			.qodef-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children:hover > a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li li:hover a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li:hover a,
			.qodef-main-menu.qodef-default-nav #lang_sel ul li:hover > a,
			.qodef-main-menu.qodef-default-nav #lang_sel_click ul li:hover > a', array(
                'color' => aton_qodef_options()->getOptionValue( 'dropdown_hovercolor' ) . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_background_hovercolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down li:not(.wide) .second .inner > ul > li:hover', array(
                'background-color' => aton_qodef_options()->getOptionValue( 'dropdown_background_hovercolor' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
			.qodef-drop-down .second .inner ul li a,
			.qodef-drop-down .wide .second ul li a,
			.qodef-drop-down .second .inner ul.right li a', array(
                'padding-top'    => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) ),
                'padding-bottom' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_padding_top_bottom' ) )
            ) );

        }

        $dropdown_wide_styles = array();
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_color' ) !== '' ) {
            $dropdown_wide_styles['color'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_color' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts' ) !== '-1' ) {
            $dropdown_wide_styles['font-family'] = aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts' ) );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontsize' ) !== '' ) {
            $dropdown_wide_styles['font-size'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontsize' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_lineheight' ) !== '' ) {
            $dropdown_wide_styles['line-height'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_lineheight' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle' ) !== '' ) {
            $dropdown_wide_styles['font-style'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontweight' ) !== '' ) {
            $dropdown_wide_styles['font-weight'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_fontweight' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_texttransform' ) !== '' ) {
            $dropdown_wide_styles['text-transform'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_texttransform' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing' ) !== '' ) {
            $dropdown_wide_styles['letter-spacing'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing' ) ) . 'px';
        }

        echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li > a', $dropdown_wide_styles );


        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li:hover > a', array(
                'color' => aton_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor' ) . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner > ul > li:hover > a', array(
                'background-color' => aton_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor' )
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
			.qodef-drop-down .wide .second .inner ul li a,
			.qodef-drop-down .wide .second ul li a,
			.qodef-drop-down .wide .second .inner ul.right li a', array(
                'padding-top'    => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) ) . 'px',
                'padding-bottom' => aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_padding_top_bottom' ) ) . 'px'
            ) );

        }

        $dropdown_thirdlvl_styles = array();
        if ( aton_qodef_options()->getOptionValue( 'dropdown_color_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['color'] = aton_qodef_options()->getOptionValue( 'dropdown_color_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_google_fonts_thirdlvl' ) !== '-1' ) {
            $dropdown_thirdlvl_styles['font-family'] = aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( 'dropdown_google_fonts_thirdlvl' ) );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontsize_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-size'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_fontsize_thirdlvl' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_lineheight_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['line-height'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_lineheight_thirdlvl' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontstyle_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-style'] = aton_qodef_options()->getOptionValue( 'dropdown_fontstyle_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_fontweight_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['font-weight'] = aton_qodef_options()->getOptionValue( 'dropdown_fontweight_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_texttransform_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['text-transform'] = aton_qodef_options()->getOptionValue( 'dropdown_texttransform_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_letterspacing_thirdlvl' ) !== '' ) {
            $dropdown_thirdlvl_styles['letter-spacing'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_letterspacing_thirdlvl' ) ) . 'px';
        }

        echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li a', $dropdown_thirdlvl_styles );

        if ( aton_qodef_options()->getOptionValue( 'dropdown_hovercolor_thirdlvl' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
			.qodef-drop-down .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next)', array(
                'color' => aton_qodef_options()->getOptionValue( 'dropdown_hovercolor_thirdlvl' ) . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_background_hovercolor_thirdlvl' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .second .inner ul li.sub ul li:hover,
			.qodef-drop-down .second .inner ul li ul li:hover', array(
                'background-color' => aton_qodef_options()->getOptionValue( 'dropdown_background_hovercolor_thirdlvl' )
            ) );

        }

        $dropdown_wide_thirdlvl_styles = array();
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_color_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['color'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_color_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts_thirdlvl' ) !== '-1' ) {
            $dropdown_wide_thirdlvl_styles['font-family'] = aton_qodef_get_formatted_font_family( aton_qodef_options()->getOptionValue( 'dropdown_wide_google_fonts_thirdlvl' ) );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontsize_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-size'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontsize_thirdlvl' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_lineheight_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['line-height'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_lineheight_thirdlvl' ) ) . 'px';
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-style'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_fontstyle_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_fontweight_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['font-weight'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_fontweight_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_texttransform_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['text-transform'] = aton_qodef_options()->getOptionValue( 'dropdown_wide_texttransform_thirdlvl' );
        }
        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing_thirdlvl' ) !== '' ) {
            $dropdown_wide_thirdlvl_styles['letter-spacing'] = aton_qodef_filter_px( aton_qodef_options()->getOptionValue( 'dropdown_wide_letterspacing_thirdlvl' ) ) . 'px';
        }

        echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li a,
			.qodef-drop-down .wide .second ul li ul li a', $dropdown_wide_thirdlvl_styles );

        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor_thirdlvl' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
			.qodef-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover', array(
                'color' => aton_qodef_options()->getOptionValue( 'dropdown_wide_hovercolor_thirdlvl' ) . '!important'
            ) );

        }

        if ( aton_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor_thirdlvl' ) !== '' ) {

            echo aton_qodef_dynamic_css( '.qodef-drop-down .wide .second .inner ul li.sub ul li:hover,
			.qodef-drop-down .wide .second .inner ul li ul li:hover', array(
                'background-color' => aton_qodef_options()->getOptionValue( 'dropdown_wide_background_hovercolor_thirdlvl' )
            ) );

        }

    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_main_menu_styles');
}

if(!function_exists('aton_qodef_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function aton_qodef_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if(aton_qodef_options()->getOptionValue('vertical_dropdown_background_color') !== '') {
            $dropdown_styles['background-color'] = aton_qodef_options()->getOptionValue('vertical_dropdown_background_color');
        }

        $dropdown_selector = array(
            '.qodef-header-vertical .qodef-vertical-dropdown-float .menu-item .second',
            '.qodef-header-vertical .qodef-vertical-dropdown-float .second .inner ul ul'
        );

        echo aton_qodef_dynamic_css($dropdown_selector, $dropdown_styles);

        $fist_level_styles = array();
        $fist_level_hover_styles = array();

        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_color');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_fontsize').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_lineheight').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_letter_spacing').'px';
        }

        if(aton_qodef_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a:hover',
            '.qodef-header-vertical .qodef-vertical-menu > ul > li > a.qodef-active-item'
        );

        echo aton_qodef_dynamic_css($first_level_selector, $fist_level_styles);
        echo aton_qodef_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);

        $second_level_styles = array();
        $second_level_hover_styles = array();

        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontsize').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_lineheight').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_letter_spacing').'px';
        }

        if(aton_qodef_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a:hover',
            '.qodef-header-vertical .qodef-vertical-menu .second .inner > ul > li > a.qodef-active-item'
        );

        echo aton_qodef_dynamic_css($second_level_selector, $second_level_styles);
        echo aton_qodef_dynamic_css($second_level_hover_selector, $second_level_hover_styles);

        $third_level_styles = array();
        $third_level_hover_styles = array();

        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = aton_qodef_get_formatted_font_family(aton_qodef_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontsize').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_lineheight').'px';
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_letter_spacing').'px';
        }

        if(aton_qodef_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = aton_qodef_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a:hover',
            '.qodef-header-vertical .qodef-vertical-menu .second .inner ul li ul li a.qodef-active-item'
        );

        echo aton_qodef_dynamic_css($third_level_selector, $third_level_styles);
        echo aton_qodef_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
    }

    add_action('aton_qodef_style_dynamic', 'aton_qodef_vertical_main_menu_styles');
}


