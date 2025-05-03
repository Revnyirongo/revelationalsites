<?php
/**
 * Template part for displaying the bishops grid
 */

// Get bishops
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
