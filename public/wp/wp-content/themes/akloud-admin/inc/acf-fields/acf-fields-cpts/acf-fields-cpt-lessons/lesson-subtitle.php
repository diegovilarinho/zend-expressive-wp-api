<?php

$post_type = 'sfwd-lessons';
$prefix = 'lesson';

$group_uniqueId = '4ad439e0-ae8e-470a-8409-2a5eab116d5b';

$uniqueId = '03c2077d-9b82-4742-8905-2220689bd431';

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Subtítulo',
    'fields' => array (
      // Subtítulo do curso
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Subtítulo',
        'name' => $prefix . '_subtitle',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
      )
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => $post_type,
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => array (
      0 => 'discussion',
      1 => 'comments',
      2 => 'revisions',
      3 => 'author',
      4 => 'send-trackbacks',
    )
  ));

endif;

?>