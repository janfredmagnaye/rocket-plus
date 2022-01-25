$j = jQuery.noConflict();

$j(function(){
	wcMobileAccountNav();
	toggleLogin();
	checkoutCouponModal();
	closeCheckoutCouponModal();
});
function wcMobileAccountNav(){
	$j('.woocommerce-mobile-navigation-dropdown').on('click', function (e) {
		$j('.woocommerce-My-Account-navigation').toggleClass('active');
	});
}
function toggleLogin(){
	$j(".register-link-toggle-on").click(function(){
		$j("#customer_login").addClass("register-mode");
		$j("#customer_login").removeClass("login-mode");
	});

	$j(".register-link-toggle-off").click(function(){
		$j("#customer_login").removeClass("register-mode");
		$j("#customer_login").addClass("login-mode");
	});
}
function checkoutCouponModal(){
	$j('button.checkout-modal-button').on('click', function (e) {
		$j('.checkout_coupon').addClass('active');
		$j("html, body").animate({scrollTop: 0}, 0);
	});
}
function closeCheckoutCouponModal(){
	$j('button.close-checkout-coupon-modal').on('click', function (e) {
		$j('.checkout_coupon').removeClass('active');
	});
}