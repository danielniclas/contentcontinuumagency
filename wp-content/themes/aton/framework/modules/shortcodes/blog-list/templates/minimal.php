<li class="qodef-blog-list-item clearfix">
	<div class="qodef-blog-list-item-inner">
        <div class="qodef-item-image clearfix">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
                <?php
                echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                ?>
            </a>
        </div>
		<div class="qodef-item-text-holder">
			<<?php echo esc_html( $title_tag)?> itemprop="name" class="qodef-item-title entry-title">
				<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
            <?php if($show_date == 'yes') { ?>
                <div class="qodef-item-info-section qodef-section-top">
                    <?php aton_qodef_post_info(
                        array(
                            'date' => $show_date,
                        ),
                        array(
                            'show_date_label' => false
                        )
                    ) ?>
                </div>
            <?php } ?>
		</div>
	</div>	
</li>
