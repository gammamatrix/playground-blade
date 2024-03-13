<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Assets\Contracts;

/**
 * \Playground\Blade\Assets\Contracts\Link
 */
interface Link
{
    public function always(): bool;

    public function as(): string;

    public function crossorigin(): string;

    public function href(): string;

    public function integrity(): string;

    public function media(): string;

    public function title(): string;

    public function rel(): string;

    public function type(): string;
}
