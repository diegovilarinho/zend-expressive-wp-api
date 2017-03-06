<?php

namespace App\Action\Settings;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Service
{
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $headerLogoUrl = get_theme_mod('theme_logo');
        $copyright = get_theme_mod('theme_footer_copy');
        $phoneNumbers = get_theme_mod('theme_footer_phone');
        $address = get_theme_mod('theme_footer_address');
        $facebook = get_theme_mod('theme_social_facebook');
        $twitter = get_theme_mod('theme_social_twitter');
        $linkedin = get_theme_mod('theme_social_linkedin');
        $instagram = get_theme_mod('theme_social_instagram');
        $youtube = get_theme_mod('theme_social_youtube');

        $data = array(  
            'companyLogoUrl' => $headerLogoUrl,
            'theme' => array(),
            'copyright' => $copyright,
            'phoneNumbers' => $phoneNumbers,
            'address' => $address,
            'socialNetworksUrls' => array(
                array(
                    'media' => 'facebook', 
                    'url' => $facebook
                ),
                array(
                    'media' => 'twitter', 
                    'url' => $twitter
                ),
                array(
                    'media' => 'linkedin', 
                    'url' => $linkedin
                ),
                array(
                    'media' => 'instagram', 
                    'url' => $instagram
                ),
                array(
                    'media' => 'youtube', 
                    'url' => $youtube
                ),
            )
        );

        return new JsonResponse($data);
    }
}
