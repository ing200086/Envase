<?php

namespace Ing200086\GraphCore;

use Ing200086\GraphCore\Exception\InvalidArgumentException;
use Ing200086\GraphCore\Exception\NotFoundException;

abstract class AbstractContainer implements ClosedContainerInterface {
    protected $_items;

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
        if ( ! $this->isValidId($id) )
        {
            throw new InvalidArgumentException('Id must be string.');
        }

        return (isset($this->_items[$id]));
    }

    protected function isValidId($id)
    {
        return is_string($id);
    }

    public function size() : int
    {
        return count($this->_items);
    }

    protected function matchingIds(callable $closure) : array
    {
        $evaluated = [];

        foreach ( $this->_items as $key => $item )
        {
            if ( $closure($item) )
            {
                $evaluated[] = $key;
            }
        }

        return $evaluated;
    }

    public function hasThatMatches(callable $closure) : bool
    {
        return (count($this->matchingIds($closure)) <> 0);
    }

    public function getThatMatches(callable $closure) : ClosedContainerInterface
    {
        $keys = $this->matchingIds($closure);
        $evaluated = [];

        foreach ($keys as $key)
        {
            $evaluated[$key] = $this->_items[$key];
        }

        return new static($evaluated);
    }
}