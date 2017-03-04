<?php

// POST TYPE: Testimonial

$testimonial_labels = array(
  'name'               => 'Testimonials',
  'singular_name'      => 'Testimonial',
  'menu_name'          => 'Testimonials',
  'name_admin_bar'     => 'Testimonial',
  'add_new'            => 'Adicionar Novo',
  'add_new_item'       => 'Adicionar Novo Testimonial',
  'new_item'           => 'Novo Testimonial',
  'edit_item'          => 'Editar Testimonial',
  'view_item'          => false,
  'all_items'          => 'Todos os Testimonials',
  'search_items'       => 'Buscar Testimonials',
  'parent_item_colon'  => 'Testimonial Pai',
  'not_found'          => 'Nenhum Testimonial Encontrado',
  'not_found_in_trash' => 'Nenhum Testimonial encontrado na lixeira'
);

$testimonial_args = array(
  'labels'              => $testimonial_labels,
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
  'rewrite'             => array('slug' => 'testimonial'),
  'query_var'           => true
);

register_post_type('testimonial', $testimonial_args);