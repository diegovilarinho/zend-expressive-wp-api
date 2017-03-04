<?php

/**
 * Generate ACF Tabs Fields
 */
function tabField($label, $uniqueId, $conditional_logic = false, $conditions_items = array()) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $label,
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    )
  );
}