<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Playground\Auth\ServiceProvider as PlaygroundAuthServiceProvider;
use Playground\Blade\ServiceProvider;
use Playground\ServiceProvider as PlaygroundServiceProvider;
use Playground\Test\OrchestraTestCase;

/**
 * \Tests\Unit\Playground\Blade\TestCase
 */
class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app)
    {
        return [
            PlaygroundServiceProvider::class,
            PlaygroundAuthServiceProvider::class,
            ServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        /**
         * @var \Illuminate\Config\Repository $config
         */
        $config = $app['config'];

        $config->set('auth.providers.users.model', 'Playground\\Test\\Models\\User');
        $config->set('playground.auth.verify', 'user');
        $app['config']->set('auth.testing.password', 'password');
        $app['config']->set('auth.testing.hashed', false);
    }
}
