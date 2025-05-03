<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-6xl mx-auto">
    <header class="mb-12 text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
        <?php _e('Upcoming Events', 'revelational-sites'); ?>
      </h1>
      <div class="w-24 h-1 bg-red-600 mx-auto mb-8"></div>
      <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        <?php _e('Join us for these upcoming gatherings, celebrations, and community events to strengthen our faith and fellowship.', 'revelational-sites'); ?>
      </p>
    </header>
    
    <?php 
    // Get today's date
    $today = date('Y-m-d');
    
    // Setup query for future events
    $future_events = new WP_Query(array(
      'post_type' => 'event',
      'posts_per_page' => -1,
      'meta_key' => '_event_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => '_event_date',
          'value' => $today,
          'compare' => '>=',
          'type' => 'DATE'
        )
      )
    ));
    
    if ($future_events->have_posts()) : 
    ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <?php 
        $counter = 0;
        while ($future_events->have_posts()) : $future_events->the_post();
          $event_date = get_post_meta(get_the_ID(), '_event_date', true);
          $event_location = get_post_meta(get_the_ID(), '_event_location', true);
          $animation_delay = $counter * 100;
        ?>
          <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="<?php echo $animation_delay; ?>">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
              </a>
            <?php endif; ?>
            
            <div class="p-6">
              <?php if ($event_date) : ?>
                <div class="flex items-center mb-3">
                  <div class="bg-blue-600 text-white rounded-lg p-2 mr-3 text-center w-14">
                    <span class="block text-xl font-bold"><?php echo date_i18n('d', strtotime($event_date)); ?></span>
                    <span class="block text-xs uppercase"><?php echo date_i18n('M', strtotime($event_date)); ?></span>
                  </div>
                  <h2 class="text-xl font-semibold">
                    <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                      <?php the_title(); ?>
                    </a>
                  </h2>
                </div>
              <?php else : ?>
                <h2 class="text-xl font-semibold mb-3">
                  <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                    <?php the_title(); ?>
                  </a>
                </h2>
              <?php endif; ?>
              
              <?php if ($event_location) : ?>
                <div class="text-gray-600 mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <?php echo esc_html($event_location); ?>
                </div>
              <?php endif; ?>
              
              <div class="text-gray-600 mb-4"><?php the_excerpt(); ?></div>
              
              <a href="<?php the_permalink(); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition duration-300">
                <?php _e('Event Details', 'revelational-sites'); ?>
              </a>
            </div>
          </div>
        <?php 
          $counter++;
          endwhile; 
          wp_reset_postdata();
        ?>
      </div>
    <?php else : ?>
      <div class="bg-gray-50 rounded-lg p-12 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h2 class="text-2xl font-bold mb-4"><?php _e('No Upcoming Events', 'revelational-sites'); ?></h2>
        <p class="text-gray-600 mb-8"><?php _e('There are no upcoming events scheduled at the moment. Please check back later for future events.', 'revelational-sites'); ?></p>
      </div>
    <?php endif; ?>
    
    <!-- Past Events Section -->
    <div class="mt-16">
      <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
        <?php _e('Past Events', 'revelational-sites'); ?>
      </h2>
      
      <?php
      // Setup query for past events
      $past_events = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => 6,
        'meta_key' => '_event_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'meta_query' => array(
          array(
            'key' => '_event_date',
            'value' => $today,
            'compare' => '<',
            'type' => 'DATE'
          )
        )
      ));
      
      if ($past_events->have_posts()) : 
      ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <?php while ($past_events->have_posts()) : $past_events->the_post();
            $event_date = get_post_meta(get_the_ID(), '_event_date', true);
            $event_location = get_post_meta(get_the_ID(), '_event_location', true);
          ?>
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up">
              <?php if (has_post_thumbnail()) : ?>
                <div class="w-1/3 hidden md:block">
                  <a href="<?php the_permalink(); ?>" class="block h-full">
                    <?php the_post_thumbnail('thumbnail', array('class' => 'w-full h-full object-cover')); ?>
                  </a>
                </div>
              <?php endif; ?>
              
              <div class="md:w-2/3 w-full p-5">
                <div class="text-sm text-gray-500 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <?php echo date_i18n(get_option('date_format'), strtotime($event_date)); ?>
                </div>
                
                <h3 class="text-lg font-semibold mb-2">
                  <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                    <?php the_title(); ?>
                  </a>
                </h3>
                
                <?php if ($event_location) : ?>
                  <div class="text-sm text-gray-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <?php echo esc_html($event_location); ?>
                  </div>
                <?php endif; ?>
                
                <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-semibold inline-flex items-center transition duration-300">
                  <?php _e('View Event Recap', 'revelational-sites'); ?>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        
        <?php if ($past_events->max_num_pages > 1) : ?>
          <div class="text-center mt-8">
            <a href="<?php echo esc_url(add_query_arg('event_archive', 'past', get_post_type_archive_link('event'))); ?>" class="inline-block border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-3 rounded transition duration-300">
              <?php _e('View All Past Events', 'revelational-sites'); ?>
            </a>
          </div>
        <?php endif; ?>
      <?php else : ?>
        <div class="bg-gray-50 rounded-lg p-8 text-center">
          <p class="text-gray-600">
            <?php _e('No past events available.', 'revelational-sites'); ?>
          </p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
