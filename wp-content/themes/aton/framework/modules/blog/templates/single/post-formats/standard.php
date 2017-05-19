<article id="post-<?php the_ID(); ?>" <?php post_class($blog_classes); ?>>
	<div class="qodef-post-content">
		<?php aton_qodef_get_module_template_part('templates/single/parts/image', 'blog'); ?>
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-info qodef-section-top">
                    <?php aton_qodef_post_info(array(
                        'date' => 'yes',
                        'category' => 'yes'
                    )) ?>
                </div>
                <?php aton_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <div class="qodef-post-single-content">
                    <?php the_content(); ?>
                </div>
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
    <div class="qodef-post-info-below clearfix">
	    <?php do_action('aton_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>