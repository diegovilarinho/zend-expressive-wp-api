<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

class SignUp
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $requestBody = $request->getParsedBody();

        $user_firstname = $requestBody['firstname'];
        $user_lastname = $requestBody['lastname'];
        $username = $requestBody['email'];
        $email = $requestBody['email'];
        $password = $requestBody['password'];

        $userdata = array(
            'user_login' => $email,
            'user_email' => $email,
            'user_pass' => $password,
            'user_nicename' => $user_firstname,
            'display_name' => $user_firstname . $user_lastname,
            'nickname' => $user_firstname,
            'first_name' => $user_firstname,
            'last_name' => $user_lastname,
            'role' => 'subscriber'
        );

        $secret_key = defined('JWT_AUTH_SECRET_KEY') ? JWT_AUTH_SECRET_KEY : false;

        /** First thing, check the secret key if not exist return a error*/
        if (!$secret_key) {
            return new JsonResponse([
                'error' => 'jwt_auth_bad_config',
                'errorMessage' => __('JWT is not configurated properly, please contact the admin', 'wp-api'),
            ], 403);
        }
        
        $user_id = wp_insert_user($userdata);

        if (is_wp_error($user_id)) {
            $error_code = $user_id->get_error_code();
            
            return new JsonResponse([
                'error' => $error_code,
                'errorMessage' => $user->get_error_message($error_code),
            ], 403);
        }

        /** Try to authenticate the user with the passed credentials*/
        $user = wp_authenticate($username, $password);

        /** If the authentication fails return a error*/
        if (is_wp_error($user)) {
            $error_code = $user->get_error_code();
            
            return new JsonResponse([
                'error' => $error_code,
                'errorMessage' => $user->get_error_message($error_code),
            ], 403);
        }

        /** Valid credentials, the user exists create the according Token */
        $issuedAt = time();
        $notBefore = apply_filters('jwt_auth_not_before', $issuedAt, $issuedAt);
        $expire = apply_filters('jwt_auth_expire', $issuedAt + (DAY_IN_SECONDS * 7), $issuedAt);

        $token = array(
            'iss' => get_bloginfo('url'),
            'iat' => $issuedAt,
            'nbf' => $notBefore,
            'exp' => $expire,
            'data' => array(
                'user' => array(
                    'id' => $user->data->ID,
                ),
            ),
        );

        /** Let the user modify the token data before the sign. */
        $token = JWT::encode(apply_filters('jwt_auth_token_before_sign', $token, $user), $secret_key);

        $user_info = get_userdata($user->data->ID);
        $user_role = $user_info->roles;
        $user_role = get_role($user_role[0]);
        $user_locale = get_locale();
        $user_avatar_url = get_avatar_url($user->data->user_email);

        /** The token is signed, now create the object with no sensible user data to the client*/
        $data = array(
            'data' => array(
                'id' => $user->data->ID,
                'firstname' => $user_info->first_name,
                'lastname' => $user_info->last_name,
                'username' => $user->data->user_login,
                'email' => $user->data->user_email,
                'locale' => $user_locale,
                'profile' => array(
                    'name' => $user_role->name,
                ),
                'avatar_url' => $user_avatar_url
            ),
            'token' => $token,
        );

        /** Let the user modify the data before send it back */
        return new JsonResponse($data);
    }
}
