<?php
/**
* Ajoute le support du customizer.
*/
function prllx_customizer( $wp_customize ) {
  /**
  * Panel : le container
  */
  $wp_customize->add_panel( 'Prllx', array(
    'title' => __( 'Prllx' ),
    'description' => 'Panneau prllx', // Include html tags such as <p>.
    'priority' => 160, // Mixed with top-level-section hierarchy.
    ) );
      /**
      * Section : le container
      */
          /**
          * Section : prllx
          */
          $wp_customize->add_section( 'section', array(
            'title' => 'Section',
            'description' => 'Paramètre pour Prllx',
            'priority' => 20,
            'panel' => 'Prllx',
          ) );

      /**
      * Nombre de section
      */
          // Setting
          $wp_customize->add_setting( 'nb_section' );
          // Control
          $wp_customize->add_control(
              'nb_section',
              array(
                'type' => 'text',
                'label' => 'Nombre de sections',
                'section' => 'section'
              )
          );

          for ($i = 1 ; $i <= get_theme_mod( 'nb_section' ) ; $i++) {

          /**
          * Img background
          */
          $img_id = 'img_bg'.$i;
              // Setting
              $wp_customize->add_setting( $img_id );
              // Control
              $wp_customize->add_control(
                  new WP_Customize_Image_Control(
                      $wp_customize,
                      $img_id,
                      array(
                        'label' => $img_id,
                        'section' => 'section',
                        'settings' => $img_id
                      )
                  )
                );

          /**
          * Component
          */
          for ($y = 1 ; $y <= get_theme_mod( 'nb_section' ) ; $y++) {
            /**
            * Section
            */

            /**
            * width
            */
            $w_id = 'width'.$y;
            // Setting
            $wp_customize->add_setting( $w_id );

            // Control
            $wp_customize->add_control($w_id, array(
              'label' => 'Width',
              'section' => 'section',
              'type' => 'text',
              'settings' => $w_id
            ) );
            /**
            * height
            */
            $w_id = 'height'.$y;
            // Setting
            $wp_customize->add_setting( $w_id );

            // Control
            $wp_customize->add_control($w_id, array(
              'label' => 'height',
              'section' => 'section',
              'type' => 'text',
              'settings' => $w_id
            ) );
            /**
            * Position X (left)
            */
            $posX_id = 'left'.$y;
            // Setting
            $wp_customize->add_setting( $posX_id );

            // Control
            $wp_customize->add_control($posX_id, array(
              'label' => 'Position X (left)',
              'section' => 'section',
              'type' => 'text',
              'settings' => $posX_id
              ) );
              /**
              * Position Y (top)
              */
              $posY_id = 'top'.$y;
              // Setting
              $wp_customize->add_setting( $posY_id );

              // Control
              $wp_customize->add_control($posY_id, array(
              'label' => 'Position Y (top)',
              'section' => 'section',
              'type' => 'text',
              'settings' => $posY_id
              ) );
              /**
              * Font-Size
              */
              $font_s = 'f_s'.$y;
              // Setting
              $wp_customize->add_setting( $font_s );

              // Control
              $wp_customize->add_control($font_s, array(
              'label' => 'Font-Size',
              'section' => 'section',
              'type' => 'text',
              'settings' => $font_s
              ) );
              /**
              * Texte
              */
              $txt_id = 'texte'.$y;
              // Setting
              $wp_customize->add_setting( $txt_id );

              // Control
              $wp_customize->add_control($txt_id, array(
              'label' => 'Text Content',
              'section' => 'section',
              'type' => 'textarea',
              'settings' => $txt_id
              ) );

              /**
              * Img
              */
              $img_id = 'img'.$y;
              // Setting
              $wp_customize->add_setting( $img_id );
              // Control
              $wp_customize->add_control(
              new WP_Customize_Image_Control(
              $wp_customize,
              $img_id,
              array(
              'label' => 'Background Image',
              'section' => 'section',
              'settings' => $img_id
              )
              )
              );

              /**
              * Background Color
              */
              $bg_color_id = 'bg_c'.$y;
              $wp_customize->add_setting(
              $bg_color_id,
              array(
              'default' => '#ffffff',
              'sanitize_callback' => 'sanitize_hex_color',
              'transport' => 'postMessage',
              )
              );

              $wp_customize->add_control(
              new WP_Customize_Color_Control(
              $wp_customize,
              $bg_color_id,
              array(
              'label' => 'Featured Color Background',
              'section' => 'section',
              'settings' => $bg_color_id
              )
              )
              );
            }
      }

}
add_action( 'customize_register', 'prllx_customizer' );
