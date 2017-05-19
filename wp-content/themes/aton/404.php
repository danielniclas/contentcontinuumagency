<?php get_header(); ?>

	<?php aton_qodef_get_title(); ?>

	<div class="qodef-container">
	<?php do_action('aton_qodef_after_container_open'); ?>
		<div class="qodef-container-inner qodef-404-page">
			<div class="qodef-page-not-found">
				<h2>
					<?php if(aton_qodef_options()->getOptionValue('404_title')){
						echo esc_html(aton_qodef_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking is not found', 'aton');
					} ?>
				</h2>
				<h4>
					<?php if(aton_qodef_options()->getOptionValue('404_text')){
						echo esc_html(aton_qodef_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'aton');
					} ?>
				</h4>
				<?php
					$params = array();
					if (aton_qodef_options()->getOptionValue('404_back_to_home')){
						$params['text'] = aton_qodef_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__('Back to Home Page', 'aton');
					}
					$params['link'] = esc_url(home_url('/'));
					$params['target'] = '_self';

				if(aton_qodef_core_installed()) {
					echo aton_qodef_execute_shortcode('qodef_button', $params);
				}?>
			</div>
		</div>
		<?php do_action('aton_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>