<?php

/**
 * Generate ACF Tabs with Title and Subtitle Fields
 */
function tabWithTitleAndSubtitleFields($tab_label, $uniqueId, $title_prefix, $uniqueId1, $uniqueId2, $title_label = 'Título da Seção', $title_instruction = null, $subtitle_label = 'Subtítulo da Seção', $subtitle_instruction = null) {
  return array(
    // Section Tab
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
    // Section Title
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
    ),
    // Section Subtitle
    array (
      'key' => 'field_' . $uniqueId2,
      'label' => $subtitle_label,
      'name' => $title_prefix . '_subtitle',
      'type' => 'text',
      'instructions' => $subtitle_instruction,
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
