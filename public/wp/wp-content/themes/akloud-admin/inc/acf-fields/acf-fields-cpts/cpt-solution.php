<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'post_type'; // options_page, page_template, post_type
$locationValue = 'solution';
$group_uniqueId = '9e0cd93e-bbf9-4c44-bbdb-18fdfba195c9';
$with_permalink = false;

$page_fields = array_merge_recursive(

  //Aba 1
  tabField(
    'Dados Gerais', 
    '4b36b3df-1646-4268-8e0a-2fff241339ad'
  ),
  imageField(
    'nesolution_icon',
    'c16f68bb-dee1-434f-881c-f7658b35d44b',
    30, 'ícone da solução'
  ),
  textareaField(
    'nesolution_short_description',
    '204d9ed6-5b24-4099-ac7d-e76fac48ad73',
    4, 'Breve descrição da solução',
    'Este campo tem um máximo de 150 caracteres',
    '150', 70
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos do CPT de Solução',

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