<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'options_page'; // options_page, page_template, post_type
$locationValue = 'faq-accordion-settings';

$group_uniqueId = '18e57208-2c02-4e79-88d6-88b932c31ba7';
$with_permalink = false;

$page_fields = array_merge_recursive(

  //Aba 1
  tabField(
    'Lista de Perguntas e Respostas', 
    'ca55a7e0-5f49-40f9-a1b5-6d5db6f6ecf5'
  ),
  repeaterWithThreeLevels(
    'faq',
    'faq_child',
    'faq_grandson',
    '1103fd65-050f-4825-b369-9eb8b79c581d',
    'd28cc565-1f65-44cd-a657-f89b46024515',
    '1099177e-42d9-488a-8e7e-cd665d9d2fed',
    'd3882043-b2d7-4436-aa2e-c3178ff684e3',
    'c6f8628e-6771-4470-a0a5-7fd35e88ce9e',
    '30222152-e380-4fa1-95a5-8511eab3d20b',
    '98c4eb8d-c332-4908-b45e-07c5bb07fdf1',
    '2fd7b166-251e-47e1-b49e-d78e8da3ddb4',
    'fddb3920-065d-4d83-9bdc-b7c3134ed3f3'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Gerenciamento de Accordion de FAQ',

    'fields' => $page_fields,

    'location' => array (
      array (
        array (
          'param' => $locationParams,
          'operator' => '==',
          'value' => $locationValue,
        ),
      ),
    ),
    'menu_order' => 0,
    'options' => acfReset($with_permalink)
  ));

endif;