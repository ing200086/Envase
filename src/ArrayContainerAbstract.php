<?php

namespace Ing200086\Envase;


/**
 * Class ArrayContainerAbstract
 *
 * @package Ing200086\Envase
 */
abstract class ArrayContainerAbstract {
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
}