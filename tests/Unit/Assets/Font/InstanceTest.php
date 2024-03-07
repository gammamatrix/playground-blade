<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Font;

use Playground\Blade\Assets\Font;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Font\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Font($options);

        $this->assertInstanceOf(Font::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<link >';

        $this->assertSame($expected, $instance->__toString());
    }
}
