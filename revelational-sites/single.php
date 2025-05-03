<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-4xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-6">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
          </div>
        <?php endif; ?>
        
        <div class="p-8">
          <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
          
          <div class="flex items-center text-gray-600 mb-6">
            <span class="mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <?php the_time('F j, Y'); ?>
            </span>
            
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <?php the_author(); ?>
            </span>
          </div>
          
          <div class="prose max-w-none mb-8">
            <?php the_content(); ?>
          </div>
          
          <div class="mt-8 pt-6 border-t border-gray-200">
            <?php 
            $categories = get_the_category();
            if (!empty($categories)) : 
            ?>
              <div class="mb-4">
                <span class="text-gray-700 font-semibold"><?php _e('Categories:', 'revelational-sites'); ?></span>
                <?php foreach ($categories as $category) : ?>
                  <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="inline-block bg-gray-100 text-gray-800 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 hover:bg-gray-200 transition duration-300">
                    <?php echo esc_html($category->name); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            
            <?php
            $tags = get_the_tags();
            if (!empty($tags)) :
            ?>
              <div>
                <span class="text-gray-700 font-semibold"><?php _e('Tags:', 'revelational-sites'); ?></span>
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="inline-block bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2 hover:bg-blue-200 transition duration-300">
                    <?php echo esc_html($tag->name); ?>
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </article>
      
      <!-- Post Navigation -->
      <div class="mt-8 flex flex-col sm:flex-row justify-between">
        <div class="mb-4 sm:mb-0">
          <?php previous_post_link('%link', '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg> %title'); ?>
        </div>
        
        <div>
          <?php next_post_link('%link', '%title <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>'); ?>
        </div>
      </div>
      
      <!-- Comments -->
      <?php 
      if (comments_open() || get_comments_number()) :
        comments_template();
      endif;
      ?>
      
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
