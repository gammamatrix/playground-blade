<?php

return [
    'layout' => env('PLAYGROUND_BLADE_LAYOUT', 'playground::layouts.site'),
    'view' => env('PLAYGROUND_BLADE_VIEW', 'playground::'),
    'load' => [
        'views' => (bool) env('PLAYGROUND_BLADE_LOAD_VIEWS', true),
    ],
    /*
    |--------------------------------------------------------------------------
    | Software library versions and integrity verification.
    |--------------------------------------------------------------------------
    |
    | In order to trust 3rd party libraries have not been comprimised, we use
    | sha-256 integrity checks on local and CDN assets.
    |
    | NOTE When updating link and script assets, make sure to update the
    |      integrity with a SHA256 checksum.
    |
    */
    'libs' => [
        'head' => [
            'favicon' => [
                'type' => 'link',
                'href' => '/favicon.ico',
                'rel' => 'icon',
                'always' => true,
            ],
            // 'gstatic' => [
            //     'type' => 'link',
            //     'version' => '',
            //     'integrity' => '',
            //     'href' => 'https://fonts.gstatic.com/',
            // ],
            'nunito' => [
                'type' => 'link',
                'href' => 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap',
                'rel' => 'stylesheet',
                'always' => true,
            ],
            'body-nunito' => [
                'type' => 'style',
                'style' => 'body {font-family: Nunito, sans-serif;}',
                'always' => true,
            ],
            'ckeditor' => [
                'type' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => 'https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js',
                'version' => '34.2.0',
            ],
            'bootstrap-css' => [
                'rel' => 'stylesheet',
                'type' => 'link',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN',
                'href' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
                'version' => '5.3.2',
                'always' => true,
            ],
            'fontawesome-css' => [
                'rel' => 'stylesheet',
                'type' => 'link',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==',
                'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',
                'version' => '6.4.2',
                'always' => true,
            ],
            'vue' => [
                'type' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => 'https://unpkg.com/vue@3',
                'version' => '',
                'always' => true,
            ],
        ],
        'body' => [
            'bootstrap' => [
                'type' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL',
                'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
                'version' => '5.3.2',
                'always' => true,
            ],
            'playground-blade' => [
                'type' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => '/vendor/playground-blade.js',
                'version' => '73.0.0',
                'always' => true,
            ],
            'jquery' => [
                'type' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==',
                'referrerpolicy' => 'no-referrer',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js',
                'version' => '3.7.1',
                'always' => true,
            ],
            'fontawesome' => [
                'type' => 'script',
                'referrerpolicy' => 'no-referrer',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js',
                'version' => '6.4.2',
                'always' => true,
            ],
        ],
    ],
];
