<?php
/**
 * Template part for displaying the news grid
 */

// Get news posts
$news_posts = revelational_get_news_posts($args['count'] ?? 6);

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
