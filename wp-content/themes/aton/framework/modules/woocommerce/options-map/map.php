<?php

if ( ! function_exists('aton_qodef_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function aton_qodef_woocommerce_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'aton'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = aton_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'aton')
			)
		);

		aton_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> 'Product List Columns',
			'default_value'	=> 'qodef-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'aton'),
			'options'		=> array(
				'qodef-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'aton'),
				'qodef-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'aton')
			),
			'parent'      	=> $panel_product_list,
		));

		aton_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'aton'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'aton'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        	=> 'qodef_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'aton'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'		=> array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));

        $group_product_list_title = aton_qodef_add_admin_group(array(
            'title' => esc_html__('Title Typography', 'aton'),
            'name' => 'group_product_list_title',
            'parent' => $panel_product_list,
            'description' => esc_html__('Define custom styles for product list title', 'aton'),
        ));

        $typography_row = aton_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $group_product_list_title
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'product_list_title_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'aton'),
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'aton'),
            'options'       => aton_qodef_get_text_transform_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'aton'),
            'options'       => aton_qodef_get_font_style_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'product_list_title_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = aton_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $group_product_list_title
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'aton'),
            'options'       => aton_qodef_get_font_weight_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'product_list_title_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = aton_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'aton')
			)
		);

		aton_qodef_add_admin_field(array(
			'name'        	=> 'qodef_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag', 'aton'),
			'default_value'	=> 'h2',
			'description' 	=> '',
			'options'		=> array(
				'h2' => esc_html__('h2', 'aton'),
				'h3' => esc_html__('h3', 'aton'),
				'h4' => esc_html__('h4', 'aton'),
				'h5' => esc_html__('h5', 'aton'),
				'h6' => esc_html__('h6', 'aton'),
			),
			'parent'      	=> $panel_single_product,
		));

        $group_product_single_title = aton_qodef_add_admin_group(array(
            'title' => esc_html__('Title Typography', 'aton'),
            'name' => 'group_product_single_title',
            'parent' => $panel_single_product,
            'description' => esc_html__('Define custom styles for product single title', 'aton'),
        ));

        $typography_row = aton_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $group_product_single_title
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'product_single_title_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'aton'),
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'aton'),
            'options'       => aton_qodef_get_text_transform_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'aton'),
            'options'       => aton_qodef_get_font_style_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'product_single_title_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = aton_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $group_product_single_title
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'aton'),
            'options'       => aton_qodef_get_font_weight_array()
        ));

        aton_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'product_single_title_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'aton'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = aton_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'aton')
			)
		);

			aton_qodef_add_admin_field(array(
				'name'        	=> 'qodef_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'aton'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'aton'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_woocommerce_options_map', 21);
}