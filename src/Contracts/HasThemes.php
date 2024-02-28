<?php
/**
 * Playground
 */
namespace Playground\Blade\Contracts;

use Playground\Blade\Themes;

/**
 * \Playground\Blade\Contracts\HasThemes
 */
interface HasThemes
{
    public function initThemes(): self;

    /**
     * @param array<string, mixed> $themes
     */
    public function loadThemes(array $themes = []): self;

    public function theme(): Themes\Theme;

    /**
     * @return array<string, Themes\Theme>
     */
    public function themes(): array;

    public function saveTheme(Themes\Theme $theme): self;
}
