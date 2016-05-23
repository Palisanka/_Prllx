
<?php get_header(); ?>




  <!-- Main -->
    <div id="main">

      <?php
      if(is_home()){?>
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/sass/mainHome.css" type="text/css" media="screen" />
      <?php }?>
        <!-- Main -->
          <div id="main">

            <!-- THE LOOP -->
            <?php if(have_posts()) : ?>
              <?php while(have_posts()) : the_post(); ?>

              <!-- Post -->
      				<article class="thumb">
      					<a href="<?php the_permalink(); ?>" class="image"><?php the_post_thumbnail( array( 600, 600 ) ); ?></a>
      					<h2><?php the_title(); ?></h2>
      				</article>

              <?php endwhile; ?>
            <?php endif; ?>

          </div>



        <?php //get_sidebar(); ?>

      </div> <!-- Fin wrapper -->

  </div>

</div> <!-- Fin wrapper -->
<?php wp_footer(); ?>
