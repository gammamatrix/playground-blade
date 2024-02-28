<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Playground\Blade\Assets\Contracts\Icon as IconContract;

/**
 * \Playground\Blade\Assets\Icon
 */
class Icon extends Link implements IconContract
{
    protected string $sizes = '';

    public function setOptions(array $options = []): self
    {
        parent::setOptions($options);

        if (! empty($options['sizes'])
            && is_string($options['sizes'])
        ) {
            $this->sizes = $options['sizes'];
        }

        return $this;
    }

    public function sizes(): string
    {
        return $this->sizes;
    }

    public function __toString(): string
    {
        return sprintf(
            '<link%1$s%2$s%3$s%4$s%5$s>',
            empty($this->href()) ? '' : sprintf(' href="%1$s"', $this->href()),
            empty($this->integrity()) ? '' : sprintf(' integrity="%1$s"', $this->integrity()),
            empty($this->crossorigin()) ? '' : sprintf(' crossorigin="%1$s"', $this->crossorigin()),
            empty($this->rel()) ? '' : sprintf(' rel="%1$s"', $this->rel()),
            empty($this->sizes()) ? '' : sprintf(' sizes="%1$s"', $this->sizes())
        );
    }
}
