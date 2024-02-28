<?php
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
        return sprintf(
            '<link%1$s%2$s%3$s%4$s>',
            empty($this->href()) ? '' : sprintf(' href="%1$s"', $this->href()),
            empty($this->integrity()) ? '' : sprintf(' integrity="%1$s"', $this->integrity()),
            empty($this->crossorigin()) ? '' : sprintf(' crossorigin="%1$s"', $this->crossorigin()),
            empty($this->rel()) ? '' : sprintf(' rel="%1$s"', $this->rel())
        );
    }
}
