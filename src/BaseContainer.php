<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Interfaces\ClosedContainerInterface;

class BaseContainer extends ClosedContainer implements ClosedContainerInterface {
    public static function FromArray(array $items)
    {
        return new static($items);
    }

    public static function Create()
    {
        return new static([]);
    }
}