/**
 * Revelational Sites Theme JavaScript
 * Enhanced version with more robust component initializations
 */

(function($) {
  'use strict';
  
  // Document ready function - executed when DOM is fully loaded
  $(document).ready(function() {
    // Initialize marquee animation for news ticker
    initNewsMarquee();
    
    // Handle mobile menu toggle
    handleMobileMenu();
    
    // Initialize sliders
    initSliders();
    
    // Back to top button functionality
    initBackToTop();
    
    // Initialize the Facebook SDK if needed
    if ($('.fb-page').length) {
      initFacebookSDK();
    }
  });

  // Window load function - executed when all resources are loaded
  $(window).on('load', function() {
    // Re-parse Facebook plugins after page is loaded
    if (typeof FB !== 'undefined') {
      FB.XFBML.parse();
    }
  });
  
  /**
   * Initialize news marquee animation
   * Checks if content is longer than container before animating
   */
  function initNewsMarquee() {
    const marqueeContent = $('.marquee-content');
    const marqueeContainer = $('.marquee-container');
    
    if (marqueeContent.length && marqueeContainer.length) {
      // Wait for content to be fully loaded to measure accurately
      setTimeout(function() {
        if (marqueeContent.width() > marqueeContainer.width()) {
          // Only animate if content is longer than container
          marqueeContent.addClass('animate-marquee');
        }
      }, 100);
    }
  }
  
  /**
   * Handle mobile menu toggle with proper animation
   */
  function handleMobileMenu() {
    const mobileMenuToggle = $('#mobile-menu-toggle');
    const mobileMenu = $('#mobile-menu');
    const primaryMenu = $('#primary-menu');
    
    if (mobileMenuToggle.length && mobileMenu.length) {
      mobileMenuToggle.on('click', function() {
        mobileMenu.toggleClass('hidden');
        
        // Use proper icon for the menu toggle state
        const menuHidden = mobileMenu.hasClass('hidden');
        
        if (menuHidden) {
          $(this).html('<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>');
        } else {
          $(this).html('<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>');
        }
      });
      
      // Close mobile menu on window resize (e.g., when switching to desktop)
      $(window).on('resize', function() {
        if ($(window).width() >= 768) { // md breakpoint in Tailwind
          mobileMenu.addClass('hidden');
          primaryMenu.removeClass('hidden');
          mobileMenuToggle.html('<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>');
        }
      });
    }
  }
  
  /**
   * Initialize all sliders using Swiper.js
   */
  function initSliders() {
    // Frontpage Hero Slider
    if ($('.frontpage-slider').length) {
      new Swiper('.frontpage-slider', {
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        // Responsive breakpoints
        breakpoints: {
          // when window width is >= 768px
          768: {
            // Keep default settings
          }
        },
        // Improve accessibility
        a11y: {
          prevSlideMessage: 'Previous slide',
          nextSlideMessage: 'Next slide',
          firstSlideMessage: 'This is the first slide',
          lastSlideMessage: 'This is the last slide',
        }
      });
    }
    
    // Testimonials slider
    if ($('.testimonials-slider').length) {
      new Swiper('.testimonials-slider', {
        loop: true,
        autoplay: {
          delay: 6000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 30,
        breakpoints: {
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      });
    }
  }
  
  /**
   * Initialize back to top button functionality
   */
  function initBackToTop() {
    const backToTopButton = $('#back-to-top');
    
    if (backToTopButton.length) {
      // Initial state - hide button
      backToTopButton.addClass('scale-0');
      
      // Show/hide button based on scroll position
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
          backToTopButton.removeClass('scale-0').addClass('scale-100');
        } else {
          backToTopButton.removeClass('scale-100').addClass('scale-0');
        }
      });
      
      // Smooth scroll to top when clicked
      backToTopButton.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 500);
        return false;
      });
    }
  }
  
  /**
   * Initialize Facebook SDK for the embedded feed
   */
  function initFacebookSDK() {
    // Facebook SDK will be loaded via wp_enqueue_script in functions.php
    
    // Handle post-load parsing if needed
    if (typeof FB !== 'undefined') {
      FB.XFBML.parse();
    }
  }
  
  /**
   * Add active class to current menu item 
   */
  function highlightCurrentMenuItem() {
    // Get current URL path
    const currentPath = window.location.pathname;
    
    // Find menu items
    $('nav a').each(function() {
      const linkPath = $(this).attr('href');
      
      // Check if the link matches the current path
      if (linkPath === currentPath || (currentPath.includes(linkPath) && linkPath !== '/')) {
        $(this).addClass('text-blue-600').removeClass('text-gray-800');
      }
    });
  }

})(jQuery);
