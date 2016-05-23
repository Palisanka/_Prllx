
<?php get_header(); ?>

  <!-- Main -->
    <div id="main">

      <!-- THE LOOP -->
      <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>

        <!-- Post -->
          <article class="post" id="post-<?php the_ID(); ?>">
            <header>
              <div class="title">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!-- <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p> -->
              </div>
            </header>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="image featured fit" >
                <?php the_post_thumbnail( array( 840, 341 ) ); ?>
              </a>
            <?php endif; ?>

            <!-- Contenu -->
            <div class="txtbox">
              <?php the_content(); ?>
            </div>
          </article>

        <?php endwhile; ?>
      <?php endif; ?>

    </div>




</div> <!-- Fin wrapper -->

<?php wp_footer(); ?>
<?php get_footer(); ?>
