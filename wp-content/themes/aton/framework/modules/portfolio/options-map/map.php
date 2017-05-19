<?php

if ( ! function_exists('aton_qodef_portfolio_options_map') ) {

	function aton_qodef_portfolio_options_map() {

		aton_qodef_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'aton'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = aton_qodef_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'aton'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'aton'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages', 'aton'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images', 'aton'),
				'small-slider' => esc_html__('Portfolio small slider', 'aton'),
				'big-images' => esc_html__('Portfolio big images', 'aton'),
				'big-slider' => esc_html__('Portfolio big slider', 'aton'),
				'gallery' => esc_html__('Portfolio gallery', 'aton'),
				'masonry-gallery-left' => esc_html__('Portfolio masonry gallery left', 'aton'),
				'masonry-gallery-bottom' => esc_html__('Portfolio masonry gallery bottom', 'aton'),
				'pinterest' => esc_html__('Portfolio pinterest', 'aton'),
				'pinterest-right' => esc_html__('Portfolio pinterest right', 'aton'),
				'pinterest-left' => esc_html__('Portfolio pinterest left', 'aton'),
				'full-width-images' => esc_html__('Portfolio fullwidth images', 'aton'),
				'fixed-left' => esc_html__('Portfolio fixed left', 'aton'),
				'custom' => esc_html__('Portfolio custom', 'aton'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'aton'),
				'full-width-custom-info-bottom' => esc_html__('Portfolio full width custom, info bottom', 'aton')

			)
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'aton'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'aton'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'aton'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'aton'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'aton'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'aton'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'aton'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		aton_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'aton'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'aton'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#qodef_navigate_same_category_container'
			)
		));

		$container_navigate_category = aton_qodef_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		aton_qodef_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category', 'aton'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'aton'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'aton'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type', 'aton'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns', 'aton'),
				'three-columns' => esc_html__('3 columns', 'aton'),
				'four-columns' => esc_html__('4 columns', 'aton')
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'aton'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'aton'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_portfolio_options_map',14);

}