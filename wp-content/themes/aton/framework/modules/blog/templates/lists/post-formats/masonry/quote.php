<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content" style="background-image: url(' <?php echo esc_url($params['quote_image'][0]); ?> ')">
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-holder">
                    <div class="qodef-post-mark">
                        <span class="fa fa-quote-right qodef-quote-mark"></span>
                    </div>
                    <div class="qodef-post-text-main">
                        <h4 class="qodef-post-title">
                            <a class="qodef-post-quote-value" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php echo esc_html($quote_text); ?>
                            </a>
                        </h4>
                        <span itemprop="name" class="qodef-post-author entry-title"><?php the_title(); ?></span>
						<span itemprop="name" class="qodef-post-author entry-title">&ndash; <?php the_author_meta('display_name'); ?></span>
                    </div>
                </div>
            </div>
		</div>
	</div>
</article>