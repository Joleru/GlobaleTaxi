<footer class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget">
                <div class="footer-branding">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <h2 class="footer-title"><?php bloginfo('name'); ?></h2>
                    <?php endif; ?>
                </div>
                <p class="footer-description">
                    <?php echo get_theme_mod('footer_description', 'Transformando el sector transporte con soluciones tecnológicas innovadoras desde 2013.'); ?>
                </p>
            </div>
            
            <div class="footer-widget">
                <h3 class="widget-title">Servicios</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-services',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                    'depth' => 1,
                ));
                ?>
            </div>
            
            <div class="footer-widget">
                <h3 class="widget-title">Empresa</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-company',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                    'depth' => 1,
                ));
                ?>
            </div>
            
            <div class="footer-widget">
                <h3 class="widget-title">Legal</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-legal',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                    'depth' => 1,
                ));
                ?>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>