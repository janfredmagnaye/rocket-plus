<?php
/**
 * The template for displaying Archive pages
 *
 */

$thumb = get_template_directory_uri().'/assets/images/banner-placeholder.png';
$image = get_option('default-banner');
if ( $image ) : $thumb = $image; endif;

$post_placeholder = get_template_directory_uri().'/assets/images/post-placeholder.png';
$post_default_thumb = get_option( 'post-placeholder' );
if ($post_default_thumb) : $post_placeholder = $post_default_thumb; endif;

get_header(); ?>
	<div id="primary" class="archive site-content">
		<header class="innerpage-header p-5">
			<h1 class="text-center innerpage-title">
				<?php
					if(is_day()){
						printf( __( 'Daily Archives: %s', 'rocket' ), '<span>' . get_the_date() . '</span>' );
					}else if(is_month()){
						printf( __( 'Monthly Archives: %s', 'rocket' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rocket' ) ) . '</span>' );
					}else if (is_year()){
						printf( __( 'Yearly Archives: %s', 'rocket' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rocket' ) ) . '</span>' );
					}else{
						_e( 'Archives', 'rocket' );
					}
				?>
			</h1>
		</header><!-- .archive-header -->
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-8">
				<?php if ( have_posts() ) { ?>
						<?php
							/* Start the Loop */
							while (have_posts()) { 
								the_post();
								include( locate_template( 'includes/template-parts/posts/layout-default.php', false, false ) ); 
							} 
							wp_reset_query(); // end of the loop.
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