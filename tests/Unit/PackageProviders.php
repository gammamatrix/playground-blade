<?php

/**
 * Playground
 */

declare(strict_types=1);

namespace Tests\Unit\Playground\Blade;

/**
 * \Tests\Unit\Playground\Blade\PackageProviders
 */
trait PackageProviders
{
    protected function getPackageProviders($app)
    {
        return [
            \Playground\Test\ServiceProvider::class,
            \Playground\ServiceProvider::class,
            \Playground\Auth\ServiceProvider::class,
            \Playground\Blade\ServiceProvider::class,
            \Playground\Cms\ServiceProvider::class,
        ];
    }
}
