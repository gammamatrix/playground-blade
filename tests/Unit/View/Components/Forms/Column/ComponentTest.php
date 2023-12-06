<?php
/**
 * GammaMatrix
 *
 */

namespace Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Forms\Column;

use GammaMatrix\Playground\Blade\View\Components\Forms\Column;
use Tests\Unit\GammaMatrix\Playground\Blade\TestCase;
use Illuminate\Contracts\View\View;

/**
 * \Tests\Unit\GammaMatrix\Playground\Blade\View\Components\Forms\Column\ComponentTest
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
        $instance = new Column();

        $this->assertInstanceOf(Column::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_can_render_view_without_parameters(): void
    {
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column />', []);
        $this->assertNotEmpty($view->__toString());
        $view->assertSee('Expecting a column for the form input.');
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '$view->__toString()' => $view->__toString(),
        // ]);
    }

    public function test_component_can_render_view_without_label_on_title_column(): void
    {
        $advanced = true;
        $autocomplete = null;
        $column = 'title';
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column :advanced="$advanced" :autocomplete="$autocomplete" :column="$column"/>', [
            'advanced' => $advanced,
            'autocomplete' => $autocomplete,
            'column' => $column,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertDontSee('for="form-input-title"', false);
        $view->assertSee('form-input-title');
        $view->assertDontSee('is-invalid');
        $view->assertDontSee('invalid-feedback');
    }

    public function test_component_can_render_view_with_label_on_title_column(): void
    {
        $advanced = true;
        $autocomplete = null;
        $column = 'title';
        $label = 'Title';
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column :advanced="$advanced" :autocomplete="$autocomplete" :column="$column" :label="$label"/>', [
            'advanced' => $advanced,
            'autocomplete' => $autocomplete,
            'column' => $column,
            'label' => $label,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertSee('for="form-input-title"', false);
        $view->assertSee('form-input-title');
        $view->assertSee($label);
        $view->assertDontSee('is-invalid');
        $view->assertDontSee('invalid-feedback');
    }

    public function test_component_can_render_view_with_label_on_title_column_with_error(): void
    {
        $advanced = true;
        $autocomplete = null;
        $column = 'title';
        $label = 'Title';
        $error = 'The title field is required';
        $view = $this->withViewErrors([
            'title' => $error,
        ])->blade('<x-playground::forms.column :advanced="$advanced" :autocomplete="$autocomplete" :column="$column" :label="$label"/>', [
            'advanced' => $advanced,
            'autocomplete' => $autocomplete,
            'column' => $column,
            'label' => $label,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertSee('for="form-input-title"', false);
        $view->assertSee('form-input-title');
        $view->assertSee('form-input-error-title');
        $view->assertSee($label);
        $view->assertSee($error);
        $view->assertSee('is-invalid');
        $view->assertSee('invalid-feedback');
    }
}
