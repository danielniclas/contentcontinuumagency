<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php aton_qodef_inline_style($button_styles); ?> <?php aton_qodef_class_attribute($button_classes); ?> <?php echo aton_qodef_get_inline_attrs($button_data); ?> <?php echo aton_qodef_get_inline_attrs($button_custom_attrs); ?> <?php if($download_button == 'yes') echo esc_attr('download'); ?>>
    <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo aton_qodef_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>

    <?php if ($hover_type == 'sweep') { ?>
        <span class="qodef-hover-background-holder">
	    	<span class="qodef-hover-background"></span>
    	</span>
    <?php } ?>

</a>