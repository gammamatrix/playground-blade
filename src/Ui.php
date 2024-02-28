<?php
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
}
