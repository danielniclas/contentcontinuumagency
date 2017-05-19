<?php

if(!function_exists('aton_qodef_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function aton_qodef_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'aton')
            )
        );
    }

    add_action('after_setup_theme', 'aton_qodef_header_register_main_navigation');
}

if(!function_exists('aton_qodef_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
    function aton_qodef_is_top_bar_transparent() {
        $top_bar_enabled = aton_qodef_is_top_bar_enabled();

        $top_bar_bg_color = aton_qodef_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = aton_qodef_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
        }

        return false;
    }
}

if(!function_exists('aton_qodef_is_top_bar_completely_transparent')) {
    function aton_qodef_is_top_bar_completely_transparent() {
        $top_bar_enabled = aton_qodef_is_top_bar_enabled();

        $top_bar_bg_color = aton_qodef_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = aton_qodef_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency === '0';
        }

        return false;
    }
}

if(!function_exists('aton_qodef_is_top_bar_enabled')) {
    function aton_qodef_is_top_bar_enabled() {
        $id = aton_qodef_get_page_id();

        if(($meta_temp = get_post_meta($id, "qodef_top_bar_meta", true)) !== ""){
            $top_bar_enabled = $meta_temp == 'yes' ? true : false;
        }else {
            $top_bar_enabled = aton_qodef_options()->getOptionValue('top_bar') == 'yes' ? true : false;
        }

        return $top_bar_enabled;
    }
}

if(!function_exists('aton_qodef_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function aton_qodef_get_top_bar_height() {
        if(aton_qodef_is_top_bar_enabled()) {
            $top_bar_height = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('top_bar_height'));

            return $top_bar_height !== '' ? intval($top_bar_height) : 38;
        }

        return 0;
    }
}

if(!function_exists('aton_qodef_get_header_behaviour')) {
    /**
     * Returns header behaviour
     *
     * @return bool|int|void
     */
    function aton_qodef_get_header_behaviour() {

        return aton_qodef_get_meta_field_intersect('header_behaviour');

    }
}

if(!function_exists('aton_qodef_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function aton_qodef_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(aton_qodef_options()->getOptionValue('header_type') !== 'header-vertical' &&
           in_array(aton_qodef_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_header_height = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('aton_qodef_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function aton_qodef_get_sticky_header_height_of_complete_transparency() {

        if(aton_qodef_options()->getOptionValue('header_type') !== 'header-vertical') {
            if(aton_qodef_options()->getOptionValue('sticky_header_transparency') === '0') {
                $stickyHeaderTransparent = aton_qodef_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
                                           aton_qodef_options()->getOptionValue('sticky_header_grid_transparency') === '0';
            } else {
                $stickyHeaderTransparent = aton_qodef_options()->getOptionValue('sticky_header_background_color') !== '' &&
                                           aton_qodef_options()->getOptionValue('sticky_header_transparency') === '0';
            }

            if($stickyHeaderTransparent) {
                return 0;
            } else {
                $sticky_header_height = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('sticky_header_height'));

                return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
            }
        }
        return 0;
    }
}

if(!function_exists('aton_qodef_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function aton_qodef_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(aton_qodef_get_meta_field_intersect('header_type') !== 'header-vertical' && in_array(aton_qodef_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;
    }
}

if(!function_exists('aton_qodef_get_sticky_scroll_amount_per_page')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function aton_qodef_get_sticky_scroll_amount_per_page() {
        $post_id =  get_the_ID();
        //sticky menu scroll amount
        if(aton_qodef_get_meta_field_intersect('header_type') !== 'header-vertical'  && in_array(aton_qodef_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount_per_page = aton_qodef_filter_px(get_post_meta($post_id, "qodef_scroll_amount_for_sticky_meta", true));

            return $sticky_scroll_amount_per_page !== '' ? intval($sticky_scroll_amount_per_page) : 0;
        }

        return 0;
    }
}