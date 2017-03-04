<?php

/**
 * Generate ACF Simple Photo Gallery
 */
function photoGallery( $prefix, $uniqueId, $title_label = 'Galeria de Fotos', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $title_label,
        'name' => $prefix . '_gallery',
        'type' => 'gallery',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'min' => '',
        'max' => '',
        'preview_size' => 'thumbnail',
        'insert' => 'append',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => 'jpg,png,svg',
      )
    );
}