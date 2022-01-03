
<?php
$ra_featured_article .='
<div class="item recent-article-item">
    <div class="recent-post-thumbnail"><a href="'.get_the_permalink().'">';
        if(has_post_thumbnail()){
            $ra_featured_article .='<a href="'.get_the_permalink().'"><img title="'.get_the_title().'" alt="'.get_the_title().'" class="img-fluid wp-post-image" src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" width="100%" height="auto" /></a>';
        }else{
            $ra_featured_article .='<img class="img-fluid" src="/wp-content/uploads/default-featured-article-image.png" draggable="false" alt="No Image" title="No Image" />';
        } 
        $ra_featured_article .='
        </a>
    </div>
    <div class="recent-article-info">
        <span class="post-date">'.get_the_date().'</span>
        <a href="'.get_the_permalink().'">
            <p class="post-title"><strong>'. wp_trim_words( get_the_title(), 20, '...' ).'</strong></p>
        </a>
        <p class="post-categories">In ';
        $id = get_the_ID();
        $cats = get_the_category($id);
        foreach ( $cats as $cat ):
            $ra_featured_article .= '<a href="'.get_category_link($cat->cat_ID).'" class="post-category-link">'.$cat->name.'</a>';
        endforeach;    
        $ra_featured_article .='</p>';
        $ra_featured_article .='</div>
</div>
';
?>