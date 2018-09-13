<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Vertex\RegisteredInterface as VertexInterface;

class RegisteredToFrom extends Registered {
    public static function Create(VertexInterface $start, VertexInterface $end)
    {
        return new self($start, $end);
    }

    public function providesEntryTo(VertexInterface $vertex)
    {
        return $this->compareVertices($this->_start, $vertex);
    }

    public function providesExitTo(VertexInterface $vertex)
    {
        return $this->compareVertices($this->_end, $vertex);
    }

}