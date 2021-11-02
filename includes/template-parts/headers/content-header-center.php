<div class="top-header">
	<div class="container">
		<div class="row align-items-center">
			<?php dynamic_sidebar( 'top-header-widget' )?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 text-center">
			<?php dynamic_sidebar('site-logo'); ?>
		</div>
		<div class="col-md-12">
			<nav id="nav-menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
				<?php echo do_shortcode('[rocketmenu]'); ?>
			</nav>
		</div>
	</div>
</div>
