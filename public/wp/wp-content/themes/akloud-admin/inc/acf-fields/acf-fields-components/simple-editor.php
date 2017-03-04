<?php

/**
 * Generate ACF Simple Editor WP
 */
function simpleWpEditor( $prefix, $uniqueId, $title_label = 'Conteúdo da Seção', $conditional_logic = false, $conditions_items = array() ) {

  //If existis choices
  $conditions = array ($conditions_items);

  return
    array(
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $title_label,
        'name' => $prefix . '_editor',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => ($conditional_logic == true) ? $conditions : 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
      )
    );
}