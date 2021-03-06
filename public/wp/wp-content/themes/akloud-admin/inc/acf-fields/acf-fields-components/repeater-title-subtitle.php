<?php

/**
 * Generate ACF Field repeater of title and subtitle
 * Repeater field with: Title and Subtitle
 */
function repeaterTitleAndSubtitle($prefix, $uniqueId, $uniqueId1, $uniqueId2, $textarea_rows = 8, $textarea_maxlength = null, $textarea_instructions = null, $min_items = null, $max_items = null) {
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
          // Item Title
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '' ,
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
          ),
          // Item Subtitle
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Subtítulo',
            'name' => $prefix . '_list_item_subtitle',
            'type' => 'textarea',
            'instructions' => $textarea_instructions,
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => $textarea_maxlength,
            'rows' => $textarea_rows,
            'new_lines' => 'br',
            'readonly' => 0,
            'disabled' => 0,
          )
        )
      )
    );
}
