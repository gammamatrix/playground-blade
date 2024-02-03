<?php
/**
 * Playground
 */

declare(strict_types=1);
namespace Tests\Feature\Playground\Blade\Console\Commands\About;

use Playground\Blade\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Feature\Playground\Blade\TestCase;

/**
 * \Tests\Feature\Playground\Blade\Console\Commands\About
 */
#[CoversClass(ServiceProvider::class)]
class CommandTest extends TestCase
{
    public function test_command_about_displays_package_information_and_succeed_with_code_0(): void
    {
        /**
         * @var \Illuminate\Testing\PendingCommand $result
         */
        $result = $this->artisan('about');
        $result->assertExitCode(0);
        $result->expectsOutputToContain('Playground: Blade');
    }
}
