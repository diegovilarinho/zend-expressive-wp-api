<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';
include_once get_template_directory() . '/inc/acf-fields/acf-fields-pages/acf-home-about-templates-types.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'page_template'; // options_page, page_template, post_type
$locationValue = 'page-home.php';
$group_uniqueId = 'cc64e3dc-0409-49b4-a341-dbfd2034de8d';
$with_permalink = false;

$page_fields = array_merge_recursive(
  repeaterHomeAboutTemplatesTypes(
    'home',
    'f576b094-5392-4aaf-9ee7-7316eda6468a',
    'c6febbde-b779-43dd-9e25-947e504901f1',
    '516f790d-5c21-412b-b397-018f2b6c2ab3',
    '11ecb291-6978-4cf9-9c97-bbb641b18329',
    '43c6a6cb-44b6-485e-961c-c5512f272352',
    '01affb8f-4339-47ad-b2aa-c749bc6802ea',
    'dd5d529c-ef25-4f1a-9054-aaa9b76c5967',
    '80519d11-eb7a-4c4f-93d8-544b6beaa2f8',
    '0397aa3b-06a2-42d3-a1f5-f1b0dd9a3d7e',
    '42ef9627-a380-49e1-a30b-e30ae9253b1f',
    '2522597e-ecf0-4125-8afe-50a3770db26d',
    '2ebec6e6-acc2-47ff-8703-476ed8dce8ea',
    '0e97ef0d-55ac-4451-8ec3-84152f024fc2',
    'e8e4f9ec-b3cf-4ef4-84a2-16b3860bf663',
    '152585ed-2b42-4cb1-b8f8-05ff79cd2552',
    '2aecce89-c5fc-473a-a7c7-c13e92779678',
    'b8f649b0-03a8-4932-9e80-9ec18945f87a',
    '0e469f34-f5e7-4ef1-8cdf-819b0fdf01bf',
    'daf27979-33d7-415a-bbc4-15a0868a22d7',
    '4a572c99-121c-4e16-b555-f87d8c3f8a43',
    'cf496164-bf6a-41c0-adba-530954822323',
    '1cb31686-ee3a-418b-afce-d4d90dc7f475',
    '528b1015-f54c-45fc-8035-7f4ec8653fce',
    'aad539dd-dbea-45d9-827c-57ec6016743a',
    '0bf43c71-3160-4f5f-a460-aa8f19db2fa2',
    '62860974-c987-4b9f-97d8-6e3432f66c1d',
    'f3429f32-bdff-431b-8339-11252efd512b',
    '9660fbb4-a0b2-4f27-a22c-c5588b122ada',
    '8fff40c4-4821-4029-a7a7-c381b96922d7',
    'd14fd803-0718-4943-88b1-c3d28ebd0c34',
    '7429cf6f-4118-4ba8-a422-f214b17ce0de'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos da Página de Home',

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