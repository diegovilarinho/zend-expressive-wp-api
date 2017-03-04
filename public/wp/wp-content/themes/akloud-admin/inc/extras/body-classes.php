<?php
/**
 * Adds custom classes to the array of body classes
 * @param array $classes Classes for the body element
 * @return array
 */
function body_classes($classes) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}
	// Adiciona classe para remover footer das singles abaixo.
	if( is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) ) {
		$classes[] = 'no-footer';	
	}

	return $classes;
}
add_filter('body_class', 'body_classes');
