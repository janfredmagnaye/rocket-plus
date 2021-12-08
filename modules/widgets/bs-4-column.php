<?php 

// Creating the widget 
class bs4_column_widget extends WP_Widget {
    protected $defaults;
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'bs4_column_widget', 
              
            // Widget name will appear in UI
            __('Bootstrap 4 Column', 'bs4_column_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Add Bootstrap Column to your sidebar. Make sure the sidebar is contained in a row before adding.', 'bs4_column_widget_domain' ), ) 
        );
        // Setup default values
        $this->defaults = array(
            'title'  => 'Title',
            'class'  => 'col',
            'content'  => 'Column Content',
        );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        // Call for Defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        // Apply Defaults to variables
        $title     =  apply_filters( 'widget_title', $instance['title'] );
        $class     =  $instance['class'];
        $content = (!is_plugin_active( 'elementor/elementor.php' )) ? apply_filters('the_content', $instance['content']) : $instance['content'];
  
        // Front-end rendering
        echo '<div class="'.$class.'">';
            echo '<div class="column-content">';  
            echo $content; 
            echo '</div>';            
        echo '</div>';
        
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        if ( !empty( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( !empty( $instance[ 'class' ] ) ) {
            $class = $instance[ 'class' ];
        }
        if ( !empty( $instance[ 'content' ] ) ) {
            $content = $instance[ 'content' ];
        }
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'Column class:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>" required />
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
        $instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';
        $instance['content'] = $new_instance['content'];
        return $instance;
    }
     
    // Class bs4_column_widget ends here
} 
// Register Widget
function bs4_column_load_widget() {
    register_widget( 'bs4_column_widget' );
}
add_action( 'widgets_init', 'bs4_column_load_widget' );