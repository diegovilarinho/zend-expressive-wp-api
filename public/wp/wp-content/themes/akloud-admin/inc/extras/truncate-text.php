<?php
/**
 * Truncate text
**/
function truncate_text($str, $length = 20, $trailing = '...') {
  $length -= mb_strlen($trailing);
  if (mb_strlen($str) > $length) {
    return mb_substr($str, 0, $length) . $trailing;
  } else {
    $res = $str;
  }
  return $res;
}
?>
