$j = jQuery.noConflict();

$j(function(){
	wcMobileAccountNav();
});
function wcMobileAccountNav(){
	$j('.woocommerce-mobile-navigation-dropdown').on('click', function (e) {
		$j('.woocommerce-My-Account-navigation').toggleClass('active');
	});
}

