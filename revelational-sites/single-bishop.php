<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-5xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
          <!-- Bishop Photo -->
          <div class="md:w-1/3 bg-gray-100">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
            <?php else : ?>
              <div class="h-full flex items-center justify-center p-12 bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>
            <?php endif; ?>
          </div>
          
          <!-- Bishop Info -->
          <div class="md:w-2/3 p-6 md:p-8">
            <h1 class="text-3xl font-bold mb-4" data-aos="fade-up"><?php the_title(); ?></h1>
            
            <?php 
            $diocese = get_post_meta(get_the_ID(), '_bishop_diocese', true);
            if ($diocese) : 
            ?>
              <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                  <?php echo esc_html($diocese); ?>
                </span>
              </div>
            <?php endif; ?>
            
            <div class="prose max-w-none mb-8" data-aos="fade-up" data-aos-delay="200">
              <?php the_content(); ?>
            </div>
            
            <!-- Social Links (if added later) -->
            <div class="mt-6 flex space-x-3" data-aos="fade-up" data-aos-delay="300">
              <!-- These can be connected to custom fields if needed -->
              <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-red-500 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </article>
      
      <!-- Navigation between bishops -->
      <div class="mt-8 flex flex-col sm:flex-row justify-between">
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        ?>
        <div class="mb-4 sm:mb-0">
          <?php if (!empty($prev_post)) : ?>
            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              <?php echo esc_html($prev_post->post_title); ?>
            </a>
          <?php endif; ?>
        </div>
        
        <div class="text-center">
          <a href="<?php echo get_post_type_archive_link('bishop'); ?>" class="inline-flex items-center text-gray-600 hover:text-blue-600 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <?php _e('View All Bishops', 'revelational-sites'); ?>
          </a>
        </div>
        
        <div class="mt-4 sm:mt-0 text-right">
          <?php if (!empty($next_post)) : ?>
            <a href="<?php echo get_permalink($next_post->ID); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition duration-300">
              <?php echo esc_html($next_post->post_title); ?>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </div>
    
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
