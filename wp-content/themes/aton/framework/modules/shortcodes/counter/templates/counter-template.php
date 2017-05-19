<?php
/**
 * Counter shortcode template
 */
?>
<div class="qodef-counter-holder <?php echo esc_attr($position); ?>" <?php echo aton_qodef_get_inline_style($counter_holder_styles); ?>>

	<div class="qodef-counter-with-icon">
		<?php print $icon; ?>
	</div>

	<span class="qodef-counter <?php echo esc_attr($type) ?>" <?php echo aton_qodef_get_inline_style($counter_styles); ?>>
		<?php echo esc_attr($digit); ?>
	</span>
    <div class="qodef-counter-separator-holder">
        <div class="qodef-counter-separator">
			<?php echo aton_qodef_get_svg_separator_html(array('animated' => 'no')); ?>
		</div>
    </div>
	<<?php echo esc_html($title_tag); ?> class="qodef-counter-title" <?php echo aton_qodef_get_inline_style($title_styles); ?>>
		<?php echo esc_attr($title); ?>
	</<?php echo esc_html($title_tag);; ?>>
	<?php if ($text != "") { ?>
		<p class="qodef-counter-text" <?php echo aton_qodef_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>

</div>