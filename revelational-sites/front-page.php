<?php get_header(); ?>

<!-- Hero Slider Section -->
<section class="hero-slider relative">
    <?php
    $slider_posts = revelational_get_slider_posts(5);
    if ($slider_posts->have_posts()) :
    ?>
    <div class="swiper frontpage-slider">
        <div class="swiper-wrapper">
            <?php while ($slider_posts->have_posts()) : $slider_posts->the_post(); ?>
                <div class="swiper-slide relative">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="relative h-96 md:h-[500px] lg:h-[600px]">
                            <?php the_post_thumbnail('slider-image', array('class' => 'absolute w-full h-full object-cover')); ?>
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div class="container mx-auto px-4 relative h-full flex items-center">
                                <div class="text-white max-w-2xl" data-aos="fade-right">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) :
                                    ?>
                                        <span class="inline-block bg-red-600 text-white px-3 py-1 text-sm font-semibold mb-3">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                                        <?php the_title(); ?>
                                    </h2>
                                    <div class="mb-6 text-lg">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300">
                                        <?php _e('Read More', 'revelational-sites'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <?php
    wp_reset_postdata();
    endif;
    ?>
</section>

<!-- Bishops Section -->
<section class="bishops-section py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative" data-aos="fade-up">
            <?php _e('Our Bishops', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
        </h2>
        
        <?php
        $bishops = revelational_get_bishops(10);
        if ($bishops->have_posts()) :
        ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <?php 
            $counter = 0;
            while ($bishops->have_posts()) : $bishops->the_post(); 
                $diocese = get_post_meta(get_the_ID(), '_bishop_diocese', true);
                $animation_delay = $counter * 100;
            ?>
                <div class="bishop-card text-center" data-aos="fade-up" data-aos-delay="<?php echo $animation_delay; ?>">
                    <div class="relative overflow-hidden group rounded-lg shadow-md mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('bishop-thumbnail', array('class' => 'w-full h-auto transition-transform duration-300 group-hover:scale-110')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/bishop-placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="w-full h-auto">
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <a href="<?php the_permalink(); ?>" class="text-white hover:underline">
                                <?php _e('View Profile', 'revelational-sites'); ?>
                            </a>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold"><?php the_title(); ?></h3>
                    <?php if ($diocese) : ?>
                        <p class="text-gray-600"><?php echo esc_html($diocese); ?></p>
                    <?php endif; ?>
                </div>
            <?php 
                $counter++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Latest News Section -->
<section class="latest-news py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <h2 class="text-3xl font-bold relative mb-6 md:mb-0" data-aos="fade-right">
                <?php _e('Latest News', 'revelational-sites'); ?>
                <span class="block w-16 h-1 bg-red-600 mt-4"></span>
            </h2>
            <a href="<?php echo get_category_link(get_cat_ID('news')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300" data-aos="fade-left">
                <?php _e('View All News', 'revelational-sites'); ?>
            </a>
        </div>
        
        <?php
        $news_posts = revelational_get_news_posts(6);
        if ($news_posts->have_posts()) :
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $counter = 0;
            while ($news_posts->have_posts()) : $news_posts->the_post();
                $animation_delay = $counter * 100;
            ?>
                <article class="news-card bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="<?php echo $animation_delay; ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden h-48">
                            <?php the_post_thumbnail('news-thumbnail', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2"><?php the_time('F j, Y'); ?></div>
                        <h3 class="text-xl font-semibold mb-3">
                            <a href="<?php the_permalink(); ?>" class="text-blue-800 hover:text-blue-600 transition duration-300">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="text-gray-600 mb-4"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center transition duration-300">
                            <?php _e('Read More', 'revelational-sites'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            <?php
                $counter++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- About / MCCB History -->
<section class="about-section py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0 lg:pr-12" data-aos="fade-right">
                <h2 class="text-3xl font-bold mb-6 relative">
                    <?php _e('About MCCB', 'revelational-sites'); ?>
                    <span class="block w-16 h-1 bg-red-600 mt-4"></span>
                </h2>
                
                <?php
                // Get the About page content
                $about_page = get_page_by_path('about');
                if ($about_page) {
                    $excerpt = wp_trim_words(apply_filters('the_content', $about_page->post_content), 80, '...');
                    echo '<div class="text-gray-700 mb-6">' . $excerpt . '</div>';
                } else {
                    // Fallback content if no About page exists
                    echo '<div class="text-gray-700 mb-6">';
                    _e('The Catholic Conference plays a crucial role in promoting the Catholic faith and serving communities across the country. Our mission encompasses spiritual guidance, charitable works, education, and advocacy for social justice, all rooted in the teachings of Christ.', 'revelational-sites');
                    echo '</div>';
                }
                ?>
                
                <a href="<?php echo get_page_link(get_page_by_path('about')->ID); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300">
                    <?php _e('Read Our History', 'revelational-sites'); ?>
                </a>
            </div>
            
            <div class="lg:w-1/2" data-aos="fade-left">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/cathedral.jpg" alt="<?php _e('Cathedral', 'revelational-sites'); ?>" class="w-full h-auto rounded mb-6">
                    <blockquote class="text-gray-700 italic border-l-4 border-blue-600 pl-4 py-2 mb-4">
                        <?php _e('"The Church is the pillar and foundation of the truth." — 1 Timothy 3:15', 'revelational-sites'); ?>
                    </blockquote>
                    <p class="text-gray-600">
                        <?php _e('Our faith community is united in prayer, worship, and service, guided by the teachings of the Catholic Church and inspired by the Gospel message of love and compassion.', 'revelational-sites'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="events-section py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative" data-aos="fade-up">
            <?php _e('Upcoming Events', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
        </h2>
        
        <?php
        $events = revelational_get_upcoming_events(4);
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
            
            <div class="text-center mt-12">
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300">
                    <?php _e('View All Events', 'revelational-sites'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="text-center bg-gray-50 p-8 rounded-lg shadow-inner">
                <p class="text-lg text-gray-600">
                    <?php _e('No upcoming events scheduled. Please check back soon!', 'revelational-sites'); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Daily Catholic Mass Readings -->
<section class="daily-readings py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up">
            <div class="flex items-center justify-center mb-6">
                <span class="text-red-600 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </span>
                <h2 class="text-3xl font-bold">
                    <?php _e('Daily Mass Readings', 'revelational-sites'); ?>
                </h2>
            </div>
            
            <?php
            $reading = revelational_get_daily_readings();
            if (!empty($reading)) :
            ?>
                <h3 class="text-xl font-semibold mb-2"><?php echo esc_html($reading['title']); ?></h3>
                <p class="text-gray-500 mb-4"><?php echo esc_html($reading['date']); ?></p>
                <div class="text-gray-700 mb-6">
                    <?php echo wp_kses_post($reading['description']); ?>
                </div>
                <a href="<?php echo esc_url($reading['permalink']); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center transition duration-300">
                    <?php _e('Read Full Readings', 'revelational-sites'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            <?php else : ?>
                <div class="text-center p-6 bg-gray-50 rounded-lg">
                    <p class="text-gray-600">
                        <?php _e('Unable to load today\'s readings. Please visit the USCCB website for daily readings.', 'revelational-sites'); ?>
                    </p>
                    <a href="https://bible.usccb.org/bible/readings" target="_blank" class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300">
                        <?php _e('Visit USCCB Website', 'revelational-sites'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Facebook Embedded Posts -->
<section class="facebook-feed py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 relative" data-aos="fade-up">
            <?php _e('Follow Us on Facebook', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
        </h2>
        
        <div class="max-w-4xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"></script>
                
                <div class="fb-page" 
                     data-href="https://www.facebook.com/usccb" 
                     data-tabs="timeline" 
                     data-width="" 
                     data-height="500" 
                     data-small-header="false" 
                     data-adapt-container-width="true" 
                     data-hide-cover="false" 
                     data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/usccb" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/usccb">United States Conference of Catholic Bishops</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="newsletter-section py-16 bg-blue-700 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
            <?php echo do_shortcode('[newsletter_signup title="Get Spiritual Inspiration Every Week" subtitle="Join our mailing list for weekly reflections, event updates, and spiritual resources."]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
