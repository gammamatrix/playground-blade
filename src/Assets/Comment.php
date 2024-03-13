<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Playground\Blade\Assets;

use Playground\Blade\Assets\Contracts\Comment as CommentContract;

/**
 * \Playground\Blade\Assets\Style
 */
class Comment extends Asset implements CommentContract
{
    protected bool $always = false;

    protected string $comment = '';

    public function setOptions(array $options = []): self
    {
        $this->always = ! empty($options['always']);

        if (! empty($options['comment'])
            && is_string($options['comment'])
        ) {
            $this->comment = $options['comment'];
        }

        return $this;
    }

    public function always(): bool
    {
        return $this->always;
    }

    public function comment(): string
    {
        return $this->comment;
    }

    public function __toString(): string
    {
        return sprintf('<!-- %1$s -->', $this->comment());
    }
}
