<?php

declare(strict_types=1);
/**
 * Playground
 */

namespace Tests\Feature\Playground\Blade;

use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * \Tests\Feature\Playground\Blade\TestCase
 */
class TestCase extends \Tests\Unit\Playground\Blade\TestCase
{
    use DatabaseTransactions;

    /**
     * @var array<string, array<string, array<int, string>>>
     */
    protected array $load_migrations = [
        'gammamatrix' => [
            'playground-cms' => [
                // 'migrations',
            ],
        ],
    ];

    protected bool $hasMigrations = true;

    protected bool $load_migrations_laravel = false;

    protected bool $load_migrations_package = false;

    protected bool $load_migrations_playground = true;

    protected bool $setUpUserForPlayground = false;
}
