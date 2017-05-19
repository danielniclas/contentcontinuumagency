<?php
if(isset($post_id)){
	$id = $post_id;
}else{
	$id = get_the_ID();
}

if(aton_qodef_options()->getOptionValue('blog_single_navigation') == 'yes'){

    $same_category = false;
    if(aton_qodef_options()->getOptionValue('blog_navigation_through_same_category') == 'yes') {
        $same_category = true;
    }
	$prev_post = get_previous_post($same_category);
	$next_post = get_next_post($same_category);

	?>
	<div class="qodef-blog-single-navigation">
		<div class="qodef-blog-single-navigation-inner clearfix">
			<?php if($prev_post != ""){ ?>
				<div class="qodef-blog-single-prev-holder">

					<?php if(has_post_thumbnail($prev_post->ID)){
						$prev_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'large');
						?>
						<div class="qodef-blog-single-prev" style="background-image: url(' <?php echo aton_qodef_kses_img($prev_post_image[0]); ?> ')">
							<?php

							if($same_category){
								previous_post_link('%link',$prev_post_image, true,'','category');
							} else {
								previous_post_link('%link');
							}

							?>
						</div>
					<?php } ?>

					<div class="qodef-blog-single-prev-info">

						<div class="qodef-blog-navigation-info-holder clearfix">
							<h5 itemprop="name" class="qodef-blog-single-nav-title">
								<a itemprop="url" href="<?php echo get_permalink($prev_post->ID)?>">
                                    <span class="qodef-blog-navigation-info">
                                        <?php esc_html_e( 'Previous post', 'aton' )?>
                                    </span>
									<?php echo esc_attr(get_the_title($prev_post->ID))?>
								</a>
							</h5>
						</div>

					</div>

				</div>
			<?php } ?>
			<?php if($next_post != ""){ ?>
				<div class="qodef-blog-single-next-holder">
					<div class="qodef-blog-single-next-info clearfix">

						<div class="qodef-blog-navigation-info-holder clearfix">
							<h5 itemprop="name" class="qodef-blog-single-nav-title">
								<a itemprop="url" href="<?php echo get_permalink($next_post->ID)?>" class="qodef-blog-single-nav-title">
                                    <span class="qodef-blog-navigation-info">
                                        <?php esc_html_e( 'Next post', 'aton' )?>
                                    </span>
									<?php echo esc_attr(get_the_title($next_post->ID))?>
								</a>
							</h5>
						</div>

					</div>
					<?php if(has_post_thumbnail($next_post->ID)){

						$next_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'large');
						?>
						<div class="qodef-blog-single-next" style="background-image: url(' <?php echo aton_qodef_kses_img($next_post_image[0]); ?> ')">
							<?php

							if($same_category){
								next_post_link('%link',$next_post_image, true,'','category');
							} else {
								next_post_link('%link');
							}
							?>
						</div>
					<?php } ?>
				</div>

			<?php } ?>
		</div>
	</div>
<?php } ?>