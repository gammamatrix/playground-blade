<?php
/**
 * Playground
 */

declare(strict_types=1);
namespace Playground\Blade\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\ModelImage
 */
class ModelImage extends Component
{
    public function __construct(
        /**
         * @var array<string, mixed> $columnMeta
         */
        public array $columnMeta = [],
        /**
         * @var array<string, mixed> $fkModelData
         */
        public array $fkModelData = [],
        public mixed $value = null
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.model.image',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
