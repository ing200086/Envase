<?php

namespace Ing200086\Envase\Tests\Unit\ValueContainer;

/**
 * Class OpenContainerTest
 *
 * @package Ing200086\Envase\Tests\Unit\Generic\Container
 *
 */
class ValueContainerTest extends ValueTestCase {
    /** @test */
    public function it_can_be_populated()
    {
        $this->assertTrue($this->_container->has($this->_id));
    }

    /** @test
     */
    public function it_can_remove_by_id()
    {
        $this->_container->remove($this->_id);

        $this->assertFalse($this->_container->has($this->_id));
    }
}
