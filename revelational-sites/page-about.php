<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-5xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <!-- Page Title -->
        <header class="mb-12 text-center">
          <h1 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
            <?php the_title(); ?>
          </h1>
          <div class="w-24 h-1 bg-red-600 mx-auto"></div>
        </header>
        
        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-12 rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
          </div>
        <?php endif; ?>
        
        <!-- Mission & Vision Section -->
        <section class="mb-16">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-blue-50 p-8 rounded-lg shadow-md" data-aos="fade-right">
              <h2 class="text-2xl font-bold mb-4 text-blue-800">
                <?php _e('Our Mission', 'revelational-sites'); ?>
              </h2>
              <p class="text-gray-700 mb-4">
                <?php _e('To promote Gospel values and foster a thriving Catholic community across the region, inspiring all to live their faith through prayer, worship, and service.', 'revelational-sites'); ?>
              </p>
              <p class="text-gray-700">
                <?php _e('We strive to be witnesses to Christ\'s love through outreach, education, and advocacy for justice, guided by Catholic social teaching and a commitment to human dignity.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <div class="bg-red-50 p-8 rounded-lg shadow-md" data-aos="fade-left">
              <h2 class="text-2xl font-bold mb-4 text-red-800">
                <?php _e('Our Vision', 'revelational-sites'); ?>
              </h2>
              <p class="text-gray-700 mb-4">
                <?php _e('A vibrant Church where all people encounter Christ, are transformed by His love, and share their gifts in service to others, building the Kingdom of God.', 'revelational-sites'); ?>
              </p>
              <p class="text-gray-700">
                <?php _e('We envision parishes that are welcoming communities of faith, hope, and charity, where the Gospel is proclaimed, celebrated, and lived in everyday life.', 'revelational-sites'); ?>
              </p>
            </div>
          </div>
        </section>
        
        <!-- Main Content -->
        <section class="mb-16">
          <div class="prose max-w-none" data-aos="fade-up">
            <?php the_content(); ?>
          </div>
        </section>
        
        <!-- History Timeline -->
        <section class="mb-16">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Our History', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="relative" data-aos="fade-up">
            <!-- Timeline line -->
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-gray-300 transform -translate-x-1/2"></div>
            
            <div class="space-y-12">
              <!-- Timeline Item 1 -->
              <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 flex justify-end mb-6 md:mb-0 md:pr-12">
                  <div class="bg-blue-100 p-6 rounded-lg shadow-md relative">
                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute right-0 top-1/2 w-4 h-4 bg-blue-600 rounded-full transform translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                    
                    <h3 class="text-xl font-semibold mb-2 text-blue-800">1950</h3>
                    <p class="text-gray-700">
                      <?php _e('Establishment of the first Catholic diocese in the region, marking the beginning of organized Catholic leadership and governance.', 'revelational-sites'); ?>
                    </p>
                  </div>
                </div>
                <div class="md:w-1/2 md:pl-12">
                  <!-- Empty on right side for first item -->
                </div>
              </div>
              
              <!-- Timeline Item 2 -->
              <div class="flex flex-col md:flex-row-reverse items-center">
                <div class="md:w-1/2 flex justify-start mb-6 md:mb-0 md:pl-12">
                  <div class="bg-red-100 p-6 rounded-lg shadow-md relative">
                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute left-0 top-1/2 w-4 h-4 bg-red-600 rounded-full transform -translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                    
                    <h3 class="text-xl font-semibold mb-2 text-red-800">1975</h3>
                    <p class="text-gray-700">
                      <?php _e('Formation of the Catholic Bishops Conference, uniting dioceses across the country to coordinate pastoral initiatives and speak with one voice on matters of faith and social justice.', 'revelational-sites'); ?>
                    </p>
                  </div>
                </div>
                <div class="md:w-1/2 md:pr-12">
                  <!-- Empty on left side for second item -->
                </div>
              </div>
              
              <!-- Timeline Item 3 -->
              <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 flex justify-end mb-6 md:mb-0 md:pr-12">
                  <div class="bg-green-100 p-6 rounded-lg shadow-md relative">
                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute right-0 top-1/2 w-4 h-4 bg-green-600 rounded-full transform translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                    
                    <h3 class="text-xl font-semibold mb-2 text-green-800">1992</h3>
                    <p class="text-gray-700">
                      <?php _e('Launch of major educational and healthcare initiatives, establishing Catholic schools and hospitals to serve communities throughout the country.', 'revelational-sites'); ?>
                    </p>
                  </div>
                </div>
                <div class="md:w-1/2 md:pl-12">
                  <!-- Empty on right side for third item -->
                </div>
              </div>
              
              <!-- Timeline Item 4 -->
              <div class="flex flex-col md:flex-row-reverse items-center">
                <div class="md:w-1/2 flex justify-start mb-6 md:mb-0 md:pl-12">
                  <div class="bg-purple-100 p-6 rounded-lg shadow-md relative">
                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute left-0 top-1/2 w-4 h-4 bg-purple-600 rounded-full transform -translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                    
                    <h3 class="text-xl font-semibold mb-2 text-purple-800">2010</h3>
                    <p class="text-gray-700">
                      <?php _e('Establishment of Catholic communication and media platforms to spread the Gospel message and promote Catholic values in society.', 'revelational-sites'); ?>
                    </p>
                  </div>
                </div>
                <div class="md:w-1/2 md:pr-12">
                  <!-- Empty on left side for fourth item -->
                </div>
              </div>
              
              <!-- Timeline Item 5 -->
              <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 flex justify-end mb-6 md:mb-0 md:pr-12">
                  <div class="bg-yellow-100 p-6 rounded-lg shadow-md relative">
                    <!-- Timeline dot -->
                    <div class="hidden md:block absolute right-0 top-1/2 w-4 h-4 bg-yellow-600 rounded-full transform translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                    
                    <h3 class="text-xl font-semibold mb-2 text-yellow-800"><?php echo date('Y'); ?></h3>
                    <p class="text-gray-700">
                      <?php _e('Today, we continue to grow in faith and service, embracing digital evangelization while staying rooted in Catholic tradition and focused on building communities of love and compassion.', 'revelational-sites'); ?>
                    </p>
                  </div>
                </div>
                <div class="md:w-1/2 md:pl-12">
                  <!-- Empty on right side for fifth item -->
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Leadership Team -->
        <section class="mb-16">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Our Leadership', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            <!-- Leadership Item 1 -->
            <div class="text-center">
              <div class="mb-4 relative inline-block">
                <div class="w-40 h-40 rounded-full overflow-hidden mx-auto">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/leadership-1.jpg" alt="<?php _e('Leadership', 'revelational-sites'); ?>" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 rounded-full bg-blue-600 bg-opacity-0 hover:bg-opacity-20 transition-all duration-300"></div>
              </div>
              <h3 class="text-xl font-semibold"><?php _e('Cardinal John Smith', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 mb-3"><?php _e('President', 'revelational-sites'); ?></p>
              <p class="text-gray-600 text-sm px-4">
                <?php _e('Leading with wisdom and compassion, guiding our conference through challenges and opportunities.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Leadership Item 2 -->
            <div class="text-center">
              <div class="mb-4 relative inline-block">
                <div class="w-40 h-40 rounded-full overflow-hidden mx-auto">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/leadership-2.jpg" alt="<?php _e('Leadership', 'revelational-sites'); ?>" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 rounded-full bg-blue-600 bg-opacity-0 hover:bg-opacity-20 transition-all duration-300"></div>
              </div>
              <h3 class="text-xl font-semibold"><?php _e('Bishop Michael Johnson', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 mb-3"><?php _e('Vice President', 'revelational-sites'); ?></p>
              <p class="text-gray-600 text-sm px-4">
                <?php _e('Focused on youth ministry and evangelization, bringing fresh perspectives to our mission.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Leadership Item 3 -->
            <div class="text-center">
              <div class="mb-4 relative inline-block">
                <div class="w-40 h-40 rounded-full overflow-hidden mx-auto">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/leadership-3.jpg" alt="<?php _e('Leadership', 'revelational-sites'); ?>" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 rounded-full bg-blue-600 bg-opacity-0 hover:bg-opacity-20 transition-all duration-300"></div>
              </div>
              <h3 class="text-xl font-semibold"><?php _e('Bishop Robert Davis', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 mb-3"><?php _e('Secretary General', 'revelational-sites'); ?></p>
              <p class="text-gray-600 text-sm px-4">
                <?php _e('Dedicated to social justice and community outreach, ensuring our work reaches those most in need.', 'revelational-sites'); ?>
              </p>
            </div>
          </div>
          
          <div class="text-center mt-8">
            <a href="<?php echo esc_url(get_post_type_archive_link('bishop')); ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded transition duration-300" data-aos="fade-up" data-aos-delay="200">
              <?php _e('View All Bishops', 'revelational-sites'); ?>
            </a>
          </div>
        </section>
        
        <!-- Values -->
        <section class="mb-16 bg-gray-50 p-8 rounded-lg shadow-md">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Our Core Values', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="100">
            <!-- Value 1 -->
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-blue-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </div>
              <h3 class="text-lg font-semibold mb-2"><?php _e('Faith & Love', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 text-sm">
                <?php _e('Grounded in a deep faith in Christ and expressing His love through all our works and relationships.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Value 2 -->
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-red-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 class="text-lg font-semibold mb-2"><?php _e('Community', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 text-sm">
                <?php _e('Building authentic communities that welcome all and provide opportunities for spiritual growth and fellowship.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Value 3 -->
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-green-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </div>
              <h3 class="text-lg font-semibold mb-2"><?php _e('Service', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 text-sm">
                <?php _e('Putting faith into action through charitable works, education, healthcare, and compassionate outreach.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Value 4 -->
            <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
              <div class="text-purple-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
              </div>
              <h3 class="text-lg font-semibold mb-2"><?php _e('Justice', 'revelational-sites'); ?></h3>
              <p class="text-gray-600 text-sm">
                <?php _e('Advocating for human dignity, equality, and the common good in society, guided by Catholic social teaching.', 'revelational-sites'); ?>
              </p>
            </div>
          </div>
        </section>
        
        <!-- CTA Section -->
        <section class="mb-16 bg-blue-700 text-white p-10 rounded-lg shadow-xl">
          <div class="text-center" data-aos="fade-up">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">
              <?php _e('Join Our Community', 'revelational-sites'); ?>
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
              <?php _e('Be part of our mission to spread the Gospel message and build a more compassionate society rooted in faith and love.', 'revelational-sites'); ?>
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="bg-white text-blue-700 hover:bg-gray-100 px-6 py-3 rounded font-semibold transition duration-300">
                <?php _e('Contact Us', 'revelational-sites'); ?>
              </a>
              <a href="<?php echo esc_url(home_url('/donate/')); ?>" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded font-semibold transition duration-300">
                <?php _e('Support Our Work', 'revelational-sites'); ?>
              </a>
            </div>
          </div>
        </section>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
