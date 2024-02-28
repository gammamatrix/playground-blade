<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets\Contracts;

/**
 * \Playground\Blade\Assets\Contracts\Style
 */
interface Style
{
    public function always(): bool;
    public function style(): string;
}
