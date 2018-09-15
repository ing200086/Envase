<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Interfaces\KeyValueContainerInterface;

class KeyValueContainer extends SealedContainer implements KeyValueContainerInterface  {
    /**
     * @param array $items
     * @return KeyValueContainer
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