<?php

//Blog

if(!function_exists('aton_qodef_map_blog')) {
    function aton_qodef_map_blog() {

        $qode_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $qode_blog_categories[$category->term_id] = $category->name;
        }

        $blog_meta_box = aton_qodef_add_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'aton'),
                'name' => 'blog_meta'
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'aton'),
                'description' => 'Choose category of posts to display (leave empty to display all categories)',
                'parent' => $blog_meta_box,
                'options' => $qode_blog_categories
            )
        );

        aton_qodef_add_meta_box_field(
            array(
                'name' => 'qodef_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'aton'),
                'description' => 'Enter the number of posts to display',
                'parent' => $blog_meta_box,
                'options' => $qode_blog_categories,
                'args' => array("col_width" => 3)
            )
        );

    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_blog');

}
