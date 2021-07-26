<?php 

// Creating the widget 
class rckt_menu_widget extends WP_Widget {
    protected $defaults;
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'rckt_menu_widget', 
              
            // Widget name will appear in UI
            __('Rocket Menu', 'rckt_menu_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Add Rocket Menu to your Sidebar in a form of a Widget', 'rckt_menu_widget_domain' ), ) 
        );
        // Setup default values
        $this->defaults = array(
            'class'  => 'col',
        );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        // Call for Defaults
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        // Apply Defaults to variables
        $class     =  $instance['class'];
        
        // Front-end rendering
        echo '<div class="'.$class.'">';
            echo '<nav id="nav-menu" class="navbar navbar-expand-lg">';
            echo do_shortcode( '[rocketmenu]' );
            echo '</nav>';
        echo '</div>';
        
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        if ( !empty( $instance[ 'class' ] ) ) {
            $class = $instance[ 'class' ];
        }
        // Widget admin form
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'Column class:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo esc_attr( $class ); ?>" required />
            </p>
        <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';
        return $instance;
    }
     
    // Class rckt_menu_widget ends here
} 
// Register Widget
function rckt_menu_load_widget() {
    register_widget( 'rckt_menu_widget' );
}
add_action( 'widgets_init', 'rckt_menu_load_widget' );