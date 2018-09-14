<?php

namespace Ing200086\GraphCore\Tests\Unit\Container\Entity;

use Ing200086\GraphCore\ClosedContainerInterface;
use Ing200086\GraphCore\Entity\Container;

/**
 * Class EntityContainerTest
 *
 * @package Ing200086\GraphCore\Tests\Unit\Container\Entity
 * @group   focus
 */
class ClosedContainerTest extends TestCase {
    /** @test */
    public function it_can_return_container_size() {
        $this->assertEquals(26, $this->_container->size());
    }

    /** @test */
    public function it_can_return_if_it_has_entity_with_id()
    {
        $this->assertTrue($this->_container->has($this->_entity->getId()));
    }

    /** @test*/
    public function it_can_return_entity_with_id() {
        $id = $this->_entity->getId();

        $this->assertEquals($this->_entity, $this->_container->get($id), 'Container could not return equal entity');
        $this->assertSame($this->_entity, $this->_container->get($id), 'Container could not return same entity');
    }

    /** @test*/
    public function it_can_return_if_it_has_entity_matching() {
        $closure = function($item)
        {
            return ($item->getValue() == 123);
        };

        $this->assertTrue($this->_container->hasThatMatches($closure));
    }

    /** @test
     */
    public function it_can_return_a_subset_of_container_based_on_match() {
        $matcher = function($item)
        {
            $matchers = ['A', 'E', 'I', 'O', 'U', 'Y'];

            return in_array($item->getId(), $matchers);
        };

        $result = $this->_container->getThatMatches($matcher);

        $this->assertEquals(6, $result->size());
        $this->assertInstanceOf(ClosedContainerInterface::class, $result);
    }

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->_entities = $this->mockEntities(26);
        $this->_entity = $this->_entities[0];

        $this->_container = Container::FromArray($this->_entities);
    }
}
