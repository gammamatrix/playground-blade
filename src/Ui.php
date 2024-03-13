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

        $config = config('playground-blade');

        if (is_array($config)) {
            if (! empty($config['assets']) && is_array($config['assets'])) {
                if (! empty($config['assets']['head']) && is_array($config['assets']['head'])) {
                    $this->loadHeadAssets($config['assets']['head']);
                }
                if (! empty($config['assets']['body']) && is_array($config['assets']['body'])) {
                    $this->loadBodyAssets($config['assets']['body']);
                }
            }
        }

        $this->initAssets = true;

        return $this;
    }
}
