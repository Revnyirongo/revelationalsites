<!-- Footer -->
  <footer class="bg-gray-900 text-white pt-16 pb-6">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <!-- Footer Column 1 -->
        <div class="footer-col" data-aos="fade-up" data-aos-delay="0">
          <h4 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700">
            <?php _e('About Us', 'revelational-sites'); ?>
          </h4>
          <?php if (is_active_sidebar('footer-1')) : ?>
            <?php dynamic_sidebar('footer-1'); ?>
          <?php else : ?>
            <p class="mb-4 text-gray-400"><?php _e('The Catholic Conference serves as a platform for spiritual guidance, community building, and social advocacy rooted in faith.', 'revelational-sites'); ?></p>
            <p class="mb-4 text-gray-400"><?php _e('Our mission is to promote Gospel values and foster a thriving Catholic community across the region.', 'revelational-sites'); ?></p>
            <div class="mt-6">
              <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
              <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold text-white">
                  <?php bloginfo('name'); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
        
        <!-- Footer Column 2 -->
        <div class="footer-col" data-aos="fade-up" data-aos-delay="100">
          <h4 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700">
            <?php _e('Quick Links', 'revelational-sites'); ?>
          </h4>
          <?php if (is_active_sidebar('footer-2')) : ?>
            <?php dynamic_sidebar('footer-2'); ?>
          <?php else : ?>
            <ul class="space-y-2 text-gray-400">
              <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition duration-300"><?php _e('Home', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="hover:text-white transition duration-300"><?php _e('About Us', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_post_type_archive_link('bishop')); ?>" class="hover:text-white transition duration-300"><?php _e('Our Bishops', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="hover:text-white transition duration-300"><?php _e('Events', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('news'))); ?>" class="hover:text-white transition duration-300"><?php _e('News', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hover:text-white transition duration-300"><?php _e('Contact Us', 'revelational-sites'); ?></a></li>
              <li><a href="<?php echo esc_url(home_url('/donate/')); ?>" class="hover:text-white transition duration-300"><?php _e('Donate', 'revelational-sites'); ?></a></li>
            </ul>
          <?php endif; ?>
        </div>
        
        <!-- Footer Column 3 -->
        <div class="footer-col" data-aos="fade-up" data-aos-delay="200">
          <h4 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700">
            <?php _e('Recent Posts', 'revelational-sites'); ?>
          </h4>
          <?php if (is_active_sidebar('footer-3')) : ?>
            <?php dynamic_sidebar('footer-3'); ?>
          <?php else : ?>
            <?php
            $recent_posts = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'ignore_sticky_posts' => 1
            ));
            
            if ($recent_posts->have_posts()) :
              while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                <div class="mb-4 pb-4 border-b border-gray-800">
                  <a href="<?php the_permalink(); ?>" class="text-gray-300 hover:text-white font-medium transition duration-300">
                    <?php the_title(); ?>
                  </a>
                  <div class="text-gray-500 text-sm mt-1"><?php echo get_the_date(); ?></div>
                </div>
            <?php
              endwhile;
              wp_reset_postdata();
            else :
            ?>
              <p class="text-gray-400"><?php _e('No recent posts available.', 'revelational-sites'); ?></p>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        
        <!-- Footer Column 4 -->
        <div class="footer-col" data-aos="fade-up" data-aos-delay="300">
          <h4 class="text-xl font-semibold mb-4 pb-2 border-b border-gray-700">
            <?php _e('Contact Information', 'revelational-sites'); ?>
          </h4>
          <address class="not-italic text-gray-400">
            <div class="flex items-start mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <div>
                <strong class="block mb-1 text-gray-300"><?php _e('Address:', 'revelational-sites'); ?></strong>
                <p><?php _e('123 Catholic Way, Lilongwe, Central Region, Malawi', 'revelational-sites'); ?></p>
              </div>
            </div>
            
            <div class="flex items-start mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <div>
                <strong class="block mb-1 text-gray-300"><?php _e('Phone:', 'revelational-sites'); ?></strong>
                <p><a href="tel:+265991154080" class="hover:text-white transition duration-300">+265 991 154 080</a></p>
              </div>
            </div>
            
            <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-300 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <div>
                <strong class="block mb-1 text-gray-300"><?php _e('Email:', 'revelational-sites'); ?></strong>
                <p><a href="mailto:info@revelation.africa" class="hover:text-white transition duration-300">info@revelation.africa</a></p>
              </div>
            </div>
          </address>
          
          <div class="mt-6 flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition duration-300" aria-label="Facebook">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300" aria-label="Twitter">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300" aria-label="YouTube">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300" aria-label="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Footer Bottom -->
      <div class="border-t border-gray-800 pt-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400 text-center md:text-left mb-4 md:mb-0">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
            <?php _e('All rights reserved.', 'revelational-sites'); ?>
          </p>
          <p class="text-gray-400 text-center md:text-right">
            <?php _e('Theme by', 'revelational-sites'); ?> 
            <a href="https://revelation.africa" target="_blank" class="text-gray-300 hover:text-white transition duration-300">
              Revelation Nyirongo
            </a> | <?php _e('Phone:', 'revelational-sites'); ?> 
            <a href="tel:+265991154080" class="text-gray-300 hover:text-white transition duration-300">
              +265991154080
            </a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Back to Top Button -->
  <a href="#" id="back-to-top" class="fixed bottom-8 right-8 bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg transform scale-0 hover:bg-blue-700 transition-all duration-300 z-50">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
  </a>
  
  <!-- Initialize Swiper and Back to Top Button -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize mobile menu toggle
      const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      const primaryMenu = document.getElementById('primary-menu');
      
      if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
          primaryMenu.classList.toggle('hidden');
        });
      }
      
      // Initialize Swiper for the frontpage slider
      if (document.querySelector('.frontpage-slider')) {
        new Swiper('.frontpage-slider', {
          loop: true,
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
      }
      
      // Back to Top button functionality
      const backToTopButton = document.getElementById('back-to-top');
      
      if (backToTopButton) {
        window.addEventListener('scroll', function() {
          if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('scale-0');
            backToTopButton.classList.add('scale-100');
          } else {
            backToTopButton.classList.remove('scale-100');
            backToTopButton.classList.add('scale-0');
          }
        });
        
        backToTopButton.addEventListener('click', function(e) {
          e.preventDefault();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        });
      }
    });
  </script>
  <?php wp_footer(); ?>
</body>
</html>
