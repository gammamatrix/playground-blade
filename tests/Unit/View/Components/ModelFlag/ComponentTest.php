<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\View\Components\ModelFlag;

use Illuminate\Contracts\View\View;
use Playground\Blade\View\Components\ModelFlag;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\View\Components\ModelFlag\ComponentTest
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
        $columnMeta = [];
        $value = null;
        $instance = new ModelFlag($columnMeta, $value);

        $this->assertInstanceOf(ModelFlag::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_renders_empty_view_without_labels_or_classes(): void
    {
        $columnMeta = [
            'onFalseClass' => '',
            'onFalseLabel' => '',
            'onTrueClass' => '',
            'onTrueLabel' => '',
        ];
        $value = null;
        $view = $this->blade('<x-playground::model-flag :$columnMeta :$value />', [
            'columnMeta' => $columnMeta,
            'value' => $value,
        ]);
        $this->assertEmpty($view->__toString());
    }

    public function test_component_can_render_view_with_true_value(): void
    {
        $columnMeta = [
            'onFalseClass' => 'fa-solid fa-users',
            'onFalseLabel' => 'Civilians',
            'onTrueClass' => 'fa-solid fa-user-secret',
            'onTrueLabel' => 'Spy',
        ];
        $value = true;
        $view = $this->blade('<x-playground::model-flag :$columnMeta :$value />', [
            'columnMeta' => $columnMeta,
            'value' => $value,
        ]);
        $view->assertSee($columnMeta['onTrueClass']);
        $view->assertSee($columnMeta['onTrueLabel']);
        $view->assertDontSee($columnMeta['onFalseClass']);
        $view->assertDontSee($columnMeta['onFalseLabel']);
    }

    public function test_component_can_render_view_with_false_value(): void
    {
        $columnMeta = [
            'onFalseClass' => 'fa-solid fa-users',
            'onFalseLabel' => 'Civilians',
            'onTrueClass' => 'fa-solid fa-user-secret',
            'onTrueLabel' => 'Spy',
        ];
        $value = false;
        $view = $this->blade('<x-playground::model-flag :$columnMeta :$value />', [
            'columnMeta' => $columnMeta,
            'value' => $value,
        ]);
        $view->assertDontSee($columnMeta['onTrueClass']);
        $view->assertDontSee($columnMeta['onTrueLabel']);
        $view->assertSee($columnMeta['onFalseClass']);
        $view->assertSee($columnMeta['onFalseLabel']);
    }

    public function test_component_can_render_view_with_null_value(): void
    {
        $columnMeta = [
            'onFalseClass' => 'fa-solid fa-users',
            'onFalseLabel' => 'Civilians',
            'onTrueClass' => 'fa-solid fa-user-secret',
            'onTrueLabel' => 'Spy',
        ];
        $value = null;
        $view = $this->blade('<x-playground::model-flag :$columnMeta :$value />', [
            'columnMeta' => $columnMeta,
            'value' => $value,
        ]);
        $view->assertDontSee($columnMeta['onTrueClass']);
        $view->assertDontSee($columnMeta['onTrueLabel']);
        $view->assertSee($columnMeta['onFalseClass']);
        $view->assertSee($columnMeta['onFalseLabel']);
    }
}
