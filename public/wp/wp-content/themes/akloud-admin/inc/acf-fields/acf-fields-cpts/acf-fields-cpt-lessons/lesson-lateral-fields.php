<?php

$prefix = 'lesson';

$group_uniqueId = '29868712-c4e6-4571-aba3-8035436fac9a';

$uniqueId = '6754c9cb-7e5d-42a0-baa8-88e277dc325c';
$uniqueId1 = '38a9e09a-52ec-4adc-82e0-65cbb60ea717';

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array (
    'key' => 'group_' . $group_uniqueId,
    'title' => 'Tipo de Lição',
    'fields' => array (
		// Tipo de Lição
		array (
			'key' => 'field_' . $uniqueId,
			'label' => 'Escolha o Tipo de Lição',
			'name' => $prefix . '_type',
			'type' => 'radio',
			'instructions' => 'O tipo de lição vai indicar como a lição deve ser exibida, além de apresentar o ícone correto na listagem de lições.',
			'choices' => array (
				'text' => 'Documento',
				'video' => 'Vídeo',
				'audio' => 'Áudio',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'text',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_' . $uniqueId1,
			'label' => 'Vídeo',
			'name' => $prefix . '_video',
			'type' => 'oembed',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_' . $uniqueId,
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
	    )
    ),
    'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sfwd-lessons',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'sfwd-topic',
				'order_no' => 0,
				'group_no' => 1,
			),
		),
		// array (
		// 	array (
		// 		'param' => 'post_type',
		// 		'operator' => '==',
		// 		'value' => 'aditional_help',
		// 		'order_no' => 0,
		// 		'group_no' => 3,
		// 	),
		// ),
	),
    'menu_order' => 0,
    'position' => 'side',
    'layout' => 'default',
  ));

endif;

?>