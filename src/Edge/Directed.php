<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\LogicException;
use Ing200086\GraphCore\Vertex;
use Ing200086\GraphCore\Set\Vertices;
use Ing200086\GraphCore\Set\Edges;

class Directed extends Base
{
    public function getVerticesTarget()
    {
        return new Vertices(array($this->to));
    }

    public function getVerticesStart()
    {
        return new Vertices(array($this->from));
    }

    public function getVertices()
    {
        return new Vertices(array($this->from, $this->to));
    }

    public function getVertexEnd()
    {
        return $this->to;
    }
    public function getVertexStart()
    {
        return $this->from;
    }

    public function getVertexToFrom(Vertex $startVertex)
    {
        if ($this->from !== $startVertex) {
            throw new InvalidArgumentException('Invalid start vertex');
        }

        return $this->to;
    }

    public function getVertexFromTo(Vertex $endVertex)
    {
        if ($this->to !== $endVertex) {
            throw new InvalidArgumentException('Invalid end vertex');
        }

        return $this->from;
    }

    public function hasVertexStart(Vertex $startVertex)
    {
        return ($this->from === $startVertex);
    }

    public function hasVertexTarget(Vertex $targetVertex)
    {
        return ($this->to === $targetVertex);
    }
}
