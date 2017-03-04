<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'post_type'; // options_page, page_template, post_type
$locationValue = 'testimonial';
$group_uniqueId = '9089773b-9688-4831-b1a0-84b088d18f2e';
$with_permalink = false;

$page_fields = array_merge_recursive(

  //Aba 1
  tabField(
    'Dados do Depoimento', 
    'b45568c5-19b1-42b8-962f-65a5645758ee'
  ),
  imageField(
    'testimonial_author_photo',
    '8a94338e-92c7-4b29-ab90-9b082f832c68',
    30
  ),
  titleField(
    'testimonial_author_name',
    '1f30cc48-d349-43f5-8417-db4981aa10a0',
    'Nome do Autor do Depoimento',
    '', 70
  ),
  titleField(
    'testimonial_author_office',
    'e0f367cf-e2b1-4f9d-b2d3-05dae1dc8733',
    'Cargo do Autor do Depoimento',
    '', 50
  ),
  titleField(
    'testimonial_author_company',
    '455526b1-74d3-4ad3-8e51-3d2b0cf2c9bd',
    'Empresa do Autor do Depoimento',
    '', 50
  ),
  simpleWpEditor(
    'testimonial_text',
    '7e3ac216-8021-4f2a-9d44-95dd9aa779ca',
    'Depoimento'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos do CPT de Depoimentos',

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