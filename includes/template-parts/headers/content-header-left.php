<div class="main-header">
	<div class="container">
		<div class="row align-items-center">
			<div class="mobile-menu-btn" style="display:none;">
				<?php echo do_shortcode( '[rocket-mobile-button]' ); ?>
			</div>
			<div class="col-md-3 site-logo">
				<?php dynamic_sidebar( 'header-widget' ); ?>
			</div>
			<div class="col-md-7 nav-desktop-menu">
				<nav id="nav-menu" class="navbar navbar-expand-lg">
					<?php echo do_shortcode('[rocketmenu]'); ?>
				</nav>
			</div>
			<div class="col-md-2 phone-icon">
				<a href="tel:<?php echo do_shortcode('[phonenumber]'); ?>" class="btn btn-phone"><span class="fa fa-phone"></span><span class="phone-text"><?php echo do_shortcode('[phonenumber]'); ?></span></a>
			</div>
		</div>
	</div>
</div>

