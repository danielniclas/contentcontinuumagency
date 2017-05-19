<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content" style="background-image: url(' <?php echo esc_url($params['link_image'][0]); ?> ')">
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-holder">
                    <div class="qodef-post-mark">
                        <span class="fa fa-link qodef-link-mark"></span>
                    </div>
                    <div class="qodef-post-text-main">
                        <?php aton_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h4')); ?>
                        <span itemprop="name" class="qodef-post-author entry-title">&ndash; <?php the_author_meta('display_name'); ?></span>
                    </div>
                </div>
            </div>
		</div>
	</div>
</article>