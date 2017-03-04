<?php

/**
 * ACF field with: Background Image(jpg, png, svg), Video, Content Imagem
 */
function heroWithVideoAndImage( $prefix, $uniqueId, $uniqueId1, $uniqueId2, $video_width = 640, $video_height = 390 ) {
  return
    array(
      //Imagem de Fundo do Banner
      array (
        'key' => 'field_' . $uniqueId,
        'label' => 'Imagem de fundo do banner',
        'name' => $prefix . '_image',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
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
      // Vídeo do Conteúdo do Banner
      array (
        'key' => 'field_' . $uniqueId1,
        'label' => 'Vídeo',
        'name' => $prefix . '_video',
        'type' => 'oembed',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => 70,
          'class' => '',
          'id' => '',
        ),
        'width' => $video_width,
        'height' => $video_height,
      ),
      // Ilustração do ícone de play do vídeo
      array (
        'key' => 'field_' . $uniqueId2,
        'label' => 'Ilustração do ícone de play',
        'name' => $prefix . '_icon_play_illustration',
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
      )
    );
}