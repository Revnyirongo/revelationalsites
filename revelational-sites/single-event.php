<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-4xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
      $event_date = get_post_meta(get_the_ID(), '_event_date', true);
      $event_location = get_post_meta(get_the_ID(), '_event_location', true);
    ?>
      <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Event Image -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="relative">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto max-h-96 object-cover')); ?>
            <?php if ($event_date) : ?>
              <div class="absolute top-6 left-6 bg-blue-600 text-white rounded-lg px-4 py-2 flex flex-col items-center shadow-lg">
                <span class="text-2xl font-bold"><?php echo date_i18n('d', strtotime($event_date)); ?></span>
                <span class="text-sm uppercase"><?php echo date_i18n('M', strtotime($event_date)); ?></span>
                <span class="text-sm"><?php echo date_i18n('Y', strtotime($event_date)); ?></span>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        
        <!-- Event Content -->
        <div class="p-8">
          <h1 class="text-3xl font-bold mb-4" data-aos="fade-up"><?php the_title(); ?></h1>
          
          <!-- Event Details -->
          <div class="mb-8 flex flex-col md:flex-row md:items-center text-gray-600" data-aos="fade-up" data-aos-delay="100">
            <?php if ($event_date) : ?>
              <div class="flex items-center mb-3 md:mb-0 md:mr-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>
                  <?php 
                  $format = get_option('date_format');
                  echo date_i18n($format, strtotime($event_date)); 
                  ?>
                </span>
              </div>
            <?php endif; ?>
            
            <?php if ($event_location) : ?>
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span><?php echo esc_html($event_location); ?></span>
              </div>
            <?php endif; ?>
          </div>
          
          <!-- Event Content -->
          <div class="prose max-w-none" data-aos="fade-up" data-aos-delay="200">
            <?php the_content(); ?>
          </div>
          
          <!-- Event Share -->
          <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="text-lg font-semibold mb-4"><?php _e('Share This Event', 'revelational-sites'); ?></h3>
            <div class="flex space-x-4">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="text-gray-400 hover:text-blue-600 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </a>
              <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" class="text-gray-400 hover:text-blue-400 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
              <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" class="text-gray-400 hover:text-red-500 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Calendar Integration -->
          <div class="mt-6 flex flex-wrap gap-3">
            <?php
            // Format date for calendar apps
            $event_start = $event_date ? date('Ymd', strtotime($event_date)) : '';
            $event_title = get_the_title();
            $event_details = wp_strip_all_tags(get_the_excerpt());
            $event_location_enc = urlencode($event_location);
            
            // Google Calendar
            $google_url = "https://calendar.google.com/calendar/render?action=TEMPLATE&text=" . urlencode($event_title) . "&dates=" . $event_start . "/" . $event_start . "&details=" . urlencode($event_details) . "&location=" . $event_location_enc;
            
            // iCal format (simplified)
            $ical_url = "#";  // Would need server-side generation for actual .ics file
            ?>
            
            <a href="<?php echo esc_url($google_url); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center bg-blue-100 text-blue-800 px-4 py-2 rounded hover:bg-blue-200 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <?php _e('Add to Google Calendar', 'revelational-sites'); ?>
            </a>
            
            <a href="<?php echo esc_url($ical_url); ?>" class="inline-flex items-center bg-gray-100 text-gray-800 px-4 py-2 rounded hover:bg-gray-200 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <?php _e('Download iCal', 'revelational-sites'); ?>
            </a>
          </div>
        </div>
      </article>
      
      <!-- Navigation between events -->
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
          <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-flex items-center text-gray-600 hover:text-blue-600 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <?php _e('View All Events', 'revelational-sites'); ?>
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
      
      <!-- Related Events -->
      <?php
      // Get future events
      $related_events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'meta_key' => '_event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => '_event_date',
            'value' => date('Y-m-d'),
            'compare' => '>=',
            'type' => 'DATE'
          )
        )
      ));
      
      if ($related_events->have_posts()) :
      ?>
        <div class="mt-16">
          <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">
            <?php _e('Upcoming Events', 'revelational-sites'); ?>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while ($related_events->have_posts()) : $related_events->the_post(); 
              $event_date = get_post_meta(get_the_ID(), '_event_date', true);
              $event_location = get_post_meta(get_the_ID(), '_event_location', true);
            ?>
              <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up">
                <?php if (has_post_thumbnail()) : ?>
                  <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                  </a>
                <?php endif; ?>
                
                <div class="p-6">
                  <?php if ($event_date) : ?>
                    <div class="text-sm text-gray-500 mb-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <?php echo date_i18n(get_option('date_format'), strtotime($event_date)); ?>
                    </div>
                  <?php endif; ?>
                  
                  <h3 class="text-lg font-semibold mb-2">
                    <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                      <?php the_title(); ?>
                    </a>
                  </h3>
                  
                  <?php if ($event_location) : ?>
                    <div class="text-sm text-gray-500 mb-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      <?php echo esc_html($event_location); ?>
                    </div>
                  <?php endif; ?>
                  
                  <div class="mt-3">
                    <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center transition duration-300">
                      <?php _e('View Details', 'revelational-sites'); ?>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>
    
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
