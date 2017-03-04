<?php
/**
 * Single Posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
?>
<?php get_header(); ?>

	<?php if( have_posts() ): while( have_posts() ) : the_post(); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
