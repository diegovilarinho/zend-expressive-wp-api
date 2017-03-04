<?php
/**
 * Get menu name by slug
 */
function menu_name_by_slug($menu_slug) {
  $locations = get_nav_menu_locations();
  $menu_id = $locations[ $menu_slug ] ;
  $menu_object = wp_get_nav_menu_object($menu_id);
  $menu_name = $menu_object->name;

  return $menu_name;
}
?>
