<?php

/**
 * Generate ACF Repeater Image and URL fields
 * Image field with: Image(jpg, png, svg), Url, Target
 * USE: Sections from logo clients list 
 */
function repeaterImageAndURLGroup($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3) {
  return
    array(
      // Repeater de Imagens com urls
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Lista de Imagens',
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
        'max' => '',
        'layout' => 'block',
        'button_label' => 'Adicionar imagem',
        'sub_fields' => array (
          // Logo do cliente
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Imagem',
            'name' => $prefix . '_list_item_image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 35,
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
          // URL do Site do Cliente
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Url',
            'name' => $prefix . '_list_item_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 35,
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          // Target da url do cliente
          // Target do Botão
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_target',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 30,
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
          )
        )
      )
    );
}

?>