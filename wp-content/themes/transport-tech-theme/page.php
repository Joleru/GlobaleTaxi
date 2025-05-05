<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="page-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <?php 
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else :
                echo '<p>No hay contenido disponible.</p>';
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>