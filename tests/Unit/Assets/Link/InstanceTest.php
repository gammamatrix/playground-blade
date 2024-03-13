<?php

declare(strict_types=1);
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Link;

use Playground\Blade\Assets\Link;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Link\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Link($options);

        $this->assertInstanceOf(Link::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<link>';

        $this->assertSame($expected, $instance->__toString());
    }
}
