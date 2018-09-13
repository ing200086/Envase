<?php

namespace Ing200086\GraphCore\Vertices;

use Ing200086\GraphCore\Container\Entity\EntityContainer;
use Ing200086\GraphCore\Vertex\UnregisteredInterface;
use Ing200086\GraphCore\Graph\GraphInterface;

class RegisteredContainer extends AbstractContainer {
    protected $_graph;

    protected function __construct(GraphInterface &$graph, EntityContainer $container = null)
    {
        parent::__construct($container);
        $this->_graph = &$graph;
    }

    public static function Create(GraphInterface &$graph)
    {
        return new static($graph);
    }

    public static function FromArray(GraphInterface &$graph, array $items)
    {
        $container = static::Create($graph);

        foreach ( $items as $item )
        {
            $container->add($item);
        }

        return $container;
    }

    public function graph()
    {
        return $this->_graph;
    }

    public function add(UnregisteredInterface &$vertex)
    {
        parent::add($vertex);
        $this->update();
    }

    protected function update()
    {
        $this->_graph->notify($this->_container);
    }
}