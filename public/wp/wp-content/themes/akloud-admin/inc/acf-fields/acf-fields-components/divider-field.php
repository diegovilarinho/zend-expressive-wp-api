<?php

/**
 * Generate ACF Tabs Fields
 */
function lineDividerField($prefix = 'divider', $uniqueId) {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => '',
      'name' => $prefix,
      'type' => 'message',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '<hr />',
      'new_lines' => 'br',
      'esc_html' => 0,
    )
  );
}