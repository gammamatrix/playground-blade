<?php
/**
 * GammaMatrix
 *
 */

namespace Tests\Unit\GammaMatrix\Playground\Blade;

use GammaMatrix\Playground\Test\OrchestraTestCase;
use GammaMatrix\Playground\Blade\ServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

/**
 * \Tests\Unit\GammaMatrix\Playground\Blade\TestCase
 *
 */
class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app)
    {
        return [
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

        $config->set('auth.providers.users.model', 'GammaMatrix\\Playground\\Test\\Models\\User');
        $config->set('playground.auth.verify', 'user');
    }
}
