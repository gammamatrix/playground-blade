<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Style;

use Playground\Blade\Assets\Style;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Style\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Style($options);

        $this->assertInstanceOf(Style::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<style></style>';

        $this->assertSame($expected, $instance->__toString());
    }
}
