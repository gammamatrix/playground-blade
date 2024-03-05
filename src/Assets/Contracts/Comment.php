<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets\Contracts;

/**
 * \Playground\Blade\Assets\Contracts\Comment
 */
interface Comment
{
    public function always(): bool;

    public function comment(): string;
}
