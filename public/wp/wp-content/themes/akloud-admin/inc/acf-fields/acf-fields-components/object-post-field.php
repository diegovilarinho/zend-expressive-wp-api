<?php

/**
 * Generate ACF Messages Fields
 */
function objectPostField($prefix, $uniqueId, $post_types = array(), $field_label = 'Selecione o Post' ) {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $field_label,
      'name' => $prefix,
      'type' => 'post_object',
      'post_type' => $post_types,
      'taxonomy' => array (
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'return_format' => 'object',
      'ui' => 1,
    )
  );
}