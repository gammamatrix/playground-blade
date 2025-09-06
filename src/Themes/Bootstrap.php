<?php

declare(strict_types=1);
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

    /**
     * @param array{
     *     bsTheme?: string,
     *     enable?: bool,
     *     label?: string,
     *     key?: string,
     *     icon?: string,
     *     provider?: string,
     *     session?: string,
     *     background?: array{
     *         attachment?: string,
     *         color?: string,
     *         linear-gradient?: string,
     *         image?: string,
     *         repeat?: string,
     *         size?: string,
     *     },
     *     head?: array{
     *         comment?: array<string, mixed>,
     *         font?: array<string, mixed>,
     *         icon?: array<string, mixed>,
     *         link?: array<string, mixed>,
     *         script?: array<string, mixed>,
     *         style?: array<string, mixed>,
     *         stylesheet?: array<string, mixed>,
     *     },
     *     body?: array{
     *         comment?: array<string, mixed>,
     *         script?: array<string, mixed>,
     *         style?: array<string, mixed>,
     *         link?: array<string, mixed>,
     *     }
     * } $options
     */
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
