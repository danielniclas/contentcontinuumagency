<?php

if(!function_exists('aton_qodef_map_portfolio_settings')) {
    function aton_qodef_map_portfolio_settings() {
        $meta_box = aton_qodef_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'aton'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        aton_qodef_add_meta_box_field(array(
            'name'        => 'qodef_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'aton'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'aton'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'aton'),
                'small-images'      => esc_html__('Portfolio small images', 'aton'),
                'small-slider'      => esc_html__('Portfolio small slider', 'aton'),
                'big-images'        => esc_html__('Portfolio big images', 'aton'),
                'big-slider'        => esc_html__('Portfolio big slider', 'aton'),
                'gallery' => esc_html__('Portfolio gallery', 'aton'),
                'masonry-gallery-left' => esc_html__('Portfolio masonry gallery left', 'aton'),
                'masonry-gallery-bottom' => esc_html__('Portfolio masonry gallery bottom', 'aton'),
                'pinterest' => esc_html__('Portfolio pinterest', 'aton'),
                'pinterest-right' => esc_html__('Portfolio pinterest right', 'aton'),
                'pinterest-left' => esc_html__('Portfolio pinterest left', 'aton'),
                'full-width-images' => esc_html__('Portfolio full width images', 'aton'),
                'fixed-left' => esc_html__('Portfolio fixed left', 'aton'),
                'custom'            => esc_html__('Portfolio custom', 'aton'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'aton'),
                'full-width-custom-info-bottom' => esc_html__('Portfolio full width custom, info bottom', 'aton')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        aton_qodef_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'aton'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'aton'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        aton_qodef_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'aton'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'aton'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        aton_qodef_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'aton'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'aton'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'aton'),
                'large_width'        => esc_html__('Large width', 'aton'),
                'large_height'       => esc_html__('Large height', 'aton'),
                'large_width_height' => esc_html__('Large width/height', 'aton')
            )
        ));
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_portfolio_settings');
}