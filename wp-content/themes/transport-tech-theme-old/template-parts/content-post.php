<?php
/**
 * The template part for displaying single posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        
        <div class="entry-meta">
            <?php
            transport_tech_posted_on();
            transport_tech_posted_by();
            ?>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large', array(
                'alt' => get_the_title(),
                'loading' => 'lazy'
            )); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_content();
        
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'transport-tech'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php
        // Categories and tags
        transport_tech_entry_footer();
        
        // Edit post link
        edit_post_link(
            sprintf(
                wp_kses(
                    __('Edit <span class="screen-reader-text">%s</span>', 'transport-tech'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer>
</article>