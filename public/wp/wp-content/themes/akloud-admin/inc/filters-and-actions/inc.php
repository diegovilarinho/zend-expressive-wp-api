<?php

require 'custom-extensions-support.php';
require 'disable-admin-to-subscrible-users.php';
require 'set-custom-phpmailer-config.php';
require 'hidden-fields-in-posts.php';

// /**
//  * Adding custom style to wp-admin panel
//  */
// function load_custom_wp_admin_style() {
//         wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/inc/admin-custom-style.css', false, '1.0.0' );
//         wp_enqueue_style( 'custom_wp_admin_css' );
// }
// add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
//
// /**
//  * Filter the except length to 50 characters.
//  *
//  * @param int $length Excerpt length.
//  * @return int (Maybe) modified excerpt length.
//  */
// function wpdocs_custom_excerpt_length( $length ) {
//     return 50;
// }
// add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
//
//
// /**
//  * Filter the excerpt "read more" string.
//  *
//  * @param string $more "Read more" excerpt string.
//  * @return string (Maybe) modified "read more" excerpt string.
//  */
// function wpdocs_excerpt_more( $more ) {
//     return ' ...';
// }
// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
//
// function remove_menus() {
//   remove_submenu_page( 'theme-general-settings', 'theme-general-settings' );
// }
// add_action( 'admin_menu', 'remove_menus', 999 );
//
//

?>
