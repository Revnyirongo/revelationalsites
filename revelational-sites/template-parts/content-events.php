<?php
/**
 * Template part for displaying the events timeline
 */

// Get upcoming events
$events = revelational_get_upcoming_events($args['count'] ?? 4);

if ($events->have_posts()) :
?>
<div class="relative events-timeline">
    <!-- Timeline line -->
    <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-gray-300 transform -translate-x-1/2"></div>
    
    <div class="space-y-12">
        <?php 
        $counter = 0;
        while ($events->have_posts()) : $events->the_post();
            $event_date = get_post_meta(get_the_ID(), '_event_date', true);
            $event_location = get_post_meta(get_the_ID(), '_event_location', true);
            $animation = ($counter % 2 == 0) ? 'fade-right' : 'fade-left';
            $alignment_classes = ($counter % 2 == 0) ? 'md:flex-row' : 'md:flex-row-reverse';
        ?>
            <div class="flex flex-col <?php echo $alignment_classes; ?> items-center" data-aos="<?php echo $animation; ?>">
                <!-- Event date bubble -->
                <div class="md:w-1/2 flex justify-center mb-6 md:mb-0">
                    <div class="bg-blue-600 text-white rounded-full p-6 z-10 w-24 h-24 flex flex-col items-center justify-center text-center transform transition-transform duration-300 hover:scale-110">
                        <span class="block text-xl font-bold">
                            <?php echo date_i18n('d', strtotime($event_date)); ?>
                        </span>
                        <span class="block">
                            <?php echo date_i18n('M', strtotime($event_date)); ?>
                        </span>
                    </div>
                </div>
                
                <!-- Event content -->
                <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">
                        <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <?php if ($event_location) : ?>
                        <p class="text-gray-600 mb-3">
                            <span class="inline-block mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <?php echo esc_html($event_location); ?>
                        </p>
                    <?php endif; ?>
                    
                    <div class="text-gray-600 mb-4"><?php the_excerpt(); ?></div>
                    
                    <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center transition duration-300">
                        <?php _e('View Details', 'revelational-sites'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php 
            $counter++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
</div>
<?php else : ?>
    <div class="text-center bg-gray-50 p-8 rounded-lg shadow-inner">
        <p class="text-lg text-gray-600">
            <?php _e('No upcoming events scheduled. Please check back soon!', 'revelational-sites'); ?>
        </p>
    </div>
<?php endif; ?>
