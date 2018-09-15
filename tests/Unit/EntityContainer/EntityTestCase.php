<?php

namespace Ing200086\Envase\Tests\Unit\EntityContainer;

use Ing200086\Envase\EntityContainer;
use Ing200086\Envase\Interfaces\EntityInterface;
use Ing200086\Envase\Tests\Unit\TestCase;

class EntityTestCase extends TestCase {
    protected function setUp()
    {
        parent::setUp();
        $this->_entities = $this->mockArray(26);
        $this->_entity = $this->_entities[0];
        $this->_id = $this->_entity->getId();

        $this->_container = EntityContainer::FromArray($this->_entities);
    }

    protected function mock(int $id)
    {
        $entity = \Mockery::mock(EntityInterface::class);
        $entity->shouldReceive('getId')->andReturn(chr($id + 65));
        $entity->shouldReceive('getValue')->andReturn($id + 125);

        return $entity;
    }
}