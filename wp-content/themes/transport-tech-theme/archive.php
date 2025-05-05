<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="archive-header">
        <div class="container">
            <h1><?php the_archive_title(); ?></h1>
            <p><?php the_archive_description(); ?></p>
        </div>
    </section>

    <section class="archive-content">
        <div class="container">
            <div class="archive-grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="archive-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-image">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="archive-details">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="archive-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="separator">•</span>
                                <span class="post-author"><?php the_author(); ?></span>
                            </p>
                            <p class="archive-excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <!-- Paginación -->
                <div class="pagination">
                    <?php 
                    echo paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                    )); 
                    ?>
                </div>

                <?php else : ?>
                    <p class="no-posts">No hay publicaciones disponibles en esta categoría.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>