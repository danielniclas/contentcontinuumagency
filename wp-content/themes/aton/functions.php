<?php
include_once get_template_directory().'/theme-includes.php';

if(!function_exists('aton_qodef_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function aton_qodef_styles() {
        wp_register_style('aton_qodef_blog', QODE_ASSETS_ROOT.'/css/blog.min.css');

        //include theme's core styles
        wp_enqueue_style('aton_qodef_default_style', QODE_ROOT.'/style.css');
        wp_enqueue_style('aton_qodef_modules_plugins', QODE_ASSETS_ROOT.'/css/plugins.min.css');
        wp_enqueue_style('aton_qodef_modules', QODE_ASSETS_ROOT.'/css/modules.min.css');

        aton_qodef_icon_collections()->enqueueStyles();

        if(aton_qodef_load_blog_assets()) {
            wp_enqueue_style('aton_qodef_blog');
        }

        if(aton_qodef_load_blog_assets() || is_singular('portfolio-item')) {
            wp_enqueue_style('wp-mediaelement');
        }

        //is woocommerce installed?
        if(aton_qodef_is_woocommerce_installed()) {
            if(aton_qodef_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style('aton_qodef_woo', QODE_ASSETS_ROOT.'/css/woocommerce.min.css');
            }
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();

        if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic.css') && aton_qodef_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('aton_qodef_style_dynamic', QODE_ASSETS_ROOT.'/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        }

        //is responsive option turned on?
        if(aton_qodef_is_responsive_on()) {
            wp_enqueue_style('aton_qodef_modules_responsive', QODE_ASSETS_ROOT.'/css/modules-responsive.min.css');
            wp_enqueue_style('aton_qodef_blog_responsive', QODE_ASSETS_ROOT.'/css/blog-responsive.min.css');

            //is woocommerce installed?
            if(aton_qodef_is_woocommerce_installed()) {
                if(aton_qodef_load_woo_assets()) {

                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('aton_qodef_woo_responsive', QODE_ASSETS_ROOT.'/css/woocommerce-responsive.min.css');
                    $style_dynamic_deps_array = array('aton_qodef_woo', 'aton_qodef_woo_responsive');
                }
            }

            //include proper styles
            if(file_exists(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css') && aton_qodef_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('aton_qodef_style_dynamic_responsive', QODE_ASSETS_ROOT.'/css/style_dynamic_responsive.css', array(), filemtime(QODE_ROOT_DIR.'/assets/css/style_dynamic_responsive.css'));
            }
        }

        //include Visual Composer styles
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_styles');
}

if(!function_exists('aton_qodef_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
    function aton_qodef_google_fonts_styles() {
        $font_simple_field_array = aton_qodef_options()->getOptionsByType('fontsimple');
        if(!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = aton_qodef_options()->getOptionsByType('font');
        if(!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);

        $google_font_weight_array = aton_qodef_options()->getOptionValue('google_font_weight');
        if(!empty($google_font_weight_array)) {
            $google_font_weight_array = array_slice(aton_qodef_options()->getOptionValue('google_font_weight'), 1);
        }

        $font_weight_str = '100,200,300,400,400italic,500,600,700,700italic,800,900';
        if(!empty($google_font_weight_array) && $google_font_weight_array !== '') {
            $font_weight_str = implode(',',$google_font_weight_array);
        }

        $google_font_subset_array = aton_qodef_options()->getOptionValue('google_font_subset');
        if(!empty($google_font_subset_array)) {
            $google_font_subset_array = array_slice(aton_qodef_options()->getOptionValue('google_font_subset'), 1);
        }

        $font_subset_str = 'latin-ext';
        if(!empty($google_font_subset_array) && $google_font_subset_array !== '') {
            $font_subset_str = implode(',',$google_font_subset_array);
        }

        //define available font options array
        $fonts_array = array();
        foreach($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = aton_qodef_options()->getOptionValue($font_option);
            if(aton_qodef_is_font_option_valid($font_option_value) && !aton_qodef_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value.':'.$font_weight_str;
                if(!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        wp_reset_postdata();

        $fonts_array         = array_diff($fonts_array, array('-1:'.$font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Catamaran:' . $font_weight_str.'|PT Serif:'.$font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode($font_subset_str),
            );

            $aton_qodef_fonts = add_query_arg( $fonts_full_list_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'aton_qodef_google_fonts', esc_url_raw($aton_qodef_fonts), array(), '1.0.0' );

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode($font_subset_str),
            );
            $aton_qodef_fonts = add_query_arg( $default_fonts_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'aton_qodef_google_fonts', esc_url_raw($aton_qodef_fonts), array(), '1.0.0' );
        }

    }

	add_action('wp_enqueue_scripts', 'aton_qodef_google_fonts_styles');
}

if(!function_exists('aton_qodef_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function aton_qodef_scripts() {
        global $wp_scripts;

        //init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('wp-mediaelement');

        wp_enqueue_script('aton_qodef_third_party', QODE_ASSETS_ROOT.'/js/third-party.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', QODE_ASSETS_ROOT.'/js/jquery.isotope.min.js', array('jquery'), false, true);
        wp_enqueue_script('packery', QODE_ASSETS_ROOT.'/js/packery-mode.pkgd.min.js', array('isotope'), false, true);

		if(aton_qodef_is_smoth_scroll_enabled()) {
			wp_enqueue_script("aton_qodef_smooth_page_scroll", QODE_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

        if(aton_qodef_is_woocommerce_installed()) {
            wp_enqueue_script('select2');
        }

        //include google map api script
        if(aton_qodef_options()->getOptionValue('google_maps_api_key') != '') {
            $google_maps_api_key = aton_qodef_options()->getOptionValue('google_maps_api_key');
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
        } else {
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true);
        }

        //wp_enqueue_script('qode_default', QODE_ASSETS_ROOT.'/js/default.js', array(), false, true);
        wp_enqueue_script('aton_qodef_modules', QODE_ASSETS_ROOT.'/js/modules.min.js', array('jquery'), false, true);

        if(aton_qodef_load_blog_assets()) {
            wp_enqueue_script('aton_qodef_blog', QODE_ASSETS_ROOT.'/js/blog.min.js', array('jquery'), false, true);
        }

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if(is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script("comment-reply");
        }

        //include Visual Composer script
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_scripts');
}

//defined content width variable
if (!isset( $content_width )) $content_width = 1060;

if(!function_exists('aton_qodef_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function aton_qodef_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('aton_qodef_square', 550, 550, true);
        add_image_size('aton_qodef_landscape', 800, 600, true);
        add_image_size('aton_qodef_portrait', 600, 800, true);
        add_image_size('aton_qodef_square_alt', 485, 485, true);
        add_image_size('aton_qodef_large_width', 1000, 485, true);
        add_image_size('aton_qodef_large_height', 485, 1000, true);
        add_image_size('aton_qodef_large_width_height', 1000, 1000, true);

        load_theme_textdomain( 'aton', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'aton_qodef_theme_setup');
}


if(!function_exists('aton_qodef_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function aton_qodef_rgba_color($color, $transparency) {
        if($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = aton_qodef_hex2rgb($color);
            $rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

            return $rgba_color;
        }
    }
}

if(!function_exists('aton_qodef_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function aton_qodef_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

    <?php }

    add_action('aton_qodef_header_meta', 'aton_qodef_header_meta');
}

if(!function_exists('aton_qodef_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to aton_qodef_header_meta action
     */
    function aton_qodef_user_scalable_meta() {
        //is responsiveness option is chosen?
        if(aton_qodef_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('aton_qodef_header_meta', 'aton_qodef_user_scalable_meta');
}

if(!function_exists('aton_qodef_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see aton_qodef_is_woocommerce_installed()
	 * @see aton_qodef_is_woocommerce_shop()
	 */
	function aton_qodef_get_page_id() {
		if(aton_qodef_is_woocommerce_installed() && aton_qodef_is_woocommerce_shop()) {
			return aton_qodef_get_woo_shop_page_id();
		}

		if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if(!function_exists('aton_qodef_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function aton_qodef_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if(!function_exists('aton_qodef_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function aton_qodef_get_page_template_name() {
        $file_name = '';

        if(!aton_qodef_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if(!function_exists('aton_qodef_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function aton_qodef_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if($shortcode) {
            //if content variable isn't past
            if($content == '') {
                //take content from current post
                $page_id = aton_qodef_get_page_id();
                if(!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if(is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if(stripos($content, '['.$shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if(!function_exists('aton_qodef_get_dynamic_sidebar')) {
    /**
     * Return Custom Widget Area content
     *
     * @return string
     */
    function aton_qodef_get_dynamic_sidebar($index = 1) {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();

        return $sidebar_contents;
    }
}

if(!function_exists('aton_qodef_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function aton_qodef_get_sidebar() {

        $id = aton_qodef_get_page_id();

        $sidebar = "sidebar";

        if (get_post_meta($id, 'qodef_custom_sidebar_meta', true) != '') {
            $sidebar = get_post_meta($id, 'qodef_custom_sidebar_meta', true);
        } else {
            if (is_single() && aton_qodef_options()->getOptionValue('blog_single_custom_sidebar') != '') {
                $sidebar = esc_attr(aton_qodef_options()->getOptionValue('blog_single_custom_sidebar'));
            } elseif((aton_qodef_is_product_category() || aton_qodef_is_product_tag()) && aton_qodef_get_woo_shop_page_id()) {
                $shop_id = aton_qodef_get_woo_shop_page_id();
                if(get_post_meta($shop_id, 'qodef_custom_sidebar_meta', true) != '') {
                    $sidebar = esc_attr(get_post_meta($shop_id, 'qodef_custom_sidebar_meta', true));
                }
            } elseif ((is_archive() || (is_home() && is_front_page())) && aton_qodef_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(aton_qodef_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_page() && aton_qodef_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(aton_qodef_options()->getOptionValue('page_custom_sidebar'));
            }
        }

        return $sidebar;
    }
}



if( !function_exists('aton_qodef_sidebar_columns_class') ) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function aton_qodef_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = aton_qodef_sidebar_layout();

        switch($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'qodef-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'qodef-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'qodef-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'qodef-two-columns-25-75';
                break;

        endswitch;

        $sidebar_class[] = 'clearfix';

        return aton_qodef_class_attribute($sidebar_class);

    }

}


if( !function_exists('aton_qodef_sidebar_layout') ) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */

    function aton_qodef_sidebar_layout() {

        $sidebar_layout = '';
        $page_id        = aton_qodef_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'qodef_sidebar_meta', true);

        if(($page_sidebar_meta !== '') && $page_id !== -1) {
            if($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if(is_single() && aton_qodef_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(aton_qodef_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif((aton_qodef_is_product_category() || aton_qodef_is_product_tag()) && aton_qodef_get_woo_shop_page_id()) {
                $shop_id = aton_qodef_get_woo_shop_page_id();
                if (get_post_meta($shop_id, 'qodef_sidebar_meta', true) != '') {
                    $sidebar_layout = esc_attr(get_post_meta($shop_id, 'qodef_sidebar_meta', true));
                }
            } elseif((is_archive() || (is_home() && is_front_page())) && aton_qodef_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(aton_qodef_options()->getOptionValue('archive_sidebar_layout'));
            } elseif(is_page() && aton_qodef_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(aton_qodef_options()->getOptionValue('page_sidebar_layout'));
            }
        }

        return $sidebar_layout;
    }
}

if( !function_exists('aton_qodef_page_custom_style') ) {
    /**
     * Function that print custom page style
     */
    function aton_qodef_page_custom_style() {
        $style = '';
        $style = apply_filters('aton_qodef_add_page_custom_style', $style);

        if($style !== '') {
            wp_add_inline_style( 'aton_qodef_modules', $style);
        }
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_page_custom_style');
}

if( !function_exists('aton_qodef_container_style') ) {

    /**
     * Function that return container style
     */

    function aton_qodef_container_style($style) {
        $id = aton_qodef_get_page_id();
        $class_prefix = aton_qodef_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-container',
            $class_prefix.' .qodef-content .qodef-content-inner > .qodef-full-width',
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($id, "qodef_page_background_color_meta", true);

        if($page_backgorund_color){
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = aton_qodef_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('aton_qodef_add_page_custom_style', 'aton_qodef_container_style');
}

if(!function_exists('aton_qodef_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * @return string
     */
    function aton_qodef_get_unique_page_class() {
        $id = aton_qodef_get_page_id();
        $page_class = '';

        if(is_single()) {
            $page_class = '.postid-'.$id;
        } elseif($id === aton_qodef_get_woo_shop_page_id()) {
            $page_class = '.archive';
        } else {
            $page_class .= '.page-id-'.$id;
        }

        return $page_class;
    }
}

if( !function_exists('aton_qodef_page_padding') ) {

    /**
     * Function that return container style
     */

    function aton_qodef_page_padding( $style ) {
		
		$id = aton_qodef_get_page_id();
        $class_prefix = aton_qodef_get_unique_page_class();

        $page_selector = array(
            $class_prefix . ' .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
			$class_prefix . ' .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner'
        );
        $page_css = array();

        $page_padding = get_post_meta($id, 'qodef_page_padding_meta', true);

        if($page_padding !== ''){
            $page_css['padding'] = $page_padding;
        }

        $current_style = aton_qodef_dynamic_css($page_selector, $page_css);

        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('aton_qodef_add_page_custom_style', 'aton_qodef_page_padding');
}

if(!function_exists('aton_qodef_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function aton_qodef_print_custom_css() {
        $custom_css = aton_qodef_options()->getOptionValue('custom_css');

        if($custom_css !== '') {
            wp_add_inline_style( 'aton_qodef_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_print_custom_css');
}

if(!function_exists('aton_qodef_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function aton_qodef_print_custom_js() {
        $custom_js = aton_qodef_options()->getOptionValue('custom_js');

        if($custom_js !== '') {
            wp_add_inline_script('aton_qodef_modules', $custom_js);
        }
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_print_custom_js');
}

if(!function_exists('aton_qodef_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function aton_qodef_get_global_variables() {

        $global_variables = array();
        $element_appear_amount = -150;

        $global_variables['qodefAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['qodefElementAppearAmount'] = aton_qodef_options()->getOptionValue('element_appear_amount') !== '' ? aton_qodef_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
        $global_variables['qodefFinishedMessage'] = esc_html__('No more posts', 'aton');
        $global_variables['qodefMessage'] = esc_html__('Loading new posts...', 'aton');

        $global_variables = apply_filters('aton_qodef_js_global_variables', $global_variables);

        wp_localize_script('aton_qodef_modules', 'qodefGlobalVars', array(
            'vars' => $global_variables
        ));

    }

    add_action('wp_enqueue_scripts', 'aton_qodef_get_global_variables');
}

if(!function_exists('aton_qodef_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function aton_qodef_per_page_js_variables() {
        $per_page_js_vars = apply_filters('aton_qodef_per_page_js_vars', array());

        wp_localize_script('aton_qodef_modules', 'qodefPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'aton_qodef_per_page_js_variables');
}

if(!function_exists('aton_qodef_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function aton_qodef_content_elem_style_attr() {
        $styles = apply_filters('aton_qodef_content_elem_style_attr', array());

        aton_qodef_inline_style($styles);
    }
}

if(!function_exists('aton_qodef_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function aton_qodef_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if(!function_exists('aton_qodef_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function aton_qodef_visual_composer_installed() {
        //is Visual Composer installed?
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('aton_qodef_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function aton_qodef_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if(defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('aton_qodef_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function aton_qodef_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if (!function_exists('aton_qodef_is_membership_installed')) {
    /**
     * Function that checks if Qode Membership Plugin installed
     *
     * @return bool
     */
    function aton_qodef_is_membership_installed() {
        return defined('QODE_MEMBERSHIP_VERSION');
    }
}

if(!function_exists('aton_qodef_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function aton_qodef_max_image_width_srcset() {
        return 1920;
    }

	add_filter('max_srcset_image_width', 'aton_qodef_max_image_width_srcset');
}

function aton_qodef_add_user_custom_fields($user_contact) {

    /**
     * Function that add custom user fields
     **/
    $user_contact['facebook']		= esc_html__( 'Facebook', 'aton');
    $user_contact['twitter']		= esc_html__( 'Twitter', 'aton');
    $user_contact['googleplus']		= esc_html__( 'Google Plus', 'aton' );
    $user_contact['instagram']		= esc_html__( 'Instagram', 'aton' );
    $user_contact['linkedin']		= esc_html__( 'LinkedIn', 'aton' );

    return $user_contact;

}




if(! function_exists('aton_qodef_get_user_custom_fields')){
    /**
     * Function returns links and icons for author social networks
     *
     * return array
     *
     */
    function aton_qodef_get_user_custom_fields( $id ){

        $user_social_array = array();
        $social_network_array = array('twitter','facebook','instagram','linkedin','googleplus');

        foreach($social_network_array as $network){
            if(get_the_author_meta($network, $id) != '') {
                $$network = array(
                    'name' => $network,
                    'link' => get_the_author_meta($network, $id),
                    'class' => 'social_' . $network
                );

            $user_social_array[$network] = $$network;
            }
        }

        return $user_social_array;
    }
}

if(!function_exists('aton_qodef_attachment_field_custom_size')) {

    function aton_qodef_attachment_field_custom_size($form_fields, $post){
        $field_value = get_post_meta($post->ID, 'qodef_portfolio_single_predefined_size', true);
        $form_fields['qodef_portfolio_single_predefined_size'] = array(
            'label' => esc_html__('Masonry Size', 'aton'),
            'input' => 'text',
            'value' => $field_value ? $field_value : ''
        );
        $form_fields["qodef_portfolio_single_predefined_size"]["extra_rows"] = array(
            "row1" => esc_html__('Enter "large" (twice the size of default image) for Masonry Gallery templates on Portfolio Single Pages.', 'aton')
        );
        return $form_fields;
    }
}

add_filter( 'attachment_fields_to_edit', 'aton_qodef_attachment_field_custom_size', 10, 2 );


if(!function_exists('aton_qodef_attachment_field_custom_size_save')) {

    function aton_qodef_attachment_field_custom_size_save($post, $attachment){
        if (isset($attachment['qodef_portfolio_single_predefined_size'])) {
            update_post_meta($post['ID'], 'qodef_portfolio_single_predefined_size', $attachment['qodef_portfolio_single_predefined_size']);
        }
        return $post;
    }
}

add_filter( 'attachment_fields_to_save', 'aton_qodef_attachment_field_custom_size_save', 10, 2 );