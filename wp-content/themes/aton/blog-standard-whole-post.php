<?php
    /*
    Template Name: Blog: Standard Whole Post
    */
?>
<?php get_header(); ?>
<?php aton_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="qodef-container">
        <?php do_action('aton_qodef_after_container_open'); ?>
        <div class="qodef-container-inner">
            <?php the_content();?>
            <?php aton_qodef_get_blog('standard-whole-post'); ?>
        </div>
        <?php do_action('aton_qodef_before_container_close'); ?>
    </div>
<?php get_footer(); ?>