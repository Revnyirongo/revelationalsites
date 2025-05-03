<?php get_header(); ?>

<main class="container mx-auto p-4">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="mb-8">
      <h2 class="text-2xl font-semibold mb-2"><a href="<?php the_permalink(); ?>" class="text-blue-600 hover:underline"><?php the_title(); ?></a></h2>
      <div class="text-sm text-gray-500 mb-2"><?php the_time('F j, Y'); ?></div>
      <div class="prose"><?php the_excerpt(); ?></div>
    </article>
  <?php endwhile; else : ?>
    <p><?php esc_html_e('Sorry, no posts found.', 'revelational-sites'); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
