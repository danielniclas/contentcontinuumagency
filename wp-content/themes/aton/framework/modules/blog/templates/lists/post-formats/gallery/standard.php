<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-overlay"></div>
        <?php aton_qodef_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <?php aton_qodef_post_info(array('date' => 'yes'), array('show_date_label' => false)) ?> <span class="qodef-post-text-inner-separator">/</span> <?php aton_qodef_post_info(array('category' => 'yes'), array('show_category_label' => 'no', 'show_category_delimiter' => 'no')) ?>
                <?php aton_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <?php aton_qodef_excerpt($excerpt_length); ?>
                <div class="qodef-post-info-bottom">
                    <?php aton_qodef_post_info(
                        array(
                            'author' => 'yes'
                        ),
                        array(
                            'show_author_avatar' => true
                        )
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</article>