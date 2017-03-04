<?php
/**
 * Sidebar
 */
?>
<?php
	if (!is_active_sidebar('default-sidebar')) {
		return;
	}
?>

<aside class="widget-area" role="complementary">
	<?php dynamic_sidebar('default-sidebar'); ?>
</aside>
