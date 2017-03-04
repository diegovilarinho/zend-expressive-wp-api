<?php
/**
 * Criar menu principal
 * Intented to use with locations, like 'primary'
 * add_new_custom_menu("primary");
 * USE 2: Adicione a função onde quer que o menu apareça e passe o location do menu e o type dele,
 * Podendo este segundo parâmetro ser as strings 'desktop' ou 'mobile'
 */
function add_custom_nav_menu_with_child( 
    $theme_location, 
    $class_ul = null, 
    $class_li = null, 
    $class_ul_child = null, 
    $class_li_child = null,
    $post_link, 
    $post_id = null, 
    $dataAttrs = '' ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        global $post;
        global $wpdb;
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $count = 0;
        $submenu = false;
        $menu_list = '';        
         
        foreach( $menu_items as $menu_item ) {
             
            $link = $menu_item->url;
            $title = $menu_item->title;

            
            if( is_singular('case') && ( get_permalink( page_id_by_slug('cases') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';    
            } elseif( is_singular('service') && ( get_permalink( page_id_by_slug('servicos') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';  
            } elseif( is_singular('job') && ( get_permalink( page_id_by_slug('trabalhe-conosco') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';    
            } elseif( is_singular('post') && ( get_permalink( page_id_by_slug('blog') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';  
            } elseif( is_search() && ( get_permalink( page_id_by_slug('blog') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';
            } else {
                $classIsCurrent = ( $link == $post_link ) ? ' is-current' : '';
            }

            $gedPostId = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'ged'");
            $aboutPostId = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'sobre-a-ditech'");

            $classGedProduct = ( get_permalink( $gedPostId ) == $menu_item->url ) ? ' menu__item--highlight' : '';

            if( is_front_page() && $link == get_permalink($aboutPostId) ) {
                $link = '#about';
            }

            if( !is_front_page() && $link != '#contact' && $link[0] == '#' ) {
                $link = site_url() . '/' . $link;
            }

            $dataAttrsOfMenuItem = ($link[0] == '#') ? $dataAttrs : 'data-anchor-group="main-header"';

            if ( !$menu_item->menu_item_parent ) {
                $parent_id = $menu_item->ID;
                 
                $menu_list .= '<ul class="'. $class_ul .'" tabindex="1">' ."\n";
                $menu_list .= '<li class="' . $class_li . $classGedProduct . $classIsCurrent . '">' ."\n";
                $menu_list .= '<a href="'.$link.'" '. $dataAttrsOfMenuItem .'>'.$title.'</a>' ."\n";
                $menu_list .= '</li>' ."\n";
            }

            if ( $parent_id == $menu_item->menu_item_parent ) {
 
                if ( !$submenu ) {
                    $submenu = true;
                    $menu_list .= '<ul class="'. $class_ul_child .'">' ."\n";
                }
 
                $menu_list .= '<li class="' . $class_li_child . $classGedProduct . $classIsCurrent . '">' ."\n";
                $menu_list .= '<a href="'.$link.'" '. $dataAttrsOfMenuItem .'>'.$title.'</a>' ."\n";
                $menu_list .= '</li>' ."\n";
                     
 
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                    $menu_list .= '</ul>' ."\n";
                    $submenu = false;
                }
 
            }

            if ( !array_key_exists($count+1, $menu_items) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
                $menu_list .= '</ul>' ."\n";      
                $submenu = false;
            }
 
            $count++;

        }
 
    } else {
        $menu_list = '<!-- Nenhum menu configurado. -->';
    }
    echo $menu_list;
}

/**
 * Criar menu do rodapé
 */
function add_custom_nav_menu_without_child( 
    $theme_location, 
    $class_ul = null, 
    $class_li = null, 
    $post_link, 
    $post_id = null, 
    $dataAttrs = '' ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        global $post;
        global $wpdb;
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '';

        $menu_list .= '<ul class="'. $class_ul .'" tabindex="1">' ."\n";
         
        foreach( $menu_items as $menu_item ) {
             
            $link = $menu_item->url;
            $title = $menu_item->title;

            
            if( is_singular('case') && ( get_permalink( page_id_by_slug('cases') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';    
            } elseif( is_singular('service') && ( get_permalink( page_id_by_slug('servicos') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';  
            } elseif( is_singular('job') && ( get_permalink( page_id_by_slug('trabalhe-conosco') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';    
            } elseif( is_singular('post') && ( get_permalink( page_id_by_slug('blog') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';  
            } elseif( is_search() && ( get_permalink( page_id_by_slug('blog') ) == $menu_item->url ) ) {
                $classIsCurrent = ' is-current';
            } else {
                $classIsCurrent = ( $link == $post_link ) ? ' is-current' : '';
            }

            $gedPostId = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'ged'");
            $aboutPostId = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'sobre-a-ditech'");

            $classGedProduct = ( get_permalink( $gedPostId ) == $menu_item->url ) ? ' menu__item--highlight' : '';

            if( is_front_page() && $link == get_permalink($aboutPostId) ) {
                $link = '#about';
            }

            if( !is_front_page() && $link != '#contact' && $link[0] == '#' ) {
                $link = site_url() . '/' . $link;
            }

            $dataAttrsOfMenuItem = ($link[0] == '#') ? $dataAttrs : 'data-anchor-group="main-header"';

            $menu_list .= '<li class="' . $class_li . $classGedProduct . $classIsCurrent . '">' ."\n";
            $menu_list .= '<a href="'.$link.'" '. $dataAttrsOfMenuItem .'>'.$title.'</a>' ."\n";
            $menu_list .= '</li>' ."\n";
        }
         
        $menu_list .= '</ul>' ."\n";
 
    } else {
        $menu_list = '<!-- Nenhum menu configurado. -->';
    }
    echo $menu_list;
}