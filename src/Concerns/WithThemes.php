<?php
/**
 * Playground
 */
namespace Playground\Blade\Concerns;

use Illuminate\Support\Str;
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
            if (!empty($config['themes']) && is_array($config['themes'])) {
                $this->loadThemes($config['themes']);
            }

            if (!empty($config['session']) && is_array($config['session'])) {

                $this->session = ! empty($config['session']['enable']);

                if (! empty($config['session']['theme_name'])
                    && is_string($config['session']['theme_name'])
                ) {
                    $this->sessionThemeName = $config['session']['theme_name'];
                }
            }
        }

        $theme = '';

        if ($this->session && $this->sessionThemeName) {
            $theme = session($this->sessionThemeName);
        }

        $theme = is_string($theme) && $theme ? $theme : 'default';

        if (! empty($this->themes[$theme])) {
            $this->theme = $this->themes[$theme];
        } elseif (! empty($this->themes)) {
            $this->theme = current($this->themes);
        } else {
            $this->theme = new Themes\Bootstrap;
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

                $theme = new Themes\Bootstrap($meta, $this->sessionThemeName);

                $this->themes[$key] = $theme;
            }
        }

        return $this;
    }

    public function theme(): Themes\Theme
    {
        return $this->initThemes()->theme;
    }

    /**
     * @return array<string, Themes\Theme>
     */
    public function themes(): array
    {
        return $this->initThemes()->themes;
    }

    public function saveTheme(Themes\Theme $theme): self
    {
        $sessionThemeName = $theme->sessionThemeName();
        if ($this->session && $theme->session() && $sessionThemeName) {
            session([
                $sessionThemeName => $theme->key(),
            ]);
        }

        return $this;
    }
}
