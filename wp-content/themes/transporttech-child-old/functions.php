<?php
/**
 * Transport Tech Solutions functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('TRANSPORT_TECH_VERSION', '1.0.0');
define('TRANSPORT_TECH_PATH', get_template_directory());
define('TRANSPORT_TECH_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function transport_tech_setup() {
    load_theme_textdomain('transport-tech', TRANSPORT_TECH_PATH . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'transport-tech'),
        'footer'  => esc_html__('Footer Menu', 'transport-tech'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Enqueue editor styles
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'transport_tech_setup');

/**
 * Enqueue scripts and styles
 */
function transport_tech_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'transport-tech-style',
        get_stylesheet_uri(),
        array(),
        TRANSPORT_TECH_VERSION
    );
    
    // Google Fonts
    wp_enqueue_style(
        'transport-tech-fonts',
        'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap',
        array(),
        null
    );
    
    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
        array(),
        '6.0.0'
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'transport-tech-script',
        TRANSPORT_TECH_URI . '/assets/js/main.js',
        array('jquery'),
        TRANSPORT_TECH_VERSION,
        true
    );
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'transport_tech_scripts');

/**
 * Register Custom Post Types
 */
function transport_tech_register_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name'          => esc_html__('Services', 'transport-tech'),
            'singular_name' => esc_html__('Service', 'transport-tech'),
        ),
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => array('slug' => 'services'),
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'   => 'dashicons-admin-tools',
        'show_in_rest' => true,
    ));
    
    // Projects Post Type
    register_post_type('project', array(
        'labels' => array(
            'name'          => esc_html__('Projects', 'transport-tech'),
            'singular_name' => esc_html__('Project', 'transport-tech'),
        ),
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => array('slug' => 'projects'),
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'   => 'dashicons-portfolio',
        'show_in_rest' => true,
    ));
}
add_action('init', 'transport_tech_register_post_types');

/**
 * Register Widget Areas
 */
function transport_tech_widgets_init() {
    // Main Sidebar
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'transport-tech'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'transport-tech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    // Footer Widgets
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget %d', 'transport-tech'), $i),
            'id'            => 'footer-' . $i,
            'description'   => esc_html__('Add widgets here to appear in the footer.', 'transport-tech'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'transport_tech_widgets_init');

/**
 * Customizer Settings
 */
require TRANSPORT_TECH_PATH . '/inc/customizer.php';

/**
 * Custom Functions
 */
require TRANSPORT_TECH_PATH . '/inc/custom-functions.php';