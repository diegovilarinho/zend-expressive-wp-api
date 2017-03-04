<?php

/**
 * Relation field to select featureds posts of cpt to show in featured area on site
 */
function cptItemsFeatureds($prefix, $uniqueId, $post_type, $label = 'Depoimentos da Home', $min_items = null, $max_items = null, $instructions = '') {
  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $label,
        'name' => $prefix . '_list',
        'type' => 'relationship',
        'instructions' => $instructions,
        'post_type' => array (
          0 => $post_type,
        ),
        'taxonomy' => array (
        ),
        'filters' => array (
          0 => 'search',
        ),
        'elements' => '',
        'min' => $min_items,
        'max' => $max_items,
        'return_format' => 'object',
      )
    );
}

?>