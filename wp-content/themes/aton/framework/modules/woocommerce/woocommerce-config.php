<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for woocommerce
add_theme_support('woocommerce');

//Disable the default WooCommerce stylesheet.
if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
	define( 'WOOCOMMERCE_USE_CSS', false );
}

if (!function_exists('aton_qodef_woocommerce_content')){
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function aton_qodef_woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else {

			if ( have_posts() ) :

				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

					woocommerce_product_subcategories();

					while ( have_posts() ) : the_post();

						wc_get_template_part( 'content', 'product' );

					endwhile; // end of the loop.

				woocommerce_product_loop_end();

				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );

			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

				wc_get_template( 'loop/no-products-found.php' );

			endif;
		}
	}
}

/*************** GENERAL FILTERS - begin ***************/

	//Define number of products per page
	add_filter('loop_shop_per_page', 'aton_qodef_woocommerce_products_per_page', 20);

	//Set number of related products
	add_filter('woocommerce_output_related_products_args', 'aton_qodef_woocommerce_related_products_args');

	//Sale flash template override
	add_filter('woocommerce_sale_flash', 'aton_qodef_woocommerce_sale_flash');

	//Add additional html tags around woocommerce pagination
	add_action('woocommerce_after_shop_loop', 'aton_qodef_woo_view_all_pagination_additional_tag_before', 9);
	add_action('woocommerce_after_shop_loop', 'aton_qodef_woo_view_all_pagination_additional_tag_after', 12);

    //Override pagination structure arts
    add_filter( 'woocommerce_pagination_args', 'aton_qodef_get_woocommerce_pagination');

/*************** GENERAL FILTERS - end ***************/	

/*************** PRODUCT LISTS FILTERS - begin ***************/

	//Add additional html tags around product lists
	add_action('woocommerce_before_shop_loop', 'aton_qodef_pl_holder_additional_tag_before', 35);
	add_action('woocommerce_after_shop_loop', 'aton_qodef_pl_holder_additional_tag_after', 5);

	//Remove open and close link position
	remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

    //Remove default woocommerce action for displaying image and add qode custom
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

    //Add sale/out of stock on overriden position
    add_action('aton_qodef_woo_pl_image', 'woocommerce_show_product_loop_sale_flash', 4);
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_woocommerce_product_out_of_stock', 4);

    //Add product link open/close
    add_action('aton_qodef_woo_pl_image', 'woocommerce_template_loop_product_link_open', 7);
    add_action('aton_qodef_woo_pl_image', 'woocommerce_template_loop_product_link_close', 14);

    //Add original image holder open/close
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_original_image_tag_before', 8);
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_original_image_tag_after', 10);

    //Add original image
    add_action('aton_qodef_woo_pl_image', 'woocommerce_template_loop_product_thumbnail', 9);

    //Add hover image holder open/close
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_hover_image_tag_before', 11);
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_hover_image_tag_after', 13);

    //Add hover image
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_woocommerce_shop_loop_hover_image', 12);

    //Add button holder open/close
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_button_before', 14);
    add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_button_after', 16);

    //Add button
    add_action('aton_qodef_woo_pl_image', 'woocommerce_template_loop_add_to_cart', 15);

	//Add additional html tags around image and marks
	add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_image_additional_tag_before', 5);
	add_action('aton_qodef_woo_pl_image', 'aton_qodef_pl_image_additional_tag_after', 18);

	//Add additional html at the end of product info elements
	add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_pl_text_wrapper_additional_tag_before', 20);
	add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_pl_text_wrapper_additional_tag_after', 30);

	//Override product title with our own html
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_woocommerce_template_loop_product_title', 22);

    //Add product categories in product info
    add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_woocommerce_shop_loop_categories', 23);

	//Change rating star position
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	add_action('aton_qodef_woo_pl_info_below_image', 'woocommerce_template_loop_rating', 25);

	//Add additional html tags around rating star element
	add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_pl_rating_additional_tag_before', 24);
	add_action('aton_qodef_woo_pl_info_below_image', 'aton_qodef_pl_rating_additional_tag_after', 26);

	//Change price position
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
	add_action('aton_qodef_woo_pl_info_below_image', 'woocommerce_template_loop_price', 27);

	//Change add to cart position
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
		

/*************** PRODUCT LISTS FILTERS - end ***************/

/*************** PRODUCT SINGLE FILTERS - begin ***************/

	//Add additional html around single product summary and images
	add_action('woocommerce_before_single_product_summary', 'aton_qodef_single_product_content_additional_tag_before', 5);
	add_action('woocommerce_after_single_product_summary', 'aton_qodef_single_product_content_additional_tag_after', 1);

	//Add additional html around single product summary
	add_action('woocommerce_before_single_product_summary', 'aton_qodef_single_product_summary_additional_tag_before', 30);
	add_action('woocommerce_after_single_product_summary', 'aton_qodef_single_product_summary_additional_tag_after', 5);

	//Change title position
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	add_action('woocommerce_single_product_summary', 'aton_qodef_woocommerce_template_single_title', 5);

	//Add social share (default woocommerce_share)
	add_action('woocommerce_single_product_summary', 'aton_qodef_woocommerce_share', 45);

    //Change sale position
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 10 );

    //Add out of stock mark on single product
    add_action('woocommerce_product_thumbnails', 'aton_qodef_woocommerce_product_out_of_stock', 10);

	//Change tabs position
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);


/*************** PRODUCT SINGLE FILTERS - end ***************/