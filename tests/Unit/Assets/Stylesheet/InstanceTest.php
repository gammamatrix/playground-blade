<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Stylesheet;

use Playground\Blade\Assets\Stylesheet;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Stylesheet\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Stylesheet($options);

        $this->assertInstanceOf(Stylesheet::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<link>';

        $this->assertSame($expected, $instance->__toString());
    }
}
