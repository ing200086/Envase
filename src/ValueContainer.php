<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Interfaces\ValueContainerInterface;

class ValueContainer extends BaseContainer implements ValueContainerInterface {
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