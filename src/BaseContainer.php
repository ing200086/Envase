<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\NotFoundException;

class BaseContainer extends AbstractContainer implements ClosedContainerInterface {
    protected function __construct(array $items = [])
    {
        $this->_items = [];
        foreach ( $items as $key => $item )
        {
            $this->_add($key, $item);
        }
    }

    protected function _add($key, $item)
    {
        $key = strval($key);
        $this->_items[$key] = &$item;
    }

    public static function FromArray(array $items)
    {
        return new static($items);
    }

    public static function Create()
    {
        return new static([]);
    }

    public function toArray() : array
    {
        return $this->_items;
    }

    /**
     * @param $id
     * @throws \Exception
     */
    protected function _remove($id)
    {
            $this->get($id);

            unset($this->_items[$id]);
    }
}