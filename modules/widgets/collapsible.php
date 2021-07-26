<?php 

// Creating the widget 
class collapsible_widget extends WP_Widget {
    protected $defaults;
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'collapsible_widget', 
              
            // Widget name will appear in UI
            __('Collapsible', 'collapsible_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Add Bootstrap Collapsible to your sidebars', 'collapsible_widget_domain' ), ) 
        );
        // Setup default values
        $this->defaults = array(
            'title'  => 'Collapsible Header',
            'title_tag' => 'span',
            'title_type'  => 'button',
            'identifier'  => 'collapsible-identifier',
            'content'  => 'Collapsible Content',
        );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        // Call for Defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );

        $title = apply_filters( 'widget_title', $instance['title'] );
        $title_tag =  apply_filters( 'widget_title', $instance['title_tag'] );
        $title_type = $instance['title_type'];
        $identifier = apply_filters( 'widget_title', $instance['identifier'] );
        $widget_id = $args['id'];
        $content = $instance['content'];
  
        // before and after widget arguments are defined by themes
        echo '<div class="collapsible-header">';
            if($title_type=='link') {
                echo '  <a class="collapsible-header-link" data-toggle="collapse" href="#'.$identifier.'" role="button" aria-expanded="false" aria-controls="'.$identifier.'">';
            } else {
                echo '<button class="collapsible-header-button" type="button" data-toggle="collapse" data-target="#'.$identifier.'" aria-expanded="false" aria-controls="'.$identifier.'">';
            }
            if ( ! empty( $title ) ) {
                echo '<'.$title_tag.' class="collapsible-title">' . $title . '</'.$title_tag.'>';
            }
            if($title_type=='link') {
                echo '</a>';
            } else {
                echo '</button>';
            }
        echo '</div>';
        echo '<div id="'.$identifier.'" class="collapse">';
            echo '<div class="collapsible-content">';  
            echo apply_filters('the_content',$content); 
            echo '</div>';            
        echo '</div>';
        
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        if ( !empty( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( !empty( $instance[ 'title_tag' ] ) ) {
            $title_tag = $instance[ 'title_tag' ];
        }
        if ( !empty( $instance[ 'title_type' ] ) ) {
            $title_type = $instance[ 'title_type' ];
        }
        if ( !empty( $instance[ 'identifier' ] ) ) {
            $identifier = $instance[ 'identifier' ];
        }
        if ( !empty( $instance[ 'content' ] ) ) {
            $content = $instance[ 'content' ];
        }
        // Default Fallback values
        // else {
        //     $title = __( 'Collapsible Header', 'collapsible_widget_domain' );
        //     $title_tag = __( 'span', 'collapsible_widget_domain' );
        //     $title_type = __( 'button', 'collapsible_widget_domain' );
        //     $identifier = __( 'collapsible-identifier', 'collapsible_widget_domain' );
        //     $content = __( 'Collapsible Content', 'collapsible_widget_domain' );
        // }
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title_tag' ); ?>"><?php _e( 'Title HTML Tag:' ); ?></label> 
                <input 
                class="widefat" 
                id="<?php echo $this->get_field_id( 'title_tag' ); ?>" 
                name="<?php echo $this->get_field_name( 'title_tag' ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title_tag ); ?>" 
                />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title_type' ); ?>"><?php _e( 'Title Type:' ); ?></label> 
                <select class='widefat' id="<?php echo $this->get_field_id('title_type'); ?>"
                        name="<?php echo $this->get_field_name('title_type'); ?>" type="text">
                <option value='button'<?php echo ($title_type=='button')?'selected':''; ?>>
                    Button &lt;button&gt;
                </option>
                <option value='link'<?php echo ($title_type=='link')?'selected':''; ?>>
                    Link &lt;a&gt;
                </option> 
                </select>     
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'identifier' ); ?>"><?php _e( 'Identifier ( This should be a unique value to all collapsible widgets used ):' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'identifier' ); ?>" name="<?php echo $this->get_field_name( 'identifier' ); ?>" type="text" value="<?php echo esc_attr( $identifier ); ?>" required />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label> 
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" rows="8" cols="10"><?php echo esc_textarea( $content ); ?></textarea>
            </p>

            
        <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['title_tag'] = ( ! empty( $new_instance['title_tag'] ) ) ? strip_tags( $new_instance['title_tag'] ) : '';
        $instance['title_type'] = $new_instance['title_type'];
        $instance['identifier'] = ( ! empty( $new_instance['identifier'] ) ) ? strip_tags( $new_instance['identifier'] ) : '';
        $instance['content'] = $new_instance['content'];
        return $instance;
    }
     
    // Class collapsible_widget ends here
} 
// Register Widget
function collapsible_load_widget() {
    register_widget( 'collapsible_widget' );
}
add_action( 'widgets_init', 'collapsible_load_widget' );