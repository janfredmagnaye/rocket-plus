<?php

    function rocketOwlCarousel( $atts ){

        $return_string = '';
        $container ='.owl-carousel';
        $items ='3';
        $loop ='true';
        $margin ='10';
        $nav ='true';
        $dots ='true';

        extract(shortcode_atts(array(
            'container' => $container,
            'items' => $items,
            'margin' => $margin,
            'nav' => $nav,
            'dots' => $dots,
        ), $atts));
         
        $return_string .= '$o = jQuery.noConflict();$o(function(){';
        $return_string .= '$o("'. $container .'").owlCarousel({';
        $return_string .= 'items: '.$items.',';
        $return_string .= 'loop: '.$loop.',';        
        $return_string .= 'margin: '.$margin.',';
        $return_string .= 'nav: '.$nav.',';    
        $return_string .= 'dots: '.$dots.',';    
        $return_string .= '});';    
        $return_string .= '});';    
        
        wp_register_script( 'rocket-owl-carousel-script', '' );
        wp_enqueue_script( 'rocket-owl-carousel-script' );
        wp_add_inline_script( 'rocket-owl-carousel-script', $return_string, 'before' );
    }
    
    add_shortcode( 'rocket-owl-carousel', 'rocketOwlCarousel' );