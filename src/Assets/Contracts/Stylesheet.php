<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Assets\Contracts;

/**
 * \Playground\Blade\Assets\Contracts\Stylesheet
 */
interface Stylesheet
{
    public function docs(): string;

    public function version(): string;
}
