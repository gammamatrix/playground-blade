<?php

declare(strict_types=1);
/**
 * Playground
 */

namespace Tests\Feature\Playground\Blade\View\Components\Table\Data;

use Illuminate\Contracts\View\View;
use Playground\Blade\View\Components\Table\Data as DataTable;
use Playground\Cms\Models\Snippet;
use Tests\Feature\Playground\Blade\TestCase;

/**
 * \Tests\Feature\Playground\Blade\View\Components\Table\ComponentTest
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

    public function test_component_can_render_empty_view_without_columns(): void
    {
        $paginate = Snippet::paginate();
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $paginate);

        $view = $this->component(\Playground\Blade\View\Components\Table\Data::class, [
            'paginator' => $paginate,
        ]);

        $this->assertEmpty($view->__toString());
    }

    public function test_component_can_render_view(): void
    {
        $paginate = Snippet::paginate();
        $this->assertInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class, $paginate);

        $view = $this->component(\Playground\Blade\View\Components\Table\Data::class, [
            'paginator' => $paginate,
            'columns' => [
                'label' => [
                    'linkType' => 'id',
                    //                    'linkRoute' => sprintf('%1$s.show', $packageInfo->model_route()),
                    'label' => 'Label',
                    'filter' => 'id',
                ],
                'slug' => [
                    'hide-sm' => true,
                    // 'linkType' => 'slug',
                    //                    'linkRoute' => sprintf('%1$s.slug', $packageInfo->model_route()),
                    'label' => 'Slug',
                ],
                'active' => [
                    'hide-sm' => true,
                    'flag' => true,
                    'label' => 'Active',
                    'onTrueClass' => 'fas fa-check text-success',
                ],
                'locked' => [
                    'hide-sm' => true,
                    'flag' => true,
                    'label' => 'Locked',
                    'onTrueClass' => 'fas fa-lock text-success',
                ],
                'flagged' => [
                    'hide-sm' => true,
                    'flag' => true,
                    'label' => 'Flagged',
                    'onTrueClass' => 'fas fa-flag text-warning',
                ],
                'parent_id' => [
                    'hide-sm' => true,
                    // 'linkType' => 'fk',
                    // 'accessor' => 'parent',
                    'property' => 'label',
                    // 'linkRoute' => sprintf('%1$s.id', $packageInfo->model_route()),
                    'label' => 'Parent',
                    'filter' => 'parent_id',
                ],
                'description' => [
                    'hide-sm' => true,
                    'label' => 'Description',
                    'html' => true,
                ],

            ],
        ]);

        $this->assertNotEmpty($view->__toString());
    }
}
