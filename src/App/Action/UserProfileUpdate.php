<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

class UserProfileUpdate
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $userId = $request->getAttribute('id');

        if(! is_numeric($userId)) {
            return new JsonResponse([
                'error' => 'rest_invalid_param',
                'errorMessage' => __( 'The [:Id] argument must be a number or a numeric string.', 'wac-api' )
            ], 400);
        }

        $authString = $request->getHeaderLine('authorization');

        list($token) = sscanf($authString, 'Bearer %s');

        $token = JWT::decode($token, JWT_AUTH_SECRET_KEY, array('HS256'));

        $tokenUserID = $token->data->user->id;

        if ($userId != $tokenUserID) {
            return new JsonResponse([
                'error' => 'rest_current_user_not_permissions',
                'errorMessage' => __('You are not authorized to view this data', 'wac-api')
            ], 403);
        }

        $_PUT = array();
            
        if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
            parse_str(file_get_contents('php://input'), $_PUT);
        }

        $userdata = array(
            'ID' => $tokenUserID,
            'user_login' => $_PUT['email'],
            'user_email' => $_PUT['email'],
            'user_nicename' => $_PUT['firstname'],
            'display_name' => $_PUT['firstname'] . $_PUT['lastname'],
            'nickname' => $_PUT['firstname'],
            'first_name' => $_PUT['firstname'],
            'last_name' => $_PUT['lastname'],
            'role' => 'subscriber'
        );

        $user_id = wp_insert_user($userdata);
        
        if (is_wp_error($user_id)) {
            $error_code = $user_id->get_error_code();

            return new JsonResponse([
                'error' => $error_code,
                'errorMessage' => $user_id->get_error_message($error_code),
            ], 403);
        }

        $user_info = get_userdata($userId);
        $user_role = $user_info->roles;
        $user_role = get_role($user_role[0]);
        $user_locale = get_locale();
        
        $user_avatar = get_field('user_field_image', 'user_' . $user_info->ID);
        $user_avatar_url = $user_avatar['url'];
        $user_avatar_alt = $user_avatar['alt'];
        $user_avatar_title = $user_avatar['title'];

        update_field('user_field_facebook_url', $_PUT['facebook_url'], 'user_' . $user_info->ID);
        update_field('user_field_linkedin_url', $_PUT['linkedin_url'], 'user_' . $user_info->ID);
        update_field('user_field_instagram_url', $_PUT['instagram_url'], 'user_' . $user_info->ID);
        update_field('user_field_twitter_url', $_PUT['twitter_url'], 'user_' . $user_info->ID);
        
        $user_facebook_url = get_field('user_field_facebook_url', 'user_' . $user_info->ID);
        $user_linkedin_url = get_field('user_field_linkedin_url', 'user_' . $user_info->ID);
        $user_instagram_url = get_field('user_field_instagram_url', 'user_' . $user_info->ID);
        $user_twitter_url = get_field('user_field_twitter_url', 'user_' . $user_info->ID);

        /** The token is signed, now create the object with no sensible user data to the client*/
        $data = array(
            'data' => array(
                'id' => $user_info->ID,
                'firstname' => $user_info->first_name,
                'lastname' => $user_info->last_name,
                'username' => $user_info->user_login,
                'email' => $user_info->user_email,
                'locale' => $user_locale,
                'profile' => array(
                    'name' => $user_role->name,
                ),
                'social_profiles' => array(
                    array(
                        'media' => 'facebook',
                        'url' => $user_facebook_url
                    ),
                    array(
                        'media' => 'linkedin',
                        'url' => $user_linkedin_url
                    ),
                    array(
                        'media' => 'instagram',
                        'url' => $user_instagram_url
                    ),
                    array(
                        'media' => 'twitter',
                        'url' => $user_twitter_url
                    )
                ),
                'avatar' => array(
                    'url' => $user_avatar_url,
                    'alt' => $user_avatar_alt,
                    'title' => $user_avatar_title
                )
            )
        );
        
        return new JsonResponse($data);
    }
}
