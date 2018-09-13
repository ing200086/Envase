<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Vertex\UnregisteredInterface as VertexInterface;

abstract class Edge implements EdgeInterface {
    protected $_start;
    protected $_end;

    protected function __construct(VertexInterface $start, VertexInterface $end)
    {
        $this->_start = &$start;
        $this->_end = &$end;
    }

    public abstract static function Create(VertexInterface $start, VertexInterface $end);

    public static function CreateUnbiased(VertexInterface $start, VertexInterface $end)
    {
        return EdgeUnbiased::Create($start, $end);
    }

    public static function CreateFromTo(VertexInterface $start, VertexInterface $end)
    {
        return EdgeFromTo::Create($start, $end);
    }

    public static function CreateToFrom(VertexInterface $start, VertexInterface $end)
    {
        return EdgeToFrom::Create($start, $end);
    }

    public abstract function providesEntryTo(VertexInterface $vertex);

    public abstract function providesExitTo(VertexInterface $vertex);

    public function contains(VertexInterface $vertex)
    {
        return ($this->compareVertices($this->_start, $vertex) || $this->compareVertices($this->_end, $vertex));
    }

    protected function compareVertices(VertexInterface $a, VertexInterface $b)
    {
        return ($a->getId() == $b->getId());
    }
}