<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\View\Components\Table\Data;

use Illuminate\Contracts\View\View;
use Playground\Blade\View\Components\Table\Data as DataTable;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\View\Components\Table\ComponentTest
 */
class ComponentTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'playground.load.views' => true,
        ]);
    }

    public function test_component_instance(): void
    {
        $instance = new DataTable();

        $this->assertInstanceOf(DataTable::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_can_render_view(): void
    {
        $view = $this->blade('<x-playground::table.data />', []);
        $this->assertEmpty($view->__toString());
    }
}
