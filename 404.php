<?php
/**
 * The template for displaying all 404 Pages
 **/
get_header(); ?>
	<div id="primary" class="404 innerpage site-content">
		<header class="text-center innerpage-header">
            <div class="container main_content">
                <p class="text-404"><span>404</span></p>
                <h1 class="innerpage-title">Page not found</h1>
                <div class="row justify-content-center" role="main">
                    <div class="col-md-6 text-center ">
                        <p>We're sorry, but the page you requested was not found...</p>
                        <p><a href="<?php esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Homepage</a> </p>
                        <p></p>
                    </div>
                </div>
            </div>
		</header>
	</div>
<style>
.error404 div#primary {
    min-height: 30vh;
}
.error404 .main_content {
    min-height: 30vh;
    padding: 40px 15px;
}
.error404 .text-404 {
    font-size: 90px;
    margin-bottom: 0px;
    line-height: 90px;
}
.error404 h1.innerpage-title {
    font-weight: bold;
    margin-bottom: 30px;
}
</style>

<?php get_footer(); ?>

