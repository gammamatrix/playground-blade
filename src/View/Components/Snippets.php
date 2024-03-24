<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\Snippets
 */
class Snippets extends Component
{
    public function __construct(
        /**
         * @var array<int, array<string, mixed>> $snippets
         */
        public array $snippets = [],
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.snippets',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
