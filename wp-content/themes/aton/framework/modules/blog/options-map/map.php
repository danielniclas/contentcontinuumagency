<?php

if ( ! function_exists('aton_qodef_blog_options_map') ) {

	function aton_qodef_blog_options_map() {

		aton_qodef_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'aton'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = aton_qodef_get_custom_sidebars();

		$panel_blog_lists = aton_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'aton')
			)
		);

		aton_qodef_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'aton'),
			'description' => esc_html__('Choose a default blog layout', 'aton'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard', 'aton'),
				'masonry' 				=> esc_html__('Blog: Masonry', 'aton'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width', 'aton'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post', 'aton'),
				'gallery' 				=> esc_html__('Blog: Gallery', 'aton'),
				'narrow' 				=> esc_html__('Blog: Narrow', 'aton')
			)
		));

		aton_qodef_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'aton'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'aton'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'aton'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'aton'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'aton'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'aton'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'aton'),
			)
		));


		if(count($custom_sidebars) > 0) {
			aton_qodef_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'aton'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'aton'),
				'parent' => $panel_blog_lists,
				'options' => aton_qodef_get_custom_sidebars()
			));
		}


		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_pagination_container'
				)
			)
		);

		$pagination_container = aton_qodef_add_admin_container(
			array(
				'name' => 'qodef_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit', 'aton'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblank',
				'name' => 'pagination_type',
				'default_value' => 'standard_pagination',
				'label' => esc_html__('Pagination Type', 'aton'),
				'parent' => $pagination_container,
				'description' => esc_html__('Choose Pagination Type', 'aton'),
				'options' => array(
					'standard_paginaton' => esc_html__('Standard Pagination', 'aton'),
					'load_more_pagination' => esc_html__('Load More', 'aton'),
                    'navigation'	=> esc_html__('Navigation', 'aton')
				),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblank',
				'name' => 'gallery_pagination_type',
				'default_value' => '',
				'label' => esc_html__('Gallery Pagination Type', 'aton'),
				'parent' => $pagination_container,
				'description' => esc_html__('Choose Pagination Type for Gallery Blog Template', 'aton'),
				'options' => array(
					'standard_pagination' => esc_html__('Standard Pagination', 'aton'),
					'load_more_pagination' => esc_html__('Load More', 'aton'),
					'navigation'	=> esc_html__('Navigation', 'aton')
				),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'selectblank',
				'name' => 'masonry_pagination_type',
				'default_value' => '',
				'label' => esc_html__('Masonry Pagination Type', 'aton'),
				'parent' => $pagination_container,
				'description' => esc_html__('Choose Pagination Type for Masonry Blog Template', 'aton'),
				'options' => array(
					'standard_paginaton' => esc_html__('Standard Pagination', 'aton'),
					'load_more_pagination' => esc_html__('Load More', 'aton'),
					'navigation'	=> esc_html__('Navigation', 'aton')
				),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		aton_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		aton_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		aton_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'gallery_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Gallery Type Number of Words in Excerpt', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'narrow_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Narrow Type Number of Words in Excerpt', 'aton'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'aton'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = aton_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'aton')
			)
		);


		aton_qodef_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => 'Sidebar Layout',
			'description' => 'Choose a sidebar layout for Blog Single pages',
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'aton'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'aton'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'aton'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'aton'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'aton'),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			aton_qodef_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'aton'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'aton'),
				'parent' => $panel_blog_single,
				'options' => aton_qodef_get_custom_sidebars()
			));
		}

		aton_qodef_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'aton'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'aton'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(array(
			'name' => 'blog_single_title_breadcrumbs_color',
			'type' => 'color',
			'label' => 'Title Breadcrumbs Color',
			'description' => 'Set breadcrumbs color for blog single title',
			'parent' => $panel_blog_single
		));
		
		aton_qodef_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'aton'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'aton'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		aton_qodef_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'aton'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.', 'aton'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'aton'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = aton_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'aton'),
				'description' => esc_html__('Limit your navigation only through current category', 'aton'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box', 'aton'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'aton'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = aton_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		aton_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'aton'),
				'description' => esc_html__('Enabling this option will show author email', 'aton'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'aton_qodef_options_map', 'aton_qodef_blog_options_map',13);

}











