<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Themes\Contracts;

/**
 * \Playground\Blade\Themes\Contracts\Bootstrap
 */
interface Bootstrap
{
    /**
     * Get the Bootstrap theme to set in the HTML tag.
     *
     * <html data-bs-theme="dark">
     */
    public function bsTheme(): string;
}
