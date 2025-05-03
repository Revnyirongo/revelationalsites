<?php
/**
 * Template part for displaying the frontpage slider
 */

// Get slider posts
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
