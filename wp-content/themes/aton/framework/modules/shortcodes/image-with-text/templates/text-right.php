<?php
/**
 * Image with text shortcode template
 */
?>

<div class="qodef-image-with-text <?php echo esc_attr($image_with_text_type) ?>">

	<div class="qodef-image-with-text-image">
		<?php if ($image_with_text_link !== '') { ?>
			<a itemprop="url" href="<?php echo esc_url($image_with_text_link); ?>" target="<?php echo esc_attr($image_with_text_link_target); ?>"></a>
		<?php } ?>
		<?php echo wp_get_attachment_image($image, 'full'); ?>
	</div>

	<div class="qodef-image-with-text-holder">
		<div class="qodef-image-with-text-inner">
			<div class="qodef-image-with-text-inner-holder">

				<?php if ($image_with_text_text !== '') { ?>
					<p class="qodef-image-with-text-subtitle"><?php echo esc_attr($image_with_text_text) ?></p>
				<?php } ?>

			</div>
		</div>
	</div>

</div>