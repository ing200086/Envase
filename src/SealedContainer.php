<?php

namespace Ing200086\Envase;

use Ing200086\Envase\Exception\InvalidArgumentException;
use Ing200086\Envase\Exception\NotFoundException;
use Ing200086\Envase\Interfaces\CoreContainerInterface;

/**
 * Class BaseContainer
 *
 * @package Ing200086\Envase
 */
class SealedContainer extends ArrayContainerAbstract implements CoreContainerInterface {
    protected function __construct(array $items)
    {
        $this->_items = $items;
    }

    /**
     * @param array $items
     * @return SealedContainer
     */
    public static function FromArray(array $items)
    {
        return new static($items);
    }

    /**
     * @return SealedContainer
     */
    public static function Create()
    {
        return new static([]);
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