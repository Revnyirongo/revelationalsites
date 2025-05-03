<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>
  <?php wp_body_open(); ?>
  
  <!-- Top Bar -->
  <div class="bg-gray-800 text-white text-sm">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center p-2">
      <div class="flex flex-col md:flex-row items-center mb-2 md:mb-0">
        <span class="mb-1 md:mb-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span>Email: <a href="mailto:info@revelation.africa" class="underline hover:text-blue-300 transition duration-300">info@revelation.africa</a></span>
        </span>
        <span class="md:ml-4 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
          <span class="marquee-container relative overflow-hidden">
            <span class="marquee-content inline-block animate-marquee">
              📢 Latest: <a href="#" class="underline hover:text-blue-300 transition duration-300">Welcome to Revelational Sites!</a>
            </span>
          </span>
        </span>
      </div>
      <div class="flex space-x-3">
        <a href="#" class="hover:text-blue-300 transition duration-300" aria-label="Facebook">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
          </svg>
        </a>
        <a href="#" class="hover:text-blue-300 transition duration-300" aria-label="Twitter">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
          </svg>
        </a>
        <a href="#" class="hover:text-blue-300 transition duration-300" aria-label="YouTube">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
          </svg>
        </a>
      </div>
    </div>
  </div>

  <!-- Logo and Main Navigation -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between items-center py-4">
        <!-- Logo -->
        <div class="flex items-center mb-4 md:mb-0">
          <?php if (has_custom_logo()) : ?>
            <div class="mr-3">
              <?php the_custom_logo(); ?>
            </div>
          <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold text-blue-700 hover:text-blue-800 transition duration-300">
              <?php bloginfo('name'); ?>
            </a>
          <?php endif; ?>
          
          <button id="mobile-menu-toggle" class="md:hidden ml-4 p-2 rounded text-gray-600 hover:text-blue-600 hover:bg-gray-100 focus:outline-none transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        
        <!-- Navigation -->
        <nav id="primary-menu" class="hidden md:flex items-center space-x-6">
          <?php
          if (has_nav_menu('primary')) {
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'flex flex-col md:flex-row md:space-x-6',
              'fallback_cb' => false,
              'depth' => 2,
            ));
          } else {
            // Fallback menu
            ?>
            <ul class="flex flex-col md:flex-row md:space-x-6">
              <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Home', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('About', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_post_type_archive_link('bishop')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Bishops', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Events', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('news'))); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('News', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Contact', 'revelational-sites'); ?></a></li>
            </ul>
            <?php
          }
          ?>
          
          <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="bg-red-600 text-white px-5 py-2 rounded hover:bg-red-700 transition duration-300 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <?php _e('Donate Now', 'revelational-sites'); ?>
          </a>
        </nav>
      </div>
      
      <!-- Mobile Menu (hidden by default) -->
      <div id="mobile-menu" class="md:hidden hidden py-4 border-t">
        <?php
        if (has_nav_menu('primary')) {
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'flex flex-col space-y-3',
            'fallback_cb' => false,
            'depth' => 2,
          ));
        } else {
          // Fallback menu
          ?>
          <ul class="flex flex-col space-y-3">
            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Home', 'revelational-sites'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('About', 'revelational-sites'); ?></a></li>
            <li><a href="<?php echo esc_url(get_post_type_archive_link('bishop')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Bishops', 'revelational-sites'); ?></a></li>
            <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Events', 'revelational-sites'); ?></a></li>
            <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('news'))); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('News', 'revelational-sites'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-gray-800 hover:text-blue-600 font-medium transition duration-300"><?php _e('Contact', 'revelational-sites'); ?></a></li>
          </ul>
          <?php
        }
        ?>
        
        <div class="mt-6">
          <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="block bg-red-600 text-white px-4 py-2 rounded text-center hover:bg-red-700 transition duration-300">
            <?php _e('Donate Now', 'revelational-sites'); ?>
          </a>
        </div>
      </div>
    </div>
  </header>
  
  <?php if (!is_front_page() && !is_home()) : ?>
    <!-- Page Title Banner -->
    <div class="bg-gray-800 text-white py-12">
      <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold">
          <?php
          if (is_archive()) {
            the_archive_title();
          } elseif (is_search()) {
            printf(__('Search Results for: %s', 'revelational-sites'), '<span>' . get_search_query() . '</span>');
          } elseif (is_404()) {
            _e('Page Not Found', 'revelational-sites');
          } else {
            the_title();
          }
          ?>
        </h1>
        
        <?php if (function_exists('yoast_breadcrumb')) : ?>
          <div class="mt-3 text-gray-300">
            <?php yoast_breadcrumb(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
