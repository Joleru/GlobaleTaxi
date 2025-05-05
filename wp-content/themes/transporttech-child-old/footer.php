</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <?php
            // Display footer widgets
            for ($i = 1; $i <= 4; $i++) {
                if (is_active_sidebar('footer-' . $i)) {
                    echo '<div class="footer-widget-area">';
                    dynamic_sidebar('footer-' . $i);
                    echo '</div>';
                }
            }
            ?>
        </div><!-- .footer-widgets -->

        <div class="footer-bottom">
            <div class="site-info">
                <?php
                printf(
                    '<p class="copyright">%1$s %2$s %3$s</p>',
                    '&copy;',
                    date('Y'),
                    esc_html(get_bloginfo('name'))
                );
                ?>
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                ));
                ?>
            </div><!-- .site-info -->
        </div><!-- .footer-bottom -->
    </div><!-- .container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>