<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Hautelook\Phpass\PasswordHash;

class PasswordRecovery
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        global $wpdb;
        
        $requestBody = $request->getParsedBody();

        if(! isset($requestBody['email'])) {
            return new JsonResponse([
                'error' => 'akl_password_recovery_error',
                'errorMessage' => __('User email was not sent in the request', 'wp-api')
            ], 403);
        }

        $user_login = $requestBody['email'];

        if ( strpos( $user_login, '@' ) ) {
            $user_data = get_user_by( 'email', trim( $user_login ) );
        } else {
            $login = trim($user_login);
            $user_data = get_user_by('login', $login);
        }

        do_action('lostpassword_post');

        if (! $user_data) {
            return new JsonResponse([
                'error' => 'akl_password_recovery_error',
                'errorMessage' => __('No users have been registered with this email', 'wp-api')
            ], 400);
        }

        // redefining user_login ensures we return the right case in the email
        $user_login = $user_data->user_login;
        $user_email = $user_data->user_email;

        $allow = apply_filters('allow_password_reset', true, $user_data->ID);

        if (! $allow) {
            return new JsonResponse([
                'error' => 'akl_password_recovery_error',
                'errorMessage' => __('This user is not allowed to reset password', 'wp-api')
            ], 403);
        } else if ( is_wp_error($allow) ) {
            return new JsonResponse([
                'error' => 'akl_password_recovery_error',
                'errorMessage' => $allow->get_error_message()
            ], 403);
        }

        $key = get_password_reset_key( $user_data );

        if ( is_wp_error( $key ) ) {
            return $key;
        }

        if ( empty( $wp_hasher ) ) {
            require_once ABSPATH . 'wp-includes/class-phpass.php';
            $wp_hasher = new PasswordHash( 8, true );
        }

        $hashed = $wp_hasher->HashPassword( $key );  

        $wpdb->update( $wpdb->users, array( 'user_activation_key' => time().":".$hashed ), array( 'user_login' => $user_login ) );

        $message = __('Alguém solicitou que a senha fosse redefinida para a seguinte conta: ', 'wac-api') . "\r\n\r\n";
        $message .= "<br>";
        $message .= "Site: " . home_url( '/' ) . "\r\n\r\n";
        $message .= "<br>";
        $message .= sprintf(__('Usuário: %s'), $user_login) . "\r\n\r\n";
        $message .= "<br>";
        $message .= __('Se este foi um erro, basta ignorar este e-mail e nada vai acontecer.', 'wac-api') . "\r\n\r\n";
        $message .= "<br>";
        $message .= __('Para redefinir sua senha, clique no link a seguir:', 'wac-api') . "\r\n\r\n";
        $message .= home_url("wp-login.php?action=rp&key=" . $key . "&login=" . rawurlencode($user_login), 'login');

        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        $title = sprintf( __('[%s] Resetar Senha'), $blogname );

        $title = apply_filters('retrieve_password_title', $title, $user_login, $user_data);
        $message = apply_filters('retrieve_password_message', $message, $key, $user_login, $user_data);

        if ( $message && !wp_mail($user_email, wp_specialchars_decode( $title ), $message) ) {
            return new JsonResponse([
                'error' => 'akl_password_recovery_send_email_error',
                'errorMessage' => __('Mail could not be sent. Possible reason: your host may have disabled mail () function ...', 'wac-api')
            ], 503);
        }

        return new JsonResponse([
            'error' => 'akl_password_recovery_send_email_successfully',
            'errorMessage' => __('Link for password reset has been emailed', 'wac-api')
        ], 200);
    }
}
