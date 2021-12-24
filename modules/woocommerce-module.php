<?php

    if( ! function_exists( 'rocket_woocommerce' ) ){
        function rocket_woocommerce(){
            /* Default Values */
            add_option('rw_pg_default_rows', '4');
            add_option('rw_pg_min_rows', '2');
            add_option('rw_pg_max_rows', '8');
            add_option('rw_pg_default_columns', '3');
            add_option('rw_pg_min_columns', '2');
            add_option('rw_pg_max_columns', '6');
    
            /* WC Features */
            register_setting( 'option-group', 'rw_p_gallery_zoom' );
            register_setting( 'option-group', 'rw_p_gallery_lightbox' );
            register_setting( 'option-group', 'rw_p_gallery_slider' );
            register_setting( 'option-group', 'rw_remove_coupon_cart' );
            register_setting( 'option-group', 'rw_remove_sidebar_cart' );
            register_setting( 'option-group', 'rw_add_notes_cart' );
    
            // Product Grid Settings
            register_setting( 'option-group', 'rw_pg_default_rows' );
            register_setting( 'option-group', 'rw_pg_min_rows' );
            register_setting( 'option-group', 'rw_pg_max_rows' );
            register_setting( 'option-group', 'rw_pg_default_columns' );
            register_setting( 'option-group', 'rw_pg_min_columns' );
            register_setting( 'option-group', 'rw_pg_max_columns' );        
    
            // Theme Support
            add_action( 'after_setup_theme', 'rocket_woocommerce_theme_support' ); 
        }
    }

    // WC Product Header
    if( ! function_exists( 'woocommerceProductHeader' ) ){
        function woocommerceProductHeader() {
            register_sidebar( array(
                'name' => __( 'WooCommerce Product Header', 'rocket' ),
                'id' => 'wc-product-header-widget',
                'description' => __( 'WooCommerce Product Header contents', 'rocket' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<span class="h4 widget-title">',
                'after_title' => '</span>',
            ) );
        }
    }
    

    if( ! function_exists( 'rocket_woocommerce_widgets' ) ){
        function rocket_woocommerce_widgets(){
            add_action( 'widgets_init', 'woocommerceProductHeader' );	
        }
    }
    
    
    if( ! function_exists( 'rocket_woocommerce_theme_support' ) ){
        function rocket_woocommerce_theme_support(){
            /* Product Grid Settings */
            add_theme_support( 'woocommerce', array(
                'product_grid'          => array(
                    'default_rows'    => $rocket_wc_default_rows,
                    'min_rows'        => $rocket_wc_min_rows,
                    'max_rows'        => $rocket_wc_max_rows,
                    'default_columns' => $rocket_wc_default_columns,
                    'min_columns'     => $rocket_wc_min_columns,
                    'max_columns'     => $rocket_wc_max_columns,
                ),
            ) );
            /* Product Gallery Zoom */
            if(get_option('rw_p_gallery_zoom')){
                add_theme_support('wc-product-gallery-zoom');
            }
            /* Product Gallery Lightbox */
            if(get_option('rw_p_gallery_lightbox')){
                add_theme_support('wc-product-gallery-lightbox');
            }
            /* Product Gallery Slider */
            if(get_option('rw_p_gallery_slider')){
                add_theme_support('wc-product-gallery-slider');
            }
            
        }
    }
    

    /* Check Features */

    /* Remove Sidebar on Cart */
    if(get_option('rw_remove_sidebar_cart')){
        if( is_checkout() || is_cart() || is_product()) { 
            remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        }
        add_action('woocommerce_before_main_content', 'remove_sidebar' );
    }
    /* Remove Coupon Code on Cart */
    if(get_option('rw_remove_coupon_cart')){
        add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );        
    }
    /* Add Customer Notes */
    if(get_option('rw_add_notes_cart')){
        add_action('woocommerce_cart_collaterals', 'order_comments_custom_cart_field');
    }


    function rocket_theme_wc_options(){
        ?>
        <h3>Product Page Settings</h3>
        <table class="rckt-table">
            <tr>
                <td>Enable Product Gallery Zoom</td>
                <td><input type="checkbox" name="rw_p_gallery_zoom" value="true" <?php if(get_option('rw_p_gallery_zoom') == "true") echo "checked"; ?> /></td>
            </tr>
            <tr>
                <td>Enable Product Gallery Lightbox</td>
                <td><input type="checkbox" name="rw_p_gallery_lightbox" value="true" <?php if(get_option('rw_p_gallery_lightbox') == "true") echo "checked"; ?> /></td>
            </tr>
            <tr>
                <td>Enable Product Gallery Slider</td>
                <td><input type="checkbox" name="rw_p_gallery_slider" value="true" <?php if(get_option('rw_p_gallery_slider') == "true") echo "checked"; ?> /></td>
            </tr>
        </table>
        <h3>Cart Page Settings</h3>
        <table class="rckt-table">
            <tr>
                <td>Remove Coupon Code</td>
                <td><input type="checkbox" name="rw_remove_coupon_cart" value="true" <?php if(get_option('rw_remove_coupon_cart') == "true") echo "checked"; ?> /></td>
            </tr>
            <tr>
                <td>Remove Sidebar</td>
                <td><input type="checkbox" name="rw_remove_sidebar_cart" value="true" <?php if(get_option('rw_remove_sidebar_cart') == "true") echo "checked"; ?> /></td>
            </tr>
            <tr>
                <td>Add Customer Notes</td>
                <td><input type="checkbox" name="rw_add_notes_cart" value="true" <?php if(get_option('rw_add_notes_cart') == "true") echo "checked"; ?> /></td>
            </tr>
        </table>
        <h3>Product Grid Settings</h3>
        <table class="rckt-table">
            <tr>
                <td><h4>Rows</h4></td>
            </tr>
            <tr>
                <td>Default Rows:</td>
                <td><input type="text" name="rw_pg_default_rows" value="<?= esc_attr( get_option('rw_pg_default_rows') )?>" placeholder="4" /></td>
            </tr>
            <tr>
                <td>Minimum Rows:</td>
                <td><input type="text" name="rw_pg_min_rows" value="<?= esc_attr( get_option('rw_pg_min_rows') )?>" placeholder="2" /></td>
            </tr>
            <tr>
                <td>Maximum Rows:</td>
                <td><input type="text" name="rw_pg_max_rows" value="<?= esc_attr( get_option('rw_pg_max_rows') )?>" placeholder="8" /></td>
            </tr>
            <tr>
                <td><h4>Columns</h4></td>
            </tr>
            <tr>
                <td>Default Columns:</td>
                <td><input type="text" name="rw_pg_default_columns" value="<?= esc_attr( get_option('rw_pg_default_columns') )?>" placeholder="3" /></td>
            </tr>
            <tr>
                <td>Minimum Columns:</td>
                <td><input type="text" name="rw_pg_min_columns" value="<?= esc_attr( get_option('rw_pg_min_columns') )?>" placeholder="2" /></td>
            </tr>
            <tr>
                <td>Maximum Columns:</td>
                <td><input type="text" name="rw_pg_max_columns" value="<?= esc_attr( get_option('rw_pg_max_columns') )?>" placeholder="6" /></td>
            </tr>
        </table>
        <?
    }


	// /* Woocommerce - Before Main Content */
	// add_action( 'woocommerce_before_main_content', 'wc_container_wrap_start', 35);
	// function wc_container_wrap_start(){
	// 	echo '<div class="container">';
	// }

	// /* Woocommerce - After Main Content */
	// add_action( 'woocommerce_after_main_content', 'wc_container_wrap_end', 35);
	// function wc_container_wrap_end(){
	// 	echo '</div>';
	// }

	 /* Woocommerce - Cart Page - Remove Sidebar */
	 function remove_sidebar()
	 {
		if( is_checkout() || is_cart() || is_product()) { 
		  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
		}
	 }

	// /* Woocommerce - Remove Coupon Code on Cart */
	// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
	// add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 5 );

	/* Woocommerce - Cart Page - Add Customer Notes */
    function order_comments_custom_cart_field(){
        echo '<div class="cart_order_notes">';
    ?>
        <div class="customer_notes_on_cart">
        <label for="customer_notes_text"><?php _e('Add a note to your order:','woocommerce'); ?></label>
        <textarea id="customer_notes_text"></textarea>
        </div>
    <?php
    }

    /*Add the order_comments field to the cart*/	 
    // add_action('woocommerce_cart_collaterals', 'order_comments_custom_cart_field');
    

		/*  Process the checkout and overwriting the normal button */
		function woocommerce_button_proceed_to_checkout() {
			$checkout_url = wc_get_checkout_url();
			?>
				<form id="checkout_form" method="POST" action="<?php echo $checkout_url; ?>">
				<input type="hidden" name="customer_notes" id="customer_notes" value="">
				<a  href="#" onclick="document.getElementById('customer_notes').value=document.getElementById('customer_notes_text').value;document.getElementById('checkout_form').submit()" class="checkout-button button alt wc-forward">
				<?php _e( 'Proceed to checkout', 'woocommerce' ); ?></a>
				</form>
			<?php
			}
			// getting the values in checkout again
			add_action('woocommerce_checkout_before_customer_details',function(){
			?>
			<script>
				jQuery( document ).ready(function() {
					jQuery('#order_comments' ).val("<?php echo sanitize_text_field($_POST['customer_notes']); ?>");
				});
			</script>
			<?php 
			});

	/* Remove Apply Coupon on Cart Page */
    function disable_coupon_field_on_cart( $enabled ) {
        if ( is_cart() ) {
            $enabled = false;
        }
        return $enabled;
    }
	
	/* Get Active My Account Item */
	function get_active_account_menu_item() {
		global $wp;
		$items = wc_get_account_menu_items();
		$current = false;
		foreach ($items as $endpoint => $label) {
			// Set current item class.
			$current = isset( $wp->query_vars[ $endpoint ] );
			if ( 'dashboard' === $endpoint && ( isset( $wp->query_vars['page'] ) || empty( $wp->query_vars ) ) ) {
				$current = true; // Dashboard is not an endpoint, so needs a custom check.
			}

			if($current) {
				$current = $endpoint;
				break;
			}
		}
		/* Remove Hypen and Capitalize on Menu item Names */
		if($current=='dashboard') {
			$current = 'My Account';
		}
		if($current=='orders') {
			$current = 'Your Orders';
		}
		if($current=='downloads') {
			$current = 'Your Downloads';
		}
		if($current=='edit-address') {
			$current = 'Edit Address';
		}
		if($current=='edit-account') {
			$current = 'Edit Account Information';
		}
		if($current=='customer-logout') {
			$current = 'Logout';
		}
		if($current=='view-order') {
			$current = 'Order Details';
		}
		return $current;
	}

	/* Remove Dashboard */
	// add_filter( 'woocommerce_account_menu_items', 'rocket_remove_my_account_dashboard' );
	function rocket_remove_my_account_dashboard( $menu_links ){
	 
		unset( $menu_links['dashboard'] );
		return $menu_links;
	 
	}
	// add_action('template_redirect', 'rocket_redirect_to_orders_from_dashboard' );
	function rocket_redirect_to_orders_from_dashboard(){
	
		if( is_account_page() && empty( WC()->query->get_current_endpoint() ) ){
			wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
			exit;
		}
	
	}

	/* Custom Customer Dashboard Info */
	function rocket_custom_dashboard_total_spent(){
		$customer_dashboard_id = get_current_user_id();
		$customer_dashboard_total_spent = wc_get_customer_total_spent( $customer_dashboard_id );
		echo $customer_dashboard_total_spent;
	}
	function rocket_custom_dashboard_total_orders() {
		$customer_dashboard_id = get_current_user_id();
		return wc_get_customer_order_count( $customer_dashboard_id );
	}
	function rocket_custom_dashboard_count_processing(){
		$customer_dashboard_id = get_current_user_id();
		$processing_orders_count = count(wc_get_orders( array(
			'customer_id' => $customer_dashboard_id,
			'status' => 'processing',
			'return' => 'ids',
			'limit' => -1,
		)));
		echo $processing_orders_count;
	}
	
	// Change "Default Sorting" to "Custom sorting" on shop page and in WC Product Settings
	function rocket_change_default_sorting_name( $catalog_orderby ) {
		$catalog_orderby = str_replace("Default sorting", "Sort by", $catalog_orderby);
		return $catalog_orderby;
	}
	add_filter( 'woocommerce_catalog_orderby', 'rocket_change_default_sorting_name' );
	add_filter( 'woocommerce_default_catalog_orderby_options', 'rocket_change_default_sorting_name' );

	//Get Cart Items count shortcode 
	function rocket_get_cart_items(){
        if(!is_admin()){
            return WC()->cart->get_cart_contents_count();
        }
	}
	add_shortcode( 'cart_item_count', 'rocket_get_cart_items' );
	//[cart_item_count] 

    //Get Cart Items Count with Items text
    function get_cart_items_text(){
        $items = WC()->cart->get_cart_contents_count();
        if($items>1){
                return $items.' Items';
        } else {
                return $items . ' Item';
        }
    }
