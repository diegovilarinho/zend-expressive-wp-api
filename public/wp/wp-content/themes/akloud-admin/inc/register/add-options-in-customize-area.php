<?php
/**
 * Resolve o problem quando o upload de mídia gera a seguinte mensagem:
 * "Este tipo de arquivo não é permitido por razões de segurança."
 * USE: Basta adicionar as extensões que forem sendo bloqueadas pelo wp av.
 */

function add_new_options_in_customize_area($wp_customize) {

	$wp_customize -> add_section(
		'theme_header_settings',
		array(
			'title' => 'Cabeçalho',
			'priority' => 35,
		)
	);

	$wp_customize -> add_setting('theme_logo');
	$wp_customize -> add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'theme_logo', array(
			'label' => __( 'Logo', 'theme_logo' ),
	        'section' => 'theme_header_settings',
	        'settings' => 'theme_logo',
	    	)
		)
	);



	$wp_customize -> add_section(
		'theme_social_network',
		array(
			'title' => 'Redes Sociais',
			'priority' => 45,
		)
	);

	$wp_customize -> add_setting('theme_social_facebook');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_social_facebook', array(
			'label' => __( 'Facebook', 'theme_social_facebook' ),
	        'section' => 'theme_social_network',
	        'settings' => 'theme_social_facebook',
	    	)
		)
	);

	$wp_customize -> add_setting('theme_social_twitter');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_social_twitter', array(
			'label' => __( 'Twitter', 'theme_social_twitter' ),
	    'section' => 'theme_social_network',
	    'settings' => 'theme_social_twitter',
		)
		)
	);

	$wp_customize -> add_setting('theme_social_linkedin');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_social_linkedin', array(
			'label' => __( 'Linkedin', 'theme_social_linkedin' ),
	    'section' => 'theme_social_network',
	    'settings' => 'theme_social_linkedin',
		)
		)
	);

	$wp_customize -> add_setting('theme_social_instagram');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_social_instagram', array(
			'label' => __( 'Instagram', 'theme_social_instagram' ),
	    'section' => 'theme_social_network',
	    'settings' => 'theme_social_instagram',
		)
		)
	);

	$wp_customize -> add_setting('theme_social_youtube');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_social_youtube', array(
			'label' => __( 'Youtube', 'theme_social_youtube' ),
	    'section' => 'theme_social_network',
	    'settings' => 'theme_social_youtube',
		)
		)
	);


	$wp_customize -> add_section(
		'theme_footer_settings',
		array(
			'title' => 'Rodapé',
			'priority' => 55,
		)
	);

	$wp_customize -> add_setting('theme_footer_logo');
	$wp_customize -> add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'theme_footer_logo', array(
			'label' => __( 'Logo do Rodapé', 'theme_footer_logo' ),
	        'section' => 'theme_footer_settings',
	        'settings' => 'theme_footer_logo',
	    	)
		)
	);

	$wp_customize -> add_setting('theme_footer_phone');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_footer_phone', array(
				'label' => __( 'Telefone (para mais de 1 fone, use "/")', 'theme_footer_phone' ),
			    'section' => 'theme_footer_settings',
			    'settings' => 'theme_footer_phone'
			)
		)
	);

	$wp_customize -> add_setting('theme_footer_address');
	 $wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_footer_address', array(
		   		'label' => __( 'Endereço (use <br> para quebras de linha)', 'theme_footer_address' ),
		       	'section' => 'theme_footer_settings',
	 	       	'settings' => 'theme_footer_address',
					'type' => 'textarea'
	 	   	)
		)
	);

	$wp_customize -> add_setting('theme_footer_map_custom_marker');
	$wp_customize -> add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'theme_footer_map_custom_marker', array(
			'label' => __( 'Marcador do Mapa', 'theme_footer_map_custom_marker' ),
	        'section' => 'theme_footer_settings',
	        'settings' => 'theme_footer_map_custom_marker',
	    	)
		)
	);

	$wp_customize -> add_setting('theme_footer_copy');
	$wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_footer_copy', array(
			'label' => __( 'Copyright', 'theme_footer_copy' ),
	        'section' => 'theme_footer_settings',
	        'settings' => 'theme_footer_copy',
	    	)
		)
	);



	//Campos de scripts personalizados
	$wp_customize -> add_section(
		'theme_footer_scripts_settings',
		array(
			'title' => 'Scripts Personalizados',
			'priority' => 65,
		)
	);

	$wp_customize -> add_setting('theme_footer_custom_scripts');
	 $wp_customize -> add_control(
		new WP_Customize_Control(
			$wp_customize, 'theme_footer_custom_scripts', array(
		   		'label' => __( 'Scripts (use as tags <script></script>)', 'theme_footer_custom_scripts' ),
		       	'section' => 'theme_footer_scripts_settings',
	 	       	'settings' => 'theme_footer_custom_scripts',
					'type' => 'textarea'
	 	   	)
		)
	);

}

add_action('customize_register', 'add_new_options_in_customize_area');