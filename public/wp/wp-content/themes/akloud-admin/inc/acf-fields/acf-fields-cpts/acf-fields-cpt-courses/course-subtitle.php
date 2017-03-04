<?php

$post_type = 'sfwd-courses';
$prefix = 'course';

$group_uniqueId = '24f235a1-8563-41fc-85e5-af041499aa5b';

$uniqueId = '34b1db9f-e562-4aa1-9422-ba2f203011b6';
$uniqueId1 = '96fb897f-2cf1-4148-a363-a5760dc34b58';

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
    'instruction_placement' => 'field'
  ));

endif;

?>