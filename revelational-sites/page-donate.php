<?php
/**
 * Template Name: Donation Page
 *
 * Template for displaying the donation page.
 */

get_header();
?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-5xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <!-- Page Title -->
        <header class="mb-12 text-center">
          <h1 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-up">
            <?php the_title(); ?>
          </h1>
          <div class="w-24 h-1 bg-red-600 mx-auto mb-8"></div>
          <p class="text-lg text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            <?php _e('Your generous support allows us to continue our mission of spreading the Gospel and serving our communities.', 'revelational-sites'); ?>
          </p>
        </header>
        
        <!-- Main Content -->
        <section class="mb-12">
          <div class="prose max-w-none" data-aos="fade-up">
            <?php the_content(); ?>
          </div>
        </section>
        
        <!-- Donation Options -->
        <section class="mb-16">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Ways to Support Our Mission', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- One-Time Donation -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="0">
              <div class="bg-blue-600 text-white p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-bold mb-2"><?php _e('One-Time Donation', 'revelational-sites'); ?></h3>
              </div>
              <div class="p-6">
                <p class="text-gray-700 mb-6">
                  <?php _e('Make a direct impact with a one-time donation. Every contribution, regardless of size, helps support our mission.', 'revelational-sites'); ?>
                </p>
                <div class="space-y-4">
                  <div class="grid grid-cols-3 gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$25</button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$50</button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$100</button>
                  </div>
                  <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                    <input type="number" class="w-full pl-7 pr-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Other amount">
                  </div>
                  <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition duration-300">
                    <?php _e('Donate Now', 'revelational-sites'); ?>
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Monthly Giving -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
              <div class="bg-red-600 text-white p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-bold mb-2"><?php _e('Monthly Giving', 'revelational-sites'); ?></h3>
              </div>
              <div class="p-6">
                <p class="text-gray-700 mb-6">
                  <?php _e('Become a sustaining supporter with a monthly gift. Your recurring donation provides reliable support for our ongoing programs.', 'revelational-sites'); ?>
                </p>
                <div class="space-y-4">
                  <div class="grid grid-cols-3 gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$10/mo</button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$25/mo</button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded font-semibold transition duration-300">$50/mo</button>
                  </div>
                  <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                    <input type="number" class="w-full pl-7 pr-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Other amount per month">
                  </div>
                  <button class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-semibold transition duration-300">
                    <?php _e('Become a Monthly Donor', 'revelational-sites'); ?>
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Other Ways to Give -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
              <div class="bg-green-600 text-white p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <h3 class="text-xl font-bold mb-2"><?php _e('Other Ways to Give', 'revelational-sites'); ?></h3>
              </div>
              <div class="p-6">
                <ul class="space-y-4 text-gray-700">
                  <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span><?php _e('Mail a check to our address', 'revelational-sites'); ?></span>
                  </li>
                  <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span><?php _e('Bank transfer or wire donation', 'revelational-sites'); ?></span>
                  </li>
                  <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span><?php _e('Planned giving and bequests', 'revelational-sites'); ?></span>
                  </li>
                  <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span><?php _e('Donate stocks or securities', 'revelational-sites'); ?></span>
                  </li>
                  <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span><?php _e('Corporate matching gifts', 'revelational-sites'); ?></span>
                  </li>
                </ul>
                <div class="mt-6">
                  <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="w-full block text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition duration-300">
                    <?php _e('Contact Us for Details', 'revelational-sites'); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <!-- Impact Section -->
        <section class="mb-16 bg-gray-50 p-8 rounded-lg shadow-md">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Your Impact', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center" data-aos="fade-up" data-aos-delay="100">
            <!-- Impact Item 1 -->
            <div class="p-6">
              <div class="text-blue-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2"><?php _e('Faith Formation', 'revelational-sites'); ?></h3>
              <p class="text-gray-600">
                <?php _e('Your donations support religious education programs, retreats, and resources that help deepen faith and spiritual growth.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Impact Item 2 -->
            <div class="p-6">
              <div class="text-red-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2"><?php _e('Community Outreach', 'revelational-sites'); ?></h3>
              <p class="text-gray-600">
                <?php _e('Your generosity funds food banks, shelters, healthcare initiatives, and other services for those in need throughout our community.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- Impact Item 3 -->
            <div class="p-6">
              <div class="text-green-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2"><?php _e('Parish Support', 'revelational-sites'); ?></h3>
              <p class="text-gray-600">
                <?php _e('Your contributions help maintain church buildings, support clergy and staff, and ensure that our parishes remain vibrant centers of worship.', 'revelational-sites'); ?>
              </p>
            </div>
          </div>
        </section>
        
        <!-- Testimonials -->
        <section class="mb-16">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Donor Stories', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="0">
              <div class="flex items-center mb-4">
                <div class="mr-4">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-1.jpg" alt="<?php _e('Donor', 'revelational-sites'); ?>" class="w-16 h-16 rounded-full object-cover">
                </div>
                <div>
                  <h3 class="text-lg font-semibold"><?php _e('Maria Rodriguez', 'revelational-sites'); ?></h3>
                  <p class="text-gray-600 text-sm"><?php _e('Monthly Donor Since 2018', 'revelational-sites'); ?></p>
                </div>
              </div>
              <blockquote class="text-gray-700 italic border-l-4 border-blue-600 pl-4 py-2 mb-4">
                <?php _e('"I give monthly because I believe in supporting the Church\'s mission consistently. It\'s wonderful to see how my small contribution, combined with others, makes such a significant impact in our community."', 'revelational-sites'); ?>
              </blockquote>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100">
              <div class="flex items-center mb-4">
                <div class="mr-4">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-2.jpg" alt="<?php _e('Donor', 'revelational-sites'); ?>" class="w-16 h-16 rounded-full object-cover">
                </div>
                <div>
                  <h3 class="text-lg font-semibold"><?php _e('James Ochieng', 'revelational-sites'); ?></h3>
                  <p class="text-gray-600 text-sm"><?php _e('Donor & Volunteer', 'revelational-sites'); ?></p>
                </div>
              </div>
              <blockquote class="text-gray-700 italic border-l-4 border-blue-600 pl-4 py-2 mb-4">
                <?php _e('"I\'ve seen firsthand how donations transform lives through the Church\'s outreach programs. Giving isn\'t just about money—it\'s about being part of something greater than ourselves."', 'revelational-sites'); ?>
              </blockquote>
            </div>
          </div>
        </section>
        
        <!-- FAQ Section -->
        <section class="mb-16">
          <h2 class="text-2xl font-bold mb-8 text-center" data-aos="fade-up">
            <?php _e('Frequently Asked Questions', 'revelational-sites'); ?>
            <span class="block w-24 h-1 bg-red-600 mx-auto mt-4"></span>
          </h2>
          
          <div class="space-y-6" data-aos="fade-up" data-aos-delay="100">
            <!-- FAQ Item 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-lg font-semibold mb-2"><?php _e('Is my donation tax-deductible?', 'revelational-sites'); ?></h3>
              <p class="text-gray-700">
                <?php _e('Yes, donations to our organization are tax-deductible to the extent allowed by law. You will receive a receipt for your donation that can be used for tax purposes.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-lg font-semibold mb-2"><?php _e('How is my donation used?', 'revelational-sites'); ?></h3>
              <p class="text-gray-700">
                <?php _e('Your donation supports our core programs including educational initiatives, community outreach, parish support, and ministry work. We commit to using funds efficiently and transparently.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-lg font-semibold mb-2"><?php _e('Can I designate my donation for a specific purpose?', 'revelational-sites'); ?></h3>
              <p class="text-gray-700">
                <?php _e('Yes, you can specify if you would like your donation to support a particular program or initiative. Please include this information when making your donation or contact our office for assistance.', 'revelational-sites'); ?>
              </p>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
              <h3 class="text-lg font-semibold mb-2"><?php _e('How do I update or cancel my monthly donation?', 'revelational-sites'); ?></h3>
              <p class="text-gray-700">
                <?php _e('You can update or cancel your recurring donation at any time by contacting our donor services team at donations@example.org or by calling (123) 456-7890.', 'revelational-sites'); ?>
              </p>
            </div>
          </div>
        </section>
        
        <!-- CTA Section -->
        <section class="mb-8 bg-blue-700 text-white p-10 rounded-lg shadow-xl text-center">
          <div data-aos="fade-up">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">
              <?php _e('Ready to Make a Difference?', 'revelational-sites'); ?>
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
              <?php _e('Your support today helps build a better tomorrow for our community and Church.', 'revelational-sites'); ?>
            </p>
            <a href="#" class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition duration-300">
              <?php _e('Donate Now', 'revelational-sites'); ?>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </a>
          </div>
        </section>
        
        <!-- Contact Info -->
        <section class="text-center" data-aos="fade-up">
          <h3 class="text-xl font-semibold mb-2"><?php _e('Questions about donating?', 'revelational-sites'); ?></h3>
          <p class="text-gray-600">
            <?php _e('Contact our donation team at', 'revelational-sites'); ?> 
            <a href="mailto:donations@example.org" class="text-blue-600 hover:text-blue-800 font-semibold">donations@example.org</a> 
            <?php _e('or call', 'revelational-sites'); ?> 
            <a href="tel:+1234567890" class="text-blue-600 hover:text-blue-800 font-semibold">(123) 456-7890</a>
          </p>
        </section>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
