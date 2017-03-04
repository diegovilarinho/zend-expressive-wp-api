<?php
/**
 * Display first tag of a post
 */
function first_tag($post_id) {
  $posttags = get_the_tags($post_id);
  $count=0;
  if ($posttags):
    foreach($posttags as $tag) :
      $count++;
      if ($count == 1):
        echo $tag->name;
      endif;
    endforeach;
  endif;
}
?>
