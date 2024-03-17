# Playground Blade

[![Playground CI Workflow](https://github.com/gammamatrix/playground-blade/actions/workflows/ci.yml/badge.svg?branch=develop)](https://raw.githubusercontent.com/gammamatrix/playground-blade/testing/develop/testdox.txt)
[![Test Coverage](https://raw.githubusercontent.com/gammamatrix/playground-blade/testing/develop/coverage.svg)](tests)
[![PHPStan Level 9 src and tests](https://img.shields.io/badge/PHPStan-level%209-brightgreen)](.github/workflows/ci.yml#L115)

The Playground Blade package for [Laravel](https://laravel.com/docs/11.x) applications.

This package provides Blade UI handling.

Read more on using [Playground Blade at Read the Docs: Playground Documentation.](https://gammamatrix-playground.readthedocs.io/en/latest/playground/blade.html)

## Installation

You can install the package via composer:

```bash
composer require gammamatrix/playground-blade
```

## Configuration

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Playground\Blade\ServiceProvider" --tag="playground-config"
```

See the contents of the published config file: [config/playground-blade.php](config/playground-blade.php)


Read more on using [Environment Variables at the Read the Docs for Playground Blade.](https://gammamatrix-playground.readthedocs.io/en/develop/playground/blade.html#environment-variables)


## UI Layouts

NOTE: Using Blade is not required to use Playground, it just an option, such as Vue, React or TypeScript.

The configuration in [config/playground-blade.php](config/playground-blade.php) has a section for frontend assets. If you would like to add more assets, CSS or JavaScript, publish the configuration and add them to the `libs` section.

Assets may be loaded into either head or they will be added to the end of the body.

By default, the following libraries are loaded.

- `favicon`: `/favicon.ico`
- [Nunito](https://fonts.google.com/specimen/Nunito): Loaded from Google Fonts.
- [Bootstrap: v5.3.3](https://getbootstrap.com/docs/5.3/)
- [FontAwesome: v6.5.1](https://fontawesome.com/search?o=r&m=free)
- [CKEditor 5: v41.1.0](https://github.com/ckeditor/ckeditor5)
- [Vue 3 - v3.4.21](https://vuejs.org/)
- `/vendor/playground/blade.js` A small library to be loaded for Blade UI usage. Needs to be published.

Optionally, a page may load:
- [CKEditor 5](https://ckeditor.com/ckeditor-5/) an advanced WYSIWYG editor for forms.

### Assets

If you are using the Playground Blade UI, you can publish the JS assets with:
```bash
php artisan vendor:publish --tag playground-blade-js
```
- These Javascript assets, [resources/js/playground-blade.js](resources/js/playground-blade.js), provide simple helpers for features such as Bootstrap Form Validation and loading CKEditor for textarea elements on forms.

Publishes CSS:
```bash
php artisan vendor:publish --tag playground-blade-css
```

You can publish the layouts file with:
```bash
php artisan vendor:publish --tag playground-blade-layouts
```

Components may also be published:
```bash
php artisan vendor:publish --tag playground-blade-components
```

Error pages are available at:
```bash
php artisan vendor:publish --tag playground-blade-errors
```

## Testing

```sh
composer test
```

## PHPStan

Tests at level 9 on:
- `config/`
- `resources/views/`
- `src/`
- `tests/Feature/`
- `tests/Unit/`

```sh
composer analyse
```

## About

Playground Blade provides information in the `artisan about` command.

<img src="resources/docs/artisan-about-playground-blade.png" alt="screenshot of artisan about command with Playground Blade.">

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Jeremy Postlethwaite](https://github.com/gammamatrix)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
