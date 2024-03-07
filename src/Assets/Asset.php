<?php
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Stringable;

/**
 * \Playground\Blade\Assets\Asset
 */
abstract class Asset implements Stringable
{
    protected string $docs = '';

    public function __construct(mixed $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * @param array<string, mixed> $options
     */
    public function setOptions(array $options = []): self
    {
        if (! empty($options['docs'])
            && is_string($options['docs'])
        ) {
            $this->docs = $options['docs'];
        }

        return $this;
    }

    public function docs(): string
    {
        return $this->docs;
    }
}
