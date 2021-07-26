<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php
			if(get_the_content()) { 
				echo the_content();
			} else {
				echo '<h2>Coming Soon!</h2>';
			} ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->