<?php
    /*
        Template Name: Blog: Gallery
    */
?>
<?php get_header(); ?>
<?php aton_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
    <div class="qodef-full-width">
        <div class="qodef-full-width-inner clearfix">
            <?php the_content();?>
            <?php aton_qodef_get_blog('gallery'); ?>
        </div>
    </div>
<?php get_footer(); ?>