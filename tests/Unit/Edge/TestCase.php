<?php


namespace Ing200086\GraphCore\Tests\Unit\Edge;
use Ing200086\GraphCore\Vertex\UnregisteredInterface;
use Mockery;


abstract class TestCase extends \Ing200086\GraphCore\Tests\Unit\TestCase {
    protected $source;
    protected $destination;
    protected $edge;

    protected abstract function generateArticle();

    protected function mockVertex(int $id = 0)
    {
        $vertex = Mockery::mock(UnregisteredInterface::class);

        $vertex->shouldReceive('getId')->andReturn($id);

        return $vertex;
    }


    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->source = $this->mockVertex(0);
        $this->destination = $this->mockVertex(1);

        $this->edge = $this->generateArticle();
    }
}