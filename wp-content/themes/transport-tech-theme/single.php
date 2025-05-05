<?php get_header(); ?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <span class="post-author">Por <?php the_author(); ?></span>
                    <span class="separator">•</span>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                </div>
            </div>
        </header>

        <div class="entry-content">
            <div class="container">
                <?php 
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; 
                ?>
            </div>
        </div>

        <footer class="entry-footer">
            <div class="container">
                <div class="post-tags">
                    <?php the_tags('<span class="tag-label">Etiquetas:</span> ', ', '); ?>
                </div>
                <div class="post-navigation">
                    <div class="prev-post"><?php previous_post_link('%link', '← Entrada anterior'); ?></div>
                    <div class="next-post"><?php next_post_link('%link', 'Siguiente entrada →'); ?></div>
                </div>
            </div>
        </footer>
    </article>

    <!-- Comments Section -->
    <?php if (comments_open() || get_comments_number()) : ?>
        <div class="container">
            <?php comments_template(); ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>