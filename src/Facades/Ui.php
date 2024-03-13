<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Facades;

use Illuminate\Support\Facades\Facade;
use Playground\Blade\Assets\Asset;
use Playground\Blade\Themes\Theme;

/**
 * \Playground\Blade\Facades\Ui
 *
 * @method static Theme theme()
 * @method static array<string, Theme> themes()
 * @method static array<string, Asset> bodyAssets()
 * @method static array<string, Asset> headAssets()
 * @method static ?Theme getTheme(string $themeKey)
 * @method static bool hasTheme(string $themeKey)
 * @method static \Playground\Blade\Ui saveTheme(Theme $theme)
 * @method static \Playground\Blade\Ui setTheme(string $themeKey = '', bool $save = true)
 */
class Ui extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'playground-blade-ui';
    }
}
