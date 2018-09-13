<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Vertex\RegisteredInterface as VertexInterface;

abstract class Registered implements RegisteredInterface {
    protected $_start;
    protected $_end;

    protected function __construct(VertexInterface $start, VertexInterface $end)
    {
        if ( ! $this->areCompatible($start, $end) )
        {
            throw new InvalidArgumentException('Vertices have to be within the same graph');
        }

        $this->_start = &$start;
        $this->_end = &$end;
        $this->registerWithGraph($start);
    }

    public abstract static function Create(VertexInterface $start, VertexInterface $end);

    public abstract function providesEntryTo(VertexInterface $vertex);

    public abstract function providesExitTo(VertexInterface $vertex);

    public static function CreateDirectionless(VertexInterface $start, VertexInterface $end)
    {
        return RegisteredDirectionless::Create($start, $end);
    }

    public static function CreateDirectedFromTo(VertexInterface $start, VertexInterface $end)
    {
        return RegisteredFromTo::Create($start, $end);
    }

    public static function CreateDirectedToFrom(VertexInterface $start, VertexInterface $end)
    {
        return RegisteredToFrom::Create($start, $end);
    }

    protected function registerWithGraph(VertexInterface &$vertex)
    {
        $vertex->graph()->registerEdge($this);
    }

    protected function areCompatible(VertexInterface &$start, VertexInterface &$end)
    {
        return ($start->graph()->isCompatibleWith($end->graph()));
    }

    public function graph()
    {
        return $this->_start->graph();
    }

    public function contains(VertexInterface $vertex)
    {
        return ($this->compareVertices($this->_start, $vertex) || $this->compareVertices($this->_end, $vertex));
    }

    protected function compareVertices(VertexInterface $a, VertexInterface $b)
    {
        return (($a->getId() == $b->getId()) && ($a->graph() === $b->graph()));
    }
}