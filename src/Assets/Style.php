<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use \Playground\Blade\Assets\Contracts\Style as StyleContract;

/**
 * \Playground\Blade\Assets\Style
 *
 */
class Style extends Asset implements StyleContract
{
    protected bool $always = false;

    protected string $style = '';

    public function setOptions(array $options = []): self
    {
        $this->always = ! empty($options['always']);

        if (! empty($options['style'])
            && is_string($options['style'])
        ) {
            $this->style = $options['style'];
        }
        return $this;
    }

    public function always(): bool
    {
        return $this->always;
    }

    public function style(): string
    {
        return $this->style;
    }

    public function __toString(): string
    {
        return sprintf('<style>%1$s</style>', $this->style());
    }
}
