<?php 
if(!function_exists('aton_qodef_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function aton_qodef_accordions_map() {
		
       $panel = aton_qodef_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'aton'),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       aton_qodef_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography', 'aton'),
           'parent' => $panel
       ));

       $typography_group = aton_qodef_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html__('Typography', 'aton'),
			'description' => esc_html__('Setup typography for accordions navigation', 'aton'),
           'parent' => $panel
       ));

       $typography_row = aton_qodef_add_admin_row(array(
           'name' => 'typography_row',
           'next' => true,
           'parent' => $typography_group
       ));

       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'fontsimple',
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'aton'),
       ));

       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'aton'),
           'options'       => aton_qodef_get_text_transform_array()
       ));

       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'aton'),
           'options'       => aton_qodef_get_font_style_array()
       ));

       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing', 'aton'),
           'args'          => array(
               'suffix' => 'px'
           )
       ));

       $typography_row2 = aton_qodef_add_admin_row(array(
           'name' => 'typography_row2',
           'next' => true,
           'parent' => $typography_group
       ));		
		
       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row2,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'aton'),
           'options'       => aton_qodef_get_font_weight_array()
       ));

       aton_qodef_add_admin_field(array(
           'parent'        => $typography_row2,
           'type'          => 'textsimple',
           'name'          => 'accordions_font_size',
           'default_value' => '',
           'label'         => esc_html__('Font Size', 'aton'),
           'args'          => array(
               'suffix' => 'px'
           )
       ));

		//Initial Accordion Color Styles
		
		aton_qodef_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Accordions Color Styles', 'aton'),
           'parent' => $panel
        ));
		
		$accordions_color_group = aton_qodef_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Title Color Styles', 'aton'),
			'description' => esc_html__('Set color styles for accordion title', 'aton'),
           'parent' => $panel
        ));
		$accordions_color_row = aton_qodef_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_background_color',
           'default_value' => '',
           'label'         => esc_html__('Title Background Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color', 'aton')
        ));

       //Active Accordion Color Styles
		
		$active_accordions_color_group = aton_qodef_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Title Color Styles', 'aton'),
			'description' => esc_html__('Set color styles for active and hover accordions title', 'aton'),
           'parent' => $panel
        ));
		$active_accordions_color_row = aton_qodef_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_background_color_active',
           'default_value' => '',
           'label'         => 'Title Background Color'
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'aton')
        ));
        aton_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color', 'aton')
        ));

       //Content color styles

       $accordions_content_color_group = aton_qodef_add_admin_group(array(
           'name' => 'accordions_content_color_group',
           'title' => esc_html__('Accordion Content Color Styles', 'aton'),
           'description' => esc_html__('Set color styles for accordions content', 'aton'),
           'parent' => $panel
       ));
       $accordions_content_color_row = aton_qodef_add_admin_row(array(
           'name' => 'accordions_content_color_row',
           'next' => true,
           'parent' => $accordions_content_color_group
       ));
       aton_qodef_add_admin_field(array(
           'parent'        => $accordions_content_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_content_background_color',
           'default_value' => '',
           'label'         => esc_html__('Content Background Color', 'aton')
       ));
       aton_qodef_add_admin_field(array(
           'parent'        => $accordions_content_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_content_color',
           'default_value' => '',
           'label'         => esc_html__('Content Text Color', 'aton')
       ));
       
   }
   add_action('aton_qodef_options_elements_map', 'aton_qodef_accordions_map');
}