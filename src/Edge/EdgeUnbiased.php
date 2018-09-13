<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Vertex\UnregisteredInterface as VertexInterface;

class EdgeUnbiased extends Edge {
    public static function Create(VertexInterface $start, VertexInterface $end)
    {
        return new self($start, $end);
    }

    public function providesEntryTo(VertexInterface $vertex)
    {
        return $this->contains($vertex);
    }

    public function providesExitTo(VertexInterface $vertex)
    {
        return $this->contains($vertex);
    }
}