<?php
/**
 * Playground
 */
namespace Playground\Blade\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\ModelFlag
 */
class ModelFlag extends Component
{
    public function __construct(
        /**
         * @var array<string, mixed> $columnMeta
         */
        public array $columnMeta = [],
        public mixed $value = null
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.model.flag',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
