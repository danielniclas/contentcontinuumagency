<?php

if (!function_exists('aton_qodef_register_footer_sidebar')) {

	function aton_qodef_register_footer_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Footer Column 1', 'aton'),
			'id' => 'footer_column_1',
			'description' => esc_html__('Footer Column 1', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 2', 'aton'),
			'id' => 'footer_column_2',
			'description' => esc_html__('Footer Column 2', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 3', 'aton'),
			'id' => 'footer_column_3',
			'description' => esc_html__('Footer Column 3', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 4', 'aton'),
			'id' => 'footer_column_4',
			'description' => esc_html__('Footer Column 4', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

        register_sidebar(array(
            'name' => esc_html__('Footer Top Simple', 'aton'),
            'description'   => esc_html__('Widgets added here will appear in top footer area', 'aton'),
            'id' => 'footer_top_simple',
            'before_widget' => '<div id="%1$s" class="widget qodef-footer-top-simple %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="qodef-widget-title-holder"><h2 class="qodef-widget-title">',
            'after_title' => '</h2></div>'
        ));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom', 'aton'),
			'id' => 'footer_text',
			'description' => esc_html__('Footer Bottom', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-text %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left', 'aton'),
			'id' => 'footer_bottom_left',
			'description' => esc_html__('Footer Bottom Left', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right', 'aton'),
			'id' => 'footer_bottom_right',
			'description' => esc_html__('Footer Bottom Right', 'aton'),
			'before_widget' => '<div id="%1$s" class="widget qodef-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="qodef-footer-widget-title">',
			'after_title' => '</h5>'
		));

	}

	add_action('widgets_init', 'aton_qodef_register_footer_sidebar');

}

if (!function_exists('aton_qodef_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function aton_qodef_get_footer() {

		$parameters = array();
		$id = aton_qodef_get_page_id();
		$parameters['footer_classes'] = aton_qodef_get_footer_classes($id);
		$parameters['display_footer_top'] = (aton_qodef_options()->getOptionValue('show_footer_top') == 'yes') ? true : false;
        if($parameters['display_footer_top'] == 'yes') {
            $parameters['footer_top_type'] = aton_qodef_get_meta_field_intersect('footer_top_type');
        }
		$parameters['display_footer_bottom'] = (aton_qodef_options()->getOptionValue('show_footer_bottom') == 'yes') ? true : false;


		if(!is_active_sidebar('footer_column_1') && !is_active_sidebar('footer_column_2') && !is_active_sidebar('footer_column_3') && !is_active_sidebar('footer_column_4')) {
			$parameters['display_footer_top'] = false;
		}

		if(!is_active_sidebar('footer_bottom_left') && !is_active_sidebar('footer_text') && !is_active_sidebar('footer_bottom_right')) {
			$parameters['display_footer_bottom'] = false;
		}


		aton_qodef_get_module_template_part('templates/footer', 'footer', '', $parameters);

	}

}

if (!function_exists('aton_qodef_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function aton_qodef_get_content_bottom_area() {

		$parameters = array();

		//Current page id
		$id = aton_qodef_get_page_id();

		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = aton_qodef_get_meta_field_intersect('enable_content_bottom_area');
		if ($parameters['content_bottom_area'] == 'yes') {
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = aton_qodef_get_meta_field_intersect('content_bottom_sidebar_custom_display');
			//Content bottom area in grid
			$parameters['content_bottom_area_in_grid'] = aton_qodef_get_meta_field_intersect('content_bottom_in_grid');
			//Content bottom area background color
			$parameters['content_bottom_background_color'] = 'background-color: '.aton_qodef_get_meta_field_intersect('content_bottom_background_color');
		}

		aton_qodef_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

	}

}

if (!function_exists('aton_qodef_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function aton_qodef_get_footer_top() {

		$parameters = array();

		$parameters['footer_top_border'] = aton_qodef_get_footer_top_border();
		$parameters['footer_top_border_in_grid'] = (aton_qodef_options()->getOptionValue('footer_top_border_in_grid') == 'yes') ? 'qodef-in-grid' : '';
		$parameters['footer_in_grid'] = (aton_qodef_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_top_classes'] = aton_qodef_footer_top_classes();
		$parameters['footer_top_columns'] = aton_qodef_options()->getOptionValue('footer_top_columns');
        $parameters['footer_top_background_image'] = (aton_qodef_get_meta_field_intersect('footer_top_background_image') !== '') ? 'background-image: url('.aton_qodef_get_meta_field_intersect('footer_top_background_image').')' : '';



        $type = aton_qodef_get_meta_field_intersect('footer_top_type');


        aton_qodef_get_module_template_part('templates/parts/footer-top', 'footer', $type, $parameters);

	}
	
}

if (!function_exists('aton_qodef_get_footer_top_simple')) {
    /**
     * Return footer top HTML
     */
    function aton_qodef_get_footer_top_simple() {
        $parameters = array();

        //get footer top grid/full width class
        $parameters['footer_top_simple_grid_class'] = aton_qodef_footer_top_simple_classes();;

        aton_qodef_get_module_template_part('templates/parts/footer-top-simple', 'footer', '', $parameters);
    }
}


if (!function_exists('aton_qodef_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function aton_qodef_get_footer_bottom() {

		$parameters = array();

		$parameters['footer_bottom_border'] = aton_qodef_get_footer_bottom_border();
		$parameters['footer_bottom_border_in_grid'] = (aton_qodef_options()->getOptionValue('footer_bottom_border_in_grid') == 'yes') ? 'qodef-in-grid' : '';
		$parameters['footer_in_grid'] = (aton_qodef_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
		$parameters['footer_bottom_columns'] = aton_qodef_options()->getOptionValue('footer_bottom_columns');
		$parameters['footer_bottom_border_bottom'] = aton_qodef_get_footer_bottom_bottom_border();

		aton_qodef_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);

	}

}

//Functions for loading sidebars

if (!function_exists('aton_qodef_get_footer_sidebar_25_25_50')) {

	function aton_qodef_get_footer_sidebar_25_25_50() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_sidebar_50_25_25')) {

	function aton_qodef_get_footer_sidebar_50_25_25() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_sidebar_four_columns')) {

	function aton_qodef_get_footer_sidebar_four_columns() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_sidebar_three_columns')) {

	function aton_qodef_get_footer_sidebar_three_columns() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_sidebar_two_columns')) {

	function aton_qodef_get_footer_sidebar_two_columns() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_sidebar_one_column')) {

	function aton_qodef_get_footer_sidebar_one_column() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_bottom_sidebar_three_columns')) {

	function aton_qodef_get_footer_bottom_sidebar_three_columns() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_bottom_sidebar_two_columns')) {

	function aton_qodef_get_footer_bottom_sidebar_two_columns() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}

}

if (!function_exists('aton_qodef_get_footer_bottom_sidebar_one_column')) {

	function aton_qodef_get_footer_bottom_sidebar_one_column() {
		aton_qodef_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}

}

