<?php

/**
 * Generate ACF Url Fields
 */
function urlField($prefix, $uniqueId, $url_label = 'URL de Destino do Link', $field_width = '', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $url_label,
      'name' => $prefix . '_url',
      'type' => 'url',
      'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
      'wrapper' => array (
        'width' => $field_width,
      ),
    )
  );
}
