<?php
namespace Ing200086\Envase\Tests\Unit;

use \Mockery as M;
use Psr\Container\ContainerInterface;

abstract class TestCase extends \PHPUnit\Framework\TestCase {
    protected $_container;
    protected $_entities;
    protected $_entity;
    protected $_id;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->_entities = $this->mockArray();
        $this->_entity = $this->_entities[0];
        $this->_id = '0';
    }

    /** @test */
    public function it_is_psr_interface()
    {
        $this->assertInstanceOf(ContainerInterface::class, $this->_container);
    }

    /** @test */
    public function it_returns_true_if_id_is_contained()
    {
        $this->assertTrue($this->_container->has($this->_id));
    }

    /** @test */
    public function it_returns_false_if_id_is_not_contained()
    {
        $this->assertFalse($this->_container->has('1'));
    }

    /** @test
     * @expectedException Ing200086\Envase\Exception\InvalidArgumentException
     */
    public function it_throws_error_if_looking_for_id_that_is_not_a_string()
    {
        $this->_container->has(1);
    }

    /** @test */
    public function it_can_return_entity_with_id()
    {
        $this->assertEquals($this->_entity, $this->_container->get($this->_id), 'Container could not return equal entity');
        $this->assertSame($this->_entity, $this->_container->get($this->_id), 'Container could not return same entity');
    }

    /** @test
     * @expectedException Ing200086\Envase\Exception\NotFoundException
     */
    public function it_returns_exception_if_id_is_not_contained()
    {
        $this->_container->get('1');
    }

    abstract protected function mock(int $id);

    protected function mockArray(int $count = 1) : array
    {
        $output = [];

        for ( $i = 0; $i < $count; $i++ )
        {
            $output[] = $this->mock($i);
        }

        return $output;
    }

    protected function tearDown()
    {
        M::close();
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}
