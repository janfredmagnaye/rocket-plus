<?php
/**
 * The template for displaying Author pages
 *
 */


$thumb = get_template_directory_uri().'/assets/images/banner-placeholder.png';
$image = get_option('default-banner');
if ( $image ) : $thumb = $image; endif;

$post_placeholder = get_template_directory_uri().'/assets/images/post-placeholder.png';
$post_default_thumb = get_option( 'post-placeholder' );
if ($post_default_thumb) : $post_placeholder = $post_default_thumb; endif;

get_header(); ?>
	<div id="primary" class="author-<?=get_queried_object_id();?> author site-content">
		<header class="innerpage-header p-5">
			<h1 class="text-center innerpage-title"><?php printf( __( 'Author Archives: %s', 'twentytwelve' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
		</header>
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-8">
				
					<?php if ( have_posts() ) { ?>
					<?php
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
						the_post();
					?>

					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
					// If a user has filled out their description, show a bio on their entries.
					if ( get_the_author_meta( 'description' ) ) { ?>
						<div class="author-info"> 
							<div class="author-avatar">
								<?php
								$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( __( 'About %s', 'rocket' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description	-->
						</div><!-- .author-info -->
					<?php } ?>
					<?php 
						while ( have_posts() ) {
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