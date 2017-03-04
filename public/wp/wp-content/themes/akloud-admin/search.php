<?php
	if (get_search_query() === '') {
		header("Location: site_url()/blog");
	}
?>
<?php
/**
 * Search Results Page
 */
?>
<?php get_header(); ?>

<?php get_footer(); ?>