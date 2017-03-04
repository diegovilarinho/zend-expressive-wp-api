<?php

/**
 * Generate ACF Text Fields
 */
function titleField($prefix, $uniqueId, $title_label = 'Título da Seção', $title_instruction = null, $title_width = '') {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $title_label,
      'name' => $prefix . '_title',
      'type' => 'text',
      'instructions' => $title_instruction,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => $title_width,
        'class' => '',
        'id' => '',
      ),
    )
  );
}
