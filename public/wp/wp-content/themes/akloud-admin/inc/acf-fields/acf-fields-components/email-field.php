<?php

/**
 * Generate ACF Tabs Fields
 */
function emailField($prefix, $uniqueId, $field_label = 'E-mail') {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_email',
      'type' => 'email',
    )
  );
}