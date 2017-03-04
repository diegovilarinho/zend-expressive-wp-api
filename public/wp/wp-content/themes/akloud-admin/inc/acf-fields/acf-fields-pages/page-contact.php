<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';
include_once get_template_directory() . '/inc/acf-fields/acf-fields-pages/acf-home-about-templates-types.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'page_template'; // options_page, page_template, post_type
$locationValue = 'page-contact.php';
$group_uniqueId = 'bcac5bd2-0560-4fcd-b175-f081d90d4099';
$with_permalink = false;

$page_fields = array_merge_recursive(

  //Text after form
  textareaField(
    'contact_form_subtext',
    'ebafdbb5-c7ee-48e5-b900-0ff49aeff303',
    4, 'Texto abaixo do formulário de contato da página.',
    'Este text será apresentado logo abaixo do formulário de contato, na seção inicial da página.'
  ),
  messageField(
    'contact_areas_divisor',
    '<hr />',
    '71fe1167-49d3-40ec-9372-9854f9530964'

  ),


  //Sections after faq/form area
  messageField(
    'contact_repeater_sections_title',
    '<h3>Adicione abaixo as seções que aparecerão após a seção de formulário da página</h3>',
    'bf960d3b-0bbc-48f2-9e58-52159d6dbe70'

  ),
  repeaterHomeAboutTemplatesTypes(
    'contact',
    'c22025ad-bc03-4909-a6ea-6a0c68842ec6',
    'a02a8099-de16-4ee4-81bb-b3e287553495',
    'c59b4ce4-f664-4c64-bb26-5aea1b67a4b1',
    '6c613312-760c-455a-a55f-cb59253546bc',
    '7cfd0ddf-aa1f-4ac3-987e-f9b9ad9fd474',
    'acf7d3a0-991e-4f0f-a4d7-7b7dfe58f4c3',
    '3f4b7a70-15d1-45c1-a89d-e68e1d69c87c',
    'c0df22e1-a2a9-4c91-b0c6-da1626120ae2',
    '56f1aa9d-c99c-4a48-bd08-d494a175cdfd',
    '8636c279-da71-4884-a106-b05919a5cd23',
    'a1a5de5d-bb5d-4a79-9a84-761f50586ed0',
    '54d6c15a-aee9-4a4f-b521-1b482b0eeafc',
    '2b0243a0-057a-4ebd-9f26-48b4d35f0313',
    'cd7a69e7-de6d-422d-be9f-2e7b21bb19d5',
    'd2f2740a-224e-434c-ab50-bb8ffd367f67',
    '6b0c03e9-b622-4ba7-9ff3-f1e994a1bb97',
    '703e8a16-094a-45f1-9e42-01c0fb061e3d',
    'c88a120d-3374-4843-a9e5-e9c190e7ee64',
    'ca89dfc9-241c-4db1-9abb-21c9e38153b1',
    '16f0cba7-714c-48e9-a6fe-48c649b4893b',
    'd7e88666-82f6-44e0-9bbd-c9fd98b0260a',
    '130b68e6-54bd-4e72-88c3-d2944483bc8f',
    'f6219439-aea5-4165-9371-536a1590218c',
    '3f551f70-7a98-42a3-8cbf-50ed06d7917e',
    'bef1ac17-5791-470c-9a0a-d9a81d2d2632',
    'd36e7914-517f-48bc-a200-6065a89379b7',
    '5e700a5e-36bc-401e-809d-ead6e1b8ff5e',
    '4d5a800d-fb32-4e6b-a107-5ed11a9a578a',
    'f436cbf1-a888-4fb1-a31a-0b6a90259ed5',
    '5db6ea3c-22e7-489e-942b-d3d4feb54f53',
    '2c0902fb-d9c0-40d7-acba-3653c555665b'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos da Página de Contato',

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