<?php
/**
 * Adiciona estilos em css ao admin do WP
 * 
 */
add_action('admin_head', 'custom_css_to_admin');

function custom_css_to_admin() {
  echo '<style>
    #toplevel_page_theme-general-settings ul.wp-submenu li.wp-first-item {
    	display: none;
    }
  </style>';
}