<?php
    
    function rocketMobileMenuSidebar(){
        register_sidebar( array(
            'name' => __( 'Mobile Menu', 'rocket' ),
            'id' => 'rocket-mobile-menu',
            'description' => __( 'Contents for your Mobile Menu. Use the shortcode [rocket-mobile-button] to add the mobile menu button to your template', 'rocket' ),
            'before_sidebar' => '<div id="rocket-mobile-menu">',
            'after_sidebar' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
         ) );
    }
	add_action( 'widgets_init', 'rocketMobileMenuSidebar' );	 	

	function rocketMobileMenuAssets(){
        wp_enqueue_script( 'rocket-mm-script', get_template_directory_uri() . '/assets/js/rocket-mobile-menu.js', array( 'jquery' ) );
        wp_enqueue_style( 'rocket-mm-styles', get_template_directory_uri() . '/assets/css/rocket-mobile-menu.css', array() , null , 'screen and (max-width: '. get_option('mobile-breakpoint') .'px)' );
    }
    add_action( 'wp_enqueue_scripts', 'rocketMobileMenuAssets' );

    function rocketMobileMenuShortcode(){
        $button_layout = 
        '<div class="rocket-mobile-button">
            <button class="hamburger '. get_option('hamburger-class'); .'" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>';
        return $button_layout;
    }
    add_shortcode( 'rocket-mobile-button', 'rocketMobileMenuShortcode' );