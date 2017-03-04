<?php

/**
 * Simple Image Field
 *image
 */
function imageField( $prefix, $uniqueId, $field_width = null, $field_label = 'Imagem da seção' ) {
  return
    array(
      //Imagem de Fundo do Banner
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $field_label,
        'name' => $prefix . '_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => $field_width,
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'mime_types' => 'jpg,png,svg',
      )
    );
}