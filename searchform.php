<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

	<div class="input-group">
		<input class="form-control" placeholder="Search for..." name="s" id="search" value="<?php the_search_query(); ?>" required="required" /> 
		<span class="input-group-append">
			<button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
		</span>
	</div>

</form>
