<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Interfaces\ClosedContainerInterface;

/**
 * Class BaseContainer
 *
 * @package Ing200086\Envase
 */
class SealedContainer extends CoreContainer implements ClosedContainerInterface {
    /**
     * @param array $items
     * @return SealedContainer
     */
    public static function FromArray(array $items)
    {
        return new static($items);
    }

    /**
     * @return SealedContainer
     */
    public static function Create()
    {
        return new static([]);
    }
}