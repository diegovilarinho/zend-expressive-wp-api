<?php
/**
 * Resolve o problem quando o upload de mídia gera a seguinte mensagem:
 * "Este tipo de arquivo não é permitido por razões de segurança."
 * USE: Basta adicionar as extensões que forem sendo bloqueadas pelo wp.
 */
function suporte_extensoes_adicionais( $mime_types ){

    $mime_types['svg'] = 'image/svg+xml';

    return $mime_types;
}

add_filter( 'upload_mimes', 'suporte_extensoes_adicionais', 1, 1 );

/**
 * Use * for origin
 */
add_action( 'rest_api_init', function() {
    
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
		header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE' );
		header( 'Access-Control-Allow-Credentials: true' );

		return $value;
		
	});
}, 15 );