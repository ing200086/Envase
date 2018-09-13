<?php

namespace Ing200086\GraphCore\Vertex\Comparison;

use Ing200086\GraphCore\Vertex\RegisteredInterface;

class Registered {
    public function areEqual(RegisteredInterface $a, RegisteredInterface $b)
    {
        return (($a->graph() === $b->graph()) && ($a->getId() == $b->getId()));
    }

    public function areSame(RegisteredInterface &$a, RegisteredInterface &$b)
    {
        return ($a === $b);
    }
}