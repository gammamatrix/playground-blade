<?php
/**
 * Playground
 */
namespace Playground\Blade\Themes;

use Playground\Blade\Themes\Contracts\Bootstrap as BootstrapContract;

/**
 * \Playground\Blade\Themed\Bootstrap
 */
class Bootstrap extends Theme implements BootstrapContract
{
    protected string $bsTheme = '';

    protected string $provider = 'bootstrap';

    public function setOptions(array $options = []): self
    {
        parent::setOptions($options);

        if (! empty($options['bsTheme'])
            && is_string($options['bsTheme'])
        ) {
            $this->bsTheme = $options['bsTheme'];
        }

        return $this;
    }

    public function bsTheme(): string
    {
        return $this->bsTheme;
    }
}
