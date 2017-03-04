<?php

/**
 * Generate ACF Textarea Fields
 */
function textareaField($prefix, $uniqueId, $textarea_rows = 8, $textarea_title = 'Descrição', $instructions = null, $textarea_maxlength = null, $textarea_width = null) {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $textarea_title,
      'name' => $prefix . '_description',
      'type' => 'textarea',
      'instructions' => $instructions,
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => $textarea_width,
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => $textarea_maxlength,
      'rows' => $textarea_rows,
      'new_lines' => 'br',
      'readonly' => 0,
      'disabled' => 0,
    )
  );
}