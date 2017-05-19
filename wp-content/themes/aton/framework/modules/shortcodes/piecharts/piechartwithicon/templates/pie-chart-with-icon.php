<div class="qodef-pie-chart-with-icon-holder">

	<div class="qodef-percentage-with-icon <?php if($text_pie_chart != ''){ echo "qodef-percentage-with-text";} ?>" <?php echo aton_qodef_get_inline_attrs($pie_chart_data); ?>>
		<?php if($icon != ''){ print $icon; } ?>
		<?php if($text_pie_chart != ''){ ?>
		<span <?php aton_qodef_inline_style($value_styles)?>> <?php print $text_pie_chart; ?></span>
		<?php } ?>
	</div>

	<div class="qodef-pie-chart-text" <?php aton_qodef_inline_style($pie_chart_style)?>>
		<<?php echo esc_html($title_tag)?> class="qodef-pie-title" <?php aton_qodef_inline_style($title_style); ?>>
			<?php echo esc_html($title); ?>
		</<?php echo esc_html($title_tag)?>>
		<p <?php aton_qodef_inline_style($text_style); ?>>
            <?php echo esc_html($text); ?>
        </p>
	</div>
</div>