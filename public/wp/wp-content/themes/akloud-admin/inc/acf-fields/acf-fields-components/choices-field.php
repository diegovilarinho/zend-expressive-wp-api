<?php

/**
 * ACF field with: Background Image(jpg, png, svg), Video, Content Imagem
 */
function choicesField( $prefix, $uniqueId, $options_label, $choices = array() ) {
  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $options_label,
        'name' => $prefix . '_display_choices',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => $choices,
        'allow_null' => 0,
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => '1',
        'layout' => 'horizontal',
      )
    );
}