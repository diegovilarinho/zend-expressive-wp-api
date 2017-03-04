<?php

/**
 * Generate ACF Tabs Fields
 */
function videoField($prefix, $uniqueId, $video_width = 640, $video_height = 390, $video_wrapper_width = '') {
  return array(
    array (
      'key' => 'field_' . $uniqueId,
      'label' => 'Vídeo',
      'name' => $prefix . '_video',
      'type' => 'oembed',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => $video_wrapper_width,
        'class' => '',
        'id' => '',
      ),
      'width' => $video_width,
      'height' => $video_height,
    )
  );
}
