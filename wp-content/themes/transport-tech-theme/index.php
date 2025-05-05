<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><?php bloginfo('name'); ?></h1>
                <p><?php bloginfo('description'); ?></p>
                <div class="hero-buttons">
                    <a href="#contact" class="button primary-button">Contáctanos</a>
                    <a href="#services" class="button secondary-button">Nuestros Servicios</a>
                </div>
            </div>
            <div class="hero-image">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt="Hero Image">';
                } ?>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="blog-section">
        <div class="container">
            <h2>Últimas Publicaciones</h2>
            <div class="blog-grid">
                <?php 
                $blog_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 6,
                    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
                );
                $blog_query = new WP_Query($blog_args);

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <article class="blog-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-image">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="blog-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No hay publicaciones disponibles.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <?php 
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                ));
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>