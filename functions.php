<?php

/**
* Ajoute le menu customizable
*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'customize-selective-refresh-widgets' );

/**
* Ajoute le menu customizable
*/
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
     )
   );
 }

/**
* Ajoute les sidebars customizables
*/
add_action( 'widgets_init', 'add_sidebars' );
function add_sidebars() {
  /* Register the 'classic' sidebar. */
  register_sidebar(
      array(
          'id'            => 'classic',
          'name'          =>  'Classic Sidebar' ,
          'description'   =>  'A classic left sidebar.' ,
          'before_widget' => '<section><div class="mini-posts">',
          'after_widget'  => '</div></section>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );
  /* Register the 'hidden' sidebar. */
  register_sidebar(
      array(
          'id'            => 'hidden',
          'name'          =>  'The hidden right sidebar' ,
          'description'   =>  'The hidden right sidebar' ,
          'before_widget' => '<section id="menu">',
          'after_widget'  => '</section>',
          'before_title'  => '<h3>',
          'after_title'   => '</h3>',
      )
  );


  /* Repeat register_sidebar() code for additional sidebars. */
}

/**
* Scripts & styles
*/
function add_scripts() {
  // Style
  wp_enqueue_style( 'main_css', get_template_directory_uri().'/assets/sass/main.css' );
  wp_enqueue_style( 'prllx', get_template_directory_uri().'/assets/prllx/prllx.php' );

  // Script
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/prllx/js/jquery.min.js');
  wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/assets/prllx/js/scrollmagic.min.js');
  wp_enqueue_script( 'TweenMax', get_template_directory_uri() . '/assets/prllx/js/TweenMax.min.js');
  wp_enqueue_script( 'addIndicators', get_template_directory_uri() . '/assets/prllx/js/debug.addIndicators.js');
  wp_enqueue_script( 'gsap', get_template_directory_uri() . '/assets/prllx/js/animation.gsap.js');
  wp_enqueue_script( 'skel', get_template_directory_uri().'/assets/js/skel.min.js');
  wp_enqueue_script( 'util', get_template_directory_uri().'/assets/js/util.js');
  wp_enqueue_script( 'ie', get_template_directory_uri().'/assets/js/ie/respond.min.js');
  wp_enqueue_script( 'main_js', get_template_directory_uri().'/assets/js/main.js');
}add_action( 'wp_enqueue_scripts', 'add_scripts' );

/**
* Ajoute les Widgets
*/
function add_my_widgets() {
  // Ajoute le widget Mini_Posts.
  require get_template_directory() . '/inc/mini_post.php';

  // Ajoute le widget prllx scroll.
  require get_template_directory() . '/inc/prllx.php';

  // Ajoute le support du prllx_customizer.
  require get_template_directory() . '/inc/prllx_customizer.php';

  // Ajoute le support de la typo dans le customizer.
  require get_template_directory() . '/inc/typo_customizer.php';

}  add_my_widgets();

/**
* Ajoute les plugins
*/
function add_so_plugins() {
  // Check si page builder est déjà intallé
  if(!defined('SITEORIGIN_PANELS_VERSION')){
    include_once('inc/plugins/siteorigin-panels/siteorigin-panels.php');
  }
  // Check si css editor est déjà intallé
  if(!defined('SOCSS_VERSION')){
    include_once('inc/plugins/so-css/so-css.php');
  }
  // Check si widget bundle est déjà intallé
  if(!defined('SOW_BUNDLE_VERSION')){
    include_once('inc/plugins/so-widgets-bundle/so-widgets-bundle.php');
  }
} add_so_plugins();
