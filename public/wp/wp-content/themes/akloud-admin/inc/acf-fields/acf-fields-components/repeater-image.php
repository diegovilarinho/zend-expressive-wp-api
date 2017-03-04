<?php

/**
 * Generate ACF Field repeater of image and title WITHOUT link
 * Repeater field with: Image(jpg, png, svg), Title
 */
function repeaterImage($prefix, $uniqueId, $uniqueId1, $max_items = null, $repeater_label = 'Lista de Imagens') {
  return
    array(
      // Repeater de Imagens e títulos SEM LINK
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $repeater_label,
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
        'min' => '',
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Imagem',
        'sub_fields' => array (
          // Box Icon
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Imagem',
            'name' => $prefix . '_list_item_image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
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
          )
        )
      )
    );
}
