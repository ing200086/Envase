<?php

namespace Ing200086\GraphCore\Container\Generic;

use Ing200086\GraphCore\Exception\InvalidArgumentException;

class BaseContainer implements InterfaceBaseContainer {
    protected $_items;

    protected function __construct(array $items = [])
    {
        $this->_items = [];
        foreach ( $items as $key => $item )
        {
            $this->_add($key, $item);
        }
    }

    public static function FromArray(array $items)
    {
        return new static($items);
    }

    public static function Create()
    {
        return new static([]);
    }

    protected function _add($key, $item)
    {
        $key = strval($key);
        $this->_items[$key] = &$item;
    }

    /**
     * @param $id
     * @throws \Exception
     */
    protected function _remove($id)
    {
        try{
            $this->validateHasId($id);
            unset($this->_items[$id]);
        } catch (\Exception $e)
        {
            throw $e;
        }
    }

    public function toArray() : array
    {
        return $this->_items;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws \Exception
     */
    public function get($id)
    {
        try
        {
            $this->validateHasId($id);
            return $this->_items[$id];
        } catch (\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * @param $id
     * @throws NotFoundException
     */
    protected function validateHasId($id)
    {
        if ( ! $this->has($id) )
        {
            throw new NotFoundException('Item with $id does not exist in container.');
        }
    }

    public function has($id) : bool
    {
        $this->validateId($id);

        return (isset($this->_items[$id]));
    }

    protected function validateId($id)
    {
        if ( ! is_string($id) )
        {
            throw new InvalidArgumentException('Argument must be string.');
        }
    }

    public function size() : int
    {
        return count($this->_items);
    }
}