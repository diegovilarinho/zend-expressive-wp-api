<?php

/**
 * Generate ACF Messages Fields
 */
function repeaterObjectPostField($prefix, $uniqueId, $uniqueId1, $min_items = '', $max_items = '', $post_types = array(), $field_label = 'Selecione o Post' ) {
  return array (
    array (
      'key' => 'field_' . $uniqueId,
      'label' => 'Lista de Itens',
      'name' => $prefix . '_list',
      'type' => 'repeater',
      'collapsed' => 'field_' . $uniqueId1,
      'min' => $min_items,
      'max' => $max_items,
      'layout' => 'block',
      'button_label' => 'Adicionar Item',
      'sub_fields' => array (
        array (
          'key' => 'field_' . $uniqueId1,
          'label' => $field_label,
          'name' => $prefix . '_list_item',
          'type' => 'post_object',
          'post_type' => $post_types,
          'taxonomy' => array (
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'return_format' => 'object',
          'ui' => 1,
        )
      )
    )
  );
}