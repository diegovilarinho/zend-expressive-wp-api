<?php
/**
 * Breadcrumbs
**/
function breadcrumbs() {

  // Settings
  $separator = '&gt;';
  $breadcrums_id = 'breadcrumbs';
  $breadcrums_class = 'breadcrumbs';
  $home_title = 'Home';

  // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
  $custom_taxonomy    = 'product_cat';

  // Get the query & post information
  global $post, $wp_query;

    // Do not display on the homepage
  if (!is_front_page()) {

    // Home page
    echo '
      <span class="local">
        <a href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a>
      </span>
    ';

    echo '<i class="icon-icn_breadcrumb"></i>';

    if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
      echo '
        <span class="item-current local item-archive">
          ' . post_type_archive_title($prefix, false) . '
        </span>
      ';

    } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {

      // If post is a custom post type
      $post_type = get_post_type();

      // If it is a custom post type display name and link
      if($post_type != 'post') {
        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);
        echo '<span class="item-cat local item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
        echo '<i class="icon-icn_breadcrumb"></i>';
      }

      $custom_tax_name = get_queried_object()->name;
      echo '<span class="item-current local item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></span>';
    } else if (is_single()) {

      // If post is a custom post type
      $post_type = get_post_type();

      // If it is a custom post type display name and link
      if($post_type != 'post') {
        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);
        echo '<span class="item-cat local item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
        echo '<i class="icon-icn_breadcrumb"></i>';
      } else {
          echo '<span class="item-cat local"><a href="' . site_url("blog") . '" title="Blog">Blog</a>';
          echo '<i class="icon-icn_breadcrumb"></i>';
          echo '<span class="item-current local item-' . $post->ID . '">' . get_the_title() . '</span>';
      }


    } else if (is_category()) {
      // Category page
      echo '<span class="item-current local item-cat">' . single_cat_title('', false) . '</span>';
    } else if ( is_page() ) {
      // Standard page
      if($post->post_parent){
        // If child page, get parents
        $anc = get_post_ancestors( $post->ID );
        // Get parents in the right order
        $anc = array_reverse($anc);
        // Parent page loop
        foreach ( $anc as $ancestor ) {
          $parents .= '<span class="item-parent local item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></span>';
          $parents .= '<i class="icon-icn_breadcrumb"></i>';
        }
        // Display parent pages
        echo $parents;
        // Current page
        echo '<span class="item-current local item-' . $post->ID . '">' . get_the_title() . '</span>';
      } else {
        // Just display current page if not parents
        echo '<span class="item-current local item-' . $post->ID . '">' . get_the_title() . '</span>';
      }
    } else if (is_tag()) {
      // Tag page
      // Get tag information
      $term_id = get_query_var('tag_id');
      $taxonomy = 'post_tag';
      $args = 'include=' . $term_id;
      $terms = get_terms( $taxonomy, $args );
      $get_term_id = $terms[0]->term_id;
      $get_term_slug = $terms[0]->slug;
      $get_term_name = $terms[0]->name;
      // Display the tag name
      echo '<span class="item-current local item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">' . $get_term_name . '</span>';
    } elseif (is_day()) {
      // Day archive
      // Year link
      echo '<span class="item-year local item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
      echo '<i class="icon-icn_breadcrumb"></i>';
      // Month link
      echo '<span class="item-month local item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></span>';
      echo '<i class="icon-icn_breadcrumb"></i>';
      // Day display
      echo '<span class="item-current local item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span>';
    } else if (is_month()) {
      // Month Archive
      // Year link
      echo '<span class="item-year local item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
      echo '<i class="icon-icn_breadcrumb"></i>';
      // Month display
      echo '<span class="item-month local item-month-' . get_the_time('m') . '">' . get_the_time('M') . ' Archives</span>';
    } else if (is_year()) {
      // Display year archive
      echo '<span class="item-current local item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span>';
    } else if (is_author()) {
      // Auhor archive
      // Get the author information
      global $author;
      $userdata = get_userdata( $author );
      // Display author name
      echo '<span class="item-current local item-current-' . $userdata->user_nicename . '">' . __('Author: ', 'qametrik') . $userdata->display_name . '</span>';
    } else if (get_query_var('paged')) {
      // Paginated archives
      echo '<span class="item-current local item-current-' . get_query_var('paged') . '">'.__('Page', 'qametrik') . ' ' . get_query_var('paged') . '</span>';
    } else if (is_search()) {
      // Search results page

      echo '<span class="item-current local item-current-' . get_search_query() . '">' . __('Resultados da busca para: ', 'qametrik') . get_search_query() . '</span>';

    } elseif (is_404()) {
      // 404 page
      echo '<span>' . __('Erro 404', 'qametrik') . '</span>';
    }
  }
}

?>
