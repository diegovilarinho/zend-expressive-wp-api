<?php

// POST TYPE: Solution

$solution_labels = array(
  'name'               => 'Soluções',
  'singular_name'      => 'Solução',
  'menu_name'          => 'Soluções',
  'name_admin_bar'     => 'Solução',
  'add_new'            => 'Adicionar Novo',
  'add_new_item'       => 'Adicionar Novo Solução',
  'new_item'           => 'Novo Solução',
  'edit_item'          => 'Editar Solução',
  'view_item'          => false,
  'all_items'          => 'Todos os Soluções',
  'search_items'       => 'Buscar Soluções',
  'parent_item_colon'  => 'Solução Pai',
  'not_found'          => 'Nenhum Solução Encontrado',
  'not_found_in_trash' => 'Nenhum Solução encontrado na lixeira'
);

$solution_args = array(
  'labels'              => $solution_labels,
  'public'              => true,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'show_ui'             => true,
  'show_in_nav_menus'   => true,
  'show_in_menu'        => true,
  'show_in_admin_bar'   => true,
  'menu_position'       => 5,
  // 'show_in_rest'       => true,
  // 'rest_base'          => 'case-study',
  // 'rest_controller_class' => 'WP_REST_Posts_Controller',
  'menu_icon'           => 'dashicons-megaphone',
  'capability_type'     => 'post',
  'hierarchical'        => false,
  'supports'            => array('title', 'page-attributes'),
  'has_archive'         => true,
  'rewrite'             => array('slug' => 'solution'),
  'query_var'           => true
);

register_post_type('solution', $solution_args);