/**
 * Navigation and Mobile Menu Functionality
 * 
 * Handles:
 * - Mobile menu toggle
 * - Smooth scrolling
 * - Active menu item highlighting
 */

(function($) {
    'use strict';
    
    // Cache DOM elements
    const $body = $('body');
    const $menuToggle = $('.menu-toggle');
    const $mainNavigation = $('.main-navigation');
    const $menuIcon = $('.menu-icon');
    const $menuLinks = $('.main-navigation a');
    const $sections = $('section[id]');
    
    // Mobile Menu Toggle
    function toggleMobileMenu() {
        $menuToggle.toggleClass('active');
        $mainNavigation.toggleClass('active');
        $body.toggleClass('menu-open');
        
        // Toggle menu icon animation
        if ($menuToggle.hasClass('active')) {
            $menuIcon.css('background-color', 'transparent');
            $menuIcon.find(':before, :after').css({
                'transform': 'rotate(45deg)',
                'top': '0',
                'bottom': '0'
            });
        } else {
            $menuIcon.css('background-color', '');
            $menuIcon.find(':before, :after').css({
                'transform': 'rotate(0)',
                'top': '-8px',
                'bottom': '-8px'
            });
        }
    }
    
    // Close Mobile Menu
    function closeMobileMenu() {
        $menuToggle.removeClass('active');
        $mainNavigation.removeClass('active');
        $body.removeClass('menu-open');
        $menuIcon.css('background-color', '');
        $menuIcon.find(':before, :after').css({
            'transform': 'rotate(0)',
            'top': '-8px',
            'bottom': '-8px'
        });
    }
    
    // Smooth Scroll to Section
    function smoothScroll(target) {
        const $target = $(target);
        if ($target.length) {
            $('html, body').animate({
                scrollTop: $target.offset().top - 80
            }, 800);
            
            // Close mobile menu if open
            if ($mainNavigation.hasClass('active')) {
                closeMobileMenu();
            }
            
            // Update URL without page jump
            if (history.pushState) {
                history.pushState(null, null, target);
            } else {
                window.location.hash = target;
            }
        }
    }
    
    // Highlight Active Menu Item
    function highlightActiveMenuItem() {
        const scrollPosition = $(window).scrollTop();
        
        $sections.each(function() {
            const $section = $(this);
            const sectionTop = $section.offset().top - 100;
            const sectionBottom = sectionTop + $section.outerHeight();
            const sectionId = $section.attr('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                $menuLinks.removeClass('active');
                $(`.main-navigation a[href="#${sectionId}"]`).addClass('active');
            }
        });
    }
    
    // Event Listeners
    $menuToggle.on('click', toggleMobileMenu);
    
    // Close menu when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.main-navigation, .menu-toggle').length) {
            closeMobileMenu();
        }
    });
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = this.hash;
        smoothScroll(target);
    });
    
    // Highlight active menu item on scroll
    $(window).on('scroll', highlightActiveMenuItem);
    
    // Initialize
    highlightActiveMenuItem();
    
})(jQuery);