<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="container">
            <h1 class="error-title">¡Ups! Página no encontrada.</h1>
            <p class="error-message">Parece que la página que buscas no existe o ha sido movida.</p>
            <div class="error-actions">
                <a href="<?php echo home_url(); ?>" class="button primary-button">Volver al Inicio</a>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button secondary-button">Ver Últimas Publicaciones</a>
            </div>
            <div class="error-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.png" alt="Página no encontrada">
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>