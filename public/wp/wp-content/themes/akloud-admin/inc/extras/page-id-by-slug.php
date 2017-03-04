<?php
/**
 * Get page id using slug
 * @param string $page_slug
 * @return string or null
**/
function page_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}
?>
