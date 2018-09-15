<?php

namespace Ing200086\Envase;

/**
 * Class BaseContainer
 *
 * @package Ing200086\Envase
 */
class SealedContainer extends ArrayContainerAbstract {
    protected function __construct(array $items)
    {
        $this->_items = $items;
    }

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