<?php

/**
 * Generate ACF Messages Fields
 */
function repeaterAtaProductsField($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $min_items = '', $max_items = '', $post_types = array(), $field_label = 'Selecione um Produto' ) {
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
          'name' => $prefix . '_list_item_product',
          'type' => 'post_object',
          'wrapper' => array (
            'width' => 50,
            'class' => '',
            'id' => '',
          ),
          'post_type' => $post_types,
          'taxonomy' => array (
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'return_format' => 'object',
          'ui' => 1,
        ),
        array (
          'key' => 'field_' . $uniqueId2,
          'label' => 'Preço do produto na Ata',
          'name' => $prefix . '_list_item_product_price',
          'type' => 'text',
          'wrapper' => array (
            'width' => 20,
            'class' => '',
            'id' => '',
          ),
        ),
        array (
          'key' => 'field_' . $uniqueId3,
          'label' => 'Máx. Quantidade',
          'name' => $prefix . '_list_item_product_qty',
          'type' => 'text',
          'wrapper' => array (
            'width' => 15,
            'class' => '',
            'id' => '',
          ),
        ),
        array (
          'key' => 'field_' . $uniqueId4,
          'label' => 'Número do Item na Ata',
          'name' => $prefix . '_list_item_product_number',
          'type' => 'text',
          'wrapper' => array (
            'width' => 15,
            'class' => '',
            'id' => '',
          ),
        ),
      )
    )
  );
}