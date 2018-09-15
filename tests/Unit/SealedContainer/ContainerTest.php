<?php

namespace Ing200086\Envase\Tests\Unit\SealedContainer;

/**
 * Class ClosedContainerTest
 *
 * @package Ing200086\Envase\Tests\Unit\Generic\Container
 */
class ContainerTest extends SealedTestCase {
    /** @test */
    public function it_has_a_size()
    {
        $this->assertEquals(1, $this->_container->size());
    }

    /** @test */
    public function it_can_return_array_of_items()
    {
        $this->assertEquals($this->_entities, $this->_container->toArray());
    }

    /** @test*/
    public function it_can_be_counted() {
        $this->assertEquals(1, count($this->_container));
    }
}
