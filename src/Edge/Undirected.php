<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Vertex;
use Ing200086\GraphCore\Set\Vertices;

class Undirected extends Base
{
    public function getVerticesTarget()
    {
        return new Vertices(array($this->to, $this->from));
    }

    public function getVerticesStart()
    {
        return new Vertices(array($this->from, $this->to));
    }

    public function getVertices()
    {
        return new Vertices(array($this->from, $this->to));
    }

    public function isConnection(Vertex $from, Vertex $to)
    {
        return (parent::isConnection($from, $to) || parent::isConnection($to, $from));
    }

    public function getVertexToFrom(Vertex $startVertex)
    {
        if ($this->from === $startVertex) {
            return $this->to;
        } elseif ($this->to === $startVertex) {
            return $this->from;
        } else {
            throw new InvalidArgumentException('Invalid start vertex');
        }
    }

    public function getVertexFromTo(Vertex $endVertex)
    {
        if ($this->from === $endVertex) {
            return $this->to;
        } elseif ($this->to === $endVertex) {
            return $this->from;
        } else {
            throw new InvalidArgumentException('Invalid end vertex');
        }
    }

    public function hasVertexStart(Vertex $startVertex)
    {
        return ($this->from === $startVertex || $this->to === $startVertex);
    }

    public function hasVertexTarget(Vertex $targetVertex)
    {
        // same implementation as direction does not matter
        return $this->hasVertexStart($targetVertex);
    }
}
