<?php

function get_content_first_image($content_source){
  $content_source = "" ? get_the_content() : $content_source;
  $html = $content_source;
  $doc = new DOMDocument();
  $doc->loadHTML($html);
  $xpath = new DOMXPath($doc);
  $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
  return $src;
}
?>
