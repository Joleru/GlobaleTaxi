<?php
/**
 * Hero Section Template
 */

$hero_title = get_theme_mod('hero_title', __('Transportation Technology Solutions', 'transport-tech'));
$hero_description = get_theme_mod('hero_description', __('Innovative software solutions for the transportation industry', 'transport-tech'));
$hero_primary_btn = get_theme_mod('hero_primary_btn', __('Get Started', 'transport-tech'));
$hero_secondary_btn = get_theme_mod('hero_secondary_btn', __('Learn More', 'transport-tech'));
$hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/hero-default.jpg');
?>

<section class="hero-section">
    <div class="container">
        <div class="hero-container">
            <div class="hero-content">
                <?php if ($hero_title) : ?>
                    <h1><?php echo esc_html($hero_title); ?></h1>
                <?php endif; ?>
                
                <?php if ($hero_description) : ?>
                    <p><?php echo esc_html($hero_description); ?></p>
                <?php endif; ?>
                
                <div class="hero-buttons">
                    <a href="#contact" class="button primary-button">
                        <?php echo esc_html($hero_primary_btn); ?>
                    </a>
                    <a href="#services" class="button secondary-button">
                        <?php echo esc_html($hero_secondary_btn); ?>
                    </a>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Hero Image', 'transport-tech'); ?>">
            </div>
        </div>
    </div>
</section>