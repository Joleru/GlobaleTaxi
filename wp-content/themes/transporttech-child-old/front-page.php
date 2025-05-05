<?php
/**
 * Front Page Template
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Hero Section
    get_template_part('template-parts/sections/hero');
    
    // Services Section
    get_template_part('template-parts/sections/services');
    
    // Projects Section
    get_template_part('template-parts/sections/projects');
    
    // Blog Section
    get_template_part('template-parts/sections/blog');
    
    // About Section
    get_template_part('template-parts/sections/about');
    
    // Contact Section
    get_template_part('template-parts/sections/contact');
    ?>

</main><!-- #primary -->

<?php
get_footer();