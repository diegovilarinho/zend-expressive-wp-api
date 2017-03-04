<?php

/**
 * Generate ACF Field repeater of image and title WITHOUT link
 * Repeater field with: Image(jpg, png, svg), Title
 */
function repeaterImageTitle($prefix, $uniqueId, $uniqueId1, $uniqueId2, $max_items = null) {
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
        'collapsed' => 'field_' . $uniqueId2,
        'min' => '',
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Item',
        'sub_fields' => array (
          // Box Icon
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Imagem ou ícone',
            'name' => $prefix . '_list_item_icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 30,
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => 'jpg,png,svg',
          ),
          // Box Title
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 70,
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
          )
        )
      )
    );
}
