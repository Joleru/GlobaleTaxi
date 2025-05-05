(function($) {
    'use strict';
    
    // Toggle mobile menu
    $('.menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('active');
        
        if ($(this).hasClass('active')) {
            $('.menu-icon').css('background-color', 'transparent');
            $('.menu-icon:before').css({
                'transform': 'rotate(45deg)',
                'top': '0'
            });
            $('.menu-icon:after').css({
                'transform': 'rotate(-45deg)',
                'bottom': '0'
            });
        } else {
            $('.menu-icon').css('background-color', '#333');
            $('.menu-icon:before').css({
                'transform': 'rotate(0)',
                'top': '-8px'
            });
            $('.menu-icon:after').css({
                'transform': 'rotate(0)',
                'bottom': '-8px'
            });
        }
    });
    
    // Close menu when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.main-navigation, .menu-toggle').length) {
            $('.main-navigation').removeClass('active');
            $('.menu-toggle').removeClass('active');
            $('.menu-icon').css('background-color', '#333');
            $('.menu-icon:before').css({
                'transform': 'rotate(0)',
                'top': '-8px'
            });
            $('.menu-icon:after').css({
                'transform': 'rotate(0)',
                'bottom': '-8px'
            });
        }
    });
    
    // Smooth scroll for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
                
                // Close mobile menu after clicking
                $('.main-navigation').removeClass('active');
                $('.menu-toggle').removeClass('active');
                
                return false;
            }
        }
    });
    
    // Add active class to menu items on scroll
    $(window).on('scroll', function() {
        var scrollPosition = $(window).scrollTop();
        
        $('section[id]').each(function() {
            var currentSection = $(this);
            var sectionTop = currentSection.offset().top - 100;
            var sectionBottom = sectionTop + currentSection.outerHeight();
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                var currentId = currentSection.attr('id');
                $('nav a').removeClass('active');
                $('nav a[href="#' + currentId + '"]').addClass('active');
            }
        });
    });
    
})(jQuery);