<?php get_header(); ?>

<main class="container mx-auto px-4 py-16">
  <div class="max-w-xl mx-auto text-center">
    <div class="mb-8">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </div>
    
    <h1 class="text-4xl md:text-5xl font-bold mb-4">404</h1>
    <h2 class="text-2xl font-semibold mb-6"><?php _e('Page Not Found', 'revelational-sites'); ?></h2>
    
    <p class="text-gray-600 mb-8 text-lg">
      <?php _e('The page you are looking for doesn\'t exist or has been moved.', 'revelational-sites'); ?>
    </p>
    
    <div class="mb-12">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
        <?php _e('Back to Home', 'revelational-sites'); ?>
      </a>
    </div>
    
    <div class="mt-12">
      <h3 class="text-lg font-semibold mb-4"><?php _e('You might want to check:', 'revelational-sites'); ?></h3>
      <ul class="space-y-2">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300"><?php _e('Home Page', 'revelational-sites'); ?></a></li>
        <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300"><?php _e('Events', 'revelational-sites'); ?></a></li>
        <li><a href="<?php echo esc_url(get_post_type_archive_link('bishop')); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300"><?php _e('Bishops', 'revelational-sites'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-blue-600 hover:text-blue-800 transition duration-300"><?php _e('About Us', 'revelational-sites'); ?></a></li>
      </ul>
    </div>
  </div>
</main>

<?php get_footer(); ?>
