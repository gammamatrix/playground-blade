<?php

declare(strict_types=1);
/**
 * Playground
 */

namespace Playground\Blade;

use Playground\Blade\Concerns\WithAssets;
use Playground\Blade\Concerns\WithThemes;
use Playground\Blade\Contracts\HasAssets;
use Playground\Blade\Contracts\HasThemes;

/**
 * \Playground\Blade\Ui
 */
class Ui implements HasAssets, HasThemes
{
    use WithAssets;
    use WithThemes;

    public function initAssets(): self
    {
        if ($this->initAssets) {
            return $this;
        }

        /**
         * @var array{
         *         head?: array{
         *              comment?: array<string, mixed>,
         *              font?: array<string, mixed>,
         *              icon?: array<string, mixed>,
         *              link?: array<string, mixed>,
         *              script?: array<string, mixed>,
         *              style?: array<string, mixed>,
         *              stylesheet?: array<string, mixed>,
         *          },
         *          body?: array{
         *              comment?: array<string, mixed>,
         *              script?: array<string, mixed>,
         *              style?: array<string, mixed>,
         *              link?: array<string, mixed>,
         *          },
         *  } $assets
         */
        $assets = config('playground-blade.assets');

        if (! empty($assets) && is_array($assets)) {
            if (! empty($assets['head']) && is_array($assets['head'])) {
                $this->loadHeadAssets($assets['head']);
            }
            if (! empty($assets['body']) && is_array($assets['body'])) {
                $this->loadBodyAssets($assets['body']);
            }
        }

        $this->initAssets = true;

        return $this;
    }
}
