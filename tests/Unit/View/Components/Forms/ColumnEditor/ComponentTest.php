<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\View\Components\Forms\ColumnEditor;

use Illuminate\Contracts\View\View;
use Playground\Blade\View\Components\Forms\ColumnEditor;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\View\Components\Forms\ColumnEditor\ComponentTest
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
        $instance = new ColumnEditor();

        $this->assertInstanceOf(ColumnEditor::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_can_render_view_without_parameters(): void
    {
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column-editor />', []);
        $this->assertNotEmpty($view->__toString());
        $view->assertSee('Expecting a column for the form editor.');
        $view->assertSee('alert-danger');
    }

    public function test_component_can_render_view_with_content_textarea(): void
    {
        $advanced = true;
        $class = 'editor';
        $column = 'content';
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column-editor :advanced="$advanced" :class="$class" :column="$column" />', [
            'advanced' => $advanced,
            'class' => $class,
            'column' => $column,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertDontSee('Expecting a column for the form editor.');
        $view->assertDontSee('alert-danger');
        $view->assertDontSee('form-input-help-content');
        $view->assertSee('form-advanced');
        $view->assertSee('editor');
        $view->assertSee('<textarea id="form-input-content"', false);
    }

    public function test_component_can_render_view_with_content_textarea_and_described(): void
    {
        $advanced = true;
        $class = 'editor';
        $column = 'content';
        $described = 'You can write in the box!';
        $view = $this->withViewErrors([])->blade('<x-playground::forms.column-editor :advanced="$advanced" :class="$class" :column="$column" :described="$described" />', [
            'advanced' => $advanced,
            'class' => $class,
            'column' => $column,
            'described' => $described,
        ]);
        $this->assertNotEmpty($view->__toString());
        $view->assertDontSee('Expecting a column for the form editor.');
        $view->assertDontSee('alert-danger');
        $view->assertSee('form-input-help-content');
        $view->assertSee('form-advanced');
        $view->assertSee('editor');
        $view->assertSee('<textarea id="form-input-content"', false);
    }
}
