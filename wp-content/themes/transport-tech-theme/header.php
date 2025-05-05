<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/image.png'); ?>" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?> </a></h1>
            <?php endif; ?>
        </div>

        <button class="menu-toggle" aria-label="Abrir menú">
            <span class="menu-icon"></span>
        </button>

        <nav class="main-navigation" aria-label="Menú Principal">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
            )); 
            ?>
        </nav>
    </div>
</header>