<?php
	/* Sidebar */
	function rocketTopHeader() {
		register_sidebar( array(
			'name' => __( 'Top Header', 'rocket' ),
			'id' => 'top-header-widget',
			'description' => __( 'Displays the Top-most header information', 'rocket' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
		) );
	}
	function rocketHeader() {
		register_sidebar( array(
		   'name' => __( 'Header', 'rocket' ),
		   'id' => 'header-widget',
		   'description' => __( 'Contents of the Header. Shortcodes [siteinfo type=url/name]', 'rocket' ),
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget' => '</div>',
		) );
	 }
	 function rocketFooter() {
		register_sidebar( array(
		   'name' => __( 'Footer', 'rocket' ),
		   'id' => 'footer-widget',
		   'description' => __( 'Displays a 4 Column Widget(s)', 'rocket' ),
		   'before_widget' => '<div id="%1$s" class="widget col-md-3 %2$s">',
		   'after_widget' => '</div>',
		   'before_title' => '<h4 class="widget-title">',
		   'after_title' => '</h4>',
		) );
	 }
	 
	 function ctaBeforeFooter() {
		register_sidebar( array(
		   'name' => __( 'CTA Before Footer', 'rocket' ),
		   'id' => 'cta-before-footer',
		   'description' => __( 'CTA before footer section', 'rocket' ),
		   'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-6">',
		   'after_widget' => '</div>',
		   'before_title' => '<h3 class="widget-title">',
		   'after_title' => '</h3>',
		) );
	 }
	
	function rocketSidebar() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'rocket' ),
			'id' => 'primary-sidebar',
			'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}


	/* Register Sidebars */
	function rocketSidebarRegister(){
		add_action( 'widgets_init', 'rocketTopHeader' );
		add_action( 'widgets_init', 'rocketHeader' );	 	
		add_action( 'widgets_init', 'rocketFooter' );	 	
		add_action( 'widgets_init', 'ctaBeforeFooter' );	 
		add_action( 'widgets_init', 'rocketSidebar' );
	}

	
