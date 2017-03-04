<?php

$prefix = 'user_field';

$group_uniqueId = '4ecb3870-fa72-48c8-ad00-2ca1fb5acb47';

$uniqueId   = '8f915291-dadf-494e-9dc1-06b78533a2e6';
$uniqueId1  = 'e3248a51-5c19-40a7-b224-3298b7e0c8f5';
$uniqueId2  = 'ba030f6b-80d4-4776-96ac-7b21ca7d7ae8';
$uniqueId3  = '271ef54b-0efe-42c1-9bbc-537dc5383615';
$uniqueId4  = '80cc5cb5-251a-427e-b286-f361917606ee';
$uniqueId5  = '07dddbcd-4bd1-4973-a66c-9520d019e707';

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Dados Personalizados do Usuário',
    'fields' => array (
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Foto do Usuário',
        'name' => $prefix . '_image',
        'type' => 'image',
        'return_format' => 'array',
        'preview_size' => 'thumbnail',
        'library' => 'all',
        'mime_types' => 'jpg,jpeg,png,svg',
      ),
      array (
        'key' => 'field_' . $uniqueId1,
        'label' => 'Redes sociais',
        'name' => $prefix . '_social_profile',
        'type' => 'message',
        'message' => '<hr />',
        'esc_html' => 0,
        'new_lines' => 'wpautop',
      ),
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => 'Linkedin',
        'name' => $prefix . '_linkedin_url',
        'type' => 'text',
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_' . $uniqueId3,
        'label' => 'Facebook',
        'name' => $prefix . '_facebook_url',
        'type' => 'text',
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_' . $uniqueId4,
        'label' => 'Instagram',
        'name' => $prefix . '_instagram_url',
        'type' => 'text',
        'formatting' => 'html',
      ),
      array (
        'key' => 'field_' . $uniqueId5,
        'label' => 'Twitter',
        'name' => $prefix . '_twitter_url',
        'type' => 'text',
        'formatting' => 'html',
      )
    ),
    'location' => array (
      array (
        array (
          'param' => 'user_role',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));

endif;

?>