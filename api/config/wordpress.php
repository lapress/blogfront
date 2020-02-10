<?php

return [
    'core'           => base_path('../wordpress/'),
    'debug'          => env('APP_DEBUG'),
    'date-format'    => 'd.m.Y',
    'excerpt_length' => 300,
    'theme'          => [
        'active'     => env('APP_THEME', 'theme'),
        'views'      => 'views',
        'option_key' => 'theme_mods_'.env('APP_THEME', 'theme'),
    ],
    'url'            => [
        'backend'        => rtrim(env('APP_BACKEND_URL'), '/'),
        'site'           => rtrim(env('APP_URL'), '/'),
        'backend_prefix' => trim(parse_url(env('APP_BACKEND_URL'), PHP_URL_PATH), '/').'/',
        'site_prefix'    => trim(parse_url(env('APP_URL'), PHP_URL_PATH), '/').'/',
    ],
    'content'        => [
        'dir' => base_path('../content'),
        'url' => '/content',
    ],
    'auth'           => [
        'key'      => env('WP_AUTH_KEY'),
        'salt'     => env('WP_AUTH_SALT'),
        'secure'   => [
            'key'  => env('WP_SECURE_AUTH_KEY'),
            'salt' => env('WP_SECURE_AUTH_SALT'),
        ],
        'loggedIn' => [
            'key'  => env('WP_LOGGED_IN_KEY'),
            'salt' => env('WP_LOGGED_IN_SALT'),
        ],
    ],

    'noce' => [
        'key'  => env('WP_NONCE_KEY'),
        'salt' => env('WP_NONCE_SALT'),
    ],

    'images' => [
        'quality' => 95,
        'sizes'   => [
            'thumb' => [
                'width'  => 100,
                'height' => 70,
                'crop'   => true,
            ],
            'thumbnail'  => [
                'width'  => 252,
                'height' => 140,
                'crop'   => true,
            ],
            'base'  => [
                'width'  => 344,
                'height' => 192,
                'crop'   => true,
            ],
            'intro'   => [
                'width'  => 712,
                'height' => 400,
                'crop'   => true,
            ],
        ],
    ],

    'menus' => [
        'primary',
        'footer',
    ],

    'posts' => [
        'route'         => 'teksty',
        'per_page'      => 10,
        'on_homepage'   => 10,
        'related_count' => 4,
        'map'           => [
            'page'      => \App\Models\Page::class,
            'post'      => \App\Models\Post::class,
            'custom'    => \LaPress\Models\CustomMenuLink::class,
            'category'  => \App\Models\Category::class,
        ],
        /*
        |--------------------------------------------------------------------------
        | Custom post types
        |--------------------------------------------------------------------------
        | Provide custom post types models
        | You can define class name or an array with model and options key
        |
        */
        'types'         => [
            'post'      => \App\Models\Post::class,
        ],
        /*
        |--------------------------------------------------------------------------
        | Custom post types taxonomies
        |--------------------------------------------------------------------------
        |
        */
        'taxonomies'    => [],
    ],

    'taxonomies' => [],
];
