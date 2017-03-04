<?php
function page_permalink_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->guid;
  } else {
    return null;
  }
}
?>
