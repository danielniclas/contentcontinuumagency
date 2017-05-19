<?php

use AtonQodef\Modules\Header\Lib\HeaderFactory;

if(!function_exists('aton_qodef_get_header')) {
    /**
     * Loads header HTML based on header type option. Sets all necessary parameters for header
     * and defines aton_qodef_header_type_parameters filter
     */
    function aton_qodef_get_header() {

        //will be read from options
        $header_type     = aton_qodef_get_meta_field_intersect('header_type');
        $header_behavior = aton_qodef_get_meta_field_intersect('header_behaviour');

        extract(aton_qodef_get_page_options());

        if(HeaderFactory::getInstance()->validHeaderObject()) {
            $parameters = array(
                'hide_logo'          => aton_qodef_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
                'show_sticky'        => in_array($header_behavior, array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up'
                )) ? true : false,
                'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
                'menu_area_background_color' => $menu_area_background_color,
                'vertical_header_background_color' => $vertical_header_background_color,
                'vertical_header_opacity' => $vertical_header_opacity,
                'vertical_background_image' => $vertical_background_image
            );

            $parameters = apply_filters('aton_qodef_header_type_parameters', $parameters, $header_type);

            HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
        }
    }
}

if(!function_exists('aton_qodef_get_header_top')) {
    /**
     * Loads header top HTML and sets parameters for it
     */
    function aton_qodef_get_header_top() {

        //generate column width class
        switch(aton_qodef_options()->getOptionValue('top_bar_layout')) {
            case ('two-columns'):
                $column_widht_class = '50-50';
                break;
            case ('three-columns'):
                $column_widht_class = aton_qodef_options()->getOptionValue('top_bar_column_widths');
                break;
        }

        $params = array(
            'column_widths'      => $column_widht_class,
            'show_widget_center' => aton_qodef_options()->getOptionValue('top_bar_layout') == 'three-columns' ? true : false,
            'show_header_top'    => aton_qodef_get_meta_field_intersect('top_bar') == 'yes' ? true : false,
            'top_bar_in_grid'    => aton_qodef_get_meta_field_intersect('top_bar_in_grid') == 'yes' ? true : false
        );

        $params = apply_filters('aton_qodef_header_top_params', $params);

        aton_qodef_get_module_template_part('templates/parts/header-top', 'header', '', $params);
    }
}

if(!function_exists('aton_qodef_get_logo')) {
    /**
     * Loads logo HTML
     *
     * @param $slug
     */
    function aton_qodef_get_logo($slug = '') {

        $slug = $slug !== '' ? $slug : aton_qodef_get_meta_field_intersect('header_type');

        if($slug == 'sticky'){
            $logo_image = aton_qodef_options()->getOptionValue('logo_image_sticky');
        }else{
            $logo_image = aton_qodef_options()->getOptionValue('logo_image');
        }

        $logo_image_dark = aton_qodef_options()->getOptionValue('logo_image_dark');
        $logo_image_light = aton_qodef_options()->getOptionValue('logo_image_light');
        $logo_image_fullscreen = aton_qodef_options()->getOptionValue('fullscreen_logo');


        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = aton_qodef_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px;'; //divided with 2 because of retina screens
        }

        $params = array(
            'logo_image'  => $logo_image,
            'logo_image_dark' => $logo_image_dark,
            'logo_image_light' => $logo_image_light,
            'logo_image_fullscreen' => $logo_image_fullscreen,
            'logo_styles' => $logo_styles
        );

        aton_qodef_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
    }
}

if(!function_exists('aton_qodef_get_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function aton_qodef_get_main_menu($additional_class = 'qodef-default-nav') {
        aton_qodef_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if(!function_exists('aton_qodef_get_full_screen_opener')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function aton_qodef_get_full_screen_opener() {
        aton_qodef_get_module_template_part('templates/parts/full-screen-opener', 'header', '');
    }
}

if(!function_exists('aton_qodef_get_sticky_menu')) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function aton_qodef_get_sticky_menu($additional_class = 'qodef-default-nav') {
		aton_qodef_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
	}
}


if(!function_exists('aton_qodef_get_vertical_main_menu')) {
    /**
     * Loads vertical menu HTML
     */
    function aton_qodef_get_vertical_main_menu() {
        aton_qodef_get_module_template_part('templates/parts/vertical-navigation', 'header', '');
    }
}



if(!function_exists('aton_qodef_get_sticky_header')) {
    /**
     * Loads sticky header behavior HTML
     */
    function aton_qodef_get_sticky_header() {

        $parameters = array(
            'hide_logo'             => aton_qodef_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
            'sticky_header_in_grid' => aton_qodef_get_meta_field_intersect('sticky_header_in_grid') == 'yes' ? true : false
        );

        aton_qodef_get_module_template_part('templates/behaviors/sticky-header', 'header', '', $parameters);
    }
}

if(!function_exists('aton_qodef_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function aton_qodef_get_mobile_header() {
        if(aton_qodef_is_responsive_on()) {
            $header_type = aton_qodef_get_meta_field_intersect('header_type');

            //this could be read from theme options
            $mobile_header_type = 'mobile-header';

            $parameters = array(
                'show_logo'              => aton_qodef_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
                'menu_opener_icon'       => aton_qodef_icon_collections()->getMobileMenuIcon(aton_qodef_options()->getOptionValue('mobile_icon_pack'), true),
                'show_navigation_opener' => has_nav_menu('main-navigation')
            );

            aton_qodef_get_module_template_part('templates/types/'.$mobile_header_type, 'header', $header_type, $parameters);
        }
    }
}

if(!function_exists('aton_qodef_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     *
     * @param string $slug
     */
    function aton_qodef_get_mobile_logo($slug = '') {

        $slug = $slug !== '' ? $slug : aton_qodef_get_meta_field_intersect('header_type');

        //check if mobile logo has been set and use that, else use normal logo
        if(aton_qodef_options()->getOptionValue('logo_image_mobile') !== '') {
            $logo_image = aton_qodef_options()->getOptionValue('logo_image_mobile');
        } else {
            $logo_image = aton_qodef_options()->getOptionValue('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = aton_qodef_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if(is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: '.intval($logo_height / 2).'px'; //divided with 2 because of retina screens
        }

        //set parameters for logo
        $parameters = array(
            'logo_image'      => $logo_image,
            'logo_dimensions' => $logo_dimensions,
            'logo_height'     => $logo_height,
            'logo_styles'     => $logo_styles
        );

        aton_qodef_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
    }
}

if(!function_exists('aton_qodef_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function aton_qodef_get_mobile_nav() {

        $slug = aton_qodef_get_meta_field_intersect('header_type');

        aton_qodef_get_module_template_part('templates/parts/mobile-navigation', 'header', $slug);
    }
}

if(!function_exists('aton_qodef_get_page_options')) {
    /**
     * Gets options from page
     */
    function aton_qodef_get_page_options() {
        $id = aton_qodef_get_page_id();
        $page_options = array();
        $menu_area_background_color_rgba = '';
        $menu_area_background_color = '';
        $menu_area_background_transparency = '';
        $vertical_header_background_color = '';
        $vertical_header_opacity = '';
        $vertical_background_image = '';

        $header_type = aton_qodef_get_meta_field_intersect('header_type');
        switch ($header_type) {
            case 'header-standard':

                if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true)) != '') {
                    $menu_area_background_color = $meta_temp;
                }

                if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true)) != '') {
                    $menu_area_background_transparency = $meta_temp;
                }

                if(aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency) !== null) {
                    $menu_area_background_color_rgba = 'background-color:'.aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
                }

                break;

            case 'header-centered':

                if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_color_header_centered_meta', true)) != '') {
                    $menu_area_background_color = $meta_temp;
                }

                if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_transparency_header_centered_meta', true)) != '') {
                    $menu_area_background_transparency = $meta_temp;
                }

                if(aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency) !== null) {
                    $menu_area_background_color_rgba = 'background-color:'.aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
                }

                break;

            case 'header-vertical':
                if(($meta_temp = get_post_meta($id, 'qodef_vertical_header_background_color_meta', true)) !== '') {
                    $vertical_header_background_color = 'background-color:'.$meta_temp;
                }

                if(($meta_temp = get_post_meta($id, 'qodef_vertical_header_transparency_meta', true)) !== '') {
                    $vertical_header_opacity = 'opacity:'.$meta_temp;
                }

                if(get_post_meta($id, 'qodef_disable_vertical_header_background_image_meta', true) == 'yes'){
                    $vertical_background_image = 'background-image:none';
                }elseif(($meta_temp = get_post_meta($id, 'qodef_vertical_header_background_image_meta', true)) !== ''){
                    $vertical_background_image = 'background-image:url('.$meta_temp.')';
                }

                break;

                case 'header-full-screen':

                    if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_color_header_full_screen_meta', true)) != '') {
                        $menu_area_background_color = $meta_temp;
                    }

                    if(($meta_temp = get_post_meta($id, 'qodef_menu_area_background_transparency_header_full_screen_meta', true)) != '') {
                        $menu_area_background_transparency = $meta_temp;
                    }

                    if(aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency) !== null) {
                        $menu_area_background_color_rgba = 'background-color:'.aton_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
                    }


                    break;

        }

        $page_options['menu_area_background_color'] = $menu_area_background_color_rgba;
        $page_options['vertical_header_background_color'] = $vertical_header_background_color;
        $page_options['vertical_header_opacity'] = $vertical_header_opacity;
        $page_options['vertical_background_image'] = $vertical_background_image;

        return $page_options;
    }
}