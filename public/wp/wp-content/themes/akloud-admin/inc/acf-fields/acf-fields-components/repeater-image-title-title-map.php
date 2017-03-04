<?php

/**
 * Generate ACF Field repeater of image and title WITHOUT link
 * Repeater field with: Image(jpg, png, svg), Title
 */
function repeaterImageTitleTitleMap($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $max_items = null) {
  return
    array(
      // Repeater de Imagens, Títulos(cidades), Títulos(Telefones) e Mapas
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Lista de Localizações e Contatos',
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'collapsed' => 'field_' . $uniqueId2,
        'min' => '',
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Localização',
        'sub_fields' => array (
          // Box Icon
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Imagem ou ícone',
            'name' => $prefix . '_list_item_icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 20,
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => 'jpg,png,svg',
          ),
          // Box Title
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Nome da Localização',
            'name' => $prefix . '_list_item_title1',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 40,
            ),
          ),
          // Box Title
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Telefone',
            'name' => $prefix . '_list_item_title2',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 40,
            ),
          ),
          // Google Map Field
          array (
            'key' => 'field_' . $uniqueId4,
            'label' => 'Mapa da Localização',
            'name' => $prefix . '_list_item_map',
            'type' => 'google_map',
            'instructions' => 'Cole o endereço da localização e posicione o pin no mapa.',
            'center_lat' => '-27.6133458',
            'center_lng' => '-48.5529044',
            'zoom' => '',
            'height' => '',
          )
        )
      )
    );
}
