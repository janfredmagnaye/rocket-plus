<?php
/**
 * The template for displaying Category pages
 *
 */
get_header();

$thumb = get_template_directory_uri().'/assets/images/banner-placeholder.png';
$image = get_option('default-banner');
if ( $image ) : $thumb = $image; endif;

$post_placeholder = get_template_directory_uri().'/assets/images/post-placeholder.png';
$post_default_thumb = get_option( 'post-placeholder' );
if ($post_default_thumb) : $post_placeholder = $post_default_thumb; endif;

$category = $wp_query->get_queried_object();
 ?>
	<div id="primary" class="category-<?=get_queried_object_id();?> category site-content">
		<header class="innerpage-header p-5">
			<h1 class="text-center innerpage-title"><?php echo $category->name; ?></h1>
		</header>
		<?php // Featured Articles Slider
		if(get_option('featured-articles-slider')){
			get_template_part('includes/template-parts/posts/content','posts-header');
		} endif; 
		?>
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-8">
						<?php 	
						$paged = ( get_query_var('paged') ? get_query_var('paged') : 1);
						$query = array(
							'cat' => get_queried_object_id(),
							'post_type' => 'post',
							'paged' => $paged, 
						);
						query_posts( $query );						
						if (have_posts()){
							?>
						<?php						
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