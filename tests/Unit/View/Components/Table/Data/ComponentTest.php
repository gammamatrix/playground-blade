<?php
/**
 * GammaMatrix
 *
 */

namespace Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Table\Data;

use GammaMatrix\Playground\Blade\View\Components\Table\Data as DataTable;
use Tests\Unit\GammaMatrix\Playground\Blade\TestCase;
use Illuminate\Contracts\View\View;

/**
 * \Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Table\ComponentTest
 *
 */
class ComponentTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
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
