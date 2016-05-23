<?php
/**
 * Typographie
 */
function custo_typo( $wp_customize ) {
  /**
  * Section : le container
  */
      /**
      * Section : Typographie
      */
      $wp_customize->add_section( 'typographie', array(
        'title' => 'Typographie',
        'description' => 'Paramètre pour Typographie',
        'priority' => 10,
        'panel' => 'Prllx',
      ) );

    /**
    * Font-family
    */
        // Setting
        $wp_customize->add_setting( 'font_family' );
        // Control
        $wp_customize->add_control('font_family', array(
          'label' => 'Font Name',
          'section' => 'typographie',
          'type' => 'text',
          'settings' => 'font_family'
        ) );
    /**
    * Font-Color
    */
        // Setting
        $wp_customize->add_setting( 'font_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ));
        // Control
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'font_color',
                array(
                    'label' => 'FontColor',
                    'section' => 'typographie',
                    'settings' => 'FontColor'
                )
            )
        );
    /**
    * Font-size
    */
        // Setting
        $wp_customize->add_setting( 'font_size' );
        // Control
        $wp_customize->add_control('font_size', array(
          'label' => 'Font Size',
          'section' => 'typographie',
          'type' => 'text',
          'settings' => 'font_size'
        ) );
    /**
    * Font-weight
    */
        // Setting
        $wp_customize->add_setting( 'font_weight' );
        // Control
        $wp_customize->add_control('font_weight', array(
          'label' => 'Font Weight',
          'section' => 'typographie',
          'type' => 'radio',
          'settings' => 'font_weight',
          'choices' => array(
              'normal' => 'normal',
              'bold' => 'bold',
              'lighter' => 'lighter',
          ),
        ) );
    /**
    * Line-Height
    */
        // Setting
        $wp_customize->add_setting( 'line-height' );
        // Control
        $wp_customize->add_control('line-height', array(
          'label' => 'Line Height',
          'section' => 'typographie',
          'type' => 'text',
          'settings' => 'line-height'
        ) );


        /**
         * Adds textarea support to the theme customizer
         */
        class Example_Customize_Textarea_Control extends WP_Customize_Control {
            public $type = 'textarea';

            public function render_content() {
                ?>
                    <label>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
                    </label>
                    <button>Add </button>
                <?php
            }
        }

        // $wp_customize->add_setting( 'textarea' );
        //
        // $wp_customize->add_control(
        //     new Example_Customize_Textarea_Control(
        //         $wp_customize,
        //         'textarea',
        //         array(
        //             'label' => 'Textarea',
        //             'section' => 'typographie',
        //             'settings' => 'textarea'
        //         )
        //     )
        // );


}
add_action( 'customize_register', 'custo_typo' );
