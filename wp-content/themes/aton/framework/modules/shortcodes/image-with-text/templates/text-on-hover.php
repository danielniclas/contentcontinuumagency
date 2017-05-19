<?php
/**
 * Image with text shortcode template
 */
?>

<div class="qodef-image-with-text <?php echo esc_attr($image_with_text_type) ?>">
	<div class="qodef-image-with-text-image">

		<?php echo wp_get_attachment_image($image, 'full'); ?>

		<?php if ($image_with_text_link !== '') { ?>
			<a itemprop="url" href="<?php echo esc_url($image_with_text_link); ?>" target="<?php echo esc_attr($image_with_text_link_target); ?>">
		<?php } ?>

		<div class="qodef-image-with-text-holder">
			<div class="qodef-image-with-text-overlay">
				<div class="qodef-image-with-text-inner">
					<div class="qodef-image-with-text-inner-holder">

						<?php if ($image_with_text_title !== '') { ?>
							<<?php echo esc_attr($image_with_text_title_tag); ?> class="qodef-image-with-text-title"><?php echo esc_attr($image_with_text_title) ?></<?php echo esc_attr($image_with_text_title_tag); ?>>
						<?php } ?>

						<?php if ($image_with_text_subtitle !== '') { ?>
							<span class="qodef-image-with-text-subtitle"><?php echo esc_attr($image_with_text_title) ?></span>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>

		<?php if ($image_with_text_link !== '') { ?>
			</a>
		<?php } ?>

	</div>
</div>