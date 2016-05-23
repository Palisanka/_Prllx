<?php
/**
* Ajoute le widget Mini_Posts.
*/
add_action( 'widgets_init', function() { register_widget( 'Mini_Posts' ); } );
class Mini_Posts extends WP_Widget {

    /**
     * Intègre le widget à WordPress.
     */
    public function __construct() {
        parent::__construct(
            'mini_posts', // Base ID
            'Mini_Posts', // Name
            array( 'description' => __( 'Ajoute les mini posts : widget affichant une page avec image à la une, titre, date et auteur', 'text_domain' ), ) // Arguments
        );
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
        $page = get_page($instance['link_target'] );

        $page_title = $page->post_title;
        $page_date = $page->post_date;
        $page_link = get_permalink($page);
        $img = get_the_post_thumbnail($page,'medium');

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

        echo '
                  <!-- Mini Post -->
                    <article class="mini-post">
                      <header>
                        <h3><a href="'.$page_link.'">'.$page_title.'</a></h3>
                        <time class="published" datetime="2015-10-20">'.$page_date.'</time>
                      </header>
                      <a href="'.$page_link.'" class="image">'.$img.'</a>
                    </article>';

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
        }
        else {
            $title = __( 'New title', 'text_domain' );
        }
        ?>
        <!-- Titre -->
        <p>
          <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php echo( 'Title:' ); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>


        <!-- List Pages -->
        <p>
          <label for="<?php echo $this->get_field_id( 'link_target' ); ?>"><?php echo( 'Page:' ); ?></label>
          <?php
          // Liste les pages
            wp_dropdown_pages(array(
              'id' => $this->get_field_id('link_target'),
              'name' => $this->get_field_name('link_target'),
              'selected' => $instance['link_target']
            ));
            ?>
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
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['link_target'] = strip_tags($new_instance['link_target']);

        return $instance;
    }

} // class Mini_Posts
