<?php
/**
 * Playground
 */
namespace Playground\Blade\View\Components\Forms;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\Forms\ColumnSelect
 */
class ColumnSelect extends Component
{
    public function __construct(
        public bool $advanced = false,
        public ?bool $autocomplete = null,
        public string $class = '',
        public string $column = '',
        public bool $default = true,
        public string $described = '',
        public ?bool $disabled = null,
        public string $errorMessage = '',
        public string $id = 'id',
        public string $key = 'label',
        public string $label = '',
        public string $pattern = '',
        public bool|string $placeholder = false,
        /**
         * @var array<int, array<string, string>> $records
         */
        public array $records = [],
        /**
         * Options for rules:
         *
         * - bool $rules[required] - Make the column required.
         *
         * @var array<string, mixed> $rules
         */
        public array $rules = [],
        public string $step = '',
        public ?bool $readonly = null,
        public string $type = '',
        public bool $withoutMargin = false,
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.forms.column-select',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
