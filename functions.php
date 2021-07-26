<?php

	// Import PHP Files
	require_once('includes/libs/wp_bootstrap_navwalker.php');
	require_once('includes/libs/class-tgm-plugin-activation.php');
	require_once('includes/theme-settings/asset-import.php');
	require_once('includes/theme-settings/sidebars.php');
	require_once('includes/theme-settings/theme-settings.php');
	require_once('includes/theme-settings/shortcodes.php');
	require_once('includes/theme-settings/required-plugins.php');
	require_once('includes/theme-settings/backend.php');
	// Widgets
	require_once('modules/widgets/collapsible.php');
	require_once('modules/widgets/bs-4-column.php');
	require_once('modules/widgets/rocket-menu.php');
	// Modules
	require_once('modules/custom-module.php');
	require_once('modules/optimizations.php');
	// QR Shortcode Module
	if(get_option('qr-shortcode-module')){
		require_once('modules/qr-shortcode-module.php');
	}
	// Mobile Menu Module
	if(get_option('rocket-mobile-menu')){
		require_once('modules/mobile-menu.php');
	}
	// WooCommerce Modules
	function is_woocommerce_activated() {
        return class_exists( 'woocommerce' );
    }
	if(is_woocommerce_activated()){
		require_once('modules/woocommerce-module.php');
	}
	
	function excerpt_more( $more ) {
		return '';
	}
	
	
	// Blog Pagination
	function rocketPage() {
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_text'          => __('«'),
			'next_text'          => __('»'),
			'total' => $wp_query->max_num_pages
		) );
	}
	

	/**
	 * Initialize Functions
	 */
	function launchRocket(){
		// Styles & Scripts Load on frontend
		add_action( 'wp_enqueue_scripts', 'rocketStyle' );
		add_action( 'wp_enqueue_scripts', 'rocketScript' );

		// Inline Scripts and Styles
		add_action( 'wp_head', 'dynamicJS',100);
		add_action( 'wp_head', 'dynamicCSS',100);
		
		//Remove Version
		add_filter( 'script_loader_src', 'removeScriptVersion', 15, 1 );
		add_filter( 'style_loader_src', 'removeScriptVersion', 15, 1 );
	
		// Admin Functions
		if(is_admin()){
			// Admin Styles
			add_action( 'admin_enqueue_scripts', 'rocketAdminStyle' );
			// Admin Theme Options and Settings
			add_action( 'admin_menu', 'rocketThemeOptions' );
			add_action( 'admin_init', 'rocketThemeSettings');
			add_action('admin_head', 'adminFavicon');
			add_action( 'admin_enqueue_scripts', 'enqueue_color_picker' );
			add_theme_support( 'post-thumbnails' ); 
		}
		// Required Plugins
		add_action( 'tgmpa_register', 'requiredPlugins' ); 
		  
		// Register Sidebars
		rocketSidebarRegister();

		// WooCommerce Widgets
		if(is_woocommerce_activated()){
			rocket_woocommerce_widgets();
		}
		
		// Register Navigation Menus
		register_nav_menu( 'primary', __( 'Primary Menu', 'rocket' ) );
		register_nav_menu( 'mobile', __( 'Mobile Menu', 'rocket' ) );

		// Shortcodes
		rocketShortcodes();
	}	
	
	/** 
	 * Initialize Theme
	 */
	launchRocket();

