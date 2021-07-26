<?php

$thumb = get_template_directory_uri().'/assets/images/banner-placeholder.png';
$image = get_option('default-banner');
if ( $image ) : $thumb = $image; endif;

$post_placeholder = get_template_directory_uri().'/assets/images/post-placeholder.png';
$post_default_thumb = get_option( 'post-placeholder' );
if ($post_default_thumb) : $post_placeholder = $post_default_thumb; endif;

get_header(); ?>
	<div id="primary" class="index-page innerpage site-content">
		<header style="background-image: url('<?= $thumb ?>')" class="innerpage-header">
			<h1 class="text-center innerpage-title">Blogs</h1>
		</header>
		<div class="container main_content">
			<div class="row" role="main">
				<div class="col-md-8">
					<?php 
					if (have_posts()){				
						while(have_posts()){ 
							the_post();
							include( locate_template( 'includes/template-parts/posts/layout-default.php', false, false ) ); 
						} 
						wp_reset_query();
						echo '<div class="pagination">'.rocketPage().'</div>';
					?>
					<?php }else{ // end of the condition. ?>
						<h3>No posts to show.</h3>
					<?php } // end of the else. ?>
				</div><!-- .col-md-8 -->
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div><!-- .col-md-4 -->
			</div><!--.row -->
		</div><!-- .container-fluid -->
	</div><!-- .primary -->
<?php get_footer(); ?>