<?php

//Portfolio

if(!function_exists('aton_qodef_map_portfolio')) {
    function aton_qodef_map_portfolio() {

        global $aton_qodef_Framework;

        $qode_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $qode_pages[$page->ID] = $page->post_title;
        }

//Portfolio Images

        $qodePortfolioImages = new AtonQodefMetaBox("portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images');
        $aton_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images", $qodePortfolioImages);

        $qode_portfolio_image_gallery = new AtonQodefMultipleImages("qode_portfolio-image-gallery", "Portfolio Images", "Choose your portfolio images");
        $qodePortfolioImages->addChild("qode_portfolio-image-gallery", $qode_portfolio_image_gallery);

//Portfolio Images/Videos 2

        $qodePortfolioImagesVideos2 = new AtonQodefMetaBox("portfolio-item", "Portfolio Images/Videos (single upload)");
        $aton_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images_videos2", $qodePortfolioImagesVideos2);

        $qode_portfolio_images_videos2 = new AtonQodefImagesVideosFramework("Portfolio Images/Videos 2", "ThisIsDescription");
        $qodePortfolioImagesVideos2->addChild("qode_portfolio_images_videos2", $qode_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

        $qodeAdditionalSidebarItems = aton_qodef_add_meta_box(
            array(
                'scope' => array('portfolio-item'),
                'title' => esc_html__('Additional Portfolio Sidebar Items', 'aton'),
                'name' => 'portfolio_properties'
            )
        );

        $qode_portfolio_properties = aton_qodef_add_options_framework(
            array(
                'label' => esc_html__('Portfolio Properties', 'aton'),
                'name' => 'qode_portfolio_properties',
                'parent' => $qodeAdditionalSidebarItems
            )
        );
    }

    add_action('aton_qodef_meta_boxes_map', 'aton_qodef_map_portfolio');

}