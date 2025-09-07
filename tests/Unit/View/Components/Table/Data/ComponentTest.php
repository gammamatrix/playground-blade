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
        $instance = new DataTable;

        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertInstanceOf(DataTable::class, $instance);
        $this->assertInstanceOf(View::class, $instance->render());
    }

    public function test_component_cannot_render_view_without_paginator(): void
    {
        $this->expectException(\Illuminate\View\ViewException::class);
        $this->expectExceptionMessage('Expecting a LengthAwarePaginator for $paginator in resources/views/components/table/data.blade.php');
        $view = $this->blade('<x-playground::table.data />', []);
        $view->__toString();
    }
}
