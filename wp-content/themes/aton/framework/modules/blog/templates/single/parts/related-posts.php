<div class="qodef-related-posts-holder">
	<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
		<div class="qodef-related-posts-title">
			<h5>
				<?php esc_html_e( 'Related Posts', 'aton' ); ?>
			</h5>
		</div>
		<div class="qodef-related-posts-inner clearfix">

			<?php while ( $related_posts->have_posts() ) :

				$related_posts->the_post();
				$related_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
				?>
				<div class="qodef-related-post">

					<?php if ( has_post_thumbnail() ) {	?>
						<a itemprop="url" href="<?php the_permalink(); ?> ">
							<div class="qodef-related-post-image"  style="background-image: url(' <?php echo aton_qodef_kses_img($related_post_image[0]); ?> ')">
							</div>
						</a>
					<?php } ?>

					<div class="qodef-related-post-title-holder">
						<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title( '<h5 itemprop="name" class="qodef-related-post-title entry-title">', '</h5>' ); ?>
						</a>
					</div>
                    <div class="qodef-post-info qodef-section-top">
                        <?php aton_qodef_post_info(
                            array(
                                'date' => 'yes',
                                'category' => 'yes'
                            ),
                            array(
                                'show_date_label' => false
                            )
                        ) ?>
                    </div>
				</div>
				<?php
			endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata();
	?>
</div>