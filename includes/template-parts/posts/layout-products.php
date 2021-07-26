<div class="searched-product col-md-4">
    <?php if(has_post_thumbnail()){?>
        <?php echo '<img title="'.get_the_title().'" alt="'.get_the_title().'" class="img-fluid wp-post-image" src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" width="100%" height="auto" />';?>
    <?php }else{
        echo '<img class="img-fluid" src="'.$post_placeholder.'" draggable="false" alt="No Image" title="No Image" />';
    } ?>
    <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
    <div class="archieve-action">
        <a href="?add-to-cart=<?php echo $id; ?>" data-quantity="1" class="btn btn-primary button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="59" data-product_sku="" aria-label="Add “<?php the_title(); ?>” to your cart" rel="nofollow">Add to cart</a>
    </div>
</div>