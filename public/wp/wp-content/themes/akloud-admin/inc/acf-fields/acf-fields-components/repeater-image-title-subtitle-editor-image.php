<?php

/**
 * Generate ACF Field repeater of image and title WITHOUT link
 * Repeater field with: Image(jpg, png, svg), Title
 */
function repeaterImageTitleSubtitleEditorImage($prefix, $uniqueId, $uniqueId1, $uniqueId2, $uniqueId3, $uniqueId4, $uniqueId5, $repeater_label = 'Lista de Itens', $max_items = null) {
  return
    array(
      // Repeater de Imagens, Títulos(cidades), Títulos(Telefones) e Mapas
      array (
        'key' => 'field_' . $uniqueId,
        'label' => $repeater_label,
        'name' => $prefix . '_list',
        'type' => 'repeater',
        'collapsed' => 'field_' . $uniqueId3,
        'min' => '',
        'max' => $max_items,
        'layout' => 'block',
        'button_label' => 'Adicionar Localização',
        'sub_fields' => array (
          // Item Icon
          array (
            'key' => 'field_' . $uniqueId1,
            'label' => 'ícone do Item',
            'name' => $prefix . '_list_item_icon',
            'type' => 'image',
            'wrapper' => array (
              'width' => 50,
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'mime_types' => 'jpg,png,svg',
          ),
          array (
            'key' => 'field_' . $uniqueId2,
            'label' => 'Imagem de Destaque do Item',
            'name' => $prefix . '_list_item_image',
            'type' => 'image',
            'wrapper' => array (
              'width' => 50,
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'mime_types' => 'jpg,png,svg',
          ),
          // Item Title
          array (
            'key' => 'field_' . $uniqueId3,
            'label' => 'Título',
            'name' => $prefix . '_list_item_title',
            'type' => 'text',
            'wrapper' => array (
              'width' => 50,
            ),
          ),
          // Item Subtitle
          array (
            'key' => 'field_' . $uniqueId4,
            'label' => 'Subtítulo',
            'name' => $prefix . '_list_item_subtitle',
            'type' => 'text',
            'wrapper' => array (
              'width' => 50,
            ),
          ),
          array (
            'key' => 'field_' . $uniqueId5,
            'label' => 'Texto do Item',
            'name' => $prefix . '_list_item_editor',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
          )
        )
      )
    );
}
