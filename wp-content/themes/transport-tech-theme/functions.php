<?php
/** 
 * Funciones y definiciones del tema Transport Tech Solutions
 */

// Configuración inicial del tema
function transport_tech_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    // Registro de menús
    register_nav_menus([
        'primary' => __('Menú Principal', 'transport-tech'),
        'footer-services' => __('Servicios (Pie de página)', 'transport-tech'),
        'footer-company' => __('Empresa (Pie de página)', 'transport-tech'),
        'footer-legal' => __('Legal (Pie de página)', 'transport-tech'),
    ]);
}
add_action('after_setup_theme', 'transport_tech_setup');

// Cargar scripts y estilos
function transport_tech_scripts() {
    wp_enqueue_style('transport-tech-style', get_stylesheet_uri(), [], '1.0.0');
    wp_enqueue_style('transport-tech-custom', get_template_directory_uri() . '/assets/css/custom.css', [], '1.0.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

    wp_enqueue_script('transport-tech-navigation', get_template_directory_uri() . '/assets/js/navigation.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('transport-tech-custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'transport_tech_scripts');

// Registro de tipos de contenido personalizados
function transport_tech_register_post_types() {
    // Servicios
    register_post_type('service', [
        'labels' => [
            'name' => __('Servicios', 'transport-tech'),
            'singular_name' => __('Servicio', 'transport-tech'),
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-clipboard',
        'rewrite' => ['slug' => 'servicios'],
    ]);

    // Proyectos
    register_post_type('project', [
        'labels' => [
            'name' => __('Proyectos', 'transport-tech'),
            'singular_name' => __('Proyecto', 'transport-tech'),
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => ['slug' => 'proyectos'],
    ]);
}
add_action('init', 'transport_tech_register_post_types');

// Procesar formulario de contacto
function transport_tech_process_contact_form() {
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_die('Error de seguridad');
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    $to = get_option('admin_email');
    $subject = 'Nuevo mensaje de contacto de ' . $name;
    $body = "Nombre: $name\nEmail: $email\nMensaje:\n$message";
    $headers = ['From: ' . $name . ' <' . $email . '>'];

    wp_mail($to, $subject, $body, $headers);
    wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    exit;
}



define('UPLOADS', 'wp-content/uploads');

add_action('admin_post_submit_contact_form', 'transport_tech_process_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'transport_tech_process_contact_form');