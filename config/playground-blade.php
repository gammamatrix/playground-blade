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
            ],
            // 'body' => [
            //     'comment' => [
            //         'asset' => 'comment',
            //         'comment' => 'body: using the default theme',
            //     ],
            // ],
        ],
        'blue' => [
            'bsTheme' => 'blue',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_BLUE_ENABLE', true),
            'label' => 'Blue Theme',
            'key' => 'blue',
            'icon' => 'fa-solid fa-fish-fins',
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
                    'href' => '/vendor/playground/bootstrap/themes/blue.css',
                    'version' => '5.3.3',
                    'always' => true,
                ],
                'font-lobster' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Lobster',
                    'href' => 'https://fonts.googleapis.com/css2?family=Lobster&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h1, h2, h3, h4, h5, h6, .card-title, label, fieldset, nav {font-family: Lobster, sans-serif;}',
                    'always' => true,
                ],
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap.css',
                    'version' => '41.2.0',
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
        'pepper' => [
            'bsTheme' => 'pepper',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_PEPPER_ENABLE', true),
            'label' => 'Pepper Theme',
            'key' => 'pepper',
            'icon' => 'fa-solid fa-pepper-hot',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'head: using the pepper theme',
                ],
                'bootstrap-root' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/bootstrap/themes/pepper.css',
                    'version' => '5.3.3',
                    'always' => true,
                ],
                'font-anta' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Anta',
                    'href' => 'https://fonts.googleapis.com/css2?family=Anta&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-lobster' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Lobster',
                    'href' => 'https://fonts.googleapis.com/css2?family=Lobster&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-quicksand' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Quicksand',
                    'href' => 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-rokkitt' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Rokkitt',
                    'href' => 'https://fonts.googleapis.com/css2?family=Rokkitt:ital,wght@0,100..900;1,100..900&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-h1' => [
                    'asset' => 'style',
                    'style' => 'h1 {font-family: Lobster, sans-serif;}',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h2, h3, h4, h5, h6 {font-family: Quicksand, sans-serif;}',
                    'always' => true,
                ],
                'font-title' => [
                    'asset' => 'style',
                    'style' => '.card-header {font-family: Anta, sans-serif;}',
                    'always' => true,
                ],
                'font-display' => [
                    'asset' => 'style',
                    'style' => '.display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {font-family: Lobster, sans-serif;}',
                    'always' => true,
                ],
                'font-lead' => [
                    'asset' => 'style',
                    'style' => '.lead, label, fieldset {font-family: Rokkitt, serif;}',
                    'always' => true,
                ],
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap.css',
                    'version' => '41.2.0',
                    'always' => true,
                ],
            ],
            'body' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'body: using the pepper theme',
                ],
            ],
        ],
        'purple' => [
            'bsTheme' => 'purple',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_PURPLE_ENABLE', true),
            'label' => 'Purple Theme',
            'key' => 'purple',
            'icon' => 'fa-solid fa-microchip',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'head: using the purple theme',
                ],
                'bootstrap-root' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/bootstrap/themes/purple.css',
                    'version' => '5.3.3',
                    'always' => true,
                ],
                'font-anta' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Anta',
                    'href' => 'https://fonts.googleapis.com/css2?family=Anta&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-bruno-ace-sc' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Bruno+Ace+SC',
                    'href' => 'https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-kode-mono' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Kode+Mono',
                    'href' => 'https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h1, h2, h3, h4, h5, h6, label, nav {font-family: Anta, sans-serif;}',
                    'always' => true,
                ],
                'font-title' => [
                    'asset' => 'style',
                    'style' => '.card-header, legend {font-family: "Bruno Ace SC", sans-serif;}',
                    'always' => true,
                ],
                'font-monospace' => [
                    'asset' => 'style',
                    'style' => 'code, pre {font-family: "Kode Mono", monospace;}',
                    'always' => true,
                ],
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap.css',
                    'version' => '41.2.0',
                    'always' => true,
                ],
            ],
            'body' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'body: using the purple theme',
                ],
            ],
        ],
        'wheat' => [
            'bsTheme' => 'wheat',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_WHEAT_ENABLE', true),
            'label' => 'Wheat Theme',
            'key' => 'wheat',
            'icon' => 'fa-solid fa-wheat-awn',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'head: using the wheat theme',
                ],
                'bootstrap-root' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/bootstrap/themes/wheat.css',
                    'version' => '5.3.3',
                    'always' => true,
                ],
                'font-anta' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Anta',
                    'href' => 'https://fonts.googleapis.com/css2?family=Anta&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-bruno-ace-sc' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Bruno+Ace+SC',
                    'href' => 'https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-kode-mono' => [
                    'asset' => 'font',
                    'docs' => 'https://fonts.google.com/specimen/Kode+Mono',
                    'href' => 'https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap',
                    'rel' => 'stylesheet',
                    'always' => true,
                ],
                'font-headers' => [
                    'asset' => 'style',
                    'style' => 'h1, h2, h3, h4, h5, h6, label, nav {font-family: Anta, sans-serif;}',
                    'always' => true,
                ],
                'font-title' => [
                    'asset' => 'style',
                    'style' => '.card-header, legend {font-family: "Bruno Ace SC", sans-serif;}',
                    'always' => true,
                ],
                'font-monospace' => [
                    'asset' => 'style',
                    'style' => 'code, pre {font-family: "Kode Mono", monospace;}',
                    'always' => true,
                ],
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap.css',
                    'version' => '41.2.0',
                    'always' => true,
                ],
            ],
            'body' => [
                'comment' => [
                    'asset' => 'comment',
                    'comment' => 'body: using the wheat theme',
                ],
            ],
        ],
        'dark' => [
            'bsTheme' => 'dark',
            'enable' => (bool) env('PLAYGROUND_BLADE_THEME_DARK_ENABLE', true),
            'label' => 'Dark Theme',
            'key' => 'dark',
            'icon' => 'fa-solid fa-moon',
            'provider' => 'bootstrap',
            'session' => true,
            'head' => [
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap-dark.css',
                    'version' => '41.2.0',
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
                'ckeditor-bootstrap' => [
                    'rel' => 'stylesheet',
                    'asset' => 'stylesheet',
                    'href' => '/vendor/playground/ckeditor/bootstrap-light.css',
                    'version' => '41.2.0',
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
                'integrity' => 'sha512-Efdza5hyWLCHfsMBMeA4CI43/pkApXWwLkOp2G/pzLpXaRvKVlskbnBJ1hN0zyszukpImHS3440x5gM1iw8/Qw==',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/41.2.0/ckeditor.min.js',
                'version' => '41.2.0',
            ],
            'ckeditor-style' => [
                'asset' => 'style',
                'style' => '.ck-editor__editable_inline, .editor__editable {min-height: 200px;}',
                'version' => '41.2.0',
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
            // Prod
            'vue' => [
                'asset' => 'script',
                'crossorigin' => 'anonymous',
                'integrity' => 'sha512-tltvjJD1pUnXVAp0L9id/mcR+zc0xsIKmPMJksEclJ6uEyI8D6eZWpR0jSVWUTXOKcmeBMyND+LQH4ECf/5WKg==',
                'src' => 'https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.21/vue.global.prod.min.js',
                'version' => '3.4.21',
                'referrerpolicy' => 'no-referrer',
                'always' => true,
            ],
            // Dev version
            // 'vue' => [
            //     'asset' => 'script',
            //     'crossorigin' => 'anonymous',
            //     'integrity' => 'sha512-gEM2INjX66kRUIwrPiTBzAA6d48haC9kqrWZWjzrtnpCtBNxOXqXVFEeRDOeVC13pw4EOBrvlsJnNr2MXiQGvg==',
            //     'src' => 'https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.21/vue.global.min.js',
            //     'version' => '3.4.21',
            //     'referrerpolicy' => 'no-referrer',
            //     'always' => true,
            // ],
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
                'src' => '/vendor/playground/blade.js',
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
