<?php


namespace Ing200086\GraphCore\Vertex;

use Ing200086\GraphCore\Graph\GraphInterface;
use Ing200086\GraphCore\Vertex\Comparison\Registered as Comparitor;

class Registered extends Unregistered implements RegisteredInterface {
    protected $_graph;

    public function __construct($id, GraphInterface &$graph)
    {
        parent::__construct($id);
        $this->registerWithGraph($graph);
        $this->_comparitor = new Comparitor();
    }

    protected function registerWithGraph(GraphInterface &$graph)
    {
        $graph->registerVertex($this);
        $this->_graph = &$graph;
    }

    public function graph()
    {
        return $this->_graph;
    }

    public function isEqualTo($subject)
    {
        $this->validateForComparison($subject);
        return $this->getComparitor()->areEqual($this, $subject);
    }
}