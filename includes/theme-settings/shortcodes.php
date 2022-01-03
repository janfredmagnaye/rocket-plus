<?php
function rocketShortcodes(){
    add_shortcode( 'rocketmenu', 'getMenuNavigation' ); //[rocketmenu]
    add_shortcode( 'year', 'getPresentYear' ); //[year]
    add_shortcode( 'social-media', 'socialMediaShortcode' ); //[social-media mode="facebook"]
    add_shortcode( 'copyright', 'copyrightShortcode' ); //[copyright]
    add_shortcode( 'developer', 'developerShortcode' ); //[developer]
    add_shortcode( 'phonenumber', 'phoneShortcode' ); //[phonenumber]
    add_shortcode( 'address1', 'address1Shortcode' ); //[address1]
    add_shortcode( 'address2', 'address2Shortcode' ); //[address2]
    add_shortcode( 'emailaddress', 'emailAddressShortcode' ); //[address2]
    add_shortcode('recent-posts', 'pull_blog_posts'); //[recent-posts post=5 template=news ]
    add_shortcode( 'placeholder', 'rocketPlaceholder' ); //[placeholder length="30"]
    add_shortcode( 'siteinfo', 'siteInfoShortcode' ); //[siteinfo type=url/name]
    add_shortcode( 'breadcrumbs', 'rocketbreadcrumbsShortCode' ); //[breadcrumbs seperator="&gt;"]
    add_shortcode( 'featured-articles-slider', 'pull_featured_articles'); //[featured-articles-slider]
}

//Theme Options Shortcodes
/**
 * Social Media Shortcode
 */
function socialMediaShortcode( $atts ) {
    // Assign default values
    
    $mode   = "";
    $return = "Invalid value!";
    
    extract( shortcode_atts( array(
        'mode' =>  $mode
    ), $atts ) );
    
    if($mode == "facebook"){
        $return = get_option('facebook');
    }
    else if($mode == "twitter"){
        $return = get_option('twitter');
    }
    else if($mode == "google_plus"){
        $return = get_option('google_plus');
    }
    else if($mode == "linkedin"){
        $return = get_option('linkedin');
    }
    else if($mode == "youtube"){
        $return = get_option('youtube');
    }
    else if($mode == "instagram"){
        $return = get_option('instagram');
    }
    else if($mode == "pinterest"){
        $return = get_option('pinterest');
    }
    
    return $return;
}
function developerShortcode( $atts ) { 
    return do_shortcode(get_option('developer'));
}
function copyrightShortcode( $atts ) { 
    return do_shortcode(get_option('copyright'));
}
function phoneShortcode( $atts ) { 
    return get_option('phonenumber');
}
function address1Shortcode( $atts ) { 
    return do_shortcode(get_option('address1'));
}
function address2Shortcode( $atts ) { 
    return do_shortcode(get_option('address2'));
}
function emailAddressShortcode( $atts ) { 
    return do_shortcode(get_option('email-address'));
}
// Breadcrumbs Shortcode
function rocketbreadcrumbsShortCode( $atts ){
    $sep = '&gt;';
    extract(shortcode_atts(array(
        'sep' => $sep,				
    ), $atts));
    
    return rocket_breadcrumbs( $sep );
}
//Get Present Year
function getPresentYear( $atts ){
    return date('Y');
}
// Site URL Shortcode
function siteInfoShortcode( $atts ){
    $type = '';
    extract(shortcode_atts(array(
        'type' => $type,				
    ), $atts));

    $return_string = '';

    if($type=='url'){
        $return_string = home_url();;
    }
    if($type=='name'){
        $return_string = get_bloginfo();;
    }
    
    return $return_string;
}
//Pull Blogpost
function pull_blog_posts($atts, $content = null){
    extract(shortcode_atts(array(
        'posts' => 1,
        'cat' => 1,
        'template'  => 'blogs'
    ), $atts));

    $return = '';

    $args = array(
        'orderby' => 'date',
        'order' => 'DESC' ,
        'showposts' => $posts,
        'cat' => $cat
    );

    $query = new WP_Query($args);

    $return = array();

    if($query->have_posts()){
        while($query->have_posts()){
        $query->the_post();
            /*Pull news template*/
                $return['news'] .= '
                    <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), array(300,300)).'</a>
                    <h4 class="title">'.get_the_title().'</h4>
                    <p>'.rocket_excerpt(200).'</p>
                    <a class="btn btn-primary" href="'.get_the_permalink().'">Learn More</a>
                ';
            /*End Pull news template*/

        }
    }
    switch($template){
        case 'news' :
            $return = $return['news'];
        break;
    }
    wp_reset_query();
    return $return;
}
//Get Rocket Navigation
function getMenuNavigation(){
    $nav =  wp_nav_menu(
                array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 4,
                    'container'         => 'div',
                    'container_class'   => 'rocket-navigation',
                    'container_id'      => 'bs-navbar-collapse',
                    'menu_class'        => 'nav navbar-nav justify-content-between',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker()
                )
            );
    return $nav;
}
// Rocket Excerpt
function rocket_excerpt($length) {
    if(strlen(get_the_excerpt()) >= $length){
        $excerpt =  substr(get_the_excerpt(),0,$length).'...';
    }else{
        $excerpt = get_the_excerpt();
    }
    return $excerpt;
}
// Rocket Placeholder
function rocketPlaceholder($atts){
    // Default Values
    $return_string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ';
    $length = 0;
    extract(shortcode_atts(array(
        'length' => $length
        ), $atts));
    
    if($length>='121'){
        $return_string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?';
    }

    $return_string = mb_strimwidth($return_string, 0, $length, '.');
    return $return_string; 
}
// Placeholder Counter
function rocketPlaceholderCounter(){
    $post_ids = get_posts(array( 
        'posts_per_page'=> -1,
        'fields'        => 'ids', // Only get post IDs
    ));
    $query = new WP_Query($post_ids);
    if($query->have_posts()){
        while($query->have_posts()){
            echo '<ul>';
            if(has_shortcode( $query->post_content, '[placeholder]')){
                echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
            }
        }
    }
    wp_reset_query();
    echo '</ul>';
}
// Rocket Breadcrumbs
function rocket_breadcrumbs( $sep ){
    // From https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin and added bootstrap classes to it
    // Settings
    $separator = $sep;
    $breadcrums_id      = 'rocket_breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Homepage';
    $breadcrumb_layout = '';
    $prefix = '';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        $breadcrumb_layout .= '<nav aria-label="breadcrumb">';
        $breadcrumb_layout .= '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        $breadcrumb_layout .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        $breadcrumb_layout .= '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            $breadcrumb_layout .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $breadcrumb_layout .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                $breadcrumb_layout .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            $breadcrumb_layout .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                $breadcrumb_layout .= '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                $breadcrumb_layout .= '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = $category[count($category) - 1];
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                $breadcrumb_layout .= $cat_display;
                $breadcrumb_layout .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                $breadcrumb_layout .= '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                $breadcrumb_layout .= '<li class="separator"> ' . $separator . ' </li>';
                $breadcrumb_layout .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                $breadcrumb_layout .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            $breadcrumb_layout .= '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                $breadcrumb_layout .= $parents;
                   
                // Current page
                $breadcrumb_layout .= '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                $breadcrumb_layout .= '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            $breadcrumb_layout .= '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            $breadcrumb_layout .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            $breadcrumb_layout .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            $breadcrumb_layout .= '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            $breadcrumb_layout .= '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            $breadcrumb_layout .= '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            $breadcrumb_layout .= '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            $breadcrumb_layout .= '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            $breadcrumb_layout .= '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            $breadcrumb_layout .= '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            $breadcrumb_layout .= '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            $breadcrumb_layout .= '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            $breadcrumb_layout .= '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            $breadcrumb_layout .= '<li>' . 'Error 404' . '</li>';
        }
       
        $breadcrumb_layout .= '</ol>';
        $breadcrumb_layout .= '</nav>';   
    }
    return $breadcrumb_layout;

}

//Pull all featured articles into slider
function pull_featured_articles( $atts ){
    $post_count = '7';
    $tag = 'featured';
    extract(shortcode_atts(array(
        'post_count' => $post_count,	
        'tag' => $tag,			
    ), $atts));

    $ra_featured_article = '<div class="owl-carousel featured-articles">';
    $the_query = new WP_Query( array(
        'post_count' => $post_count,
        'tag' => $tag
    )  );
    while ($the_query -> have_posts()) : $the_query -> the_post(); 
        include( locate_template( 'includes/template-parts/posts/layout-featured-articles.php', false, false ) ); 
    endwhile;
    wp_reset_postdata();
    $ra_featured_article .= '</div>';
    return $ra_featured_article;
}