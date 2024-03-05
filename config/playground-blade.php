<?php

return [
    'layout' => env('PLAYGROUND_BLADE_LAYOUT', 'playground::layouts.site'),
    'view' => env('PLAYGROUND_BLADE_VIEW', 'playground::'),
    'load' => [
        'views' => (bool) env('PLAYGROUND_BLADE_LOAD_VIEWS', true),
    ],
    'session' => [
        'enable' => (bool) env('PLAYGROUND_BLADE_SESSION_ENABLE', true),
        'theme_name' => env('PLAYGROUND_BLADE_SESSION_THEME_NAME', 'appTheme'),
    ],
    'themes' => [
        'default' => [
            'bsTheme' => '',
            // 'editor' => '',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_DEFAULT_ENABLE', true),
            'label' => 'Default Theme',
            'key' => 'default',
            'icon' => 'fa-solid fa-square',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'head: using the default theme',
                ],
                // 'bootstrap-root' => [
                //     'rel' => 'stylesheet',
                //     'asset' => 'stylesheet',
                //     'href' => '/vendor/bootstrap-root-0001.css',
                //     'version' => '5.3.3',
                //     'always' => true,
                // ],
                'anta' => [
                    'asset' => 'font',
                    'href' => 'https://fonts.googleapis.com/css2?family=Anta&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h1, h2, h3, h4, h5, h6 {font-family: Anta, sans-serif;}',
                    'always' => true,
                ],
            ],
            'body' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'body: using the default theme',
                ],
            ],
        ],
        'blue' => [
            'bsTheme' => 'blue',
            // 'editor' => '',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_DEFAULT_ENABLE', true),
            'label' => 'Blue Theme',
            'key' => 'blue',
            'icon' => 'fa-solid fa-circle',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'head: using the blue theme',
                ],
                'bootstrap-root' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/bootstrap-root-blue.css',
                    'version' => '5.3.3',
                    'always' => true,
                ],
                'anta' => [
                    'asset' => 'font',
                    'href' => 'https://fonts.googleapis.com/css2?family=Lobster&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h1, h2, h3, h4, h5, h6 {font-family: Lobster, sans-serif;}',
                    'always' => true,
                ],
            ],
            'body' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'body: using the default theme',
                ],
            ],
        ],
        'dark' => [
            'bsTheme' => 'dark',
            // 'editor' => '/vendor/ckeditor-dark.css',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_DARK_ENABLE', true),
            'label' => 'Dark Theme',
            'key' => 'dark',
            'icon' => 'fa-solid fa-moon',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-dark' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-dark.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
        'light' => [
            'bsTheme' => 'light',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_LIGHT_ENABLE', true),
            'label' => 'Light Theme',
            'key' => 'light',
            'icon' => 'fa-solid fa-sun',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-light' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-light.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
        'bootstrap-dark' => [
            'bsTheme' => 'dark',
            'enable' => false,
            'label' => 'CKEditor Unified Bootstrap Theme under Dark',
            'key' => 'bootstrap-dark',
            'icon' => 'fa-brands fa-bootstrap',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-light' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-bootstrap.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
        'bootstrap-light' => [
            'bsTheme' => 'light',
            'enable' => false,
            'label' => 'CKEditor Unified Bootstrap Theme under Light',
            'key' => 'bootstrap-light',
            'icon' => 'fa-brands fa-bootstrap',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-light' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-bootstrap.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
        'lark-dark' => [
            'bsTheme' => 'dark',
            'enable' => false,
            'label' => 'CKEditor Lark Theme under Dark',
            'key' => 'lark-dark',
            'icon' => 'fa-solid fa-dove fa-moon',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-light' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-lark.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
        'lark-light' => [
            'bsTheme' => 'light',
            'enable' => false,
            'label' => 'CKEditor Lark Theme under Light',
            'key' => 'lark-light',
            'icon' => 'fa-solid fa-dove fa-sun',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-light' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/ckeditor-lark.css',
                    'version' => '41.1.0',
                    'always' => true,
                ],
            ],
        ],
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
    'assets' => [
        'head' => [
            'favicon' => [
                'asset' => 'icon',
                'type' => 'link',
                'href' => '/favicon.ico',
                'rel' => 'icon',
                'always' => true,
            ],
            'preconnect-googleapis' => [
                'asset' => 'link',
                'href' => 'https://fonts.googleapis.com/',
            ],
            'preconnect-gstatic' => [
                'asset' => 'link',
                'crossorigin' => '',
                'href' => 'https://fonts.gstatic.com/',
            ],
            'nunito' => [
                'asset' => 'font',
                'href' => 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap',
                'rel' => 'stylesheet',
                'always' => true,
            ],
            'ckeditor' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => 'https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js',
                'version' => '41.1.0',
            ],
            'ckeditor-style' => [
                'asset' => 'style',
                'style' => '.ck-editor__editable_inline, .editor__editable {min-height: 200px;}',
                'version' => '41.1.0',
            ],
            'bootstrap-css' => [
                'rel' => 'stylesheet',
                'asset' => 'stylesheet',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==',
                'href' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
                'version' => '5.3.3',
                'always' => true,
            ],
            'fontawesome-css' => [
                'rel' => 'stylesheet',
                'asset' => 'font',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==',
                'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
                'version' => '6.5.1',
                'always' => true,
            ],
            'vue' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => 'https://unpkg.com/vue@3',
                'version' => '',
                'always' => true,
            ],
            'font-body' => [
                'asset' => 'style',
                'style' => 'body {font-family: Nunito, sans-serif;}',
                'always' => true,
            ],
        ],
        'body' => [
            'bootstrap' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==',
                'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
                'version' => '5.3.3',
                'always' => true,
            ],
            'playground-blade' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => '',
                'src' => '/vendor/playground-blade.js',
                'version' => '73.0.0',
                'always' => true,
            ],
            'jquery' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==',
                'referrerpolicy' => 'no-referrer',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js',
                'version' => '3.7.1',
                'always' => true,
            ],
            'fontawesome' => [
                'asset' => 'script',
                'referrerpolicy' => 'no-referrer',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js',
                'version' => '6.5.1',
                'always' => true,
            ],
        ],
    ],
];
