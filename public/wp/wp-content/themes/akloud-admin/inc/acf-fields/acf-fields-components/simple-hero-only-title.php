<?php

/**
 * Generate ACF Repeater Fields of images
 * Image field with: Background Image(jpg, png, svg), Title, Description
 */
function simpleHeroOnlyTitle( $prefix, $uniqueId, $uniqueId1, $title_instruction = null, $title_maxlength = null ) {
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
        'name' => $prefix . '_title',
        'type' => 'text',
        'instructions' => $title_instruction,
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
        'maxlength' => $title_maxlength,
        'readonly' => 0,
        'disabled' => 0,
      )
    );
}