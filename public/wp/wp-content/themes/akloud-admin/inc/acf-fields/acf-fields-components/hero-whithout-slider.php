<?php

/**
 * Generate ACF Repeater Fields of images
 * Image field with: Background Image(jpg, png, svg), Title, Description
 * ACF DEPENDENCES: defaultBtnField
 */
function heroWithoutSliderGroup( $prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $uniqueId5 ) {
  return
    array(
      //Imagem de Fundo do Banner
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Imagem de fundo do banner',
        'name' => $prefix . '_image',
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
      ),
      // Título do Conteúdo do Banner
      array (
        'key' => 'field_' . $uniqueId1,
        'label' => 'Título do banner',
        'name' => $prefix . '_content_title',
        'type' => 'text',
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
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      // Texto do Conteúdo do Banner
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => 'Texto do conteúdo do banner',
        'name' => $prefix . '_content_description',
        'type' => 'textarea',
        'instructions' => 'Máx. 200 caracteres',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => 200,
        'rows' => 4,
        'new_lines' => 'br',
        'readonly' => 0,
        'disabled' => 0,
      ),
      // Botão do Box
      // Texto do Botão
      array (
        'key' => 'field_' . $uniqueId3,
        'label' => 'Texto do botão do banner',
        'name' => $prefix . '_button_text',
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
        'key' => 'field_' . $uniqueId4,
        'label' => 'Url do botão',
        'name' => $prefix . '_button_url',
        'type' => 'text',
        'instructions' => 'Cole aqui a URL ou âncora do botão',
        'wrapper' => array (
          'width' => 35,
          'class' => '',
          'id' => '',
        ),
      ),
      // Target do Botão
      array (
        'key' => 'field_' . $uniqueId5,
        'label' => 'Abrir em nova aba?',
        'name' => $prefix . '_button_target',
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
    );
}