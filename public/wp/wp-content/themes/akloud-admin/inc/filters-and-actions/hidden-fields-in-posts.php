<?php
// Change what's hidden by default
// add_filter('default_hidden_meta_boxes', 'be_hidden_meta_boxes', 10, 2);
// function be_hidden_meta_boxes($hidden, $screen) {
// 	if ( 'sfwd-courses' == $screen->base || 'sfwd-lessons' == $screen->base )
// 		$hidden = array('slugdiv', 'trackbacksdiv', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');
// 		// removed 'postcustom', 'postexcerpt'
// 	return $hidden;
// }

add_filter('default_hidden_meta_boxes', 'show_hidden_meta_boxes', 10, 2);
 
function show_hidden_meta_boxes($hidden, $screen) {
    if ( 'sfwd-courses' == $screen->base ) {
        foreach($hidden as $key=>$value) {
            if ('postexcerpt' == $value) {
                unset($hidden[$key]);
                break;
            }
        }
    }
 
    return $hidden;
}