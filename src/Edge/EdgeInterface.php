<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/8/18
 * Time: 8:10 PM
 */
namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Capacity\UtilizationInterface;
use Ing200086\GraphCore\Set\Vertices;
use Ing200086\GraphCore\Traits\BackwardsCompat\Edge\DomainException;
use Ing200086\GraphCore\Traits\BackwardsCompat\Edge\Edge;
use Ing200086\GraphCore\Vertex;

interface EdgeInterface {
    public function getVerticesTarget();

    public function getVerticesStart();

    public function hasVertexStart(Vertex $startVertex);

    function hasVertexTarget(Vertex $targetVertex);

    public function isConnection(Vertex $from, Vertex $to);

    public function isLoop();

    public function getVertexToFrom(Vertex $startVertex);

    public function getVertexFromTo(Vertex $endVertex);

    public function destroy();

    public function getGraph();

    public function createEdgeClone();

    public function createEdgeCloneInverted();

    public function getAttribute($name, $default = null);

    public function setAttribute($name, $value);

    public function removeAttribute($name);

    public function getAttributeBag();

    public function getUtilization();

    public function setUtilization(UtilizationInterface $utilization);

    public function getCapacity();

    public function setCapacity($capacity);

    public function getCapacityRemaining();

    public function getFlow();

    public function setFlow($flow);

    /**
     * @return Vertices
     */
    public function getVertices();

    /**
     * return weight of edge
     *
     * @return float|int|NULL numeric weight of edge or NULL=not set
     */
    public function getWeight();

    /**
     * set new weight for edge
     *
     * @param  float|int|NULL $weight new numeric weight of edge or NULL=unset weight
     * @return Edge            $this (chainable)
     * @throws DomainException if given weight is not numeric
     */
    public function setWeight($weight);
}