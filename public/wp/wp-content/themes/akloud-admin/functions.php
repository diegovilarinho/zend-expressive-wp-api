<?php
/**
 * Theme functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Require inc
 */
require get_template_directory() . '/inc/inc.php';

// ==========================================================================

// Remove WP emoji

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function scripts() {
  wp_enqueue_style('styles', get_bloginfo('template_url') . '/style.css');

  $whitelist = array('127.0.0.1', '::1');

  if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    wp_enqueue_script('bundle', get_bloginfo('template_url') . '/scripts/bundle.min.js', null, null, true);
  } else {
    wp_enqueue_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, null, true);
    wp_enqueue_script('bundle', get_bloginfo('template_url') . '/scripts/bundle.js', null, null, true);
  }

  // wp_deregister_script('jquery');

  if (!is_user_logged_in()) {
    wp_deregister_style('dashicons');
  }
}

add_action('wp_enqueue_scripts', 'scripts');

?>
