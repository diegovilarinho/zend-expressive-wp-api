<?php

// const HOST_LOCAL = 'http://akloud.api';
const HOST = 'http://akloud.workandcode.com';
const BASE = '/api';
const VERSION = '/v1';

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            App\Action\Auth\Service::class => App\Action\Auth\Service::class,
            App\Action\SignUp\Service::class => App\Action\SignUp\Service::class,
            App\Action\Login\Service::class => App\Action\Login\Service::class,
            App\Action\Logout\Service::class => App\Action\Logout\Service::class,
            App\Action\PasswordRecovery\Service::class => App\Action\PasswordRecovery\Service::class,
            App\Action\Home\Service::class => App\Action\Home\Service::class,
            App\Action\About\Service::class => App\Action\About\Service::class,
            App\Action\Contact\Service::class => App\Action\Contact\Service::class,
            App\Action\Settings\Service::class => App\Action\Settings\Service::class,
            App\Action\Faq\Service::class => App\Action\Faq\Service::class,
            App\Action\Courses\All\Service::class => App\Action\Courses\All\Service::class,
            App\Action\User\Show\Service::class => App\Action\User\Show\Service::class,
            App\Action\User\Update\Service::class => App\Action\User\Update\Service::class,
        ],
        'factories' => [
            // App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
        ],
    ],

    'routes' => [
        //Public routes
        [
            'name' => 'signup',
            'path' => BASE . VERSION . '/signup',
            'middleware' => App\Action\SignUp\Service::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'login',
            'path' => BASE . VERSION . '/login',
            'middleware' => App\Action\Login\Service::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'logout',
            'path' => BASE . VERSION . '/logout',
            'middleware' => [
                App\Action\Auth\Service::class,
                App\Action\Logout\Service::class,
            ],
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'password-recovery',
            'path' => BASE . VERSION . '/password-recovery',
            'middleware' => App\Action\PasswordRecovery\Service::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'user-account-profile-show',
            'path' => BASE . VERSION . '/accounts/{id}/profile',
            'middleware' => [
                App\Action\Auth\Service::class,
                App\Action\User\Show\Service::class,
            ],
            'allowed_methods' => ['GET'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'user-account-profile-update',
            'path' => BASE . VERSION . '/accounts/{id}/profile',
            'middleware' => [
                App\Action\Auth\Service::class,
                App\Action\User\Update\Service::class
            ],
            'allowed_methods' => ['PUT'],
            'options' => [
                'tokens' => [
                    'id' => '\d+'
                ]
            ]
        ],
        [
            'name' => 'contents-courses-list',
            'path' => BASE . VERSION . '/contents/courses/list',
            'middleware' => App\Action\Courses\All\Service::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-home-show',
            'path' => BASE . VERSION . '/contents/home',
            'middleware' => App\Action\Home\Service::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-about-show',
            'path' => BASE . VERSION . '/contents/about',
            'middleware' => App\Action\About\Service::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-contact-show',
            'path' => BASE . VERSION . '/contents/contact',
            'middleware' => App\Action\Contact\Service::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-faq-show',
            'path' => BASE . VERSION . '/contents/faq',
            'middleware' => App\Action\Faq\Service::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'settings',
            'path' => BASE . VERSION . '/settings',
            'middleware' => App\Action\Settings\Service::class,
            'allowed_methods' => ['GET'],
        ],
        //Private Routes
    ],
];
