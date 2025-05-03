/**
 * Revelational Sites Theme JavaScript
 */

(function($) {
  'use strict';
  
  // On document ready
  $(document).ready(function() {
    // Initialize marquee animation for news ticker
    initNewsMarquee();
    
    // Handle mobile menu toggle
    handleMobileMenu();
    
    // Initialize animations on scroll
    // Note: AOS is initialized in functions.php
    
    // Initialize sliders
    initSliders();
    
    // Back to top button functionality
    initBackToTop();
    
    // Initialize the Facebook SDK
    initFacebookSDK();
  });
  
  /**
   * Initialize news marquee animation
   */
  function initNewsMarquee() {
    const marqueeContent = $('.marquee-content');
    
    if (marqueeContent.length && marqueeContent.width() > $('.marquee-container').width()) {
      // Only animate if content is longer than container
      marqueeContent.addClass('animate-marquee');
    }
  }
  
  /**
   * Handle mobile menu toggle
   */
  function handleMobileMenu() {
    const mobileMenuToggle = $('#mobile-menu-toggle');
    const mobileMenu = $('#mobile-menu');
    const primaryMenu = $('#primary-menu');
    
    mobileMenuToggle.on('click', function() {
      mobileMenu.toggleClass('hidden');
      primaryMenu.toggleClass('hidden');
      
      // Toggle between menu and close icons
      const isClosed = mobileMenu.hasClass('hidden');
      
      if (isClosed) {
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
  
  /**
   * Initialize sliders using Swiper.js
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
      });
    }
    
    // Testimonials slider (if added later)
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
    // Only load if the Facebook container exists
    if ($('.fb-page').length) {
      // Facebook SDK will be loaded in the footer
      
      // Refresh Facebook plugins when page is fully loaded
      $(window).on('load', function() {
        if (typeof FB !== 'undefined') {
          FB.XFBML.parse();
        }
      });
    }
  }
  
})(jQuery);
