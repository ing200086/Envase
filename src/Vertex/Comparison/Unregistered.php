<?php

namespace Ing200086\GraphCore\Vertex\Comparison;

use Ing200086\GraphCore\Vertex\UnregisteredInterface;

class Unregistered {
    public function areEqual(UnregisteredInterface $a, UnregisteredInterface $b)
    {
        return ($a->getId() == $b->getId());
    }

    public function areSame(UnregisteredInterface &$a, UnregisteredInterface &$b)
    {
        return ($a === $b);
    }
}