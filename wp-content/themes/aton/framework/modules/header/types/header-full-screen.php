<?php
namespace AtonQodef\Modules\Header\Types;

use AtonQodef\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header FullScreen layout and option
 *
 * Class HeaderFullScreen
 */
class HeaderFullScreen extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-full-screen';

        if(!is_admin()) {

            $menuAreaHeight       = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('menu_area_height_header_full_screen'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? (int)$menuAreaHeight : 75;

            $mobileHeaderHeight       = aton_qodef_filter_px(aton_qodef_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? (int)$mobileHeaderHeight : 75;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('aton_qodef_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('aton_qodef_per_page_js_vars', array($this, 'getPerPageJSVariables'));

        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        $parameters['menu_area_in_grid'] = aton_qodef_get_meta_field_intersect('menu_area_in_grid_header_full_screen') == 'yes' ? true : false;

        $parameters = apply_filters('aton_qodef_header_full_screen_parameters', $parameters);

        aton_qodef_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }


    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = aton_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_full_screen_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_full_screen_meta', true) !== '' &&
                get_post_meta($id, 'qodef_menu_area_background_transparency_header_full_screen_meta', true) !== '1';
        } elseif(aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen') == '') {
            $menuAreaTransparent = aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_full_screen') !== '' &&
                aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_full_screen') !== '1';
        } else {
            $menuAreaTransparent = aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen') !== '' &&
                aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_full_screen') !== '1';
        }


        $sliderExists = get_post_meta($id, 'qodef_page_slider_meta', true) !== '';

        if($sliderExists){
            $menuAreaTransparent = true;

            /** This condition is set because on blog templates content is not displayed
             *  so sliders are placed on page through slider field.
             *  In design we had blog slider with this behavior.
             *  If any other slider needs this effect to be excluded, just add it to slider list in aton_qodef_has_non_transparent_slider() function.
             */
            if(aton_qodef_is_blog_template()){
                if($this->aton_qodef_has_non_transparent_slider(get_post_meta($id, 'qodef_page_slider_meta', true))) {
                    $menuAreaTransparent = false;
                }
            }
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if((aton_qodef_is_top_bar_enabled())
                || aton_qodef_is_top_bar_enabled() && aton_qodef_is_top_bar_transparent()) {
                $transparencyHeight += aton_qodef_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = aton_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_full_screen_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_full_screen_meta', true) !== '' &&
                get_post_meta($id, 'qodef_menu_area_background_transparency_header_full_screen_meta', true) === '0';
        } elseif(aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen') == '') {
            $menuAreaTransparent = aton_qodef_options()->getOptionValue('menu_area_grid_background_color_header_full_screen') !== '' &&
                aton_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_full_screen') === '0';
        } else {
            $menuAreaTransparent = aton_qodef_options()->getOptionValue('menu_area_background_color_header_full_screen') !== '' &&
                aton_qodef_options()->getOptionValue('menu_area_background_transparency_header_full_screen') === '0';
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(aton_qodef_is_top_bar_enabled()) {
            $headerHeight += aton_qodef_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['qodefLogoAreaHeight'] = 0;
        $globalVariables['qodefMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['qodefMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(aton_qodef_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['qodefHeaderTransparencyHeight'] = $this->headerHeight - (aton_qodef_get_top_bar_height() + $this->heightOfCompleteTransparency);
        }else{
            $perPageVars['qodefHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }

    /**
     * Returns if page contains slider that should not be under header
     *
     * @param $content
     * @return bool
     */

    public function aton_qodef_has_non_transparent_slider($content = '') {
        $has_shortcode = false;

        $slider_shortcodes = array(
            'qodef_blog_slider'
        );

        foreach ($slider_shortcodes as $slider_shortcode) {
            if($slider_shortcode) {
                //does content has shortcode added?
                if(stripos($content, '['.$slider_shortcode) !== false) {
                    $has_shortcode = true;
                }
            }
        }

        return $has_shortcode;
    }
}