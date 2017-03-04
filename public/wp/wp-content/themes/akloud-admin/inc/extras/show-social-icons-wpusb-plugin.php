<?php
/**
 * Função para Imprimir Botões de compartilhamento social utilizando o plugin 'WPUpper Share Buttons'
 * Opções de Layout: default, buttons, rounded, square  |  Padrão: default
 */

function showSocialIconsByWPUSB( $layout = 'square', $remove_inside = true, $remove_counter = true ) {
    $args = array(
       'class_first'  => '', 
       'class_second' => '',
       'class_link'   => '',
       'class_icon'   => '',
       'layout'       => $layout,
       'elements'     => array(
           'remove_inside'  =>  $remove_inside,
           'remove_counter' =>  $remove_counter,
      ),
  );

  if (  class_exists( 'WPUSB_Shares_View' ) ) :
      echo  WPUSB_Shares_View::buttons_share( $args );
  endif;
}