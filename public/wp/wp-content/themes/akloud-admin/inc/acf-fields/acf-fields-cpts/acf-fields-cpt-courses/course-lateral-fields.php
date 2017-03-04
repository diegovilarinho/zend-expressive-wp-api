<?php

$post_type = 'sfwd-courses';
$prefix = 'course';

$group_uniqueId = '3f4d2aa4-3dad-4372-8a76-f5922b4e9f32';

$uniqueId = '917e6bd0-a513-40fa-8804-60cf1b77722d';
$uniqueId1 = 'fa68c2cd-d9e1-4ad1-b4d4-c0677403fc1f';
$uniqueId2 = '1b21dec0-6e6b-434d-9271-18125d16a9e9';
$uniqueId3 = '3eb3ebf6-2675-4692-897d-b538bace4eb2';

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Dados do Curso',
    'fields' => array (
      // Instrutor
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Instrutor do Curso',
        'name' => $prefix . '_instructor',
        'type' => 'user',
        'instructions' => '',
      ),
      array (
        'key' => 'field_' . $uniqueId1,
        'label' => 'Tipo de Curso',
        'name' => $prefix . '_type',
        'type' => 'select',
        'instructions' => '',
        'conditional_logic' => 0,
        'choices' => array (
          1 => 'Online',
          2 => 'Presencial',
          3 => 'Online + Presencial',
        ),
      ),
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => 'Data de Início',
        'name' => $prefix . '_start_date',
        'type' => 'date_picker',
        'instructions' => '',
        'display_format' => 'd/m/Y',
        'return_format' => 'd/m/Y',
        'first_day' => 1,
      ),
      array (
        'key' => 'field_' . $uniqueId3,
        'label' => 'Badge do curso',
        'name' => $prefix . '_image_badge',
        'type' => 'image',
        'instructions' => '',
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'mime_types' => 'jpg,png,svg',
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
    'position' => 'side',
    'style' => 'standard',
    'label_placement' => 'top',
    'instruction_placement' => 'field'
  ));

endif;

?>