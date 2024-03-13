<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Playground\Blade\Assets\Contracts\Stylesheet as StylesheetContract;

/**
 * \Playground\Blade\Assets\Link
 */
class Stylesheet extends Link implements StylesheetContract
{
    protected string $docs = '';

    protected string $version = '';

    public function setOptions(array $options = []): self
    {
        parent::setOptions($options);

        if (! empty($options['docs'])
            && is_string($options['docs'])
        ) {
            $this->docs = $options['docs'];
        }

        if (! empty($options['version'])
            && is_string($options['version'])
        ) {
            $this->version = $options['version'];
        }

        return $this;
    }

    public function docs(): string
    {
        return $this->docs;
    }

    public function version(): string
    {
        return $this->version;
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
