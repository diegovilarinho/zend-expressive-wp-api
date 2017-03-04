<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

class Logout
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $secret_key = JWT_AUTH_SECRET_KEY;

        $authString = $request->getHeaderLine('authorization');

        list($token) = sscanf($authString, 'Bearer %s');

        $tokenString = $token;

        $token = JWT::decode($token, $secret_key, array('HS256'));

        $tokenUserID = $token->data->user->id;
        $tokenExpirate = $token->exp;
        
        $timestamp = $tokenExpirate;
        $datetimeFormat = 'Y-m-d H:i:s';

        $date = new \DateTime();
        $date->setTimestamp($timestamp);
        $tokenExpirateDate = $date->format($datetimeFormat);

        global $wpdb, $table_prefix;

        $create_table_query = "
        CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}auth_tokens_blacklist` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `user_id` bigint(20) NOT NULL,
            `token` text NOT NULL,
            `token_invalidation_date` datetime NOT NULL,
            `token_expirate_date` datetime NOT NULL,
            PRIMARY KEY (id)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $create_table_query );

        $tablename = $table_prefix . 'auth_tokens_blacklist';

        if( $wpdb->get_var("SHOW TABLES LIKE '$tablename'") == $tablename ) {
            $tokenExists = $wpdb->get_results("SELECT * FROM $tablename WHERE token = '". $tokenString ."'");

            if(count($tokenExists) > 0) {
                /** Something is wrong trying to decode the token, send back the error */
                return new JsonResponse([
                    'error' => 'jwt_auth_token_not_valid',
                    'errorMessage' => __('This token has already been invalidated previously.', 'wp-api')
                ], 403);
            }
        }
        

        $dataToSave = array( 
            'user_id' => $tokenUserID, 
            'token' => $tokenString,
            'token_invalidation_date' => current_time( 'mysql' ), 
            'token_expirate_date' => $tokenExpirateDate, 
        );

        $formats = array( 
            '%d', // user_id should be a integer
            '%s', // token should be a string
            '%s', // date_of_invalidity_token should be a string
            '%s' // token_validity should be a string
        );


        // If there are no errors, send the email
        if (! $wpdb->insert($tablename, $dataToSave, $formats) ) {
            /** Something is wrong trying to decode the token, send back the error */
            return new JsonResponse([
                'error' => 'akl_auth_token_invalidation_internal_error',
                'errorMessage' => __('There was an internal error attempting to invalidate this token', 'wp-api')
            ], 403);
        }

        return new JsonResponse([
            'error' => 'akl_auth_token_success_invalidated',
            'errorMessage' => __('Token invalidated successfully. Successful logout', 'wp-api')
        ], 200);
    }
}
