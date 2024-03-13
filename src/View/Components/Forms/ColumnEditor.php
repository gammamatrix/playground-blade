<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\View\Components\Forms;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * \Playground\Blade\View\Components\Forms\ColumnEditor
 */
class ColumnEditor extends Component
{
    public function __construct(
        public bool $advanced = false,
        public string $class = 'editor',
        public string $column = '',
        public string $errorMessage = '',
        public string $label = '',
        /**
         * Options for rules:
         *
         * - bool $rules[required] - Make the column required.
         * - int $rules[maxlength] - Limit the number of characters in the content.
         *
         * @var array<string, mixed> $rules
         */
        public array $rules = [],
        public bool $withoutMargin = false,
        public string $described = '',
        public ?bool $disabled = null,
        public ?bool $readonly = null,
    ) {
    }

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view');

        return view(sprintf(
            '%1$scomponents.forms.column-editor',
            is_string($prefix) ? $prefix : ''
        ));
    }
}
