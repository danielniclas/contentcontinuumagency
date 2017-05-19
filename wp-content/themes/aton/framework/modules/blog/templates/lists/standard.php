<div class="<?php echo esc_attr($blog_classes)?>" <?php echo esc_attr($blog_data_params) ?> >
	<?php

	if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
		aton_qodef_get_post_format_html($blog_type);
	endwhile;

	else:
		aton_qodef_get_module_template_part('templates/parts/no-posts', 'blog');
	endif;

    if(aton_qodef_options()->getOptionValue('pagination') == 'yes') {
        if (aton_qodef_options()->getOptionValue('pagination_type') == 'navigation') {
            ?>
            <div class="qodef-pagination">
                <ul>
                    <li class='qodef-pagination-prev'><?php echo wp_kses_post(get_previous_posts_link('<i class="pagination_arrow arrow_carrot-left"></i>')); ?></li>
                    <li class='qodef-pagination-next'><?php echo wp_kses_post(get_next_posts_link('<i class="pagination_arrow arrow_carrot-right"></i>', $blog_query->max_num_pages)); ?></li>
                </ul>
            </div>
            <?php
        } else {
            aton_qodef_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
        }
    }
	?>
</div>
