<?php

namespace App\Action\Auth;

use Zend\Stratigility\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

class Service implements MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $out = null)
    {
        if(! $request->hasHeader('authorization')){
            return new JsonResponse([
                'error' => 'jwt_auth_no_auth_header',
                'errorMessage' => __('Authorization header not found.', 'wac-api')
            ], 401);
        }   

        if(! $this->isValid($request)){
            return new JsonResponse([
                'error' => 'jwt_auth_invalid_token',
                'errorMessage' => __('Authorization token is invalid.', 'wac-api')
            ], 403);
        }

        return $out($request, $response);
    }



    public function isValid(Request $request)
    {
        /** To Check is code is blacklisted */
        global $wpdb, $table_prefix;
        $wpdb->show_errors();

        $secret_key = defined('JWT_AUTH_SECRET_KEY') ? JWT_AUTH_SECRET_KEY : false;

        /** First thing, check the secret key if not exist return a error*/
        if (! $secret_key) {
            return new JsonResponse([
                'error' => 'jwt_auth_bad_config',
                'errorMessage' => __('JWT is not configurated properly, please contact the admin', 'wp-api')
            ], 403);
        }

        $authString = $request->getHeaderLine('authorization');

        list($token) = sscanf($authString, 'Bearer %s');

        if (! $token) {
            return false;
        }

        /** Check is code is blacklisted */
        $tablename = $table_prefix . 'auth_tokens_blacklist';

        $tokenIsInBlacklist = $wpdb->get_results("SELECT * FROM $tablename WHERE token = '". $token ."'");

        if(count($tokenIsInBlacklist) > 0) {
            return false;
        }

        try 
        {
            $token = JWT::decode($token, $secret_key, array('HS256'));

            /** The Token is decoded now validate the iss */
            if ($token->iss != get_bloginfo('url')) {
                /** The iss do not match, return error */
                return false;
            }

            /** So far so good, validate the user id in the token */
            if (! isset($token->data->user->id)) {
                /** No user id in the token, abort!! */
                return false;
            }
        } 
        catch (Exception $e) 
        {
            return false;
        }

        return true;
    }
}
