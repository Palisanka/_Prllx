<?php
/**
 * Template Name: Prllx Section Full
 *
 */

get_header();
?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/prllx/prllx.php" type="text/css" media="screen" />

  <!-- Prllx Container -->
  <div class="container">
  <?php

    $nb_section = get_theme_mod( 'nb_section' );

    for ($i = 1 ; $i <= $nb_section ; $i++) {
      $txt = get_theme_mod( 'texte'.$i, '' );
      $img = get_theme_mod( 'img_bg'.$i, 'No image has been saved yet.' );
      ?>
      <div id="<?php echo 'parallax'.$i; ?>" class="parallaxParent">
        <div class="full-page" style="background-image: url(<?php echo $img; ?>);"></div>
        <span class="component<?php echo $i; ?>"><?php echo $txt ?></span>
      </div>
  <?php } ?>

  </div> <!-- end prllx container -->

<?php get_footer(); ?>
