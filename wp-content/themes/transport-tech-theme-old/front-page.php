<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Soluciones de Software para el Sector Transporte</h1>
                <p>Desarrollamos tecnología innovadora que transforma la logística y el transporte para empresas de todos los tamaños.</p>
                <div class="hero-buttons">
                    <a href="#contact" class="button primary-button">Contáctanos</a>
                    <a href="#services" class="button secondary-button">Nuestros Servicios</a>
                </div>
            </div>
            <div class="hero-image">
                <?php 
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder.jpg" alt="Hero Image">';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Servicios</span>
                <h2>Soluciones Tecnológicas para el Transporte</h2>
                <p>Ofrecemos una amplia gama de servicios de desarrollo de software especializados para el sector transporte.</p>
            </div>
            
            <div class="services-grid">
                <?php
                // Custom query for services
                $services_args = array(
                    'post_type' => 'service',  // Assuming you created a custom post type for services
                    'posts_per_page' => 6,
                );
                
                $services_query = new WP_Query($services_args);
                
                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post();
                ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <?php 
                            // Get service icon (assuming you have a custom field for this)
                            $icon = get_post_meta(get_the_ID(), 'service_icon', true);
                            if ($icon) {
                                echo $icon;
                            } else {
                                echo '<i class="default-icon"></i>';
                            }
                            ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <div class="service-description">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- Fallback content if no services are found -->
                    <div class="service-card">
                        <div class="service-icon"><i class="truck-icon"></i></div>
                        <h3>Gestión de Flotas</h3>
                        <div class="service-description">
                            <p>Sistemas inteligentes para monitoreo y administración de flotas de vehículos en tiempo real.</p>
                        </div>
                    </div>
                    <!-- Add more fallback service cards as needed -->
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
                <p>Descubra cómo hemos ayudado a empresas de transporte a transformar sus operaciones.</p>
            </div>
            
            <div class="projects-grid">
                <?php
                // Custom query for projects
                $projects_args = array(
                    'post_type' => 'project',  // Assuming you created a custom post type for projects
                    'posts_per_page' => 2,
                );
                
                $projects_query = new WP_Query($projects_args);
                
                if ($projects_query->have_posts()) :
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                ?>
                    <div class="project-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-image">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="project-content">
                            <h3><?php the_title(); ?></h3>
                            <div class="project-description">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">Ver caso de estudio</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Blog</span>
                <h2>Últimas Publicaciones</h2>
                <p>Manténgase actualizado con las últimas tendencias y noticias del sector transporte y tecnología.</p>
            </div>
            
            <div class="blog-grid">
                <?php
                // Query for recent blog posts
                $blog_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                
                $blog_query = new WP_Query($blog_args);
                
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>
                    <article class="blog-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="blog-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="blog-meta">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <span class="separator">•</span>
                                <span class="read-time"><?php echo estimate_reading_time(get_the_content()); ?> min de lectura</span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">Leer más</a>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            
            <div class="view-all">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button outline-button">
                    Ver todas las publicaciones
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <span class="section-tag">Nosotros</span>
                    <h2>Expertos en Tecnología para el Transporte</h2>
                    <p>Con más de 10 años de experiencia, somos líderes en el desarrollo de soluciones tecnológicas para el sector transporte.</p>
                    
                    <div class="about-features">
                        <div class="feature">
                            <div class="feature-icon"><i class="check-icon"></i></div>
                            <div class="feature-content">
                                <h3>Equipo Especializado</h3>
                                <p>Nuestro equipo combina experiencia en desarrollo de software con conocimiento profundo del sector transporte.</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon"><i class="check-icon"></i></div>
                            <div class="feature-content">
                                <h3>Enfoque en Resultados</h3>
                                <p>Nos centramos en crear soluciones que generen un impacto real y medible en su negocio.</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon"><i class="check-icon"></i></div>
                            <div class="feature-content">
                                <h3>Innovación Constante</h3>
                                <p>Invertimos continuamente en investigación y desarrollo para ofrecer las soluciones más avanzadas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <?php 
                    // Get about image from theme options or custom field
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) {
                        echo '<img src="' . esc_url($about_image) . '" alt="Nuestro equipo">';
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/assets/images/team-placeholder.jpg" alt="Nuestro equipo">';
                    }
                    ?>
                </div>
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