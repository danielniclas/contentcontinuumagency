<?php
if( !function_exists('aton_qodef_get_blog') ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function aton_qodef_get_blog($type) {

		$sidebar = aton_qodef_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar" => $sidebar
		);
		aton_qodef_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}

}

if( !function_exists('aton_qodef_get_blog_type')) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function aton_qodef_get_blog_type($type) {

		$blog_query = aton_qodef_get_blog_query();

		$paged = aton_qodef_paged();

		if(aton_qodef_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(aton_qodef_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $blog_query->max_num_pages;
		}
		$blog_classes = aton_qodef_get_blog_holder_classes($type);
		$blog_data_params = aton_qodef_set_blog_holder_data_params($type);

		$params = array(
			'blog_query' => $blog_query,
			'paged' => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type' => $type,
			'blog_classes' => $blog_classes,
			'blog_data_params' => $blog_data_params
		);

		aton_qodef_get_module_template_part('templates/lists/' .  $type, 'blog', '', $params);

	}

}

if(!function_exists('aton_qodef_get_blog_holder_classes')){
	/**
	 * Function set blog holder class
	 *
	 * return string
	 */

	function aton_qodef_get_blog_holder_classes($type){

		$show_load_more = aton_qodef_enable_load_more($type);
		$hasSidebar = aton_qodef_sidebar_layout();


		$blog_classes = array(
			'qodef-blog-holder'
		);

		$blog_classes[] = $related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? '' : 'qodef-has-sidebar';

		if($show_load_more){
			$blog_classes[] = 'qodef-blog-load-more';
		}

		switch ($type) {

			case 'standard':
				$blog_classes[] = 'qodef-blog-type-standard';
				break;

			case 'standard-whole-post':
				$blog_classes[] = 'qodef-blog-type-standard';
				break;

			case 'masonry':
				$blog_classes[] = 'qodef-blog-type-masonry';
				break;

			case 'masonry-full-width':
				$blog_classes[] = 'qodef-blog-type-masonry qodef-masonry-full-width';
				break;

			case 'gallery':
				$blog_classes[] = 'qodef-blog-type-gallery';
				break;

			case 'narrow':
				$blog_classes[] = 'qodef-blog-type-narrow';
				break;

			default:
				$blog_classes[] = 'qodef-blog-type-standard';
				break;
		}

		if($type == 'masonry' || $type == 'masonry-full-width'){

			$masonry_columns = aton_qodef_get_meta_field_intersect('masonry_columns');

			switch ($masonry_columns) {
				case 'four':
					$blog_classes[] = 'qodef-masonry-four-cols';
					break;
				case 'three':
					$blog_classes[] = 'qodef-masonry-three-cols';
					break;
				case 'two':
					$blog_classes[] = 'qodef-masonry-two-cols';
					break;
			}

		}

        if(!aton_qodef_core_installed() || aton_qodef_options()->getOptionValue('enable_social_share') != 'yes' || aton_qodef_options()->getOptionValue('enable_social_share_on_post') != 'yes') {
            $blog_classes[] = 'qodef-blog-social-share-disabled';
        }

		return implode(' ',$blog_classes);
	}

}

if(!function_exists('aton_qodef_get_blog_query')){
	/**
	 * Function which create query for blog lists
	 *
	 * @return wp query object
	 */
	function aton_qodef_get_blog_query(){
		global $wp_query;

		$id = aton_qodef_get_page_id();
		$category = esc_attr(get_post_meta($id, "qodef_blog_category_meta", true));
		if(esc_attr(get_post_meta($id, "qodef_show_posts_per_page_meta", true)) != ""){
			$post_number = esc_attr(get_post_meta($id, "qodef_show_posts_per_page_meta", true));
		}else{
			$post_number = esc_attr(get_option('posts_per_page'));
		}

		$paged = aton_qodef_paged();
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'cat' 	=> $category,
			'posts_per_page' => $post_number
		);
		if(is_archive()){
			$blog_query = $wp_query;
		}else{
			$blog_query = new WP_Query($query_array);
		}
		return $blog_query;

	}
}


if( !function_exists('aton_qodef_get_post_format_html') ) {

	/**
	 * Function which return html for post formats
	 * @param $type
	 * @return post hormat template
	 */

	function aton_qodef_get_post_format_html($type = "", $ajax = '') {

		$post_format = get_post_format();

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');

		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$params = array();

		switch( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				break;
			case 'quote':
				$params['quote_text'] = '';
				$quote_text =  get_post_meta(get_the_ID(),'qodef_post_quote_text_meta',true);
				if($quote_text && $quote_text !== ''){
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}
		//use same post format templates as masonry in grid template
		if($type === 'masonry-full-width'){
			$type = 'masonry';
		}

		$slug = '';
		if($type !== ""){
			$slug = $type;
		}

        $params['type'] = $slug;

		$chars_array = aton_qodef_blog_lists_number_of_chars();

		if(isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}

        $group = '';
        if ($slug == '') {
            $group = 'standard';
        }
        else if(in_array($slug, aton_qodef_blog_masonry_types())){
            $group = 'masonry';
        }
        else if(in_array($slug, aton_qodef_blog_standard_types())){
            $group = 'standard';
        }

		else if(in_array($slug, aton_qodef_blog_narrow_types())) {
			$group = 'narrow';
		}

		else if(in_array($slug, aton_qodef_blog_gallery_types())) {
			$group = 'gallery';
		}

		if($ajax == ''){
			aton_qodef_get_module_template_part('templates/lists/post-formats/' . $group . '/' . $post_format, 'blog', $slug, $params);
		}
		if($ajax == 'yes'){
			return aton_qodef_get_blog_module_template_part('templates/lists/post-formats/' . $group . '/' . $post_format, $slug, $params);
		}

	}

}

if( !function_exists('aton_qodef_get_default_blog_list') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function aton_qodef_get_default_blog_list() {

		$blog_list = aton_qodef_options()->getOptionValue('blog_list_type');
		return $blog_list;

	}

}


if (!function_exists('aton_qodef_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function aton_qodef_pagination($pages = '', $range = 4, $paged = 1, $template = ''){

		$showitems = $range+1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}

		$show_load_more = aton_qodef_enable_load_more($template);

		$search_template = 'no';
		if(is_search()){
			$search_template = 'yes';
		}


		if($pages != 1){
			if($show_load_more == 'yes'  && $search_template !== 'yes'){

				echo aton_qodef_get_load_more_button_html();

			}

			else{

				echo '<div class="qodef-pagination">';
				echo '<ul>';
				if($paged > 2 && $paged > $range+1 && $showitems < $pages){
					echo '<li class="qodef-pagination-first-page"><a itemprop="url" href="'.esc_url(get_pagenum_link(1)).'"><span class="arrow_carrot-2left"></span><span class="qodef-pagination-text">' . esc_html__('First page', 'aton') .'</span></a></li>';
				}
				echo "<li class='qodef-pagination-prev";
				if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
					echo " qodef-pagination-prev-first";
				}
				echo "'><a itemprop='url' href='".esc_url(get_pagenum_link($paged - 1))."'><span class='qodef-pagination-arrow ion-arrow-left-c'></span><span class='qodef-pagination-text'>" . esc_html__('Previous page', 'aton') . "</span></a></li>";

				for ($i=1; $i <= $pages; $i++){
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
						echo ($paged == $i)? "<li class='qodef-pagination-number active'><span>".$i."</span></li>":"<li class='qodef-pagination-number'><a itemprop='url' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
					}
				}

                if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
                    echo '<li class="qodef-pagination-last-page"><a itemprop="url" href="'.esc_url(get_pagenum_link($pages)).'"><span class="qodef-pagination-text">' . esc_html__('Last page', 'aton') .'</span><span class="arrow_carrot-2right"></span></a></li>';
                }
				echo '<li class="qodef-pagination-next';
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
					echo ' qodef-pagination-next-last';
				}
				echo '"><a itemprop="url" href="';
				if($pages > $paged){
					echo esc_url(get_pagenum_link($paged + 1));
				} else {
					echo esc_url(get_pagenum_link($paged));
				}
				echo '"><span class="qodef-pagination-text">' . esc_html__('Next page', 'aton') .'</span><span class="qodef-pagination-arrow ion-arrow-right-c"></span></a></li>';
				echo '</ul>';
				echo "</div>";
			}
		}
	}
}

if(!function_exists('aton_qodef_post_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 * @param $params array of options for specific template part
	 */
	function aton_qodef_post_info($config, $params = array()){
		$default_config = array(
			'date' => '',
			'category' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'share' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($date == 'yes'){
			aton_qodef_get_module_template_part('templates/parts/post-info-date', 'blog', '', $params);
		}
		if($category == 'yes'){
			aton_qodef_get_module_template_part('templates/parts/post-info-category', 'blog');
		}
        if($share == 'yes'){
            aton_qodef_get_module_template_part('templates/parts/post-info-share', 'blog', '', $params);
        }
		if($author == 'yes'){
			aton_qodef_get_module_template_part('templates/parts/post-info-author', 'blog', '', $params);
		}
		if($comments == 'yes' && comments_open()){
			aton_qodef_get_module_template_part('templates/parts/post-info-comments', 'blog', '', $params);
		}
		if($like == 'yes'){
			aton_qodef_get_module_template_part('templates/parts/post-info-like', 'blog');
		}
	}
}

if(!function_exists('aton_qodef_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in qode_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function aton_qodef_excerpt($excerpt_length = '') {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		}

		//does current post has read more tag set?
		elseif(aton_qodef_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		}

		//is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '80';
			if(isset($excerpt_length) && $excerpt_length != ""){
				$word_count = $excerpt_length;

			} elseif(aton_qodef_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(aton_qodef_options()->getOptionValue('number_of_chars'));
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix		= apply_filters('aton_qodef_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt 			= implode (' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p itemprop="description" class="qodef-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('aton_qodef_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function aton_qodef_get_blog_single() {
		$sidebar = aton_qodef_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		aton_qodef_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if( !function_exists('aton_qodef_get_single_html') ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function aton_qodef_get_single_html() {

		$post_format = get_post_format();
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		//Related posts
		$related_posts_params = array();
		$show_related = (aton_qodef_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = aton_qodef_sidebar_layout();
			$post_id = get_the_ID();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_params = array(
				'related_posts' => aton_qodef_get_related_post_type($post_id, $related_posts_options)
			);
		}
		$params = array();
		switch( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				break;
			case 'quote':
				$params['quote_text'] = '';

				$quote_text =  get_post_meta(get_the_ID(),'qodef_post_quote_text_meta',true);
				if($quote_text && $quote_text !== ''){
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}

		$params ['blog_classes'] = '';
        if(!aton_qodef_core_installed() || aton_qodef_options()->getOptionValue('enable_social_share') != 'yes' || aton_qodef_options()->getOptionValue('enable_social_share_on_post') != 'yes') {
            $params['blog_classes'] = 'qodef-blog-social-share-disabled';
        }

		aton_qodef_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params );
		if ($show_related) {
			aton_qodef_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}
        aton_qodef_get_module_template_part('templates/single/parts/single-navigation', 'blog');
        aton_qodef_get_module_template_part('templates/single/parts/author-info', 'blog');
		if(aton_qodef_show_comments()){
			comments_template('', true);
		}
	}

}
if( !function_exists('aton_qodef_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function aton_qodef_additional_post_items() {

		/*if(has_tag()){
			aton_qodef_get_module_template_part('templates/single/parts/tags', 'blog');
		}*/


		$args_pages = array(
			'before'           => '<div class="qodef-single-links-pages"><div class="qodef-single-links-pages-inner">',
			'after'            => '</div></div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'pagelink'         => '%'
		);

		wp_link_pages($args_pages);

	}
	add_action('aton_qodef_before_blog_article_closed_tag', 'aton_qodef_additional_post_items');
}


if (!function_exists('aton_qodef_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function aton_qodef_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment  = $post->post_author == $comment->user_id;

		$comment_class = 'qodef-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' qodef-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' qodef-pingback-comment';
		}

		?>

		<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="qodef-comment-image"> <?php echo aton_qodef_kses_img(get_avatar($comment, 83)); ?> </div>
			<?php } ?>
			<div class="qodef-comment-text">
				<h5 class="qodef-comment-name">
					<?php
					if ( $is_pingback_comment ) {
						esc_html_e('Pingback:', 'aton');
					}
					echo wp_kses_post(get_comment_author_link());
					if($is_author_comment) { ?>
						<i class="fa fa-user post-author-comment-icon"></i>
					<?php } ?>
				</h5>
				<?php if(!$is_pingback_comment) { ?>
					<div class="qodef-text-holder" id="comment-<?php comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
					<div class="qodef-comment-info clearfix">
							<span class="qodef-comment-date"><?php comment_time(get_option('date_format')); ?> <?php esc_html_e('at', 'aton'); ?> <?php comment_time(get_option('time_format')); ?></span>
							<?php
							comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) );
							edit_comment_link();
							?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements
	}
}

if( !function_exists('aton_qodef_blog_archive_pages_classes') ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function aton_qodef_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, aton_qodef_blog_full_width_types())){
			$classes['holder'] = 'qodef-full-width';
			$classes['inner'] = 'qodef-full-width-inner';
		} elseif(in_array($blog_type, aton_qodef_blog_grid_types())){
			$classes['holder'] = 'qodef-container';
			$classes['inner'] = 'qodef-container-inner clearfix';
		}

		return $classes;

	}

}

if( !function_exists('aton_qodef_blog_full_width_types') ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function aton_qodef_blog_full_width_types() {

		$types = array('masonry-full-width', 'gallery');

		return $types;

	}

}

if( !function_exists('aton_qodef_blog_grid_types') ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function aton_qodef_blog_grid_types() {

		$types = array('standard', 'masonry', 'standard-whole-post', 'narrow');

		return $types;

	}

}

if( !function_exists('aton_qodef_blog_types') ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function aton_qodef_blog_types() {

		$types = array_merge(aton_qodef_blog_grid_types(), aton_qodef_blog_full_width_types());

		return $types;

	}

}

if( !function_exists('aton_qodef_blog_templates') ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function aton_qodef_blog_templates() {

		$templates = array();
		$grid_templates = aton_qodef_blog_grid_types();
		$full_templates = aton_qodef_blog_full_width_types();
		foreach($grid_templates as $grid_template){
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template){
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if( !function_exists('aton_qodef_blog_masonry_types') ) {

    /**
     * Function which return masonry blog types
     *
     * @return array
     */

    function aton_qodef_blog_masonry_types() {

        $types = array('masonry', 'masonry-full-width');

        return $types;

    }

}

if( !function_exists('aton_qodef_blog_standard_types') ) {

    /**
     * Function which return masonry blog types
     *
     * @return array
     */

    function aton_qodef_blog_standard_types() {

        $types = array('standard', 'standard-whole-post');

        return $types;

    }

}

if( !function_exists('aton_qodef_blog_narrow_types') ) {

	/**
	 * Function which return masonry blog types
	 *
	 * @return array
	 */

	function aton_qodef_blog_narrow_types() {

		$types = array('narrow');

		return $types;

	}

}

if( !function_exists('aton_qodef_blog_gallery_types') ) {

	/**
	 * Function which return masonry blog types
	 *
	 * @return array
	 */

	function aton_qodef_blog_gallery_types() {

		$types = array('gallery');

		return $types;

	}

}

if( !function_exists('aton_qodef_blog_lists_number_of_chars') ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function aton_qodef_blog_lists_number_of_chars(){

		$number_of_chars = array();

		if(aton_qodef_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = aton_qodef_options()->getOptionValue('standard_number_of_chars');
		}
		if(aton_qodef_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = aton_qodef_options()->getOptionValue('masonry_number_of_chars');
		}
		if(aton_qodef_options()->getOptionValue('gallery_number_of_chars')) {
			$number_of_chars['gallery'] = aton_qodef_options()->getOptionValue('gallery_number_of_chars');
		}
		if(aton_qodef_options()->getOptionValue('narrow_number_of_chars')) {
			$number_of_chars['narrow'] = aton_qodef_options()->getOptionValue('narrow_number_of_chars');
		}

		return $number_of_chars;

	}

}

if (!function_exists('aton_qodef_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function aton_qodef_excerpt_length( $length ) {

		if(aton_qodef_options()->getOptionValue('number_of_chars') !== ''){
			return esc_attr(aton_qodef_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'aton_qodef_excerpt_length', 999 );
}

if (!function_exists('aton_qodef_excerpt_more')) {
	/**
	 * Function that adds three dotes on the end excerpt
	 * @param $more
	 * @return string
	 */
	function aton_qodef_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'aton_qodef_excerpt_more');
}

if(!function_exists('aton_qodef_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function aton_qodef_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('aton_qodef_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function aton_qodef_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('aton_qodef_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function aton_qodef_modify_read_more_link() {
		$link = '<div class="qodef-more-link-container">';
		$link .= aton_qodef_get_button_html(array(
			'link' => get_permalink().'#more-'.get_the_ID(),
			'type' => 'transparent',
			'size' => 'small',
			'text' => esc_html__('Continue reading', 'aton'),
			'font_weight' => '700'
		));

		$link .= '</div>';

		return $link;
	}

	add_filter( 'the_content_more_link', 'aton_qodef_modify_read_more_link');
}


if(!function_exists('aton_qodef_has_blog_widget')) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function aton_qodef_has_blog_widget() {
		$widgets_array = array(
			'qode_latest_posts_widget'
		);

		foreach ($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('aton_qodef_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function aton_qodef_has_blog_shortcode() {
		$blog_shortcodes = array(
			'qodef_blog_list',
			'qodef_blog_slider',
			'qodef_blog_carousel'
		);

		$slider_field = get_post_meta(aton_qodef_get_page_id(), 'qodef_page_slider_meta', true); //TODO change

		foreach ($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = aton_qodef_has_shortcode($blog_shortcode) || aton_qodef_has_shortcode($blog_shortcode, $slider_field);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}


if(!function_exists('aton_qodef_load_blog_assets')) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @see is_home()
	 * @see is_single()
	 * @see qode_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see qode_has_blog_widget()
	 * @return bool
	 */
	function aton_qodef_load_blog_assets() {
		return aton_qodef_is_blog_template() || is_home() || is_single() || aton_qodef_has_blog_shortcode() || is_archive() || is_search() || aton_qodef_has_blog_widget();
	}
}

if(!function_exists('aton_qodef_is_blog_template')) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 *@param string current page. Optional parameter.
	 *
	 *@return bool
	 *
	 * @see aton_qodef_get_page_template_name()
	 */
	function aton_qodef_is_blog_template($current_page = '') {

		if($current_page == '') {
			$current_page = aton_qodef_get_page_template_name();
		}

		$blog_templates = aton_qodef_blog_templates();

		return in_array($current_page, $blog_templates);
	}
}

if(!function_exists('aton_qodef_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function aton_qodef_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = aton_qodef_options()->getOptionValue($option) == 'yes';
		}else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !aton_qodef_post_has_read_more() && !post_password_required()) {
			echo aton_qodef_get_button_html(array(
				'size'         => 'small',
				'type'         => 'transparent',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('Read Post', 'aton'),
				'custom_class' => $class,
				'icon_pack'    => 'ion_icons',
				'ion_icon' 	   => 'ion-arrow-right-c'
			));
		}
	}
}

if(!function_exists('aton_qodef_set_blog_holder_data_params')){
	/**
	 * Function which set data params on blog holder div
	 */
	function aton_qodef_set_blog_holder_data_params($type){

		$show_load_more = aton_qodef_enable_load_more($type);
		if($show_load_more){
			$current_query = aton_qodef_get_blog_query();

			$data_params = array();
			$data_return_string = '';

			$data_params['data-blog-type'] = $type;

			$paged = aton_qodef_paged();

			if(get_post_meta(get_the_ID(), "qodef_show_posts_per_page_meta", true) != ""){
				$posts_number = get_post_meta(get_the_ID(), "qodef_show_posts_per_page_meta", true);
			}else{
				$posts_number = get_option('posts_per_page');
			}
			$category = get_post_meta(aton_qodef_get_page_id(), 'qodef_blog_category_meta', true);


			//set data params
			$data_params['data-next-page'] = $paged+1;
			$data_params['data-max-pages'] =  $current_query->max_num_pages;

			if($posts_number !=''){
				$data_params['data-post-number'] = $posts_number;
			}

			if($category !=''){
				$data_params['data-category'] = $category;
			}

			if(is_archive()){
				if(is_category()){
					$cat_id = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if(is_author()){
					$author_id = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
				}
				if(is_tag()){
					$current_tag_id = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if(is_date()){
					$day  = get_query_var('day');
					$month = get_query_var('monthnum');
					$year = get_query_var('year');

					$data_params['data-archive-day'] = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year'] = $year;
				}
			}
			if(is_search()){
				$search_query = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}

			foreach($data_params as $key => $value) {
				if($key !== '') {
					$data_return_string .= $key.'= '.esc_attr($value).' ';
				}
			}

			return $data_return_string;

		}
	}
}

if(!function_exists('aton_qodef_enable_load_more')){
    /**
     * Function that checks if load more is enabled
     * @param $template
     * @return bool
     */
	function aton_qodef_enable_load_more($template = ''){
		$enable_load_more = false;

		if(aton_qodef_options()->getOptionValue('pagination') == 'yes'){

            if($template == 'masonry-full-width') {
                $template = 'masonry';
            }
            if(aton_qodef_options()->getOptionValue($template . '_pagination_type') != '') {
                if(aton_qodef_options()->getOptionValue($template . '_pagination_type') == 'load_more_pagination'){
                    $enable_load_more = true;
                }
            }
            else if(aton_qodef_options()->getOptionValue('pagination_type') == 'load_more_pagination'){
                $enable_load_more = true;
            }
		}

		return $enable_load_more;
	}
}
if(!function_exists('aton_qodef_is_masonry_template')){
	/**
	 * Check if masonry template is enabled
	 * return boolean
	 */
	function aton_qodef_is_masonry_template(){

		$page_id = aton_qodef_get_page_id();
		$page_template = get_page_template_slug($page_id);
		$page_options_template = aton_qodef_options()->getOptionValue('blog_list_type');

		if(!is_archive()){
			if($page_template == 'blog-masonry.php' ||  $page_template =='blog-masonry-full-width.php'){
				return true;
			}
		}elseif(is_archive() || is_home()){
			if($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width'){
				return true;
			}
		}
		else{
			return false;
		}
	}


}

if(!function_exists('aton_qodef_set_ajax_url')){
	/**
	 * load themes ajax functionality
	 *
	 */
	function aton_qodef_set_ajax_url() {
		echo '<script type="application/javascript">var QodefAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'aton_qodef_set_ajax_url');

}

/**
 * Loads more function for blog posts.
 *
 */
if(!function_exists('aton_qodef_blog_load_more')){

	function aton_qodef_blog_load_more(){

		$return_obj = array();
		$paged = $post_number = $category = $blog_type = '';
		$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';

		if (isset($_POST['nextPage'])) {
			$paged = $_POST['nextPage'];
		}
		if (isset($_POST['number'])) {
			$post_number = $_POST['number'];
		}
		if (isset($_POST['category'])) {
			$category = $_POST['category'];
		}
		if (isset($_POST['blogType'])) {
			$blog_type = $_POST['blogType'];
		}
		if (isset($_POST['archiveCategory'])) {
			$archive_category = $_POST['archiveCategory'];
		}
		if (isset($_POST['archiveAuthor'])) {
			$archive_author = $_POST['archiveAuthor'];
		}
		if (isset($_POST['archiveTag'])) {
			$archive_tag = $_POST['archiveTag'];
		}
		if (isset($_POST['archiveDay'])) {
			$archive_day = $_POST['archiveDay'];
		}
		if (isset($_POST['archiveMonth'])) {
			$archive_month = $_POST['archiveMonth'];
		}
		if (isset($_POST['archiveYear'])) {
			$archive_year = $_POST['archiveYear'];
		}


		$html = '';
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'posts_per_page' => $post_number
		);

		if($category != ''){
			$query_array['cat'] = $category;
		}
		if($archive_category != ''){
			$query_array['cat'] = $archive_category;
		}
		if($archive_author != ''){
			$query_array['author'] = $archive_author;
		}
		if($archive_tag != ''){
			$query_array['tag'] = $archive_tag;
		}
		if($archive_day !='' && $archive_month != '' && $archive_year !=''){
			$query_array['day'] = $archive_day;
			$query_array['monthnum'] = $archive_month;
			$query_array['year'] = $archive_year;
		}
		$query_results = new \WP_Query($query_array);

		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$html .=  aton_qodef_get_post_format_html($blog_type, 'yes');
			endwhile;
		else:
			$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'aton') .'</p>';
		endif;

		$return_obj = array(
			'html' => $html,
		);

		echo json_encode($return_obj); exit;
	}
}


add_action('wp_ajax_nopriv_aton_qodef_blog_load_more', 'aton_qodef_blog_load_more');
add_action( 'wp_ajax_aton_qodef_blog_load_more', 'aton_qodef_blog_load_more' );

if(!function_exists('aton_qodef_get_max_number_of_pages')) {
	/**
	 * Function that return max number of posts/pages for pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function aton_qodef_get_max_number_of_pages() {
		global $wp_query;

		$max_number_of_pages = 10; //default value

		if($wp_query) {
			$max_number_of_pages = $wp_query->max_num_pages;
		}

		return $max_number_of_pages;
	}
}

if(!function_exists('aton_qodef_get_blog_page_range')) {
	/**
	 * Function that return current page for blog list pagination
	 * @return int
	 *
	 * @version 0.1
	 */
	function aton_qodef_get_blog_page_range() {
		global $wp_query;

		if(aton_qodef_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(aton_qodef_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $wp_query->max_num_pages;
		}

		return $blog_page_range;
	}
}

if ( ! function_exists( 'aton_qodef_comment_form_submit_button' ) ) {

	function aton_qodef_comment_form_submit_button( $submit_button ) {

		$submit_button = aton_qodef_get_button_html(array(
			'html_type' => 'button',
			'type' => 'solid',
			'custom_class' => 'submit',
			'text' => esc_html__('Submit', 'aton'),
			'custom_attrs' => array(
				'id' => 'submit_comment'
			)
		));
		return $submit_button;
	}

	add_filter( 'comment_form_submit_button', 'aton_qodef_comment_form_submit_button' );

}
if ( ! function_exists( 'aton_qodef_get_load_more_button_html' ) ) {

	function aton_qodef_get_load_more_button_html() {
		$button_params = array(
			'type'  => 'solid',
			'text'  => esc_html__('Load More' , 'aton'),
			'link'  => '#',
			'hover_type'  => 'sweep',
			'font_size' => '14'
		);
		$button_html = '<div class= "qodef-load-more-ajax-pagination">';
		$button_html .= aton_qodef_get_button_html($button_params);
		$button_html .= '</div>';
		return $button_html;

	}

}