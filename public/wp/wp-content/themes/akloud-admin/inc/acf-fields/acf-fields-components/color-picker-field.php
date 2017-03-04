<?php

/**
 * Generate ACF Url Fields
 */
function colorPickerField($prefix, $uniqueId, $field_label = 'Escolha uma cor', $field_width = '', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => $field_width,
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    )
  );
}
