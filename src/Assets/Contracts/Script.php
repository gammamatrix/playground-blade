<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets\Contracts;

/**
 * \Playground\Blade\Assets\Contracts\Script
 */
interface Script
{
    public function always(): bool;

    public function async(): bool;

    public function nomodule(): bool;

    public function defer(): bool;

    public function scoped(): bool;

    public function crossorigin(): string;

    public function fetchpriority(): string;

    public function integrity(): string;

    public function referrerpolicy(): string;

    public function src(): string;

    public function version(): string;

    public function type(): string;
}
