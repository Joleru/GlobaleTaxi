<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e('Skip to content', 'transport-tech'); ?>
</a>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                printf(
                    '<h1 class="site-title"><a href="%s" rel="home">%s</a></h1>',
                    esc_url(home_url('/')),
                    esc_html(get_bloginfo('name'))
                );
            }
            ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="bar"></span>
                <span class="screen-reader-text">
                    <?php esc_html_e('Primary Menu', 'transport-tech'); ?>
                </span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'     => false,
                'depth'         => 2,
            ));
            ?>
        </nav><!-- #site-navigation -->
    </div><!-- .container -->
</header><!-- #masthead -->

<div id="content" class="site-content">