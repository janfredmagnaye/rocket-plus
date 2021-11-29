<?php
// Stable Optimizations
function disable_dashicons(){
    if(get_option('disable_dashicons')){
        wp_dequeue_style('dashicons' );
    }
}
add_action( 'wp_enqueue_scripts', 'disable_dashicons');

// function optimizations_table() {
//     if(get_option('rocket_optimizations') == "true"){
//         echo 'style="display:block;"';
//     } else {
//         echo 'style="display:none"';
//     }
// }
// /**
//  * Enqueue scripts and styles.
//  */
// function theme_scripts() {
//     if(get_option('rocket_optimizations') == "true"){
//         if(get_option( 'optimize_theme_scripts_styles' )){
//             wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
//             wp_deregister_script( 'jquery' );
//             wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
//             wp_enqueue_script( 'jquery' );
//             //wp_enqueue_script( 'comment-reply' );
//         }
//     }
// }
// add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// /**
//  * Move jQuery to the footer.
//  */
// function jquery_footer_enqueue_scripts() {
//     if(get_option('rocket_optimizations') == "true"){
//         if(get_option('footer_jQuery')){
//             wp_scripts()->add_data( 'jquery', 'group', 1 );
//             wp_scripts()->add_data( 'jquery-core', 'group', 1 );
//             wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
//         }  
//     }
// }
// add_action( 'wp_enqueue_scripts', 'jquery_footer_enqueue_scripts' );


// /**
//  * Disable WooCommerce block styles (front-end)
//  */
// function pv_disable_woocommerce_block_styles(){
//     if(get_option('rocket_optimizations') == "true"){
//         if(get_option( 'disable_wc_blk_styles' )){
//             wp_dequeue_style('wc-block-style' );
//             wp_dequeue_style('wp-block-library' );
//             wp_dequeue_style('js_composer_front' );
//             wp_dequeue_style('dashicons' );
//         }
//     }
// }
// add_action( 'wp_enqueue_scripts', 'pv_disable_woocommerce_block_styles');



// function add_rel_preload($html, $handle, $href, $media) {
//     if(get_option('rel_preload')){
//         if (is_admin())
//             return $html;
//         $html = <<<EOT
//         <link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
//         EOT;
//             return $html;
//     }   
// }
// add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );



// // /**
// //  * Add Async to script tags
// //  * @param $tag
// //  * @param $handle
// //  * @return string|string[]
// //  */
// function add_async_attribute($tag, $handle) {
//     if(get_option('rocket_optimizations') == "true"){
//         if(get_option( 'async_scripts' )){
//             // add script handles to the array below
//             $scripts_to_async = ['my-js-handle', 'another-handle'];
//             foreach($scripts_to_async as $async_script) {
//                 if ($async_script === $handle) {
//                     return str_replace(' src', ' async="async" src', $tag);
//                 }
//             }
//             return $tag;
//         }  
//     }
// }
// add_filter('script_loader_tag', 'add_async_attribute', 10, 2);