<?php 
// Backend Functions
function enqueue_color_picker( $hook ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'backend-script-handle', get_template_directory_uri().'/assets/js/backend.js', array( 'wp-color-picker' ), false, true );
}
function fixed_dp_paragraph_tinymce() {
    echo "<script type='text/javascript'>

    setTimeout(function(){
        jQuery(window).scroll(function() {
            styleAttr = jQuery('.mce-top-part .mce-toolbar-grp').attr('style');
            listAttr = styleAttr.trim().split(' ');
            if(listAttr[1] == 'fixed;') {
                jQuery('.mce-floatpanel').css('position','fixed');
            } else {
                jQuery('.mce-floatpanel').css('position','absolute');
            }
        });
    },5000)

    </script>";
}
// Create Privacy & Cookie Policy Pages on install
function rocket_after_setup(){
    classicEditorMode();
    classicWidgetsMode();
}
// Admin Favicon
function adminFavicon() {
    echo '<link href="'.get_option('admin_favicon').'" rel="icon" type="image/x-icon">';
}
// Register and enqueue a custom stylesheet in the WordPress admin.
function rocketAdminStyle() {
    wp_register_style( 'backend-css-styles', get_template_directory_uri() . '/assets/css/backend.css', false, '1.0.0' );
    wp_enqueue_style( 'backend-css-styles' );
    wp_register_style( 'backend-js-script',  get_template_directory_uri().'/assets/js/backend.js',array('jquery'), false, '1.0.0');
    wp_enqueue_script( 'backend-js-script');
}

// Add Actions on Backend
add_action('admin_footer', 'fixed_dp_paragraph_tinymce');
add_action('after_setup_theme', 'rocket_after_setup');

// Add Filters on Backend
// Enable Shortcodes on Widgets
add_filter( 'widget_text', 'do_shortcode' );

function classicEditorMode(){
    if(get_option('classic-editor-module') == "true"){
        add_filter('use_block_editor_for_post','__return_false');
    }
}
function classicWidgetsMode(){
    if(get_option('classic-widgets-module') == "true"){
        remove_theme_support( 'widgets-block-editor' );
    }
}
