<?php
/**
* Ajoute le widget Classic Prllx.
*/


add_action( 'widgets_init', function() { register_widget( 'Prllx_Controller' ); } );
class Prllx_Controller extends WP_Widget {

    /**
     * Intègre le widget à WordPress.
     */
    public function __construct() {
        parent::__construct(
            'Prllx_Controller', // ID
            'Prllx Controller', // Nom
            array( 'description' => __( 'Ajoute un controleur Prllx', 'text_domain' ), 'customize_selective_refresh' => true,) // Arguments
        );
        if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
          // add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        }
    }

    /**
     * Front-end du widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Valeurs enregistré dans la bd.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $before_widget;
        if ( ! empty( $title ) ) {
          echo $before_title . $title . $after_title;
        }

        $duration = $instance['duration'];
        $offset = $instance['offset'];
        $targetElement = $instance['targetElement'];
        $triggerHook = $instance['triggerHook'];
        $reverse = $instance['reverse'];
        $tweenChanges = $instance['tweenChanges'];
        $indicators = $instance['indicators'];
        $do_pin = $instance['do_pin'];

        $effectDuration = $instance['effectDuration'];
        $effectName = $instance['effectName'];
        $effectParam = $instance['effectParam'];

        echo '
        <script>
        // init controller
        var controller = new ScrollMagic.Controller();

        ( function($) {

          $(function () { // wait for document ready
          		// init controller
          		var controller = new ScrollMagic.Controller();

          		// build tween
          		var tween = TweenMax.to("'.$targetElement.'", "'.$effectDuration.'", {'.$effectName.': '.$effectParam.', ease: Linear.easeNone});

          		// build scene
          		var scene = new ScrollMagic.Scene({ duration: '.$duration.'})
          						.setTween(tween)
                      .offset("'.$offset.'")
                      .triggerHook("'.$triggerHook.'")
                      '; if ($reverse!=='true'){ echo ('.reverse(false)');}
                         if ($tweenChanges==='true'){ echo ('.tweenChanges("'.$targetElement.'")');}
                         if ($do_pin==='true'){ echo ('.setPin("'.$targetElement.'", {pushFollowers: false})');}
                         if ($indicators==='true'){ echo ('.addIndicators()');}
          						echo'.addTo(controller);

          	});

        } ) ( jQuery );
        </script>';

        echo $after_widget;
    }

    /**
     * Formulaire Back-end du widget.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Les valeurs précédement enregistrés dans la bd.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'text_domain' );
        }

        /**
        *  Effect Options
        */
        if ( isset( $instance[ 'effectDuration' ] ) ) { $effectDuration = $instance[ 'effectDuration' ];
        } else { $effectDuration = __( '0.5', 'text_domain' );}

        if ( isset( $instance[ 'effectName' ] ) ) { $effectName = $instance[ 'effectName' ];
        } else { $effectName = __( 'rotation', 'text_domain' );}

        if ( isset( $instance[ 'effectParam' ] ) ) { $effectParam = $instance[ 'effectParam' ];
        } else { $effectParam = __( '360', 'text_domain' );}

        /**
        * Scroll Options
        */
        if ( isset( $instance[ 'duration' ] ) ) { $duration = $instance[ 'duration' ];
        } else { $duration = __( '300', 'text_domain' );}

        if ( isset( $instance[ 'offset' ] ) ) { $offset = $instance[ 'offset' ];
        } else { $offset = __( '0', 'text_domain' );}

        if ( isset( $instance[ 'targetElement' ] ) ) { $targetElement = $instance[ 'targetElement' ];
        } else { $targetElement = __( '#trigger', 'text_domain' );}

        if ( isset( $instance[ 'triggerHook' ] ) ) { $triggerHook = $instance[ 'triggerHook' ];
        } else { $triggerHook = __( '0.5', 'text_domain' );}

        if ( isset( $instance[ 'reverse' ] ) ) { $reverse = $instance[ 'reverse' ];
        } else { $reverse = __( 'true', 'text_domain' );}

        if ( isset( $instance[ 'tweenChanges' ] ) ) { $tweenChanges = $instance[ 'tweenChanges' ];
        } else { $tweenChanges = __( 'true', 'text_domain' );}

        if ( isset( $instance[ 'indicators' ] ) ) { $indicators = $instance[ 'indicators' ];
        } else { $indicators = __( 'true', 'text_domain' );}

        if ( isset( $instance[ 'do_pin' ] ) ) { $do_pin = $instance[ 'do_pin' ];
        } else { $do_pin = __( 'true', 'text_domain' );}


        ?>
        <!-- Titre -->
        <p>
          <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php echo( 'Titre du controller (Un controller = un effet)' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'title' ); ?>"
                  name="<?php echo $this->get_field_name( 'title' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $title );
                  ?>" />
        </p>

        <p>---- Effect Options ---- </p>
        <!-- Effect duration-->
        <p>
          <label for="<?php echo $this->get_field_id( 'effectDuration' ); ?>"><?php echo( 'Durée de l\'effet' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'effectDuration' ); ?>"
                  name="<?php echo $this->get_field_name( 'effectDuration' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $effectDuration ); ?>" />
        </p>

        <!-- Effect name-->
        <p>
          <label for="<?php echo $this->get_field_id( 'effectName' ); ?>"><?php echo( 'Nom de l\'effet (en px)' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'effectName' ); ?>"
                  name="<?php echo $this->get_field_name( 'effectName' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $effectName ); ?>" />
        </p>

        <!-- Effect param-->
        <p>
          <label for="<?php echo $this->get_field_id( 'effectParam' ); ?>"><?php echo( 'Paramètre de l\'effet' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'effectParam' ); ?>"
                  name="<?php echo $this->get_field_name( 'effectParam' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $effectParam ); ?>" />
        </p>

        <p>---- Scroll Options ---- </p>

        <!-- duration-->
        <p>
          <label for="<?php echo $this->get_field_id( 'duration' ); ?>"><?php echo( 'Durée de l\'animation (en px)' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'duration' ); ?>"
                  name="<?php echo $this->get_field_name( 'duration' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $duration ); ?>" />
        </p>
        <!-- offset-->
        <p>
          <label for="<?php echo $this->get_field_id( 'offset' ); ?>"><?php echo( 'Offset : décalage du début de l\'animation par rapport au trigger(en px, 0 = position du trigger)' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'offset' ); ?>"
                  name="<?php echo $this->get_field_name( 'offset' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $offset ); ?>" />
        </p>
        <!-- targetElement -->
        <p>
          <label for="<?php echo $this->get_field_id( 'targetElement' ); ?>"><?php echo( ' Id ou class de l\'élément à animer' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'targetElement' ); ?>"
                  name="<?php echo $this->get_field_name( 'targetElement' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $targetElement ); ?>" />
        </p>
        <!-- triggerHook -->
        <p>
          <label for="<?php echo $this->get_field_id( 'triggerHook' ); ?>"><?php echo( 'TriggerHook : Position du trigger : 0 = haut de page, 1 = bas de page' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'triggerHook' ); ?>"
                  name="<?php echo $this->get_field_name( 'triggerHook' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $triggerHook ); ?>" />
        </p>
        <!-- reverse -->
        <p>
          <label for="<?php echo $this->get_field_id( 'reverse' ); ?>"><?php echo( 'Reverse : Effet actif sur scrollup' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'reverse' ); ?>"
                  name="<?php echo $this->get_field_name( 'reverse' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $reverse ); ?>" />
        </p>
        <!-- tweenChanges -->
        <p>
          <label for="<?php echo $this->get_field_id( 'tweenChanges' ); ?>"><?php echo( 'TweenChanges : prise en compte de la vitesse de scroll' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'tweenChanges' ); ?>"
                  name="<?php echo $this->get_field_name( 'tweenChanges' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $tweenChanges ); ?>"

                  />
        </p>

        <p>---- Actions ---- </p>

        <!-- indicators -->
        <p>
          <label for="<?php echo $this->get_field_id( 'indicators' ); ?>"><?php echo( 'Ajoute les indicators' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'indicators' ); ?>"
                  name="<?php echo $this->get_field_name( 'indicators' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $indicators ); ?>"
                  />
        </p>

        <!-- do_pin -->
        <p>
          <label for="<?php echo $this->get_field_id( 'do_pin' ); ?>"><?php echo( 'Pin (fixe l\'élément le temps de l\'effet)' ); ?></label>
          <input class="widefat"
                  id="<?php echo $this->get_field_id( 'do_pin' ); ?>"
                  name="<?php echo $this->get_field_name( 'do_pin' ); ?>"
                  type="text"
                  value="<?php echo esc_attr( $do_pin ); ?>"
                  />
        </p>
        <?php
    }

    /**
     * Sauvegarde les données du formulaire dans la bd wp.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance   Nouvelles valeurs à enregistrer.
     * @param array $old_instance   Valeurs précédentes.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = ( !empty( strip_tags($new_instance['title'] ) )) ? strip_tags( $new_instance['title'] ) : '';

        // effect
        $instance['effectDuration'] = ( !empty( strip_tags($new_instance['effectDuration'] ) )) ? strip_tags( $new_instance['effectDuration'] ) : '';
        $instance['effectName'] = ( !empty( strip_tags($new_instance['effectName'] ) )) ? strip_tags( $new_instance['effectName'] ) : '';
        $instance['effectParam'] = ( !empty( strip_tags($new_instance['effectParam'] ) )) ? strip_tags( $new_instance['effectParam'] ) : '';

        // Scroll
        $instance['duration'] = (!empty(strip_tags($new_instance['duration'])) ) ? strip_tags( $new_instance['duration'] ) : '';
        $instance['offset'] = (!empty(strip_tags($new_instance['offset']) )) ? strip_tags( $new_instance['offset'] ) : '';
        $instance['targetElement'] = (!empty(strip_tags($new_instance['targetElement'])) ) ? strip_tags( $new_instance['targetElement'] ) : '';
        $instance['triggerHook'] = (!empty(strip_tags($new_instance['triggerHook']) )) ? strip_tags( $new_instance['triggerHook'] ) : '';
        $instance['reverse'] = (!empty(strip_tags($new_instance['reverse']) )) ? strip_tags( $new_instance['reverse'] ) : '';
        $instance['tweenChanges'] = (!empty(strip_tags($new_instance['tweenChanges']) )) ? strip_tags( $new_instance['tweenChanges'] ) : '';
        $instance['indicators'] = (!empty(strip_tags($new_instance['indicators']) )) ? strip_tags( $new_instance['indicators'] ) : '';
        $instance['do_pin'] = (!empty(strip_tags($new_instance['do_pin']) )) ? strip_tags( $new_instance['do_pin'] ) : '';

        return $instance;
    }

} // class Prllx_Controller
