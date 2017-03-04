<?php
// https://www.advancedcustomfields.com/resources/register-fields-via-php/

/**
 * ACF FW
**/
function acf_settings_path($path) {
  $path = get_stylesheet_directory() . '/inc/acf/';
  return $path;
}

add_filter('acf/settings/path', 'acf_settings_path');

function acf_settings_dir($dir) {
  $dir = get_stylesheet_directory_uri() . '/inc/acf/';
  return $dir;
}

add_filter('acf/settings/dir', 'acf_settings_dir');

include_once(get_stylesheet_directory() . '/inc/acf/acf.php' );

if (!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
  add_filter('acf/settings/show_admin', '__return_false');
}

if(function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
		'page_title' 	=> 'FAQ - Dúvidas Frequentes',
		'menu_title'	=> 'FAQ',
		'menu_slug' 	=> 'faq-accordion-settings',
    'icon_url'    => 'dashicons-feedback',
    'position'    => 20,
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

if (function_exists("register_field_group")) :

	require get_template_directory() . '/inc/acf-fields/helpers/_reset.php';
	
	require get_template_directory() . '/inc/acf-fields/acf-fields-pages/inc.php';
	require get_template_directory() . '/inc/acf-fields/acf-fields-options-pages/inc.php';

	require get_template_directory() . '/inc/acf-fields/acf-fields-cpts/inc.php';
	require get_template_directory() . '/inc/acf-fields/acf-fields-taxonomies/inc.php';

	require get_template_directory() . '/inc/acf-fields/acf-fields-extras/inc.php';
endif;
