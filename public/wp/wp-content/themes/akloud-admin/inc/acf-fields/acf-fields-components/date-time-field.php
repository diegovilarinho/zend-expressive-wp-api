<?php

/**
 * Generate ACF Url Fields
 */
function dateHourFiled($prefix, $uniqueId, $field_label = 'Escolha uma data e hora', $field_width = '', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_datetime',
      'type' => 'date_time_picker',
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => $field_width,
        'class' => '',
        'id' => '',
      ),
      'display_format' => 'd/m/Y H:i:s',
      'return_format' => 'd/m/Y H:i:s',
      'first_day' => 0,
    )
  );
}
