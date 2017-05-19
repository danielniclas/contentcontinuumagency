<article id="post-<?php the_ID(); ?>" <?php post_class($blog_classes); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-text-holder">
                    <div class="qodef-post-mark">
                        <span class="fa fa-link qodef-link-mark"></span>
                    </div>
                    <div class="qodef-post-text-main">
                        <?php aton_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h4')); ?>
                        <span itemprop="name" class="qodef-post-author entry-title">&ndash; <?php the_author_meta('display_name'); ?></span>
                        <div class="qodef-post-info">
                            <?php aton_qodef_post_info(array('date' => 'no', 'author' => 'no', 'category' => 'no', 'comments' => 'no', 'share' => 'yes', 'like' => 'no')) ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <div class="qodef-post-single-content">
            <?php the_content(); ?>
        </div>
	</div>
    <div class="qodef-post-info-below clearfix">
        <?php do_action('aton_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>