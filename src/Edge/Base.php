<?php

namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Attribute\AttributeAware;
use Ing200086\GraphCore\Attribute\AttributeBagReference;
use Ing200086\GraphCore\Capacity\Utilization;
use Ing200086\GraphCore\Capacity\UtilizationInterface;
use Ing200086\GraphCore\Exception\BadMethodCallException;
use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\LogicException;
use Ing200086\GraphCore\Set\VerticesAggregate;
use Ing200086\GraphCore\Traits\BackwardsCompat\Edge\UtilizationTraits;
use Ing200086\GraphCore\Traits\BackwardsCompat\Edge\WeightTrait;
use Ing200086\GraphCore\Vertex;

abstract class Base implements VerticesAggregate, AttributeAware, EdgeInterface {
    protected $attributes = array();

    protected $from;

    protected $to;

    public function __construct(Vertex $from, Vertex $to)
    {
        $this->weight = null;
        $this->utilization = Utilization::CreateUnset();

        if ( ! $this->isFromSameGraph($from, $to) )
        {
            throw new InvalidArgumentException('Vertices have to be within the same graph');
        }

        $this->from = $from;
        $this->to = $to;

        $from->getGraph()->addEdge($this);
        $from->addEdge($this);
        $to->addEdge($this);
    }

    protected function isFromSameGraph(Vertex $from, Vertex $to)
    {
        return ($from->getGraph() == $to->getGraph());
    }

    abstract public function getVerticesTarget();

    abstract public function getVerticesStart();

    abstract public function hasVertexStart(Vertex $startVertex);

    abstract function hasVertexTarget(Vertex $targetVertex);

    public function isConnection(Vertex $from, Vertex $to)
    {
        return ($this->to === $to && $this->from === $from);
    }

    public function isLoop()
    {
        return ($this->to === $this->from);
    }

    abstract public function getVertexToFrom(Vertex $startVertex);

    abstract public function getVertexFromTo(Vertex $endVertex);

    use WeightTrait;

    use UtilizationTraits;

    public function destroy()
    {
        $this->getGraph()->removeEdge($this);
        foreach ( $this->getVertices() as $vertex )
        {
            $vertex->removeEdge($this);
        }
    }

    public function getGraph()
    {
        foreach ( $this->getVertices() as $vertex )
        {
            return $vertex->getGraph();

            // the following code can only be reached if this edge does not
            // contain any vertices (invalid state), so ignore its coverage
            // @codeCoverageIgnoreStart
        }

        throw new LogicException('Internal error: should not be reached');
        // @codeCoverageIgnoreEnd
    }

    public function createEdgeClone()
    {
        return $this->getGraph()->createEdgeClone($this);
    }

    public function createEdgeCloneInverted()
    {
        return $this->getGraph()->createEdgeCloneInverted($this);
    }

    public function getAttribute($name, $default = null)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : $default;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function removeAttribute($name)
    {
        unset($this->attributes[$name]);
    }

    public function getAttributeBag()
    {
        return new AttributeBagReference($this->attributes);
    }

    public function getUtilization()
    {
        return $this->utilization;
    }

    public function setUtilization(UtilizationInterface $utilization)
    {
        return $this->utilization = $utilization;
    }

    /**
     * do NOT allow cloning of objects
     *
     * @throws Exception
     */
    private function __clone()
    {
        // @codeCoverageIgnoreStart
        throw new BadMethodCallException();
        // @codeCoverageIgnoreEnd
    }
}
