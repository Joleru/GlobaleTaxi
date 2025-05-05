<?php
/**
 * Custom Functions
 */

// Custom excerpt length
function transport_tech_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'transport_tech_excerpt_length');

// Custom excerpt more
function transport_tech_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'transport_tech_excerpt_more');

// Estimate reading time
function transport_tech_reading_time($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute
    return $reading_time;
}