<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Icon;

use Playground\Blade\Assets\Icon;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Icon\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Icon($options);

        $this->assertInstanceOf(Icon::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<link>';

        $this->assertSame($expected, $instance->__toString());
    }
}
