<?php
/**
 * Template part for displaying daily mass readings
 */

$reading = revelational_get_daily_readings();
?>

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
    
    <?php if (!empty($reading)) : ?>
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
