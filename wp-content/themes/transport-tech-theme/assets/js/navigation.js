(function($) {
    'use strict';

    // Variables
    var menuToggle = $('.menu-toggle');
    var mainNavigation = $('.main-navigation');
    var menuIcon = $('.menu-icon');

    // Toggle Mobile Menu
    menuToggle.on('click', function() {
        var isActive = $(this).hasClass('active');
        $(this).toggleClass('active');
        mainNavigation.toggleClass('active');
        $(this).attr('aria-expanded', !isActive);

        // Animate menu icon
        if (!isActive) {
            menuIcon.css('background-color', 'transparent');
            menuIcon.children(':first-child').css({ 'transform': 'rotate(45deg)', 'top': '0' });
            menuIcon.children(':last-child').css({ 'transform': 'rotate(-45deg)', 'bottom': '0' });
        } else {
            menuIcon.css('background-color', '#333');
            menuIcon.children(':first-child').css({ 'transform': 'rotate(0)', 'top': '-8px' });
            menuIcon.children(':last-child').css({ 'transform': 'rotate(0)', 'bottom': '-8px' });
        }
    });

    // Close menu when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.main-navigation, .menu-toggle').length) {
            mainNavigation.removeClass('active');
            menuToggle.removeClass('active').attr('aria-expanded', 'false');
            menuIcon.css('background-color', '#333');
            menuIcon.children(':first-child').css({ 'transform': 'rotate(0)', 'top': '-8px' });
            menuIcon.children(':last-child').css({ 'transform': 'rotate(0)', 'bottom': '-8px' });
        }
    });

    // Smooth scroll for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function(event) {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
            location.hostname === this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            if (target.length) {
                $('html, body').animate({ scrollTop: target.offset().top - 80 }, 800);

                // Close mobile menu after clicking
                mainNavigation.removeClass('active');
                menuToggle.removeClass('active').attr('aria-expanded', 'false');
                event.preventDefault();
            }
        }
    });

    // Highlight menu items on scroll
    $(window).on('scroll', function() {
        var scrollPosition = $(window).scrollTop();
        $('section[id]').each(function() {
            var sectionTop = $(this).offset().top - 100;
            var sectionBottom = sectionTop + $(this).outerHeight();

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                var currentId = $(this).attr('id');
                $('nav a').removeClass('active');
                $('nav a[href="#' + currentId + '"]').addClass('active');
            }
        });
    });

})(jQuery);