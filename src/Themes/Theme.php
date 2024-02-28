<?php
/**
 * Playground
 */
namespace Playground\Blade\Themes;

/**
 * \Playground\Blade\Ui\Theme
 */
class Theme
{
    protected bool $enable = false;

    protected string $key = '';

    protected string $label = '';

    protected string $editor = '';

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

        if (! empty($options['editor'])
            && is_string($options['editor'])
        ) {
            $this->editor = $options['editor'];
        }

        if (! empty($options['editor'])
            && is_string($options['editor'])
        ) {
            $this->editor = $options['editor'];
        }

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

    public function editor(): string
    {
        return $this->editor;
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
