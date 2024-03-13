<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Assets;

/**
 * \Playground\Blade\Assets\Font
 */
class Font extends Stylesheet
{
    public function __toString(): string
    {
        $attributes = trim(implode(' ', array_filter([
            $this->crossorigin() ? sprintf('crossorigin="%1$s"', $this->crossorigin()) : '',
            $this->integrity() ? sprintf('integrity="%1$s"', $this->integrity()) : '',
            $this->href() ? sprintf('href="%1$s"', $this->href()) : '',
            $this->rel() ? sprintf('rel="%1$s"', $this->rel()) : '',
        ])));

        return sprintf('<link %1$s>', $attributes);
    }
}
