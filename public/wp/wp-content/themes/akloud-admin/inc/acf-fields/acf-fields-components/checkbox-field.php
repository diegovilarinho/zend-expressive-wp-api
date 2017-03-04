<?php

/**
 * Generate ACF Url Fields
 */
function checkboxField($prefix, $uniqueId, $field_label = 'Escolha uma opção', $items = array(), $layout = 'horizontal', $field_width = '', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_checkbox',
      'type' => 'checkbox',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => $field_width,
        'class' => '',
        'id' => '',
      ),
      'choices' => $items,
      'default_value' => array (
      ),
      'layout' => 'horizontal',
      'toggle' => 0,
      'return_format' => 'value',
    )
  );
}
