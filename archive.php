
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
              <div class="meta">
                <time class="published" datetime="2015-11-01"><?php the_time('j F Y') ?></time>
                <a href="#" class="author"><span class="name"><?php the_author() ?></span><img src="<?php bloginfo('template_url'); ?>/images/avatar.jpg" alt="" /></a>
              </div>
            </header>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="image featured" >
                <?php the_post_thumbnail( array( 840, 341 ) ); ?>
              </a>
            <?php endif; ?>

            <!-- Contenu -->
            <?php the_excerpt(); ?>

            <footer>
              <!-- <ul class="actions">
                <li><a href="#" class="button big">Continue Reading</a></li>
              </ul> -->
              <ul class="stats">
                <li><a href="#"><?php the_category(', ') ?></a></li>
                <li><span class="icon fa-comment"><?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?></span></li>
              </ul>
            </footer>
          </article>

        <?php endwhile; ?>
      <?php endif; ?>


      <!-- Pagination -->
        <ul class="actions pagination">
          <li><div class="button big previous"><?php previous_posts_link("PAGE PRECEDENTE"); ?></div></li>
          <li><div class="button big next"><?php next_posts_link("PAGE SUIVANTE"); ?></div></li>
        </ul>

    </div>



  <?php get_sidebar(); ?>

</div> <!-- Fin wrapper -->
