<?php

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_57bf1aca398ab',
    'title' => 'Ajuda adicional',
    'fields' => array (
      array (
        'key' => 'field_56d9deb59b951',
        'label' => 'Ajuda adicional',
        'name' => 'aditional_help',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 1,
        'tabs' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'sfwd-lessons',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'sfwd-courses',
        ),
      ),
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'sfwd-quiz',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array (
    ),
    'active' => 1,
    'description' => '',
    'old_ID' => 1791,
  ));

endif;

?>