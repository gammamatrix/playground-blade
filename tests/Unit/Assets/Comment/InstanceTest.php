<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Comment;

use Playground\Blade\Assets\Comment;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Comment\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'comment' => 'http://example.com/comments',
        ];

        $instance = new Comment($options);

        $this->assertInstanceOf(Comment::class, $instance);

        $expected = '<!-- http://example.com/comments -->';

        $this->assertSame($expected, $instance->__toString());
    }
}
