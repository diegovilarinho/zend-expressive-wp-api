<?php
/**
 * Show first category or first tag of current post
 */
function first_post_taxonomy($post_id) {
  $categories = get_the_category($post_id);
  $moreCategories = '';
  // Adiciona quantidade extra de categorias após a tag impressa caso o post tenha mais de uma categoria
  if( count($categories) > 1 ) {
    $moreCategories = '+' . ( count($categories) - 1 );
  }
  //Imprime as categorias
  if( ! empty( $categories ) || display_first_tag_of_post( $post_id ) != null ):
    if ( !empty( $categories ) ):
        //Se for marcada apenas a categoria "Sem categoria"
        if($categories[0]->name != 'Sem categoria') {
          $result = '<span class="tag-dt">';
          $result .= '<i class="icon-icn_tag"></i>';
          $result .= '<p class="text text--inverse text--xxxsmall">';
          //Aplica um excerpt na categoria impressa no box
          if( strlen( esc_html( $categories[0]->name ) ) > 15 ):
            $result .= substr( esc_html( $categories[0]->name ), 0, 15 );
            $result .= ' ...';
          else:
            $result .= esc_html( $categories[0]->name );
          endif;
          $result .= $moreCategories;
          $result .= '</p>';
          $result .= '</span>';
        } else {
          return false;
        }
    endif;

    return $result;
  else:

    return false;

  endif;
}
?>
