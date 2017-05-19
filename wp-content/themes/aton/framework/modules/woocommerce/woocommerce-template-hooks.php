<?php

if (!function_exists('aton_qodef_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function aton_qodef_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (aton_qodef_options()->getOptionValue('qodef_woo_products_per_page')) {
			$products_per_page = aton_qodef_options()->getOptionValue('qodef_woo_products_per_page');
		}
		if(isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('aton_qodef_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function aton_qodef_woocommerce_related_products_args($args) {

		if (aton_qodef_options()->getOptionValue('qodef_woo_product_list_columns')) {

			$related = aton_qodef_options()->getOptionValue('qodef_woo_product_list_columns');
			switch ($related) {
				case 'qodef-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'qodef-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('aton_qodef_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function aton_qodef_woocommerce_template_loop_product_title() {

		$tag = aton_qodef_options()->getOptionValue('qodef_products_list_title_tag');
		if($tag === '') {
			$tag = 'h5';
		}
		the_title('<' . $tag . ' class="qodef-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('aton_qodef_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function aton_qodef_woocommerce_template_single_title() {

		$tag = aton_qodef_options()->getOptionValue('qodef_single_product_title_tag');
		if($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="qodef-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('aton_qodef_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function aton_qodef_woocommerce_sale_flash() {

		return '<span class="qodef-onsale">' . esc_html__('Sale', 'aton') . '</span>';
	}
}

if (!function_exists('aton_qodef_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function aton_qodef_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="qodef-out-of-stock">' . esc_html__('Out of stock', 'aton') . '</span>';
		}
	}
}

if (!function_exists('aton_qodef_woocommerce_shop_loop_categories')) {
    /**
     * Function that prints html with product categories
     */
    function aton_qodef_woocommerce_shop_loop_categories(){

        global $product;

        $html = '<div class="qodef-pl-categories-holder">';
        $html .= $product->get_categories(', ');
        $html .= '</div>';

        print $html;
    }
}

if (!function_exists('aton_qodef_woocommerce_shop_loop_hover_image')) {
    /**
     * Function that prints first image from product gallery
     */
    function aton_qodef_woocommerce_shop_loop_hover_image(){

        global $product;
        $product_hover_image = '';

        $product_gallery_ids = $product->get_gallery_attachment_ids();
        if (!empty($product_gallery_ids)) {
            //get product image url, shop catalog size
            $product_hover_image = wp_get_attachment_image( $product_gallery_ids[0], 'shop_catalog' );
        }
        else {
            $product_hover_image = woocommerce_get_product_thumbnail();
        }

        print $product_hover_image;
    }
}

if (!function_exists('aton_qodef_get_woocommerce_pagination')) {
    /**
     * Function that returns args for woocommerce pagination
     */
    function aton_qodef_get_woocommerce_pagination() {
        global $wp_query;
        $navigation = array(
            'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
            'format'       => '',
            'add_args'     => false,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'prev_text'    => '<span class="qodef-pagination-arrow ion-arrow-left-c"></span><span class="qodef-pagination-text">' . esc_html__("Previous Page", 'aton') . '</span>',
            'next_text'    => '<span class="qodef-pagination-text">' . esc_html__("Next Page", 'aton') . '</span><span class="qodef-pagination-arrow ion-arrow-right-c"></span>',
            'type'         => 'list',
            'end_size'     => 3,
            'mid_size'     => 3
        );

        return $navigation;
    }
}

if (!function_exists('aton_qodef_woo_view_all_pagination_additional_tag_before')) {
	function aton_qodef_woo_view_all_pagination_additional_tag_before() {

        global $wp_query;
        if ($wp_query->max_num_pages > 1) {
            print '<div class="qodef-woo-pagination-holder"><div class="qodef-woo-pagination-inner">';
        }
	}
}

if (!function_exists('aton_qodef_woo_view_all_pagination_additional_tag_after')) {
	function aton_qodef_woo_view_all_pagination_additional_tag_after() {

        global $wp_query;
        if ($wp_query->max_num_pages > 1) {
            print '</div></div>';
        }
	}
}

if (!function_exists('aton_qodef_single_product_content_additional_tag_before')) {
	function aton_qodef_single_product_content_additional_tag_before() {

		print '<div class="qodef-single-product-content">';
	}
}

if (!function_exists('aton_qodef_single_product_content_additional_tag_after')) {
	function aton_qodef_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('aton_qodef_single_product_summary_additional_tag_before')) {
	function aton_qodef_single_product_summary_additional_tag_before() {

		print '<div class="qodef-single-product-summary">';
	}
}

if (!function_exists('aton_qodef_single_product_summary_additional_tag_after')) {
	function aton_qodef_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('aton_qodef_pl_holder_additional_tag_before')) {
	function aton_qodef_pl_holder_additional_tag_before() {

		print '<div class="qodef-pl-main-holder">';
	}
}

if (!function_exists('aton_qodef_pl_holder_additional_tag_after')) {
	function aton_qodef_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('aton_qodef_pl_image_additional_tag_before')) {
	function aton_qodef_pl_image_additional_tag_before() {

		print '<div class="qodef-pl-image">';
	}
}

if (!function_exists('aton_qodef_pl_image_additional_tag_after')) {
	function aton_qodef_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('aton_qodef_pl_text_wrapper_additional_tag_before')) {
	function aton_qodef_pl_text_wrapper_additional_tag_before() {

		print '<div class="qodef-pl-text-wrapper">';
	}
}

if (!function_exists('aton_qodef_pl_text_wrapper_additional_tag_after')) {
	function aton_qodef_pl_text_wrapper_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('aton_qodef_pl_rating_additional_tag_before')) {
	function aton_qodef_pl_rating_additional_tag_before() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = $product->get_rating_html();

			if($rating_html !== '') {
				print '<div class="qodef-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('aton_qodef_pl_rating_additional_tag_after')) {
	function aton_qodef_pl_rating_additional_tag_after() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = $product->get_rating_html();

			if($rating_html !== '') {
				print '</div>';
			}
		}
	}
}

if (!function_exists('aton_qodef_pl_original_image_tag_before')) {
    function aton_qodef_pl_original_image_tag_before() {

        print '<span class="qodef-original-image">';
    }
}

if (!function_exists('aton_qodef_pl_original_image_tag_after')) {
    function aton_qodef_pl_original_image_tag_after() {

        print '</span>';
    }
}

if (!function_exists('aton_qodef_pl_hover_image_tag_before')) {
    function aton_qodef_pl_hover_image_tag_before() {

        print '<span class="qodef-hover-image">';
    }
}

if (!function_exists('aton_qodef_pl_hover_image_tag_after')) {
    function aton_qodef_pl_hover_image_tag_after() {

        print '</span>';
    }
}

if (!function_exists('aton_qodef_pl_button_before')) {
    function aton_qodef_pl_button_before() {

        print '<div class="qodef-pl-button-holder">';
    }
}

if (!function_exists('aton_qodef_pl_button_after')) {
    function aton_qodef_pl_button_after() {

        print '</div>';
    }
}