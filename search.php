<?php
/**
 * The template for displaying Search Pages
 * 
 */
$post_placeholder = get_template_directory_uri().'/assets/images/post-placeholder.png';
$post_default_thumb = get_option( 'post-placeholder' );
if ($post_default_thumb) : $post_placeholder = $post_default_thumb; endif;

get_header(); ?>
	<div id="primary" class="search-result site-content">
		<header class="innerpage-header p-5">
			<h1 class="text-center innerpage-title">
				<?php printf( __( 'Search Results for: %s', 'rocket' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</header>
		<div class="container">
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
		</div><!-- .container-->
	</div><!-- .primary -->
<?php get_footer(); ?> 