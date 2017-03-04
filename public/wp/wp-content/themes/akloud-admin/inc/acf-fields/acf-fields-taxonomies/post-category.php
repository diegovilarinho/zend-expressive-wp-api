<?php

// Require partials de ACF Fields
include_once get_template_directory() . '/inc/acf-fields/acf-fields-components/inc.php';

/**
 * Um merge dos arrays retornados pelas funções importadas dos arquivos acima é feito
 * afim de importar os fields da home.
 */

$locationParams = 'taxonomy'; // options_page, page_template, post_type, taxonomy
$locationValue = 'category';

$group_uniqueId = '72287aae-b4c8-45d6-a64f-6e85f908642d';

$page_fields = array_merge_recursive(
  colorPickerField(
    'category',
    'baf59284-dae3-46be-83b0-52d3df409c85',
    'Cor da Categoria', '#4BE5C3'
  )
);

//O grupo de campos é criado para a homepage
if( function_exists('acf_add_local_field_group') ):
  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Campos da Taxonomia de Categorias de Posts',

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
    'options' => acfReset()
  ));
endif;