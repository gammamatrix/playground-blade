<?php
/**
 * Playground
 */
namespace Tests\Unit\Playground\Blade\Assets\Script;

use Playground\Blade\Assets\Script;
use Tests\Unit\Playground\Blade\TestCase;

/**
 * \Tests\Unit\Playground\Blade\Assets\Script\InstanceTest
 */
class InstanceTest extends TestCase
{
    public function test_instance_with_docs(): void
    {
        $options = [
            'docs' => 'http://example.com/docs',
        ];

        $instance = new Script($options);

        $this->assertInstanceOf(Script::class, $instance);

        $this->assertSame($options['docs'], $instance->docs());

        $expected = '<script ></script>';

        $this->assertSame($expected, $instance->__toString());
    }
}
