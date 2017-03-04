<?php

/**
 * Generate ACF Textarea Fields
 */
function taxonomiesField($prefix, $uniqueId, $taxonomy, $field_label = 'Taxonomias', $instructions = null, $multiple = 0, $field_type = 'multi_select') {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix . '_taxonomies',
      'type' => 'taxonomy',
      'instructions' => $instructions,
      'required' => 0,
      'conditional_logic' => 0,
      'taxonomy' => $taxonomy,
      'field_type' => 'multi_select',
      'allow_null' => 0,
      'add_term' => 0,
      'save_terms' => 0,
      'load_terms' => 0,
      'return_format' => 'object',
      'multiple' => $multiple,
    )
  );
}