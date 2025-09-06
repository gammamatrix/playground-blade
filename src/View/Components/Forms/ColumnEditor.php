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
         * @var array{
         *     required?: bool, // Make the column required.
         *     maxlength?: integer // Limit the number of characters in the content.
         * } $rules
         */
        public array $rules = [],
        public bool $withoutMargin = false,
        public string $described = '',
        public ?bool $disabled = null,
        public ?bool $readonly = null,
    ) {}

    public function render(): Factory|View
    {
        $prefix = config('playground-blade.view', '');

        /**
         * @var view-string $view
         */
        $view = sprintf(
            '%1$scomponents.forms.column-editor',
            is_string($prefix) ? $prefix : ''
        );

        return view($view);
    }
}
