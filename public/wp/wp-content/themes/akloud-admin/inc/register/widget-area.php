<?php
/**
 * Widget Area
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function default_widgets_init() {
  register_sidebar(array(
    'name' => esc_html__('Sidebar - Blog', 'wac-theme'),
    'id' => 'blog-sidebar',
    'description' => esc_html__('Adicione widgets aqui.', 'wac-theme'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
  ));
  // register_sidebar(array(
  //   'name' => esc_html__('Sidebar - Single Post', 'wac-theme'),
  //   'id' => 'single-post-sidebar',
  //   'description' => esc_html__('Adicione widgets aqui.', 'wac-theme'),
  //   'before_widget' => '<section id="%1$s" class="widget %2$s">',
  //   'after_widget' => '</section>',
  //   'before_title' => '<h2 class="widget-title">',
  //   'after_title' => '</h2>',
  // ));
}
add_action('widgets_init', 'default_widgets_init');
?>
