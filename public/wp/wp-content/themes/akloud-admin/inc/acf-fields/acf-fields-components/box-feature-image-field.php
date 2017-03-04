<?php

/**
 * Generate ACF Field of feature image box without button
 * Image field with: Image(jpg, png, svg), Title, Description
 */
function boxFeatureImg($prefix, $uniqueId, $uniqueId1, $uniqueId2) {
  return
    array(
      // Box Icon
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Imagem ou ícone',
        'name' => $prefix . '_icon',
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
        'key' => 'field_' . $uniqueId1,
        'label' => 'Título',
        'name' => $prefix . '_title',
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
      ),
      // Box Description
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => 'Descrição',
        'name' => $prefix . '_description',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 3,
        'new_lines' => 'br',
        'readonly' => 0,
        'disabled' => 0,
      )
    );
}
