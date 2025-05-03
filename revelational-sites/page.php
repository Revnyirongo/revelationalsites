<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
  <div class="max-w-4xl mx-auto">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <h1 class="text-3xl font-bold mb-8"><?php the_title(); ?></h1>
        
        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-8">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
          </div>
        <?php endif; ?>
        
        <div class="prose max-w-none">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
