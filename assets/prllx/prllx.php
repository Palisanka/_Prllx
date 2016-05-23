<?php

// Compatibilité wp
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

// Header CSS
header("Content-type: text/css; charset: UTF-8");
header('Cache-control: must-revalidate');

    $brandColor = "#fff";
    $linkColor = "#fff";

    $nb_section = get_theme_mod( 'nb_section' );

    for ($i = 1 ; $i <= $nb_section ; $i++) {

      $width = get_theme_mod( 'width'.$i, 'auto' );
      $height = get_theme_mod( 'height'.$i, 'auto' );
      $left = get_theme_mod( 'left'.$i, '0' );
      $top = get_theme_mod( 'top'.$i, '0' );

      $f_s = get_theme_mod( 'f_s'.$i, '1em' );

      $background = get_theme_mod( 'img'.$i, 'white' );
      $background_color = get_theme_mod( 'bg_c'.$i, '#fff' );

      ?>

      .component<?php echo $i; ?> {
        position:absolute !important;
        height: <?php echo $height; ?> !important;
        width: <?php echo $width; ?>;
        left: <?php echo $left; ?>;
        top: <?php echo $top; ?> !important;
        font-size: <?php echo $f_s; ?>;
        background-image: url(<?php echo $background; ?>);
        background-size: cover;
        background-color: <?php echo $background_color; ?>;
      }
  <?php  }
?>

<!-- Typographie -->

body, input, select, textarea {
  color: _palette(fg);
  font-family: _font(family);
  font-size: 14pt;
  font-weight: _font(weight);
  line-height: 1.75;
}

a {
  @include vendor('transition', (
    'color #{_duration(transition)} ease',
    'border-bottom-color #{_duration(transition)} ease'
  ));

  color: inherit;
  text-decoration: none;

  &:before {
    @include vendor('transition', (
      'color #{_duration(transition)} ease'
    ));
  }

  &:hover {
    border-bottom-color: transparent;
    color: _palette(accent) !important;

    &:before {
      color: _palette(accent) !important;
    }
  }
}

strong, b {
  color: _palette(fg-bold);
  font-weight: _font(weight-bold);
}

em, i {
  font-style: italic;
}

p {
  margin: 0 0 _size(element-margin) 0;
}

h1, h2, h3, h4, h5, h6 {
  color: _palette(fg-bold);
  font-family: _font(family-heading);
  font-weight: _font(weight-heading-bold);
  letter-spacing: _font(kerning-heading);
  line-height: 1.65;
  margin: 0 0 (_size(element-margin) * 0.5) 0;
  text-transform: uppercase;

  a {
    color: inherit;
    border-bottom: 0;
  }
}

h2 {
  font-size: 1.1em;
}

h3 {
  font-size: 0.9em;
}

#wrapper {
  margin: 0 !important;
}

.parallaxParent {
  height: 100vh;
  overflow: hidden;
  position: relative;
}
.parallaxParent > * {
  height: 200%;
  position: relative;
  top: -100%;
}

.full-page {
  background-size: auto 60%;
  background-position: -276px 0px;
  background-size: cover;
}
*{
  font-size: 1.2em;
  letter-spacing: 4px;
}

.box{
  position: absolute;
  z-index: 9;
}

.center{
  top:50%;
}

.style1{
  color: white;
}

#wrapper {
  flex-direction: column;
}
