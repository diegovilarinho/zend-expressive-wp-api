<?php

/**
 * Generate ACF Field repeater of title and subtitle
 * Repeater field with: Title and Subtitle
 */
function repeaterTitleAndTitleAndCPTRelationship( $prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $min_items = null, $max_items = null, $conditional_logic = false, $conditions_items = array() ) {


  //If existis choices
  $conditions = array ($conditions_items);

  return
    array(
      // Repeater de Imagens e títulos SEM LINK
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Lista de Itens',
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
        'collapsed' => 'field_' . $uniqueId1,
        'min' => $min_items,
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Item',
        'sub_fields' => array (
          // Item Title
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 50,
            ),
          ),
          // Item Subtitle
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Subtítulo',
            'name' => $prefix . '_list_item_subtitle',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 50,
            ),
          ),
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Lista de Soluções do Item',
            'name' => $prefix . '_list_item_relationship',
            'type' => 'relationship',
            'post_type' => array (
              0 => 'service',
              // 1 => 'challenge'
            ),
            'taxonomy' => array (
            ),
            //search, post_type, taxonomy
            'filters' => array (
              0 => 'search',
              // 1 => 'post_type'
            ),
            'return_format' => 'object',
          )
        )
      )
    );
}
