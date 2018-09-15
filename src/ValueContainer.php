<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Interfaces\ValueContainerInterface;

class ValueContainer extends SealedContainer implements ValueContainerInterface  {
    /**
     * @param array $items
     * @return ValueContainer
     */
    public static function FromArray(array $items)
    {
        return new static($items);
    }

    /**
     * @param string $key
     * @param        $item
     */
    public function add(string $key, $item)
    {
        $this->_items[$key] = $item;
    }

    /**
     * @param string $id
     * @throws \Exception
     */
    public function remove(string $id)
    {
        $this->get($id);
        unset($this->_items[$id]);
    }
}