<div class="qodef-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="qodef-progress-title-holder clearfix" <?php aton_qodef_inline_style($title_style); ?>>
		<span class="qodef-progress-title"><?php echo esc_attr($title)?></span>
		<span class="qodef-progress-number-wrapper" >
			<span class="qodef-progress-number">
				<span class="qodef-percent" <?php aton_qodef_inline_style($percentage_style); ?>>0</span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="qodef-progress-content-outer" <?php aton_qodef_inline_style($bar_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="qodef-progress-content" <?php aton_qodef_inline_style($active_bar_style); ?>></div>
	</div>
</div>	