<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-6xl mx-auto">
    <header class="mb-12 text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
        <?php _e('Our Bishops', 'revelational-sites'); ?>
      </h1>
      <div class="w-24 h-1 bg-red-600 mx-auto mb-8"></div>
      <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        <?php _e('Meet our dedicated leadership serving the Catholic community with wisdom, faith, and commitment to the Gospel message.', 'revelational-sites'); ?>
      </p>
    </header>
    
    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php 
        $counter = 0;
        while (have_posts()) : the_post();
          $diocese = get_post_meta(get_the_ID(), '_bishop_diocese', true);
          $animation_delay = $counter * 100;
        ?>
          <div class="bishop-card text-center" data-aos="fade-up" data-aos-delay="<?php echo $animation_delay; ?>">
            <div class="relative overflow-hidden group rounded-lg shadow-md mb-4">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('bishop-thumbnail', array('class' => 'w-full h-auto transition-transform duration-300 group-hover:scale-110')); ?>
                </a>
              <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="block bg-gray-200 h-96 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                </a>
              <?php endif; ?>
              <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
              <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <a href="<?php the_permalink(); ?>" class="text-white hover:underline">
                  <?php _e('View Profile', 'revelational-sites'); ?>
                </a>
              </div>
            </div>
            <h2 class="text-xl font-semibold mb-2">
              <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                <?php the_title(); ?>
              </a>
            </h2>
            <?php if ($diocese) : ?>
              <p class="text-gray-600"><?php echo esc_html($diocese); ?></p>
            <?php endif; ?>
            <div class="mt-3 text-gray-700">
              <?php the_excerpt(); ?>
            </div>
          </div>
        <?php 
          $counter++;
          endwhile;
        ?>
      </div>
      
      <!-- Pagination -->
      <div class="mt-12">
        <?php
        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>',
          'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
          'class' => 'flex justify-center',
        ));
        ?>
      </div>
    <?php else : ?>
      <div class="bg-gray-50 rounded-lg p-12 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h2 class="text-2xl font-bold mb-4"><?php _e('No Bishops Found', 'revelational-sites'); ?></h2>
        <p class="text-gray-600 mb-8"><?php _e('It seems there are no bishop profiles yet. Please check back later.', 'revelational-sites'); ?></p>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
