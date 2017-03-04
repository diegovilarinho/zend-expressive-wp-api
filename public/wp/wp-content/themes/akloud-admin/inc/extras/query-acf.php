<?php
/**
 * Query ACF
**/
function query_acf($type, $field) {
  return get_posts(array(
    'numberposts' => -1,
    'post_type' => $type,
    'meta_key' => $field
  ));
}
?>
