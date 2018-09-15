<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Interfaces\ValueContainerInterface;

/**
 * Class ValueContainer
 *
 * @package Ing200086\Envase
 */
abstract class ValueContainerAbstract extends SealedContainerAbstract implements ValueContainerInterface {
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