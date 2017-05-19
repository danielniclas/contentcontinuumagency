<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php aton_qodef_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
                <div class="qodef-post-info qodef-section-top">
                    <?php aton_qodef_post_info(array(
                        'date' => 'yes',
                        'category' => 'yes'
                    )) ?>
                </div>
				<?php aton_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <?php
                if($type == 'standard') {
                    aton_qodef_excerpt($excerpt_length);
                    $args_pages = array(
                        'before'           => '<div class="qodef-single-links-pages"><div class="qodef-single-links-pages-inner">',
                        'after'            => '</div></div>',
                        'link_before'      => '<span>',
                        'link_after'       => '</span>',
                        'pagelink'         => '%'
                    );

                    wp_link_pages($args_pages);
                    aton_qodef_read_more_button();
                }
                else if($type == 'standard-whole-post') { ?>
                    <div class="qodef-whole-post-content">
                        <?php the_content(); ?>
                    </div>
                <?php } ?>
                <div class="qodef-post-info qodef-section-bottom clearfix">
                    <div class="qodef-section-bottom-left">
                        <?php aton_qodef_post_info(
                            array(
                                'share' => 'yes'
                            )
                        ) ?>
                    </div>
                    <div class="qodef-section-bottom-right">
                        <?php aton_qodef_post_info(array(
                            'author' => 'yes',
                            'comments' => 'yes',
                            'like' => 'yes'
                        )) ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</article>