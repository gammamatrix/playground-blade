<?php

declare(strict_types=1);
/**
 * Playground
 */

namespace Tests\Unit\Playground\Blade;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Playground\Test\OrchestraTestCase;

/**
 * \Tests\Unit\Playground\Blade\TestCase
 */
class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;
    use PackageProviders;

    //    /**
    //     * Set up the environment.
    //     *
    //     * @param  \Illuminate\Foundation\Application  $app
    //     */
    //    protected function getEnvironmentSetUp($app)
    //    {
    //        /**
    //         * @var \Illuminate\Config\Repository $config
    //         */
    //        $config = $app['config'];
    //
    //        $config->set('auth.providers.users.model', 'Playground\\Test\\Models\\User');
    //        $config->set('playground.auth.verify', 'user');
    //        $app['config']->set('auth.testing.password', 'password');
    //        $app['config']->set('auth.testing.hashed', false);
    //    }
}
