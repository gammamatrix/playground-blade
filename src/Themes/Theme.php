<?php

declare(strict_types=1);
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

    public function __construct(
        mixed $options = null
    ) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
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

        if (! empty($options['background'])
            && is_array($options['background'])
        ) {
            $this->setBackground($options['background']);
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

    /**
     * @var array<string, string>
     */
    protected array $background = [
        'color' => '',
        'image' => '',
        'repeat' => '',
        'attachment' => '',
        'size' => '',
        'linear-gradient' => '',
    ];

    /**
     * @param array<string, mixed> $background
     */
    public function setBackground(array $background = []): self
    {
        if (! empty($background['attachment'])
            && is_string($background['attachment'])
            && in_array($background['attachment'], [
                'fixed',
                'scroll',
                'local',
                'scroll, local',
                'local, scroll',
            ])) {
            $this->background['attachment'] = $background['attachment'];
        } else {
            $this->background['attachment'] = '';
        }

        if (! empty($background['size'])
            && is_string($background['size'])
            && (in_array($background['size'], [
                'cover',
                'contain',
                'auto',
                'auto auto',
            ]) || (
                preg_match('/([\d\.\%rempxvhautocontaincover ])+/', $background['size'])
            ))) {
            $this->background['size'] = $background['size'];
        } else {
            $this->background['size'] = '';
        }

        if (! empty($background['image'])
            && is_string($background['image'])
        ) {
            $this->background['image'] = $background['image'];
        } else {
            $this->background['image'] = '';
        }

        if (! empty($background['linear-gradient'])
            && is_string($background['linear-gradient'])
        ) {
            $this->background['linear-gradient'] = $background['linear-gradient'];
        } else {
            $this->background['linear-gradient'] = '';
        }

        if (! empty($background['repeat'])
            && is_string($background['repeat'])
            && in_array($background['repeat'], [
                'repeat-x',
                'repeat no-repeat',
                'repeat-y',
                'no-repeat repeat',
                'repeat',
                'repeat repeat',
                'repeat space',
                'space',
                'space space',
                'round',
                'round round',
                'round space',
                'no-repeat',
                'no-repeat round',
                'no-repeat no-repeat',
            ])) {
            $this->background['repeat'] = $background['repeat'];
        } else {
            $this->background['repeat'] = '';
        }

        return $this;
    }

    public function bodyStyle(): string
    {
        $style = '';

        $withImage = ! empty($this->background['image']);
        $withLinearGradient = ! empty($this->background['linear-gradient']);

        if ($withImage && $withLinearGradient) {
            $style .= sprintf(
                ' background-image: url(%2$s), linear-gradient(%1$s);',
                $this->background['image'],
                $this->background['linear-gradient'],
            );

        } elseif ($withImage) {
            $style .= sprintf(
                ' background-image: url(%1$s);',
                $this->background['image']
            );
        } elseif ($withLinearGradient) {
            $style .= sprintf(
                ' background-image: linear-gradient(%1$s);',
                $this->background['linear-gradient']
            );
        }

        if (! empty($this->background['image'])) {
            $style .= sprintf(
                ' background-image: url(%1$s);',
                $this->background['image']
            );
        }

        if (! empty($this->background['repeat'])) {
            $style .= sprintf(
                ' background-repeat: %1$s;',
                $this->background['repeat']
            );
        }

        if (! empty($this->background['attachment'])) {
            $style .= sprintf(
                ' background-attachment: %1$s;',
                $this->background['attachment']
            );
        }

        if (! empty($this->background['color'])) {
            $style .= sprintf(
                ' background-color: %1$s;',
                $this->background['color']
            );
        }

        if (! empty($this->background['size'])) {
            $style .= sprintf(
                ' background-size: %1$s;',
                $this->background['size']
            );
        }

        return empty($style) ? '' : sprintf(
            ' style="%1$s"',
            $style
        );
    }
}
