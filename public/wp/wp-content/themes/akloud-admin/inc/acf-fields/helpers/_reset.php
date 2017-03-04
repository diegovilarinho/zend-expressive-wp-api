<?php
//General Options of ACF Groups
function acfReset( $with_permalink = true, $style = 'seamless', $position = 'normal' ) {
  if( $with_permalink == true ):

    return array (
      'position' => $position,
      'style' => $style,
      'label_placement' => 'top',
      'instruction_placement' => 'field',
      'hide_on_screen' => array (
        0 => 'the_content',
        1 => 'excerpt',
        2 => 'custom_fields',
        3 => 'discussion',
        4 => 'comments',
        5 => 'revisions',
        6 => 'slug',
        7 => 'author',
        8 => 'format',
        9 => 'categories',
        10 => 'tags',
        11 => 'send-trackbacks',
      )
    );

  else:

    return array (
      'position' => $position,
      'style' => $style,
      'label_placement' => 'top',
      'instruction_placement' => 'field',
      'hide_on_screen' => array (
        0 => 'permalink',
        1 => 'the_content',
        2 => 'excerpt',
        3 => 'custom_fields',
        4 => 'discussion',
        5 => 'comments',
        6 => 'revisions',
        7 => 'slug',
        8 => 'author',
        9 => 'format',
        10 => 'categories',
        11 => 'tags',
        12 => 'send-trackbacks',
      )
    );

  endif;
}