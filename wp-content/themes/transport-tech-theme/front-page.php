<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Soluciones de Software para el Transporte</h1>
                <p>Innovación y tecnología para mejorar la logística y gestión de flotas.</p>
                <div class="hero-buttons">
                    <a href="#contact" class="button primary-button">Contáctanos</a>
                    <a href="#services" class="button secondary-button">Ver Servicios</a>
                </div>
            </div>
            <div class="hero-image">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.png" alt="Hero Image">';
                } ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Servicios</span>
                <h2>Soluciones Tecnológicas para el Transporte</h2>
                <p>Optimiza tu negocio con nuestras herramientas avanzadas.</p>
            </div>
            <div class="services-grid">
                <?php
                $services_args = array(
                    'post_type'      => 'service',
                    'posts_per_page' => 6,
                );
                $services_query = new WP_Query($services_args);

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post(); ?>
                        <div class="service-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-icon">
                                <?php the_post_thumbnail('thumbnail'); ?>
                                <h3><?php the_title(); ?></h3>
                            </div>
                        <?php endif; ?>
                            
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Ver más</a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No hay servicios disponibles por ahora.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Proyectos</span>
                <h2>Casos de Éxito</h2>
                <p>Descubre cómo hemos ayudado a transformar negocios.</p>
            </div>
            <div class="projects-grid">
                <?php
                $projects_args = array(
                    'post_type'      => 'project',
                    'posts_per_page' => 2,
                );
                $projects_query = new WP_Query($projects_args);

                if ($projects_query->have_posts()) :
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                        $project_image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); 
                        ?>
                        <div class="project-card">
                        <?php if ($project_image) : ?>
                            <div class="project-image">
                                <img src="<?php echo esc_url($project_image); ?>" 
                                     alt="<?php echo esc_attr(get_the_title()); ?>">
                            </div>
                        <?php endif; ?>
                        
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Ver más</a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No hay proyectos disponibles por ahora.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Blog</span>
                <h2>Últimas Noticias</h2>
                <p>Información relevante sobre tecnología y transporte.</p>
            </div>
            <div class="blog-grid">
                <?php
                $blog_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                );
                $blog_query = new WP_Query($blog_args);

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <article class="blog-card">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No hay publicaciones recientes.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Contacto</span>
                <h2>Hablemos de su Proyecto</h2>
                <p>Estamos listos para ayudarle a transformar su negocio con soluciones tecnológicas a medida.</p>
            </div>
            
            <div class="contact-container">
                <div class="contact-form">
                    <div class="form-card">
                        <h3>Envíenos un Mensaje</h3>
                        <p>Complete el formulario y nos pondremos en contacto con usted lo antes posible.</p>
                        
                        <?php 
                        // Contact Form 7 shortcode or custom form
                        if (shortcode_exists('contact-form-7')) {
                            echo do_shortcode('[contact-form-7 id="123" title="Formulario de Contacto"]');
                        } else {
                        ?>
                            <form class="custom-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" name="name" placeholder="Ingrese su nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Ingrese su email" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Mensaje</label>
                                    <textarea id="message" name="message" placeholder="Cuéntenos sobre su proyecto" required></textarea>
                                </div>
                                <button type="submit" class="submit-button">Enviar Mensaje</button>
                                <input type="hidden" name="action" value="submit_contact_form">
                                <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="contact-info">
                    <div class="info-card">
                        <h3>Información de Contacto</h3>
                        <div class="info-details">
                            <div class="info-item">
                                <h4>Dirección</h4>
                                <p><?php echo get_theme_mod('company_address', 'Av. Tecnológica 123, Ciudad Innovación'); ?></p>
                            </div>
                            <div class="info-item">
                                <h4>Email</h4>
                                <p><?php echo get_theme_mod('company_email', 'info@transporttech.com'); ?></p>
                            </div>
                            <div class="info-item">
                                <h4>Teléfono</h4>
                                <p><?php echo get_theme_mod('company_phone', '+1 (555) 123-4567'); ?></p>
                            </div>
                            <div class="info-item">
                                <h4>Horario de Atención</h4>
                                <p><?php echo get_theme_mod('company_hours', 'Lunes a Viernes: 9:00 AM - 6:00 PM'); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-card">
                        <h3>Síguenos</h3>
                        <div class="social-links">
                            <?php if (get_theme_mod('social_facebook')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="social-link">
                                    <i class="facebook-icon"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if (get_theme_mod('social_instagram')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="social-link">
                                    <i class="instagram-icon"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if (get_theme_mod('social_twitter')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" class="social-link">
                                    <i class="twitter-icon"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if (get_theme_mod('social_linkedin')) : ?>
                                <a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" class="social-link">
                                    <i class="linkedin-icon"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>