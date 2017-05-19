<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see aton_qodef_header_meta() - hooked with 10
     * @see qode_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('aton_qodef_header_meta'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
<?php aton_qodef_get_side_area(); ?>

<?php if (aton_qodef_get_meta_field_intersect('smooth_page_transitions', aton_qodef_get_page_id()) === 'yes' && aton_qodef_get_meta_field_intersect('page_transition_preloader', aton_qodef_get_page_id()) === 'yes') { ?>

<div class="qodef-smooth-transition-loader qodef-mimic-ajax">
    <div class="qodef-st-loader">
        <div class="qodef-st-loader1">
            <?php aton_qodef_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="qodef-wrapper">
    <div class="qodef-wrapper-inner">
        <?php aton_qodef_get_header(); ?>

        <?php if (aton_qodef_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='qodef-back-to-top'  href='#'>
                <span class="qodef-icon-stack">
                     <?php
                        aton_qodef_icon_collections()->getBackToTopIcon('ion_icons');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php aton_qodef_get_full_screen_menu(); ?>

        <div class="qodef-content" <?php aton_qodef_content_elem_style_attr(); ?>>

        <div class="qodef-content-inner">