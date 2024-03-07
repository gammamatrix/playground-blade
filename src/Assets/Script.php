<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Playground\Blade\Assets\Contracts\Script as ScriptContract;

/**
 * \Playground\Blade\Assets\Script
 *
 */
class Script extends Asset implements ScriptContract
{
    protected bool $always = false;

    protected bool $async = false;

    protected bool $nomodule = false;

    protected bool $defer = false;

    protected bool $scoped = false;

    protected string $crossorigin = '';

    protected string $fetchpriority = '';

    protected string $integrity = '';

    protected string $referrerpolicy = '';

    protected string $script = '';

    protected string $src = '';

    protected string $type = '';

    protected string $version = '';

    public function setOptions(array $options = []): self
    {
        $this->always = ! empty($options['always']);
        $this->async = ! empty($options['async']);
        $this->nomodule = ! empty($options['nomodule']);
        $this->defer = ! empty($options['defer']);
        $this->scoped = ! empty($options['scoped']);

        if (! empty($options['crossorigin'])
            && is_string($options['crossorigin'])
        ) {
            $this->crossorigin = $options['crossorigin'];
        }

        if (! empty($options['fetchpriority'])
            && is_string($options['fetchpriority'])
        ) {
            $this->fetchpriority = $options['fetchpriority'];
        }

        if (! empty($options['integrity'])
            && is_string($options['integrity'])
        ) {
            $this->integrity = $options['integrity'];
        }

        if (! empty($options['referrerpolicy'])
            && is_string($options['referrerpolicy'])
        ) {
            $this->referrerpolicy = $options['referrerpolicy'];
        }

        if (! empty($options['src'])
            && is_string($options['src'])
        ) {
            $this->src = $options['src'];
        }

        if (! empty($options['version'])
            && is_string($options['version'])
        ) {
            $this->version = $options['version'];
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

    public function async(): bool
    {
        return $this->async;
    }

    public function nomodule(): bool
    {
        return $this->nomodule;
    }

    public function defer(): bool
    {
        return $this->defer;
    }

    public function scoped(): bool
    {
        return $this->scoped;
    }

    public function crossorigin(): string
    {
        return $this->crossorigin;
    }

    public function fetchpriority(): string
    {
        return $this->fetchpriority;
    }

    public function integrity(): string
    {
        return $this->integrity;
    }

    public function referrerpolicy(): string
    {
        return $this->referrerpolicy;
    }

    public function script(): string
    {
        return $this->script;
    }

    public function src(): string
    {
        return $this->src;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function __toString(): string
    {
        return sprintf(
            '<script%1$s%2$s%3$s%4$s>%5$s</script>',
            empty($this->src()) ? '' : sprintf(' src="%1$s"', $this->src()),
            empty($this->integrity()) ? '' : sprintf(' integrity="%1$s"', $this->integrity()),
            empty($this->crossorigin()) ? '' : sprintf(' crossorigin="%1$s"', $this->crossorigin()),
            empty($this->type()) ? '' : sprintf(' type="%1$s"', $this->type()),
            $this->script()
        );
    }
}
