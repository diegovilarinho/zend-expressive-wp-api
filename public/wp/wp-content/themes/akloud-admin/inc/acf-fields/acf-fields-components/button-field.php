<?php

/**
 * Simple Button Field
 * Button - Label, URL, Target
 */
function buttonField( $prefix, $uniqueId, $uniqueId1, $uniqueId2, $title_label = 'Texto do botão', $url_label = 'URL do botão', $target_label = 'Abrir em nova aba?' ) {
  return
    array(
      // Botão do Box
      // Texto do Botão
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $title_label,
        'name' => $prefix . '_button_text',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => 35,
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
      // URL do Botão
      array (
        'key' => 'field_' . $uniqueId1,
        'label' => $url_label,
        'name' => $prefix . '_button_url',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => 35,
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
      ),
      // Target do Botão
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => $target_label,
        'name' => $prefix . '_button_target',
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => 30,
          'class' => '',
          'id' => '',
        ),
        'message' => '',
        'default_value' => 0,
      )
    );
}