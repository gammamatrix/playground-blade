<?php
/**
 * GammaMatrix
 *
 */

namespace GammaMatrix\Playground\Blade\View\Components\Forms;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \GammaMatrix\Playground\Blade\View\Components\Forms\Column
 *
 */
class Column extends Component
{
    public function __construct(
        public bool $advanced = false,
        public ?bool $autocomplete = null,
        public string $class = '',
        public string $column = '',
        public string $default = '',
        public string $described = '',
        public ?bool $disabled = null,
        public string $errorMessage = '',
        public string $label = '',
        public string $pattern = '',
        public bool|string $placeholder = false,
        public ?bool $readonly = null,
        /**
         * Options for rules:
         *
         * - bool $rules[required] - Make the column required.
         * - int $rules[maxlength] - Limit the number of characters in the content.
         * - ?int $rules[max] - Require a maximum value.
         * - ?int $rules[min] - Require a minumum value.
         * @var array<string, mixed> $rules
         */
        public array $rules = [],
        public ?int $step = null,
        public string $type = 'text',
        public bool $withoutMargin = false,
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');
        return view(sprintf(
            '%1$scomponents.forms.column',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
