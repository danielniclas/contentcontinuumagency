<?php
/**
 * Pie Chart Basic Shortcode Template
 */
?>
<div class="qodef-pie-chart-holder">
	<div class="qodef-percentage" <?php echo aton_qodef_get_inline_attrs($pie_chart_data); ?>>
        <span class="qodef-to-counter" <?php aton_qodef_inline_style($percentage_style); ?>>
            <?php echo esc_html($percent ); ?>
        </span>
	</div>
	<div class="qodef-pie-chart-text" <?php aton_qodef_inline_style($pie_chart_style); ?>>
        <<?php echo esc_attr($title_tag); ?> class="qodef-pie-title" <?php aton_qodef_inline_style($title_style); ?>>
            <?php echo esc_html($title); ?>
        </<?php echo esc_attr($title_tag); ?>>
 		<p <?php aton_qodef_inline_style($text_style); ?>>
            <?php echo esc_html($text); ?>
        </p>
	</div>
</div>