<!doctype html>
<?php
/**
 * @var array<string, mixed> $package_config
 */
$package_config = config('playground-blade');

/**
 * @var string $appName The application name.
 */
$appName = isset($appName) && is_string($appName) && !empty($appName) ? $appName : config('app.name');

/**
 * @var \Playground\Blade\Themes\Theme|\Playground\Blade\Themes\Bootstrap
 */
$theme = Playground\Blade\Facades\Ui::theme();
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ $theme->bsTheme() }}">
<?php
/**
 * @var string $appName The application name.
 */
$appName = isset($appName) && is_string($appName) && !empty($appName) ? $appName : config('app.name');

/**
 * @var boolean $withAlerts Show the alerts in the layout.
 */
$withAlerts = isset($withAlerts) && is_bool($withAlerts) ? $withAlerts : true;

/**
 * @var boolean $withErrors Show the errors in the layout.
 */
$withErrors = isset($withErrors) && is_bool($withErrors) ? $withErrors : true;

/**
 * @var boolean $withBreadcrumbs Show the breadcrumbs in the layout.
 */
$withBreadcrumbs = isset($withBreadcrumbs) && is_bool($withBreadcrumbs) ? $withBreadcrumbs : true;

/**
 * @var string $withBodyClass The class to put in the body tag.
 */
$withBodyClass = isset($withBodyClass) && is_string($withBodyClass) ? $withBodyClass : 'd-flex flex-column min-vh-100';

/**
 * @var string $withMainClass The class to put in the main tag.
 */
$withMainClass = isset($withMainClass) && is_string($withMainClass) ? $withMainClass : 'flex-shrink-0';

/**
 * @var boolean $withEditor Load the editor for forms.
 */
$withEditor = isset($withEditor) && is_bool($withEditor) ? $withEditor : false;

/**
 * @var boolean $withFooter Show the footer in the layout.
 */
$withFooter = isset($withFooter) && (is_bool($withFooter) || is_string($withFooter)) ? $withFooter : false;

/**
 * @var boolean $withUserMenu Display the user menu in the nav bar.
 */
$withUserMenu = isset($withUserMenu) && is_bool($withUserMenu) ? $withUserMenu : true;

/**
 * @var boolean|string $withNav Show the navigation in the layout.
 */
$withNav = isset($withNav) && (is_bool($withNav) || is_string($withNav)) ? $withNav : true;

/**
 * @var boolean $withSidebarLeft Enable the left sidebar in the layout.
 */
$withSidebarLeft = isset($withSidebarLeft) && (is_bool($withSidebarLeft) || is_string($withSidebarLeft)) ? $withSidebarLeft : false;

/**
 * @var boolean $withSidebarRight Enable the right sidebar in the layout.
 */
$withSidebarRight = isset($withSidebarRight) && (is_bool($withSidebarRight) || is_string($withSidebarRight)) ? $withSidebarRight : false;

/**
 * @var boolean $withScripts Enable the script assets.
 */
$withScripts = isset($withScripts) && is_bool($withScripts) ? $withScripts : true;

/**
 * @var boolean $withSnippets Show the snippets in the layout.
 */
$withSnippets = isset($withSnippets) && is_bool($withSnippets) ? $withSnippets : false;

/**
 * @var boolean $withIcons Enable the script assets.
 */
$withIcons = isset($withIcons) && is_bool($withIcons) ? $withIcons : true;

/**
 * @var boolean $withVue Enable Vue JS
 */
$withVue = isset($withVue) && is_bool($withVue) ? $withVue : true;

$withPlayground = isset($withPlayground) && is_bool($withPlayground) ? $withPlayground : true;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($appName) ? sprintf('%1$s: ', $appName) : '' }}@yield('title')</title>

    @foreach (Playground\Blade\Facades\Ui::headAssets($theme) as $asset)
        {!! $asset !!}
    @endforeach

    @stack('scripts')
    @yield('head')

    @if (!$withBreadcrumbs)
        <style>
            .breadcrumb {
                display: none;
            }
        </style>
    @endif
</head>

<body class="{{ $withBodyClass }}">

    @yield('pre-header')

    @yield('header')

    @yield('pre-nav')

    @if (is_bool($withNav))
        @include(sprintf('%1$slayouts/bootstrap/nav', $package_config['view']))
    @elseif (!empty($withNav) && is_string($withNav))
        @include($withNav)
    @endif

    @if (is_bool($withSidebarLeft))
        @include(sprintf('%1$slayouts/bootstrap/sidebar-left', $package_config['view']))
    @elseif (!empty($withSidebarLeft) && is_string($withSidebarLeft))
        @include($withSidebarLeft)
    @endif

    @if (is_bool($withSidebarRight))
        @include(sprintf('%1$slayouts/bootstrap/sidebar-right', $package_config['view']))
    @elseif (!empty($withSidebarRight) && is_string($withSidebarRight))
        @include($withSidebarRight)
    @endif

    @yield('pre-main')

    <main role="main" class="{{ $withMainClass }}">
        @yield('breadcrumbs')
        @includeWhen($withAlerts, sprintf('%1$slayouts/bootstrap/alerts', $package_config['view']))
        @includeWhen($withErrors, sprintf('%1$slayouts/bootstrap/errors', $package_config['view']))
        @yield('main')
        @yield('content')
        @yield('content-end')
    </main>

    @yield('pre-footer')

    @if (is_bool($withFooter))
        @include(sprintf('%1$slayouts/bootstrap/footer', $package_config['view']))
    @elseif (!empty($withFooter) && is_string($withFooter))
        @include($withFooter)
    @endif

    @yield('body')
    @stack('body-first')
    @stack('body')
    @stack('modals')
    @stack('body-last')

    @foreach (Playground\Blade\Facades\Ui::bodyAssets($theme) as $asset)
        {!! $asset !!}
    @endforeach

</body>

</html>
