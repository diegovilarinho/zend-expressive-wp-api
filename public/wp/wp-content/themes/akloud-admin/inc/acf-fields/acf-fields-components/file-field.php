<?php

/**
 * Generate ACF Url Fields
 */
function fileField($prefix, $uniqueId, $file_label = 'Faça upload do arquivo', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $file_label,
      'name' => $prefix . '_file',
      'type' => 'file',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'array',
      'library' => 'all',
      'min_size' => '',
      'max_size' => '',
      'mime_types' => '',
    )
  );
}
