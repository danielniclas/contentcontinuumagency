<div class="qodef-elements-holder-item <?php echo esc_attr($elements_holder_item_class); ?>" <?php echo aton_qodef_get_inline_attrs($elements_holder_item_data); ?> <?php echo aton_qodef_get_inline_style($elements_holder_item_style); ?> <?php echo aton_qodef_get_inline_attrs($elements_holder_item_responsive_data); ?>>
	<div class="qodef-elements-holder-item-inner">
		<div class="qodef-elements-holder-item-content <?php echo esc_attr($elements_holder_item_content_class); ?>" <?php echo aton_qodef_get_inline_style($elements_holder_item_content_style); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>