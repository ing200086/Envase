<?php

namespace Ing200086\Envase\Tests\Unit\Container\Generic;

use Ing200086\Envase\BaseContainer;
use Ing200086\Envase\Exception\InvalidArgumentException;

/**
 * Class ClosedContainerTest
 *
 * @package Ing200086\Envase\Tests\Unit\Generic\Container
 *
 */
class BaseContainerTest extends TestCase {
    protected function setUp()
    {
        parent::setUp();
        $this->_container = BaseContainer::FromArray($this->_stubs);
    }

    /** @test*/
    public function it_can_return_array_of_items() {
        $this->assertEquals($this->_stubs, $this->_container->toArray());
    }

    /** @test */
    public function it_returns_true_if_id_is_contained()
    {
        $this->assertTrue($this->_container->has($this->_stubId));
    }

    /** @test */
    public function it_returns_false_if_id_is_not_contained()
    {
        $this->assertFalse($this->_container->has('0'));
    }

    /** @test
     * @expectedException InvalidArgumentException
     */
    public function it_throws_error_if_looking_for_id_that_is_not_a_string() {
        $this->_container->has(1);
    }

    /** @test */
    public function it_returns_value_if_id_is_contained()
    {
        $id = $this->_stubId;
        $this->assertEquals($this->_stub, $this->_container->get($id), 'Expected equivalent, but was not.');
        $this->assertSame($this->_stub, $this->_container->get($id), 'Expected Same, but was not.');
    }

    /** @test
     * @expectedException Ing200086\Envase\Exception\NotFoundException
     */
    public function it_returns_exception_if_id_is_not_contained()
    {
        $this->assertEquals(1, $this->_container->get('0'));
    }

    /** @test */
    public function it_has_a_size()
    {
        $this->assertEquals(2, $this->_container->size());
    }
}
