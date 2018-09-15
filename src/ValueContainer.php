<?php

namespace Ing200086\Envase;

class ValueContainer extends ValueContainerAbstract {
    protected function __construct(array $items)
    {
        $this->_items = $items;
    }

    /**
     * @param array $items
     * @return ValueContainer
     */
    public static function FromArray(array $items)
    {
        return new static($items);
    }

    /**
     * @return ValueContainer
     */
    public static function Create()
    {
        return new static([]);
    }
}