<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';
include_once get_template_directory() . '/inc/acf-fields/acf-fields-pages/acf-home-about-templates-types.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'page_template'; // options_page, page_template, post_type
$locationValue = 'page-about.php';
$group_uniqueId = 'ca399e14-0bc3-43d8-b21e-940397e31aa5';
$with_permalink = false;

$page_fields = array_merge_recursive(
  repeaterHomeAboutTemplatesTypes(
    'about',
    '97f1c408-7283-4f31-8122-7d5b02b2cc4d',
    '23af9c5f-989a-4cb5-a846-fab8d21a5e85',
    'a2c13cf2-3667-4665-915a-bca6d8353206',
    'f00736d1-7e09-45b2-95a5-ad545e607757',
    '9517c80d-29d0-4f38-b0ba-6ba45ad2a9d5',
    '5cb6e800-93ee-444d-8b0c-802cbf495762',
    'ce23ffa8-a798-43c4-84f9-3e734d672652',
    '7bb832a9-efc3-4de8-84cf-98d75853a470',
    '031ed1c9-08cb-44f0-b3de-929ff2e0c3f9',
    'e4cd084a-8b33-418e-a3cb-935642562761',
    '428d3d17-db19-4a75-bbe6-f44cc34fdd65',
    '892b3d3b-9c06-4d34-ad00-4606206ae647',
    '31f208d6-f349-499a-a328-4d2787d14b26',
    '55dee63a-4d27-4b1d-9173-6325d86b96cb',
    '78302b14-1992-4b05-807b-13235d8cf644',
    '53f433e4-1596-4e10-b41a-1852a529746f',
    'c1364e9e-12da-4e45-9e71-4462f3445a7e',
    '88adea67-c78b-4cec-a5d1-d221ac8c9507',
    'd52992d2-ad59-4fe8-9852-ccf0f486204c',
    '618797b0-d857-4a6a-8405-75899e5f26cf',
    '7f561a45-4f3d-4b8f-aba8-066719e1570d',
    'aa6e9d05-c7e6-4caa-afd6-4fed3a625b64',
    'f8d264dc-f703-4961-bde8-2b2707963620',
    '22cfaa16-46ba-4968-9970-b218b839a8da',
    '948bef20-be0f-40a4-8022-a890bb3bdbab',
    'e5845fc1-ff23-4e35-bdb0-3bb0c317297c',
    'deda9a19-2afb-4a42-9400-9fab2d9b6576',
    '3c6f08b7-a31a-4b7d-85a4-5ab47472b58c',
    'a8c01664-b594-4252-af32-825e47f856e5',
    'db87cad6-5552-454e-b20c-d0ab23fd0243',
    '7113b587-9f0a-46f0-a281-b0bc29da411f'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos da Página de About',

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