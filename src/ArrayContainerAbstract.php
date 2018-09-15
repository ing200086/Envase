<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Exception\NotFoundException;
use Ing200086\Envase\Exception\InvalidArgumentException;
use Ing200086\Envase\Interfaces\ArrayContainerInterface;

/**
 * Class ArrayContainerAbstract
 *
 * @package Ing200086\Envase
 */
abstract class ArrayContainerAbstract implements ArrayContainerInterface {
    protected $_items;

    /**
     * @return int
     */
    public function count() : int
    {
        return $this->size();
    }

    /**
     * @return int
     */
    public function size() : int
    {
        return count($this->_items);
    }

    /**
     * @return mixed
     */
    function rewind()
    {
        return reset($this->_items);
    }

    /**
     * @return mixed
     */
    function current()
    {
        return current($this->_items);
    }

    /**
     * @return int|null|string
     */
    function key()
    {
        return key($this->_items);
    }

    /**
     * @return mixed
     */
    function next()
    {
        return next($this->_items);
    }

    /**
     * @return bool
     */
    function valid()
    {
        return key($this->_items) !== null;
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
}