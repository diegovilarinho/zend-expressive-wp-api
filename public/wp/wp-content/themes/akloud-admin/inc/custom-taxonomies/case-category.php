<?php

/**
 * TAXONOMY: Categorias
 * POST TYPE: Estudo de Caso
 */

// Add a taxonomy like categories to case
$case_category_label = array(
  'name'              => 'Categorias',
  'singular_name'     => 'Categoria',
  'search_items'      => 'Buscar Categorias',
  'all_items'         => 'Todas as Categorias',
  'parent_item'       => 'Categoria Pai',
  'parent_item_colon' => 'Categoria Pai:',
  'edit_item'         => 'Editar Categoria',
  'update_item'       => 'Atualizar Categoria',
  'add_new_item'      => 'Adicionar Nova Categoria',
  'new_item_name'     => 'Nome da Nova Categoria',
  'menu_name'         => 'Categorias',
);

$case_category_args = array(
  'hierarchical'      => true,
  'labels'            => $case_category_label,
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'show_in_rest'       => true,
  'rest_base'          => 'case-study-category',
  'rest_controller_class' => 'WP_REST_Terms_Controller',
  'rewrite'           => array( 'slug' => 'categoria-do-estudo-de-caso' )
);

register_taxonomy('case_study_category', array('case_study'), $case_category_args);