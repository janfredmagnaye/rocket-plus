<div class="index-lists">
    <div class="row">
        <div class="col-md-4">
            <?php if(has_post_thumbnail()){?>
                <?php echo '<img title="'.get_the_title().'" alt="'.get_the_title().'" class="img-fluid wp-post-image" src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" width="100%" height="auto" />';?>
            <?php }else{
                echo '<img class="img-fluid" src="'.$post_placeholder.'" draggable="false" alt="No Image" title="No Image" />';
            } ?>
        </div>
        <div class="col-md-8">
            <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
            <span class="date-posted"><i aria-hidden="true" class="fa fa-clock"></i>&nbsp;<?php echo get_the_date(); ?></span>
            <br/>
            <p><?php echo get_the_excerpt(); ?></p>
            <div class="archieve-action">
                <a class="btn btn-primary" href="<?php echo get_the_permalink(); ?>"><span class="glyphicon glyphicon-search"></span> Read more</a>
            </div>
        </div>
    </div>
</div>