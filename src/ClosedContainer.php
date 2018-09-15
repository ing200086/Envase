<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\NotFoundException;

class ClosedContainer {
    protected $_items;

    protected function __construct(array $items)
    {
        $this->_items = $items;
    }

    public function toArray() : array
    {
        return $this->_items;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function get($id)
    {
        if ( ! $this->has($id) )
        {
            throw new NotFoundException('Item with $id does not exist in container.');
        }

        return $this->_items[$id];
    }

    /**
     * @param string $id
     * @return bool
     * @throws InvalidArgumentException
     */
    public function has($id) : bool
    {
        if ( ! is_string($id) )
        {
            throw new InvalidArgumentException('Id must be string.');
        }

        return (isset($this->_items[$id]));
    }

    public function size() : int
    {
        return count($this->_items);
    }
}