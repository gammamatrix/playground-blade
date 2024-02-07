<?php
/**
 * Playground
 */
namespace Playground\Blade\View\Components\Table;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\Table\Data
 */
class Data extends Component
{
    public function __construct(
        public string $id = 'table-component',
        public string $icon = '',
        public string $badge = 'badge badge-pill badge-success',
        public bool $showPagination = true,
        public bool $showLinks = true,
        public bool $modelActions = false,
        public bool $trashable = true,
        public string $privilege = '',
        public string $routeParameter = 'id',
        public string $routeParameterKey = 'id',
        public string $routeEdit = '',
        public string $routeRestore = '',
        public string $routeDelete = '',
        public string $routeDeleteRelationship = '',
        public string $routeDeleteRelationshipId = '',
        public bool $collapsible = true,
        public string $returnUrl = '',
        /**
         * @var array<string, mixed> $columns
         */
        public array $columns = [],
        /**
         * @var array<string, mixed> $filters
         */
        public array $filters = [],
        /**
         * @var array<string, mixed> $validated
         */
        public array $validated = [],
        /**
         * @var array<string, mixed> $meta
         */
        public array $meta = [],
        /**
         * @var array<string, mixed> $sort
         */
        public array $sort = [],
        /**
         * @var array<int, int> $page_options
         */
        public array $page_options = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            15,
            20,
            25,
            30,
            35,
            50,
            100,
        ],
        public int $sorts = 3,
        /**
         * @var array<string, mixed> $styling
         */
        public array $styling = [],
        public string $class = '',
        public ?LengthAwarePaginator $paginator = null,
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.table.data',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
