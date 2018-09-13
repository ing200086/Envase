<?php

namespace Ing200086\GraphCore\Container\Generic;

class ClosedContainer extends BaseContainer implements InterfaceClosedContainer, InterfaceClosedGetMatchesContainer {
    public function hasThatMatches(callable $closure) : bool
    {
        foreach ( $this->_items as $item )
        {
            if ($closure($item)) {
                return true;
            }
        }

        return false;
    }

    public function getThatMatches(callable $closure) : InterfaceClosedContainer
    {
        $evaluated = [];

        foreach ( $this->_items as $item )
        {
            if ($closure($item))
            {
                $evaluated[] = $item;
            }
        }

        return new static($evaluated);
    }
}