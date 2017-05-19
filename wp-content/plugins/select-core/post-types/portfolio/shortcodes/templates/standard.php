<?php // This line is needed for mixItUp gutter ?>
<article class="qodef-portfolio-item <?php if($portfolio_slider != 'yes') {print 'mix';}?> <?php echo esc_attr($categories)?>">
	<div class="qodef-portfolio-item-inner">
        <div class = "qodef-item-image-holder">
            <a href="<?php echo esc_url($item_link); ?>">
                <div class="qodef-portfolio-item-overlay" <?php aton_qodef_inline_style($overlay_color); ?>><span class="icon_plus"></span></div>
                <?php
                echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
                ?>
            </a>
		</div>
		<div class="qodef-item-text-holder">
			<<?php echo esc_attr($title_tag)?> class="qodef-item-title">
				<a href="<?php echo esc_url($item_link); ?>">
					<?php echo esc_attr(get_the_title()); ?>
				</a>
			</<?php echo esc_attr($title_tag)?>>
			<?php
			echo $category_html;
			?>
		</div>
	</div>
</article>
<?php // This line is needed for mixItUp gutter ?>