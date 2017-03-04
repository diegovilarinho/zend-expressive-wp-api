<?php

/**
 * Generate ACF Tabs Fields
 */
function tabWithTitleField($tab_label, $title_prefix, $uniqueId, $uniqueId1, $title_label = 'Título da Seção', $title_instruction = null) {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => $tab_label,
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    // Box Title
    array (
      'key' => 'field_' . $uniqueId1,
      'label' => $title_label,
      'name' => $title_prefix . '_title',
      'type' => 'text',
      'instructions' => $title_instruction,
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    )
  );
}
