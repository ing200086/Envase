<?php

namespace Ing200086\Envase\Tests\Unit\Container\Entity;

use Ing200086\Envase\EntityContainer;

/**
 * Class EntityContainerTest
 *
 * @package Ing200086\Envase\Tests\Unit\Container\Entity
 * @group   focus
 */
class ClosedContainerTest extends TestCase {
    /** @test */
    public function it_can_return_container_size()
    {
        $this->assertEquals(26, $this->_container->size());
    }

    /** @test */
    public function it_can_return_if_it_has_entity_with_id()
    {
        $this->assertTrue($this->_container->has($this->_entity->getId()));
    }

    /** @test */
    public function it_can_return_entity_with_id()
    {
        $id = $this->_entity->getId();

        $this->assertEquals($this->_entity, $this->_container->get($id), 'Container could not return equal entity');
        $this->assertSame($this->_entity, $this->_container->get($id), 'Container could not return same entity');
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

    protected function setUp()
    {
        parent::setUp();
        $this->_entities = $this->mockEntities(26);
        $this->_entity = $this->_entities[0];

        $this->_container = EntityContainer::FromArray($this->_entities);
    }
}
