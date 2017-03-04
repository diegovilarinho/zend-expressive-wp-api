<?php
/**
 * Theme Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<title><?php echo bloginfo('name'); ?> - <?php echo bloginfo('description'); ?></title>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
			
		<main>