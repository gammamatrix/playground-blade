<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Playground\Blade\Assets\Contracts\Link as LinkContract;

/**
 * \Playground\Blade\Assets\Link
 */
class Link extends Asset implements LinkContract
{
    protected bool $always = false;

    protected string $as = '';

    protected string $crossorigin = '';

    protected string $href = '';

    protected string $integrity = '';

    protected string $media = '';

    protected string $rel = '';

    protected string $title = '';

    protected string $type = '';

    public function setOptions(array $options = []): self
    {
        parent::setOptions($options);

        $this->always = ! empty($options['always']);

        if (! empty($options['crossorigin'])
            && is_string($options['crossorigin'])
        ) {
            $this->crossorigin = $options['crossorigin'];
        }

        if (! empty($options['href'])
            && is_string($options['href'])
        ) {
            $this->href = $options['href'];
        }

        if (! empty($options['integrity'])
            && is_string($options['integrity'])
        ) {
            $this->integrity = $options['integrity'];
        }

        if (! empty($options['media'])
            && is_string($options['media'])
        ) {
            $this->media = $options['media'];
        }

        if (! empty($options['rel'])
            && is_string($options['rel'])
        ) {
            $this->rel = $options['rel'];
        }

        if (! empty($options['title'])
            && is_string($options['title'])
        ) {
            $this->title = $options['title'];
        }

        if (! empty($options['type'])
            && is_string($options['type'])
        ) {
            $this->type = $options['type'];
        }

        return $this;
    }

    public function always(): bool
    {
        return $this->always;
    }

    public function as(): string
    {
        return $this->as;
    }

    public function crossorigin(): string
    {
        return $this->crossorigin;
    }

    public function href(): string
    {
        return $this->href;
    }

    public function integrity(): string
    {
        return $this->integrity;
    }

    public function media(): string
    {
        return $this->media;
    }

    public function rel(): string
    {
        return $this->rel;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        return sprintf(
            '<link%1$s%2$s%3$s%4$s>',
            empty($this->href()) ? '' : sprintf(' href="%1$s"', $this->href()),
            empty($this->integrity()) ? '' : sprintf(' integrity="%1$s"', $this->integrity()),
            empty($this->crossorigin()) ? '' : sprintf(' crossorigin="%1$s"', $this->crossorigin()),
            empty($this->rel()) ? '' : sprintf(' rel="%1$s"', $this->rel())
        );
    }
}
