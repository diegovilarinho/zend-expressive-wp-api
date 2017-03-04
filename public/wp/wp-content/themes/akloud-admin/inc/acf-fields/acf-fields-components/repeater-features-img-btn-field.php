<?php

/**
 * Generate ACF Repeater Fields of images
 * Image field with: Image(jpg, png, svg), Title, Description
 * ACF DEPENDENCES: defaultBtnField
 */
function repeaterFeaturesImgBtnGroup($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $uniqueId5, $uniqueId6) {
  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Destaque',
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
        'max' => '3',
        'layout' => 'block',
        'button_label' => 'Adicionar Box',
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
          ),
          // Box Description
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Descrição',
            'name' => $prefix . '_list_item_description',
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
          ),
          // Botão do Box
          // Texto do Botão
          array (
            'key' => 'field_' . $uniqueId4,
            'label' => 'Texto do botão do banner',
            'name' => $prefix . '_list_item_button_text',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
          ),
          // URL do Botão
          array (
            'key' => 'field_' . $uniqueId5,
            'label' => 'Url do botão',
            'name' => $prefix . '_list_item_button_url',
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
          // Target do Botão
          array (
            'key' => 'field_' . $uniqueId6,
            'label' => 'Abrir em nova aba?',
            'name' => $prefix . '_list_item_button_target',
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
