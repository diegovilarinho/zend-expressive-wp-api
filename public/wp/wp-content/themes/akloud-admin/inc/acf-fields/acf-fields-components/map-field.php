<?php

/**
 * Generate ACF Url Fields
 */
function mapFiled($prefix, $uniqueId, $field_label = 'Localização', $lat = '', $lng = '', $zoom = '', $height = '', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_map',
      'type' => 'google_map',
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'center_lat' => $lat,
      'center_lng' => $lng,
      'zoom' => $zoom,
      'height' => $height,
    ),
  );
}
