<?php
/**
 * Show fb comments of post with labels singular/plural
 * @author: Diego Vilarinho
 */
function facebook_comments_pluralize() {
  global $post;
  $url = get_permalink($post->ID);
  $filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);
  $json = json_decode($filecontent);
  $count = $json->$url->comments;
  if ($count == 0 || !isset($count)) {
    $count = 0;
    // $count = 'No Comments';
  }
  // elseif ( $count == 1 ) {
  //   $count = '1 comentário';
  // } else {
  //   $count .= ' comentários';
  // }
  echo $count;
}
?>
