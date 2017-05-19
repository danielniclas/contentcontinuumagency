<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$aton_qodef_id = get_option('woocommerce_shop_page_id');
$aton_qodef_shop = get_post($aton_qodef_id);
$aton_qodef_sidebar = aton_qodef_sidebar_layout();

if(get_post_meta($aton_qodef_id, 'qode_page_background_color', true) != ''){
	$aton_qodef_background_color = 'background-color: '.esc_attr(get_post_meta($aton_qodef_id, 'qode_page_background_color', true));
}else{
	$aton_qodef_background_color = '';
}

$aton_qodef_content_style = '';
if(get_post_meta($aton_qodef_id, 'qode_content-top-padding', true) != '') {
	if(get_post_meta($aton_qodef_id, 'qode_content-top-padding-mobile', true) == 'yes') {
        $aton_qodef_content_style = 'padding-top:'.esc_attr(get_post_meta($aton_qodef_id, 'qode_content-top-padding', true)).'px !important';
	} else {
        $aton_qodef_content_style = 'padding-top:'.esc_attr(get_post_meta($aton_qodef_id, 'qode_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$aton_qodef_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$aton_qodef_paged = get_query_var('page');
} else {
	$aton_qodef_paged = 1;
}

get_header();

aton_qodef_get_title();
do_action('aton_qodef_before_slider_action');
get_template_part('slider');
do_action('aton_qodef_after_slider_action');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="qodef-container" <?php aton_qodef_inline_style($aton_qodef_background_color); ?>>
		<div class="qodef-container-inner clearfix" <?php aton_qodef_inline_style($aton_qodef_content_style); ?>>
			<?php
			switch( $aton_qodef_sidebar ) {
				case 'sidebar-33-right': ?>
					<div class="qodef-two-columns-66-33 qodef-content-has-sidebar qodef-woocommerce-with-sidebar clearfix">
						<div class="qodef-column1">
							<div class="qodef-column-inner">
								<?php aton_qodef_woocommerce_content(); ?>
							</div>
						</div>
						<div class="qodef-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-right': ?>
					<div class="qodef-two-columns-75-25 qodef-content-has-sidebar qodef-woocommerce-with-sidebar clearfix">
						<div class="qodef-column1 qodef-content-left-from-sidebar">
							<div class="qodef-column-inner">
								<?php aton_qodef_woocommerce_content(); ?>
							</div>
						</div>
						<div class="qodef-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-33-left': ?>
					<div class="qodef-two-columns-33-66 qodef-content-has-sidebar qodef-woocommerce-with-sidebar clearfix">
						<div class="qodef-column1">
							<?php get_sidebar();?>
						</div>
						<div class="qodef-column2">
							<div class="qodef-column-inner">
								<?php aton_qodef_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-left': ?>
					<div class="qodef-two-columns-25-75 qodef-content-has-sidebar qodef-woocommerce-with-sidebar clearfix">
						<div class="qodef-column1">
							<?php get_sidebar();?>
						</div>
						<div class="qodef-column2 qodef-content-right-from-sidebar">
							<div class="qodef-column-inner">
								<?php aton_qodef_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				default:
					aton_qodef_woocommerce_content();
			} ?>		
		</div>
	</div>			
<?php } else { ?>
	<div class="qodef-container" <?php aton_qodef_inline_style($aton_qodef_background_color); ?>>
		<div class="qodef-container-inner clearfix" <?php aton_qodef_inline_style($aton_qodef_content_style); ?>>
			<?php aton_qodef_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>