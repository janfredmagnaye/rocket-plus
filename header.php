<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<!-- After Opening Head Scripts -->	
<?php echo get_option('after_opening_head_scripts');?>
<!-- After Opening Head Scripts End -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php wp_title('|','true','right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="<?=get_option('favicon');?>" type="image/x-icon" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- Critical CSS -->
<style>
<?php echo get_option('rocket_critical_css');?>
</style>
<!-- Critical CSS End -->

<?php wp_head(); ?>

<!-- Before Closing Head -->
<?php echo get_option('before_closing_head_scripts');?>
<!-- Before Closing Head Scripts End -->
</head>
<body <?php body_class(); $headerTemplate = get_option('header-template');?> >

<!-- After Opening Body Scripts -->
<?php echo get_option('after_opening_body_scripts');?>
<!-- After Opening Body Scripts End -->

<?php if(get_option('preloader')): ?>
	<div class="loading">
		<div class="spinner">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>
<?php endif; ?>
	
	<?php if(get_option('rocket-mobile-menu')): ?>
		<!-- Rocket Mobile Menu -->
		<?php dynamic_sidebar( 'rocket-mobile-menu' ); ?>
		<!-- Rocket Mobile Menu End -->
	<?php endif; ?>
	
	<div id="page" class="hfeed <?php if(get_option('header-fixed')) { echo 'fixed-header'; } ?>">
		<div class="site-header ">
			<div class="top-header">
				<div class="container">
					<div class="row align-items-center">
						<?php dynamic_sidebar( 'top-header-widget' )?>
					</div>
				</div>
			</div>
			<div class="main-header">
				<div class="container">
					<div class="row align-items-center">
						<?php dynamic_sidebar( 'header-widget' )?>
					</div>
				</div>
			</div>
		</div>
