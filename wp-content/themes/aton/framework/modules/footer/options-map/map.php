<?php

if ( ! function_exists('aton_qodef_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function aton_qodef_footer_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'aton'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = aton_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'aton'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer', 'aton'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'aton'),
				'parent' => $footer_panel,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'aton'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'aton'),
				'parent' => $footer_panel,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'aton'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = aton_qodef_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

        aton_qodef_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_type',
                'default_value' => '',
                'label' => esc_html__('Footer Top Type', 'aton'),
                'description' => esc_html__('Choose a Footer Top type', 'aton'),
                'options' => array(
                    '' 	=> esc_html__('Footer Top Standard', 'aton'),
                    'simple' 	=> esc_html__('Footer Top Simple', 'aton'),
                ),
                'parent' => $show_footer_top_container,
                'args' => array(
                    'dependence' => true,
                    'show' => array(
                        '' => '#qodef_show_footer_top_standard_container',
                        'simple'   => ''
                    ),
                    'hide' => array(
                        '' => '',
                        'simple'   => '#qodef_show_footer_top_standard_container',
                    )
                )
            )
        );

        aton_qodef_add_admin_field(array(
            'name' => 'footer_top_background_color',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'aton'),
            'description' => esc_html__('Set background color for top footer area', 'aton'),
            'parent' => $show_footer_top_container
        ));

        aton_qodef_add_admin_field(array(
            'name' => 'footer_top_background_image',
            'type' => 'image',
            'label' => esc_html__('Background Image', 'aton'),
            'description' => esc_html__('Set background image for top footer area', 'aton'),
            'parent' => $show_footer_top_container
        ));

        $show_footer_top_standard_container = aton_qodef_add_admin_container(
            array(
                'name' => 'show_footer_top_standard_container',
                'hidden_property' => 'footer_top_type',
                'hidden_value' => 'footer_top_simple',
                'parent' => $show_footer_top_container
            )
        );

		aton_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'aton'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'aton'),
				'options' => array(
					'1' => esc_html__('1', 'aton'),
					'2' => esc_html__('2', 'aton'),
					'3' => esc_html__('3', 'aton'),
					'5' => esc_html__('3(25%+25%+50%)', 'aton'),
					'6' => esc_html__('3(50%+25%+25%)', 'aton'),
					'4' => esc_html__('4', 'aton')
				),
				'parent' => $show_footer_top_standard_container,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment', 'aton'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'aton'),
				'options' => array(
					'left' => esc_html__('Left', 'aton'),
					'center' => esc_html__('Center', 'aton'),
					'right' => esc_html__('Right', 'aton')
				),
				'parent' => $show_footer_top_standard_container,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'aton'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = aton_qodef_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		aton_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '3',
				'label' => esc_html__('Footer Bottom Columns', 'aton'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'aton'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_footer_options_map',5);

}