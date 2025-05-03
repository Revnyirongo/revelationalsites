<?php
/**
 * Revelational Sites Theme Functions
 * 
 * Enhanced version with proper script/style enqueuing and initialization
 */

// Theme Setup
function revelational_setup() {
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'revelational-sites'),
        'footer' => __('Footer Menu', 'revelational-sites'),
        'social' => __('Social Menu', 'revelational-sites')
    ));
    
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add image sizes
    add_image_size('slider-image', 1920, 800, true);
    add_image_size('bishop-thumbnail', 300, 400, true);
    add_image_size('news-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'revelational_setup');

/**
 * Enqueue scripts and styles with proper dependencies
 */
function revelational_enqueue_scripts() {
    // Enqueue Tailwind CSS - Ensure this loads first
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css', array(), '3.4.1');
    
    // Enqueue theme's main stylesheet
    wp_enqueue_style('revelational-style', get_stylesheet_uri(), array('tailwind'), wp_get_theme()->get('Version'));
    
    // Enqueue AOS (Animate On Scroll) library
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);
    
    // Enqueue Swiper.js for sliders
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    
    // Enqueue jQuery (WordPress includes it by default)
    wp_enqueue_script('jquery');
    
    // Enqueue Alpine.js for component interactions
    wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js', array(), '3.13.3', true);
    
    // Enqueue Facebook SDK - Only if the Facebook container exists
    wp_enqueue_script('facebook-sdk', 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0', array(), null, true);
    
    // Enqueue theme's main JavaScript file
    wp_enqueue_script('revelational-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'swiper-js', 'aos-js', 'alpine-js'), '1.0.0', true);
    
    // Add a small inline script to refresh Facebook widgets when page is fully loaded
    wp_add_inline_script('revelational-js', '
        jQuery(window).on("load", function() {
            if (typeof FB !== "undefined") {
                FB.XFBML.parse();
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'revelational_enqueue_scripts');

/**
 * Initialize AOS (Animate On Scroll) library
 */
function revelational_initialize_aos() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
                disable: 'mobile' // Disable on mobile for better performance
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'revelational_initialize_aos', 100);

// Register Bishop Custom Post Type
function revelational_register_bishop_cpt() {
    $labels = array(
        'name'               => _x('Bishops', 'post type general name', 'revelational-sites'),
        'singular_name'      => _x('Bishop', 'post type singular name', 'revelational-sites'),
        'menu_name'          => _x('Bishops', 'admin menu', 'revelational-sites'),
        'name_admin_bar'     => _x('Bishop', 'add new on admin bar', 'revelational-sites'),
        'add_new'            => _x('Add New', 'bishop', 'revelational-sites'),
        'add_new_item'       => __('Add New Bishop', 'revelational-sites'),
        'new_item'           => __('New Bishop', 'revelational-sites'),
        'edit_item'          => __('Edit Bishop', 'revelational-sites'),
        'view_item'          => __('View Bishop', 'revelational-sites'),
        'all_items'          => __('All Bishops', 'revelational-sites'),
        'search_items'       => __('Search Bishops', 'revelational-sites'),
        'parent_item_colon'  => __('Parent Bishops:', 'revelational-sites'),
        'not_found'          => __('No bishops found.', 'revelational-sites'),
        'not_found_in_trash' => __('No bishops found in Trash.', 'revelational-sites')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'bishop'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('bishop', $args);
}
add_action('init', 'revelational_register_bishop_cpt');

// Add Bishop Meta Boxes
function revelational_bishop_meta_boxes() {
    add_meta_box(
        'bishop_details',
        __('Bishop Details', 'revelational-sites'),
        'revelational_bishop_details_callback',
        'bishop',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'revelational_bishop_meta_boxes');

function revelational_bishop_details_callback($post) {
    wp_nonce_field(basename(__FILE__), 'bishop_details_nonce');
    
    $diocese = get_post_meta($post->ID, '_bishop_diocese', true);
    
    echo '<p>';
    echo '<label for="bishop_diocese">' . __('Diocese/Title', 'revelational-sites') . '</label><br />';
    echo '<input type="text" id="bishop_diocese" name="bishop_diocese" value="' . esc_attr($diocese) . '" class="widefat">';
    echo '</p>';
}

function revelational_save_bishop_meta($post_id) {
    if (!isset($_POST['bishop_details_nonce']) || !wp_verify_nonce($_POST['bishop_details_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    if ('bishop' !== $_POST['post_type']) {
        return $post_id;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    $diocese = isset($_POST['bishop_diocese']) ? sanitize_text_field($_POST['bishop_diocese']) : '';
    update_post_meta($post_id, '_bishop_diocese', $diocese);
}
add_action('save_post', 'revelational_save_bishop_meta');

// Register Event Custom Post Type
function revelational_register_event_cpt() {
    $labels = array(
        'name'               => _x('Events', 'post type general name', 'revelational-sites'),
        'singular_name'      => _x('Event', 'post type singular name', 'revelational-sites'),
        'menu_name'          => _x('Events', 'admin menu', 'revelational-sites'),
        'name_admin_bar'     => _x('Event', 'add new on admin bar', 'revelational-sites'),
        'add_new'            => _x('Add New', 'event', 'revelational-sites'),
        'add_new_item'       => __('Add New Event', 'revelational-sites'),
        'new_item'           => __('New Event', 'revelational-sites'),
        'edit_item'          => __('Edit Event', 'revelational-sites'),
        'view_item'          => __('View Event', 'revelational-sites'),
        'all_items'          => __('All Events', 'revelational-sites'),
        'search_items'       => __('Search Events', 'revelational-sites'),
        'parent_item_colon'  => __('Parent Events:', 'revelational-sites'),
        'not_found'          => __('No events found.', 'revelational-sites'),
        'not_found_in_trash' => __('No events found in Trash.', 'revelational-sites')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'event'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('event', $args);
}
add_action('init', 'revelational_register_event_cpt');

// Add Event Meta Boxes
function revelational_event_meta_boxes() {
    add_meta_box(
        'event_details',
        __('Event Details', 'revelational-sites'),
        'revelational_event_details_callback',
        'event',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'revelational_event_meta_boxes');

function revelational_event_details_callback($post) {
    wp_nonce_field(basename(__FILE__), 'event_details_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    
    echo '<p>';
    echo '<label for="event_date">' . __('Event Date', 'revelational-sites') . '</label><br />';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" class="widefat">';
    echo '</p>';
    
    echo '<p>';
    echo '<label for="event_location">' . __('Event Location', 'revelational-sites') . '</label><br />';
    echo '<input type="text" id="event_location" name="event_location" value="' . esc_attr($event_location) . '" class="widefat">';
    echo '</p>';
}

function revelational_save_event_meta($post_id) {
    if (!isset($_POST['event_details_nonce']) || !wp_verify_nonce($_POST['event_details_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    if ('event' !== $_POST['post_type']) {
        return $post_id;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    $event_date = isset($_POST['event_date']) ? sanitize_text_field($_POST['event_date']) : '';
    $event_location = isset($_POST['event_location']) ? sanitize_text_field($_POST['event_location']) : '';
    
    update_post_meta($post_id, '_event_date', $event_date);
    update_post_meta($post_id, '_event_location', $event_location);
}
add_action('save_post', 'revelational_save_event_meta');

// Register widget areas
function revelational_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'revelational-sites'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'revelational-sites'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-6 p-4 bg-gray-50 rounded shadow">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title text-xl font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'revelational-sites'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'revelational-sites'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-3">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'revelational-sites'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'revelational-sites'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-3">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'revelational-sites'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'revelational-sites'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-lg font-semibold mb-3">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'revelational_widgets_init');

// Get daily Catholic Mass readings via RSS feed
function revelational_get_daily_readings() {
    include_once(ABSPATH . WPINC . '/feed.php');
    
    // Get USCCB daily readings feed
    $rss = fetch_feed('https://bible.usccb.org/bible/readings/rss-feed');
    
    if (is_wp_error($rss)) {
        return array();
    }
    
    $max_items = $rss->get_item_quantity(1);
    $rss_items = $rss->get_items(0, $max_items);
    
    if (empty($rss_items)) {
        return array();
    }
    
    $item = $rss_items[0];
    
    $reading = array(
        'title'       => $item->get_title(),
        'description' => $item->get_description(),
        'permalink'   => $item->get_permalink(),
        'date'        => $item->get_date('F j, Y')
    );
    
    return $reading;
}

// Shortcode for newsletter signup form
function revelational_newsletter_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => __('Get Spiritual Inspiration Every Week', 'revelational-sites'),
        'subtitle' => __('Join our mailing list for updates, reflections, and events.', 'revelational-sites'),
    ), $atts);
    
    ob_start();
    ?>
    <div class="newsletter-signup bg-blue-700 text-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
        <h3 class="text-2xl font-bold mb-2"><?php echo esc_html($atts['title']); ?></h3>
        <p class="mb-4"><?php echo esc_html($atts['subtitle']); ?></p>
        <form action="#" method="post" class="flex flex-col md:flex-row gap-3">
            <input type="text" name="name" placeholder="<?php _e('Your Name', 'revelational-sites'); ?>" class="px-4 py-2 rounded text-gray-800 flex-grow">
            <input type="email" name="email" placeholder="<?php _e('Your Email', 'revelational-sites'); ?>" class="px-4 py-2 rounded text-gray-800 flex-grow" required>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded font-semibold transition duration-300">
                <?php _e('Subscribe', 'revelational-sites'); ?>
            </button>
        </form>
        <p class="text-sm mt-3"><?php _e('We respect your privacy and will never share your information.', 'revelational-sites'); ?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('newsletter_signup', 'revelational_newsletter_shortcode');

// Helper function to get future events
function revelational_get_upcoming_events($count = 4) {
    $today = date('Y-m-d');
    
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => $count,
        'meta_key' => '_event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => '_event_date',
                'value' => $today,
                'compare' => '>=',
                'type' => 'DATE'
            )
        )
    );
    
    return new WP_Query($args);
}

// Helper function to get frontpage slider posts
function revelational_get_slider_posts($count = 5) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'category_name' => 'frontpage',
        'meta_key' => '_thumbnail_id', // Only posts with featured images
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            ),
        )
    );
    
    return new WP_Query($args);
}

// Helper function to get news posts
function revelational_get_news_posts($count = 6) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'category_name' => 'news',
    );
    
    return new WP_Query($args);
}

// Helper function to get all bishops for the grid
function revelational_get_bishops($count = 10) {
    $args = array(
        'post_type' => 'bishop',
        'posts_per_page' => $count,
        'orderby' => 'title',
        'order' => 'ASC',
    );
    
    return new WP_Query($args);
}
