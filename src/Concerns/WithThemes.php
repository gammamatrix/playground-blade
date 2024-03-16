<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Concerns;

use Playground\Blade\Themes;

/**
 * \Playground\Blade\Concerns\WithThemes
 */
trait WithThemes
{
    protected bool $initThemes = false;

    protected bool $session = true;

    protected Themes\Theme $theme;

    /**
     * @var array<string, Themes\Theme>
     */
    protected array $themes = [];

    protected string $sessionThemeName = '';

    public function initThemes(): self
    {
        if ($this->initThemes) {
            return $this;
        }

        $config = config('playground-blade');

        if (is_array($config)) {
            if (! empty($config['themes']) && is_array($config['themes'])) {
                $this->loadThemes($config['themes']);
            }

            if (! empty($config['session']) && is_array($config['session'])) {

                $this->session = ! empty($config['session']['enable']);

                if (! empty($config['session']['theme_name'])
                    && is_string($config['session']['theme_name'])
                ) {
                    $this->sessionThemeName = $config['session']['theme_name'];
                }
            }
        }

        $this->initThemes = true;

        return $this;
    }

    /**
     * @param array<string, mixed> $themes
     */
    public function loadThemes(array $themes = []): self
    {
        foreach ($themes as $key => $meta) {
            // Only Bootstrap themes are supported for now.
            if ($key && is_string($key)) {

                $theme = new Themes\Bootstrap($meta);

                $this->themes[$key] = $theme;
            }
        }

        return $this;
    }

    public function theme(): Themes\Theme
    {
        $this->initThemes();

        $themeKey = '';

        if ($this->session && $this->sessionThemeName) {
            $themeKey = session($this->sessionThemeName);
        }

        $this->setTheme(is_string($themeKey) ? $themeKey : '', false);

        return $this->theme;
    }

    /**
     * @return array<string, Themes\Theme>
     */
    public function themes(): array
    {
        return $this->initThemes()->themes;
    }

    public function getTheme(string $key): ?Themes\Theme
    {
        return $this->initThemes()->hasTheme($key) ? $this->initThemes()->themes[$key] : null;
    }

    public function hasTheme(string $themeKey): bool
    {
        return $themeKey && ! empty($this->initThemes()->themes[$themeKey]);
    }

    public function saveTheme(Themes\Theme $theme): self
    {
        $this->initThemes();

        if ($this->session && $theme->session() && $this->sessionThemeName) {
            session([
                $this->sessionThemeName => $theme->key(),
            ]);
        }

        return $this;
    }

    public function setTheme(string $themeKey = '', bool $save = true): self
    {
        $this->initThemes();

        $themeKey = empty($themeKey) ? 'default' : $themeKey;

        if (! empty($this->themes[$themeKey])) {
            $this->theme = $this->themes[$themeKey];
        } elseif (! empty($this->themes)) {
            $this->theme = current($this->themes);
        } else {
            $this->theme = new Themes\Bootstrap;
        }

        if ($save) {
            $this->saveTheme($this->theme);
        }

        return $this;
    }

    public function session(): bool
    {
        return $this->session;
    }

    public function sessionThemeName(): string
    {
        return $this->sessionThemeName;
    }
}
