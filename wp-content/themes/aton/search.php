<?php $aton_qodef_sidebar = aton_qodef_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 

$aton_qodef_blog_page_range = aton_qodef_get_blog_page_range();
$aton_qodef_max_number_of_pages = aton_qodef_get_max_number_of_pages();

if ( get_query_var('paged') ) { $aton_qodef_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $aton_qodef_paged = get_query_var('page'); }
else { $aton_qodef_paged = 1; }
?>
<?php aton_qodef_get_title(); ?>
	<div class="qodef-container">
		<?php do_action('aton_qodef_after_container_open'); ?>
		<div class="qodef-container-inner clearfix">
			<div class="qodef-container">
				<?php do_action('aton_qodef_after_container_open'); ?>
				<div class="qodef-container-inner" >
					<div class="qodef-blog-holder qodef-blog-type-standard">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="qodef-post-content">
							<div class="qodef-post-text">
								<div class="qodef-post-text-inner">
									<h2 itemprop="name" class="entry-title">
										<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h2>
									<?php
										aton_qodef_read_more_button();
									?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php
						if(aton_qodef_options()->getOptionValue('pagination') == 'yes') {
							aton_qodef_pagination($aton_qodef_max_number_of_pages, $aton_qodef_blog_page_range, $aton_qodef_paged);
						}
					?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'aton'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('aton_qodef_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('aton_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>