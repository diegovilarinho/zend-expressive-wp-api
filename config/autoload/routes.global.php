<?php

const HOST = 'http://akloud.api';
const BASE = '/wac';
const VERSION = '/v1';

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\AuraRouter::class,
            App\Action\Auth::class => App\Action\Auth::class,
            App\Action\SignUp::class => App\Action\SignUp::class,
            App\Action\Login::class => App\Action\Login::class,
            App\Action\Logout::class => App\Action\Logout::class,
            App\Action\PasswordRecovery::class => App\Action\PasswordRecovery::class,
            App\Action\SettingsShow::class => App\Action\SettingsShow::class,
            App\Action\FaqShow::class => App\Action\FaqShow::class,
            App\Action\HomePageShow::class => App\Action\HomePageShow::class,
            App\Action\AboutPageShow::class => App\Action\AboutPageShow::class,
            App\Action\ContactPageShow::class => App\Action\ContactPageShow::class,
            App\Action\CoursesList::class => App\Action\CoursesList::class,
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
            'middleware' => App\Action\SignUp::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'login',
            'path' => BASE . VERSION . '/login',
            'middleware' => App\Action\Login::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'logout',
            'path' => BASE . VERSION . '/logout',
            'middleware' => [
                App\Action\Auth::class,
                App\Action\Logout::class
            ],
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'password-recovery',
            'path' => BASE . VERSION . '/password-recovery',
            'middleware' => App\Action\PasswordRecovery::class,
            'allowed_methods' => ['POST'],
        ],
        [
            'name' => 'user-account-profile-view',
            'path' => BASE . VERSION . '/accounts/{id}/profile',
            'middleware' => [
                App\Action\Auth::class,
                App\Action\UserProfileView::class
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
                App\Action\Auth::class,
                App\Action\UserProfileUpdate::class
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
            'middleware' => App\Action\CoursesList::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-home-show',
            'path' => BASE . VERSION . '/contents/home',
            'middleware' => App\Action\HomePageShow::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-about-show',
            'path' => BASE . VERSION . '/contents/about',
            'middleware' => App\Action\AboutPageShow::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-contact-show',
            'path' => BASE . VERSION . '/contents/contact',
            'middleware' => App\Action\ContactPageShow::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'contents-faq-show',
            'path' => BASE . VERSION . '/contents/faq',
            'middleware' => App\Action\FaqShow::class,
            'allowed_methods' => ['GET']
        ],
        [
            'name' => 'settings',
            'path' => BASE . VERSION . '/settings',
            'middleware' => App\Action\SettingsShow::class,
            'allowed_methods' => ['GET'],
        ],
        //Private Routes
    ],
];
