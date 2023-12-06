<?php
/**
 * GammaMatrix
 *
 */

namespace Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Forms\ColumnSelect;

use GammaMatrix\Playground\Blade\View\Components\Forms\ColumnSelect;
use Tests\Unit\GammaMatrix\Playground\Blade\TestCase;
use Illuminate\Contracts\View\View;

/**
 * \Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Forms\ColumnSelect\ComponentTest
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
        $instance = new ColumnSelect();

        $this->assertInstanceOf(ColumnSelect::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_can_render_view_without_parameters(): void
    {
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column-select />', []);
        $this->assertNotEmpty($view->__toString());
        $view->assertSee('Expecting a column for the form select.');
        $view->assertSee('alert-danger');
    }

    public function test_component_can_render_view_with_select(): void
    {
        $advanced = false;
        $column = 'owned_by_id';
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column-select :advanced="$advanced" :column="$column" />', [
            'advanced' => $advanced,
            'column' => $column,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertDontSee('Expecting a column for the form select.');
        $view->assertDontSee('alert-danger');
        $view->assertSee('form-input-owned_by_id');
    }
}
