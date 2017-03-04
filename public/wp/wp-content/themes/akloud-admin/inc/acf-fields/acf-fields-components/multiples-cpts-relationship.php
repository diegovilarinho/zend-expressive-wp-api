<?php

/**
 * Relation field to select featureds posts of cpt to show in featured area on site
 */
function multiplesCptsRelation($prefix, $uniqueId, $post_types = array(), $label = 'Itens', $min_items = null, $max_items = null) {
    
  $filters = array(0 => 'search');
  if(! empty($post_types)) {
    $filters = array(0 => 'search', 1 => 'post_type');
  }

  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $label,
        'name' => $prefix . '_list',
        'type' => 'relationship',
        'instructions' => 'Caso nenhum item seja escolhido, todos os conteúdos cadastrados serão mostrados na na seção.',
        'post_type' => $post_types,
        'taxonomy' => array (
        ),
        'filters' => $filters,
        'elements' => '',
        'min' => $min_items,
        'max' => $max_items,
        'return_format' => 'object',
      )
    );
}

?>