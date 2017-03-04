<?php

/**
 * Generate ACF Field repeater of image and title WITHOUT link
 * Repeater field with: Image(jpg, png, svg), Title
 */
function repeaterImageTitleSubtitle($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $repeater_label = 'Lista de Itens', $textarea_instructions = null, $textarea_rows = 8, $max_items = null) {
  return
    array(
      // Repeater de Imagens, Títulos(cidades), Títulos(Telefones) e Mapas
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $repeater_label,
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'collapsed' => 'field_' . $uniqueId2,
        'min' => '',
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Localização',
        'sub_fields' => array (
          // Item Icon
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'Imagem ou ícone',
            'name' => $prefix . '_list_item_icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 30,
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
          // Item Title
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title1',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => 70,
            ),
          ),
          // Item Subtitle
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Subtítulo',
            'name' => $prefix . '_list_item_subtitle',
            'type' => 'textarea',
            'instructions' => $textarea_instructions,
            'maxlength' => '',
            'rows' => $textarea_rows,
            'new_lines' => 'br',
            'readonly' => 0,
            'disabled' => 0,
          )
        )
      )
    );
}
