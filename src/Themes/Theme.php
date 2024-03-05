<?php
/**
 * Playground
 */
namespace Playground\Blade\Themes;

use Playground\Blade\Concerns\WithAssets;
use Playground\Blade\Contracts\HasAssets;

/**
 * Playground\Blade\Themes\Theme
 */
class Theme implements HasAssets
{
    use WithAssets;

    protected bool $enable = false;

    protected string $key = '';

    protected string $label = '';

    protected string $icon = '';

    protected string $provider = '';

    protected bool $session = true;

    // protected string $sessionThemeName = '';

    public function __construct(
        mixed $options = null
        // string $sessionThemeName = ''
    ) {
        if (is_array($options)) {
            $this->setOptions($options);
        }

        // $this->sessionThemeName = $sessionThemeName;
    }

    public function initAssets(): self
    {
        if ($this->initAssets) {
            return $this;
        }

        $this->initAssets = true;

        return $this;
    }

    /**
     * @param array<string, mixed> $options
     */
    public function setOptions(array $options = []): self
    {
        $this->enable = ! empty($options['enable']);
        $this->session = ! empty($options['session']);

        if (! empty($options['icon'])
            && is_string($options['icon'])
        ) {
            $this->icon = $options['icon'];
        }

        if (! empty($options['key'])
            && is_string($options['key'])
        ) {
            $this->key = $options['key'];
        }

        if (! empty($options['label'])
            && is_string($options['label'])
        ) {
            $this->label = $options['label'];
        }

        if (! empty($options['provider'])
            && is_string($options['provider'])
        ) {
            $this->provider = $options['provider'];
        }

        if (! empty($options['body'])
            && is_array($options['body'])
        ) {
            $this->loadBodyAssets($options['body']);
        }

        if (! empty($options['head'])
            && is_array($options['head'])
        ) {
            $this->loadHeadAssets($options['head']);
        }

        $this->initAssets();
        // dd([
        //     '__METHOD__' => __METHOD__,
        //     '$options' => $options,
        //     '$this' => $this,
        // ]);

        return $this;
    }

    public function enabled(): bool
    {
        return $this->enable;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function provider(): string
    {
        return $this->provider;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function icon(): string
    {
        return $this->icon;
    }

    public function session(): bool
    {
        return $this->session;
    }
}
