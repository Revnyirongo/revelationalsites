<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-6xl mx-auto">
    <header class="mb-12">
      <h1 class="text-3xl font-bold mb-4">
        <?php printf(__('Search Results for: %s', 'revelational-sites'), '<span class="text-blue-600">' . get_search_query() . '</span>'); ?>
      </h1>
      <div class="w-24 h-1 bg-red-600 mb-6"></div>
    </header>
    
    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while (have_posts()) : the_post(); ?>
          <article class="bg-white rounded-lg shadow-md overflow-hidden">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
              </a>
            <?php endif; ?>
            
            <div class="p-6">
              <div class="text-sm text-gray-500 mb-2"><?php the_time('F j, Y'); ?></div>
              <h2 class="text-xl font-semibold mb-3">
                <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                  <?php the_title(); ?>
                </a>
              </h2>
              <div class="text-gray-600 mb-4"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center transition duration-300">
                <?php _e('Read More', 'revelational-sites'); ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      
      <!-- Pagination -->
      <div class="mt-12">
        <?php
        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>',
          'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
        ));
        ?>
      </div>
    <?php else : ?>
      <div class="bg-gray-50 rounded-lg p-12 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <h2 class="text-2xl font-bold mb-4"><?php _e('No Results Found', 'revelational-sites'); ?></h2>
        <p class="text-gray-600 mb-8"><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'revelational-sites'); ?></p>
        
        <div class="max-w-md mx-auto">
          <?php get_search_form(); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
