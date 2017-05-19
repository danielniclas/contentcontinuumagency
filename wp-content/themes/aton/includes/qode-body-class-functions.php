<?php

if(!function_exists('aton_qodef_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function aton_qodef_boxed_class($classes) {

        //is boxed layout turned on?
        if(aton_qodef_get_meta_field_intersect('boxed') == 'yes' && aton_qodef_get_meta_field_intersect('header_type') !== 'header-vertical') {
            $classes[] = 'qodef-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_boxed_class');
}

if(!function_exists('aton_qodef_passepartout_class')) {
    /**
     * Function that adds classes on body for passepartout layout
     */
    function aton_qodef_passepartout_class($classes) {

        if(aton_qodef_get_meta_field_intersect('passepartout') == 'yes') {
            $classes[] = 'qodef-passepartout';
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_passepartout_class');
}

if(!function_exists('aton_qodef_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function aton_qodef_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_theme_version_class');
}

if(!function_exists('aton_qodef_smooth_scroll_class')) {
    /**
     * Function that adds classes on body for smooth scroll
     */
    function aton_qodef_smooth_scroll_class($classes) {

        //is smooth scroll enabled enabled?
        if(aton_qodef_options()->getOptionValue('smooth_scroll') == 'yes') {
            $classes[] = 'qodef-smooth-scroll';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_smooth_scroll_class');
}

if(!function_exists('aton_qodef_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function aton_qodef_smooth_page_transitions_class($classes) {

        $id = aton_qodef_get_page_id();

        if(aton_qodef_get_meta_field_intersect('smooth_page_transitions',$id) == 'yes') {
            $classes[] = 'qodef-smooth-page-transitions';

            if(aton_qodef_get_meta_field_intersect('page_transition_preloader',$id) == 'yes') {
                $classes[] = 'qodef-smooth-page-transitions-preloader';
            }

            if(aton_qodef_get_meta_field_intersect('page_transition_fadeout',$id) == 'yes') {
                $classes[] = 'qodef-smooth-page-transitions-fadeout';
            }

        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_smooth_page_transitions_class');
}

if(!function_exists('aton_qodef_smooth_pt_true_ajax_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function aton_qodef_smooth_pt_true_ajax_class($classes) {

        $classes[] = 'qodef-mimic-ajax';

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_smooth_pt_true_ajax_class');
}

if(!function_exists('aton_qodef_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function aton_qodef_content_initial_width_body_class($classes) {

        if(aton_qodef_options()->getOptionValue('initial_content_width')) {
            $classes[] = 'qodef-'.aton_qodef_options()->getOptionValue('initial_content_width');
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_content_initial_width_body_class');
}

if(!function_exists('aton_qodef_set_blog_body_class')) {
    /**
     * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function aton_qodef_set_blog_body_class($classes) {

        if(aton_qodef_load_blog_assets()) {
            $classes[] = 'qodef-blog-installed';
        }

        return $classes;
    }

    add_filter('body_class', 'aton_qodef_set_blog_body_class');
}


if(!function_exists('aton_qodef_set_portfolio_single_info_follow_body_class')) {
    /**
     * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
     *
     * @param $classes array of body classes
     *
     * @return array with follow portfolio info class body class added
     */

    function aton_qodef_set_portfolio_single_info_follow_body_class($classes) {

        if(is_singular('portfolio-item')){
            if(aton_qodef_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes'){
                $classes[] = 'qodef-follow-portfolio-info';
            }
        }


        return $classes;
    }

    add_filter('body_class', 'aton_qodef_set_portfolio_single_info_follow_body_class');
}