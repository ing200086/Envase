<?php

namespace Ing200086\Envase\Tests\Unit\EntityContainer;

use Ing200086\Envase\EntityContainer;

/**
 * Class EntityContainerTest
 *
 * @package Ing200086\Envase\Tests\Unit\Container\Entity
 * @group   focus
 */
class ContainerTest extends EntityTestCase {
    /** @test */
    public function it_can_return_container_size()
    {
        $this->assertEquals(26, $this->_container->size());
    }

    /** @test */
    public function it_can_have_an_entity_added()
    {
        $this->_container = EntityContainer::Create();

        $this->_container->add($this->_entity);

        $this->assertTrue($this->_container->has($this->_entity->getId()));
    }

    /** @test */
    public function it_can_remove_items_that_are_in_the_container()
    {
        $this->_container->remove($this->_entity->getId());

        $this->assertFalse($this->_container->has($this->_entity->getId()));
    }

    /** @test*/
    public function it_can_be_iterated_through() {
        $count = 0;

        foreach ( $this->_container as $key => $item )
        {
            $count++;
        }

        $this->assertEquals(26, $count);
    }

    /** @test*/
    public function it_can_be_counted() {
        $this->assertEquals(26, count($this->_container));
    }
}
