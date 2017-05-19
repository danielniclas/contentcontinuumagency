<?php
/*
Template Name: Landing Page
*/
$aton_qodef_sidebar = aton_qodef_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * aton_qodef_header_meta hook
         *
         * @see aton_qodef_header_meta() - hooked with 10
         * @see qode_user_scalable_meta() - hooked with 10
         */
        do_action('aton_qodef_header_meta');
        ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php if (aton_qodef_get_meta_field_intersect('smooth_page_transitions', aton_qodef_get_page_id()) === 'yes' && aton_qodef_get_meta_field_intersect('page_transition_preloader', aton_qodef_get_page_id()) === 'yes') { ?>

	<div class="qodef-smooth-transition-loader qodef-mimic-ajax">
		<div class="qodef-st-loader">
			<div class="qodef-st-loader1">
				<?php aton_qodef_loading_spinners(); ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="qodef-wrapper">
	<div class="qodef-wrapper-inner">
		<div class="qodef-content">
			<div class="qodef-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="qodef-full-width">
					<div class="qodef-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($aton_qodef_sidebar == 'default')||($aton_qodef_sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('aton_qodef_page_after_content'); ?>
							<?php elseif($aton_qodef_sidebar == 'sidebar-33-right' || $aton_qodef_sidebar == 'sidebar-25-right'): ?>
								<div <?php echo aton_qodef_sidebar_columns_class(); ?>>
									<div class="qodef-column1 qodef-content-left-from-sidebar">
										<div class="qodef-column-inner">
											<?php the_content(); ?>
											<?php do_action('aton_qodef_page_after_content'); ?>
										</div>
									</div>
									<div class="qodef-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($aton_qodef_sidebar == 'sidebar-33-left' || $aton_qodef_sidebar == 'sidebar-25-left'): ?>
								<div <?php echo aton_qodef_sidebar_columns_class(); ?>>
									<div class="qodef-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="qodef-column2 qodef-content-right-from-sidebar">
										<div class="qodef-column-inner">
											<?php the_content(); ?>
											<?php do_action('aton_qodef_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>