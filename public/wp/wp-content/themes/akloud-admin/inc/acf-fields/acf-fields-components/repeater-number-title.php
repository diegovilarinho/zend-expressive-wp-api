<?php

/**
 * Generate ACF Field repeater of number and title
 * Repeater field with: Number and Title
 */
function repeaterNumberTitle($prefix, $uniqueId, $uniqueId1, $uniqueId2, $min_items = null, $max_items = null, $title_maxlength = null) {
  return
    array(
      // Repeater de Imagens e títulos SEM LINK
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Lista de Itens',
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_' . $uniqueId1,
        'min' => $min_items,
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Item',
        'sub_fields' => array (
          // Item Number
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Número',
            'name' => $prefix . '_list_item_number',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 50,
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
            'readonly' => 0,
            'disabled' => 0,
          ),
          // Item Title
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 50,
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => $title_maxlength,
            'readonly' => 0,
            'disabled' => 0,
          )
        )
      )
    );
}
